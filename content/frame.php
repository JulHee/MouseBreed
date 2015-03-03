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
                    <li id="benachrichtigung" class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                            <span id="NumBen" class="badge">0</span>
                            <span class="caret"></span>
                        </a>
                        <!--Dropdown muss maximale breite haben-->
                        <ul id="benliste_top" class="dropdown-menu dropdown-max-width" role="menu">
                            <li>
                                <a href="#">
                                    <div class="benTitle"><strong>John Smith</strong></div>
                                    <div class="bentimestamp"><p class="text-muted"><em>Yesterday</em></p></div>
                                    <div class="benMessage">Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                        Pellentesque eleifend...
                                    </div>
                                </a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="#">
                                    <div class="benTitle"><strong>John Smith</strong></div>
                                    <div class="bentimestamp"><p class="text-muted"><em>Yesterday</em></p></div>
                                    <div class="benMessage">Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                        Pellentesque eleifend...
                                    </div>
                                </a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="#">
                                    <div class="benTitle"><strong>John Smith</strong></div>
                                    <div class="bentimestamp"><p class="text-muted"><em>Yesterday</em></p></div>
                                    <div class="benMessage">Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                        Pellentesque eleifend...
                                    </div>
                                </a>
                            </li>
                            <li class="divider"></li>
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
                    <button id="TOPlogin_button" class="btn btn-success">Anmelden</button>
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
                    <li class="active"><a href="home"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>
                            Home<span class="sr-only">(current)</span></a></li>
                    <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown">
                            <span class="glyphicon glyphicon-list" aria-hidden="true"></span>
                            Meine Zuchten
                            <span class="glyphicon glyphicon-menu-down" aria-hidden="true"></span>
                        </a>
                        <ul class="dropdown-menu navmenu-nav" role="menu">
                            <li class="menu-item"><a tabindex="-1" href="breed">Zucht 1</a></li>
                            <li class="menu-item"><a tabindex="-1" href="breed">Zucht 2</a></li>
                            <li class="menu-item"><a tabindex="-1" href="breed">Zucht 3</a></li>
                            <li class="menu-item"><a tabindex="-1" href="breed">Zucht 4</a></li>
                        </ul>
                    </li>
                    <li><a href="newbreed"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Neue Zucht</a>
                    </li>
                </ul>
                <ul class="nav nav-sidebar">
                    <li><a href="profile"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Profile</a>
                    </li>
                    <li><a href="settings"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                            Einstellungen</a>
                    </li>
                    <li><a href="help"><span class="glyphicon glyphicon-question-sign" aria-hidden="true"></span> Hilfe</a>
                    </li>
                </ul>
            <?php } else { ?>
                <ul class="nav nav-sidebar">
                    <li class="active"><a href="home"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>
                            Home<span class="sr-only">(current)</span></a></li>
                    <li><a href="login"><span class="glyphicon glyphicon-list" aria-hidden="true"></span> Meine Zuchten</a>
                    </li>
                    <li><a href="login"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Neue Zucht</a>
                    </li>
                </ul>
                <ul class="nav nav-sidebar">
                    <li><a href="login"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Profile</a>
                    </li>
                    <li><a href="login"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                            Einstellungen</a></li>
                    <li><a href="help"><span class="glyphicon glyphicon-question-sign" aria-hidden="true"></span> Hilfe</a>
                    </li>
                </ul>
            <?php } ?>
            <ul class="nav nav-sidebar">
                <li><a href="contact"><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span> Kontakt</a>
                </li>
                <li><a href="aboutus"><span class="glyphicon glyphicon-book" aria-hidden="true"></span> Impressum</a>
                </li>
            </ul>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
            <?php include_once "$page.php"; ?>
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

</body>
</html>