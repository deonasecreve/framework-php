<?php


// Alle patienten uit de database halen//
function getAllPatients()
{
	//database connectie//
	$db = opendatabaseConnection();

	//selecteer van de tabel patient//
	$sql = "SELECT * FROM patient";
	// query voorbereiden//
	$query = $db->prepare($sql);
	//exuteert de query//
	$query->execute();

	//zet de database op 0//
	$db = NULL;

	//pak alle patienten uit de database
	$patients = $query -> fetchAll();
	// return alle patienten
	return $patients;
}

// verwijder alle patienten//
function deletePatient($id) 
{
	//database connectie//
	$db = openDatabaseConnection();

	//verwijder van de tabel patient waar het id is id//
	$sql = "DELETE FROM patient WHERE id=:id ";
	// query voorbereiden//
	$query = $db->prepare($sql);
	//exuteert de query en :id = $id
	$query->execute(array(
		':id' => $id));

	//zet de database op 0//
	$db = null;
}

//maak patienten functie
function createPatient($name, $species, $gender, $status, $client) 
{	
	//database connectie//
	$db = openDatabaseConnection();

	// plaats in het tabel patient de naam, species, gender, status en client_id met de volgende values
	$sql = "INSERT INTO patient(name, species, gender, status, client_id) VALUES (:name, :species, :gender, :status, :client)";
	// query voorbereiden//
	$query = $db->prepare($sql);
	//exuteert de query en met de array's
	$query->execute(array(
		':name' => $name,
		':species' => $species,
		':gender' => $gender,
		':status' => $status,
		':client' => $client));
//zet de database op 0//
	$db = null;
}

//maak veranderen patient functie
function editPatient ($id)
{
	//database connectie//
	$db = openDatabaseConnection();

	// selecteer van table patient waar het id is id
	$sql = "SELECT * FROM patient WHERE id=:id";
	// query voorbereiden//
	$query = $db->prepare($sql);
	//exuteert de query en :id = $id
	$query->execute(array(
		':id' => $id
		));
	//zet de database op 0//
	$db = null;

	// neem alles van patients uit de database
	$patients = $query->fetchAll();

// return patients
	return $patients;
}

// veranderde patient opslaan
function editPatientSave($id, $name, $species, $gender, $status, $client)
{
	//database connectie//
	$db = openDatabaseConnection();
// update in het tabel patient waar alles gezet is//
	$sql = "UPDATE patient SET name=:name, species=:species, gender=:gender, status=:status, client_id=:client WHERE id=:id";
	//query voorbereiden//
		$query = $db->prepare($sql);
	// query excuteren met de volgende array's//
		$query->execute(array(
		':id' => $id,
		':name' => $name,
		':species' => $species,
		':gender' => $gender,
		':status' => $status,
		':client' => $client));

	//zet database op 0//
	$db = NULL;
}
