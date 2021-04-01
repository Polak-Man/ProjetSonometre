#include <SoftwareSerial.h>

SoftwareSerial mySerial(63, 64); // RX 15 ; TX 14

void setup() {
  Serial.begin(115200);
  delay(50);
  mySerial.begin(9600);
  delay(50);
  Serial.println("Start");
  delay(50);
}

void loop() {
  //Serial.print("loop");
  while(mySerial.available()) {
    char Rdata;
    Rdata=mySerial.read();
      Serial.print("H");
  }
  
}

/*
  digitalWrite(5, HIGH);
  delay(250);
  digitalWrite(5, LOW);
  delay(250);
*/
