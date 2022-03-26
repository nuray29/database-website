<?php  

if(isset($_GET['Delete'])){
    include "db_conn.php";
        function validate($data){
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        $id = validate($_GET['Delete']);

        $sql = "DELETE FROM sedii
                WHERE Sediu_ID=$id";
    $result = mysqli_query($con, $sql);
    if ($result) {
        header("Location: sedii.php?success=successfully deleted");
    }else {
        echo $id;
    }

}else {
	header("Location: sedii.php");
}