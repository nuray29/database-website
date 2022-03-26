<?php

include 'db_conn.php';
$search_value=$_POST["search"];
$sql6 = "SELECT c.Nume,c.Prenume, c.Data_Angajarii
        FROM curieri c
        WHERE c.Data_Angajarii>=(SELECT max(c1.Data_Angajarii)
                                FROM curieri c1
                                WHERE c1.Sediu_ID = c.Sediu_ID)
        having c.Nume LIKE '%$search_value%' or c.Prenume LIKE '%$search_value%';";
$result6 = mysqli_query($con, $sql6);
?>

<table class = "table">
<tr>   
    <th>Nume</th>
    <th>Prenume</th>  
    <th>Data Angajarii</th>
</tr>
<?php 
if(mysqli_num_rows($result6) > 0)  
{  
    while($row = mysqli_fetch_array($result6))  
    {  
?> 
    <tr>  
        <td><?php echo $row["Nume"];?></td>  
        <td><?php echo $row["Prenume"]; ?></td> 
        <td><?php echo $row["Data_Angajarii"]; ?></td>  
    </tr> 
    <?php  
    }  
}  
?>