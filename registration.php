<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/registration.css">
    <title>Sign up</title>
</head>
<body>
    <section class="sec">
        <div class="row">
            <div class="col-sm-3">
                <form action="config.php" method="post">
                    <div class="container">
                         <h1>Sign up and check out our amazing discounts for you</h1>
                            <hr class="mb-3">
                         <label for="username"><b>Username</b></label>
                        <input class="form-control" type="text" name="username" placeholder="Your username here" required>

                        <label for="pass"><b>Password</b></label>
                        <input class="form-control" type="password" name="pass" placeholder="Your password here" required>

                        <label for="email"><b>Email</b></label>
                        <input class="form-control" type="text" name="email" required>

                        <label for="full"><b>Full name</b></label>
                        <input class="form-control" type="text" name="full" required>
                        <hr class="mb-3">
                        <input class="btn btn-primary" type="submit" name="register" value="Register">                
                        <button class="btn btn-primary" onClick="btnClicked()">Back</button>
                        <script>
                            function btnClicked(){
                              document.location.href="index.html";
                            }
                        </script>
                    </div>
                </form>
            </div>
        </div>
    </section>
</body>
</html>