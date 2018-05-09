<link href="https://fonts.googleapis.com/css?family=Quicksand:400,700" rel="stylesheet">
<?php
$theme;
$navigation;
switch($theme){
    default:
        $c_PRIMARY = "#EAEAEA"; //BODY MAIN

        $c_SECONDARY =  "#985BC";//secondary color

        $c_HIGHLIGHT = "#4D515B"; //highlight color

        $FONT = "font-family: 'Quicksand', sans-serif";//font type / name font
        break;
}
switch($navigation){
    default:
        $n_TYPE = "#bar";
        $n_CORE = "$n_TYPE{ \n
                            position:fixed;\n
                            width: 100%;\n
                            background-color: $c_PRIMARY;\n
                            font-family:  $FONT;\n
                            text-align:center;\n
                            padding-top:1%;\n
                            padding-bottom:1%;\n
                            font-size:30px;\n
                            vertical-align: middle;\n
                            
                            color: $c_SECONDARY;\n
                            margin:0;\n
                            cursor:pointer;\n
                    }\n";
}
?>