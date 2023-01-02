
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./assets/login.css">
</head>
<body>

<div class="grid align__item">

    <div class="login">


        <h2 style="text-align: center">Please login into your account to take the quiz</h2>

        <form action="./Controller/user.php" method="post" class="form">

            <div class="form__field">
                <input style="display: none" name="functionName"  type="text" value="checkUser">
                <input type="text" name="username" placeholder="test@mailaddress.com">
            </div>

            <div class="form__field">
                <input type="password" name="password" placeholder="••••••••••••">
            </div>

            <div class="form__field">
                <input type="submit" value="Login">
            </div>

        </form>


    </div>

</div></body>
</html>
