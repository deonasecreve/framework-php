<h1>Edit species</h1>
	<form action="<?= URL ?>species/editSave" method="post">
		<div>
			<input type="hidden" name="id" value="<?= $species[0]['id'] ?>">
			<label for="name">Name:</label>
			<input type="text" id="name" name="name" value="<?= $species[0]['name'] ?>">
		</div>
		<div>
			<label for="name">Species:</label>
			<input type="text" id="species" name="species" value="<?= $species[0]['species'] ?>">
		</div>
		<div>
			<label for="breed">breed:</label>
			<textarea id="breed" name="breed"></textarea>
		</div>
		<div>
			<label></label>
			<input type="submit" value="Save">
		</div>
	</form>