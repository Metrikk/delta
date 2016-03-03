<?php

class Api extends Controller {

    function index()
    {
        $template = $this->loadView('api');
        $template->render();
    }
}

?>
