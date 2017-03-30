<?php

function getAllClients()
{
	$db = opendatabaseConnection();

	$sql = "SELECT * FROM client";
	$query = $db->prepare($sql);
	$query->execute();

	$db = NULL;

	$clients = $query -> fetchAll();
	return $clients;
}

function deleteClient($id) 
{
	
	$db = openDatabaseConnection();

	$sql = "DELETE FROM client WHERE id=:id ";
	$query = $db->prepare($sql);
	$query->execute(array(
		':id' => $id));

	$db = null;
}

function createClient() 
{
	$name = isset($_POST['name']) ? $_POST['name'] : null;
	$address = isset($_POST['address']) ? $_POST['address'] : null;

	
	if (strlen($name) == 0 && strlen($name) == 0 && strlen($name) == 0) {
		return false;
	}
	
	$db = openDatabaseConnection();

	$sql = "INSERT INTO client(name, address) VALUES (:name, :address)";
	$query = $db->prepare($sql);
	$query->execute(array(
		':name' => $name,
		':address' => $address));

	$db = null;
	
	return true;
}

function editClient ($id)
{
	$db = openDatabaseConnection();

	$sql = "SELECT * FROM client WHERE id=:id";
	$query = $db->prepare($sql);
	$query->execute(array(
		':id' => $id
		));

	$db = null;

	$clients = $query->fetchAll();

	return $clients;
}

function editClientSave($id, $name, $address)
{
	$db = openDatabaseConnection();

	$sql = "UPDATE client SET name=:name, address=:address WHERE id=:id";
		$query = $db->prepare($sql);
		$query->execute(array(
		':id' => $id,
		':name' => $name,
		':address' => $address,
	));

	$db = NULL;
}