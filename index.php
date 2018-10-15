

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <!-- Custom styles for this template -->
    <link rel="stylesheet" type="text/css" href="CSS/login.css">
    <!-- Bootstrap core CSS -->
    <link href="../../dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap core CSS -->
    <link href="../../dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="CSS/signin.css" rel="stylesheet">


</head>



<?php

//if cookie is not empty then go to home.php
if(!empty($_COOKIE['member_email'])) {
    header('Location: home.php');
} else{
    //if not go to check in
    header('Location: views/check.view.php');
}

?>

<!--<html>-->
<!--<head>-->
<!--    <title>Login</title>-->
<!--</head>-->
<!--<body>-->
<!--<h1></h1>-->
<!---->
<!--<button onclick="document.getElementById('id01').style.display='block'" style="width:auto;">Login</button>-->
<!--<div class = "container form-signin">-->
<!---->
<!---->
<!--</div>-->
<!--<div id="id01" class="modal">-->
<!---->
<!--    <form class="form-signin" action="check.php" method="post">-->
<!--        <img class="mb-4" src="img/clublogo2.png" alt="" width="100" height="120">-->
<!--        <h1 class="h3 mb-3 font-weight-normal">Inloggen</h1>-->
<!---->
<!--        <input type = "text" class = "form-control"-->
<!--               name = "email" placeholder = "Email"-->
<!--               required autofocus></br>-->
<!--        <input type = "password" class = "form-control"-->
<!--               name = "password" placeholder = "Wachtwoord" required>-->
<!--        <input type="submit" value="Login" name="submit"/>-->
<!--    </form>-->
<!---->
<!--</div>-->
<!---->
<!--<script>-->
<!--    // Get the modal-->
<!--    var modal = document.getElementById('id01');-->
<!---->
<!--    // When the user clicks anywhere outside of the modal, close it-->
<!--    window.onclick = function(event) {-->
<!--        if (event.target == modal) {-->
<!--            modal.style.display = "none";-->
<!--        }-->
<!--    }-->
<!--</script>-->






</body>
</html>