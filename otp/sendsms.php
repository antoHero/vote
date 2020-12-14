<?php
require('textlocal.class.php');

$textlocal = new Textlocal(false, false, API_KEY);

$numbers = array(447123456789);
$sender = 'VOTE CSC';
$otp = mt_rand(10000, 99999);
$message = 'Hello ' . $matric . 'your OTP is: ' . $otp . 'it will expire after 10mins';

try {
    $result = $textlocal->sendSms($numbers, $message, $sender);
    setcookie('otp', $otp, 600);
   echo "<p class='alert alert-success'>Your OTP has been sent to your phone</p>";
} catch (Exception $e) {
    die('Error: ' . $e->getMessage());
}
?>