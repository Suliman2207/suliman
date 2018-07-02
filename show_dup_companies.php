<html>
<body style="background-color: #E6E6FB;text-align: center" dir="ltr">
<h1>duplication information</h1> <br>
<h2>Duplicate Companies As Appearing in the Relations Set</h2> <br>


<table border="1" width="500">
    <colgroup><col width="150">
        <col width="150">
        <col width="150">
    </colgroup>
    <tr>
        <th>First_LEI</th>
        <th>company_name 1</th>
        <th>Second_LEI</th>
        <th>company name 2</th>
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
     $sql= "SELECT First_LEI, C1.Name AS NAME1, Second_LEI, C2.Name AS NAME2
    FROM InARelationshipWith, Company C1, Company C2
     WHERE First_LEI=C1.LEI AND Second_LEI=C2.LEI AND C1.LEI<>C2.LEI AND First_LEI  IN (SELECT R1.First_LEI
      FROM InARelationshipWith R1, InARelationshipWith R2
      WHERE R1.Second_LEI=R2.Second_LEI AND R1.First_LEI!=R2.First_LEI AND (R1.Kind_of_Relationship=R2.Kind_of_Relationship)) ";

    $result = sqlsrv_query($conn, $sql);
    if ($result == FALSE)
        die(FormatErrors(sqlsrv_errors()));

    while($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC))
    {
        echo '<tr>
                        <td>'.$row['First_LEI'].'</td>
                        <td>'.$row['NAME1'].'</td>
                        <td>'.$row['Second_LEI'].'</td>
                        <td>'.$row['NAME2'].'</td>
                        </tr>';
    }?>
</table>

<h2> <Br>Duplicate Companies that have the same Name, same Region and County:) </h2><br>

<table border="1" width="500">
    <colgroup><col width="150">
        <col width="150">
        <col width="150">
    </colgroup>
    <tr>
        <th>First_LEI</th>
        <th>Name 1</th>
        <th>Second_LEI</th>
        <th>Name 2</th>
    </tr>

    <?php
        $sql= "SELECT C1.LEI as le1, C1.Name as NAM1, C2.LEI as le2, C2.Name as NAM2
FROM Company C1, Company C2
WHERE C1.Name=C2.Name AND C1.LEI<>C2.LEI AND C1.region=C2.region AND C1.country=C2.country
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
