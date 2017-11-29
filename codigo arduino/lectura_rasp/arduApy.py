import serial
import pymysql

arduino = serial.Serial('/dev/ttyACM0', 9600)

while True:
    user_ID = arduino.readline()
    print(user_ID)
    insert_record_value(user_ID)
	
arduino.close()


def insert_record_vaue(user_ID):
    connection = pymysql.connect("localhost", "phpmyadmin", "culodeadriana", "MagicMirror")
    
    cursor = connection.cursor()
    sql_sentence = """INSERT INTO Login (ID) VALUES (user_ID)"""
    
    try:
        cursor.execute(sql_sentence)
        connection.commit()
    except Exception as e:
        print("Error al insertar valor en tabla Login \n")
        print(e)
        connection.rollback()
        
    connection.close()
    return;