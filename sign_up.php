<!DOCTYPE html>
<html>

<head>
    <title>Sign Up</title>
    <link href="./main.css" rel="stylesheet" />
    
</head>

<body>
    <h1>Sign UP!</h1>
    <p><span class="error">* required field</span></p>
    <div class="container">

        <form name="signup_form" onsubmit="e.preventDefault()" oninput="verification()" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
            <div id="name">
                <label for="first_name">First Name</label>
                <input id="first_name" name="first_name" type="text" required />

                <label for="last_name">Last Name</label>
                <input id="last_name" name="last_name" type="text" required />

            </div>
            <div id="details">
                <label for="email">Email</label>
                <input id="email" name="email" type="email" required />
                <span><p><?php echo $emailErr ?></p></span>
                <label for="phone_number">Phone Number</label>
                <input id="phone_number" name="phone_number" type="tel" required />

                <label for="password">Password</label>
                <input id="password" name="password" type="password" required>
                <span><p><?php echo $passwordErr ?></p></span>
                <label for="confirm_password">Confirm Password</label>
                <input id="confirm_password" name="confirm_password" type="password" required />
                <span><p><?php echo $confirm_passwordErr ?></p></span>
                <button id="submit_button" type="submit">Sign Up</button>
            </div>
        </form>
    </div>
    <?php
    $emailErr=$passwordErr=$confirm_passwordErr = "";

    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        echo "get";
        getUsersFunction();
        exit ();
    };
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        echo "Post";
        signUpFunction();
        header("Location: login.php");
        exit();
    }

    function getUsersFunction()
    {
        $data = file_get_contents("mydb.json");
        $users = json_decode($data);
        foreach ($users as $user) {
            echo $user->name . " <br/>";
            echo $user->email . " <br/>";
            echo $user->phone_number . " <br/>";
            echo $user->password . " <br/>";
        };
    }
    function signUpFunction()
    {
        if (empty($_POST["email"])) {

            $emailErr = "Invalid Email address";
            echo $emailErr;
            exit();
        } else {

            $email = test_input($_POST["email"]);

            // check if e-mail address is well-formed

            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

                $emailErr = "The email address is incorrect";
                echo $emailErr;
                exit();
            }
        }
        if (empty($_POST["password"]) || empty($_POST["confirm_password"])) {
            $passwordErr = "Invalid Password";
            echo $passwordErr;
            exit();
        } else if (!($_POST["password"] === $_POST["confirm_password"])) {
            $passwordErr = $confirm_passwordErr = "Passwords don't make match";
            echo $confirm_passwordErr;
            exit();
        } else {
            $user_data = array(
                'name' => $_POST['first_name'] . $_POST['last_name'],
                'email' => $_POST['email'],
                'phone_number' => $_POST['phone_number'],
                'password' => $_POST['password'],
                'confirm_password' => $_POST['confirm_password'],
            );

            $json = file_get_contents("mydb.json");
            $data = json_decode($json);

            $data[] = $user_data;
            $json_data = json_encode($data);
            file_put_contents('mydb.json', $json_data);

        }
    }
    function test_input($data)
    {

        $data = trim($data);

        $data = stripslashes($data);

        $data = htmlspecialchars($data);

        return $data;
    }

    ?>

    <script src="./main.js"></script>
</body>

</html>