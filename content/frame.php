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
<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                    aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a href="home" class="pull-left" style="margin-top:5px"><img src="/data/img/mouse.png"></a>
            <a class="navbar-brand" href="home" style="margin-left:5px">Mäusezucht</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <?php if (isset($_SESSION['login']) && $_SESSION['login']) { ?>
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            <span class="glyphicon glyphicon-flag" aria-hidden="true"></span> Ziel
                            <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu dropdown-max-width" role="menu" aria-labelledby="ProfileDropDown">
                            <li class="list-group-item">
                                <h4 class="list-group-item-heading">Ziel</h4>

                                <p class="list-group-item-text">Wie weit sie gekommen sind</p>
                            </li>
                            <li class="list-group-item ">
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
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                            <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu" role="menu" aria-labelledby="ProfileDropDown">
                            <li role="presentation"><a role="menuitem" tabindex="-1" href="profile">
                                    <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                                    <?php echo $_SESSION['userdata']['username']; ?></a>
                            </li>
                            <li role="presentation"><a role="menuitem" tabindex="-1" href="settings">
                                    <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                                    Einstellungen</a></li>
                            <li role="presentation" class="divider"></li>
                            <li role="presentation"><a id="logout" role="menuitem" tabindex="-1" href="#">
                                    <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                                    Logout</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            <?php } else { ?>
                <form id="TOPlogin_form" class="navbar-form navbar-right" action="home"
                      method="post">
                    <div class="form-group">
                        <input type="text" id="TOPusername" placeholder="Benutzername" class="form-control" required
                               autofocus>
                    </div>
                    <div class="form-group">
                        <input type="password" id="TOPpassword" placeholder="Password" class="form-control" required>
                    </div>
                    <a id="TOPlogin_button" class="btn btn-success">Anmelden</a>
                </form>
            <?php } ?>
        </div>
    </div>
</nav>

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
            <?php if (isset($_SESSION['login']) && $_SESSION['login']) { ?>
                <ul class="nav nav-sidebar">
                    <li <?=echoActiveClassIfRequestMatches("home")?>><a href="/home"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>
                            Home<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="dropdown" <?=echoActiveClassIfRequestMatches("zuchten")?>>
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <span class="glyphicon glyphicon-list" aria-hidden="true"></span>
                            Meine Zuchten
                            <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu navmenu-nav" role="menu">
                            <?php foreach ($_SESSION['breeds'] as $breed) { ?>
                                <li class="menu-item">
                                    <a tabindex="-1"
                                       href="/breed/<?php echo $breed['id']; ?>"><?php echo $breed['name']; ?></a>
                                </li>
                            <?php } ?>
                        </ul>
                    </li>
                    <li <?=echoActiveClassIfRequestMatches("newbreed")?>><a href="/newbreed"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Neue Zucht</a>
                    </li>
                </ul>
                <ul class="nav nav-sidebar">
                    <li <?=echoActiveClassIfRequestMatches("profile")?>><a href="/profile"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Profile</a>
                    </li>
                    <li <?=echoActiveClassIfRequestMatches("settings")?>><a href="/settings"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                            Einstellungen</a>
                    </li>
                    <li <?=echoActiveClassIfRequestMatches("help")?>><a href="/help"><span class="glyphicon glyphicon-question-sign" aria-hidden="true"></span> Hilfe</a>
                    </li>
                </ul>
            <?php } else { ?>
                <ul class="nav nav-sidebar">
                    <li <?=echoActiveClassIfRequestMatches("home")?>><a href="/home"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>
                            Home<span class="sr-only">(current)</span></a></li>
                </ul>
                <ul class="nav nav-sidebar">
                    <li <?=echoActiveClassIfRequestMatches("help")?>><a href="/help"><span class="glyphicon glyphicon-question-sign" aria-hidden="true"></span> Hilfe</a>
                    </li>
                </ul>
            <?php } ?>
            <ul class="nav nav-sidebar">
                <li <?=echoActiveClassIfRequestMatches("contact")?>><a href="/contact"><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span> Kontakt</a>
                </li>
                <li <?=echoActiveClassIfRequestMatches("aboutus")?>><a href="/aboutus"><span class="glyphicon glyphicon-book" aria-hidden="true"></span> Impressum</a>
                </li>
            </ul>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
            <?php include_once "$page.php"; ?>
        </div>
    </div>
</div>
<script src="/script/js/ext/jquery-2.1.1.min.js"></script>
<script src="/script/js/ext/jquery.cookie.js"></script>
<script src="/script/js/ext/notify.min.js"></script>
<script src="/script/js/boot/bootstrap.min.js"></script>
<script src="/script/js/boot/jasny-bootstrap.min.js"></script>
<script src="/script/js/main.js"></script>
<script src="/script/js/content/login.js"></script>


<?php if (file_exists('script/js/content/' . $page . '.js')) echo "<script src=\"/script/js/content/$page.js\"></script>\n"; ?>
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
