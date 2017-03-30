
<?php

require(ROOT . "model/ClientModel.php");

function index()
{
	$clients = getAllClients();

	render("client/index", array(
		'clients' => $clients) );
}

function delete($id)
{
	if (isset($id)) {
		deleteClient($id);
	}

	header("Location:" . URL . "client/index");
}

function create()
{
	//formulier tonen
	render("client/create");
}

function createSave()
{

	if (isset($_POST['name']) && isset($_POST['address'])) {
		createClient($_POST['name'], $_POST['address']);
	}

	header("Location:" . URL . "client/index");
}

function edit($id)

{
	$clients = editClient($id);
	render("client/edit", array(
		'clients' => $clients));
}

function editSave()
{
	if (isset($_POST['name']) && isset($_POST['address'])) {
		createClient($_POST['name'], $_POST['address']);
	}

	header("Location:" . URL . "client/index");
}