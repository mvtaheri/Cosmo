<?php
require_once  './vendor/autoload.php';

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET,HEAD,OPTIONS,POST,PUT");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept, Authorization");

$request = $_SERVER['REQUEST_URI'];
$uri=explode('?',$request);
$base_uri=$uri[0];
 
switch ($base_uri) {
    case '':
       require __DIR__.'/index.html';
    case '/':
        require __DIR__.'/index.html';
        break;

    case '/convert':
        require __DIR__.'/src/convert.php';
        break;
   case '/getData':
          require __DIR__ .'/src/convert.php';
    default:
        http_response_code(404);
          echo "404";
        break;
}
?>