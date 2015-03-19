<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">

    <title>Mäusezucht</title>

    <meta name="title" content=""/>
    <meta name="description" content=""/>
    <meta name="author" content=""/>

    <link rel="shortcut icon" href=""/>

    <link href='http://fonts.googleapis.com/css?family=Open+Sans:700,400' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="/style/normalize.css"/>
    <link rel="stylesheet" href="/style/bootstrap.min.css">
    <link rel="stylesheet" href="/style/mainBootstrap.css">
    <link rel="stylesheet" href="/style/jasny-bootstrap.min.css">
    <link rel="stylesheet" href="/style/main.css">
    <?php if (file_exists('style/' . $page . '.css')) echo "<link rel=\"stylesheet\" href=\"/style/$page.css\"/>\n"; ?>
</head>

<body>
<div class="navbar-xs">
    <div class="navbar-primary">
        <nav class="navbar navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                        aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand visible-xs" href="/home">Mäusezucht</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <?php if (isset($_SESSION['login']) && $_SESSION['login']) { ?>
                    <ul class="nav navbar-nav navbar-right">

                        <li class="dropdown">
                            <a id="noticeid" href="#" class="dropdown-toggle" role="button" aria-expanded="false">
                                <span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Notizen
                                <span class="caret"></span>
                            </a>

                            <ul id="notizliste_top" class="dropdown-menu dropdown-max-width" role="menu">
                                <ul id="notizenT" class="list-group">

                                </ul>
                                <li class="divider"></li>
                                <li class="input-group">
                                    <input id="noticetext" type="text" class="form-control"
                                           placeholder="Insert notice here"
                                           aria-describedby="basic-addon2">
                                    <span class="input-group-addon" id="addbtn">Hinzufügen</span>

                            </ul>
                        </li>

                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                               aria-expanded="false">
                                <span class="glyphicon glyphicon-flag" aria-hidden="true"></span> Ziel
                                <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu dropdown-max-width" role="menu"
                                aria-labelledby="ProfileDropDown">
                                <li class="list-group-item">
                                    <h4 class="list-group-item-heading">Ziel</h4>

                                    <p class="list-group-item-text">Wie weit sie gekommen sind</p>
                                </li>
                                <li class="list-group-item">
                                    <h4 class="list-group-item-heading">Verbleibende Tage</h4>

                                    <div class="progress">
                                        <div id="targetDayProgress"
                                             class="progress-bar progress-bar-danger progress-bar-striped active"
                                             role="progressbar" aria-valuenow="40" aria-valuemin="0"
                                             aria-valuemax="100" style="width: 40%">
                                            <span class="sr-only">40%</span>
                                        </div>
                                    </div>
                                    Tag: <span id="topDays">5</span>
                                </li>
                                <li class="list-group-item ">
                                    <h4 class="list-group-item-heading">Gewünsche Mäuse</h4>

                                    <div class="progress">
                                        <div id="targetFinishProgress"
                                             class="progress-bar progress-bar-success progress-bar-striped active"
                                             role="progressbar" aria-valuenow="20" aria-valuemin="0"
                                             aria-valuemax="100" style="width: 20%">
                                            <span class="sr-only">20% Complete (success)</span>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                               aria-expanded="false">
                                <span class="glyphicon glyphicon-inbox" aria-hidden="true"></span>
                                <span id="NumBen" class="badge">0</span>
                                <span class="caret"></span>
                            </a>
                            <!--Dropdown muss maximale breite haben-->
                            <ul id="benliste_top" class="dropdown-menu dropdown-max-width" role="menu">
                                <li id="benLast">
                                    <button id="deleteall" class="btn btn-danger center-block">Alles Löschen
                                    </button>
                                </li>
                            </ul>
                        </li>
                        <li class="dropdown" style="margin-right: 10px">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                               aria-expanded="false">
                                <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                                <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu" role="menu" aria-labelledby="ProfileDropDown">
                                <li role="presentation"><a role="menuitem" tabindex="-1" href="/profile">
                                        <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                                        <?php echo $_SESSION['userdata']['username']; ?></a>
                                </li>
                                <li role="presentation"><a role="menuitem" tabindex="-1" href="/settings">
                                        <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                                        Einstellungen</a></li>
                                <li role="presentation" class="divider"></li>
                                <li role="presentation"><a id="logout" role="menuitem" tabindex="-1" href="/home">
                                        <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                                        Logout</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                <?php } ?>
            </div>
        </nav>
    </div>
