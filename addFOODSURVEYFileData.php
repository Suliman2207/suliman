
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
   
    if (isset($_POST["submit"])){
    //get the csv file 
    $file = $_FILES[csv][tmp_name];  
    echo "Importing file: ";
    echo "$file";
    echo "<br>";

    $row = 1; $counter = 1;
    if (($handle = fopen($file, "r")) !== FALSE) {
        while (($data = fgetcsv($handle,1000, ",")) !== FALSE) {
         $sql="INSERT INTO Food(id, GPA, Gender, coffee, comfort_food, comfort_food_reasons, diet_current, eating_changes, fav_cuisine, food_childhood, healthy_meal, ideal_diet, meals_dinner_friend, type_sports, weight) VALUES ( 
         $counter++;
	'".$data[0]."',
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
	".$data[10].",
	".$data[11].",
	".$data[12].",
        ".$data[13]."
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
            echo "good! Thanks for uploading";
            
        }
        //echo $sql."<br>"; //debug
        fclose($handle);
    }
    }

?>


</body></html>
