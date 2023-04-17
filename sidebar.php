<html lang="en">
<head>
    
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Analytics</title>
    <link rel="stylesheet" href="./analytics.css">
    <link rel="stylesheet" href="./stylesx.css">
    <!-- Include Chart.js library -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js"></script>
</head>
<body>
<div class="wrapper">
        <!--Top menu -->
        <div class="sidebar">
           <!--profile image & text-->
           <div class="profile">
            <img src="./blank-profile-picture.webp" alt="profile_picture">
            <h3>Owner</h3>
            <p>Designer</p>
        </div>

            <!--menu items-->
            <ul>
                <li>
                    <a href="index.php" class="active">
                        <span class="icon"><i class="fas fa-home"></i></span>
                        <span class="item">Home</span>
                    </a>
                </li>
                <li>
                    <a href="./dash.php">
                        <span class="icon"><i class="fas fa-desktop"></i></span>
                        <span class="item">My Dashboard</span>
                    </a>
                </li>
                
                <li>
                    <a href="./bug.php">
                        <span class="icon"><i class="fas fa-tachometer-alt"></i></span>
                        <span class="item">Perfomance</span>
                    </a>
                </li>
                <li>
                    <a href="./search_function.php">
                        <span class="icon"><i class="fas fa-database"></i></span>
                        <span class="item">Search</span>
                    </a>
                </li>
                <li>
                    <a href="./analytics.php">
                        <span class="icon"><i class="fas fa-chart-line"></i></span>
                        <span class="item">Analytics</span>
                    </a>
                </li>
                <li>
                    <a href="./home.php">
                        <span class="icon"><i class="fas fa-user-shield"></i></span>
                        <span class="item">LogOut</span>
                    </a>
                </li>
                <li>
                    <a href="./sidebar.php">
                        <span class="icon"><i class="fas fa-cog"></i></span>
                        <span class="item">Import</span>
                    </a>
                </li>
            </ul>
            <!--Navigation bar-->
            <div class="section">
                <div class="top_navbar">
                    <div class="hamburger">
                        <a href="#">
                            <i class="fas fa-bars"></i>
                        </a>
                    </div>
                </div>
    
            </div>
 
        </div>
        <script>
var hamburger = document.querySelector(".hamburger");
    hamburger.addEventListener("click", function(){
        document.querySelector("body").classList.toggle("active");
    })
  </script>

</body>
</html>