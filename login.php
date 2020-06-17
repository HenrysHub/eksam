<?php
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
$password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
$action = filter_input(INPUT_POST, 'action', FILTER_SANITIZE_STRING);

if (isset($action) && $action == 'login') {

//    sleep(5); //TODO for deploy

$error = [];



if (empty($error)) {

$oUser = User::auth($email, $password);

if (is_object($oUser)) {
$session->login($oUser);

$session->message('User login successful');
//            redirect('admin/?page=home');

} else {
$error['login'] = 'Authentication failed';
}
}
}

?>

<?php echo empty($error) ? "" : '<div class="alert alert-warning"><ul><li>' . join("</li><li>", $error) . '</li></ul></div>'; ?>

<form class="form-signin" method="post">
    <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>

    <label for="inputEmail" class="sr-only">Email address</label>
    <input name="email" type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
    <label for="inputPassword" class="sr-only">Password</label>
    <input name="password" type="password" id="inputPassword" class="form-control" placeholder="Password" required>

    <button name="action" value="login" class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
</form>