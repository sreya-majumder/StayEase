<?php
    require('../include/db_connect.php');
    require('../include/essential.php');
    adminLogin();
    //Add Feature
    if(isset($_POST['add_feature']))
    {
        $form_data = filteration($_POST);
        $q = "INSERT INTO `features`(`name`) VALUES (?)";
        $values = [$form_data['name']]; 
        $res = insert($q, $values, 's');
        echo $res;
    }
    //Retrieve Feature
    if (isset($_POST['get_features'])) {
        $result = selectAll('features');
        $i = 1;
        while ($row = mysqli_fetch_assoc($result)) { 
            $name = htmlspecialchars($row['name']); 
            $id = $row['id']; 
            echo <<<data
            <tr>
                <td>$i</td>
                <td>$name</td>
                <td>
                    <button type="button" onclick="rem_feature($id)" class="btn btn-danger btn-sm shadow-none">
                        <i class="bi bi-trash"></i> Delete
                    </button>
                </td>
            </tr>
            data;
            $i++;
        }
    }
    //Remove Feature
    if(isset($_POST['rem_feature'])) {
        $form_data = filteration($_POST);
        $values = [$form_data['rem_feature']];
        $q = "DELETE FROM `features` WHERE `id`=?";
        $result = delete($q, $values, 'i');
        echo $result;
    }
?>
