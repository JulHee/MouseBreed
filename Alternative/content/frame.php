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
    <link rel="stylesheet" href="/style/boot/bootstrap.min.css">
    <link rel="stylesheet" href="/style/boot/mainBootstrap.css">
    <?php if (file_exists('style/'.$page.'.css')) echo "<link rel=\"stylesheet\" href=\"/style/$page.css\"/>\n"; ?>
</head>
<body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="/home">Mäusezucht <div id="navbar-brand mouse_picture"></div> </a> 
        </div>
        <div id="navbar" class="navbar-collapse collapse">
        <?php if (isset($_SESSION['login']) && $_SESSION['login']) { ?>
          <ul class="nav navbar-nav navbar-right">
          	<li><a><?php echo $_SESSION['userdata']['username']; ?></a></li>
            <li><a id="benachrichtigung">Benachrichtigungen <span id="NumBen" style="border-radius: 1em;" class="label label-danger label-as-badge">0</span></a></li>
            <li><a id="logout" href="#">Logout</a></li>
          </ul>
          <div id="ben_hidden" style="display:none">
              <div id="benliste_top">
                <ul class="list-unstyled" id="Benliste">
                    </ul>
              </div>
              <div id="benliste_bot">
                <button id="deleteall">Alles Löschen</button>
              </div> 
          </div>
         <?php } else { ?>
          <form class="navbar-form navbar-right">
            <div class="form-group">
              <input type="text" placeholder="Benutzername" class="form-control">
            </div>
            <div class="form-group">
              <input type="password" placeholder="Password" class="form-control">
            </div>
            <button type="submit" class="btn btn-success">Anmelden</button>
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
            <li class="active"><a href="/home">Home<span class="sr-only">(current)</span></a></li>
            <li><a href="/breed">Meine Zuchten</a></li>
            <li><a href="/newbreed">Neue Zucht</a></li>
            <li><a href="settings">Profile</a></li>
            <li><a href="#">Einstellungen</a></li>
            <li><a href="#">Hilfe</a></li>
          </ul>
         <?php } else { ?>
          <ul class="nav nav-sidebar">
          	<li class="active"><a href="/home">Home<span class="sr-only">(current)</span></a></li>
            <li><a href="#">Hilfe</a></li>
          </ul>
          <?php } ?>
          <ul class="nav nav-sidebar">
            <li><a href="#">Kontakt</a></li>
            <li><a href="#">Impressum</a></li>
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
<script src="/script/js/main.js"></script>
<script src="/script/js/content/login.js"></script>
<?php if (file_exists('script/js/content/'.$page.'.js')) echo "<script src=\"/script/js/content/$page.js\"></script>\n"; ?>

</body>
</html>