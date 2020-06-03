<?php
   define("URL_ASSETS","http://localhost/bases/quizzs/assets");
   define("URL_ROOT","http://localhost/bases/quizzs");
  require_once('./libs/Router.php');
   $router=new Router();
   //controller/methode=>UC
   $router->getRoute();
   /*
   $sec=new Security();
   $sec->showPage();
   $obj->{$method}()
   */
?>