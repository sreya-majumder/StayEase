<?php
    
    function adminLogin(){
        session_start();
        if(!(isset($_SESSION['adminLogin']) && $_SESSION['adminLogin']==true)){
            redirect(admin/index.php);
        }

    }
    function redirect($url){
        echo "<script>
        window.location.href='$url';
        </script>";
    }
    function alert($type,$msg){
        $bs_class = ($type == 'successs') ? "alert-success":"alert-danger";
        echo <<<alert
            <div class="alert $bs_class alert-dismissible fade show custom-alert" role="alert">
              <strong class="me-3">$msg</strong>
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        alert;
    }

?>