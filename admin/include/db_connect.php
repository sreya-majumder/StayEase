<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = 'CSE370Project';

    $conn = mysqli_connect($servername,$username,$password,$dbname);
    if (!$conn){
        die("Connecion-failed".mysqli_connect_error());
    }
    //filtraration
    function filteration($data)
    {
        foreach($data as $key => $value){
            $data[$key] = trim($value);
            $data[$key] = stripcslashes($value);
            $data[$key] = htmlspecialchars($value);
            $data[$key] = strip_tags($value);

        }
        return $data;
    }
    //select 
    function select($sql, $values, $datatypes)
    {
        $conn = $GLOBALS['conn'];
        if ($stmt = mysqli_prepare($conn, $sql)) {
            mysqli_stmt_bind_param($stmt, $datatypes,...$values);
            if (mysqli_stmt_execute($stmt)) {
                $result = mysqli_stmt_get_result($stmt);
                mysqli_stmt_close($stmt);
                return $result;
            } 
            else {
                mysqli_stmt_close($stmt);
                die("Select query two execution failed: " . mysqli_error($conn));
            }
        } 
        else {
            die("Select query one preparation failed: " . mysqli_error($conn));
        }
    }
    //selectAll
    function selectAll($table)
    {
        $conn = $GLOBALS['conn'];
        $result = mysqli_query($conn, "SELECT * FROM $table");
        return $result;
    }
    //update
    function update($sql, $values, $datatypes)
    {
        $conn = $GLOBALS['conn'];
        if ($stmt = mysqli_prepare($conn, $sql)) 
        {
            mysqli_stmt_bind_param($stmt, $datatypes, ...$values);
            if (mysqli_stmt_execute($stmt)) {
                $result = mysqli_stmt_affected_rows($stmt);
                mysqli_stmt_close($stmt);
                return $result;
            } 
            else {
                mysqli_stmt_close($stmt);
                die("Update query two execution failed: " . mysqli_error($conn));
            }
        } 
        else {
            die("Update query one preparation failed: " . mysqli_error($conn));
        }
    }
    //insert
    function insert($sql, $values, $datatypes)
    {
        $conn = $GLOBALS['conn'];
        if ($stmt = mysqli_prepare($conn, $sql)) 
        {
            mysqli_stmt_bind_param($stmt, $datatypes, ...$values);
            if (mysqli_stmt_execute($stmt)) {
                $result = mysqli_stmt_affected_rows($stmt);
                mysqli_stmt_close($stmt);
                return $result;
            } 
            else {
                mysqli_stmt_close($stmt);
                die("Insert query two execution failed: " . mysqli_error($conn));
            }
        } 
        else {
            die("Insert query one preparation failed: " . mysqli_error($conn));
        }
    }

    //delete
    function delete($sql, $values, $datatypes)
    {
        $conn = $GLOBALS['conn'];
        if ($stmt = mysqli_prepare($conn, $sql)) 
        {
            mysqli_stmt_bind_param($stmt, $datatypes, ...$values);
            if (mysqli_stmt_execute($stmt)) {
                $result = mysqli_stmt_affected_rows($stmt);
                mysqli_stmt_close($stmt);
                return $result;
            } 
            else {
                mysqli_stmt_close($stmt);
                die("Delete query two execution failed: " . mysqli_error($conn));
            }
        } 
        else {
            die("Delete query one preparation failed: " . mysqli_error($conn));
        }
    }
    
?>
