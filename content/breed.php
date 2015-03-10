<h1 class="page-header"><?php echo $loadedBreed['name']; ?>
    <button type="button" id="sidebarNextDay"
            class="pull-right btn btn-info"><span class="glyphicon glyphicon-time"
                                                  aria-hidden="true"></span> Nächter Tag
    </button>
</h1>

<div class="row">
    <div class="col-md-4">
        <div class="panel panel-default max-height">
            <div class="panel-heading">Käfig</div>
            <div id="ListCage" class="list-group">
                <a href="#" class="list-group-item active">Käfig 1</a>
                <a href="#" class="list-group-item">Käfig 2</a>
                <a href="#" class="list-group-item">Käfig 3</a>
                <a href="#" class="list-group-item">Käfig 4</a>
                <a href="#" class="list-group-item">Käfig 5</a>
                <a href="#" class="list-group-item">Käfig 6</a>
                <a href="#" class="list-group-item">Käfig 7</a>
                <a href="#" class="list-group-item">Käfig 8</a>
                <a href="#" class="list-group-item">Käfig 9</a>
                <a href="#" class="list-group-item">Käfig 10</a>
                <a href="#" class="list-group-item">Käfig 11</a>
                <a href="#" class="list-group-item">Käfig 12</a>
                <a href="#" class="list-group-item">Käfig 13</a>
                <a href="#" class="list-group-item">Käfig 14</a>
                <a href="#" class="list-group-item">Käfig 15</a>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="panel panel-default max-height">
            <div class="panel-heading">Mausung</div>
            <div id="ListMouse" class="list-group">
                <a href="#" class="list-group-item active">Maus 1</a>
                <a href="#" class="list-group-item">Maus 2</a>
                <a href="#" class="list-group-item">Maus 3</a>
                <a href="#" class="list-group-item">Maus 4</a>
                <a href="#" class="list-group-item">Maus 5</a>
                <a href="#" class="list-group-item">Maus 6</a>
                <a href="#" class="list-group-item">Maus 7</a>
                <a href="#" class="list-group-item">Maus 8</a>
                <a href="#" class="list-group-item">Maus 9</a>
                <a href="#" class="list-group-item">Maus 10</a>
                <a href="#" class="list-group-item">Maus 11</a>
                <a href="#" class="list-group-item">Maus 12</a>
                <a href="#" class="list-group-item">Maus 13</a>
                <a href="#" class="list-group-item">Maus 14</a>
                <a href="#" class="list-group-item">Maus 15</a>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="panel panel-default max-height">
            <div class="panel-heading">Optionen</div>
            <div class="panel-body">
                    <button type="button" class="btn btn-primary btn-lg btn-block">Maus verschieben</button>
                    <button type="button" class="btn btn-default btn-lg btn-block">Maus bestimmen</button>
                    <button type="button" class="btn btn-primary btn-lg btn-block">Block level button</button>
                    <button type="button" class="btn btn-default btn-lg btn-block">Block level button</button>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">Steckbrief</div>
            <div id="MouseInfo" class="panel-body">
                <div class="row">
                    <div class="col-md-6">
                        <form class="form-horizontal">
                            <div class="form-group">
                                <label class="col-sm-4 control-label">Name</label>

                                <div class="col-sm-8">
                                    <p id="mouseinfoName" class="form-control-static">Klaus</p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label">Gewicht</label>

                                <div class="col-sm-8">
                                    <p id="mouseinfoWeight" class="form-control-static">400g</p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label">Geschlecht</label>

                                <div class="col-sm-8">
                                    <p id="mouseinfoGender" class="form-control-static">Männlich</p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label">Alter</label>

                                <div class="col-sm-8">
                                    <p id="mouseinfoAge" class="form-control-static">10 Tage</p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label">Eltern</label>

                                <div class="col-sm-8">
                                    <p id="mouseinfoParents" class="form-control-static">Franz & Maria</p>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-8 col-sm-offset-4">
                                    <button type="button" class="btn btn-default" data-toggle="modal"
                                            data-target="#chooseGender">
                                        Geschlecht bestimmen
                                    </button>
                                </div>
                            </div>
                            <!-- Modal -->
                            <div class="modal fade" id="chooseGender" tabindex="-1" role="dialog"
                                 aria-labelledby="chooseGender"
                                 aria-hidden="true">
                                <div class="modal-dialog modal-sm">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                                    aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title" id="myModalLabel">Geschlecht bestimmen</h4>
                                        </div>
                                        <div class="modal-body">
                                            <img id="mouseinfoGenderPic" src="/data/img/bildkarten/Maennchen_2846.png"
                                                 class="img-rounded img-responsive center-block">
                                        </div>
                                        <div class="modal-footer">
                                            <button id="chooseGenderMale" type="button" class="btn btn-primary pull-left">Männlich</button>
                                            <button id="chooseGenderFemale" type="button" class="btn btn-primary">Weiblich</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-6">
                        <img id="mouseinfoProfileImg" src="/data/img/Femalemouse.png"
                             class="img-responsive img-thumbnail">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

