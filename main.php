<html >
<link rel="stylesheet" href="StyleSheet.css">
<meta charset="utf-8" />
<body style="background-color:  #edcddd;text-align: center" dir="ltr">
<div>
    <h1>Give Me Some Money!</h1>
    <h2> General Description</h2>

<img src="money.jpg" width="300" alt"could not show image!">
<br>
<table border="1" width="150"> <br>
    <colgroup><col width="150">
        <col width="150">
        <col width="150">
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
                <th>company_name</th>
                <th>Relation Type</th>

            </tr>

      <?php

            $server = "tcp:techniondbcourse01.database.windows.net,1433";
            $user = "azhar0zoabi";
            $pass = "Qwerty12!";
            $database = "azhar0zoabi";
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
                    $sql = "SELECT Company.company_name, Relations.relation_type
 FROM Relations LEFT OUTER JOIN Company  on Relations.LEI2 = Company.LEI
 WHERE Relations.LEI1='$wanted'

";

                    $result = sqlsrv_query($conn, $sql);
                    if ($result == FALSE)
                        die(FormatErrors(sqlsrv_errors()));
                    while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
                        echo '<tr>
                        <td>' . $row['company_name'] . '</td>
                        <td>' . $row['relation_type'] . '</td>
                        </tr>';
                    }

                }
            }
            ?>


</div>

</body>
</html>
