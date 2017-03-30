<?php

function getAllPatients()
{
	$db = opendatabaseConnection();

	$sql = "SELECT * FROM patient";
	$query = $db->prepare($sql);
	$query->execute();

	$db = NULL;

	$patients = $query -> fetchAll();
	return $patients;
}

function deletePatient($id) 
{
	
	$db = openDatabaseConnection();

	$sql = "DELETE FROM patient WHERE id=:id ";
	$query = $db->prepare($sql);
	$query->execute(array(
		':id' => $id));

	$db = null;
}

function createPatient() 
{
	$name = isset($_POST['name']) ? $_POST['name'] : null;
	$species = isset($_POST['species']) ? $_POST['species'] : null;
	$gender = isset($_POST['gender']) ? $_POST['gender'] : null;
	$status = isset($_POST['status']) ? $_POST['status'] : null;
	$client = isset($_POST['client']) ? $_POST['client'] : null;


	
	if (strlen($name) == 0 && strlen($name) == 0 && strlen($name) == 0) {
		return false;
	}
	
	$db = openDatabaseConnection();

	$sql = "INSERT INTO patient(name, species, gender, status, client_id) VALUES (:name, :species, :gender, :status, :client_id)";
	$query = $db->prepare($sql);
	$query->execute(array(
		':name' => $name,
		':species' => $species,
		':gender' => $gender,
		':status' => $status,
		':client_id' => $client));

	$db = null;
	
	return true;
}

function editPatient ($id)
{
	$db = openDatabaseConnection();

	$sql = "SELECT * FROM patient WHERE id=:id";
	$query = $db->prepare($sql);
	$query->execute(array(
		':id' => $id
		));

	$db = null;

	$patients = $query->fetchAll();

	return $patients;
}

function editPatientSave($id, $name, $species, $gender, $status, $client)
{
	$db = openDatabaseConnection();

	$sql = "UPDATE patient SET name=:name, species=:species, gender=:gender, status=:status, client_id=:client_id WHERE id=:id";
		$query = $db->prepare($sql);
		$query->execute(array(
		':id' => $id,
		':name' => $name,
		':species' => $species,
		':gender' => $gender,
		':status' => $status,
		':client_id' => $client));

	$db = NULL;
}

function sortPatients()
{
	$db = openDatabaseConnection();

	if (isset($_GET['sort'])){

	if ($_GET['sort'] == 'name')
	{
		$query .= " ORDER BY name";
	} 
	 	elseif ($_GET['sort'] == 'species')
	{
	 	$query .= " ORDER BY species";
	} 
	elseif ($_GET['sort'] == 'gender')
	{
	$query .= " ORDER BY gender";
		}
	}

	$result = $db->query($query);
	$patients = $result->fetch_all(MYSQLI_ASSOC);

}

