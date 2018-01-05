import serial
import pymysql
import os

import time
from random import choice
import threading

import RPi.GPIO as GPIO
import MFRC522
import signal

from selenium import webdriver
from selenium.webdriver.common.keys import Keys
from selenium.webdriver.support import ui
from selenium.webdriver.chrome.options import Options

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
        return(str(uid[0])+""+str(uid[1])+""+str(uid[2])+""+str(uid[3]))
    
    return "";


def check_RDIF_code(code):
    connection = pymysql.connect("localhost", "phpmyadmin", "culodeadriana", "MagicMirror")
    
    cursor = connection.cursor()
    print(code)
    cursor.execute("SELECT ID_usuario FROM Usuario WHERE Codigo_RFID = %s", code)
    
    ID = cursor.fetchone()
    code_temp = generate_code_temp(cursor)
    if(ID is not(None)):
        print("Buscar html del usuario ID")
        cursor.execute("UPDATE Usuario SET Codigo_temporal = %s WHERE Usuario.ID_Usuario = %s", (code_temp, ID[0]))
        connection.commit()
        driver.get("http://localhost/registrado.html")
    else:
        print("Anadir nuevo usuario y mostras pagina base")
        cursor.execute("INSERT INTO Usuario (Nombre, Codigo_RFID, Codigo_temporal) VALUES('unknown', %s, %s)", (code, code_temp))
        connection.commit()
        driver.get("http://localhost/sinregistrar.html")

    time.sleep(5)
    return;

def generate_code_temp(cursor):
    longitud = 10
    valores = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ<=>@#%&+"
    while True:
        p = ""
        p = p.join([choice(valores) for i in range(longitud)])
        cursor.execute("SELECT ID_usuario FROM Usuario WHERE Codigo_temporal = %s", p)
        ID = cursor.fetchone()
        if(ID is None):
            return p;
        print(p)

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

def sensor(driver):
    arduino = serial.Serial('/dev/ttyACM0', 9600)
    while True:
        state = arduino.readline().decode("utf-8")
        state = state[:-2]
        print(state)
        if(state == "Apagar"):
            os.system("xset dpms force off")
            driver.get("http://localhost/")
            print("Se apaga")
        elif(state == "Encender"):
            os.system("xset dpms force on")
            print("Se encen")

            
    arduino.close()        
    return;


'''Recibe el mensaje de arduino indicando si hay alguien delante del espejo o no:

    -Hay alguien: Se enciende la pantalla y el usuario procede a identificarse. Se pueden dar 2 situaciones:
    
        --Esta registrado: Se accede a la base de datos y esta devuelve la web del usuario
        --No esa registrado: Se pide al usuario un nombre, y este se almacena en la bbdd con una pagina base y sin nombre hasta que el lo cambie
        
    -Si no hay nadie: se apaga la pantalla y se espera al siguiente mensaje de arduino

'''
try:
##    time.sleep(40)
    chrome_options = Options()
    chrome_options.add_argument("--no-sandbox")
    chrome_options.add_argument("--disable-web-security")
    chrome_options.add_argument("--ignore-certificate-errors")
##    chrome_options.add_argument("--kiosk")
    chrome_options.add_argument("--disable-infobars")
    chrome_options.add_argument("--disable-password-manager-reauthentication")
    driver = webdriver.Chrome('/usr/lib/chromium-browser/chromedriver', chrome_options=chrome_options)  # Optional argument, if not specified will search path.
    
    driver.get("http://localhost/")

    thread_sensor = threading.Thread(target=sensor, args=([driver]), name='Sensor')

    thread_sensor.start()
    '''while True:
        
        code = identification()
        if code is not "":
            check_RDIF_code(code)
        
        arduino = serial.Serial('/dev/ttyACM0', 9600)
        state = arduino.readline().decode("utf-8")
        state = state[:-2]
        print(state)
        if(state == "Apagar"):
            os.system("xset dpms force off")
            driver.get("http://localhost/")
            print("Se apaga")
        elif(state == "Encender"):
            os.system("xset dpms force on")'''
    while True:
        code = identification()
        if code is not "":
            check_RDIF_code(code)
        
        
except KeyboardInterrupt:
    print("control+c")
    #print(user_ID)
    #insert_record_value(user_ID)

finally:
	GPIO.cleanup()
	driver.close()
