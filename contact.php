	<?php 
//check if user Coming From a request
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    // assign variables
    
        $user       = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
        $mail       = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
		$msg        = filter_var($_POST['message'], FILTER_SANITIZE_STRING);
	
	 $formErrors = array();
    if(strlen($user) < 3){
        $formErrors[] = 'Name should be more than 3 ';
    }
	
	if(strlen($mail) < 3){
        $formErrors[] = 'Email Can not be empty ';
    }
	
    if(strlen($msg) < 10){
        $formErrors[] = ' should be more than 10 words ';
    }
	    // if No Error send The Email [mail(To, subject, Message, Header, Parameters)]
    
 $header     =  'From:'. $user  . "\r\n" ;
 $body       =
            'الاسم: ' .  $user ."\r\n" .
            'الايميل: ' . $mail ."\r\n" .
            'تفاصيل أخرى :' . $msg . "\r\n" ;
               

    $sanEmail = 'mariyam_190@yahoo.com';
    $subject  = 'ORDER';
    if (empty($formErrors)){
        
        
      mail ( $sanEmail , $subject , $body , $header  ); 
       
    }
}



?>
	<! DOCTYPE html>

		<html>

		<head>
			<meta name="viewport" content="width=device-width, initial-scale=1.0">
			<link rel="stylesheet" href="css/style.css">
			<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
			<link rel="stylesheet" href="css/font-awesome.min.css">
			<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
			<link rel="icon" href="img/%D9%84%D9%88%D9%82%D9%88%20%D8%AA%D8%B5%D9%85%D9%8A%D9%85%D9%8A.png" />
			<link rel="preconnect" href="https://fonts.gstatic.com">
			<link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
			<link rel="preconnect" href="https://fonts.gstatic.com">
			<link href="https://fonts.googleapis.com/css2?family=Open+Sans&family=Permanent+Marker&display=swap" rel="stylesheet">

		</head>

		<body>

			<div class="main-page">
				<div class="containr container">
					<div class="ovrlay  back" id="overlay">
						<span class="back"> <a href="index.html">BACK </a></span>
						<nav class="overlay-menu">
							<div class="overlay-menu form-page">
								<div class="contct-wrapper ">
									<a href="index.html"><img class="build-logo" src="img/%D9%84%D9%88%D9%82%D9%88%20%D8%AA%D8%B5%D9%85%D9%8A%D9%85%D9%8A%20%D8%A7%D8%A8%D9%8A%D8%B6.png"></a>
									<h4 class="build">Let's Build Something Togather</h4>
								</div>
								<p><span class="error">* Required</span></p>
								<form class="form-horizontal frm col-12" role="form" method="post" action="<?php echo $_SERVER['PHP_SELF']?>" method="post">

									<?php  if (! empty ($formErrors)){ ?>
									<div class="alert alert-danger alert-dismissible error" role="start">
										<button type="button" class="close" data-dismiss="alert" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
										<?php  
                            foreach($formErrors as $error){
                                echo $error . '<br/>';
            } ?>
									</div>
									<?php } ?> <br />

									<div class="form-group">
										<div class="col-sm-12">
											<input type="text" class="form-control" id="name" placeholder="NAME" name="name" value="<?php if (isset($user)) {echo $user;} ?>">
											<i class="fa fa-user fa-2x"></i>
											<span class="asterisx">*</span>
										</div>
									</div>

									<div class="form-group">
										<div class="col-sm-12 email">
											<input type="email" class="form-control" id="email" placeholder="EMAIL" name="email" value="<?php if (isset($mail)) {echo $mail;} ?>">
											<i class="fa fa-envelope fa-2x"></i>
											<span class="asterisx">*</span>
										</div>
									</div>


									<textarea class="form-control txt" rows="10" placeholder="MESSAGE" name="message" value="<?php if(isset($msg)) {echo $msg;} ?>">
										 </textarea>


									<button class="btn btn-primary send-button" id="submit" type="submit" value="SEND">
										<div class="button">
											<i class="fa fa-paper-plane"></i><span class="send-text">SEND</span>
										</div>
									</button>
								</form>
							</div>

						</nav>
					</div>
				</div>
			</div>
			<script src="js/script.js"></script>
		</body>

		</html>
