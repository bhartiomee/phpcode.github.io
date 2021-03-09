
<?php
 include '_dbconnect.php';
 session_start();
 echo  '<nav class="navbar navbar-expand-lg navbar-dark bg-info">
            <a class="navbar-brand" href="/phpLessons/forum">e-panel</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="/phpLessons/forum">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="about.php">About</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            Top Categories
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">';
                        $sql="SELECT * FROM `categories` LIMIT 5";
                        $result=mysqli_query($conn,$sql);
                        while($row=mysqli_fetch_assoc($result)){
                        echo'    <a class="dropdown-item" href="#">'.$row['category_name'].'</a>
                            ';
                        }
                            
                       echo' </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contact.php">Contact</a>
                    </li>
                </ul>
                <div class="row mx-2">';
                if(isset($_SESSION['loggedin']) &&( $_SESSION['loggedin']=true)){
                    echo '<form class="form-inline my-2 my-lg-0" method="get" action="search.php">
                    <input class="form-control mr-sm-2" name="search" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-dark my-2 my-sm-0" type="submit">Search</button> 
                    <p class="text-light my-0 mx-2"> Welcome '. $_SESSION['username'].' 
                    </p>
                    <a href="partials/_logout.php" class="btn btn-outline-dark ml-2">Logout</a>
                     </form>';
                }
                else{
                
                    echo  '<form class="form-inline my-2 my-lg-0" method="get" action="search.php">
                            <input class="form-control mr-sm-2"  name="search"  type="search" placeholder="Search" aria-label="Search">
                            <button class="btn btn-dark my-2 my-sm-0" type="submit">Search</button>
                        </form>
                        <button type="button" class="btn btn-outline-dark ml-2" data-toggle="modal" data-target="#loginModal">Login</button>
                        <button type="button" class="btn btn-outline-dark mx-2" data-toggle="modal" data-target="#signupModal">Signup</button>';
                }
                    
                echo '</div>
            </div>
    </nav>';
            


        include 'partials/_loginModal.php';
        include 'partials/_signupModal.php';
        // include 'partials/_handleLogin.php';
        // include 'partials/_handleSignup.php';

      
      //DISPLAYING LOGOUT ALERT  
        if(isset($_GET['action'])&&$_GET['action']=='logout'){
            echo'<div class="alert alert-success alert-dismissible fade show  mb-0" role="alert">
                        <strong>Success!</strong> Logged out successfully.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                </div>';
        }

    //DISPLAYING LOG IN ALERT
    ?>
    <!-- <script> 
    if(typeof window.history.pushState == 'function')
    {        
        window.history.pushState({}, "Hide", "http://localhost/phpLessons/forum/");  
    } 
    </script> -->
<?php
    
    if(isset($_GET['login']) &&( $_SESSION['login']=true)){
        echo'<div class="alert alert-success alert-dismissible fade show mb-0" role="alert">
                        <strong>Success!</strong>Logged in successfully.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                </div>';
                // $_SESSION['alert']=false;
    
    }
    else{
        if(isset($_GET['error'])){
            $loginError=$_GET['error'];
            echo ' <div class="alert alert-danger alert-dismissible fade show  mb-0" role="alert">
            <strong>Error!</strong>' .$loginError.'
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
            </div> ';
           
        }
    }

    //DISPLAYING SIGN IN ALERT
   
    if(isset($_GET['signupSuccess'])&&($_GET['signupSuccess']==true)){
        echo'<div class="alert alert-success alert-dismissible fade show  mb-0" role="alert">
                        <strong>Success!</strong>Signed in successfully.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                </div>';
                // $_SESSION['alert']=false;
    
    }
    else{
        if(isset($_GET['error'])){
            $signinError=$_GET['error'];
            echo ' <div class="alert alert-danger alert-dismissible fade show  mb-0" role="alert">
            <strong>Error!</strong>' .$signinError.'
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
            </div> ';
           
        }
    }

        
?>