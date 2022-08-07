<?php
require_once 'vendor/autoload.php';

use Salarmehr\Cosmopolitan\Cosmo;


$items = [
    ['en_AU', 'Australia/Sydney'],
    ['en_GB', 'Europe/London'],
    ['de_DE', 'Europe/Berlin'],
    ['zh_CN', 'Asia/Chongqing'],
    ['fa_IR', 'Asia/Tehran'],
    ['hi_IN', 'Asia/Jayapura'],
    ['ar_EG', 'Africa/Cairo'],
];

echo "Select from below this  languages";
foreach($items as $item){
    echo $item[0];
    echo "\n";
}

// validate two input [number,language]

if(isset($_REQUEST['number'] && $_REQUEST['language'])){
      $input_number=intval($_GET['number']);
      $input_language=trim($_GET['language']);
      //validate language to be in items list
       foreach ($items as $item) {
          [$locale, $timezone] = $item;
          if ($locale == $input_language) {
              $cosmo=new Cosmo($locale,['timezone'=>$timezone]);
               $language = $cosmo->language();
               $country = $cosmo->country();
               $spellout=$cosmo->spellout($input_number);
               $flag = $cosmo->flag(); // emoji flag of the country
               header('Content-Type: application/json; charset=utf-8');
                echo json_encode($spellout);
             }
      }
   }
}
}
?>