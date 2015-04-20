<div class="pull-right">
    <!--<a class="btn btn-success" href="/login" role="button">Anmelden</a>-->
    <a type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal">
        Anmelden
    </a>

    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title"><strong>Melde dich an zum Fortfahren</strong></h4>
                </div>
                <div class="modal-body">
                    <form role="form" id="login_form" class="form-signin" action="/home" method="post">
                        <fieldset>
                            <div class="row center-block">
                                <div class="center-block">
                                    <img class="profile-img"
                                         src="https://lh5.googleusercontent.com/-b0-k99FZlyE/AAAAAAAAAAI/AAAAAAAAAAA/eu7opA4byxI/photo.jpg?sz=120"
                                         alt="">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-10 col-md-offset-1">
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
                                            <input id="password" class="form-control" placeholder="Passwort"
                                                   name="password"
                                                   type="password" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <a id="login_button_top" class="btn btn-lg btn-primary btn-block">
                                            Anmelden
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                    </form>
                </div>
                <div class="modal-footer">
                    <div class="pull-left">
                    Du besitzt keinen Account ?<a href="/register" onClick=""> Registriere dich hier</a>
                        </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-md-offset-3">
        <div class="row" style="margin-top: 60px;">
            <div id="anmeldung" class="col-md-4">
                <form id="register_form" action="/login">
                    <div class="form-group">
                        <label for="registerInputEmail">Benutzername</label>
                        <input type="text" class="form-control" id="registerInputUsername" placeholder="Benutzername"
                               required>
                    </div>
                    <div class="form-group">
                        <label for="registerInputUsername">Email</label>
                        <input type="email" class="form-control" id="registerInputEmail"
                               placeholder="Vorname.Nachname@example.de" required>
                    </div>
                    <div class="form-group">
                        <label for="registerInputPassword">Passwort</label>
                        <input type="password" class="form-control" id="registerInputPassword" placeholder="Passwort"
                               required>
                    </div>
                    <a id="register_button" class="btn btn-primary">Registrieren</a>
                </form>
            </div>
            <div id="homeinfo" class="col-md-8">
                <div class="panel panel-default">
                    <div class="panel-body text-center">
                        <h1>Willkommen bei Mousebreed</h1>

                        <h3>(Hier kommt Bild)</h3>

                        <p>
                            Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor
                            invidunt
                            ut
                            labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo
                            dolores
                            et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit
                            amet.
                            Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor
                            invidunt
                            ut
                            labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo
                            dolores
                            et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit
                            amet.
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <hr class="featurette-divider">

        <div class="row featurette">
            <div class="col-md-7">
                <h2 class="featurette-heading">First featurette heading. <span
                        class="text-muted">It'll blow your mind.</span>
                </h2>

                <p class="lead">Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis
                    euismod
                    semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac
                    cursus
                    commodo.</p>
            </div>
            <div class="col-md-5">
                <img class="featurette-image img-responsive" data-src="holder.js/500x500/auto"
                     alt="Generic placeholder image">
            </div>
        </div>

        <hr class="featurette-divider">

        <div class="row featurette">
            <div class="col-md-5">
                <img class="featurette-image img-responsive" data-src="holder.js/500x500/auto"
                     alt="Generic placeholder image">
            </div>
            <div class="col-md-7">
                <h2 class="featurette-heading">Oh yeah, it's that good. <span
                        class="text-muted">See for yourself.</span>
                </h2>

                <p class="lead">Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis
                    euismod
                    semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac
                    cursus
                    commodo.</p>
            </div>
        </div>

        <hr class="featurette-divider">

        <div class="row featurette">
            <div class="col-md-7">
                <h2 class="featurette-heading">And lastly, this one. <span class="text-muted">Checkmate.</span></h2>

                <p class="lead">Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis
                    euismod
                    semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac
                    cursus
                    commodo.</p>
            </div>
            <div class="col-md-5">
                <img class="featurette-image img-responsive" data-src="holder.js/500x500/auto"
                     alt="Generic placeholder image">
            </div>
        </div>
    </div>