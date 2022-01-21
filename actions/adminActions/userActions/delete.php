

<?php
include "../../../autoload/autoload.php";
echo "<script>confirm('Sure to delete?')</script>";


use models\UserModel;

$userModel = new UserModel();

$id = $_GET["id"];

$userModel->deleteUser($id);

header("location:http://localhost/e-commerce/views/admin/users.php");
?>

