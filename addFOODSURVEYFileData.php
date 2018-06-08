
<html>
<head>
<title>FoodWorld</title>
</head>
<body bgcolor="#E6E6FA">
      <center><h1 style="color:#6666ff;">Add Food Survey file!</h1></center>
    <br> <center><img src="food1.jpg" alt="food1" style="width:300px;height:225px;"></center>
<br><form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST" enctype="multipart/form-data"> 
<br><center><input name="csv" type="file" id="csv" /> 
<br><br><input type="submit" name="submit" value="submit" /></center>
<p><a href="index.php" type="text/html" target="_self" style="margin-left:50px;">back</a></p>
</form> 

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
   
	$sql="SELECT count(*) FROM Food";
	$result1 = sqlsrv_query($conn, $sql);
	$row = sqlsrv_fetch_array($result1, SQLSRV_FETCH_NUMERIC);
	$counter=$row[0];
	
	
    if (isset($_POST["submit"])){
    //get the csv file 
    $file = $_FILES[csv][tmp_name];  
    echo "Importing file: ";
    echo "$file";
    echo "<br>";

    $row = 1;
    if (($handle = fopen($file, "r")) !== FALSE) {
        while (($data = fgetcsv($handle,1000, ",")) !== FALSE) {
		
	if ($data[0]=="nan" || $data[1]=="nan" || $data[2]=="nan" || $data[3]=="nan" || $data[4]=="nan" || $data[5]=="nan" || $data[6]=="nan" || 
	    $data[7]=="nan" || $data[8]=="nan" || $data[9]=="nan" || $data[10]=="nan" || $data[11]=="nan" || $data[12]=="nan" || 
	    $data[13]=="nan") {continue;}
		
		
		
         $sql="INSERT INTO Food(id, GPA, Gender, coffee, comfort_food, comfort_food_reasons, diet_current, eating_changes, fav_cuisine, food_childhood, healthy_meal, ideal_diet, meals_dinner_friend, type_sports, weight) VALUES ( 
         
	'" addslashes($counter) . "','" . addslashes($data[0]) . "','" . addslashes($data[1]) . "','" . addslashes($data[2]) . "','" . addslashes($data[3]) . "','" . 
		 addslashes($data[4]) . "','" . addslashes($data[5]) . "','" . addslashes($data[6]) . "','" . addslashes($data[7]) . "','" . 
		 addslashes($data[8]) . "','" . addslashes($data[9]) . "','" . addslashes($data[10]) . "','" . addslashes($data[11]) . "','" . 
		 addslashes($data[12]) . "','" . addslashes($data[13]) . "');";

        
        $result=sqlsrv_query($conn, $sql); $counter++;
        }
        if(!$result)
        {
            die("Oops, error");

        }
        else
        {
            echo "good! Thanks for uploading";
            
        }
        //echo $sql."<br>"; //debug
        fclose($handle);
    }
    }

?>


</body></html>
