<h1 class="page-header">Spiel wechseln</h1>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <!-- Default panel contents -->
            <div class="panel-heading">Zuchten</div>

            <!-- Table -->
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Erstelldatum</th>
                    <th>Ziel</th>
                    <th>Anzahl an Mäusen</th>
                    <th>Anzahl an Käfigen</th>
                    <th>Fortsetzen</th>
                </tr>
                </thead>
                <?php foreach ($_SESSION['breeds'] as $breed) { ?>
                    <tr>
                        <td><?php echo $breed['name']; ?></td>
                        <td><?php echo $breed['time_of_creation']; ?></td>
                        <td><?php echo $breed['target']; ?></td>
                        <td><?php echo $breed['numberOfMice']; ?></td>
                        <td><?php echo $breed['numberOfCages']; ?></td>
                        <td>
                            <a class="btn btn-success loadBreed" id="<?php echo $breed['id']; ?>">
                                <span class="glyphicon glyphicon-play"></span>
                            </a>
                        </td>
                    </tr>
                <?php } ?>
            </table>
        </div>
    </div>
</div>