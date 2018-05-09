<?php
function DOC_start($title,$font=null){
    echo "<!DOCTYPE html>\n<html>\n<head>\n<title>$title</title>\n";
    echo $font;
}

?>