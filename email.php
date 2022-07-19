<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="emailsender.php" method="POST" class="container" id="form">
        <div  class="form-group">
            <label for="">Email</label>
            <input type="email" id="email" name="email" class="form-control" placeholder="Your email">
        </div>
        <div>
            <p id="feedback" class="text-danger"></p>
            <button class="btn-box" type="submit" id="sd">Send</button>
            <p id="feedback-success" class="text-danger"></p>
            <p id="feedback-error" class="text-danger"></p>
        </div>
    </form>

    <script>
let button = document.getElementById("sd");
button.addEventListener("click",(event)=>{
    event.preventDefault();
    let data = new FormData(document.getElementById("form"));

fetch('mailsender.php',{
method: 'POST',
body: data
})
.then((response)=>{
    if(response.ok){
        return response.text();
    }
    else{

        throw "Error in AJAX calling";
    }
})
.then((text)=>{
    if(text == "your email has been sent"){
       document.getElementById("feedback-success").innerText = "You've been added to our email list.";

    }
    else{
      document.getElementById("feedback-success").innerText = "";
        document.getElementById("feedback-error").innerText = "Your email has been sent";
    }
    console.log(text);

})
;

    //console.log("this code is for override normal behavior");
});

    </script>
</body>
</html>