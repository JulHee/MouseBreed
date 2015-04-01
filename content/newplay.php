<h1 class="page-header">New Play
    <button type="button" id="sidebarNextDay"
            class="pull-right btn btn-info"><span class="glyphicon glyphicon-time"
                                                  aria-hidden="true"></span> Nächter Tag
    </button>
</h1>
<div class="row">
    <div class="col-md-2">
        <div class="panel panel-default">
            <div class="panel-heading">Steckbrief</div>
            <div id="MouseInfo" class="panel-body">
                <div class="form-inline">
                    <div class="form-group">
                        <label>Name</label>
                        <p id="mouseinfoName" class="form-control-static"></p>
                    </div>
                </div>
                <div class="form-inline">
                    <div class="form-group">
                        <label>Gewicht</label>
                        <p id="mouseinfoWeight" class="form-control-static"></p>
                    </div>
                    </div>
                <div class="form-inline">
                    <div class="form-group">
                        <label>Geschlecht</label>
                        <p id="mouseinfoGender" class="form-control-static"></p>
                    </div>
                </div>
                <div class="form-inline">
                    <div class="form-group">
                        <label>Alter</label>
                        <p id="mouseinfoAge" class="form-control-static"></p>
                    </div>
                </div>
                <div class="form-inline">
                    <div class="form-group">
                        <label>Eltern</label>
                        <p id="mouseinfoParents" class="form-control-static"></p>
                    </div>
                </div>
                <div class="form-inline">
                    <div class="form-group">
                        <div class="mycenter">
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
                </div>
            </div>
        </div>
    </div>
    <div class="mycenter">
        <canvas id="demoCanvas" width="800" height="500"></canvas>
    </div>
</div>

