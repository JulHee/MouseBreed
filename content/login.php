<h1 class="page-header">Login</h1>
<!--
<div class="container">
    <form id="login_form" class="form-signin" action="/home" method="post">
        <h2 class="form-signin-heading">Bitte anmelden</h2>
        <label for="username" class="sr-only">Benutzername</label>
        <input type="text" id="username" name="username" class="form-control" placeholder="Benutzername" required
               autofocus>
        <label for="password" class="sr-only">Passwort</label>
        <input type="password" id="password" name="password" class="form-control" placeholder="Passwort" required>
        <a id="login_button" class="btn btn-lg btn-success btn-block">Anmelden</a>
        <span style="line-height: 29px;">Noch kein Benutzerkonto?</span>
        <a id="" class="button right" href="/register">Registrieren</a>
    </form>
</div>-->
<div class="col-sm-6 col-md-4 col-md-offset-4 login-container">
    <div class="panel panel-default">
        <div class="panel-heading">
            <strong>Melde dich an zum Fortfahren</strong>
        </div>
        <div class="panel-body">
            <form role="form" id="login_form" class="form-signin" action="/home" method="post">
                <fieldset>
                    <div class="row">
                        <div class="center-block">
                            <img class="profile-img"
                                 src="https://lh5.googleusercontent.com/-b0-k99FZlyE/AAAAAAAAAAI/AAAAAAAAAAA/eu7opA4byxI/photo.jpg?sz=120"
                                 alt="">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-md-10  col-md-offset-1 ">
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-user"></span>
                                    </span>
                                    <input id="username" class="form-control" placeholder="Benutzername"
                                           name="loginname" type="text" required
                                           autofocus>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-lock"></span>
                                    </span>
                                    <input id="password" class="form-control" placeholder="Passwort" name="password"
                                           type="password" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <a id="login_button" class="btn btn-lg btn-primary btn-block">
                                    Anmelden
                                </a>
                            </div>
                        </div>
                    </div>
                </fieldset>
            </form>
        </div>
        <div class="panel-footer ">
            Du besitzt keinen Account ?<a href="/register" onClick=""> Registriere dich hier</a>
        </div>
    </div>
</div>