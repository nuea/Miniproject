<?php
  include 'header.php';
  $RT_ID = $_GET["RT_ID"];
  ?>


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



<?php include 'footer.php';?>