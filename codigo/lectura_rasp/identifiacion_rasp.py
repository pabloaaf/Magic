import serial
import pymysql
import os

import RPi.GPIO as GPIO
import MFRC522
import signal


def identification():
    # Crea un objeto de la clase MFRC522
    code = None
    MIFAREReader = MFRC522.MFRC522()
     
    (status,TagType) = MIFAREReader.MFRC522_Request(MIFAREReader.PICC_REQIDL)

    # Si encuenra la tarjeta
    if status == MIFAREReader.MI_OK:
        print "Tarjeta detectada"

    # Obtiene el UID de la tarjeta
    (status,uid) = MIFAREReader.MFRC522_Anticoll()

    # Si el UID se obtiene correctamente busca en la bbdd el usuario. No coge los 0x
    if status == MIFAREReader.MI_OK:
        code =  str(uid[0][2:]) + str(uid[1][2:]) + str(uid[2][2:]) + str(uid[3][2:])
        
    return code;


def check_RFID_code(code):
    connection = pymysql.connect("localhost", "phpmyadmin", "culodeadriana", "MagicMirror")
    
    cursor = connection.cursor()
    
    cursor.execute("SELECT ID_usuario FROM RFID WHERE Codigo = %s", code)
    
    ID = cursor.fetchone()
    
    if(ID is None):
        print("Buscar html del usuario ID")
    else:
        print("Añadir nuevo usuario y mostras pagina base")
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

while True:
    arduino = serial.Serial('/dev/ttyACM0', 9600)
    state = arduino.readline()
    
    if(state == "Apagar"):
        os.system("xset dpms force off")
        
    elif(state == "Encender"):
        os.system("xset dpms force on")
        code = identification()
        
        if code is not None:
            check_RDIF_code(code)
            
        
    else:
        print("Mensaje recibido difiere al esperado")
    
    
    #print(user_ID)
    #insert_record_value(user_ID)
	
arduino.close()