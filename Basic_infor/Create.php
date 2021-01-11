<?php
session_start();
if (!isset($_SESSION['User_Level']) or ($_SESSION['User_Level'] != 1))
{
   header("Location: login_page.php");
   
   exit();
}
require_once "../mysqli_connect.php";
$id=$_SESSION['id'];
$sql="select * from u_Information where UserID= $id;";
if ($result =mysqli_query($dbcon,$sql))
{
    if(mysqli_num_rows($result)>0)
    {
       
        header('location:Basic_Infor.php');
        echo '<script type="text/JavaScript">  
        alert("Ban da co thong tin ve muc nay"); 
        </script>';
    }
    else
    {
        if(isset($_POST['submit']))
    {   
        $HeadTitle= $_POST['HeadTiTle'];
        $Name = $_POST['Name'];
        $Job = $_POST['Job'];
        $ProfileImage =$_FILES['ProfileImage']['name'];
        $ProfileImage_tmp=$_FILES['ProfileImage']['tmp_name'];
        $AboutMe = $_POST['AboutMe'];
        $sql= "INSERT INTO  u_Information( Head_Title,Name,Job,Profile_Image,About_Me,UserID )
        values ('$HeadTitle','$Name','$Job','$ProfileImage','$AboutMe',$id) ";
        $query= mysqli_query($dbcon,$sql);
        move_uploaded_file($ProfileImage_tmp,'image/'.$ProfileImage);
        header('location: admin_page.php');
     
    }
    }
   
}

?>
<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <nav class="navbar navbar-expand-lg navbar-light bg-light navbar-dark bg-dark">
                     
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="navbar-toggler-icon"></span>
                    </button> <a class="navbar-brand" href="#">Home</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="navbar-toggler-icon"></span>
                    </button> <a class="navbar-brand" href="#">Logout</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="navbar-toggler-icon"></span>
                    </button> <a class="navbar-brand" href="index.php">Your CV</a>
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                     
                        <form class="form-inline">
                            <input class="form-control mr-sm-2" type="text" /> 
                            <button class="btn btn-primary my-2 my-sm-0" type="submit">
                                Search
                            </button>
                        </form>
                       
                    </div>
                </nav>
            </div>
        </div>
        <div class="row">
            <div class="col-md-1">
                <table class="table">
                    <thead>
                        <tr>
                            <th>
                                Update
                            </th>                         
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                User
                            </td>
                            
                        </tr>
                        <tr class="table-active">
                            <td>
                                <a href="Basic_Infor.php">Basic Infor</a>
                            </td>
                       
                        </tr>
                        <tr class="table-success">
                            <td>
                               <a href=" Skills.php"> Skills</a>
                            </td>
                         
                        </tr>
                        <tr class="table-warning">
                            <td>
                              <a href="  Education">  Education</a>
                            </td>
                           
                        </tr>
                        <tr class="table-danger">
                            <td>
                                <a href="Languages">Languages</a>
                            </td>
                          
                        </tr>
                        <tr class="table-active">
                            <td>
                                <a href="Interest">Interest</a>
                            </td>
                       
                        </tr>
                        <tr class="table-success">
                            <td>
                                <a href="Experience">Experience</a>
                            </td>
                         
                        </tr>
                        <tr class="table-warning">
                            <td>
                                <a href="Projects">Projects</a>
                            </td>
                           
                        </tr>
                        <tr class="table-danger">
                            <td>
                                <a href="Contact">Contact</a>
                            </td>
                          
                        </tr>
                        
                    </tbody>
                </table>
            </div>
            <div class="col-md-11">
                <div class="card-header">
                    <h2>Add basic information</h2>
                </div>
                <div class="card-body">
                   <form method="POST" enctype="multipart/form-data">
                        <div class="from group">
                            <label for="">Head Title</label>
                            <input type="text" name="HeadTitle" class="from-control" require>
                        </div>
                        <div class="from group">
                            <label for="">Name</label>
                            <input type="text" name="Name" class="from-control" require>
                        </div>
                        <div class="from group">
                            <label for="">Job</label>
                            <input type="text" name="Job" class="from-control" require>
                        </div>
                        <div class="from group">
                            <label for="">Profile Image</label>
                            <input type="file" name="ProfileImage" class="from-control" require>
                        </div>
                        <div class="from group">
                            <label for="">About Me</label>
                            <textarea class="form-control" rows="5" name="AboutMe" require></textarea> 
                        </div>

                        <<button name="submit" type="submit" class="btn btn-primary">Add</button>
                  </form>
                </div>
                
            </div>
        </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>