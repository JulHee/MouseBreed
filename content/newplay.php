<h1 class="page-header">New Play
    <button type="button" id="sidebarNextDay"
            class="pull-right btn btn-info"><span class="glyphicon glyphicon-time"
                                                  aria-hidden="true"></span> Nächter Tag
    </button>
</h1>
<div class="row">
    <div class="col-md-2">
        <ul class="list-group">
            <li class="list-group-item disabled">
                <h4 class="list-group-item-heading">Steckbrief</h4>
            </li>
            <li class="list-group-item">
                <h4 class="list-group-item-heading">Name</h4>
                <p id="mouseinfoName" class="list-group-item-text"></p>
            </li>
            <li class="list-group-item">
                <h4 class="list-group-item-heading">Gewicht</h4>
                <p id="mouseinfoWeight" class="list-group-item-text"></p>
            </li>
            <li class="list-group-item">
                <h4 class="list-group-item-heading">Geschlecht</h4>
                <p id="mouseinfoGender" class="list-group-item-text"></p>
            </li>
            <li class="list-group-item">
                <h4 class="list-group-item-heading">Alter</h4>
                <p id="mouseinfoAge" class="list-group-item-text"></p>
            </li>
            <li class="list-group-item">
                <h4 class="list-group-item-heading">Eltern</h4>
                <p id="mouseinfoParents" class="list-group-item-text"></p>
            </li>
            <li class="list-group-item">
                <h4 class="list-group-item-heading">Geschlecht</h4>
                    <button type="button" class="btn btn-info" data-toggle="modal"
                            data-target="#chooseGender">
                        Bestimmen
                    </button>
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
            </li>
        </ul>
        <!--<div class="panel panel-default">
            <div class="panel-heading">Steckbrief</div>
            <div id="MouseInfo" class="panel-body">

            <div class="form-horizontal">
                    <div class="form-group form-group-sm">
                        <label>Name</label>
                        <p id="mouseinfoName" class="form-control-static"></p>
                    </div>
                    <div class="form-group form-group-sm">
                        <label>Gewicht</label>
                        <p id="mouseinfoWeight" class="form-control-static"></p>
                    </div>
                    <div class="form-group form-group-sm">
                        <label>Geschlecht</label>
                        <p id="mouseinfoGender" class="form-control-static"></p>
                    </div>
                    <div class="form-group form-group-sm">
                        <label>Alter</label>
                        <p id="mouseinfoAge" class="form-control-static"></p>
                    </div>
                    <div class="form-group form-group-sm">
                        <label>Eltern</label>
                        <p id="mouseinfoParents" class="form-control-static"></p>
                    </div>
                    <div class="form-group form-group-sm">
                        <div class="mycenter">
                            <button type="button" class="btn btn-default" data-toggle="modal"
                                    data-target="#chooseGender">
                                Geschlecht bestimmen
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>-->
    </div>
    <div class="mycenter">
        <canvas id="demoCanvas" width="800" height="500"></canvas>
    </div>
</div>

