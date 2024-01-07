<?php
    require('include/db_connect.php');
    require('include/essential.php');
    adminLogin();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Features & Facilities</title>
    <?php require ('include/link.php');?>
</head>
<body class="bg-light">
    <?php require ('include/header.php');?>
    <div class="container-fluid" id="main-content">
        <div class="row">
            <div class="col-lg-10 ms-auto p-4 overflow-hidden">
                <h3 class="mb-4"> FEATURES & FACILITIES </h3>

                <!-- Feature Secion -->
                <div class="card-border-0 shadow-sm mb-4">
                    <div class="card-body">
                    
                        <!--Feature Button Section-->
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <h5 class="card-title m-0">Features</h5>
                            <button type="button" class="btn btn-dark shadow-none btn-sm" data-bs-toggle="modal" data-bs-target="#feature-s">
                                <i class="bi bi-plus-square"></i>Add
                            </button>
                        </div>
                        
                        <!-- Feature Table -->
                        <div class="table-responsive-md" style="height:450px; overflow-y:scroll;">
                            <table class="table table-hover border">
                                <thead class="sticky-top">
                                    <tr class="bg-dark text-light">
                                        <th scope="col">#</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody id="features-data">
                                        
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                
                
            </div>
        </div>
    </div>

    <!--Feature Modal-->
    <div class="modal fade" id="feature-s" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form id="feature_s_form">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add Feature</h5>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label fw-bold">Name</label>
                            <input type="text" name="feature_name" class="form-control shadow-none" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="reset" class="btn text-secondary shadow-none" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn custom-bg text-white shadow-none">Save</button>
                    </div>
                </div>
            </form>
            
        </div>
    </div>

    <?php require ('include/scripts.php');?>
     
    <script>
        let feature_s_form = document.getElementById('feature_s_form');
        feature_s_form.addEventListener('submit', function(e) {
            e.preventDefault();
            add_feature();
        });

        //Add Feature Function
        function add_feature()
        {
            let data = new FormData();
            data.append('name', feature_s_form.elements['feature_name'].value);
            data.append('add_feature', '');

            let xhr = new XMLHttpRequest();
            xhr.open("POST", "ajax/features_facilities.php", true);

            xhr.onload = function() {
                var myModal = document.getElementById('feature-s');
                var modal = bootstrap.Modal.getInstance(myModal);
                modal.hide();

                if (this.responseText == 1) {
                    alert('success','New feature added!');
                    feature_s_form.elements['feature_name'].value = '';
                    get_features();
                } else {
                    alert('error','Server Down!');
                }
            }

            xhr.send(data);
        }

        //Retrieve  Feature Function
        function get_features() {
            let xhr = new XMLHttpRequest();
            xhr.open("POST", "ajax/features_facilities.php", true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.onload = function() {
                document.getElementById('features-data').innerHTML = this.responseText;
            };
            xhr.send('get_features');
        }
        
        //Remove Feature Function
        function rem_feature(val) {
            let xhr = new XMLHttpRequest();
            xhr.open("POST", "ajax/features_facilities.php", true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.onload = function() {
                if (this.responseText == 1) {
                    alert('success','Feature Removed!');
                    get_features();
                } else if (this.responseText == "room_added") {
                    alert('error','Facility is added in the room');
                } else {
                    alert('error','Server Down!');
                }
            };
            
            xhr.send('rem_feature=' + val); 
        }

        window.onload = function() {
            get_features();
        }

        

    </script>

</body>
</html>