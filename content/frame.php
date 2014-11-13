<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">

    <title>Mouse Breed</title>

    <meta name="title" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <link rel="shortcut icon" href="" />

    <link rel="stylesheet" href="/style/normalize.css" />
    <link rel="stylesheet" href="/style/styles.css" />
</head>
<body>
<div class="head">
    <div class="head_content">
        <a class="head_item left" href="/home">
            <img style="margin-top: 5px; margin-right: 10px" class="left" src="/data/img/mouse.png">
            <span style="font-size: larger; font-weight: bold;">Mouse Breed</span>
        </a>
        <a class="head_item left">
            <span style="font-weight: bold;">Item 1</span>
        </a>
        <a class="head_item left">
            <span style="font-weight: bold;">Item 2</span>
        </a>
        <a class="head_item left">
            <span style="font-weight: bold;">Item 2</span>
        </a>
        <a class="head_item left">
            <span style="font-weight: bold;">Item 2</span>
        </a>
        <a class="head_item left">
            <span style="font-weight: bold;">Item 2</span>
        </a>

        <div style="line-height: 50px;" class="right">
            <table>
                <tr>
                    <td style="color: white">User:</td>
                    <td class="login_space_row"><input type="text" style="width: 150px;"></td>
                    <td class="login_space_row"  style="color: white">Password:</td>
                    <td class="login_space_row"><input type="password" style="width: 150px;"></td>
                    <td class="login_space_row"><input type="button" value="Login"></td>
                </tr>
            </table>
        </div>
    </div>
</div>

<div class="content">
    <div class="content_wrapper">
        <?php include_once $page.'.php' ?>
    </div>
</div>

<div class="foot">
    FOOT
</div>

</body>
</html>