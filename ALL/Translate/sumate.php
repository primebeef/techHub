<?php
//needs sum and then generates number in empty place if == to null.
function sum($total,$empty){
     if($total == 1){
         $new = rand(0,4);
         return $new;
    } 
    else if($total == 2){
         $new = rand(0,4);
         return $new;
    }
    else if($total == 3 && $s == 0){
         $new = rand(0,4);
         return $new;
    }
    else if($total == 4){
        $place = rand(1,4);
        $place = until_new($place,$empty);
         $new = rand(0,0);
         return $new;
    }
}
function until_new($place,$empty,$min,$max){
    
        foreach($empty as $e){
            if($place == $e){
              $place = rand($min,$max);
              $place = until_new($place,$empty);
            }
            }
           return $place;
        }
        
sum(2,array());
?>