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


	
	if (strlen($name) == 0 && strlen($name) == 0 && strlen($name) == 0) {
		return false;
	}
	
	$db = openDatabaseConnection();

	$sql = "INSERT INTO patient(name, species, gender, status) VALUES (:name, :species, :gender, :status)";
	$query = $db->prepare($sql);
	$query->execute(array(
		':name' => $name,
		':species' => $species,
		':gender' => $gender,
		':status' => $status));

	$db = null;
	
	return true;
}

function updatePatient($id, $name, $species, $gender, $status) 
{
	$db = openDatabaseConnection();

		$query = "UPDATE patient SET name='$name', species='$species', gender='$gender, status=$status' where id=$id";
		$result = $db->query($query);

	$db = null;

}

function showUpdatePatient(){
	$patient = NULL;
		$db = openDatabaseConnection();
		$id = $_GET['id'];

		$query=$db->prepare("SELECT * FROM patient WHERE id=$id");
		$query->execute(array($patient));
		var_dump($id);
		var_dump($patient);

	}

