#include <SoftwareSerial.h>

SoftwareSerial mySerial(15, 14); // RX 15 ; TX 14

void setup()
{
  mySerial.begin(115200);
  delay(250);
  mySerial.println("oui");
  delay(100);
  Serial.begin(115200);
}

void loop()
{
   while(mySerial.available())
  {
    char Rdata2;
    Rdata2=mySerial.read();
    if(Rdata2=='H')
    {
      
      Serial.println("AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA");
    }
  }
}

