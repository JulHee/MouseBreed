<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">

        <title>Mäusezucht</title>

        <meta name="title" content=""/>
        <meta name="description" content=""/>
        <meta name="author" content=""/>

        <link rel="shortcut icon" href=""/>

        <link rel="stylesheet" href="/style/normalize.css"/>
        <link rel="stylesheet" href="/style/main.css"/>
    </head>
    <body>
        <div class="head">
            <div class="head_container noselect">
                <a class="head_item head_hover left" href="/home">
                    <img class="head_logo left" src="/data/img/mouse.png">
                    <span class="lager bold">Mäusezucht</span>
                </a>
                <a class="head_item head_hover left">
                    <span>Item 1</span>
                </a>
                <a class="head_item head_hover left">
                    <span>Item 2</span>
                </a>
                <a class="head_item head_hover left">
                    <span>Item 2</span>
                </a>
                <a class="head_item head_hover left">
                    <span>Item 2</span>
                </a>
                <a class="head_item head_hover left">
                    <span>Item 2</span>
                </a>

                <?php if (isset($_SESSION['login']) && $_SESSION['login']) { ?>

                <div class="head_item right">
                    <a id="logout_button" class="head_login button">
                        <span>Abmelden</span>
                    </a>
                </div>
                <a class="head_item head_hover right" href="/profile/general">
                    <span><?php echo $_SESSION['username']; ?></span>
                </a>

                <?php } else { ?>

                <div class="head_item right">
                    <a class="head_login button" href="/login">
                        <span>Anmelden</span>
                    </a>
                </div>

                <?php } ?>

            </div>
        </div>

        <div class="content">
            <div class="content_container">
                <?php include_once "$page.php"; ?>
            </div>
        </div>

        <div class="foot">
            <div class="foot_container right" >
                <a style="white-space: nowrap">Kontakt</a>
                <span>-</span>
                <a style="white-space: nowrap">Impressum</a>
            </div>
        </div>

        <script src="/script/js/ext/jquery-2.1.1.min.js"></script>
        <script src="/script/js/main.js"></script>
        <?php if (file_exists('script/js/content/'.$page.'.js')) echo "<script src=\"/script/js/content/$page.js\"></script>\n"; ?>

    </body>
</html>