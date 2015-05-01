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
        <div class="col-md-9 col-md-offset-1">
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
                            <a id="" class="btn btn-default save_button_general" style="float: right;">Speichern</a>
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
                            <a id="" class="btn btn-default save_button_general" style="float: right;">Speichern</a>
                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="info_pwd"><br>

                            <form class="form-horizontal">
                                <div class="form-group">
                                    <label for="eingabefeldPasswort1" class="col-sm-2 control-label">Altes
                                        Passwort</label>

                                    <div class="col-sm-10">
                                        <input type="password" class="form-control" id="oldPassword"
                                               placeholder="Altes Passwort">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="eingabefeldPasswort2" class="col-sm-2 control-label">Neues
                                        Neues Passwort</label>

                                    <div class="col-sm-10">
                                        <input type="password" class="form-control" id="newPassword1"
                                               placeholder="Neues Passwort">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="eingabefeldPasswort3"
                                           class="col-sm-2 control-label">Wiederholen</label>

                                    <div class="col-sm-10">
                                        <input type="password" class="form-control" id="newPassword2"
                                               placeholder="Wiederholen">
                                    </div>
                                </div>
                            </form>
                            <a id="changePasswordButton" class="btn btn-default save_button_password" style="float: right;">Speichern</a>
                        </div>
                    </div>

                </div>
                <div role="tabpanel" class="tab-pane fade in" id="breedInfo">
                    <table class="table table-hover table-bordered">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Erstelldatum</th>
                            <th>Ziel</th>
                            <th>Anzahl an Mäusen</th>
                            <th>Anzahl an Käfigen</th>
                        </tr>
                        </thead>
                        <?php foreach ($_SESSION['breeds'] as $breed) { ?>
                            <tr>
                                <td><?php echo $breed['name']; ?></td>
                                <td><?php echo $breed['time_of_creation']; ?></td>
                                <td><?php echo $breed['target']; ?></td>
                                <td><?php echo $breed['numberOfMice']; ?></td>
                                <td><?php echo $breed['numberOfCages']; ?></td>
                            </tr>
                        <?php } ?>
                    </table>
                </div>
                <div role="tabpanel" class="tab-pane fade in" id="deleteProfile">
                    <div class="alert alert-danger" role="alert">
                        <p>Sind sie sich sicher, dass Sie ihr Benutzerkonto löschen wollen? Alle damit verbundenen Informationen gehen verloren.</p>
                        <br>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" id="deleteAccountPassword" placeholder="Passwort">
                        </div>
                        <br>
                        <button id="deleteAccount" type="button" class="btn btn-danger">Löschen</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
