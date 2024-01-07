<?php
    require('admin/include/db_connect.php');
    require('admin/include/essential.php');
    
?>


<nav class="navbar navbar-expand-lg navbar-light bg-white px-lg-3 py-lg-2 shadow-sm sticky-top">
    <div class="container-fluid">
        <a class="navbar-brand me-5 fw-bold fs-3 h-font" href="index.php">HOTEL LUXURY</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon shadow-none"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                <a class="nav-link active me-2 h-font" aria-current="index.php" href="index.php"></a>
                </li>
                <li class="nav-item">
                <a class="nav-link me-2 h-font" href="home.php">Home</a>
                </li>
                <li class="nav-item">
                <a class="nav-link me-2 h-font" href="rooms.php">Rooms</a>
                </li>
                <li class="nav-item">
                <a class="nav-link me-2 h-font" href="facilities.php">Facilities</a>
                </li>
                <li class="nav-item">
                <a class="nav-link me-2 h-font" href="contactus.php">Contact Us</a>
                </li>
                <li class="nav-item">
                <a class="nav-link me-2 h-font" href="aboutus.php">About Us</a>
                </li>
            </ul>
        <div class="d-flex">
            <a href="admin/index.php" class="btn btn-dark shadow-none me-lg-2 me-3 fw-bold h-font">Admin Profile</a>
        </div>
        
        </div>
        </div>
    </div>
</nav>

