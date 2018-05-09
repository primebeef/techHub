<pre>
    <?php
    $fierce = array(array(2,0,1,1),array(2,0,0,2));
    $line = 2;
    $count = 4;
    $hold = array(0,0,0,0);
    $holdrow = array(0,0,0,0);
    function load(){
        global $fierce;
        global $count;
        $is = 0;
        //for($i = 0; $i < $count; $i++){
        nex(2);
       // echo($is);
        $is ++;
        
       // }
        
    }
    function nex($line){
        global $fierce;
        global $count;
        global $hold;
        //$fierce[$line] =  array();
        if(empty($fierce[0])){
            //for($i = 0; $i < $count; $i++){
                $fierce[$line] =  array();
            //}
            $fierce[0][0]=2;
            $fierce[0][1]=0;
            $fierce[0][2]=1;
            $fierce[0][3]=1;
            $fierce[]=array(2,0,3,1);
        }
        else{
       $fierce[$line] =  array();
       column();
       row();
        }
        
    }
    function gen(){
        global $line;
        global $fierce;
        global $count;
        global $hold;
        global $holdrow;
        row();
        column();
        $step = 0;
        $posx = $count - $holdrow[$step];
        //echo $posx;
        $posy = $count - $hold[$step];
        echo $posy;
        if($posy == 4){
            $fierce[$line][0] = rand(0,$posy);
            echo($fierce[$line][0]);
        }
        
        
    }
    function number(){
        global $fierce;
        global $count;
        global $hold;
        $x = 0;
       $y = 0;
        foreach($fierce as $i => $e){
            foreach($e as $o){
                $hold[$x]= $hold[$x] + $o;
               // echo $o;
               $x++;
            }
            $y++;
            $x = 0;
        }
    }
    function row(){
        global $fierce;
        global $holdrow;
        $array = $fierce;
       
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
         global $fierce;
        global $count;
        global $hold;
        $x = 0;
       $y = 0;
        foreach($fierce as $i => $e){
            foreach($e as $o){
                $hold[$x]= $hold[$x] + $o;
               // echo $o;
               $x++;
            }
            $y++;
            $x = 0;
        }
       
    }
     gen();
  // row();
  // column();
  
    //load(4);
    //var_dump($fierce);
    var_dump($hold);
   // var_dump($holdrow);
    ?>
</pre>