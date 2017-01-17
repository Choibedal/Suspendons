<?php

	function sqlQuery($conn, $sql)
	{
        $result = $conn->query($sql);

        $conn->close();

        return $result;
	}

	function getConnection()
	{
	    $servername 	= 	"clementvachet.fr";
	    $username 		= 	"clementvclsuspen";
	    $password 		= 	"Suspencma1";
	    $dbname 			= 	"clementvclsuspen";

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
?>
