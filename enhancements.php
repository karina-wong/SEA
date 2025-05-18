<!DOCTYPE html>
<html>
    <head>
        <title>Manager Registration</title>
        <meta charset="UTF-8">
</head>
<body>
    <h1>Manager Registration</h1>

    <form action="process_register.php" method="POST" id="register" novalidate>
        <div>
            <label for="name">Name</label>
            <input type="text" id="name" name="name">
        </div>
        <div>
            <label for="email">email</label>
            <input type="email"id="email" name="email">
        </div>
        <div>
            <label for="password">Password</label>
            <input for="password" id="password" name="password">
        </div>
        <div>
            <label for="password_confirmation">Repeat password</label>
            <input type="password" id="password_confirmation" name="password_confirmation">
        </div>

        <button>Register</button>
    </form>

</body>
</html>