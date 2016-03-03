<?php

class Pricing extends Controller {

    function index()
    {
        $template = $this->loadView('pricing');
        $template->render();
    }
}

?>
