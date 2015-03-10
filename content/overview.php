<h1 class="page-header">Spiel wechseln</h1>
<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <div class="panel panel-default">
            <!-- Default panel contents -->
            <div class="panel-heading">Zuchten</div>

            <!-- Table -->
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Erstelldatum</th>
                    <th>Ziel</th>
                    <th>Anzahl an Mäusen</th>
                    <th>Anzahl an Käfigen</th>
                    <th>Fortsetzen</th>
                </tr>
                </thead>
                <?php if (!empty($_SESSION['breeds'])) {
                    foreach ($_SESSION['breeds'] as $breed) { ?>
                        <tr>
                            <td><?php echo $breed['id']; ?></td>
                            <td><?php echo $breed['name']; ?></td>
                            <td>2015-03-07</td>
                            <td>5</td>
                            <td>20</td>
                            <td>10</td>
                            <td>
                                <button type="button" class="btn btn-success"><span
                                        class="glyphicon glyphicon-play"></span></button>
                            </td>
                        </tr>
                    <?php }
                } ?>
            </table>
        </div>
    </div>
</div>