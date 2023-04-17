<!DOCTYPE html>
<html>

<head>
    <title>login</title>
    <link rel="stylesheet" href="./main.css" />
    <link rel="stylesheet" href="./style.css"
</head>

<body>
<header>
		<div class="main">
		<ul>
		 <li class="active"><a href="home.php"><i class="fa fa-home"></i>Home</a></li>
		 <li><a href="./login.php">Login</a></li>
		 <li><a href="./sign_up.php">Sign up</a></li>
		 <li><a href="./about.html">About</a></li>
		 <li><a href="./contact.html">Contact</a></li>
		 <li><a href="./instructions.html">Instructions</a></li>
		 <li><a href="./indev.html"><i class="fa fa-caret-down"></i> Other Services <i class="fa fa-caret-down"></i></a>
		 	<div class="sub-menu">
		 		<ul>	 
		 		 <li><a href="./indev.html">S.E.O</a></li>
		 		 <li><a href="./indev.html">Chatbot</a></li>
		 	 </ul>
		 	</div>
		 </li>
		</ul>

		 	</header>
    <p><span class="error">* required field</span></p>
    <div class="container">

        <form name="signup_form" onsubmit="e.preventDefault()" oninput="verification()" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
           
            <div id="details">
                <label for="email">Email</label>
                <input id="email" name="email" type="email" required />
               
                <label for="password">Password</label>
                <input id="password" name="password" type="password" required>
               
                <p>Don't have an acount?</p>
                <a href="./sign_up.php"></a>
                <button id="submit_button" type="submit">Log In</button>

            </div>
        </form>
    </div>
</div>
    <?php
    
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        echo "get";
        exit ();
    };
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        echo "Post";
        logInFunction();
       
        exit();
    }

    function logInFunction()
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
        if (empty($_POST["password"])) {
            $passwordErr = "Invalid Password";
            echo $passwordErr;
            exit();
        } 
         else {
            $user_data = array(
                'email' => $_POST['email'],
                'password' => $_POST['password'],
            );

            $json = file_get_contents("mydb.json");
            $users = json_decode($json);

            foreach ($users as $user) {
                if ($user->email ===  $user_data['email'] && $user->password === $user_data['password']){
                    echo "correct email and password";
                    header("Location: dash.php");
                    break;
                    exit();

                }
                else {
                    echo "Email :     " .$user->email . "   ===   " . $user_data['email'] . "<br />";
                    echo "Password     ".$user->password . "  ===   " . $user_data['password'] . "<br />";
                    echo "Incorrect email and password" . "<br />";
                }
            };
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
