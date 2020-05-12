<?php
class ControllerMain extends Controller
{
    function action_index()
    {
        $this->view->generate('main_view.php','build/css/helpers/main.css');
    }
}
