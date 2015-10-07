<script>
    var breed = JSON.parse(localStorage.getItem('loadedBreed'));
</script>

<h1 class="page-header">
    <span id="BreedTitle" ></span>
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
                        <ul id="dropdownCages" class="dropdown-menu" role="menu">
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
                                <label class="col-sm-10 control-label">Käfig</label>

                                <div class="col-sm-2">
                                    <p id="selectedCageID" class="form-control-static">Kein Käfig ausgewählt</p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-10 control-label">Größe</label>

                                <div class="col-sm-2">
                                    <p id="cageDimensions" class="form-control-static">30x40x50cm</p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-10 control-label">max. Mausmasse</label>

                                <div class="col-sm-2">
                                    <p id="maxNumberofMice" class="form-control-static"></p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-10 control-label">Anzahl an Mäusen</label>

                                <div class="col-sm-2">
                                    <p id="numberofMice" class="form-control-static"></p>
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
                        <table id="tableMouse" class="table table-hover">
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
                        </table>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <button id="deleteCage" type="button" class="btn btn-danger">Käfig</button>
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
