<?php
include "Tech30Lib.php";
startDoc();
startHead();
makeTitle('Stoichiometry');
addCSSLink('formcss.css');
endHead();
startBody();
if(isPost() === false){
   prnt("<div class='form'>");
startForm('post', $_SERVER['PHP_SELF']);
prnt("<h1 id='logheader'>Gramular Calculatron</h1> ");
prnt("<h3>2Ni(OH)<sub>3</sub> + 3MgCl<sub>2</sub> => 2NiCl<sub>3</sub> + 3Mg(OH)<sub>2</sub></h3>");

textInput("2Ni(OH)<sub>3</sub> ", 'ZNgram', 5, null, getValue('ZNgram',null));
prnt("+<br>");
textInput(" 3MgCl<sub>2</sub> ", 'FEgram', 5, null, getValue('FEgram',null));
makeSubmit ('GO', 'submit');
prnt("<h3>2Ni(OH)<sub>3</sub> + 3MgCl<sub>2</sub> => NiCl<sub>3</sub> + Mg(OH)<sub>2</sub></h3>");

endForm();
prnt("<b>Directions:</b>");
echo("<i>A Limiting Reagent is the Compound with the least amount of moles, a Reagent in Excess is the one with a molar mass more than the limiting reagent.</i><br><br>");
echo("1. Review Stoichiometry<br> 2. Enter a gram amount for each of the reactants.<br> 3. Press GO<br><br><br>");
prnt("</div>");

}
if(isPost() === true){
     prnt("<div class='form'>"); 
    
      
startForm('post', $_SERVER['PHP_SELF']);
prnt("<h1 id='logheader'>Gramular Calculatron</h1> ");
 $NI = getValue('ZNgram',null); 
     
    $MG = getValue('FEgram',null); 
    prnt("<h3>2Ni(OH)<sub>3</sub> + 3MgCl<sub>2</sub> => 2NiCl<sub>3</sub> + 3Mg(OH)<sub>2</sub><br></h3>");

    $hold = null;
      if(is_numeric($NI) && is_numeric($MG)){
          $ni = $NI/(2*(58.69 + 3*(1.01 + 15.999)));
          $mg = $MG/(3*(24.31 + 2*(35.45)));
          
          if($mg >= $ni) {
              $less = $ni;
              echo "<b>Limiting Reagent: </b>NiCl<sub>3</sub> <br> <b>Reagent in Excess: </b>Mg(OH)<sub>2</sub> <br>";
              $result = $less*(2*(58.69 + 3*(35.45)));
              $result2 = $less*(3*(24.31 + 2*(1.01 + 15.999)));
              prnt("<br>");
              echo " 2NiCl<sub>3</sub> : $result"."g<br>3Mg(OH)<sub>2</sub> : $result2"."g";
              
          }
          if($ni >= $mg) {
              $less = $mg;
              echo "<b>Limiting Reagent: </b>Mg(OH)<sub>2</sub> <br> <b>Reagent in Excess: </b>NiCl<sub>3</sub> <br>";
              $result = $less*(2*(58.69 + 3*(35.45)));
              $result2 = $less*(3*(24.31 + 2*(1.01 + 15.999)));
                            prnt("<br>");

              echo " <b>2NiCl<sub>3</sub> :</b> $result"."g<br><b>3Mg(OH)<sub>2</sub> : </b>$result2"."g";
              
          }
          
      }
      prnt("<br>");
textInput("2Ni(OH)<sub>3</sub> ", 'ZNgram', 5, null, getValue('ZNgram',null));
prnt("+");
textInput(" 3MgCl<sub>2</sub> ", 'FEgram', 5, null, getValue('FEgram',null));
makeSubmit ('GO', 'submit');
endForm();
prnt("<br>");

   prnt("</div>");

   
}



endBody();
endDoc();
?>