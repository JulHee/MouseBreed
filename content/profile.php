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
                            <label class="col-sm-4 control-label">Vorname</label>

                            <div class="col-sm-8">
                                <p class="form-control-static">(╯°□°)╯︵ ┻━┻ ︵ ╯(°□° ╯)</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label">Nachname</label>

                            <div class="col-sm-8">
                                <p class="form-control-static">┬─┬﻿ ノ( ゜-゜ノ)</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label">Benutzername</label>

                            <div class="col-sm-8">
                                <p class="form-control-static">(╯°□°)╯︵ ┻━┻</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label">Email</label>

                            <div class="col-sm-8">
                                <p class="form-control-static">(ﾉಥДಥ)ﾉ︵┻━┻･/</p>
                            </div>
                        </div>
                    </form>
                </div>
                <div role="tabpanel" class="tab-pane fade in" id="changeProfile">
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
                                    <label for="eingabefeldVN" class="col-sm-2 control-label">Vorname</label>

                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="eingabefeldVN"
                                               placeholder="Vorname">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="eingabefeldNN" class="col-sm-2 control-label">Nachname</label>

                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="eingabefeldNN"
                                               placeholder="Nachname">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <button type="submit" class="btn btn-default">Speichern</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="info_email"><br>

                            <form class="form-horizontal">
                                <div class="form-group">
                                    <label for="eingabefeldEmail" class="col-sm-2 control-label">Email</label>

                                    <div class="col-sm-10">
                                        <input type="email" class="form-control" id="eingabefeldEmail"
                                               placeholder="Email">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="eingabefeldEmail2"
                                           class="col-sm-2 control-label">Wiederholen</label>

                                    <div class="col-sm-10">
                                        <input type="email" class="form-control" id="eingabefeldEmail2"
                                               placeholder="Wiederholen">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <button type="submit" class="btn btn-default">Speichern</button>
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
                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <button type="submit" class="btn btn-default">Speichern</button>
                                    </div>
                                </div>
                            </form>

                        </div>
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
