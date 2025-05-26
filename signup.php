
<!DOCTYPE html>
<html>
    <head>
        <title>Manager Registration</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.min.css">

    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Job description of for SEA company" />
    
 
</head>
<body>
<?php
  // Manager Registration

?>
    <h1>Manager Registration</h1>

    <form action="process_register.php" method="POST" id="register" novalidate>
        <div>
            <label for="name">Name</label>
            <input type="text" id="name" name="name">
        </div>
        <div>
            <label for="email">Email</label>
            <input type="email"id="email" name="email">
        </div>
        <div>
            <label for="password">Password</label>
            <input type="password" id="password" name="password">
        </div>
        <div>
            <label for="password_confirmation">Repeat Password</label>
            <input type="password" id="password_confirmation" name="password_confirmation">
        </div>

        <button>Register</button>
    </form>
        <div>
            <form action="manage.php" method="get">
                <button type="submit">Return to Manage</button>
            </form>
        </div>


</body>
</html>