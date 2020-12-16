<?php

use Jenssegers\Blade\Blade;

$template_engine_renderer = new Blade('views/blade', 'storage/cache');

function render($view_name,$context=[]){
  global $template_engine_renderer;
  echo $template_engine_renderer->render($view_name,$context);
}

?>
