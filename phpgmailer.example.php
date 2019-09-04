<?php

require_once("phpgmailer.php");

$email= $_SERVER["argv"][1] ?: getenv("GMAIL_USER");
$pass= $_SERVER["argv"][2] ?: getenv("GMAIL_PASS");

if ($email==""){
    echo "Usage: {$_SERVER["argv"][0]} email [password]\n";
    echo "Also, you can set GMAIL_USER and GMAIL_PASS environment variables.\n";
    exit(1);
}

if ($pass==""){
    echo "Password for: $email : ";
    $pass = @trim(fgets(STDIN));
}

echo "Sending email to $email\n";
sleep(2);

gmailer($email, "Test email", "Email message", false, $email, $pass);