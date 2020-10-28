<?php
$submitted_email = isset($_POST['email']);
$submitted_password = isset($_POST['password']);
// if ($email != 'homer@aol.com') {
//     header("Location: http://localhost/dgl123_assignment_5/login.php");
//     die;
// } elseif ($password != 'flanders') {
//     header("Location: http://localhost/dgl123_assignment_5/login.php");
//     die;
// }
if ($submitted_email == 'marge' && $submitted_password == 'maggie77') {
echo 'Welcome';
} else {
echo 'Bad credentials';
}
?>