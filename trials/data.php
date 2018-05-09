<pre>
    <?php
    $mark = array(
        array(2,0,1,1),
        array(2,0,0,2),
        array(0,2,)
        )
       function row(){
        global $mark;
        global $holdrow;
        $array = $mark;
       
     $y = 0;
      foreach($array as $d => $i){
           $sum = 0;
           //var_dump($i);
          foreach($i as $e){
          //var_dump($e);
          if(is_numeric($e)==true){
             $sum = $sum + $e;  
          }
          
          }
         $holdrow[$y] = $sum;
      $y++;
     
  }
    }
    function column(){
         global $mark;
        global $count;
        global $hold;
        $x = 0;
       $y = 0;
        foreach($mark as $i => $e){
            foreach($e as $o){
                $hold[$x]= $hold[$x] + $o;
               // echo $o;
               $x++;
            }
            $y++;
            $x = 0;
        }
       
    }
    ?>
</pre>