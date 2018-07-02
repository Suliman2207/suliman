<html>
<body style="background-color: #edcddd;">
<link rel="stylesheet" href="StyleSheet.css">
<meta charset="utf-8" />
<div>
<h1>Add Report!</h1>
<br>
<img src="giphy.gif" width="310" alt"could not show image!">
<form >
    Enter LEI: <input type="text" name="LEI_number">
    <br>
    <textarea name="report_text" rows="5" cols="40"><?php echo $report_text;?>
    Write report content here! 
    </textarea>
    <br>  <input type="submit">
</form>
</div>
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
if(isset($_POST["submit"]))
{
$text_area = $_POST['report_text'];
$company_LEI_Composer = $_POST['LEI_number'];
$sql =" SELECT LEI as LEI From Company;";
$result= sqlsrv_query($conn, $sql);
while ($row =sqlsrv_fetch_array($result, sqlsrv_fetch_assoc))
{
    $company_LEI = $row['LEI'];
    $pos=strpos($text_area, $company_LEI,0);
    if($pos!==false and $company_LEI_Composer!=$company_LEI)
    {
        $sql5= "insert into Relations(LEI1, LEI2, relation_type) Values ('$company_LEI_Composer','$company_LEI','');";
$result5=sqlsrv_query($conn,$sql5);
    }
    
}
$sql=" INSERT INTO Report(LEI,timestamp_attribute,content) Values ('$company_LEI_Composer',current_timestamp, '$text_area');";
$result=sqlsrv_query($conn,$sql);
}
?>



</body>
</html>
