
<p class="top_head">Neue Zucht starten</p>

<p class="head">1. Schwierigkeitsgrad auswählen</p>

<form>
    <table class="difficulty_table">
        <tr class="description_row">
            <td>
                <p>Leicht</p>
                <ul>
                    <li>Tragzeit: 20 Tage</li>
                    <li>Wurfgröße: 6 oder 8 Junge</li>
                    <li>Geschlechterverteilung: 1:1</li>
                    <li>Absatzalter: 20 Tage</li>
                    <li>Zuchtreife: 10 Wochen (70 Tage)</li>
                    <li>Fortpflanzungserfolg sofort</li>
                </ul>
            </td>
            <td class="middle_collum">
                <p>Mittel</p>
            </td>
            <td>
                <p>Schwer</p>
            </td>
        </tr>
        <tr class="checkbox_row">
            <td>
                <input type="radio" name="difficulty" value="easy">
            </td>
            <td class="middle_collum">
                <input type="radio" name="difficulty" value="middle">
            </td>
            <td>
                <input type="radio" name="difficulty" value="hard">
            </td>
        </tr>
    </table>

    <p class="head scenario_head hidden">2. Szenario auswählen</p>

    <div id="easy" class="scenario_difficulty">
        <div class="h_menu">
            <a id="1" class="h_menu_selected">
                Szenario 1
            </a>
            <a id="2">
                Szenario 2
            </a>
        </div>

        <div id="1" class="scenario">
            <p>
                <span class="h5">Ausgangssituation:</span></br>
                Sie sind an der Bioenergetik von murinen Lebermitochondrien interessiert  und benötigen 20 weibliche Mäuse, denen ein bestimmtes Transportprotein in der inneren Mitochondrienmembran fehlt.</br>
                Die Ausprägung des Proteins verhält sich entsprechend dem dominant-rezessiven Erbgang nach Mendel.</br>
                </br>
                Genotyp (-/-) = Phänotyp (Protein fehlt)</br>
                Genotyp (+/+) = Phänotyp (Protein ist vorhanden)</br>
                Genotyp (+/-) = Phänotyp (Protein ist vorhanden)</br>
                </br>
                Sie haben von einem Kooperationspartner Elterntiere erhalten: 3 zuchtreife männliche Mäuse (+/+) und 3 zuchtreife weibliche Mäuse (-/-).</br>
                </br>
                <span class="h5">Aufgabe:</span></br>
                Züchten Sie aus der F1-Generation schnellstmöglich 20 weibliche Mäuse im Alter von sechs Wochen, denen das Transportprotein (homozygot) fehlt (-/-).</br>
                </br>
                <span class="h5">Zeit:</span></br>
                Keine zeitliche Beschränkung.</br>
                </br>
                <span class="h5">Einstellungen:</span></br>
                Wurfgröße: 8 Tiere
            </p>
        </div>

        <div id="2" class="scenario hidden">
            <p>
                <span class="h5">Ausgangssituation:</span></br>
                Ein Defekt im Gen C.B-17scid löst bei Mäusen eine schwerwiegende Immundefizienz aus
                (SCID = severe combined immunodeficiency), wobei die Funktion von B- und T-Lymphocyten sowie die
                Produktion spezifischer Antikörper eingeschränkt sind. Der Erbgang ist rezessiv, wodurch SCID nur bei
                solchen Mäusen phänotypisch sichtbar wird, die homozygot für das defekte Gen sind (-/-).</br>
                Sie möchten für Ihre Forschungen immundefiziente Mäuse züchten und haben aus der Zucht eines anderen
                Institutes 2 weibliche Mäuse erhalten, die für das defekte Gen C.B-17scid heterozygot sind (+/-).
                Weiterhin stehen Ihnen 3 Männchen zur Verfügung, die homozygot für das gesunde Gen C.B-17 sind (+/+).</br>
                </br>
                <span class="h5">Aufgabe:</span></br>
                Das Zuchtziel sind 10 weibliche Mäuse im Alter von 4 Wochen, die homozygot für das defekte Gen C.B-17scid sind (-/-).</br>
                </br>
                <span class="h5">Zeit:</span></br>
                Keine zeitliche Beschränkung.</br>
                </br>
                <span class="h5">Einstellungen:</span></br>
                Wurfgröße: 6 Tiere
            </p>
        </div>
    </div>


    <div id="middle" class="scenario_difficulty">
        <div class="h_menu">
            <a id="1" class="h_menu_selected">
                Szenario 1
            </a>
            <a id="2">
                Szenario 2
            </a>
            <a id="3">
                Szenario 3
            </a>
        </div>

        <div id="1" class="scenario">
            <p>
                Middle 1
            </p>
        </div>

        <div id="2" class="scenario hidden">
            <p>
                Middle 2
            </p>
        </div>

        <div id="3" class="scenario hidden">
            <p>
                Middle 3
            </p>
        </div>
    </div>


    <div id="hard" class="scenario_difficulty">
        <div class="h_menu">
            <a id="1" class="h_menu_selected">
                Szenario 1
            </a>
            <a id="2">
                Szenario 2
            </a>
        </div>

        <div id="1" class="scenario">
            <p>
                Hard 1
            </p>
        </div>

        <div id="2" class="scenario hidden">
            <p>
                Hard 2
            </p>
        </div>
    </div>

    <div class="scenario_head hidden">
        <p class="head">3. Name eingeben</p>

        <input id="breedname" class="breedname_input" name="breedname" type="text">

        <a class="newbreed_button button">Starten</a>
    </div>

</form>
