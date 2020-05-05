<?php

class ControllerPortfolio extends Controller{
    function action_index()
    {
        $this->view->generate('form_view.php', 'template_view.php');
    }
}
