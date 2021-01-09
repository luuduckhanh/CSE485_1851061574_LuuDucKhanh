<div class="carousel slide" id="carousel-332613">
          <ol class="carousel-indicators">
            <li data-slide-to="0" data-target="#carousel-332613" class="active">
            </li>
            <li data-slide-to="1" data-target="#carousel-332613">
            </li>
            
          </ol>
          <div class="carousel-inner">
            <div class="carousel-item active">
              <div class="education">
                <h2>Education1</h2>
                <h4 class="education-title">New Web Design</h4>
                <div class="education-school">
                  <h5>Shool of media</h5>
                  <h5>2015 march - 2020 November</h5>
                </div>
                <p class="education-description">
                  pppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppp
                  ppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppp
                  ppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppp
                  pppppppppppppppppppppppppppppppppppppppppppppppppp
                </p>
                </div>
            </div>
            <div class="carousel-item">
              <div class="education">
                <h2>Education1</h2>
                <h4 class="education-title">New Web Design</h4>
                <div class="education-school">
                  <h5>Shool of media</h5>
                  <h5>2015 march - 2020 November</h5>
                </div>
                <p class="education-description">
                  pppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppp
                  ppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppp
                  ppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppp
                  pppppppppppppppppppppppppppppppppppppppppppppppppp
                </p>
                </div>
            </div>
            <div class="carousel-item">
              <div class="education">
                <h2>Education1</h2>
                <h4 class="education-title">New Web Design</h4>
                <div class="education-school">
                  <h5>Shool of media</h5>
                  <h5>2015 march - 2020 November</h5>
                </div>
                <p class="education-description">
                  pppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppp
                  ppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppp
                  ppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppp
                  pppppppppppppppppppppppppppppppppppppppppppppppppp
                </p>
                </div>
          </div>


          <div class="page-header">
                        <h2>Update Record</h2>
                    </div>
                    <p>Please edit the input values and submit to update the record.</p>
                    <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">
                        <div class="form-group <?php echo (!empty($name_err)) ? 'has-error' : ''; ?>">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control" value="<?php echo $name; ?>">
                            <span class="help-block"><?php echo $name_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($address_err)) ? 'has-error' : ''; ?>">
                            <label><?php echo $name; ?></label>
                            <textarea name="address" class="form-control"><?php echo $address; ?></textarea>
                            <span class="help-block"><?php echo $address_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($salary_err)) ? 'has-error' : ''; ?>">
                            <label>Salary</label>
                            <input type="text" name="salary" class="form-control" value="<?php echo $salary; ?>">
                            <span class="help-block"><?php echo $salary_err;?></span>
                        </div>
                        <input type="hidden" name="id" value="<?php echo $id; ?>"/>
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="index.php" class="btn btn-default">Cancel</a>
                    </form>