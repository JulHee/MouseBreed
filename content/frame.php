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

                <div class="btn-group">
                    <a type="button" class="btn btn-default navbar-btn mymenu dropdown-toggle" data-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false">
                        <span class="glyphicon glyphicon-menu-hamburger" aria-hidden="true"></span> <span
                            class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li <?= echoActiveClassIfRequestMatches("home") ?>><a href="/home">
                                <span class="glyphicon glyphicon-home" aria-hidden="true"></span>
                                Home
                            </a>
                        </li>
                        <li role="separator" class="divider"></li>
                        <?php if (isset($_SESSION['login']) && $_SESSION['login']) { ?>
                            <?php if (!empty($_SESSION['loadedBreed']['name'])) { ?>
                                <li <?= echoActiveClassIfRequestMatches("breed") ?>><a href="/breed">
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
                                <li role="separator" class="divider"></li>
                            <?php } ?>
                            <li <?= echoActiveClassIfRequestMatches("overview") ?>><a href="/overview">
                                    <span class="glyphicon glyphicon-refresh" aria-hidden="true"></span>
                                    Zucht laden
                                </a>
                            </li>
                            <li <?= echoActiveClassIfRequestMatches("newbreed") ?>><a href="/newbreed"><span
                                        class="glyphicon glyphicon-plus" aria-hidden="true"></span> Neue Zucht</a>
                            </li>
                            <li role="separator" class="divider"></li>
                        <?php } ?>
                        <li <?= echoActiveClassIfRequestMatches("help") ?>>
                            <a href="/help"><span
                                    class="glyphicon glyphicon-question-sign" aria-hidden="true"></span> Hilfe</a>
                        </li>
                        <li <?= echoActiveClassIfRequestMatches("contact") ?>><a href="/contact"><span
                                    class="glyphicon glyphicon-envelope" aria-hidden="true"></span> Kontakt</a></li>
                        <li <?= echoActiveClassIfRequestMatches("aboutus") ?>><a href="/aboutus"><span
                                    class="glyphicon glyphicon-book" aria-hidden="true"></span> Impressum</a></li>
                        <?php if (isset($_SESSION['login']) && $_SESSION['login']) { ?>
                            <li role="separator" class="divider"></li>
                            <li <?= echoActiveClassIfRequestMatches("devtest") ?>><a href="/devtest"><span
                                        class="glyphicon glyphicon-check" aria-hidden="true"></span> DevTest</a></li>
                        <?php } ?>
                    </ul>
                </div>

            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <?php if (isset($_SESSION['login']) && $_SESSION['login']) {?>
                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown" style="margin-right: 10px">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                               aria-expanded="false">
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
                                <li role="presentation"><a id="logout" role="menuitem" tabindex="-1">
                                        <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                                        Logout</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                <?php }?>
            </div>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-11 col-md-10 main">
            <?php include_once "$page.php"; ?>
        </div>
        <?php if (isset($_SESSION['login']) && $_SESSION['login']) { ?>
            <div class="col-sm-1 col-md-2">
                <br>
                <div class="panel panel-default">
                    <div class="panel-body">
                        <ul class="list-unstyled">
                            <li>
                                <h3 class="list-group-item-heading">
                                    Ziel
                                    <span id="topDays" class="label label-info pull-right">0. Tag</span>
                                </h3>
                            </li>
                            <br>
                            <li>
                                <h4 class="list-group-item-heading">Verbleibende Tage</h4>

                                <div class="progress">
                                    <div id="targetDayProgress"
                                         class="progress-bar progress-bar-danger progress-bar-striped active"
                                         role="progressbar" aria-valuenow="40" aria-valuemin="0"
                                         aria-valuemax="100" style="width: 0%;min-width: 2em;">
                                        0%
                                    </div>
                                </div>
                            </li>
                            <li>
                                <h4 class="list-group-item-heading">Gewünsche Mäuse</h4>

                                <div class="progress">
                                    <div id="targetFinishProgress"
                                         class="progress-bar progress-bar-success progress-bar-striped active"
                                         role="progressbar" aria-valuenow="20" aria-valuemin="0"
                                         aria-valuemax="100" style="width: 0%;min-width: 2em;">
                                        0%
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- Nav tabs -->
                <ul class="nav nav-tabs nav-justified" role="tablist">
                    <li id="liSidebarNavsBen" role="presentation" class="active">
                        <a href="#sideBen" aria-controls="sideBen" role="tab" data-toggle="tab">
                            <span class="glyphicon glyphicon-inbox" aria-hidden="true"></span>
                            <span id="NumBen" class="badge">0</span>
                        </a>
                    </li>
                    <li role="presentation">
                        <a id="liSidebarNavsNotizen" href="#sideNotizen" aria-controls="sideNotizen" role="tab" data-toggle="tab">
                            <span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>
                            Notizen
                        </a>
                    </li>
                </ul>
                <!-- Tab panes -->
                <div class="tab-content panel-max-height">
                    <div role="tabpanel" class="tab-pane active" id="sideBen">
                        <div class="panel panel-default ">
                                <!--Dropdown muss maximale breite haben-->
                                <ul id="benliste_top" class="list-group">
                                </ul>
                            <div class="panel-footer">
                                <button id="deleteall" class="btn btn-danger center-block">Alles Löschen</button>
                            </div>
                        </div>
                    </div>
                    <div role="tabpanel" class="tab-pane" id="sideNotizen">
                        <div class="panel panel-default">
                                <ul id="notizenT" class="list-group" id="notizliste_top" style="list-style: none;">
                                </ul>
                            <div class="panel-footer">
                                <div class="input-group">
                                    <input id="noticetext" type="text" class="form-control" placeholder="Notiz">
                                            <span class="input-group-btn">
                                                <button id="addbtn" class="btn btn-default" type="button">Add!</button>
                                        </span>
                                </div><!-- /input-group -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
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
        echo 'class="disabled"';
}

?>

</body>
</html>
