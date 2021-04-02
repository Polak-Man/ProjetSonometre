#include <Arduino.h>
#include <ESP8266WiFi.h>

// Variable -------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

// Replace with your network credentials
const char* ssid     = "Sonometre";
const char* password = "012343210";

// Variable to store the HTTP request
String header;

// Set web server port number to 80
WiFiServer server(80);

// Variable seuil volume
int seuilVert = 0;
int seuilOrange = 0;
int seuilRouge = 0;

// Variable de récupération des seuil
int debutV = 0;
int debutO = 0;
int debutR = 0;
int finSeuil = 0;


// Variable de sécurité
String buttonAdmin = "off";
String mdpAdmin = "S0n0m%C3%A8tre";
String mdpAdminInput = " ";
int mdpStart = 0;
int mdpEnd = 0;

// Current time
unsigned long currentTime = millis();
// Previous time
unsigned long previousTime = 0; 
// Define timeout time in milliseconds (example: 2000ms = 2s)
const long timeoutTime = 2000;

// Fonction -------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

void parle() {
  Serial.println("555555555555555555555555555555555555555555555555");
}

void WiFi_Setup() {

  // Connect to Wi-Fi network with SSID and password
  Serial.print("Connecting to ");
  Serial.println(ssid);
  WiFi.begin(ssid, password);
  while (WiFi.status() != WL_CONNECTED) {
    delay(500);
    Serial.print(".");
  }
  // Print local IP address and start web server
  Serial.println("");
  Serial.println("WiFi connected.");
  Serial.println("IP address: ");
  Serial.println(WiFi.localIP());
  server.begin();
}

