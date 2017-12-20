import serial
import pymysql
import os

import RPi.GPIO as GPIO
import MFRC522
import signal


def identification():
    # Crea un objeto de la clase MFRC522
    MIFAREReader = MFRC522.MFRC522()
    (status,TagType) = MIFAREReader.MFRC522_Request(MIFAREReader.PICC_REQIDL)

    # Si encuenra la tarjeta
    if status == MIFAREReader.MI_OK:
        print ("Tarjeta detectada")

    # Obtiene el UID de la tarjeta
    (status,uid) = MIFAREReader.MFRC522_Anticoll()

    # Si el UID se obtiene correctamente busca en la bbdd el usuario. No coge los 0x
    if status == MIFAREReader.MI_OK:
        return(str(uid[0])+","+str(uid[1])+","+str(uid[2])+","+str(uid[3]))
    
    return "";


def check_RFID_code(code):
    connection = pymysql.connect("localhost", "phpmyadmin", "culodeadriana", "MagicMirror")
    
    cursor = connection.cursor()
    
    cursor.execute("SELECT ID_usuario FROM Usuario WHERE Codigo_RFID = %s", code)
    
    ID = cursor.fetchone()
    
    if(ID is None):
        print("Buscar html del usuario ID")
        os.system("chromium http://localhost/BasePablo.html")
    else:
        print("Anadir nuevo usuario y mostras pagina base")
    return;


def insert_record_value(user_ID):
    connection = pymysql.connect("localhost", "phpmyadmin", "culodeadriana", "MagicMirror")
    
    cursor = connection.cursor()
 
    
    try:
        cursor.execute("INSERT INTO Login (ID) VALUES (%s)", int(user_ID))
        connection.commit()
    except Exception as e:
        print("Error al insertar valor en tabla Login \n")
        print(e)
        connection.rollback()
        
    connection.close()
    return;


'''Recibe el mensaje de arduino indicando si hay alguien delante del espejo o no:

    -Hay alguien: Se enciende la pantalla y el usuario procede a identificarse. Se pueden dar 2 situaciones:
    
        --Esta registrado: Se accede a la base de datos y esta devuelve la web del usuario
        --No esa registrado: Se pide al usuario un nombre, y este se almacena en la bbdd
        
    -Si no hay nadie: se apaga la pantalla y se espera al siguiente mensaje de arduino

'''
try:
    while True:
        arduino = serial.Serial('/dev/ttyACM0', 9600)
        state = arduino.readline().decode("utf-8")
        state = state[:-2]
        print(state)
        if(state == "Apagar"):
            #os.system("xset dpms force off")
            print("Se apaga")
        elif(state == "Encender"):
            # os.system("xset dpms force on")
            code = identification()
            
        if code is not "":
            check_RDIF_code(code)

except KeyboardInterrupt:
    print("cpntrol+c")
    #print(user_ID)
    #insert_record_value(user_ID)

finally:
	arduino.close()
	GPIO.cleanup()
