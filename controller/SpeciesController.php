<?php

require(ROOT . "model/SpeciesModel.php");

function index()
{
	$species = getAllSpecies();

	render("species/index", array(
		'species' => $species) );
}

function delete($id)
{
	if (isset($id)) {
		deleteSpecies($id);
	}

	header("Location:" . URL . "species/index");
}

function create()
{
	//formulier tonen
	render("species/create");
}

function createSave()
{

	if (isset($_POST['name']) && isset($_POST['species']) && isset($_POST['breed'])) {
		createClient($_POST['name'], $_POST['species'], $_POST['breed']);
	}

	header("Location:" . URL . "species/index");
}

function edit($id)
{
	$species = editSpecies($id);

	render("species/edit", array(
		'species' => $species));
}

function editSave()
{
	if (isset($_POST['name']) && isset($_POST['species']) && isset($_POST['breed'])) {
		createSpecies($_POST['name'], $_POST['species'], $_POST['breed']);
	}

	header("Location:" . URL . "species/index");
}