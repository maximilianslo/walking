<?php
class ControllerAbout extends Controller
{
    function action_index()
    {
        $this->view->generate('main_view.php','build/css/helpers/about.css');
    }
}