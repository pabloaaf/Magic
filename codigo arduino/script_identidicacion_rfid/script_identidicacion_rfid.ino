#include <SPI.h>
#include <MFRC522.h>

#define RST_PIN  9    //Pin 9 para el reset del RC522
#define SS_PIN  10   //Pin 10 para el SS (SDA) del RC522
MFRC522 mfrc522(SS_PIN, RST_PIN); //Creamos el objeto para el RC522

// Declaración ID usuarios
byte ID_leido [4];

byte ID_Usuario1 [4] = {0x23, 0x2D, 0x40, 0x02};
byte ID_Usuario2 [4] = {0xF4, 0x9D, 0xD1, 0xB7};
byte ID_Usuario3 [4] = {0x26, 0x8D, 0x89, 0x18};
byte ID_Usuario4 [4] = {0xD9, 0xE2, 0xF1, 0x75};



void setup() {
  Serial.begin(9600); //Iniciamos la comunicación  serial
  SPI.begin();        //Iniciamos el Bus SPI
  mfrc522.PCD_Init(); // Iniciamos  el MFRC522
  Serial.println("Lectura del UID");
}

void loop() {
  // Revisamos si hay nuevas tarjetas  presentes
  if ( mfrc522.PICC_IsNewCardPresent()) 
        {  
      //Seleccionamos una tarjeta
            if ( mfrc522.PICC_ReadCardSerial()) 
            {
                  // Enviamos serialemente su UID
                  // Serial.print("Card UID:");
                  for (byte i = 0; i < mfrc522.uid.size; i++) {
                          Serial.print(mfrc522.uid.uidByte[i] < 0x10 ? " 0" : " ");
                          Serial.print(mfrc522.uid.uidByte[i], HEX);

                          ID_leido[i] = mfrc522.uid.uidByte[i];
                  } 
                  // Serial.println();
                  if(compareID(ID_leido, ID_Usuario1)) {
                    Serial.print("1");
                  }else if(compareID(ID_leido, ID_Usuario2)) {
                    Serial.print("2");
                  }else if(compareID(ID_leido, ID_Usuario3)) {
                    Serial.print("3");
                  }else if(compareID(ID_leido, ID_Usuario4)) {
                    Serial.print("4");
                  }
                  Serial.println();
                  // Terminamos la lectura de la tarjeta  actual
                  mfrc522.PICC_HaltA();         
            }      
  } 
}


boolean compareID (byte ID_leido[], byte ID_usuario[]){
  for (int i = 0; i < 4; i++) {
    if(ID_leido[i] != ID_usuario[i])
      return false;
  }
  return true;
}


