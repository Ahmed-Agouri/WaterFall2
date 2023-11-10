<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="register-photo">
        <div class="form-container">
            <div class="image-holder">
            </div>
            <form method="post" action="CheckAdminLogin.php">
                <h2 class="text-center"><strong>Admin </strong>Login</h2>
                <div class="form-group"><input class="form-control" type="text" name="Emailaddress" placeholder="Email address" required></div>
                <div class="form-group"><input class="form-control" type="password" name="password" placeholder="Password" required></div>
                <div class="form-group">
                </div>
                <div class="form-group"><button class="btn btn-primary btn-block" type="submit">Login</button></div>
                
               
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
</body>

</html>