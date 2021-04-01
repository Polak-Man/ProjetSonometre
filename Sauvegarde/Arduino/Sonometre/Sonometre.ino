/*********
  Rui Santos
  Complete project details at https://randomnerdtutorials.com  
*********/

// Load Wi-Fi library
#include <ESP8266WiFi.h>

#include "site.h"

void setup() {  
  Serial.begin(115200);
  WiFi_Setup();
}

void loop() {
  site();
}
