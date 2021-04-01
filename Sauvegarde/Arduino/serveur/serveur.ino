
/*#define PIN_SERIAL2_RX (34ul) // Pin description number for PIO_SERCOM on D12
#define PIN_SERIAL2_TX (36ul) // Pin description number for PIO_SERCOM on D10
#define PAD_SERIAL2_TX (UART_TX_PAD_2) // SERCOM pad 2
#define PAD_SERIAL2_RX (SERCOM_RX_PAD_3) // SERCOM pad 3

Uart Serial2(&sercom1, PIN_SERIAL2_RX, PIN_SERIAL2_TX, PAD_SERIAL2_RX, PAD_SERIAL2_TX);
*/
#include <SoftwareSerial.h>

SoftwareSerial mySerial(15, 14); // RX 15 ; TX 14

void setup()
{
  mySerial.begin(115200);
} 

void loop()
{
  mySerial.print("H");
  delay(500);
/*   while(Serial.available())
  {
    char Rdata;
    Rdata=Serial.read();
    if(Rdata=='A'|Rdata=='a')
    {
      Serial.print("H");
    }
  }*/
}

