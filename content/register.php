<h1 class="page-header">Konto erstellen</h1>
<div class="col-md-4 col-md-offset-4">
<form class="form-horizontal" id="register_form" action="\login" >
    <div class="form-group">
        <label for="registerInputfirstName" class="col-sm-4 control-label">Vorname</label>
        <div class="col-sm-8">
            <input type="text" class="form-control" id="registerInputfirstName" placeholder="Vorname" required autofocus>
        </div>
    </div>
    <div class="form-group">
        <label for="registerInputlastName" class="col-sm-4 control-label">Nachname</label>
        <div class="col-sm-8">
            <input type="text" class="form-control" id="registerInputlastName" placeholder="Nachname" required>
        </div>
    </div>
    <div class="form-group">
        <label for="registerInputEmail" class="col-sm-4 control-label">Benutzername</label>
        <div class="col-sm-8">
            <input type="text" class="form-control" id="registerInputUsername" placeholder="Benutzername" required>
        </div>
    </div>
    <div class="form-group">
        <label for="registerInputUsername" class="col-sm-4 control-label">Email</label>
        <div class="col-sm-8">
            <input type="email" class="form-control" id="registerInputEmail" placeholder="Vorname.Nachname@example.de" required>
        </div>
    </div>
    <div class="form-group">
        <label for="registerInputPassword" class="col-sm-4 control-label">Passwort</label>
        <div class="col-sm-8">
            <input type="password" class="form-control" id="registerInputPassword" placeholder="Passwort" required>
        </div>
    </div>
    <div class="form-group">
        <label for="registerInputPasswordRe" class="col-sm-4 control-label">Passwort</label>
        <div class="col-sm-8">
            <input type="password" class="form-control" id="registerInputPasswordRe" placeholder="Passwort wiederholen" required>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-4 col-sm-8">
            <a id="register_button" class="btn btn-primary">Registrieren</a>
        </div>
    </div>
</form>
</div>