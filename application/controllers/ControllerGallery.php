<?php
class ControllerGallery extends Controller
{
    function action_index()
    {
        $this->view->generate('gallery_view.php','build/css/helpers/gallery.css');
    }
}