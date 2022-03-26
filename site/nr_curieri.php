<?php

include 'db_conn.php';
$search_value=$_POST["search"];
$sql = "SELECT s.NumeS, count(*) as NrCurieri
        from sedii s 
        JOIN curieri c ON c.Sediu_ID = s.Sediu_ID
        where s.NumeS LIKE '%$search_value%'
        group by s.NumeS
        "; 
$result = mysqli_query($con, $sql);

?>



<table class = "table">
<thead>
<tr>   
    <th scope="col">Nume Sediu</th>
    <th scope="col">Numar Curieri</th> 
</tr>  
</thead>
<?php  
if(mysqli_num_rows($result) > 0)  
{  
    while($row = mysqli_fetch_array($result))  
    {  
?>  
<tr>  
    <td><?php echo $row["NumeS"];?></td>
    <td><?php echo $row["NrCurieri"]; ?></td> 
</tr> 
<?php  
    }  
}  
?> 
