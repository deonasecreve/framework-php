<?php

require(ROOT . "model/ClientModel.php");
require(ROOT . "model/PatientModel.php");
require(ROOT . "model/SpeciesModel.php");


// functie van de index
function index()
{
	// van variabele patienten haal alle patienten op
	$patients = getAllPatients();
	// ga naar de pagina patient/index als alle patienten zijn opgehaald
	render("patient/index", array(
		'patients' => $patients) );
}

// functie van delete
function delete($id)
{
	// als het id gezet is dan de functie deletePatient aanroepen en daarvan het id
	if (isset($id)) {
		deletePatient($id);
	}

	header("Location:" . URL . "patient/index");
}

// functie maken
function create()
{
	// neem alle clienten
	$clients = getAllClients();
	// neem alle species
	$species = getAllSpecies();

	// als dat gedaan is ga naar patient/create waar de clients en de species te zien zijn
	render("patient/create", array(
		'clients' => $clients,
		'species' => $species,
	));

}

// gemaakt opslaan
function createSave()
{
	// als alles gezet is en gepost ga dan naar createPatients en maak de nieuwe patient aan//
	if (isset($_POST['name']) && isset($_POST['species']) && isset($_POST['gender']) && isset($_POST['status']) && isset($_POST['client'])){
		createPatient($_POST['name'], $_POST['species'], $_POST['gender'], $_POST['status'], $_POST['client']);

	}
// als dat gedaan is ga naar patient/index
	header("Location:" . URL . "patient/index");
}

//functie veranderen
function edit($id)

// neem alle clients
// neem editpatient van het id
// neem alle species
{
	$clients = getAllClients();
	$patients = editPatient($id);
	$species = getAllSpecies();
	
	// als het gedaan is ga naar patient/edit waar alle clients, het patient wat je wil editen en species te zien zijn
	render("patient/edit", array(
		'clients' => $clients,
		'patients' => $patients,
		'species' => $species
	));
}

// functie edit opslaan
function editSave()
{
	// als alles gezet en gepost is ga dan naar editpatient save en post alles wat ge-edit is.
	if (isset($_POST['name']) 
		&& isset($_POST['species']) 
		&& isset($_POST['gender']) 
		&& isset($_POST['status']) 
		&& isset($_POST['client'])) 
	{
		editPatientSave($_POST['id'], $_POST['name'], $_POST['species'], $_POST['gender'], $_POST['status'], $_POST['client']);
	}
// ga daarna naar patient/index
	header("Location:" . URL . "patient/index");
}
