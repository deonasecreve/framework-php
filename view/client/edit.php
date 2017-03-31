<h1>Edit Client</h1>
	<form action="<?= URL ?>client/editSave" method="post">
		<div>
			<input type="hidden" name="id" value="<?=$client[0]['id']?>">
			<label for="name">Name:</label>
			<input type="text" id="name" name="name" value="<?=$clients[0]['name']?>">
		</div>
		<div>
			<label for="lastname">Lastname:</label>
			<input type="text" id="lastname" name="lastname" value="<?=$clients[0]['lastname']?>">
		</div>
		<div>
			<label for="address">Address:</label>
			<input type="text" id="address" name="address" value="<?=$clients[0]['address']?>">
		</div>
		<div>
			<label></label>
			<input type="submit" value="Save">
		</div>
	</form>