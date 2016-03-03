<?php

    require(ROOT_DIR .'config/config.php');
    require(ROOT_DIR .'system/model.php');
    require(ROOT_DIR .'system/view.php');
    require(ROOT_DIR .'system/controller.php');
    require('router.php');


    // Define base URL
    global $config;
    define('BASE_URL', $config['base_url']);
    define('BASE_DIR', $config['base_dir']);


    $router = new Router();
    $router->open('main');
?>
