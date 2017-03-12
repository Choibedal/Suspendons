<?php
	 
	$action = $_POST["action"];
	$email = $_POST["email"];
	$password = $_POST["password"];

	if ($action == "login") 
	{
		returnToAndroid(getLogin($email, $password));
	}
	else if ($action == "profile") 
	{
		returnToAndroid(getProfilInformations($email, $password));
	}
	else
	{
		return;
	}



	function sqlQuery($conn, $sql)
	{
        $result = $conn->query($sql);

        $conn->close();

        return $result;
	}

	function getConnection()
	{
		//Prod
	    $servername 	= 	"clementvclsuspen.mysql.db";
	    $username 		= 	"clementvclsuspen";
	    $password 		= 	"Suspencma1";
	    $dbname 		= 	"clementvclsuspen";

	    //Debug
	    /*$servername 	= 	"localhost";
	    $username 		= 	"root";
	    $password 		= 	"";
	    $dbname 			= 	"suspendons";*/

	    // Create connection
	    $conn = new mysqli($servername, $username, $password, $dbname);

	    // Check connection
	    if ($conn->connect_error)
	    {
	        die("Connection failed: " . $conn->connect_error);
	    }

	    //Si tu vire cette ligne ça marche plus, have fun (en gros mysql n'est pas en utf8 et avec ça ça marche)
	    $conn->query("SET character_set_results = 'utf8', character_set_client = 'utf8', character_set_connection = 'utf8', character_set_database = 'utf8', character_set_server = 'utf8'");

        return $conn;
	}

	function getLogin($email, $mdp)
	{
		$sql = 'SELECT MAIL FROM UTILISATEUR WHERE MAIL="'. $email .'" AND MDP="'. $mdp . '" AND IDTYPE=0';
        $result = getConnection()->query($sql);

        $login = array();
        if ($result->num_rows > 0)
		{
	      	// output data of each row
	      	while($row = $result->fetch_assoc())
	      	{
	          	array_push($login, [
	              	'email' => $row["MAIL"]
	          	]);
	      	}
	  	}
        return $login;
	}



	function getProfilInformations($email, $mdp)
	{
		$sql = 'SELECT * FROM UTILISATEUR WHERE MAIL="'. $email .'" AND MDP="'. $mdp .'"';
        $result = getConnection()->query($sql);

        $profile = array();
        if ($result->num_rows > 0)
		{
	      	// output data of each row
	      	while($row = $result->fetch_assoc())
	      	{
	          	array_push($profile, [
	              	'name' => $row["PSEUDO"],
	              	'email' => $row["MAIL"],
	              	'address' => implode(' ', [$row["ADRESSE"], $row["CP"], $row["VILLE"]]),
	              	'dateCreation' => $row["DATECREATION"],
	              	'region' => $row["IDREGION"]
	          	]);
	      	}
	  	}

        return $profile;
	}



	function returnToAndroid($result)
	{
		echo json_encode($result, JSON_FORCE_OBJECT);
	}
?>
