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
    <link rel="stylesheet" href="/style/jquery.orgchart.css">
    <link rel="stylesheet" href="/style/main.css">
    <?php if (file_exists('style/' . $page . '.css')) echo "<link rel=\"stylesheet\" href=\"/style/$page.css\"/>\n"; ?>
</head>
<body>
<div class="navbar navbar-default navbar-fixed-top">
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
                <a class="navbar-brand" href="/home">Mäusezucht</a>
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
                                <li class="notMessage list-group-item">
                                    <div class="row">
                                        <div class="col-md-10">
                                            Hier können Sie ihre Gedanken festhalten
                                        </div>
                                        <div class="col-md-2">
                                            <button onClick="$(this).parent().parent().parent().remove()" type="button" class="close" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                            <li class="divider"></li>
                            <li class="input-group">
                                <input id="noticetext" type="text" class="form-control" placeholder="Insert notice here"
                                       aria-describedby="basic-addon2">
                                <span class="input-group-addon" id="addbtn">Hinzufügen</span>

                        </ul>
                    </li>

                    <li>
                        <a data-trigger="focus" id="targetInfo" href="#">
                            <span class="glyphicon glyphicon-flag" aria-hidden="true"></span>
                            Ziel
                            <span class="caret"></span>
                        </a>
                        <div id="targetContent" style="display: none">
                            <ul class="list-unstyled">
                                <li>
                                    <h3 class="list-group-item-heading">Ziel <span id="topDays" class="label label-info pull-right">0. Tag</span></h3>
                                </li>
                                <br>
                                <li>
                                    <h4 class="list-group-item-heading">Verbleibende Tage</h4>

                                    <div class="progress">
                                        <div id="targetDayProgress"
                                             class="progress-bar progress-bar-danger progress-bar-striped active"
                                             role="progressbar" aria-valuenow="40" aria-valuemin="0"
                                             aria-valuemax="100" style="width: 40%">
                                            <span class="sr-only">40%</span>
                                        </div>
                                    </div>
                                </li>
                                <li>
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
                        <div>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            <span class="glyphicon glyphicon-inbox" aria-hidden="true"></span>
                            <span id="NumBen" class="badge">0</span>
                            <span class="caret"></span>
                        </a>
                        <!--Dropdown muss maximale breite haben-->
                        <ul id="benliste_top" class="dropdown-menu dropdown-max-width" role="menu">
                            <li id="benLast">
                                <button id="deleteall" class="btn btn-danger center-block">Alles Löschen</button>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown" style="margin-right: 10px">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                            <strong><?php echo $_SESSION['userdata']['username']; ?></strong>
                            <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu" role="menu" aria-labelledby="ProfileDropDown">
                            <li role="presentation"><a role="menuitem" tabindex="-1" href="/profile">
                                    <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                                    Profil</a>
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
    </div>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-2 col-md-1 sidebar">
            <div class="mycenter">
                <img src="/data/img/mouse_bk.png">
            </div>
            <br>
            <ul class="nav nav-sidebar">
                <li <?= echoActiveClassIfRequestMatches("home"); echoActiveClassIfRequestMatches(""); ?>>
                    <a href="/home">
                        <span class="glyphicon glyphicon-home" aria-hidden="true"></span>
                        Home
                    </a>
                </li>
            </ul>
            <?php if (isset($_SESSION['login']) && $_SESSION['login']) { ?>
                    <?php if (!empty($_SESSION['loadedBreed']['name'])) { ?>
                    <ul class="nav nav-sidebar">
                        <li <?= echoActiveClassIfRequestMatches("breed") ?>>
                        <a href="/breed">
                            <span class="glyphicon glyphicon-list" aria-hidden="true"></span>
                            <?php echo $_SESSION['loadedBreed']['name']; ?>
                        </a>
                        </li>
                        <li <?= echoActiveClassIfRequestMatches("play") ?>><a href="/play"><span
                                    class="glyphicon glyphicon-play-circle" aria-hidden="true"></span> Play</a>
                        </li>
                        <li <?= echoActiveClassIfRequestMatches("history") ?>><a href="/history"><span
                                    class="glyphicon glyphicon-book" aria-hidden="true"></span> History</a>
                        </li>
                    </ul>
                   <?php } ?>
                    <ul class="nav nav-sidebar">
                        <li <?= echoActiveClassIfRequestMatches("overview") ?>>
                            <a href="/overview">
                                <span class="glyphicon glyphicon-refresh" aria-hidden="true"></span>
                                Zucht laden
                            </a>
                        </li>
                        <li <?= echoActiveClassIfRequestMatches("newbreed") ?>><a href="/newbreed"><span
                                    class="glyphicon glyphicon-plus" aria-hidden="true"></span> Neue Zucht</a>
                        </li>
                    </ul>
            <?php } ?>
            <ul class="nav nav-sidebar">
                <li <?= echoActiveClassIfRequestMatches("help") ?>><a href="/help"><span
                            class="glyphicon glyphicon-question-sign" aria-hidden="true"></span> Hilfe</a>
                </li>
                <li <?= echoActiveClassIfRequestMatches("contact") ?>><a href="/contact"><span
                            class="glyphicon glyphicon-envelope" aria-hidden="true"></span> Kontakt</a>
                </li>
                <li <?= echoActiveClassIfRequestMatches("aboutus") ?>><a href="/aboutus"><span
                            class="glyphicon glyphicon-book" aria-hidden="true"></span> Impressum</a>
                </li>
            </ul>
            <?php if (isset($_SESSION['login']) && $_SESSION['login']) { ?>
                <ul class="nav nav-sidebar">
                    <li <?= echoActiveClassIfRequestMatches("devtest") ?>><a href="/devtest"><span
                                class="glyphicon glyphicon-check" aria-hidden="true"></span> DevTest</a>
                    </li>
                </ul>
            <?php } ?>
        </div>
        <div class="col-sm-10 col-sm-offset-2 col-md-11 col-md-offset-1 main">
            <?php include_once "$page.php"; ?>
        </div>
    </div>
</div>
<script src="/script/js/ext/jquery-2.1.1.min.js"></script>
<script src="/script/js/ext/jquery.cookie.js"></script>
<script src="/script/js/ext/notify.min.js"></script>
<script src="/script/js/boot/bootstrap.min.js"></script>
<script src="/script/js/boot/jasny-bootstrap.min.js"></script>
<script src="/script/js/ext/holder.min.js"></script>
<script src="http://d3js.org/d3.v3.min.js"></script>
<script src="/script/js/main.js"></script>
<script src="/script/js/engine.js"></script>
<script src="/script/js/ext/easeljs-0.8.0.min.js"></script>
<script src="/script/js/ext/ndgmr.Collision.js"></script>
<?php
if (file_exists('script/js/content/' . $page . '.js')) echo "<script src=\"/script/js/content/$page.js\"></script>\n";
if (!(isset($_SESSION['login']) && $_SESSION['login'])) {
    echo "<script src=\"/script/js/login.js\"></script>\n";
    echo "<script src=\"/script/js/register.js\"></script>\n";
}
?>

<?php

function echoActiveClassIfRequestMatches($requestUri)
{
    $current_file_name = basename($_SERVER['REQUEST_URI'], ".php");

    if ($current_file_name == $requestUri)
        echo 'class="active"';
}

?>

</body>
</html>