void site() {
  WiFiClient client = server.available();   // Listen for incoming clients

  if (client) {                             // If a new client connects,
    Serial.println("New Client.");          // print a message out in the serial port
    String currentLine = "";                // make a String to hold incoming data from the client
    currentTime = millis();
    previousTime = currentTime;
    while (client.connected() && currentTime - previousTime <= timeoutTime) { // loop while the client's connected
      currentTime = millis();         
      if (client.available()) {             // if there's bytes to read from the client,
        char c = client.read();             // read a byte, then
        Serial.write(c);                    // print it out the serial monitor
        header += c;
        if (c == '\n') {                    // if the byte is a newline character
          // if the current line is blank, you got two newline characters in a row.
          // that's the end of the client HTTP request, so send a response:
          if (currentLine.length() == 0) {
            // HTTP headers always start with a response code (e.g. HTTP/1.1 200 OK)
            // and a content-type so the client knows what's coming, then a blank line:
            client.println("HTTP/1.1 200 OK");
            client.println("Content-type:text/html");
            client.println("Connection: close");
            client.println();
            
/*            // turns the GPIOs on and off
            if (header.indexOf("GET /5/on") >= 0) {
              Serial.println("GPIO 5 on");
              output5State = "on";
              Serial.println("555555555555555555555555555555555555555555555555");
              digitalWrite(output5, HIGH);
            } else if (header.indexOf("GET /5/off") >= 0) {
              Serial.println("GPIO 5 off");
              output5State = "off";
              digitalWrite(output5, LOW);
            } else if (header.indexOf("GET /4/on") >= 0) {
              Serial.println("GPIO 4 on");
              output4State = "on";
              digitalWrite(output4, HIGH);
            } else if (header.indexOf("GET /4/off") >= 0) {
              Serial.println("GPIO 4 off");
              output4State = "off";
              digitalWrite(output4, LOW);
            } else if (header.indexOf("GET /3/on") >= 0) {
              Serial.println("GPIO 3 on");
              output3State = "on";
              Serial.println("oui");
            } else if (header.indexOf("GET /3/off") >= 0) {
              Serial.println("GPIO 3 off");
              output3State = "off";
              Serial.println("non");
            }*/

            // Detection d'index
            if (header.indexOf("GET /5") >= 0) {
              Serial.println("Truc");
              
      // page 2
            // Display the HTML web page
            client.println("<!DOCTYPE html><html>");
            client.println("<head><meta charset=\"utf-8\" name=\"viewport\" content=\"width=device-width, initial-scale=1\">");
            client.println("<link rel=\"icon\" href=\"data:,\">");
            // CSS to style the on/off buttons 
            // Feel free to change the background-color and font-size attributes to fit your preferences
            client.println("<style> html { font-family: Helvetica; }");
            client.println(".titre { position: relative; text-align: center; color: orange; }");
            client.println(".center_button_case { position: relative; text-align: center; }");
            client.println(".center_button {  background-color: #195B6A; border: none; color: white; padding: 16px 40px; text-decoration: none; font-size: 30px; cursor: pointer; }");
            client.println(".center_button2 { background-color: #77878A; }");
            client.println(".up_right_button_case { display: inline-block; position: absolute; text-align: center; top: 5%; right: 5%; }");
            client.println(".admin_button { position: relative; background-color: black; border: none; color: white; padding: 16px 40px; text-decoration: none; font-size: 30px; cursor: pointer; }");
            client.println(".description { position: relative; }");
            client.println("</style></head>");
            
            // Web Page Heading
            client.println("<body><h1>5</h1>");

          // Boutton Accueil  
            // Display current state, and ON/OFF buttons for GPIO 5
            client.println("<p><a href=\"/accueil\"><button class=\"center_button_case center_button\">Acceuil</button></a></p>");
                        
            client.println("</body></html>");
            
            // The HTTP response ends with another blank line
            client.println();
            // Break out of the while loop
            break;
            
            } else if (header.indexOf("GET /?mdp=") >= 0) {
              mdpStart = header.indexOf('=');
              mdpEnd = header.indexOf('&');
              mdpAdminInput = header.substring(mdpStart+1, mdpEnd);
              Serial.println(mdpAdminInput);
              if (mdpAdminInput == mdpAdmin) {
                Serial.println("oui");
              } else {
                Serial.println("non");
                client.println("https://youtu.be/dQw4w9WgXcQ");
              }
                            
            } else {

        // page accueil
              // Display the HTML web page
            client.println("<!DOCTYPE html><html>");
            client.println("<head><meta charset=\"utf-8\" name=\"viewport\" content=\"width=device-width, initial-scale=1\">");
            client.println("<link rel=\"icon\" href=\"data:,\">");
            // CSS to style the on/off buttons 
            // Feel free to change the background-color and font-size attributes to fit your preferences
            client.println("<style> html { font-family: Helvetica; }");
            client.println(".titre { position: relative; top: 3%; text-align: center; color: orange; font-size: 50px; }");
            client.println(".center_button_case { position: relative; top: 10%; text-align: center; }");
            client.println(".center_button {  background-color: #195B6A; border: none; color: white; padding: 16px 40px; text-decoration: none; font-size: 30px; cursor: pointer; }");
            client.println(".center_button2 { background-color: #77878A; }");
            client.println(".up_right_button_case { display: inline-block; position: absolute; text-align: center; top: 5%; right: 5%; }");
            client.println(".desc_parametre { position: relative; font-size: 20px; font-weight: bold; margin-block-end: 5px;}");
            client.println(".admin_button { position: relative; background-color: #e6e6e6; border: none; color: black; padding: 6px 10px; text-decoration: none; font-size: 20px; cursor: pointer; }");
            client.println(".mdp_input { position: relative; }");
            client.println(".description { position: relative; }");
            client.println("</style></head>");
            
            // Web Page Heading
            client.println("<body><h1 class=\"titre\">Sonomètre</h1>");

          // Boutton 5
            // Afficher le boutton
            client.println("<div class=\"center_button_case\">");
            client.println("<p class=\"description\">Page 2</p>");
            client.println("<p><a href=\"/5\"><button class=center_button>ON</button></a></p>");
            client.println("</div>");

          // Formulaire Connexion
            client.println("<form class=\"up_right_button_case\">");
            client.println("<p class=\"desc_parametre\">Paramètre</p>");
            client.println("<input type=\"password\" class=\"mdp_input\" name=\"mdp\" placeholder=\"Mot de passe\"/> <br />");
            client.println("<button type=\"submit\" class=\"admin_button\" name=\"envoyer\">Acceder</button>");
            client.println("</form>");

          /*
            // Display current state, and ON/OFF buttons for GPIO 5  
            client.println("<p>GPIO 5 - State " + output5State + "</p>");
            // If the output5State is off, it displays the ON button       
            if (output5State=="off") {
              client.println("<p><a href=\"/5/on\"><button class=\"left_button\">ON</button></a></p>");
            } else {
              client.println("<p><a href=\"/5/off\"><button class=\"left_button left_button2\">OFF</button></a></p>");
            } 

          
            // Display current state, and ON/OFF buttons for GPIO 4  
            client.println("<p>GPIO 4 - State " + output4State + "</p>");
            // If the output4State is off, it displays the ON button       
            if (output4State=="off") {
              client.println("<p><a href=\"/4/on\"><button class=\"left_button\">ON</button></a></p>");
            } else {
              client.println("<p><a href=\"/4/off\"><button class=\"left_button left_button2\">OFF</button></a></p>");
            }
          

            // Display current state, and ON/OFF buttons for GPIO 3  
            client.println("<p>GPIO 3 - State " + output3State + "</p>");
            // If the output5State is off, it displays the ON button       
            if (output3State=="off") {
              client.println("<p><a href=\"/3/on\"><button class=\"left_button\">ON</button></a></p>");
            } else {
              client.println("<p><a href=\"/3/off\"><button class=\"left_button left_button2\">OFF</button></a></p>");
            } 
          */
            client.println("</body></html>");
            
            // The HTTP response ends with another blank line
            client.println();
            // Break out of the while loop
            break;
            }
            
            
          } else { // if you got a newline, then clear currentLine
            currentLine = "";
          }
        } else if (c != '\r') {  // if you got anything else but a carriage return character,
          currentLine += c;      // add it to the end of the currentLine
        }
      }
    }
    // Clear the header variable
    header = "";
    // Close the connection
    client.stop();
    Serial.println("Client disconnected.");
    Serial.println("");
  }
}

