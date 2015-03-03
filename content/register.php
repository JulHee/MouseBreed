<h1 class="page-header">Konto erstellen</h1>
<form class="form-horizontal" id="register_form">
    <div class="form-group">
        <label for="registerInputfirstName" class="col-sm-2 control-label">Vorname</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="registerInputfirstName" placeholder="Vorname" required autofocus>
        </div>
    </div>
    <div class="form-group">
        <label for="registerInputlastName" class="col-sm-2 control-label">Nachname</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="registerInputlastName" placeholder="Nachname" required>
        </div>
    </div>
    <div class="form-group">
        <label for="registerInputEmail" class="col-sm-2 control-label">Benutzername</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="registerInputEmail" placeholder="Benutzername" required>
        </div>
    </div>
    <div class="form-group">
        <label for="registerInputUsername" class="col-sm-2 control-label">Email</label>
        <div class="col-sm-10">
            <input type="email" class="form-control" id="registerInputUsername" placeholder="Vorname.Nachname@example.de" required>
        </div>
    </div>
    <div class="form-group">
        <label for="registerInputPassword" class="col-sm-2 control-label">Password</label>
        <div class="col-sm-10">
            <input type="password" class="form-control" id="registerInputPassword" placeholder="Password" required>
        </div>
    </div>
    <div class="form-group">
        <label for="registerInputPasswordRe" class="col-sm-2 control-label">Password</label>
        <div class="col-sm-10">
            <input type="password" class="form-control" id="registerInputPasswordRe" placeholder="Password wiederholen" required>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button id="register_button" type="submit" class="btn btn-success">Registrieren</button>
        </div>
    </div>
</form>