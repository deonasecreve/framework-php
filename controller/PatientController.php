<?php

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
	//formulier tonen
	render("patient/create");
}

function createSave()
{

	if (isset($_POST['name']) && isset($_POST['species']) && isset($_POST['gender']) && isset($_POST['status'])) {
		createPatient($_POST['name'], $_POST['species'], $_POST['gender'], $_POST['species']);
	}

	header("Location:" . URL . "patient/index");
}

function edit()

{
	//formulier tonen
	render("patient/edit",array(
	'patients' => showUpdatePatient()
	));
}