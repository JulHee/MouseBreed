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
                            <li><a href="#">Käfig 1</a></li>
                            <li><a href="#">Käfig 2</a></li>
                            <li><a href="#">Käfig 3</a></li>
                        </ul>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-horizontal">
                            <div class="form-group">
                                <label class="col-sm-8 control-label">Größe</label>

                                <div class="col-sm-4">
                                    <p class="form-control-static">30x40x50cm</p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-8 control-label">Max Anzahl an Mäusen</label>

                                <div class="col-sm-4">
                                    <p class="form-control-static">50</p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-8 control-label">Anzahl an Mäusen</label>

                                <div class="col-sm-4">
                                    <p class="form-control-static">10</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <img class="img-rounded img-responsive" src="/data/img/cage.jpg"
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
                            <tr>
                                <td>Karl</td>
                                <td>Männlich</td>
                                <td>AB</td>
                                <td>1</td>
                                <td>10</td>
                                <td>200g</td>
                            </tr>
                            <tr>
                                <td>Karl</td>
                                <td>Männlich</td>
                                <td>AB</td>
                                <td>1</td>
                                <td>10</td>
                                <td>200g</td>
                            </tr>
                            <tr>
                                <td>Karl</td>
                                <td>Männlich</td>
                                <td>AB</td>
                                <td>1</td>
                                <td>10</td>
                                <td>200g</td>
                            </tr>
                            <tr>
                                <td>Karl</td>
                                <td>Männlich</td>
                                <td>AB</td>
                                <td>1</td>
                                <td>10</td>
                                <td>200g</td>
                            </tr>
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
