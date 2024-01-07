<?php
    require('admin/include/db_connect.php');
    require('admin/include/essential.php');   
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>THE GRAND HOTEL - ROOMS</title>
    <!--php code for including link.php -->
    <?php require('include/link.php'); ?>
</head>
<body class="bg-light">

<!--php code for including header.php -->
<nav class="navbar navbar-expand-lg navbar-light bg-white px-lg-3 py-lg-2 shadow-sm sticky-top">
    <div class="container-fluid">
        <a class="navbar-brand me-5 fw-bold fs-3 h-font" href="index.php">THE GRAND HOTEL</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon shadow-none"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
            <a class="nav-link active me-2 h-font" aria-current="hotel_grand_index.php" href="hotel_grand_index.php"></a>
            </li>
            <li class="nav-item">
            <a class="nav-link me-2 h-font" href="hotel_grand_index.php">Home</a>
            </li>
            <li class="nav-item">
            <a class="nav-link me-2 h-font" href="hotel_grand_rooms.php">Rooms</a>
            </li>
            <li class="nav-item">
            <a class="nav-link me-2 h-font" href="hotel_grand_index.php">Facilities</a>
            </li>
            <li class="nav-item">
            <a class="nav-link me-2 h-font" href="hotel_grand_index.php">Contact Us</a>
            </li>
            <li class="nav-item">
            <a class="nav-link me-2 h-font" href="hotel_grand_index.php">About Us</a>
            </li>
        </ul>
        <div class="d-flex">
            <a href="admin/index.php" class="btn btn-dark shadow-none me-lg-2 me-3 fw-bold h-font">Admin Profile</a>
        </div>   
        </div>
    </div>
</nav>


    <!--Headline of rooms page-->
    <div class="my-5 px-4">
      <h2 class="fw-bold h-font text-center">OUR ROOMS</h2>
      <div class="h-line bg-dark"></div>
    </div>

    <!--navbar for filter-->
    <div class="container-fluid">
        <div class="row">
            <!--Filter Option Section-->
            <div class="col-lg-3 col-md-12 mb-lg-0 mb-4 ps-4">
                <nav class="navbar navbar-expand-lg navbar-light bg-white rounded shadow">
                    <div class="container-fluid flex-lg-column align-items-stretch">
                        <h4 class="mt-2">FILTERS</h4>
                        <button class="navbar-toggler shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#filterDropdown" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse flex-column align-items-stretch mt-3" id="filterDropdown">

                            <!--Filter according to availability of room on a particular date-->
                            <div class="border bg-light p-3 rounded mb-3">
                               <h5 class="mb-3" style="font-size:20px;">CHECK AVAILABILITY</h5>
                               <!--Check-in-->
                               <label class="form-label">Check-in</label>
                               <input type="date" class="form-control shadow-none mb-3">
                               <!--Check-out-->
                               <label class="form-label">Check-out</label>
                               <input type="date" class="form-control shadow-none">
                            </div>

                            <!--Filter according to Facilties-->
                            <div class="border bg-light p-3 rounded mb-3">
                               <h5 class="mb-3" style="font-size: 22px;">FACILITIES</h5>
                               <!--Facility-One-->
                               <div class="mb-2">
                                    <input type="checkbox" id="facility1" class="form-check-input shadow-none me-1">
                                    <label class="form-check-label" for="facility1">Facility One</label>
                               </div>
                               <!--Facility-Two-->
                               <div class="mb-2">
                                    <input type="checkbox" id="facility2" class="form-check-input shadow-none me-1">
                                    <label class="form-check-label" for="facility2">Facility Two</label>
                               </div>
                               <!--Facility-Three-->
                               <div class="mb-2">
                                    <input type="checkbox" id="facility3" class="form-check-input shadow-none me-1">
                                    <label class="form-check-label" for="facility3">Facility Three</label>
                               </div>
                            </div>

                            <!--Filter according to Guests Number-->
                            <div class="border bg-light p-3 rounded mb-3">
                               <h5 class="mb-3" style="font-size: 18px;">GUESTS</h5>
                               <div class="d-flex">
                                    <!--Adult section-->
                                    <div class="me-2">
                                        <label class="form-label">Adults</label>
                                        <input type="number" class="form-control shadow-none">
                                    </div>
                                    <!--Children section-->
                                    <div>
                                        <label class="form-label">Children</label>
                                        <input type="number" class="form-control shadow-none">
                                    </div>
                               </div>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>

            <!--Show Room Section-->
            <div class="col-lg-9 col-md-12 px-4">
                <!--Room1-->
                <?php 
                    $room_res = select("SELECT * FROM `rooms` WHERE `status`=? AND `remove`= ?", [1,0], 'ii');
                    while ($room_data = mysqli_fetch_assoc($room_res)) {
                        //retrieve features query(JOIN)
                        $fea_q = mysqli_query($conn, "SELECT f.name FROM `features` f INNER JOIN `room_features` rfea ON f.id=rfea.features_id WHERE rfea.room_id='$room_data[id]'");
                        $features_data = ""; 
                        while ($fea_row = mysqli_fetch_assoc($fea_q)) {
                            $features_data .= "<span class='badge rounded-pill bg-light text-dark text-wrap'>$fea_row[name]</span>";
                        }
                        echo<<<data
                        <div class="card mb-4 border-0 shadow">
                            <div class="row g-0 p-3 align-items-center">
                                <div class="col-md-5 mb-lg-0 mb-md-0 mb-sd-3">
                                    <img src="image/rooms/luxury_room4.png" class="img-fluid rounded-start width-100" >
                                </div>
                                <div class="col-md-5 px-lg-3 px-md-3 px-0">
                                    <h5>$room_data[name]</h5>
                                    <div class="features mb-3">
                                    <h6 class="mb-3">Features</h6>
                                       $features_data
                                    </div>

                                    <div class="facilities mb-4">
                                        <h6 class="mb-1">Facilities</h6>
                                            <span class="badge rounded-pill bg-light text-dark text-wrap">Wifi</span>
                                            <span class="badge rounded-pill bg-light text-dark text-wrap">Television</span>
                                            <span class="badge rounded-pill bg-light text-dark text-wrap">AC</span>
                                            <span class="badge rounded-pill bg-light text-dark text-wrap">Room Heater</span>
                                    </div>

                                    <div class="guests">
                                        <h6 class="mb-1">Guests</h6>
                                            <span class="badge rounded-pill bg-light text-dark text-wrap">$room_data[adult] Adults</span>
                                            <span class="badge rounded-pill bg-light text-dark text-wrap">$room_data[children] Children</span>
                                    </div>
                                </div>
                                <div class="col-md-2 text-center">
                                    <h6 class="mb-4">$room_data[price] Tk per night</h6>
                                        <a href="booking.php?room_id=$room_data[id]; &room_name=$room_data[name] &room_price=$room_data[price]" class="btn btn-sm w-100 text-white custom-bg shadow-none mb-2"> Book Now </a>

                                        
                                        <a href="room_details.php?id=$room_data[id]" class="btn btn-sm w-100 btn-outline-dark shadow-none"> More Details </a>
                                </div>   
                            </div>
                        </div>
                        data;
                    }
                        
                ?>

                
                
                
            </div>
        </div>
    </div>

    <!--php code for including footer.php -->
    <?php require('include/footer.php'); ?>
</body>
</html>