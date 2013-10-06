<?php include 'function.php';

if(isset($_POST['username']) && isset($_POST['password']))
{
    $resultLogin = connectUser($_POST['username'], $_POST['password']);
}?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>MegaDL - Login</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="assets/css/signin.css" rel="stylesheet">

</head>

<body>

<div class="container">
    <form action="login.php" method="post" class="form-signin">
        <h2 class="form-signin-heading">Please sign in</h2>
        <?php
        if($resultLogin != NULL)
        {
            echo $resultLogin;
        }?>
        <input type="text" id="username" name="username" class="form-control" placeholder="Username" value="<?php echo $_POST['username']; ?>" autofocus>
        <input type="password" id="password" name="password" class="form-control" placeholder="Password">
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
    </form>
</div>

</body>
</html>