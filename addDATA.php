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

   if (isset($_POST["submit"]))
	{
        if($_POST['HP']==""){
            $_POST['HP']="0";
        }
         if($_POST['ATTACK']==""){
            $_POST['ATTACK']="0";
        }
         if($_POST['DEFENSE']==""){
            $_POST['DEFENSE']="0";
        }
         if($_POST['SPATK']==""){
            $_POST['SPATK']="0";
        }
         if($_POST['SPDEF']==""){
            $_POST['SPDEF']="0";
        }
         if($_POST['SPEED']==""){
            $_POST['SPEED']="0";
        }
	 
	// First insert data to the Parts table
	$sql = "INSERT INTO Food(GPA, Gender, coffee, comfort_food, comfort_food_reasons, diet_current, eating_changes, fav_cuisine, food_childhood, healthy_meal, ideal_diet, meals_dinner_friend, type_sports, weight)
    VALUES('".$_POST['GPA']."','".$_POST['Gender']."','".$_POST['coffee']."',".$_POST['comfort_food'].",".$_POST['comfort_food_reasons']."
     ,".$_POST['diet_current'].",".$_POST['eating_changes'].",".$_POST['fav_cuisine'].",".$_POST['food_childhood'].",".$_POST['healthy_meal'].",".$_POST['ideal_diet'].",".$_POST['meals_dinner_friend'].",".$_POST['type_sports'].",".$_POST['weight'].");"; 
	//echo $sql."<br>"; //debug
	$result = sqlsrv_query($conn, $sql);
	// In case of failure
	if (!$result)
	{
		die("Couldn't add the part specified.<br>");
	}
	echo "The Data has been added to the database.<br><br>";
	}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>FoodWorld</title>
    </head>

    <body bgcolor="#E6E6FA">
<center>
    <h1 style="color:#6666ff;">Here you can add a new Data to our world</h1></center>
        <br><br>
<form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
    <table border="0" cellpadding="5">
   <tr>
       <td>
            <table border="0" cellpadding="5">
		<tr>
			<td><h0 style="color:#00284d;">GPA:</h0></td>
			<td><input name="GPA" type="number" size="40"></td>
		</tr>
		<tr>
            <td><h0 style="color:#00284d;">Add Type1:</h0></td>
			<td><input name="TYPE1" type="text" size="40"></td>
		</tr>
        <tr>
            <td><h0 style="color:#00284d;">Add Type2:</h0></td>
			<td><input name="TYPE2" type="text" size="40"></td>
		</tr>
		<tr>
            <td><h0 style="color:#00284d;">Hp:</h0></td>
			<td><input name="HP" type="number" size="10"></td>
		</tr>
		<tr>
             <td><h0 style="color:#00284d;">Attack:</h0></td>
			<td><input name="ATTACK" type="number" size="10"></td>
		</tr>
        <tr>
            <td><h0 style="color:#00284d;">Defense:</h0></td>
			<td><input name="DEFENSE" type="number" size="10"></td>
		</tr>
        <tr>
            <td><h0 style="color:#00284d;">SP. Atk:</h0></td>
			<td><input name="SPATK" type="number" size="10"></td>
		</tr>
        <tr>
            <td><h0 style="color:#00284d;">SP. Def:</h0></td>
			<td><input name="SPDEF" type="number" size="10"></td>
		</tr>
        <tr>
            <td><h0 style="color:#00284d;">Speed:</h0></td>
			<td><input name="SPEED" type="number" size="10" required>*</td>
		</tr>
        <tr>
            <td><h0 style="color:#00284d;">Generation:</h0></td>
			<td><select name="GENERATION" type="text">  
             <option selected value="1">1</option>
             <option value="2">2</option>
             <option value="3">3</option>
             <option value="4">4</option>
             <option value="5">5</option>
             <option value="6">6</option>
              </select></td>
		</tr>
         <tr>
            <td><h0 style="color:#00284d;">Legendary:</h0></td>
			<td><select name="LEGENDARY" type="text">
             <option value="1" selected> Yes </option>
			 <option value="0"> No </option>
                </select> </td>
		</tr>
		<tr>
			<td colspan="2"><br><input name="submit" type="submit" value="Add him!"></td>
		</tr>
        <tr>
			<td colspan="2"><button type="reset" value="Reset">Reset</button></td>
		</tr>
       </table>
    <p><a href="index.php" type="text/html" target="_self" style="margin-left:20px;">back</a></p>
       <td> <img src="pic6.gif" alt="pokemonDB" style="width:350px;height:262.5px;"></td>
       </tr>
	</table>
    </form>    
    </body>
</html>
