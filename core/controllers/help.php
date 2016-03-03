<?php

class Help extends Controller {

    function index()
    {
        $template = $this->loadView('help');
        $template->render();
    }
}

?>
