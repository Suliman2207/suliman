<html>
<head> <title> Form </title>
    <link rel="stylesheet" href="../style.css" type="text/css">
</head>


<?php
        $server = "tcp:suliman1.database.windows.net,1433";
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
    echo "The data has been added to the database.<br><br>";
}
?>




<body style="text-align:center">
<h1>  Here you can add your choices to the database  </h1>

<hr>

<form name="first_form" action="html_form_action.php" method="get">

    GPA: 		 <input type="text" NAME="GPA" SIZE="25"> <br>
    Gender:		 <select name="Gender">
        <option selected> Male </option>
        <option> Female </option>
    </select>
    Coffee:		 <select name="coffee">
        <option selected> Yes </option>
        <option> No </option>
    </select>
    Comfort_food: 		 <input type="text" NAME="comfort_food" SIZE="25"> <br>

    <textarea name="comfort_food_reasons" Rows="5" cols="60"> Write your comfort food reasons</textarea> <br>

    Diet: 		 <input type="text" NAME="diet_current" SIZE="25"> <br>
    Eating changes: 		 <input type="text" NAME="eating_changes" SIZE="25"> <br>
    Favorite cuisine: 		 <input type="text" NAME="fav_cuisine" SIZE="25"> <br>
    Childhood Food: 		 <input type="text" NAME="food_childhood" SIZE="25"> <br>
    Healthy Meal: 		 <input type="text" NAME="healthy_meal" SIZE="25"> <br>
    Ideal Diet: 		 <input type="text" NAME="ideal_diet" SIZE="25"> <br>
    Whats for dinner: 		 <input type="text" NAME="meals_dinner_friend" SIZE="25"> <br>
    What is your sport: 		 <input type="text" NAME="type_sports" SIZE="25"> <br>
    Weight: 		 <input type="text" NAME="weight" SIZE="25"> <br>



    <button type="submit" value="Send"> Add!</button>
    <br>
    <button type="reset" value="Clear"> Reset Page</button>


    </table>
    <p><a href="index.php" type="text/html" target="_self" style="margin-left:20px;">back</a></p>
    </tr>
    </table>

</form>

</body>
</html> 