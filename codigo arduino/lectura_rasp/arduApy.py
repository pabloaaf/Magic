import serial, time
arduino = serial.Serial('COM4', 9600)
while True:
  time.sleep(2)
  rawString = arduino.readline()
  print(rawString)
arduino.close()
