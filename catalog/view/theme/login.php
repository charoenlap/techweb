<link rel="stylesheet" href="assets/css/login.css">
<section class="content mt-4">
  <div class="container-fluid">
    <div class="row justify-content-md-center">
     <div class="col-6">
    	<div class="card"  id="card-login">
        <div class="card-header text-center">
          <img src="logo.png" alt="">
        </div>
  			<div class="card-body">
   			  <form action="<?php echo $action; ?>" method="POST">
            <p>Username</p>
            <input class="input-login form-control" type="text" name="username" placeholder="ID" align="center">
            <p>Password</p>
            <input class="input-login form-control" type="password" name="password" placeholder="password">
            <br>
            <?php if(!empty($result)){ ?>
              <div class="alert alert-danger">
                <?php echo $result; ?>
              </div>
            <?php } ?>
            <button class="btn btn-outline-primary" type="submit" >Sign In</button>  
          </form>
 			  </div>
	     </div>
      </div>
    </div>
  </div>
</section>
