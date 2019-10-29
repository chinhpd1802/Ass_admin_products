<?php
 session_start();
 function session_set($key,$val){
     $_SESSION[$key]=$val;
 }

 function session_get($key){
     return (isset($_SESSION[$key])) ? $_SESSION[$key] :false;
 }

 function sesstion_delete($key){
     if (isset($_SESSION[$key])) {
         # code...
         unset($_SESSION[$key]);
     }
 }


 ?>