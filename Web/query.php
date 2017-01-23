<?php
	 
	$action = $_POST["action"];
	$name = $_POST["name"];
	$password = $_POST["password"];

	if ($action == "login") 
	{
		returnToAndroid(getLogin($name, $password));
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
		/*Prod
	    $servername 	= 	"clementvclsuspen.mysql.db";
	    $username 		= 	"clementvclsuspen";
	    $password 		= 	"Suspencma1";
	    $dbname 			= 	"clementvclsuspen";
	    Debug*/
	    $servername 	= 	"localhost";
	    $username 		= 	"root";
	    $password 		= 	"";
	    $dbname 			= 	"suspendons";

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

	function getLogin($pseudo, $mdp)
	{
		$sql = 'SELECT MAIL FROM UTILISATEUR WHERE MAIL="'. $pseudo .'" AND MDP="'. $mdp . '" AND IDTYPE=0';
        $result = getConnection()->query($sql);

        $login = array();
        if ($result->num_rows > 0)
		{
	      	// output data of each row
	      	while($row = $result->fetch_assoc())
	      	{
	          	array_push($login, [
	              	'email' => $row["MAIL"];
	          	]);
	      	}
	  	}
        return $login;
	}



	function getProfilInformations($pseudo, $mdp)
	{
		$sql = 'SELECT PSEUDO FROM UTILISATEUR WHERE PSEUDO="'. $pseudo .'" AND MDP="'. $mdp . '" AND IDTYPE=0';
        $result = getConnection()->query($sql);
        if ($result->num_rows > 0)
		{
	      	// output data of each row
	      	while($row = $result->fetch_assoc())
	      	{
	          	array_push($partners, [
	              	'name' => $row["PSEUDO"],
	              	'mail' => $row["MAIL"],
	              	'address' => implode(' ', [$row["ADRESSE"], $row["CP"], $row["VILLE"]])
	          	]);
	      	}
	  	}

        $conn->close();

        return $result;
	}



	function returnToAndroid($result)
	{
		echo json_encode(array("user_data"=>$response));
	}
?>
