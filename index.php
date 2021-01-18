
<!doctype html>
<html lang="en">
  <head>
    <title>Web CV network</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="index.css">
  </head>
  <body>
  <div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
        <nav class="navbar navbar-expand-lg navbar-light bg-light navbar-dark bg-dark ">
                                        
                     <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                         <span class="navbar-toggler-icon"></span>
                     </button> <a class="navbar-brand" href="cv.php">My CV</a>
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
                     </button> <a class="navbar-brand" href="login_page.php">Login</a>
                     </div>
                     <div class="right-navbar">
                     <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                         <span class="navbar-toggler-icon"></span>
                     </button> <a class="navbar-brand" href="register_page.php">Register</a>
                     </div>
                 </nav>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
            <div class="wellcome">
            <h1>Wellcome to Web CV Network!</h1>
            </div>
            <div class='advantage'>
            <h5> One is that your curriculum vitae isn’t available to just a single other person: instead, any potentially interested party can take a look at your information as well</h5>
            </div>   
            <div class="whyus">
            <h2>But why us?</h2> 
            </div>
            <div id="reason1">
            <h2>1.Fast registration process &#10004</h2>
            </div>
            <div id="reason2">
            <h2>2.Latest Web Design &#10004</h2>
            </div>
            <div id="reason3">
            <h2>3.Easy-to-use, flexible, and user-friendly interface &#10004</h2>
            </div>
            <div id="reason4">
            <h2>4.Safe, secure &#10004</h2>
            </div>
            <div id="reason5">
            <h2>5.Share your profile with others, search for other people's profiles, and more &#10004</h2>
            </div>

		</div>
	</div>
</div>
    <div class="container-fluid">
        <div class="row">
        <div class="col-md-12">
            <div class="contact">
                <br>
                <h2 class="title">Contact</h2>
                <form action="senmail.php" method="post">
                    <div class="form-group">
                   <label>To</label>
                   <input size="30" type="text" class="form-control" value="luuduckhanharsenal@gmail.com" readonly>                     
                   </div>
                   <div class="form-group">
                   <label>Name</label>
                   <input size="30" name="name"  type="text" class="form-control">                    
                   </div>
                   <div class="form-group">
                   <label>Subject</label>
                   <input  id="subject" type="text" name="subject" class="form-control">       
                   </div>
                   <div class="form-group">
                   <label>Body</label>
                   <textarea name="body" class="form-control"></textarea>  
                   </div>
                   <input class="send" name="send" type="submit" value="Send mail">
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