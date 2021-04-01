#include <Arduino.h>

void bonjour(){
  static int compteur = 0;
  compteur++;
  Serial.println(compteur);
}

