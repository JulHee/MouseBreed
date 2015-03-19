<h1 class="page-header">Play
    <button type="button" id="sidebarNextDay"
            class="pull-right btn btn-info"><span class="glyphicon glyphicon-time"
                                                  aria-hidden="true"></span> Nächter Tag
    </button>
</h1>
<a id="mouseCageNew" class="btn btn-success pull-right" role="button" style="margin-bottom: 20px">
    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
    Käfig hinzufügen
</a>
<div class="btn-group" role="group" aria-label="...">
    <div class="btn-group" data-toggle="buttons">
        <label class="btn btn-primary active">
            <input type="radio" name="grab" value="0" id="selectedInfo" autocomplete="off" checked>Information
        </label>
        <label class="btn btn-primary">
            <input type="radio" name="grab" value="1" id="selectedGrab" autocomplete="off"> Auswählen
        </label>
    </div>
</div>
<div class="col-md-12 mybg">
    <div class="row">
                <div id="canvasContainer" class="nonresponsibile"></div>
    </div>
    <div class="row">
            <div class="panel panel-default min-height">
                <div class="panel-heading">Ausgewählte Mäuse</div>
                <div class="panel-body">
                    <table id="mouseSelected" class="table table-hover">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Geschlecht</th>
                            <th>Genotyp</th>
                            <th>Generation</th>
                            <th>Alter</th>
                            <th>Gewicht</th>
                            <th>Käfig</th>
                            <th>Entfernen</th>
                        </tr>
                        </thead>

                    </table>
                </div>
            </div>
    </div>
    <div class="row">
            <div class="panel panel-default">
                <div class="panel-heading">Steckbrief</div>
                <div id="MouseInfo" class="panel-body">
                    <div class="row">
                        <div class="col-md-12">
                            <img id="mouseinfoProfileImg" src="/data/img/Femalemouse.png"
                                 class="img-responsive img-thumbnail">

                            <form class="form-horizontal">
                                <div class="form-group">
                                    <label class="col-sm-4 control-label">Name</label>

                                    <div class="col-sm-4">
                                        <p id="mouseinfoName" class="form-control-static"></p>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-4 control-label">Gewicht</label>

                                    <div class="col-sm-4">
                                        <p id="mouseinfoWeight" class="form-control-static"></p>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-4 control-label">Geschlecht</label>

                                    <div class="col-sm-4">
                                        <p id="mouseinfoGender" class="form-control-static"></p>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-4 control-label">Alter</label>

                                    <div class="col-sm-4">
                                        <p id="mouseinfoAge" class="form-control-static"></p>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-4 control-label">Eltern</label>

                                    <div class="col-sm-4">
                                        <p id="mouseinfoParents" class="form-control-static"></p>
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
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close"><span
                                                        aria-hidden="true">&times;</span></button>
                                                <h4 class="modal-title" id="myModalLabel">Geschlecht bestimmen</h4>
                                            </div>
                                            <div class="modal-body">
                                                <img id="mouseinfoGenderPic"
                                                     src="/data/img/bildkarten/Maennchen_2846.png"
                                                     class="img-rounded img-responsive center-block">
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-primary pull-left">Männlich
                                                </button>
                                                <button type="button" class="btn btn-primary">Weiblich</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
    </div>
</div>