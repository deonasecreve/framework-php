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
	$lastname = isset($_POST['lastname']) ? $_POST['lastname'] : null;
	$address = isset($_POST['address']) ? $_POST['address'] : null;

	
	if (strlen($name) == 0 && strlen($name) == 0 && strlen($name) == 0) {
		return false;
	}
	
	$db = openDatabaseConnection();

	$sql = "INSERT INTO client(name, lastname, address) VALUES (:name, :lastname, :address)";
	$query = $db->prepare($sql);
	$query->execute(array(
		':name' => $name,
		':lastname' => $lastname,
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

function editClientSave($id, $name, $lastname, $address)
{
	$db = openDatabaseConnection();

	$sql = "UPDATE client SET name=:name, lastname=:lastname, address=:address WHERE id=:id";
		$query = $db->prepare($sql);
		$query->execute(array(
		':id' => $id,
		':name' => $name,
		':lastname' => $lastname,
		':address' => $address
	));

	$db = NULL;
}