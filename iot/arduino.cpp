/**
  Pin 	Wiring to Arduino Uno
  SDA 	Digital 10
  SCK 	Digital 13
  MOSI 	Digital 11
  MISO 	Digital 12
  IRQ 	unconnected
  GND 	GND
  RST 	Digital 9
  3.3V 	3.3V

*/

#include <SPI.h>
#include <MFRC522.h>
#include <Arduino_JSON.h>

#define SS_PIN 10
#define RST_PIN 9

#define LOG_INFO 0
#define LOG_WARNING 1
#define LOG_ERROR 2
#define LOG_READ 3

MFRC522 myRFID(SS_PIN, RST_PIN); // Create MFRC522 instance.

int yellowLed = 2;
int greenLed = 7;

void setup()
{
  Serial.begin(9600); // Initiate a serial communication
  SPI.begin();        // Initiate  SPI bus
  myRFID.PCD_Init();  // Initiate MFRC522
  serialLog(LOG_INFO, "Please scan your RFID card...");
  // pinMode(yellowLed, OUTPUT);
  // pinMode(greenLed, OUTPUT);
}
void loop()
{
  // Wait for RFID cards to be scanned
  if (!myRFID.PICC_IsNewCardPresent())
  {
    serialLog(LOG_INFO, "No new RFID card present");
    return;
  }
  // an RFID card has been scanned but no UID
  if (!myRFID.PICC_ReadCardSerial())
  {
    serialLog(LOG_INFO, "RFID card is scanned but has no UID");
    return;
  }
  // Show UID on serial monitor
  //  digitalWrite(yellowLed, HIGH);
  //  Serial.print("USER ID tag :");
  String content = "";
  for (byte i = 0; i < myRFID.uid.size; i++)
  {
    // Serial.print(myRFID.uid.uidByte[i] < 0x10 ? " 0" : " ");
    // Serial.print(myRFID.uid.uidByte[i], HEX);
    content.concat(String(myRFID.uid.uidByte[i] < 0x10 ? " 0" : " "));
    content.concat(String(myRFID.uid.uidByte[i], HEX));
  }
  delay(500);
  // digitalWrite(yellowLed, LOW);
  // Serial.print("Message : ");
  content.toUpperCase();
  content.replace(" ", "");
  serialLog(LOG_READ, content);
  if (content == "21A18F02") // change here the UID of the card/cards that you want to give access
  {
    // Serial.println("Access granted");
    serialLog(LOG_INFO, "Access Granted!");
    digitalWrite(greenLed, HIGH);
    delay(2000);
    digitalWrite(greenLed, LOW);
  }

  else
  {
    // Serial.println("Access denied");

    // serialLog(LOG_INFO, "Access Denied!");
    delay(2000);
  }
}

void serialLog(int logStatus, String data)
{

  if (logStatus != LOG_READ)
  {
    return;
  }

  JSONVar jsonLog;

  jsonLog["status"] = getLogStatus(logStatus);
  jsonLog["data"] = data;

  String jsonString = JSON.stringify(jsonLog);
  Serial.println(data);
}

String getLogStatus(int logStatus)
{
  switch (logStatus)
  {
  case LOG_INFO:
    return "INFO";
  case LOG_WARNING:
    return "WARNING";
  case LOG_ERROR:
    return "ERROR";
  default:
    return "UNKNOWN";
  }
}