</div>
<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <div class="row">
            <div class="col-md-2">
                <a id="mouseimg" href="/home" class="img-circle img-responsive"><img src="/data/img/header.png" width="150px"></a>
            </div>
            <div class="col-md-10">
                <div class="btn-group btn-group-justified" role="group" aria-label="...">
                    <?php if (isset($_SESSION['login']) && $_SESSION['login']) { ?>
                        <!--  <a href="/home" class="list-group-item <?= echoActiveClassIfRequestMatches("home") ?>">
                        <span class="glyphicon glyphicon-home" aria-hidden="true"></span>
                        Home
                    </a> -->
                        <?php if (!empty($_SESSION['loadedBreed']['name'])) { ?>
                            <a role="button" href="/breed/<?php echo $_SESSION['loadedBreed']['id']; ?>"
                               class="btn btn-default <?= echoActiveClassIfRequestMatches("breed") ?>">
                                <span class="glyphicon glyphicon-list" aria-hidden="true"></span>
                                <?php echo $_SESSION['loadedBreed']['name']; ?>
                            </a>
                        <?php } ?>
                        <a role="button" href="/overview"
                           class="btn btn-default <?= echoActiveClassIfRequestMatches("overview") ?>">
                            <span class="glyphicon glyphicon-refresh" aria-hidden="true"></span>
                            Zucht laden
                        </a>
                        <a role="button" href="/cageme"
                           class="btn btn-default <?= echoActiveClassIfRequestMatches("cageme") ?>"><span
                                class="glyphicon glyphicon-retweet" aria-hidden="true"></span> Mäusesort
                        </a>
                        <a role="button" href="/play"
                           class="btn btn-default <?= echoActiveClassIfRequestMatches("play") ?>">
                            <span class="glyphicon glyphicon-play-circle" aria-hidden="true"></span> Play
                        </a>
                        <a role="button" href="/newbreed"
                           class="btn btn-default <?= echoActiveClassIfRequestMatches("newbreed") ?>">
                            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Neue Zucht
                        </a>

                    <?php } ?>
                </div>
            </div>
        </div>
        <div class="row">
            <?php include_once "$page.php"; ?>
        </div>
    </div>
</div>
<footer class="footer">
    <div class="container text-center">
        <div class="col-md-3">
            <a href="/aboutus" class="<?= echoActiveClassIfRequestMatches("aboutus") ?>">
                <span class="glyphicon glyphicon-book" aria-hidden="true"></span>
                Impressum
            </a>
        </div>
        <div class="col-md-3">
            <a href="/contact" class="<?= echoActiveClassIfRequestMatches("contact") ?>"><span
                    class="glyphicon glyphicon-envelope" aria-hidden="true"></span> Kontakt
            </a>
        </div>
        <div class="col-md-3">
            <a href="/help" class="<?= echoActiveClassIfRequestMatches("help") ?>"><span
                    class="glyphicon glyphicon-question-sign" aria-hidden="true"></span> Hilfe
            </a>
        </div>
        <div class="col-md-3">
            <a href="/devtest"
               class="<?= echoActiveClassIfRequestMatches("devtest") ?>">
                <span class="glyphicon glyphicon-check" aria-hidden="true"></span>
                DevTest
            </a>
        </div>
    </div>
</footer>

</body>


<script src="/script/js/ext/jquery-2.1.1.min.js"></script>
<script src="/script/js/ext/jquery.cookie.js"></script>
<script src="/script/js/ext/notify.min.js"></script>
<script src="/script/js/boot/bootstrap.min.js"></script>
<script src="/script/js/boot/jasny-bootstrap.min.js"></script>
<script src="/script/js/ext/holder.min.js"></script>
<script src="/script/js/main.js"></script>
<script src="/script/js/classes.js"></script>
<script src="/script/js/engine.js"></script>
<script src="/script/js/content/login.js"></script>


<?php if (file_exists('script/js/content/' . $page . '.js')) echo "<script src=\"/script/js/content/$page.js\"></script>\n"; ?>
<?php

function echoActiveClassIfRequestMatches($requestUri)
{
    $current_file_name = basename($_SERVER['REQUEST_URI'], ".php");

    if ($current_file_name == $requestUri)
        echo 'active';
}

?>

</html>