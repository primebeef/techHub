<?php
/*
Welcome to the SUM4 Library,
These are the primary functions of the SUM4 Algorithm.
Created by: Makenna Turner
*/
//Convert a single-dim array to an array of strings.
function AtS($array, $string=null, $space=null){
      foreach($array as $e){
          $string = $string.$space.$e;
      }
      return $string;
  }
  
?>