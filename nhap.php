<div class="carousel slide" id="carousel-332613">
          <ol class="carousel-indicators">
            <?php
            $sql="SELECT * FROM education where UserID= $id;";
            If($result = mysqli_query($dbcon,$sql))
            {
              if(mysqli_num_rows($result)>0)
              {
                $i=0;
                while($row = mysqli_fetch_array($result))
                { 
                  if($i=0)
                  { ?>
                    <li data-slide-to="0" data-target="#carousel-332613" class="active"></li>
            <?php }
                  else
                  { ?>
                    <li data-slide-to="<?php echo $i ?> " data-target="#carousel-332613"></li>                   
            <?php }
                  $i+=1;  
                  
                }
              }
              else{
                    echo"<p class='lead'><em>Không tìm thấy bản ghi.</em></p>";
                  }
            }
            else{
                  echo"ERRO:Không thể thực thi $sql.".mysqli_error($dbcon); 
                }     
            ?>           
          </ol>
          <div class="carousel-inner">
          <?php
            $sql="SELECT * FROM education where UserID= $id;";
            If($result = mysqli_query($dbcon,$sql))
            {
              if(mysqli_num_rows($result)>0)
              {
                $i=0;
                while($row = mysqli_fetch_array($result))
                { 
                  if($i=0)
                  { ?>
                    <div class="carousel-item active">
                      <div class="education">
                        <h2>Education</h2>
                        <h4 class="education-title"><?php echo $row['Title'] ?></h4>
                        <div class="education-school">
                          <h5><?php echo $row['Shool'] ?></h5>
                          <h5><? echo $row['Time'] ?></h5>
                        </div>
                        <p class="education-description">
                        <?php echo $row['Description'] ?>
                        </p>
                      </div>
                    </div>
            <?php }
                  else
                  { ?>
                    <div class="carousel-item">
                      <dic class="education">
                        <h2>Education</h2>
                        <h4 class="education-title"><?php echo $row['Title'] ?></h4>
                        <div class="education-shool">
                          <h5><?php echo $row['Shool'] ?></h5>
                          <h5><?php echo $row['Time'] ?></h5>
                        </div> 
                        <p class="education-description">
                          <?php echo $row['Description'] ?>
                        </p>
                      </div>
                    </div>                                    
            <?php }
                  $i+=1;  
                  
                }
              }
              else{
                    echo"<p class='lead'><em>Không tìm thấy bản ghi.</em></p>";
                  }
            }
            else{
                  echo"ERRO:Không thể thực thi $sql.".mysqli_error($dbcon); 
                }     
            ?>           
                                  
        </div>