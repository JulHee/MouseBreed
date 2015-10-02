<h1 class="page-header">New Play</h1>
<div class="row">
<div class="col-md-12">
    <button type="button" id="sidebarNewCage" class="btn btn-warning">
        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
        Neuer Käfig
    </button>
    <button type="button" id="sidebarNextDay" class="pull-right btn btn-info">
        <span class="glyphicon glyphicon-time" aria-hidden="true"></span>
        Nächter Tag
    </button>
</div>
</div>
<br style="margin: 2px 0">
<div class="row">
    <div class="col-md-2">
        <div class="panel panel-default">
            <!-- Default panel contents -->
            <div class="panel-heading">Steckbrief</div>

            <!-- Table -->
            <table class="table table-condensed">
                <tbody>
                <tr>
                    <th scope="row">Name</th>
                    <td id="mouseinfoName"></td>
                </tr>
                <tr>
                    <th scope="row">Gewicht</th>
                    <td id="mouseinfoWeight"></td>
                </tr>
                <tr>
                    <th scope="row">Geschlecht</th>
                    <td id="mouseinfoGender"></td>
                </tr>
                <tr>
                    <th scope="row">Alter</th>
                    <td id="mouseinfoAge"></td>
                </tr>
                <tr>
                    <th scope="row">Eltern</th>
                    <td id="mouseinfoParents"></td>
                </tr>
                <tr>
                    <th colspan="2">
                        <button id="mouseGenderSet" type="button" class="btn btn-info btn-block" data-toggle="modal"
                                data-target="#chooseGender">
                            Geschlecht bestimmen
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
                                             src=""
                                             class="img-rounded img-responsive center-block">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" id="malesetbtn" class="btn btn-primary pull-left">Männlich
                                        </button>
                                        <button type="button" id="femalesetbtn" class="btn btn-primary">Weiblich</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </th>
                </tr>
                <tr>
                    <th colspan="2">
                        <button id="mouseMoveToTrash" type="button" class="btn btn-danger btn-block">
                            Aussortieren
                        </button>
                    </th>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="mycenter">
        <canvas id="demoCanvas" width="800" height="500"></canvas>
    </div>
</div>