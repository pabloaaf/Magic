#!/bin/bash

salida="$(pgrep -fl /home/pi/Magic/codigo/lectura_rasp/identificacion_rasp_pi.py)"
if [ -z "$salida" ]; then
	echo "El script the python de lectura de arduino ha dejado de funcionar: " $(date) >> /home/magic/Desktop/log.txt
	echo "Ejecutando el script otra vez."
	python 	/home/pi/Magic/codigo/lectura_rasp/identificacion_rasp_pi.py
fi
