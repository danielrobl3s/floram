<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="./css/lg.css">
</head>
<body>
    <header>
        <center><h1>Login to manage your orders and have amazing offers</h1></center>
    </header>
    <form action="auth.php" method="POST" class="container" id="form">
        <div  class="form-group">
            <label for="">username</label>
            <input type="text" name="user" class="form-control" placeholder="Your username">
        </div>

        <div class="form-group">
            <label for="">password</label>
            <input type="password" name="pass" class="form-control" placeholder="Your password">
        </div>
        <div>
            <p id="feedback" class="text-danger"></p>
            <button class="btn btn-primary mt-4 mx-2" id="login">Enter</button>
            <label for="" class="sign"><a href="http://localhost/floram/registration.php">Sign up</a></label>
        </div>
    </form>

    <script>
        let button = document.getElementById("login");
        button.addEventListener("click", (event)=>{
            event.preventDefault();
            let data = new FormData(document.getElementById("form"));

            fetch('auth.php',
            {
                method: 'POST',
                body: data
            }
            )
            .then((response)=>{
                if(response.ok){
                    return response.text();
                }
                else{
                    throw "Error in AJAX calling";
                }
            })
            .then((text)=>{
                if(text == 'Valid user'){
                    document.location.href="indexuser.php";
                }
                else{
                    document.getElementById("feedback").innerText="Check your credentials";
                }
            })
            ;
        });
    </script>
</body>
</html>