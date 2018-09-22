the password field must have another field for confimation with the name "password_confirmation"
<!DOCTYPE HTML>
<html>
    <head>
    </head>

    <body>
        <form method="post" action = "/registration">
            <input type="text" name="fullname" placeholder="fullname">
            <input type="email" name="email" placeholder = "email">
            <input type="password" name="password" placeholder = "password">
            <input type="password" name="password_confirmation" placeholder="confirm password">
            <input type="text" name="role" value="customer"><!--in reality it should be a select box-->
            <input type="submit" value="register">
        </form>
    </body>
</html>
