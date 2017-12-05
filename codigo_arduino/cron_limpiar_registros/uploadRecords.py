import pymysql

connection = pymysql.connect("localhost", "phpmyadmin", "culodeadriana", "MagicMirror")
    
cursor = connection.cursor()



try:
    cursor.execute("DELETE FROM Login")
    cursor.execute("INSERT INTO Login (ID) values (%s)", int(5))
    connection.commit()
except Exception as e:
    print("Error al borrar los registros a la hora 00:00 \n")
    print(e)
    connection.rollback()
        
connection.close()

#cron instruction: 00 00 * * * path/to/your/script.py