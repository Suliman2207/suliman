
<html>
<body>
<h1>Add Company file</h1><br>
<br><form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST" enctype="multipart/form-data">
    <br><div><input name="csv" type="file" id="csv" />
        <br><br><input type="submit" name="submit" value="submit" /></div>

</form>
<br>
<br>
<br>
<h1> Add File of Relation </h1>
<br><form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST" enctype="multipart/form-data">
    <br><div><input name="csv" type="file" id="csv" />
        <br><br><input type="submit" name="submit2" value="submit" /></div>

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
// Connect to the database
    $file = $_FILES[csv][tmp_name];
    if (($handle = fopen($file, "r")) !== FALSE) {
        while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
            $sql="INSERT INTO Company(LEI, Name, city, first_address_line, region, country) VALUES 
     		('".addslashes($data[0])."','".addslashes($data[1])."','".addslashes($data[2])."','".addslashes($data[3])."','".addslashes($data[4])."','".addslashes($data[5])."'); ";
       	 sqlsrv_query($conn, $sql);
        	}
      	  fclose($handle); } }


if (isset($_POST["submit2"])){
// Connect to the database
    $file = $_FILES[csv][tmp_name];
    if (($handle = fopen($file, "r")) !== FALSE) {
        while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
            $sql="INSERT INTO Relations(First_LEI, Second_LEI, Kind_of_Relationship) VALUES 
     		('".addslashes($data[0])."','".addslashes($data[1])."','".addslashes($data[2])."'); ";
            sqlsrv_query($conn, $sql);
        }
        fclose($handle); } }

