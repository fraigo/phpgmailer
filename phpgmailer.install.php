<?php

$files=[
    "Exception",
    "OAuth",
    "PHPMailer",
    "SMTP"
];
$TARGET=dirname(__FILE__)."/PHPMailer";
if (!file_exists($TARGET)){
    echo "Creating folder PHPMailer ...\n";
    mkdir($TARGET);
}
$BASEURL="https://raw.githubusercontent.com/PHPMailer/PHPMailer/master/src";
foreach($files as $file){
    echo "Downloading PHPMailer/$file...\n";
    file_put_contents("$TARGET/$file.php",file_get_contents("$BASEURL/$file.php"));
}
