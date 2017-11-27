import serial
arduino = serial.Serial('/dev/ttyACM0', 9600)
while True:
	rawString = arduino.readline()
	print(rawString)
	
arduino.close()
