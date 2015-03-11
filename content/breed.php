<h1 class="page-header"><?php echo $_SESSION['loadedBreed']['name']; ?>
    <button type="button" id="sidebarNextDay"
            class="pull-right btn btn-info"><span class="glyphicon glyphicon-time"
                                                  aria-hidden="true"></span> Nächter Tag
    </button>
</h1>

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <span class="panel-title">Informationen</span>
                <div class="btn-group pull-right">
                    <div class="btn-group">
                        <a href="#" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                            Käfig
                            <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu" role="menu">
                            <?php if (!empty($_SESSION['loadedBreed']['cages'])) {
                                foreach ($_SESSION['loadedBreed']['cages'] as $cage) { ?>
                                    <li><a href="/breed/<?php echo $_SESSION['loadedBreed']['id']."/".$cage['id']; ?>">Käfig <?php echo $cage['id']; ?></a></li>
                                <?php }
                            } ?>
                        </ul>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-horizontal pull-left">
                            <div class="form-group">
                                <label class="col-sm-10 control-label">Größe</label>

                                <div class="col-sm-2">
                                    <p class="form-control-static">30x40x50cm</p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-10 control-label">max. Mausmasse</label>

                                <div class="col-sm-2">
                                    <p class="form-control-static">
                                        <?php if (!empty($_SESSION['loadedBreed']['cages'][0]['max_number_of_mouses'])) {
                                            echo $_SESSION['loadedBreed']['cages'][0]['max_number_of_mouses'];
                                        } else {
                                            echo "0";
                                        } ?></p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-10 control-label">Anzahl an Mäusen</label>

                                <div class="col-sm-2">
                                    <p class="form-control-static"><?php if (!empty($_SESSION['loadedBreed']['cages'][0]['mice'])) {
                                            echo count($_SESSION['loadedBreed']['cages'][0]['mice']);
                                        } else {
                                            echo "0";
                                        } ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <img class="img-rounded img-responsive pull-right" src="/data/img/cage.jpg"
                             alt="Generic placeholder image">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 col-md-offset-4">
                        <h3 class="text-center">
                            Mausungen
                        </h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Geschlecht</th>
                                <th>Genotyp</th>
                                <th>Generation</th>
                                <th>Alter</th>
                                <th>Gewicht</th>
                            </tr>
                            </thead>
                            <?php if (!empty($_SESSION['loadedBreed']['cages'][0]['mice'])) {
                                foreach ($_SESSION['loadedBreed']['cages'][0]['mice'] as $mouse) { ?>
                                    <tr>
                                        <td><?php echo $mouse['name']; ?></td>
                                        <td><?php
                                            if ($mouse['gender'] == "0") {
                                            echo "Männlich";
                                            } else {
                                            echo "Weiblich";
                                            }
                                            ?>
                                        </td>
                                        <td><?php echo $mouse['genotyp']; ?></td>
                                        <td>0 (Fehlt)</td>
                                        <td><?php echo $mouse['age']; ?> Tage</td>
                                        <td><?php echo $mouse['weight']; ?>g</td>
                                    </tr>
                                <?php }
                            } ?>
                        </table>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <button type="button" class="btn btn-default">Option 1</button>
                        <button type="button" class="btn btn-default">Option 2</button>
                        <button type="button" class="btn btn-default">Option 3</button>
                        <button type="button" class="btn btn-default">Option 4</button>
                        <button type="button" class="btn btn-default">Option 5</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
