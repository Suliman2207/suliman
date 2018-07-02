<html >
<link rel="stylesheet" href="StyleSheet.css">
<meta charset="utf-8" />
<body style="background-color:  #E6E6FB;text-align: center" dir="ltr">
<div>
    <h1>Give Money!</h1>
    <h2> Grade is 100%</h2>

<img src="money.jpeg" width="300" alt"could not show image!">
<br>
<table border="1" width="150"> <br>
    <colgroup><col width="150">
        <col width="155">
        <col width="155">
    </colgroup>
</table>


        <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST" enctype="multipart/form-data">
            Enter LEI number:<br>
            <input type="text" name="inputLEI">
            <br>
            <input type="submit" name="submit" value="submit" >

            <br>
        </form>

        <table border="1" width="500">
            <colgroup><col width="150">
                <col width="150">
                <col width="150">
            </colgroup>
            <tr>
                <th>Name</th>
                <th>Relation Type</th>

            </tr>

      <?php

            $server = "tcp:techniondbcourse01.database.windows.net,1433";
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
            if (isset($_POST["submit"])) {
                $wanted=$_POST['inputLEI']==""?"NULL":$_POST['inputLEI'];
                if ($wanted == NULL) {
                    echo "Error , You must specify a user LEI";
                } else {
                    $sql = "SELECT Company.Name, InARelationshipWith.Kind_of_Relationship
 FROM InARelationshipWith LEFT OUTER JOIN Company  on InARelationshipWith.Second_LEI = Company.LEI
 WHERE InARelationshipWith.First_LEI='$wanted'

";

                    $result = sqlsrv_query($conn, $sql);
                    if ($result == FALSE)
                        die(FormatErrors(sqlsrv_errors()));
                    while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
                        echo '<tr>
                        <td>' . $row['Name'] . '</td>
                        <td>' . $row['Kind_of_Relationship'] . '</td>
                        </tr>';
                    }

                }
            }
            ?>


</div>

</body>
</html>
