<?php
include "Initialize.php";
give_head();
give_header();
$faq= array(
    "Volunteering" => "TXT",
    "Awards"=>"TXT",
    "Art"=>"TXT"
    );
make_faq("Makenna",$faq);
?>