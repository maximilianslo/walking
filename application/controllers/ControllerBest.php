<?php
class ControllerBest extends Controller
{
    function action_index()
    {
        $this->view->generate('best_view.php','build/css/helpers/best.css');
    }
}