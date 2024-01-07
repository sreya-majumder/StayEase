<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOTEL LUXURY - BOOKING</title>
    <!--php code for including link.php -->
    <?php require('include/link.php'); ?>
</head>
<body class="bg-light">
    <!--php code for including header.php -->
    <?php require('include/header.php');?>

    <!-- Booking Form Section -->
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h2 class="mb-4 h-font"> Room Booking Details</h2>
                <form action="bookings.php" method="post">
                    <div class="mb-3">
                        <label for="room_name">Room Type:</label>
                        <input type="text" name="room_name" class="form-control" value="<?php echo $_GET['room_name']; ?>" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="room_price">Price:</label>
                        <input type="text" name="room_price" class="form-control" value="<?php echo $_GET['room_price']; ?>" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="customer_name">Name</label>
                        <input type="text" name="customer_name" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="customer_name">NID</label>
                        <input type="int" name="customer_nid" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="customer_location">Location</label>
                        <input type="text" name="customer_location" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="check_in">Check-in Date:</label>
                        <input type="date" name="check_in" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="check_out">Check-out Date:</label>
                        <input type="date" name="check_out" class="form-control" required>
                    </div>
                    
                    <a href="admin/index.php" class="btn btn-sm w-100 text-white custom-bg shadow-none mb-2"> Book Now </a>
                   
                </form>
            </div>
        </div>
    </div>

    <!--php code for including footer.php -->
    <?php require('include/footer.php'); ?>
</body>
</html>
