<div class="col-md-12">
    <h1 class="page-header">Profil</h1>

    <div class="row">
        <div class="col-md-2">

            <div role="tabpanel">

                <!-- Nav tabs -->
                <ul class="nav nav-pills nav-stacked" role="tablist">
                    <li role="presentation" class="active">
                        <a href="#profileInfo" aria-controls="profileInfo" role="tab"
                           data-toggle="tab">
                            Allgemein
                        </a>
                    </li>
                    <li role="presentation">
                        <a href="#breedInfo" aria-controls="breedInfo" role="tab"
                           data-toggle="tab">
                            Zuchten
                        </a>
                    </li>
                    <li role="presentation">
                        <a href="#changeProfile" aria-controls="changeProfile" role="tab" data-toggle="tab">
                            Änderungen
                        </a>
                    </li>
                    <li role="presentation">
                        <a href="#deleteProfile" aria-controls="deleteProfile" role="tab" data-toggle="tab">
                            Löschen
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-md-6 col-md-offset-1">
            <!-- Tab panes -->
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane fade in active" id="profileInfo">
                    <form class="form-horizontal">
                        <div class="form-group">
                            <div class="form-group">
                                <label class="col-sm-4 control-label">Benutzername</label>

                                <div class="col-sm-8">
                                    <p class="form-control-static"><?php echo $_SESSION['userdata']['username']; ?></p>
                                </div>
                            </div>
                            <label class="col-sm-4 control-label">Vorname</label>

                            <div class="col-sm-8">
                                <p class="form-control-static"><?php echo $_SESSION['userdata']['firstname']; ?></p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label">Nachname</label>

                            <div class="col-sm-8">
                                <p class="form-control-static"><?php echo $_SESSION['userdata']['lastname']; ?></p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label">Email</label>

                            <div class="col-sm-8">
                                <p class="form-control-static"><?php echo $_SESSION['userdata']['email']; ?></p>
                            </div>
                        </div>
                    </form>
                </div>
                <div role="tabpanel" class="tab-pane fade in" id="changeProfile">

                    <div class="error_msg"></div>

                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#info_allgemein" role="tab"
                                                                  data-toggle="tab">Allgemein</a>
                        </li>
                        <li role="presentation"><a href="#info_email" role="tab"
                                                   data-toggle="tab">E-Mail-Adresse</a></li>
                        <li role="presentation"><a href="#info_pwd" role="tab" data-toggle="tab">Passwort</a></li>
                    </ul>
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane fade in active" id="info_allgemein"><br>

                            <form class="form-horizontal">
                                <div class="form-group">
                                    <label for="eingabefeldVN" class="col-sm-2 control-label">Benutzername</label>

                                    <div class="col-sm-10">
                                        <input id="username" class="form-control" name="username" type="text" class="input" value="<?php echo $_SESSION['userdata']['username']; ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="eingabefeldVN" class="col-sm-2 control-label">Vorname</label>

                                    <div class="col-sm-10">
                                        <input id="firstname" class="form-control" name="firstname" type="text" class="input" value="<?php echo $_SESSION['userdata']['firstname']; ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="eingabefeldNN" class="col-sm-2 control-label">Nachname</label>

                                    <div class="col-sm-10">
                                        <input id="lastname" class="form-control" name="lastname" type="text" class="input" value="<?php echo $_SESSION['userdata']['lastname']; ?>">
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="info_email"><br>

                            <form class="form-horizontal">
                                <div class="form-group">
                                    <label for="eingabefeldEmail" class="col-sm-2 control-label">Email</label>

                                    <div class="col-sm-10">
                                        <input id="email" class="form-control" name="email" type="text" class="input" value="<?php echo $_SESSION['userdata']['email']; ?>">
                                    </div>
                                </div>
                            </form>

                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="info_pwd"><br>

                            <form class="form-horizontal">
                                <div class="form-group">
                                    <label for="eingabefeldPasswort1" class="col-sm-2 control-label">Altes
                                        Passwort</label>

                                    <div class="col-sm-10">
                                        <input type="password" class="form-control" id="eingabefeldPasswort1"
                                               placeholder="Altes Passwort">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="eingabefeldPasswort2" class="col-sm-2 control-label">Neues
                                        Passwort</label>

                                    <div class="col-sm-10">
                                        <input type="password" class="form-control" id="eingabefeldPasswort2"
                                               placeholder="Neues Passwort">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="eingabefeldPasswort3"
                                           class="col-sm-2 control-label">Wiederholen</label>

                                    <div class="col-sm-10">
                                        <input type="password" class="form-control" id="eingabefeldPasswort3"
                                               placeholder="Wiederholen">
                                    </div>
                                </div>
                            </form>

                        </div>

                        <a id="save_button" class="btn btn-default" style="display: none; float: right;">Speichern</a>

                    </div>

                </div>
                <div role="tabpanel" class="tab-pane fade in" id="breedInfo">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Erstelldatum</th>
                            <th>Ziel</th>
                            <th>Anzahl an Mäusen</th>
                            <th>Anzahl an Käfigen</th>
                        </tr>
                        </thead>
                        <tr>
                            <td>Zuchthaus</td>
                            <td>2015-03-07</td>
                            <td>5</td>
                            <td>20</td>
                            <td>10</td>
                        </tr>
                        <tr>
                            <td>Anstalt</td>
                            <td>2015-03-05</td>
                            <td>5</td>
                            <td>40</td>
                            <td>1</td>
                        </tr>
                    </table>
                </div>
                <div role="tabpanel" class="tab-pane fade in" id="deleteProfile">
                    <div class="alert alert-danger" role="alert">
                        <p>Sind sie sich sicher das Sie ihren Account löschen wollen ?</p>
                        <br>
                        <button type="button" class="btn btn-danger">Löschen</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
