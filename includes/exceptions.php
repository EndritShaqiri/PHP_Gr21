<?php 
include_once "connection.php";

class PasswordLengthException extends Exception { }
class PasswordNoLetterException extends Exception { }
class PasswordNoDigitException extends Exception { }
class PasswordInvalidCharException extends Exception { }

function validatePassword($password) {
    $password_array = str_split($password);
    $letters = 0;
    $digits = 0;

    // count the letters and digits in password
    foreach($password_array as $char) {
        if(preg_match('/[a-zA-Z]/', $char)) {
            $letters++;
        }
        if(is_numeric($char)) {
            $digits++;
        }
    }

    // check if password has at least 8 characters
    if(strlen($password) < 8) {
        throw new PasswordLengthException("Password must contain at least 8 characters!");
    }

    // check if password contains digits
    if($digits == 0) {
        throw new PasswordNoDigitException("Password must contain digits");
    }

    // check if password contains letters
    if($letters == 0) {
        throw new PasswordNoLetterException("Password must contain letters");
    }

    // check if password contains invalid characters
    if(preg_match("/[^a-zA-Z0-9]/", $password)) {
        throw new PasswordInvalidCharException("Password can only contain letters and digits!");
    }
}

?>
