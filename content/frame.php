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
    <link rel="stylesheet" href="/style/main.css"/>
    <?php if (file_exists('style/'.$page.'.css')) echo "<link rel=\"stylesheet\" href=\"/style/$page.css\"/>\n"; ?>
</head>
<body>

<div class="wrapper">
    <div class="menu_container" <?php if(isset($_COOKIE['naviHidden']) && $_COOKIE['naviHidden'] == "true") echo      	"style=\"margin-left: -250px;\""; ?>>
        <div class="menu_item_container">
            <div class="logo"></div>

            <?php if (isset($_SESSION['login']) && $_SESSION['login']) { ?>

                <span><?php echo $_SESSION['userdata']['username']; ?><hr></span>
                <a href="/breed">Meine Zuchten</a>
                <a href="/newbreed">Neue Zucht</a>
                <a href="/settings">Einstellungen</a>
                <a id="logout">Logout</a>

            <?php } else { ?>

                <a href="/home">Übersicht</a>
                <a href="/login">Login</a>

            <?php } ?>

        </div>
        <div class="arrow <?php echo (isset($_COOKIE['naviHidden']) && $_COOKIE['naviHidden'] == "true") ? 						 			"arrow_out" : "arrow_in"; ?>">
        </div>
    </div>

    <div class="content_container">
        <?php include_once "$page.php"; ?>
    </div>

    <div class="clear"></div>
    <div class="push"></div>
</div>

<div class="foot">
    <div class="foot_container" >
        <a style="white-space: nowrap">Kontakt</a>
        <span>-</span>
        <a style="white-space: nowrap">Impressum</a>
    </div>
</div>

<script src="/script/js/ext/jquery-2.1.1.min.js"></script>
<script src="/script/js/ext/jquery.cookie.js"></script>
<script src="/script/js/ext/notify.min.js"></script>
<script src="/script/js/main.js"></script>
<?php if (file_exists('script/js/content/'.$page.'.js')) echo "<script src=\"/script/js/content/$page.js\"></script>\n"; ?>

</body>
</html>