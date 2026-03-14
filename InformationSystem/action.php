<?php 
    $connection = mysqli_connect("localhost", "root", "", "informationsystem");

    if(!$connection) {
        die('Connection Failed'. mysql_connect_error());
    }

    if(isset($_POST['delete_data'])){
        $id = mysqli_real_escape_string($connection, $_POST['data_id']);
        $query = "DELETE FROM userinfo WHERE Id = '$id' ";
        $query_run = mysqli_query($connection, $query);

        if($query_run){
            $result = ["status" => 200, "message" => "Deleted Successfully!"];
        }else{
            $result = ["status" => 500, "message" => " Not Deleted!"];
        }
        echo json_encode($result);
        return;
    }

    if (isset($_POST['save_data']))
    {
        $fullName = mysqli_real_escape_string($connection, $_POST['fullname']);
        $email = mysqli_real_escape_string($connection, $_POST['email']);
        $phone = mysqli_real_escape_string($connection, $_POST['phone']);
        $address = mysqli_real_escape_string($connection, $_POST['address']);

        $query = "INSERT into userinfo (name, email, phone, address)
                  VALUES ('$fullName', '$email', '$phone', '$address')";
        
        $result = mysqli_query($connection, $query);
        if ($result)
        {
            $res = [
                'status'=> 200,
                'message'=> "Sumaksessssssssssssssssssss"
            ];
            echo json_encode($res);
            return;
        }
        else
        {
            $res = [
                'status'=> 500,
                'message'=> "Error ngani!"
            ];
            echo json_encode($res);
            return;
        }
    }
?>