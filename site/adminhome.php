<?php

session_start();

include 'db_conn.php';


//Interogari simple
$sql = "SELECT s.NumeS, count(*) as NrCurieri
        from sedii s JOIN curieri c ON
        c.Sediu_ID = s.Sediu_ID
        group by s.NumeS
        order by count(*) DESC;"; 
$result = mysqli_query($con, $sql);

$sql2 = "SELECT c.Nume,c.Prenume, count(*) as NrPachete 
        from curieri c
        JOIN  pachete p ON c.Curier_ID = p.Curier_ID 
        group by c.Nume,c.Prenume 
        order by count(*) DESC;";
$result2 = mysqli_query($con, $sql2);

$sql3 = "SELECT cl.Nume,cl.Prenume, count(*) as NrPachete 
        from clienti cl
        JOIN pachete p ON cl.Client_ID = p.Client_ID 
        group by cl.Nume,cl.Prenume
        order by count(*) DESC;";
$result3 = mysqli_query($con, $sql3);

$sql4 = "SELECT s.NumeS, count(s.Sediu_ID) as NrPachete 
        from sedii s
        JOIN curieri c ON s.Sediu_ID = c.Sediu_ID
        JOIN pachete p ON c.Curier_ID = p.Curier_ID
        group by s.NumeS
        order by count(s.Sediu_ID) DESC;";
$result4 = mysqli_query($con, $sql4);

$sql5 = "SELECT pc.Nume ,count(cl.Client_ID) as NrClienti 
        FROM punct_colectare pc
        JOIN pachete p ON pc.Punct_Colectare_ID = p.Punct_Colectare_ID
        JOIN clienti cl ON cl.Client_ID = p.Client_ID
        group by pc.Nume
        order by count(cl.Client_ID) DESC;";
$result5 = mysqli_query($con, $sql5);


//Interogari complexe
$sql6 = "SELECT c.Nume,c.Prenume, c.Data_Angajarii
        FROM curieri c
        WHERE c.Data_Angajarii>=(SELECT max(c1.Data_Angajarii)
                                FROM curieri c1
                                WHERE c1.Sediu_ID = c.Sediu_ID)
        ORDER BY c.Data_Angajarii;";
$result6 = mysqli_query($con, $sql6);

$sql7 = "SELECT s.NumeS, avg(c.Salariu)as MediaSalariu
        from sedii s, curieri c
        where c.Sediu_ID = s.Sediu_ID
        group by s.Sediu_ID, s.NumeS
        having avg(c.Salariu) > (select avg(Salariu) from curieri);";
$result7 = mysqli_query($con, $sql7);

$sql8 = "SELECT cl.Nume, cl.Prenume 
        FROM clienti cl
        WHERE cl.Client_ID not in (SELECT cl1.Client_ID 
                                   FROM clienti cl1 
                                   JOIN pachete p ON cl1.Client_ID = p.Client_ID
                                   JOIN punct_colectare pc ON pc.Punct_Colectare_ID = p.Punct_Colectare_ID
                                   GROUP BY cl1.Client_ID);";
$result8 = mysqli_query($con, $sql8);

$sql9 = "SELECT cl.Nume, cl.Prenume 
        FROM clienti cl
        WHERE cl.Client_ID IN (SELECT cl1.Client_ID
                                FROM clienti cl1
                                JOIN pachete p ON cl1.Client_ID = p.Client_ID
                                JOIN curieri c ON p.Curier_ID = c.Curier_ID
                                WHERE c.Nume = 'Iorgu'
                                GROUP BY cl1.Client_ID);";
$result9 = mysqli_query($con, $sql9);


