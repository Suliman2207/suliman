<html>
<head>
<title>FOOD SURVEY</title>
</head>
<body bgcolor="#E6E6FB">
<center><h1 style="color:#6666ff;">Welcome to the food survey of Suliman</h1></center> 
    <center><b><h0 style="color:#00284d;">Suliman's Survey. The Best One Ever!</h0></b></center>
    <center><p><h0 style="color:#00284d;">This site will help you get usefull information about FOOD!</h0></p></center>
    <br> <center><img src="food.jpg" alt="food" style="width:350px;height:262.5px;"></center>
    <br><br>
<a href="addFOODSURVEYFileData.php" type="text/html" target="_self" style="margin-left:50px;">Add food survey file data</a><br>
    <br>
<a href="addDATA.php" type="text/html" target="_self" style="margin-left:50px;">Add DATA</a><br>

<?php
	// Connecting to the database
	$server = "techniondbcourse01.database.windows.net"; 
    $user = "suliman1";
    $pass = "Qwerty12!";
    $database = "suliman1";
    $c = array("Database" => $database, "UID" => $user, "PWD" => $pass);
    sqlsrv_configure('WarningsReturnAsErrors', 0);
    $conn = sqlsrv_connect($server, $c);
    if($conn === false)
    {
        echo "error";
        die(print_r(sqlsrv_errors(), true));
    }
	//echo "connected to DB"; //debug
	// In case of success
?>	    
    <div class="scrollingtable">
    <div>
    <div>
    <table align="center" border="1">
        <thead><tr>
        <th><h0 style="color:#00284d;">1</h0></th>
        <th><h0 style="color:#00284d;">2</h0></th>
	<th><h0 style="color:#00284d;">3</h0></th>	
        </tr></thead>
        <tbody>
<?php

$sql = "SELECT distinct type_sports, AVG(GPA) as Average GPA, AVG(weight) as Average Weight
FROM Food
Where coffee=2 AND comfort_food like 'chocolate%' ";
GROUP BY type_sports;";
	    $result = sqlsrv_query($conn, $sql);
        if($result)
        {
            while($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC))
	        {
	            echo '<tr><td>' . $row['Type1'] . '</td><td>' . $row['counter'];
            }
        }
        else
        {
            echo 'Error';
        }
    ?>   
   </tbody>
     </table>
     </div>    
     </div> 
     </div>        
 
     
        
</body>
</html>

