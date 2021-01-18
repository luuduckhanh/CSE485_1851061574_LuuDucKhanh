
<?php
session_start();
if (!isset($_SESSION['User_Level']) )
{
   header("Location:../login_page.php");
   
   exit();
}
require_once "../mysqli_connect.php";
$id=$_GET['id'];
$sql="SELECT * FROM contact where id= $id;";
$query =mysqli_query($dbcon,$sql);
$result=mysqli_fetch_assoc($query);
if(isset($_POST['submit']))
    {   
        $Type= $_POST['Type'];
        $Contact_Link= $_POST['Contact_Link'];
        $Description= $_POST['Description'];
        $sql = "UPDATE contact SET Type='$Type',Contact_Link='$Contact_Link',Description='$Description' WHERE id= $id;";
        

      if ($query= mysqli_query($dbcon,$sql))
      {
        header('location: Contact.php');
      }
      else
      {
        
      }
        
        
      
     
    }
?>
<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="form.css">
  </head>
  <body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <nav class="navbar navbar-expand-lg navbar-light bg-light navbar-dark bg-dark ">
                     
                     
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="navbar-toggler-icon"></span>
                    </button> <a class="navbar-brand" href="../home.php">Home</a>
                    
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="navbar-toggler-icon"></span>
                    </button> <a class="navbar-brand" href="../cv.php">Your CV</a>
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                     
                        <form action="../search.php" class="form-inline" method="POST" enctype="multipart/form-data">
                            <input class="form-control mr-sm-2" type="text" name="username" /> 
                            <button class="btn btn-primary my-2 my-sm-0" type="submit">
                                Search
                            </button>
                        </form>                      
                    </div>
                    <div class="right-navbar">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="navbar-toggler-icon"></span>
                    </button> <a class="navbar-brand" href="../logout.php">Logout</a>
                    </div>
                    <div class="right-navbar">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="navbar-toggler-icon"></span>
                    </button> <a class="navbar-brand" href="../change_password.php">Change Password</a>
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
                                <a href="../Basic_Infor/Basic_Infor.php">Basic Infor</a>
                            </td>
                       
                        </tr>
                        <tr class="table-success">
                            <td>
                               <a href="../skills/Skills.php"> Skills</a>
                            </td>
                         
                        </tr>
                        <tr class="table-warning">
                            <td>
                              <a href=" ../Education/Education.php">  Education</a>
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
                    <h2>Update ConTact</h2>
                </div>
                <div class="card-body">
                <form method="POST" enctype="multipart/form-data">                      
                        <div class="form-group">
                    <label for="sel1">Select list:</label>
                    <select class="form-control" name="Type" value="<?php echo $result['Type']; ?>">
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
                    <div class="from group" >
                            <label for="">Contact link</label>
                            <textarea class="form-control" rows="3" name="Contact_Link" require ><?php echo $result['Contact_Link']; ?></textarea>  
                        </div>
                    <div class="from group">
                            <label for="">Description</label><br>
                            <input type="text" size="50" name="Description" class="from-control" require value="<?php echo $result['Description']; ?>">
                     </div>
                    
                    </div>                        
                        <<button name="submit" type="submit" class="btn btn-primary">Update</button>
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