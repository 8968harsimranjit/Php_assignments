<?php
$submitted_email = isset($_POST['email']);
$submitted_password = isset($_POST['password']);
if ($submitted_email == 'marge' && $submitted_password == 'maggie77') {
echo 'Welcome';
} else {
echo 'Bad credentials';
}
?>
