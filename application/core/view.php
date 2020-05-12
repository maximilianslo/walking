 <?php
 class View
 {
     //public $template_view; // общий вид по умолчанию
    function generate_usually($content_view, $help_css) {
        include 'application/views/template_view.php';
    }
     function generate($content_view, $help_css, $fortable1,$name_town)
     {
         /*
         if(is_array($data)) {
             extract($data);
         }
         */

         include 'application/views/template_view.php';
     }
 }