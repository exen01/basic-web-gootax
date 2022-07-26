<?php
include __DIR__ . '/util.php'
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Authorization</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

</head>
<body>
<div class="container">
    <form class="row row-cols-1 justify-content-center" action="login-controller.php" method="post">
        <h2 class="col-3 mb-3">Authorization</h2>
        <div class="w-100"></div>
        <?php showMessage(); ?>
        <div class="w-100"></div>
        <div class="col-3 mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                   required>
            <div id="emailHelp" class="form-text">example@example.com</div>
        </div>
        <div class="w-100"></div>
        <div class="col-3 mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input name="password" type="password" class="form-control" id="exampleInputPassword1" required>
        </div>
        <div class="w-100"></div>
        <div class="col-3 mb-3">
            <button name="auth-button" type="submit" class="btn btn-primary">Sign in</button>
        </div>
    </form>
</div>
</body>
</html>