?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Admin</title>
		<link href="styles.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	</head>
	<body class="loggedin">
        
		<nav class="navtop">
			<div>
                <h1><a href = "#" class ="logo">ADMIN</a></h1>
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
			<h2>Bine ai revenit!</h2>
			<div>
				<h3>Numarul de curieri din toate sediile</h3>
				<form action="nr_curieri.php" method="post">
	            <input type="text" name="search" />
	            <input type="submit"/>
                </form>
			</div>
            <div>
				<h3>Numarul de pachete ale fiecarui curier</h3>
				<table class = "table">
                <tr>   
                    <th>Nume</th>
                    <th>Prenume</th> 
                    <th>Numar pachete</th> 
                </tr>  
                <?php  
                if(mysqli_num_rows($result2) > 0)  
                {  
                    while($row = mysqli_fetch_array($result2))  
                    {  
                ?>  
                <tr>  
                    <td><?php echo $row["Nume"];?></td>  
                    <td><?php echo $row["Prenume"]; ?></td>  
                    <td><?php echo $row["NrPachete"]; ?></td> 
                </tr>  
                <?php  
                    }  
                }  
                ?> 
				</table>
			</div>
            <div>
                <h3>Top clienti</h3>
                <table class = "table">
                <tr>   
                    <th>Nume</th>
                    <th>Prenume</th> 
                    <th>Numar pachete</th> 
                </tr>
                <?php  
                if(mysqli_num_rows($result3) > 0)  
                {  
                    while($row = mysqli_fetch_array($result3))  
                    {  
                ?>  
                    <tr>  
                        <td><?php echo $row["Nume"];?></td>
                        <td><?php echo $row["Prenume"]; ?></td>  
                        <td><?php echo $row["NrPachete"]; ?></td> 
                    </tr> 
                    <?php  
                    }  
                }  
                ?> 
                    </table>
            </div>
            <div>
                <h3>Numarul de pachete din fiecare sediu</h3>
                <table class = "table">
                <tr>   
                    <th>Nume Sediu</th>
                    <th>Numar Pachete</th> 
                </tr>
                <?php 
                if(mysqli_num_rows($result4) > 0)  
                {  
                    while($row = mysqli_fetch_array($result4))  
                    {  
                ?> 
                    <tr>  
                        <td><?php echo $row["NumeS"];?></td>  
                        <td><?php echo $row["NrPachete"]; ?></td>   
                    </tr> 
                    <?php  
                    }  
                }  
                ?>
                </table>
            </div>
            <div>
                <h3>Numarul de clienti ale punctelor de colectare</h3>
                <table class = "table">
                <tr>   
                    <th>Nume</th>
                    <th>Numar Clienti</th>  
                </tr>
                <?php 
                if(mysqli_num_rows($result5) > 0)  
                {  
                    while($row = mysqli_fetch_array($result5))  
                    {  
                ?> 
                    <tr>  
                        <td><?php echo $row["Nume"];?></td>  
                        <td><?php echo $row["NrClienti"]; ?></td>   
                    </tr> 
                    <?php  
                    }  
                }  
                ?>
                </table>
            </div>


            <div>
                <h3>Cei mai recenti angajati din fiecare sediu</h3>
                <form action="angajati_noi.php" method="post">
	            <input type="text" name="search" />
	            <input type="submit"/>
            </div>
            <div>
                <h3>Sediile cu media salariilor mai mare decat media salariilor totala</h3>
                <table class = "table">
                <tr>   
                    <th>Nume</th>
                    <th>Salariu Mediu</th>   
                </tr>
                <?php 
                if(mysqli_num_rows($result7) > 0)  
                {  
                    while($row = mysqli_fetch_array($result7))  
                    {  
                ?> 
                    <tr>  
                        <td><?php echo $row["NumeS"];?></td>  
                        <td><?php echo $row["MediaSalariu"]; ?></td>   
                    </tr> 
                    <?php  
                    }  
                }  
                ?>
                </table>
            </div>
            <div>
                <h3>Clientii care nu au ales niciun punct de colectare</h3>
                <table class = "table">
                <tr>   
                    <th>Nume</th>
                    <th>Prenume</th>  
                </tr>
                <?php 
                if(mysqli_num_rows($result8) > 0)  
                {  
                    while($row = mysqli_fetch_array($result8))  
                    {  
                ?> 
                    <tr>  
                        <td><?php echo $row["Nume"];?></td>  
                        <td><?php echo $row["Prenume"]; ?></td>   
                    </tr> 
                    <?php  
                    }  
                }  
                ?>
                </table>
            </div>
            <div>
                <h3>Clienti care l-au avut ca si curier pe Iorgu</h3>
                <table class = "table">
                <tr>   
                    <th>Nume</th>
                    <th>Prenume</th>  
                </tr>
                <?php 
                if(mysqli_num_rows($result9) > 0)  
                {  
                    while($row = mysqli_fetch_array($result9))  
                    {  
                ?> 
                    <tr>  
                        <td><?php echo $row["Nume"];?></td>  
                        <td><?php echo $row["Prenume"]; ?></td>   
                    </tr> 
                    <?php  
                    }  
                }  
                ?>
                </table>
            </div>
		</div>
	</body>
</html>
