import serial
import pymysql
import os

import RPi.GPIO as GPIO
import MFRC522
import signal


def identificacion():
    
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
    estado = arduino.readline()
    
    if(estado == "Apagar"):
        os.system("xset dpms force off")
        
    elif(estado == "Encender"):
        os.system("xset dpms force on")
        identificacion()
        
    else:
        printf("Mensaje recibido difiere al esperado")
    
    
    #print(user_ID)
    #insert_record_value(user_ID)
	
arduino.close()