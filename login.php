<?php 
session_start();

$error = "";

$servername = "localhost";
$username = "root";
$password = null;
$db_database = "final_proj";

// Create connection
$conn = new mysqli($servername, $username, $password, $db_database);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}




if(isset($_POST['username'])){

    
    $uname=$_POST['username'];
    $password=$_POST['password'];
    
    //$sql="select * from employees where email ='".$uname."'AND password ='".$password."' limit 1";
    
    //$result = $conn->query($sql);


    $sql = "SELECT * from employees where email=? AND password=? limit 1"; // SQL with parameters
    $stmt = $conn->prepare($sql); 
    $stmt->bind_param("ss", $uname,$password);
    $stmt->execute();
    $result = $stmt->get_result(); // get the mysqli result
    
    if(mysqli_num_rows($result)==1){
        


    $sql = "SELECT id FROM employees WHERE email=?"; // SQL with parameters
    $stmt = $conn->prepare($sql); 
    $stmt->bind_param("s", $uname);
    $stmt->execute();
    $result = $stmt->get_result(); // get the mysqli result
    $user_id2 = $result->fetch_assoc(); // fetch data 
    $user_id = strval(reset($user_id2));


    $_SESSION['employee_id']=$user_id;

    $sql = "SELECT branch_id FROM employees WHERE email=?"; // SQL with parameters
    $stmt = $conn->prepare($sql); 
    $stmt->bind_param("s", $uname);
    $stmt->execute();
    $result = $stmt->get_result(); // get the mysqli result
    $user_id3 = $result->fetch_assoc(); // fetch data 
    $user_id4 = strval(reset($user_id3));


    $_SESSION['branch_id']=$user_id4;



        header("Location: index.php");
        exit();
    }
    else{
        $error="incorect username or password";
        
    }
        
}
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Clean Blog - Start Bootstrap Theme</title>
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body>
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light" id="mainNav">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="index.html">Start Bootstrap</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto py-4 py-lg-0">

                    </ul>
                </div>
            </div>
        </nav>
        <!-- Page Header-->
        <header class="masthead" style="background-image: url('assets/img/contact-bg.jpg')">
            <div class="container position-relative px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                        <div class="page-heading">
                            <h1>Login Bellow</h1>
                         
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- Main Content-->
        <main class="mb-4">
            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                        <p>please enter your login information to get started</p>
                        <div class="my-5">
                            <!-- * * * * * * * * * * * * * * *-->
                            <!-- * * SB Forms Contact Form * *-->
                            <!-- * * * * * * * * * * * * * * *-->
                            <!-- This form is pre-integrated with SB Forms.-->
                            <!-- To make this form functional, sign up at-->
                            <!-- https://startbootstrap.com/solution/contact-forms-->
                            <!-- to get an API token!-->
                            <div class="container">
        <form method="POST" action="#">
            <div class="form-input">
                <input type="text" name="username" placeholder="Enter the email"/>  
            </div>
            <div class="form-input">
                <input type="password" name="password" placeholder="password"/>
                <div> <?php echo $error; ?></div>
            </div>
            <input type="submit" type="submit" value="LOGIN" class="btn-login"/>
        </form>
    </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <!-- Footer-->
        <footer class="border-top">
            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                        <ul class="list-inline text-center">
                            <li class="list-inline-item">
                                <a href="#!">
                                    <span class="fa-stack fa-lg">
                                        <i class="fas fa-circle fa-stack-2x"></i>
                                        <i class="fab fa-twitter fa-stack-1x fa-inverse"></i>
                                    </span>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#!">
                                    <span class="fa-stack fa-lg">
                                        <i class="fas fa-circle fa-stack-2x"></i>
                                        <i class="fab fa-facebook-f fa-stack-1x fa-inverse"></i>
                                    </span>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#!">
                                    <span class="fa-stack fa-lg">
                                        <i class="fas fa-circle fa-stack-2x"></i>
                                        <i class="fab fa-github fa-stack-1x fa-inverse"></i>
                                    </span>
                                </a>
                            </li>
                        </ul>
                        <div class="small text-center text-muted fst-italic">Copyright &copy; Your Website 2022</div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <!-- * *                               SB Forms JS                               * *-->
        <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
    </body>
</html>