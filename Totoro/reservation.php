<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<title>Totoro Hotel</title>

<!-- Google fonts -->
<link href='http://fonts.googleapis.com/css?family=Raleway:300,500,800|Old+Standard+TT' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Raleway:300,500,800' rel='stylesheet' type='text/css'>

<!-- font awesome -->
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">


<!-- bootstrap -->
<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css" />

<!-- uniform -->
<link type="text/css" rel="stylesheet" href="assets/uniform/css/uniform.default.min.css" />

<!-- animate.css -->
<link rel="stylesheet" href="assets/wow/animate.css" />


<!-- gallery -->
<link rel="stylesheet" href="assets/gallery/blueimp-gallery.min.css">


<!-- favicon -->
<link rel="shortcut icon" href="img/favicon.png" type="image/x-icon">
<link rel="icon" href="img/favicon.png" type="image/x-icon">

<link rel="stylesheet" href="assets/style.css">
<link rel="stylesheet" href="assets/styleRes.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css">

</head>

<body id="home">

<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script>
    $(document).ready(function(){
        $("#header").load("header.html"); 
        $("#footer").load("footer.html"); 
    });
</script>
<div id="header"></div>
<div class="container-contact100"> 
  <div class="contact100-bg">
    <img src="img/banner.jpg"  class="img-responsive" alt="">
  </div>
  <div class="wrap-contact100">
    <form action="" method="post" class="contact100-form validate-form">
      <span class="contact100-form-title">Room Reservation</span>

      <div class="validate-input" data-validate="Please enter your name">
					<input class="input100" type="text" name="name" placeholder="Full Name">
					<span class="focus-input100"></span>
      </div>
      
      <div class="validate-input" data-validate="Please enter id card">
					<input class="input100" type="text" name="idcard" placeholder="ID CARD">
					<span class="focus-input100"></span>
      </div>
      
      <div class="validate-input" data-validate="Please enter email: e@a.x">
					<input class="input100" type="text" name="email" placeholder="E-mail">
					<span class="focus-input100"></span>
      </div>
      
      <div class="validate-input" data-validate="Please enter phone">
					<input class="input100" type="text" name="phone" placeholder="Phone">
					<span class="focus-input100"></span>
      </div>
      
      <div hidden class="validate-input" data-validate="Please enter room type">
					<input class="input100" type="text" name="roomtype" placeholder="Room Type">
      </div>
      
      <div class="validate-input" data-validate="Please enter room type">
          <select class="input100" name="roomtype" id="roomtype">
          <?php
            $sql = "SELECT * FROM `roomtype`";
            $result = mysqli_query($conn, $sql);
            while($rs = mysqli_fetch_assoc($result)) {
          ?>
            <option value="<?php echo $rs['RT_ID']; ?>"><?php echo $rs['RoomType']; ?></option>
          <?php
            }
          ?>
          </select>
					<span class="focus-input100"></span>
      </div>
      
      <div class="validate-input" data-validate="Please enter check in">
					<input class="input100" type="text" name="checkin" placeholder="Check In">
					<span class="focus-input100"></span>
      </div>
      
      <div class="validate-input" data-validate="Please enter check out">
					<input class="input100" type="text" name="checkout" placeholder="Check Out">
					<span class="focus-input100"></span>
      </div>
      <div class="container-contact100-form-btn">
					<button class="contact100-form-btn" type="submit">
						Book Now
					</button>
			</div>
    </form>
  </div>
</div>


<div id="footer"></div>




<script src="assets/jquery.js"></script>

<!-- wow script -->
<script src="assets/wow/wow.min.js"></script>

<!-- uniform -->
<script src="assets/uniform/js/jquery.uniform.js"></script>


<!-- boostrap -->
<script src="assets/bootstrap/js/bootstrap.js" type="text/javascript" ></script>

<!-- jquery mobile -->
<script src="assets/mobile/touchSwipe.min.js"></script>

<!-- jquery mobile -->
<script src="assets/respond/respond.js"></script>

<!-- gallery -->
<script src="assets/gallery/jquery.blueimp-gallery.min.js"></script>


<!-- custom script -->
<script src="assets/script.js"></script>

<!--from reservation -->
<script src="assets/main.js"></script>
<script src="assets/jquery/jquery-3.2.1.min.js"></script>


</body>
</html>