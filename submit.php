<?php
$pageTitle = "Beatles Fan Club Membership Form";
$pass1 = $_POST['password'];
$pass2 = $_POST['passwordV'];
include_once 'header.php';
?>

<input type="hidden" name="bIndex" value="<?php array_search($_POST['beatle'], $beatleArray)?>"/>

<?php
if($pass1 != $pass2) {
    include_once 'menu.php';
    echo "Your passwords did not match, try again.";
}
else {
    echo userCreate();
}

function userCreate() {
    include_once 'menu.php';
    $bIndex = array_search($bName, $beatleArray);
    $pass1 = $_POST['password'];
    $fName = $_POST['firstName'];
    $lName = $_POST['lastName'];
    $bName = $_POST['beatle'];
    $F2FN = substr($fName, 0, 2);
    $L2LN = substr($lName, -2);
    $F2BN = substr($bName, 0, 2);
    $L1BN = substr($bName, -1);
    $L3PW = substr($pass1, -3);
    $pwLen = strlen($pass1) - 3;
    $pwSecure = str_repeat("*", $pwLen);
    $userName = $F2FN . $L2LN . $bIndex . $F2BN . $L1BN;
    echo "<div align=center>Your Username is: " . $userName . "</br>Below is your information: </br>" . "First Name: " . $fName . "</br>Last Name: " . $lName . "</br>Password: " . $pwSecure . $L3PW . "</br>Beatle: " . $bName . "</div>";
}

include_once 'footer.php';

?>
