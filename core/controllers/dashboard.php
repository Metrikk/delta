<?php

class Dashboard extends Controller {

    function index()
    {
        $template = $this->loadView('dashboard');
        $template->render();
    }
}

?>
