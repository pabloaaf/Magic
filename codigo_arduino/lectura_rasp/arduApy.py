import serial
import pymysql

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



arduino = serial.Serial('/dev/ttyACM0', 9600)

while True:
    user_ID = arduino.readline()
    print(user_ID)
    insert_record_value(user_ID)
	
arduino.close()
