<?php include "../Library/Tech30Lib.php"; 
if(isPost() == true){
    $name = getValue('name');
    if($name == null){
    
    }
    else{
    $email = getValue('email');
    $grade = getValue('grade');
        if($email == null){
            
        }
        else{
            $link = MYSQLConnect();
    $query = 'users';
    $result = MYSQLQuery($link, "INSERT INTO users (email, name, grade, id) VALUES ('$email', '$name', $grade, NULL)");
    MYSQLClose($link);
    echo $result;
        
    }
    
}


}
printDoctype();
startDoc();
startHead();
makeTitle('Query');
addCSSLink('../Library/formcss.css');
endHead();
startBody();
startDiv('class','form');
startForm('post',$_SERVER['PHP_SELF']);
echo "<label id='logheader' style='font-size:30px;'>User Sign-Up</label><br><br>";
textInput('Name ', 'name', 50, null,getValue('name',null));
textInput('Email ', 'email', 50, null,getValue('email',null));
dropDown('Grade ', 'grade', array('9', '10', '11','12'), '9');
//checkBox('I agree to allow my email to be used for survey data.','terms',true,null);
makeSubmit('Enter', 'login');
endForm();
endDiv();
endBody();
endDoc();
?>