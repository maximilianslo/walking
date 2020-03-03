 <?php
 class View
 {
     //public $template_view; // общий вид по умолчанию

     function generate($content_view, $template_view)
     {
         /*
         if(is_array($data)) {
             extract($data);
         }
         */

         include 'application/views/'.$template_view;
     }
 }