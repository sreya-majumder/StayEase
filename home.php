<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Luxury - Home</title>
    <!--php code for including link.php -->
    <?php require('include/link.php'); ?>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css"/>
</head>
<body>

    <!--php code for including header.php -->
    <?php require('include/header.php'); ?>

    <!--Frontpage Image-->
    <div class="container-fluid px-lg-4 mt-2">
        <div class="swiper swiper-container">
          <div class="swiper-wrapper">
            <div class="swiper-slide">
              <img src="image/hotelfrontpage/hotel_luxury.png" class="w-100 d-block">
            </div>
          </div>
        </div>
    </div>
    
    <!--Check Availability Form-->
    <div class="container">
        <div class="row">
            <div class="col-lg-12 bg-white shadow p-4 rounded">
                <h5 class mb-4> Check Room Availability </h5>
                <form>
                    <div class="row align-items-end">
                        <div class="col-lg-2.5">
                            <label class="form-label" style="font-weight:500;" >Check-in</label>
                            <input type="date" class="form-control shadow-none">
                        </div>
                        <div class="col-lg-2.5 mt-2">
                            <label class="form-label" style="font-weight:500;" >Check-out</label>
                            <input type="date" class="form-control shadow-none">
                        </div>
                        <div class="col-lg-2.5 mt-2">
                            <label class="form-label" style="font-weight:500;" >Adult</label>
                            <select class="form-select shadow-none">
                                <option selected>Zero</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                        </div>
                        <div class="col-lg-2.5 mt-2">
                            <label class="form-label" style="font-weight:500;" >Children</label>
                            <select class="form-select shadow-none">
                                <option selected>Open this select menu</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                        </div>
                        <div class="col-lg-1 mt-3">
                            <button type="submit" class="btn text-white shadow-none custom-bg">Submit</button>
                        </div>
                    </div>
                </form>
            </div> 
        </div>

    </div>

    <!--Rooms-->
    <h2><div class="mt-5 pt-4 mb-4 text-center fw-bold h-font">Our Rooms</div></h2>
    <div class="container">
        <div class="row">

            <!--Room1-->
            <div class="col-lg-4 col-md-6">
                <div class="card border-0 shadow" style="max-width:350px;margin: auto;">
                    <img src="image/rooms/single_room1.png" class="card-img-top" alt="...">
                    <div class="card-body">
                      <h5>Simple Room</h5>
                      <h6 class="mb-4">300 Tk per night</h6>

                      <div class="features mb-4">
                        <h6 class="mb-1">Features</h6>
                        <span class="badge rounded-pill bg-light text-dark text-wrap">2 Rooms</span>
                        <span class="badge rounded-pill bg-light text-dark text-wrap">1 Bathrooms</span>
                        <span class="badge rounded-pill bg-light text-dark text-wrap">1 Balcony</span>
                        <span class="badge rounded-pill bg-light text-dark text-wrap">2 Sofa</span>
                      </div>

                      <div class="facilities mb-4">
                        <h6 class="mb-1">Facilities</h6>
                        <span class="badge rounded-pill bg-light text-dark text-wrap">Wifi</span>
                        <span class="badge rounded-pill bg-light text-dark text-wrap">Television</span>
                        <span class="badge rounded-pill bg-light text-dark text-wrap">AC</span>
                        <span class="badge rounded-pill bg-light text-dark text-wrap">Room Heater</span>
                      </div>
                      
                      <div class="guests mb-4">
                        <h6 class="mb-1">Guests</h6>
                        <span class="badge rounded-pill bg-light text-dark text-wrap">5 Adults</span>
                        <span class="badge rounded-pill bg-light text-dark text-wrap">4 Children</span>
                      </div>

                      <div class="rating mb-4">
                        <h6 class="mb-1">Rating</h6>
                          <span class="badge rounded-pill bg-light">
                            <i class="bi bi-star-fill text-warning"></i>
                            <i class="bi bi-star-fill text-warning"></i>
                            <i class="bi bi-star-fill text-warning"></i>
                            <i class="bi bi-star-fill text-warning"></i>
                          </span>
                      </div>
        
                      <div class="d-flex justify-content-evenly mb-2">
                        <a href="#" class="btn btn-sm text-white custom-bg shadow-none"> Book Now </a>
                        <a href="#" class="btn btn-sm btn-outline-dark shadow-none"> More Details </a>
                      </div>
                     
                    </div>
                </div> 
            </div>

            <!--Room2-->
            <div class="col-lg-4 col-md-6">
                <div class="card border-0 shadow" style="max-width:350px;margin: auto;">
                    <img src="image/rooms/double_room1.png" class="card-img-top" alt="...">
                    <div class="card-body">
                      <h5>Double Room</h5>
                      <h6 class="mb-4">500 Tk per night</h6>

                      <div class="features mb-4">
                        <h6 class="mb-1">Features</h6>
                        <span class="badge rounded-pill bg-light text-dark text-wrap">2 Rooms</span>
                        <span class="badge rounded-pill bg-light text-dark text-wrap">1 Bathrooms</span>
                        <span class="badge rounded-pill bg-light text-dark text-wrap">1 Balcony</span>
                        <span class="badge rounded-pill bg-light text-dark text-wrap">2 Sofa</span>
                      </div>

                      <div class="facilities mb-4">
                        <h6 class="mb-1">Facilities</h6>
                        <span class="badge rounded-pill bg-light text-dark text-wrap">Wifi</span>
                        <span class="badge rounded-pill bg-light text-dark text-wrap">Television</span>
                        <span class="badge rounded-pill bg-light text-dark text-wrap">AC</span>
                        <span class="badge rounded-pill bg-light text-dark text-wrap">Room Heater</span>
                      </div>
                      
                      <div class="guests mb-4">
                        <h6 class="mb-1">Guests</h6>
                        <span class="badge rounded-pill bg-light text-dark text-wrap">2 Adults</span>
                        <span class="badge rounded-pill bg-light text-dark text-wrap">2 Children</span>
                      </div>

                      <div class="rating mb-4">
                        <h6 class="mb-1">Rating</h6>
                          <span class="badge rounded-pill bg-light">
                            <i class="bi bi-star-fill text-warning"></i>
                            <i class="bi bi-star-fill text-warning"></i>
                            <i class="bi bi-star-fill text-warning"></i>
                            <i class="bi bi-star-fill text-warning"></i>
                          </span>
                      </div>
        
                      <div class="d-flex justify-content-evenly mb-2">
                        <a href="#" class="btn btn-sm text-white custom-bg shadow-none"> Book Now </a>
                        <a href="#" class="btn btn-sm btn-outline-dark shadow-none"> More Details </a>
                      </div>
                     
                    </div>
                </div> 
            </div>

            <!--Room3-->
            <div class="col-lg-4 col-md-6">
                <div class="card border-0 shadow" style="max-width:350px;margin: auto;">
                    <img src="image/rooms/luxury_room2.png" class="card-img-top" alt="...">
                    <div class="card-body">
                      <h5>Luxury Room</h5>
                      <h6 class="mb-4">900 Tk per night</h6>

                      <div class="features mb-4">
                        <h6 class="mb-1">Features</h6>
                        <span class="badge rounded-pill bg-light text-dark text-wrap">2 Rooms</span>
                        <span class="badge rounded-pill bg-light text-dark text-wrap">1 Bathrooms</span>
                        <span class="badge rounded-pill bg-light text-dark text-wrap">1 Balcony</span>
                        <span class="badge rounded-pill bg-light text-dark text-wrap">2 Sofa</span>
                      </div>

                      <div class="facilities mb-4">
                        <h6 class="mb-1">Facilities</h6>
                        <span class="badge rounded-pill bg-light text-dark text-wrap">Wifi</span>
                        <span class="badge rounded-pill bg-light text-dark text-wrap">Television</span>
                        <span class="badge rounded-pill bg-light text-dark text-wrap">AC</span>
                        <span class="badge rounded-pill bg-light text-dark text-wrap">Room Heater</span>
                      </div>
                      
                      <div class="guests mb-4">
                        <h6 class="mb-1">Guests</h6>
                        <span class="badge rounded-pill bg-light text-dark text-wrap">5 Adults</span>
                        <span class="badge rounded-pill bg-light text-dark text-wrap">4 Children</span>
                      </div>
                      
                      <div class="rating mb-4">
                        <h6 class="mb-1">Rating</h6>
                          <span class="badge rounded-pill bg-light">
                            <i class="bi bi-star-fill text-warning"></i>
                            <i class="bi bi-star-fill text-warning"></i>
                            <i class="bi bi-star-fill text-warning"></i>
                            <i class="bi bi-star-fill text-warning"></i>
                          </span>
                      </div>
        
                      <div class="d-flex justify-content-evenly mb-2">
                        <a href="#" class="btn btn-sm text-white custom-bg shadow-none"> Book Now </a>
                        <a href="#" class="btn btn-sm btn-outline-dark shadow-none"> More Details </a>
                      </div>
                     
                    </div>
                </div> 
            </div>

            <!--More Detail Section-->
            <div class="col-lg-12 text-center mt-5">
              <a href="rooms.php" class="btn btn-sm btn-outline-dark rounded-0 fw-bold shadow-none">More Rooms >>></a>
            </div>
        </div>
    </div>
    
    <?php require('include/footer.php'); ?>
<script>
    var swiper = new Swiper(".swiper-container", {
      spaceBetween: 30,
      effect: "fade",
      },
    );
  </script>
</script>
</body>
</html>