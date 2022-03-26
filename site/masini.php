<?php

session_start();

include 'db_conn.php';


$sql = 'SELECT * FROM masini;';
$result = mysqli_query($con, $sql);

?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Admin</title>
		<link href="styles.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
	</head>
	<body class="loggedin">
		<nav class="navtop">
			<div>
				<h1><a href = "adminhome.php" class = "logo">ADMIN</a></h1>
                <a href="curieri.php">curieri</a>
                <a href="sedii.php">sedii</a>
                <a href="clienti.php">clienti</a>
                <a href="pachete.php">pachete</a>
                <a href="masini.php">masini</a>
                <a href="pick-up.php">pick-up</a>
				<a href="logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a>
			</div>
		</nav>
		<div class="content">
            <div class="container">
                <div class="box">
                    <table class="table table-striped">
                        <thead>
                            <tr>  
                                <th scope="col">Nr_Inm</th>
                                <th scope="col">Model</th> 
                            </tr>  
                        </thead>
                    <?php  
                        if(mysqli_num_rows($result) > 0)  
                        {  
                            while($row = mysqli_fetch_array($result))  
                            {  ?>  
                            <tr>  
                                <td><?php echo $row["Nr_Inm"];?></td>
                                <td><?php echo $row["Model"]; ?></td>  
                            </tr>  
                        <?php  
                            }  
                        }  
                        ?> 
                    </table>
                </div>
            </div>
		</div>
	</body>
</html>
