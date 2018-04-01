<?php
    include 'header.php';

  /*$query = "SELECT COUNT(r.RT_ID) AS CountRoom, r.*, rt.* FROM room r
    LEFT JOIN roomtype rt ON rt.RT_ID = r.RT_ID 
    GROUP BY r.RT_ID ORDER BY rt.RT_ID ";
    $result = mysqli_query($conn,$query);  */
?>
<script>
    var obj ;
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            obj = JSON.parse(this.responseText);
            var data = '';
            for(var i=0; i<obj.items.length; i++){
                data += "<div class='col-sm-6 wowload fadeInUp'>";
                data += "<div class='rooms'>";
                data += "<img src=\"img/room/Luxurious_Suites.jpg\" class=\"img-responsive\">";
                data += "<div class=\"info\">";
                data += "<h3>"+obj.items[i].type+"</h3>";
                data += "<p>Room service is "+obj.items[i].count+"</p>";
                data += "<p>2 bedroom / 2 bathroom / 1 Living room</p>";
                data += "<a href=\"room-details.php?RT_ID="+obj.items[i].RT_ID+"\" class=\"btn btn-default\">Check Details</a>";
                data += "</div></div></div>";
            }
            document.getElementById("out").innerHTML = data;

        }
    };
    xmlhttp.open("GET", "db.inc/db.select.room.php?f=sr", true);
    xmlhttp.send();
</script>
<div class="container">
    <h2>Rooms</h2>
    <div class="row">
        <div id="out">
            <div class="col-sm-6 wowload fadeInUp">
                <div class="rooms">
                    <img src="img/room/Luxurious_Suites.jpg" class="img-responsive">
                    <div class="info">
                        <h3><?php echo $rs['RoomType'] ?></h3>
                        <p>Room service is <?php echo $rs['CountRoom'];?></p> 
                        <p>2 bedroom / 2 bathroom / 1 Living room</p>
                        <a href="room-details.php?RT_ID=<?php echo $rs['RT_ID'];?>" class="btn btn-default">Check Details</a>
                    </div>
                </div>
            </div>
        </div>
<?php
   // }
?>
    </div>
    <!-- form

    <div class="row">
        <div class="col-sm-6 wowload fadeInUp">
            <div class="rooms">
                <img src="img/room/Luxurious_Suites.jpg" class="img-responsive">
                <div class="info">
                    <h3>Luxurious Suites</h3>
                    <p>
                       2 bedroom / 2 bathroom / 1 Living room 
                    </p>
                    <a href="room-details.php" class="btn btn-default">Check Details</a>
                </div>
            </div>
        </div>
        <div class="col-sm-6 wowload fadeInUp">
            <div class="rooms">
                <img src="img/room/Deluxe_Suite.jpg" class="img-responsive">
                <div class="info">
                    <h3>Deluxe Suite</h3>
                    <p> 
                        1 bedroom / 1 bathroom 
                    </p>
                    </p>
                    <a href="room-details.php" class="btn btn-default">Check Details</a>
                </div>
            </div>
        </div>
        <div class="col-sm-6 wowload fadeInUp">
            <div class="rooms">
                <img src="img/room/Double_Room.jpg" class="img-responsive">
                <div class="info">
                    <h3>Double Room</h3>
                    <p> 
                        1 Bedroom ( 2 beds ) / 1 bathroom
                    </p>
                    <a href="room-details.php" class="btn btn-default">Check Details</a>
                </div>
            </div>
        </div>
        <div class="col-sm-6 wowload fadeInUp">
            <div class="rooms">
                <img src="img/room/Single_room.jpg" class="img-responsive">
                <div class="info">
                    <h3>Single Room</h3>
                    <p> 
                        1 Bedroom ( 1 beds ) / 1 bathroom
                    </p>
                    <a href="room-details.php" class="btn btn-default">Check Details</a>
                </div>
            </div>
        </div>
    </div>
 -->
</div>
<?php include 'footer.php';?>