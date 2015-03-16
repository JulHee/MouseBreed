<h1 class="page-header">Login</h1>
<div class="container">
	<form id="login_form" class="form-signin" action="/home" method="post">
        <h2 class="form-signin-heading">Bitte anmelden</h2>
        <label for="username" class="sr-only">Benutzername</label>
        <input type="text" id="username" name="username" class="form-control" placeholder="Benutzername" required autofocus>
        <label for="password" class="sr-only">Passwort</label>
        <input type="password" id="password" name="password" class="form-control" placeholder="Passwort" required>
        <a id="login_button" class="btn btn-lg btn-success btn-block">Anmelden</a>
            <span style="line-height: 29px;">Noch kein Benutzerkonto?</span>
    		<a id="" class="button right" href="/register">Registrieren</a>
    </form>
</div>