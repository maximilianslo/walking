 <?php
 class View
 {
     //public $template_view; // общий вид по умолчанию

     function generate($content_view, $help_css)
     {
         /*
         if(is_array($data)) {
             extract($data);
         }
         */

         include 'application/views/template_view.php';
     }
 }