<?php
    require('../include/db_connect.php');
    require('../include/essential.php');
    adminLogin();
    
    //Add Room 
    if (isset($_POST['add_room'])) {
        $features = filteration(json_decode($_POST['features']));
        $form_data = filteration($_POST);
        $flag = 0;
    
        $q1 = "INSERT INTO `rooms`(`name`, `area`, `price`, `quantity`, `adult`, `children`, `description`)
        VALUES (?,?,?,?,?,?,?)";
        $values = [$form_data['name'], $form_data['area'], $form_data['price'], $form_data['quantity'],
        $form_data['adult'], $form_data['children'], $form_data['description']];
    
        if (insert($q1, $values, 'siiiiis')) {
            $flag = 1;
            $room_id = mysqli_insert_id($conn);
            $q2 = "INSERT INTO `room_features`(`room_id`, `features_id`) VALUES (?,?)";
    
            if ($stmt = mysqli_prepare($conn, $q2)) {
                foreach ($features as $f) {
                    mysqli_stmt_bind_param($stmt, 'ii', $room_id, $f);
                    mysqli_stmt_execute($stmt);
                }
                mysqli_stmt_close($stmt);
            } else {
                $flag = 0;
                die('Insert Query could not be prepared');
            }
        }
        if ($flag) {
            echo 1;
        } else {
            echo 0;
        }
    }
    
    //Get Room 
    if(isset($_POST['get_all_rooms'])){
        $res = select("SELECT * FROM `rooms` WHERE `remove` =?" ,[0],'i'); 
        $i = 1;
        $data = "";
        while ($row = mysqli_fetch_assoc($res)){
            if ($row['status'] == 1) {
                $status = "<button onclick='toggle_status($row[id], 0)'
                 class='btn btn-dark btn-sm shadow-none'>active</button>";
            }else{
                $status = "<button onclick='toggle_status($row[id], 1)'
                 class='btn btn-warning btn-sm shadow-none'>inactive</button>";
            }
            $data .= "
            <tr class='align-middle'>
                <td>$i</td>
                <td>$row[name]</td>
                <td>$row[area] sq.ft</td>
                <td>
                    <span class='badge rounded-pill bg-light text-dark'>
                        Adult : $row[adult]
                    </span><br>
                    <span class='badge rounded-pill bg-light text-dark'>
                        Children : $row[children]
                    </span>
                </td>
                <td>$row[price] Tk</td>
                <td>$row[quantity]</td>
                <td>$status</td>
                <td>
                <button type='button' onclick='edit_details($row[id])' class='btn btn-primary shadow-none
                 btn-sm' data-bs-toggle='modal' data-bs-target='#edit-room'>
                    <i class='bi bi-pencil-square'></i>
                </button>
                <button type='button' onclick='remove_room($row[id])' class='btn btn-danger shadow-none btn-sm'>
                    <i class='bi bi-trash'></i>
                </button>
                </td>
            </tr>
            ";
            $i++;
        }
        echo $data; // Output the generated HTML
    }

    //Get Room
    if(isset($_POST['get_room']))
    {
        $form_data = filteration($_POST);
        $res1 = select("SELECT * FROM `rooms` WHERE `id` = ?", [$form_data['get_room']], 'i');
        $res2 = select("SELECT * FROM `room_features` WHERE `room_id` = ?", [$form_data['get_room']], 'i');
        
        $roomdata = mysqli_fetch_assoc($res1);

        $features = [];
        if(mysqli_num_rows($res2)>0)
        {
            while ($row = mysqli_fetch_assoc($res2)) {
                array_push($features, $row['features_id']);
            }
        }
        
        $data = ["roomdata" => $roomdata, "features" => $features];
        $data = json_encode($data);
        echo $data;
    }

    //Edit Room
    if(isset($_POST['edit_room'])){   
        $features = filteration(json_decode($_POST['features']));
        $form_data = filteration($_POST);
        $flag = 0;
        $q1 = "UPDATE `rooms` SET `name`=?, `area`=?, `price`=?, `quantity`=?, `adult`=?, `children`=?,
         `description`=? WHERE `id`=?";
        $values = [
            $form_data['name'], 
            $form_data['area'], 
            $form_data['price'], 
            $form_data['quantity'], 
            $form_data['adult'], 
            $form_data['children'], 
            $form_data['description'], 
            $form_data['room_id']
        ];
        if(update($q1, $values, 'siiiiisi')) {
            $flag = 1;
        }
        $del_features = delete("DELETE FROM `room_features` WHERE `room_id`=?", [$form_data['room_id']], 'i');
        if (!($del_features)){
            $flag = 0;
        }
        $q2 = "INSERT INTO `room_features`(`room_id`, `features_id`) VALUES (?, ?)";
        if ($stmt = mysqli_prepare($conn, $q2)) 
        {
            foreach ($features as $f) {
                mysqli_stmt_bind_param($stmt, 'ii', $form_data['room_id'], $f);
                mysqli_stmt_execute($stmt);
            }
            $flag = 1;
            mysqli_stmt_close($stmt);
        }else 
        {
            $flag = 0;
            die('Insert Query could not be prepared');
        }
        if ($flag) {
            echo 1;
        } else {
            echo 0;
        }
    }
    
    //Remove Room
    if (isset($_POST['remove_room'])) {
        // $features = filteration(json_decode($_POST['features']));
        $form_data = filteration($_POST);
        $res1 = delete("DELETE FROM `room_features` WHERE `room_id`=?", [$form_data['room_id']],'i');
        $res2 = update("UPDATE `rooms` SET `remove`=? WHERE `id`=?", [1,$form_data['room_id']],'ii');
        if ($res1 || $res2){
            echo 1;
        }
        else{
            echo 0;
        }    
    }
    
    //Toggle status function through which admin can set active or inactive status
    if(isset($_POST['toggle_status'])) {
        $form_data = filteration($_POST);
        
        $q = "UPDATE `rooms` SET `status`=? WHERE `id`=?";
        $v = [$form_data['value'], $form_data['toggle_status']];
        
        if(update($q, $v, 'ii')) {
            echo 1;
        } else {
            echo 0;
        }
    }
    
?>