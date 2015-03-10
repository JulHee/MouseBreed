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
                    <th>Name</th>
                    <th>Erstelldatum</th>
                    <th>Ziel</th>
                    <th>Anzahl an Mäusen</th>
                    <th>Anzahl an Käfigen</th>
                    <th>Fortsetzen</th>
                </tr>
                </thead>
                <?php foreach ($_SESSION['myBreedInfo'] as $breed) { ?>
                    <tr>
                        <td><?php echo $breed['name']; ?></td>
                        <td><?php echo $breed['time_of_creation']; ?></td>
                        <td><?php echo $breed['target']; ?></td>
                        <td>
                            <?php
                            $num_mice = 0;
                            for($i=0; $i < count($breed['cages']); $i++)
                            {
                                $num_mice = $num_mice + count($breed['cages'][$i]['mice']);
                            }
                            echo $num_mice;
                            ?>
                        </td>
                        <td><?php echo count($breed['cages']); ?></td>
                        <td>
                            <button type="button" class="btn btn-success"><span
                                    class="glyphicon glyphicon-play"></span></button>
                        </td>
                    </tr>
                <?php } ?>
            </table>
        </div>
    </div>
</div>