<html>
<body style="background-color: #edcddd;text-align: center" dir="ltr">
<h1>Possible duplication information</h1> <br>
<h2>Duplicate companies according to relations set</h2> <br>


<table border="1" width="500">
    <colgroup><col width="150">
        <col width="150">
        <col width="150">
    </colgroup>
    <tr>
        <th>LEI1</th>
        <th>company_name 1</th>
        <th>LEI2</th>
        <th>company name 2</th>
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
     $sql= "SELECT LEI1, C1.company_name AS NAME1, LEI2, C2.company_name AS NAME2
    FROM Relations, Company C1, Company C2
     WHERE LEI1=C1.LEI AND LEI2=C2.LEI AND C1.LEI<>C2.LEI AND LEI1  IN (SELECT R1.LEI1
      FROM Relations R1, Relations R2
      WHERE R1.LEI2=R2.LEI2 AND R1.LEI1!=R2.LEI1 AND (R1.relation_type=R2.relation_type)) ";

    $result = sqlsrv_query($conn, $sql);
    if ($result == FALSE)
        die(FormatErrors(sqlsrv_errors()));

    while($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC))
    {
        echo '<tr>
                        <td>'.$row['LEI1'].'</td>
                        <td>'.$row['NAME1'].'</td>
                        <td>'.$row['LEI2'].'</td>
                        <td>'.$row['NAME2'].'</td>
                        </tr>';
    }?>
</table>

<h2> <Br>Duplicate companies that have the same name and same Region and county:) </h2><br>

<table border="1" width="500">
    <colgroup><col width="150">
        <col width="150">
        <col width="150">
    </colgroup>
    <tr>
        <th>LEI1</th>
        <th>company_name 1</th>
        <th>LEI2</th>
        <th>company name 2</th>
    </tr>

    <?php
        $sql= "SELECT C1.LEI as le1, C1.company_name as NAM1, C2.LEI as le2, C2.company_name as NAM2
FROM Company C1, Company C2
WHERE C1.company_name=C2.company_name AND C1.LEI<>C2.LEI AND C1.region=C2.region AND C1.country=C2.country
 ";

        $result = sqlsrv_query($conn, $sql);
        if ($result == FALSE)
            die(FormatErrors(sqlsrv_errors()));

        while($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC))
        {
            echo '<tr>
                        <td>'.$row['le1'].'</td>
                        <td>'.$row['NAM1'].'</td>
                        <td>'.$row['le2'].'</td>
                        <td>'.$row['NAM2'].'</td>
                        </tr>';
        }?>
    </table>

</html>