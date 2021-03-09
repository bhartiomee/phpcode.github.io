<?php
    $insert=false;
    $update=false;
    $delete=false;
    //Connecting to the database
    $servername="localhost";
    $username="root";
    $passowrd="";
    $database="notes";

    //Create a connection
    $conn=mysqli_connect($servername,$username,$passowrd,$database);

    //die if connection failed
    if (!$conn){
        die("<br>failed to connect".mysqli_connect_error()); //try this after giving a pswrd on line 7
    }

    if(isset($_GET['delete'])){
        $sno=$_GET['delete'];
        $delete=true;
        $sql="DELETE FROM `notes` WHERE `sno` = $sno"; //deletes only 10 entries from top
         $result=mysqli_query($conn,$sql);
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        if (isset( $_POST['snoEdit']))
        {
            //update tHe recored
            $sno = $_POST["snoEdit"];
            $title = $_POST["titleEdit"];
            $description = $_POST["descriptionEdit"];
        
          // Sql query to be executed
          $sql = "UPDATE `notes` SET `title` = '$title' , `description` = '$description' WHERE `notes`.`sno` = '$sno'";
          $result = mysqli_query($conn, $sql);
          if($result)
          {
            $update = true;
          }
        
            else
            {
                echo "We could not update the record successfully";
            }
        }
        else
        {
            //insert the record
            
            $title = $_POST['title'];
            $description = $_POST['desc'];

            $sql="INSERT INTO `notes` (`title`, `description`) 
            VALUES ('$title', '$description')";

            $result=mysqli_query($conn,$sql);

            //check data insertion success
            if($result)
            {
                $insert=true;
            }
            else{
                echo "<br>Insertion failed due to--->".mysqli_error($conn);
            }
        }
    }
      

?>


<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">   
    

    <title>iNotes-Notes taking made easy</title>

</head>

<body>
        <!-- edit modal -->
    <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editModal">
    editModal
    </button> -->

    <!--Edit  Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLable" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit Note</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <div class="modal-body">
                <form action="/phpLessons/mysql/iNotes/index.php" method="POST">
                    <input type="hidden" name="snoEdit" id="snoEdit">
                    <div class="form-group">
                        <label for="titleEdit">Note Title</label>
                        <input type="text" class="form-control" id="titleEdit" name="titleEdit">
                    </div>
                    <div class="form-group">
                        <label for="descriptionEdit">Notes Description</label>
                        <textarea class="form-control" id="descriptionEdit" rows="3" name="descriptionEdit"></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary">Update Note</button>
                </form>
            </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">iNotes
            <!-- <img src="/docs/4.5/assets/brand/bootstrap-solid.svg" width="30" height="30" alt="" loading="lazy"> -->
        </a>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Conatct Us</a>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>
    </nav>

    <!-- successgul or failed messages -->
    <?php
        if($insert){
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong> Note inserted.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>';
        }

        if($update){
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong> Note updated.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>';
        }

        if($delete){
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong> Deleted sucessfully.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>';
        }
    ?>

    <div class="container my-4">
        <h2>Add a note to iNotes</h2>
        <form action="/phpLessons/mysql/iNotes/index.php" method="POST">
            <div class="form-group">
                <label for="title">Note Title</label>
                <input type="text" class="form-control" id="title" name="title">
            </div>
            <div class="form-group">
                <label for="desc">Notes Description</label>
                <textarea class="form-control" id="desc" rows="3" name="desc"></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Add Note</button>
        </form>
    </div>

    <div class="container my-4">
        
        <table class="table table-hover" id="myTable">
            <thead>
                <tr>
                    <th scope="col">S.No</th>
                    <th scope="col">Title</th>
                    <th scope="col">Description</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $sno=1;
                    $sql="SELECT * FROM `notes`";
                    $result=mysqli_query($conn,$sql);

                    while($row=mysqli_fetch_assoc($result)){
                        echo "<tr>
                                <th scope='row'>".$sno."</th>
                                <td>".$row['title']."</td>
                                <td>".$row['description']."</td>
                                <td> <button type='button' class='edit btn btn-primary btn-sm' id=".$row['sno'].">Edit</button> 
                                <button type='button' class='delete btn btn-primary btn-sm' id=d".$row['sno'].">Delete</button>
                        </tr>"; 
                      $sno=$sno+1;  
            
                    }
               ?>
                

            </tbody>
        </table>
    </div>
    <hr>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous">
    </script>
   
   
    <script
        src="https://code.jquery.com/jquery-3.5.1.js"
        integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
        crossorigin="anonymous">
    </script> 
    <script src="//cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
        integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI"
        crossorigin="anonymous">
    </script>
        
    <script>
         $(document).ready( function () {
            $('#myTable').DataTable();
        } );
    </script>

    <script>
        var edits=document.getElementsByClassName('edit');
        Array.from(edits).forEach(element => {
            element.addEventListener('click',(e)=>{
                console.log('edits');
                tr=e.target.parentNode.parentNode;
                title=tr.getElementsByTagName('td')[0].innerText;
                description=tr.getElementsByTagName('td')[1].innerText;
                console.log(title,description);
                titleEdit.value=title;
                descriptionEdit.value=description;
                snoEdit.value=e.target.id;
                console.log(snoEdit)
                $('#editModal').modal('toggle');
                
            }) 
        });
        

        var deletes=document.getElementsByClassName('delete');
        Array.from(deletes).forEach(element => {
            element.addEventListener('click',(e)=>{
                console.log('deletes');
                sno=e.target.id.substr(1,);
                console.log(sno);
               if(confirm("Do you want to delete the note?")){
                   console.log('yes');
                   window.location=`/phpLessons/mysql/iNotes/index.php?delete=${sno}`;
               }
               else{
                   console.log('no');
                   
               }
                
            }) 
        });
    </script>
</body>

</html>