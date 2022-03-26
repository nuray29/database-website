<?php

session_start();

include 'db_conn.php';

$aux =$_SESSION["username"];
$sql = "SELECT P.Pret, P.Greutate, P.Stare, P.Data_Expediere, P.Data_Primirii 
        from pachete P 
        join clienti C on (C.Client_ID = P.Client_ID)
        join user U on(C.Email = U.username) 
        where U.username = '$aux';";
$result = mysqli_query($con, $sql);


?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>User</title>
		<link href="styles.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	</head>
	<body class="loggedin">
		<nav class="navtop">
			<div>
                <h1><a href = "#" class ="logo">USER</a></h1>
				<a href="logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a>
			</div>
		</nav>
		<div class="content">
			<h2>Bine ai revenit!</h2>
			<div>
				<h3>Comenzile tale:</h3>
                <span></span>
                
				<table class="table">
                <?php  
                if(mysqli_num_rows($result) > 0)  
                { ?>
                <tr>  
                    <th>Pret</th> 
                    <th>Greutate</th> 
                    <th>Stare</th>
                    <th>Data_Expediere</th> 
                    <th>Data_Primire</th> 
                </tr>  
                
                <?php    while($row = mysqli_fetch_array($result))  
                    {  
                ?>  
                <tr>  
                    <td><?php echo $row["Pret"]. "lei";?></td>  
                    <td><?php echo $row["Greutate"]. "kg"; ?></td>  
                    <td><?php echo $row["Stare"]; ?></td> 
                    <td><?php echo $row["Data_Expediere"]; ?></td> 
                    <td><?php echo $row["Data_Primirii"]; ?></td> 
                </tr>  
                <?php  
                    }  
                } else echo "Nu exista comenzi"; 
                ?> 
				</table>
			</div>
		</div>
	</body>
</html>