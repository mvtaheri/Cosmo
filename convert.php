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

// validate two input [number,language]

if($_SERVER["REQUEST_METHOD"] == "GET"
 && isset($_REQUEST['number'] 
 && isset($_REQUEST['language'])
){
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
               $flag = $cosmo->flag();
               $data=[
                   'language'=>$language,
                    'country'=>$country,
                    'flag'=>$flag,
                   'spellout'=>$spellout
               ]; // emoji flag of the country
               header('Content-Type: application/json; charset=utf-8');
               echo json_encode($data);
             }
      }
   }

}