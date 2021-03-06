<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="shortcut icon" href="<?php echo BASE_URL; ?>static/media/img/favicon.ico">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>static/skin/css/vendor/fluidbox.min.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>static/skin/css/main.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>static/skin/css/grid.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>static/skin/css/styles.css">

    <title>Ping Warden | Website Monitoring</title>
</head>
<body>

<?php $logged = false; ?>
<!--<a class="beta hidden-xs" href="mailto:john.anthony.vella@gmail.com?subject=Ping Warden Support">-->
<!--    <h3>In Development</h3>-->
<!--</a>-->

<div class="navbar">
    <div class="container">
        <div class="navbar-header">
            <a class="navbar-brand" target="_top" href="/">Ping Warden</a>
        </div>
        <ul class="nav navbar-nav navbar-left">
            <li><a target="_top" href="/about">About</a></li>
            <li><a target="_top" href="#" data-toggle="modal" data-target="#feedbackModal">Help &amp; Support</a></li>
            <li><a target="_top" href="/pricing/">Pricing</a></li>
            <li><a target="_top" href="/api/">API</a></li>
        </ul>

        <?php if (!$logged) { ?>
            <ul class="nav navbar-nav navbar-right">
                <li><a target="_top" href="/login">Login</a></li>
                <li><a target="_top" href="/login/register.php" class="button">Register</a></li>
                <li><a><img style="width:25px; height:25px" src="<?php echo BASE_URL; ?>static/media/Icon.png"></img></a></li>
            </ul>
        <?php } else { ?>
            <ul class="nav navbar-nav navbar-right">
                <li><a target="_top" href="/dashboard">Hello, <?php echo $user; ?></a></li>
                <li><a target="_top" href="/login/includes/logout.php" class="button">Log Out</a></li>
                <li><a><img style="width:25px; height:25px" src="../static/media/Icon.png"></img></a></li>
            </ul>
        <?php } ?>
    </div>
</div>

