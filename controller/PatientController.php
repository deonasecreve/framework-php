<?php

require(ROOT . "model/ClientModel.php");
require(ROOT . "model/PatientModel.php");

function index()
{
	$patients = getAllPatients();

	render("patient/index", array(
		'patients' => $patients) );
}

function delete($id)
{
	if (isset($id)) {
		deletePatient($id);
	}

	header("Location:" . URL . "patient/index");
}

function create()
{
	$clients = getAllClients();
	render("patient/create", array(
		'clients' => $clients
	));

}

function createSave()
{

	if (isset($_POST['name']) && isset($_POST['species']) && isset($_POST['gender']) && isset($_POST['status'])) {
		createPatient($_POST['name'], $_POST['species'], $_POST['gender'], $_POST['species']);
	}

	header("Location:" . URL . "patient/index");
}

function edit($id)

{
	$clients = getAllClients();
	$patients = getAllPatients();
	array('patients' => $patients);
	render("patient/edit", array(
		'clients' => $clients
	));
}

function editSave()
{
	if (isset($_POST['name']) && isset($_POST['species']) && isset($_POST['gender']) && isset($_POST['status'])) {
		createPatient($_POST['name'], $_POST['species'], $_POST['gender'], $_POST['status']);
	}

	header("Location:" . URL . "patient/index");
}

function sortSave()
{
	$patients = sortPatients();
	render("patient/edit", array(
		'patients' => $patients
		));
}