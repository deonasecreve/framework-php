<?php

function getAllSpecies()
{
	$db = opendatabaseConnection();

	$sql = "SELECT * FROM species";
	$query = $db->prepare($sql);
	$query->execute();

	$db = NULL;

	$species = $query -> fetchAll();
	return $species;
}

function deleteSpecies($id) 
{
	
	$db = openDatabaseConnection();

	$sql = "DELETE FROM species WHERE id=:id ";
	$query = $db->prepare($sql);
	$query->execute(array(
		':id' => $id));

	$db = null;
}

function createSpecies() 
{
	$name = isset($_POST['name']) ? $_POST['name'] : null;
	$species = isset($_POST['species']) ? $_POST['species'] : null;
	$breed = isset($_POST['breed']) ? $_POST['breed'] : null;

	
	if (strlen($name) == 0 && strlen($name) == 0 && strlen($name) == 0) {
		return false;
	}
	
	$db = openDatabaseConnection();

	$sql = "INSERT INTO species(name, species, breed) VALUES (:name, :species, :breed)";
	$query = $db->prepare($sql);
	$query->execute(array(
		':name' => $name,
		':species' => $species,
		':breed' => $breed));

	$db = null;
	
	return true;
}

function editSpecies ($id)
{
	$db = openDatabaseConnection();

	$sql = "SELECT * FROM species WHERE id=:id";
	$query = $db->prepare($sql);
	$query->execute(array(
		':id' => $id
		));

	$db = null;

	$species = $query->fetchAll();

	return $species;
}

function editSpeciesSave($id, $name, $species, $breed)
{
	$db = openDatabaseConnection();

	$sql = "UPDATE client SET name=:name, species=species, breed=:breed WHERE id=:id";
		$query = $db->prepare($sql);
		$query->execute(array(
		':id' => $id,
		':name' => $name,
		':species' => $species,
		':breed' => $breed
	));

	$db = NULL;
}