<?php
session_start();
if (!isset($_SESSION['User_Level']) or ($_SESSION['User_Level'] != 0))
{
   header("Location: login_page.php");
   
   exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Member page</title>
   
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/db986ed900.js" crossorigin="anonymous"></script>
    

</head>
<body>

<div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <nav class="navbar navbar-expand-lg navbar-light bg-light navbar-dark bg-dark">
                     
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="navbar-toggler-icon"></span>
                    </button> <a class="navbar-brand" href="home.php">Home</a>
                    
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="navbar-toggler-icon"></span>
                    </button> <a class="navbar-brand" href="cv.php">Your CV</a>
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                     
                        <form action="search.php" class="form-inline" method="POST" enctype="multipart/form-data">
                            <input class="form-control mr-sm-2" type="text" name="username" /> 
                            <button class="btn btn-primary my-2 my-sm-0" type="submit">
                                Search
                            </button>
                        </form>                      
                    </div>
                    <div class="right-navbar">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="navbar-toggler-icon"></span>
                    </button> <a class="navbar-brand" href="logout.php">Logout</a>
                    </div>
                    <div class="right-navbar">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="navbar-toggler-icon"></span>
                    </button> <a class="navbar-brand" href="change_password.php">Change Password</a>
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
                        <tr class="table-active">
                            <td>
                                <a href="Basic_infor/Basic_Infor.php">Basic Infor</a>
                            </td>
                       
                        </tr>
                        <tr class="table-success">
                            <td>
                               <a href="skills/skills.php"> Skills</a>
                            </td>
                         
                        </tr>
                        <tr class="table-warning">
                            <td>
                              <a href="Education/Education.php">  Education</a>
                            </td>
                           
                        </tr>
                        <tr class="table-danger">
                            <td>
                                <a href="Languages/Languages.php">Languages</a>
                            </td>
                          
                        </tr>
                        <tr class="table-active">
                            <td>
                                <a href="Interest/Interest.php">Interest</a>
                            </td>
                       
                        </tr>
                        <tr class="table-success">
                            <td>
                                <a href="Experience/Experience.php">Experience</a>
                            </td>
                         
                        </tr>
                        <tr class="table-warning">
                            <td>
                                <a href="Projects/Projects.php">Projects</a>
                            </td>
                           
                        </tr>
                        <tr class="table-danger">
                            <td>
                                <a href="Contact/Contact.php">Contact</a>
                            </td>
                          
                        </tr>
                        
                    </tbody>
                </table>
            </div>
            <div class="col-md-11">  
            </div>
            </div>
        </div>
    </div>  
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>   
</body>
</html>