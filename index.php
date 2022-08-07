<?php
$request = $_SERVER['REQUEST_URI'];
$uri=explode('?',$request);
$base_uri=$uri[0];
 
switch ($base_uri) {
    case '':
       echo "";
    case '/':
        echo "/";
        break;

    case '/convert':
        require __DIR__.'/convert.php';
        break;

    default:
        http_response_code(404);
          echo "404";
        break;
}
?>