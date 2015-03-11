<h1 class="page-header">Put them into Cages</h1>
<div class="row">
    <div class="col-md-4">

    </div>
    <div class="col-md-4">

    </div>
    <div class="col-md-4">
        <form class="form-horizontal">
            <div class="form-group">
                <label for="cage" class="col-sm-2 control-label">Käfig</label>

                <div id="cage" class="col-sm-10">
                    <select class="form-control">
                        <?php if (!empty($_SESSION['loadedBreed']['cages'])) {
                            foreach ($_SESSION['loadedBreed']['cages'] as $cage) { ?>
                                <option>Käfig <?php echo $cage['id']; ?></option>
                            <?php }
                        } ?>
                    </select>
                </div>
            </div>
        </form>
    </div>

</div>
<div class="row">
    <div class="col-md-4">
        <div class="panel panel-default">
            <div class="panel-heading">Mausung</div>
            <div id="MListMouse" class="list-group ListMouse">
                <?php if (!empty($_SESSION['loadedBreed']['cages'])) {
                    foreach ($_SESSION['loadedBreed']['mice'] as $mices) {
                        if ($mices.['id'] < 0) { ?>
                            <a href="#" class="list-group-item">
                                <?php echo $mice['name']." #".$mice['id']; ?>
                            </a><?php
                        }
                    }
                } ?>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-vertical text-center">
             <div class="form-horizontal text-center ">
                <div class="btn-group-vertical text-center" role="group" aria-label="...">

                    <button id="mousetocage" type="button" class="btn btn-info btn-xlarge firstborn"> > </button>
                    <button type="button" class="btn btn-warning btn-xlarge disabled"> Verschiebe Mäuse  </button>
                    <button id="cagetomouse" type="button" class="btn btn-info btn-xlarge"> < </button>

                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="panel panel-default">
            <div class="panel-heading">Käfigung</div>
            <div id="CListMouse" class="list-group ListMouse">
                <?php if (!empty($_SESSION['loadedBreed']['cages'])) {
                    foreach ($_SESSION['loadedBreed']['cages'] as $cage) {
                        foreach( $cage['mice'] as $mice) { ?>
                            <a href="#" class="list-group-item ">
                            <?php echo $mice['name']." #".$mice['id']."  (Käfig ".$cage['id'].")"; ?>
                            </a><?php
                        }
                    }
                } ?>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div id="steck" class="col-md-6">
        <div class="panel panel-default">
            <div class="panel-heading">Steckbrief</div>
            <div id="MouseInfo" class="panel-body">
                <div class="row">
                    <div class="col-md-8">
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
                                            <button type="button" class="btn btn-primary pull-left">Männlich</button>
                                            <button type="button" class="btn btn-primary">Weiblich</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-4">
                        <img id="mouseinfoProfileImg" src="/data/img/Femalemouse.png"
                             class="img-responsive img-thumbnail">
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="col-md-6">
        <div class="panel panel-default">
            <div class="panel-heading">Informationen</div>
            <div id="MouseInfo" class="panel-body">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>KäfigID</th>
                        <th>MausMasse</th>
                        <th>KäfigMasse</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>Käfig 12</td>
                        <td>20g</td>
                        <td>180g</td>
                    </tr>
                    <tr>
                        <td>Käfig 13</td>
                        <td>38g</td>
                        <td>180g</td>
                    </tr>
                    <tr>
                        <td>Käfig 14</td>
                        <td>1g</td>
                        <td>180g</td>
                    </tr>
                    <tr>
                        <td>Käfig 15</td>
                        <td>48g</td>
                        <td>180g</td>
                    </tr>
                    <tr>
                        <td>Käfig 16</td>
                        <td>70g</td>
                        <td>180g</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
    <!--<<div id="zuchtziel" class="tile">Zuchtziel
        </div>

    <div id="bottom" class="tile new">
        <button id="bnt1" class="testButton" type="button">Click Me!</button>
        <button id="bnt2" class="testButton" type="button">Click Me!</button>
        <button id="bnt3" class="testButton" type="button">Click Me!</button>
        <button id="bnt4" class="testButton" type="button">Click Me!</button>
    </div>-->
