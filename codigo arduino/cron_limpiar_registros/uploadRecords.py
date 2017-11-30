import pymysql

connection = pymysql.connect("localhost", "phpmyadmin", "culodeadriana", "MagicMirror")
    
cursor = connection.cursor()
delete_sentence = """DELETE * FROM Login"""
add_sentence = """INSERT INTO Login (ID) values (0)"""

try:
    cursor.execute(delete_sentence)
	cursor.execute(add_sentence)
    connection.commit()
except Exception as e:
    print("Error al borrar los registros a la hora 00:00 \n")
    print(e)
    connection.rollback()
        
connection.close()

#cron instruction: 00 00 * * * path/to/your/script.py