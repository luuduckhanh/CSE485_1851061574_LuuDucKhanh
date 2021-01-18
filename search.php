<?php
require_once "mysqli_connect.php";
$Username=$_POST['username'];

$sql="SELECT * FROM user where Username= '$Username';";
if($result = mysqli_query($dbcon, $sql))
{
    if(mysqli_num_rows($result) > 0)
    {
        
        while($row = mysqli_fetch_array($result))
        {
            $id= $row['id'];
        }
    }
    else
    {
        header('location:error.php');
    }
}

$sql = "SELECT * FROM u_information where UserID= $id;";
  if($result = mysqli_query($dbcon, $sql)){
      if(mysqli_num_rows($result) > 0){          
              while($row = mysqli_fetch_array($result)){
                $Head_Title = $row['Head_Title'];
                $Name = $row['Name'];
                $Job = $row['Job'];
                $ProfileImage = $row['Profile_Image'];
                $AboutMe = $row['About_Me'];
                $UserId = $row['UserID'];
              }                          
          // Giải phóng bộ nhớ
          mysqli_free_result($result);
      } else{
          echo "<p class='lead'><em>No information about this item yet.</em></p>";
      }
  } else{
      echo "ERROR: Không thể thực thi $sql. " . mysqli_error($dbcon);
  }

  // Đóng kết nối
  
  ?>                   
