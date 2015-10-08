<script type="text/javascript" src="../script/js/ext/jquery-2.1.1.min.js"></script>
<h1 class="page-header">Testpage</h1>
<h3>Testen Sie hier die Benachrichtigungen</h3><br>
<form class="form-horizontal">
    <div class="form-group">
        <label for="name" class="col-sm-2 control-label">Titel:</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="title" placeholder="Titel">
        </div>
    </div>
    <div class="form-group">
        <label for="name" class="col-sm-2 control-label">Nachricht:</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="name" placeholder="Nachrichtentext">
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label">Art:</label>
        <div class="col-sm-10">
            <label class="radio-inline">
                <input type="radio" name="inlineRadioOptionen" id="inlineRadio1" value="success"> Erfolg
            </label>
            <label class="radio-inline">
                <input type="radio" name="inlineRadioOptionen" id="inlineRadio2" value="info"> Information
            </label>
            <label class="radio-inline">
                <input type="radio" name="inlineRadioOptionen" id="inlineRadio3" value="warn"> Warnung
            </label>
            <label class="radio-inline">
                <input type="radio" name="inlineRadioOptionen" id="inlineRadio3" value="error"> Fehler
            </label>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button id="mybutton" type="button" class="btn btn-default">Anzeigen</button>
        </div>
    </div>
</form>
<button id="save">Speichern</button>




