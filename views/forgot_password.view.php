<html>
<head>

    <meta charset="UTF-8">
    <title>Password vergeten</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <!-- Custom styles for this template -->
    <link href="../CSS/signin.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../CSS/login.css">

    <!-- Bootstrap core CSS -->
    <link href="../../dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../CSS/signin.css" rel="stylesheet">
</head>
<body class="text-center background" onload="loginload()">
<h1></h1>


<div id="id01" class="modal" >

    <form class="form-signin form-password" action="../forgot_password.php" method="post">
        <img class="mb-4" src="../img/clublogo2.png" alt="" width="100" height="120">
        <h1 class="h3 mb-3 font-weight-normal">Wachtwoord vergeten?</h1>

        <p>Vul hier je e-mail adres en klik op versturen</p>
        <input type = "text" class = "form-control"
               name = "email" placeholder = "Email"
               required autofocus></br>
        <input type="submit" value="Send" class="btn btn-lg btn-primary btn-block"
               name="submit"/>
        <p>
         <a href="check.view.php">return</a>
        </p>
    </form>
</div>

<script>
    function loginload(){
        document.getElementById('id01').style.display='block';
    }
</script>

