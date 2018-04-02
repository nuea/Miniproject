<?php
    include 'header.php';
    $RT_ID = $_GET["RT_ID"];

    $query = "SELECT COUNT(r.RT_ID) AS CountRoom, r.*, rt.* FROM room r
    LEFT JOIN roomtype rt ON rt.RT_ID = r.RT_ID 
    WHERE rt.RT_ID = '$RT_ID'
    GROUP BY r.RT_ID ORDER BY rt.RT_ID ";
    $result = mysqli_query($conn,$query);
    $rs = mysqli_fetch_assoc($result);
?>
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script>
    $(function(){
        $("#header").load("header.html"); 
        $("#footer").load("footer.html"); 
    });
</script>
<div id="header"></div>
<div class="container">

    <h1 class="title"><?php echo $rs['RoomType']; ?></h1>

    <!-- RoomDetails -->
    <div id="" class="room_detail" data-ride="carousel">
        <img src="img/room/Luxurious_Suites.jpg" class="img-responsive">
    </div>
    <!-- RoomCarousel-->

    <div class="room-features spacer">
        <div class="row">
            <div class="col-sm-12 col-md-5"> 
                <p><?php echo $rs['Description']; ?></p>
            </div>
            <div class="col-sm-6 col-md-3 amenitites"> 
                <h3>Room Facilities</h3>    
                <ul>
                <li>One of the greatest barriers to making the sale is your prospect.</li>
                <li>Principle to work to make more money while having more fun.</li>
                <li>Unlucky people. Don't stubbornly.</li>
                <li>Principle to work to make more money while having more fun.</li>
                <li>Space in your house How to sell faster than your neighbors</li>
                </ul>
            </div>  
            <div class="col-sm-3 col-md-2">
            <div class="size-price">Size<span><?php echo $rs['SizeRoom']; ?></span></div>
            </div>
            <div class="col-sm-3 col-md-2">
            <div class="size-price">Price<span><?php echo number_format($rs['PriceRoom']); ?> THB</span></div>
            </div>
        </div>        
        <div class="container-contact100-form-btn">
            <a href="reservation.php?RT_ID=<?php echo $RT_ID; ?>" class="contact100-form-btn">Book Now</a>
        </div>  
    </div>       
</div>
<div id="footer"></div>