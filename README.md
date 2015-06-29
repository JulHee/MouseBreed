# Mousebreed

## Info

Das Projekt simuliert eine Mauszucht.

## TODO

### Allgemein
- Funktion zum errechnen und setzen der Generation
- setze currentCage in loadedBreed
- Notizen sollen beim Mousebreed internen Seitenwechsel erhalten bleiben

### Akute Probleme
- **@CHRISTIAN** --> Beachte: Im Schwierigkeitsgrad „leicht“ soll der Gewichtsfaktor allerdings vernachlässigt werden. Hier sollen automatisch nur maximal 6 Mäuse (> 20 Tage) zusammengesetzt werden können, egal welchen Geschlechtes und welchen Alters (> 20). Wenn eine Maus wirft, soll sie mit ihrem Wurf automatisch in einen neuen, leeren Käfig verschoben werden.
- function setOwnGender (engine zeile 170) fehlerhaft
- Navigation oben: Elemente oben links manchmal weiß

### Christoph

### Christian
- Bitte die Funktion NextDay aus der main.js in die play.js verlegen (zumindest das Binding zu dem Namen)
- Daten der Maus (Schwierigkeitsstufe leicht)
    1. Tragzeit: 20 Tage
    2. Wurfgröße: 6
    3. Geschlechterverteilung: 1:1
    4. Absatzalter: 20 Tage (von Mutter trennen)
    5. Zuchtreife: 10 Wochen (70 Tage)
    6. Gewicht ca 0-20 Tage ist 1-8,5 g
- Geschlecht radnom in for-schleife ziehen.
- CageID richtig gesetzt?   Test: CageID wird nicht richtig in der DB geändert bei changeCage.
- Steckbrief
    - Gewicht ab 20 Tage sichtbar
- um das Feld von den Mäusen für das vom user gewählten Geschlecht, Funktion um das zu aktualisieren.
- initial Weight=1 ?
- Ziel als Objekt darstellen: ["Zielklasse(Schwierigkeitsgrade 1,...,n)","zetlich begrenzt","Anz Mäuse","Eig1",...]
- Level 1
    - Ziel = 20 weibliche mit fehlendem Transportprotein (Gentyp(-/-); schnellst möglich; 6 Wochen  alt
    - Start= 3 männliche (+/+) zuchtreif; 3 weibliche (-/-) zuchtreifGeschlecht radnom in for-schleife ziehen.

### Jörn


### Julian