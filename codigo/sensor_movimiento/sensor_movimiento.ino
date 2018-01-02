byte sensor = 7;
int time_counter = 0;

void setup() {
  pinMode(sensor, INPUT);
  Serial.begin(9600);
}

void loop() {
  int value = digitalRead(sensor);
  
  if(value == HIGH) {
    //Detecta a un usuario y manda comando al sript de python
    Serial.println("Encender");
    time_counter = 60;
   
   // Llamar fichero python
   
  }else if (value == LOW){
    //Resta 1 al contador
    if(time_counter>-1){
      time_counter-=1; 
    }
  }
  
  if(time_counter==0){
    //Manda orden de apagar la pantalla al script the python
    Serial.println("Apagar");
  }  
  delay(1000);
}
