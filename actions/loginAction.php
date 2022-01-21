<?php
include "/xampp/htdocs/e-commerce/autoload/autoload.php";

use models\Auth;

session_start();

$email = $_POST["email"];
$password = $_POST["password"];

$auth = Auth::getAuthInstance();
$authResult = $auth->checkLogin($email, $password);

if ($authResult) {
    $_SESSION["auth"]["user"]["id"] = $authResult["id"];
    $_SESSION["auth"]["user"]["name"] = $authResult["name"];
    $_SESSION["auth"]["user"]["role"] = $authResult["role_id"];
    $_SESSION["auth"]['login_status'] = true;
    echo "<pre>";
    var_dump($_SESSION);
    if ($_SESSION["auth"]["user"]["role"] == "2")
        header("location:http://localhost/e-commerce/views/admin/profile.php");
    else
        header("location:http://localhost/e-commerce");
} else {
    echo "<script>
    alert('wrong login!')
</script>";
    header("location:http://localhost/e-commerce/views/login.php");
}
