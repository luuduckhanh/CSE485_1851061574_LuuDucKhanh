<?php
session_start();
if (!isset($_SESSION['User_Level']) or ($_SESSION['User_Level'] != 1))
{
   header("Location:../login_page.php");
   
   exit();
}
require_once "../mysqli_connect.php";
$id=$_SESSION['id'];
$sql = "SELECT * FROM contact WHERE UserID = $id";
$result =mysqli_query($dbcon,$sql);
        if(isset($_POST['submit']))
    {   
        $Type= $_POST['Type'];
        $Contact_Link=$_POST['Contact_Link'];
        $Description = $_POST['Description'];
        $sql= "INSERT INTO  contact(Type,Contact_Link,Description,UserID )
        values ('$Type','$Contact_Link','$Description',$id); ";
        $query= mysqli_query($dbcon,$sql);
        header('location: Contact.php');
     
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
                <nav class="navbar navbar-expand-lg navbar-light bg-light navbar-dark bg-dark fixed-top">
                     
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="navbar-toggler-icon"></span>
                    </button> <a class="navbar-brand" href="#">Home</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="navbar-toggler-icon"></span>
                    </button> <a class="navbar-brand" href="#">Logout</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="navbar-toggler-icon"></span>
                    </button> <a class="navbar-brand" href="../index.php">Your CV</a>
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
                                <a href="../Basic_Infor/Basic_Infor.php">Basic Infor</a>
                            </td>
                       
                        </tr>
                        <tr class="table-success">
                            <td>
                               <a href="../skills/skills.php"> Skills</a>
                            </td>
                         
                        </tr>
                        <tr class="table-warning">
                            <td>
                              <a href="../Education/Education.php">  Education</a>
                            </td>
                           
                        </tr>
                        <tr class="table-danger">
                            <td>
                                <a href="../Languages/Languages.php">Languages</a>
                            </td>
                          
                        </tr>
                        <tr class="table-active">
                            <td>
                                <a href="../Interest/Interest.php">Interest</a>
                            </td>
                       
                        </tr>
                        <tr class="table-success">
                            <td>
                                <a href="../Experience/Experience.php">Experience</a>
                            </td>
                         
                        </tr>
                        <tr class="table-warning">
                            <td>
                                <a href="../Projects/Projects.php">Projects</a>
                            </td>
                           
                        </tr>
                        <tr class="table-danger">
                            <td>
                                <a href="Contact.php">Contact</a>
                            </td>
                          
                        </tr>
                        
                    </tbody>
                </table>
            </div>
            <div class="col-md-11">
                <div class="card-header">
                    <h2>Add Contact</h2>
                </div>
                <div class="card-body">
                   <form method="POST" enctype="multipart/form-data">                      
                        <div class="form-group">
                    <label for="sel1">Select list:</label>
                    <select class="form-control" name="Type">
                        <option>facebook</option>
                        <option>youtube</option>
                        <option>twitter</option>
                        <option>instagram</option>
                        <option>linkedin</option>
                        <option> phone</option>
                        <option> google-plus</option>
                        <option>reddit</option>
                        <option>pinterest</option>
                        <option>flickr</option>
                        <option>reddit</option>
                        <option>github</option>
                    </select>
                    <div class="from group">
                            <label for="">Contact Link</label><br>
                            <input type="text" name="Contact_Link" class="from-control" require>
                     </div>
                     <div class="from group" >
                            <label for="">Description</label>
                            <textarea class="form-control" rows="5" name="Description" require></textarea>  
                        </div>
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