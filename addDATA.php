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
$result = sqlsrv_query($conn, $sql);
$row = sqlsrv_fetch_array($result, SQLSRV_FETCH_NUMERIC);
$count=$row[0];

if (isset($_POST["submit"]))
{

    // First insert data to the Parts table
    $sql = "INSERT INTO Food(id, GPA, Gender, coffee, comfort_food, comfort_food_reasons, diet_current, eating_changes, 
	fav_cuisine, food_childhood, healthy_meal, ideal_diet, meals_dinner_friend, type_sports, weight)
    VALUES ($row[0]+1 ,".$_POST['GPA'].",".$_POST['Gender'].",".$_POST['coffee'].",".$_POST['comfort_food']."
    	,".$_POST['comfort_food_reasons'].",".$_POST['diet_current'].",".$_POST['eating_changes'].",".$_POST['fav_cuisine']."
	,".$_POST['food_childhood'].",".$_POST['healthy_meal'].",".$_POST['ideal_diet'].",".$_POST['meals_dinner_friend']."
	,".$_POST['type_sports'].",".$_POST['weight'].");";
    //echo $sql."<br>"; //debug
    $result = sqlsrv_query($conn, $sql); $count++;
    // In case of failure
    if ($result==false)
    {
        die("$count Couldn't add the part specified.<br>");
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
                        <td><input name="GPA" type="number" step="0.01" size="10"></td>
                    </tr>

                    <tr>
                        <td><h0 style="color:#00284d;">Gender:</h0></td>
                        <td><select name="Gender" type="number">
                                <option value="1" selected> Male </option>
                                <option value="2"> Female </option>
                            </select> </td>
                    </tr>


                    <tr>
                        <td><h0 style="color:#00284d;">coffee:</h0></td>
                        <td><select name="coffee" type="number">
                                <option value="2" selected> Yes </option>
                                <option value="1"> No </option>
                            </select> </td>
                    </tr>


                    <td><h0 style="color:#00284d;">comfort_food:</h0></td>
                    <td><input name="comfort_food" type="text" size="40"></td>
                    </tr>

                    <tr>
                        <td><h0 style="color:#00284d;">comfort_food_reasons:</h0></td>
                        <td><input name="comfort_food_reasons" type="text" size="40"></td>
                    </tr>
                    <tr>
                        <td><h0 style="color:#00284d;">Diet:</h0></td>
                        <td><input name="diet_current" type="text" size="40"></td>
                    </tr>
                    <tr>
                        <td><h0 style="color:#00284d;">Eating changes:</h0></td>
                        <td><input name="eating_changes" type="text" size="40"></td>
                    </tr>
                    <tr>
                        <td><h0 style="color:#00284d;">Favorite cuisine:</h0></td>
                        <td><input name="fav_cuisine" type="text" size="40"></td>
                    </tr>
                    <tr>
                        <td><h0 style="color:#00284d;">Childhood Food:</h0></td>
                        <td><input name="food_childhood" type="text" size="40"></td>
                    </tr>

                    <tr>
                        <td><h0 style="color:#00284d;">Healthy Meal:</h0></td>
                        <td><input name="healthy_meal" type="text" size="40"></td>
                    </tr>
                    <tr>
                        <td><h0 style="color:#00284d;">Ideal Diet:</h0></td>
                        <td><input name="ideal_diet" type="text" size="40"></td>
                    </tr>
                    <tr>
                        <td><h0 style="color:#00284d;">Whats for dinner:</h0></td>
                        <td><input name="meals_dinner_friend" type="text" size="40"></td>
                    </tr>

                    <tr>
                        <td><h0 style="color:#00284d;">Whats is your sport:</h0></td>
                        <td><input name="type_sports" type="text" size="40"></td>
                    </tr>

                    <tr>
                        <td><h0 style="color:#00284d;">weight:</h0></td>
                        <td><input name="weight" type="number" size="40"></td>
                    </tr>
                    <tr>
                        <td colspan="2"><br><button <input name="submit" type="submit" value="Add!"></button></td>
                    </tr>
                    <tr>
                        <td colspan="2"><button type="reset" value="Reset">Reset</button></td>
                    </tr>
                </table>
                <p><a href="index.php" type="text/html" target="_self" style="margin-left:20px;">back</a></p>
            <td> <img src="food.jpg" alt="food" style="width:350px;height:262.5px;"></td>
        </tr>
    </table>
</form>
</body>
</html>
