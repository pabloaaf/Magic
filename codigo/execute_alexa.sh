#!/bin/bash

cd /home/pi/Desktop/alexa-avs-sample-app/samples/
cd companionService && npm start&

sleep 5

cd /home/pi/Desktop/alexa-avs-sample-app/samples/
cd javaclient && mvn exec:exec&

sleep 25

cd /home/pi/Desktop/alexa-avs-sample-app/samples/
cd wakeWordAgent/src && ./wakeWordAgent -e kitt_ai&
