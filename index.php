<html>
<head>
<title>FOOD SURVEY</title>
</head>
<body bgcolor="#E6E6FB">
<center><h1 style="color:#6666ff;">PokeDB</h1></center> 
    <center><b><h0 style="color:#00284d;">Catching Pokemons couldn't be easier</h0></b></center>
    <center><p><h0 style="color:#00284d;">This site will help you get usefull information about pokemons and will help you catch them all!</h0></p></center>
    <br> <center><img src="pic2.jpg" alt="pokemonDB" style="width:350px;height:262.5px;"></center>
    <br><br>
<a href="addPokemonFileData.php" type="text/html" target="_self" style="margin-left:50px;">Add pokemon file data</a><br>
    <br>
<a href="addPokemon.php" type="text/html" target="_self" style="margin-left:50px;">Add pokemon</a><br>

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
        <th><h0 style="color:#00284d;">Pokemon type</h0></th>
        <th><h0 style="color:#00284d;">Count of this type</h0></th>
        </tr></thead>
        <tbody>
<?php

$sql = "SELECT distinct Type1, COUNT(Type1) as counter
FROM pokemonDataCenter
GROUP BY Type1;";
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
            echo 'Error displaying Longest Drive Table';
        }
    ?>   
   </tbody>
     </table>
     </div>    
     </div> 
     </div>        
 
     
        
</body>
</html>