<!doctype html>
<html lang="en">
  <head>
    <title><?php echo $Head_Title ?></title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://font.googleapis.com/css2?family=Poppin&display=swap"
    rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="cv.css">
  </head>
  <body>
  <header>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <img src="image/<?php echo $ProfileImage?>" class="rounded-circle" alt="">
          <h1 style="color:white"> <?php echo $Name ?></h1>
          <h1 style="color:white"><?php echo $Job ?></h1>
          <a href="https://pdf-ace.com/pdfme/" target= "_blank">Save as PDF</a>
          <a href="https://restpack.io/html2pdf/save-as-pdf?private=true" target="_blank" rel="nofollow">Save this page as PDF</a>
          <script async src="https://restpack.io/save-as-pdf.js"></script>
        </div>
      </div>
    </div>
  </header>  

  <section class="container">
    <div class="row">
      <div class="col-md-4">
        <div class="about">
          <h3>About Me</h3>
          <p>
            <?php echo $AboutMe?>
          </p>
        </div>
      </div>
     
          
      <div class="col-md-8">
        <div class="skills">
          <h2>My Skills</h2>
          <?php           
          // Cố gắng thực thi truy vấn
          $sql = "SELECT * FROM skills where UserID = $id ;";
          if($result = mysqli_query($dbcon, $sql)){
              if(mysqli_num_rows($result) > 0)
              {          
                      while($row = mysqli_fetch_array($result)){
                    ?>  <strong><?php echo $row['Skill_Name']; ?></strong>
                    <span class="pull-right"><?php echo $row['Progress']?>%</span>
                    <div class="progress">
                      <div class="progress-bar progress-bar-primary" aria-valuenow="<?php echo $row['Progress']; ?>" aria-
                      valuemin="0" aria-valuemax="100" style="width: <?php echo $row['Progress'];?>%;"></div>
                    </div>  
                                     
                      <?php }                          
                        // Giải phóng bộ nhớ
                        mysqli_free_result($result);
              } else{
                       echo "<p class='lead'><em>No information about this item yet.</em></p>";
                    }
                } else{
                       echo "ERROR: Không thể thực thi $sql. " . mysqli_error($dbcon);
                      }              
           ?>   

         
        </div>
      </div>
    </div>
  </section>

  <section class="container">
    <div class="row">
      <div class="col-md-8">
        <?php
        $sql = "SELECT * FROM education where UserID= $id;";
        if($result = mysqli_query($dbcon, $sql)){
            if(mysqli_num_rows($result) > 0){          
                    while($row = mysqli_fetch_array($result)){
                      $Title = $row['Title'];
                      $School = $row['School'];
                      $Time = $row['Time'];
                      $Description = $row['Description'];                     
                    }                          
                // Giải phóng bộ nhớ
                mysqli_free_result($result);
            } else{
                echo "<p class='lead'><em>No information about this item yet.</em></p>";
            }
        } else{
            echo "ERROR: Không thể thực thi $sql. " . mysqli_error($dbcon);
        }
        ?>
          <div class="education">
              <h2>Education</h2>
              <h4 class="education-title"><?php echo $Title ?></h4>
              <div class="education-school">
                <h5><?php echo $School ?>         </h5>
                <h5><?php echo $Time ?></h5>
              </div>
              <p class="education-description">
                <?php echo $Description ?>
              </p>
          </div>
      </div>

      <div class="col-md-4">
        <div class="languages">
            <h2>Languages</h2>
          <ul>
            <?php
            // Cố gắng thực thi truy vấn
          $sql = "SELECT * FROM languages where UserID = $id ;";
          if($result = mysqli_query($dbcon, $sql)){
              if(mysqli_num_rows($result) > 0)
              {          
                      while($row = mysqli_fetch_array($result)){
                     ?>
                          <li><?php echo $row['Language'] ?>(<?php echo $row['Level'] ?>)</li>                                    
                    <?php }                          
                        // Giải phóng bộ nhớ
                        mysqli_free_result($result);
              } else{
                       echo "<p class='lead'><em>No information about this item yet.</em></p>";
                    }
                } else{
                       echo "ERROR: Không thể thực thi $sql. " . mysqli_error($dbcon);
                      }            
            ?>           
          </ul>
        </div>
      </div>
    </div>
  </section>

  <section class="container">
    <div class="row">
      <div class="col-md-4">
        <div class="languages">
          <h2>Interest</h2>
          <ul>
          <?php
            // Cố gắng thực thi truy vấn
          $sql = "SELECT * FROM interest where UserID = $id ;";
          if($result = mysqli_query($dbcon, $sql)){
              if(mysqli_num_rows($result) > 0)
              {          
                      while($row = mysqli_fetch_array($result)){
                     ?>
                          <li><?php echo $row['Interest'] ?></li>                                    
                    <?php }                          
                        // Giải phóng bộ nhớ
                        mysqli_free_result($result);
              } else{
                       echo "<p class='lead'><em>No information about this item yet.</em></p>";
                    }
                } else{
                       echo "ERROR: Không thể thực thi $sql. " . mysqli_error($dbcon);
                      }            
            ?>           
               
          </ul>   
        </div>       
      </div>
      <div class="col-md-8">
      <?php
        $sql = "SELECT * FROM experience where UserID= $id;";
        if($result = mysqli_query($dbcon, $sql)){
            if(mysqli_num_rows($result) > 0){          
                    while($row = mysqli_fetch_array($result)){
                      $Title = $row['Title'];
                      $Work_Place = $row['Work_Place'];
                      $Time = $row['Time'];
                      $Description = $row['Description'];                     
                    }                          
                // Giải phóng bộ nhớ
                mysqli_free_result($result);
            } else{
                echo "<p class='lead'><em>No information about this item yet.</em></p>";
            }
        } else{
            echo "ERROR: Không thể thực thi $sql. " . mysqli_error($dbcon);
        }
        ?>
        <div class="experience">
          <h2>Experience</h2>
          <div class="experience-content">
            <h4 class="experience-title"><?php echo $Title ?></h4>
            <h5><?php echo $Work_Place ?></h5><span></span>
            <h5><?php echo $Time ?></h5> 
            <p class="education-description">
             <?php echo $Description ?>
            </p>
          </div>
        </div>               
      </div>             
    </div>     
  </section>

  <section class="container">
    <div class="row">
      <div class="col-md-8">
      <?php
        $sql = "SELECT * FROM projects where UserID= $id;";
        if($result = mysqli_query($dbcon, $sql)){
            if(mysqli_num_rows($result) > 0){          
                    while($row = mysqli_fetch_array($result)){
                      $Title = $row['Title'];
                      $Time = $row['Time'];
                      $Description = $row['Description'];                     
                    }                          
                // Giải phóng bộ nhớ
                mysqli_free_result($result);
            } else{
                echo "<p class='lead'><em>No information about this item yet.</em></p>";
            }
        } else{
            echo "ERROR: Không thể thực thi $sql. " . mysqli_error($dbcon);
        }
        ?>
          <div class="education">
                <h2>Projects</h2>
                <h4 class="education-title"><?php echo $Title ?></h4>
                <div class="education-school">
                  <h5>
                    Project launch time</h5>
                  <h5><?php echo $Time ?></h5>
                </div>
                <p class="education-description">
                  <?php echo $Description ?>
                </p>
           </div>
      </div>
        
      <div class="col-md-4">
        <div class="contact">
          <h2>Contact</h2>
          <?php
            // Cố gắng thực thi truy vấn
          $sql = "SELECT * FROM contact where UserID = $id ;";
          if($result = mysqli_query($dbcon, $sql)){
              if(mysqli_num_rows($result) > 0)
              {          
                      while($row = mysqli_fetch_array($result)){
                     
                          if ($row['Type']=="phone")
                          { ?>
                            <p ><i class="fa fa-<?php echo $row['Type'] ?>"></i><a style="color:black" href="tel:<?php echo $row['Contact_Link'] ?>"><?php echo $row['Description'] ?></a></p> 
                    <?php } 
                          else
                          { ?>
                             <p style="color:black"><i class="fa fa-<?php echo $row['Type'] ?>"></i><a style="color:black" href="<?php echo $row['Contact_Link'] ?>"><?php echo $row['Description'] ?></a></p> 
                    <?php }
                      }                              
                                              
                        // Giải phóng bộ nhớ
                        mysqli_free_result($result);
              } else{
                       echo "<p class='lead'><em>No information about this item yet.</em></p>";
                    }
                } else{
                       echo "ERROR: Không thể thực thi $sql. " . mysqli_error($dbcon);
                      }            
            ?>                   
        </div>
      </div>
    </div>     
  </section>

  <footer>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
        <div class="copy-right">
        <p>Copyright &copy;2020 Your Easy ProFile</p>
          <div class="social-icons">
            <span><a href="" class="fa fa-facebook"></a></span>
            <span><a href="" class="fa fa-google-plus"></a></span>
            <span><a href="" class="fa fa-twitter"></a></span>
            <span><a href="" class="fa fa-dribbble"></a></span>
            <span><a href="" class="fa fa-github"></a></span>
            <span><a href="" class="fa fa-behance"></a></span>
          </div>
        </div> 
        </div>
      </div>
    </div>
  </footer>
  
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
