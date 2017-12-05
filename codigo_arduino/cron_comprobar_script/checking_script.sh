#!/bin/bash

salida="$(pgrep -fl /home/magic/Magic/codigo_arduino/lectura_rasp/arduApy.py)"
if [ -z "$salida" ]; then
	echo "El script the python de lectura de arduino ha dejado de funcionar: " $(date) >> /home/magic/Desktop/log.txt
		
fi
