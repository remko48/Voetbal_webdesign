<html>
<head>

    <meta charset="UTF-8">
    <title>Password vergeten</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">


    <!-- Custom styles for this template -->
    <link href="signin.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="login.css">

    <!-- Bootstrap core CSS -->
    <link href="../../dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="signin.css" rel="stylesheet">
</head>
<body class="text-center background">

<?php
require 'core/QueryBuilder.php';
$qb = new QueryBuilder();

if ($qb->checkForgotPassIdentity($_GET['id'])):?>
    <?php
    //if the password and repeat password is not empty and is equal to each other continue
    if (!empty($_POST['password']) && !empty($_POST['repeat-password']) && $_POST['password'] == $_POST['repeat-password']) {
        //function
        //post->the password from user GET-> the id of the link
        $qb->changedPassword($_POST['password'],$_GET['id']);
//        header('Location: password_correct.view.php');

        //if else no password and no repeat password show message
    } else {

    }
    ?>

    <form class="form-signin form-password" action="" method="post">
        <img class="mb-4" src="img/clublogo2.png" alt="" width="100" height="120">
        <h1 class="h3 mb-3 font-weight-normal">Nieuw wachtwoord</h1>

        <p>Vul hier je nieuwe wachtwoord en klik op versturen</p>
        <input type="password" class="form-control"
               name="password" placeholder="Wachtwoord" required></br>
        <input type="password" class="form-control"
               name="repeat-password" placeholder="Herhaal wachtwoord" required></br>

        <input type="submit" value="Send" class="btn btn-lg btn-primary btn-block" name="submit"/>
    </form>
<?php else : ?>
    <h1>Wrong link or, expired</h1>
<?php endif; ?>


<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

</body>
</html>