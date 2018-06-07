
<html>
<head>
<title>pokeWorld</title>
</head>
<body bgcolor="#E6E6FA">
      <center><h1 style="color:#6666ff;">Add pokemon file!</h1></center>
    <br> <center><img src="pic5.gif" alt="pokemonDB" style="width:300px;height:225px;"></center>
<br><form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST" enctype="multipart/form-data"> 
<br><center><input name="csv" type="file" id="csv" /> 
<br><br><input type="submit" name="submit" value="submit" /></center>
<p><a href="index.php" type="text/html" target="_self" style="margin-left:50px;">back</a></p>
</form> 

<?php
	// Connecting to the database
     
	$server = "motibahar.database.windows.net"; 
    $user = "motibahar";
    $pass = "mB05050514";
    $database = "motibahar";
    $c = array("Database" => $database, "UID" => $user, "PWD" => $pass);
    sqlsrv_configure('WarningsReturnAsErrors', 0);
    $conn = sqlsrv_connect($server, $c);
    if($conn === false)
    {
        echo "error";
        die(print_r(sqlsrv_errors(), true));
    }
   
    if (isset($_POST["submit"])){
    //get the csv file 
    $file = $_FILES[csv][tmp_name];  
    echo "Importing file: ";
    echo "$file";
    echo "<br>";

    $row = 1;
    if (($handle = fopen($file, "r")) !== FALSE) {
        while (($data = fgetcsv($handle,1000, ",")) !== FALSE) {
         $sql="INSERT INTO pokemonDataCenter(name, type1, type2, HP, Attack, Defense, attackSpeed, defenseSpeed, Speed, Generation, Legendary) VALUES ( 
        '".$data[0]."',
        '".$data[1]."', 
        '".$data[2]."',
        ".$data[3].",
        ".$data[4].",
        ".$data[5].",
        ".$data[6].",
        ".$data[7].",
        ".$data[8].",
        ".$data[9].",
        ".$data[10]."
        ); 
        ";
        
        $result=sqlsrv_query($conn, $sql);
        }
        if(!$result)
        {
            die("Oops, error");

        }
        else
        {
            echo "good! Thanks for uploading Pokemons";
            
        }
        //echo $sql."<br>"; //debug
        fclose($handle);
    }
    }

?>


</body></html>
