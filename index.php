<html>
	<head>
        <link rel="stylesheet" href="style.css" type="text/css">
		<title> Food Survey </title>
	</head>

	<body>
		<iframe name="leftFrame" width="20%" height="100%" src="left.php"></iframe>
		<iframe name="mainFrame" width="59%" height="100%" src="main.php"></iframe>



<?php
	// Connecting to the database
	$server = "suliman1.database.windows.net";
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
        //echo "connected to DB"; //debug
        // In case of success
?>







</body>
</html>