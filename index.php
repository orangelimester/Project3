<?php

session_start();
require_once 'security.php';
$errors = isset($_SESSION['errors']) ? $_SESSION['errors'] : [];
$fields = isset($_SESSION['fields']) ? $_SESSION['fields'] : [];
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable = no">
    <title>Contact</title>
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/custom.css" rel="stylesheet">
  </head>
  <body>
	<div class="container alt3">
			<div class="page-header" id="contact">
				<h2>Contact us<small> Contact us for more!</small></h2>
			</div><!--end page header-->
				<div class="col-lg-8">
				<?php if(!empty($errors)): ?>
						<div class = "panel">
							<ul>
								<li> <?php echo implode('</li><li>', $errors); ?></li>
							</ul>
						</div>
				<?php endif; ?>
				
				<?php 
				if (isset($_POST['email']) == true && empty($_POST['email']) == false) {
				  $email = $_POST['email'];
					if (filter_var($email, FILTER_VALIDATE_EMAIL) == true) {
					echo 'That\'s a valid email address';
					} else {
					echo 'Not a valid email address';
					}
				}
				?>
					<form action="contact.php" class="form-horizontal"  method="post">
					 <div class="form-group">
					    <label for ="name" class="col-lg-2 control-label">
						Name</label>
						<div class="col-lg-10">
							<input type="text" name = "name" class="form-control" id="name" placeholder="Enter your name" <?php echo isset($fields['name']) ? 'value ="' . e($fields['name']). '"' : '' ?>>
						</div>
						
					 </div><!--end form-group-->
					 
					 <div class="form-group">
					    <label for="email" class="col-lg-2 control-label"> Email</label>
						<div class="col-lg-10">
							<input type="text" name = "email" class="form-control" id="email" placeholder="Enter your Email Address" <?php echo isset($fields['email']) ? 'value ="' . e($fields['email']). '"' : '' ?>>
						</div>
						
					 </div><!--end form-group-->
					 
					 
					 <div class="form-group">
					    <label for="message" class="col-lg-2 control-label"> Any message</label>
						<div class="col-lg-10">
							<textarea name="message" id="message" class="form-control" 
							cols="20" rows="10" placeholder="Enter your Message"><?php echo isset($fields['message']) ? e($fields['message']). '"' : '' ?></textarea>
						</div>
					 </div><!--end form-group-->
					 
					 <div class="form-group">
						<div class="col-lg-10 col-lg-offset-2">
							<button type="submit" class="btn btn-primary">Submit</button>
						</div>
					</div>
  </body>
</html>
<?php
unset($_SESSION['errors']);
?>