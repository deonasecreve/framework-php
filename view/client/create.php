<h1>New client</h1>
	<form action="<?= URL ?>client/createSave" method="post">
		<div>
			<label for="name">Name:</label>
			<input type="text" id="name" name="name">
		</div>
		<div>
			<label for="lastname">Lastname:</label>
			<input type="text" id="lastname" name="lastname">
		</div>
		<div>
			<label for="address">Address:</label>
			<input type="text" id="address" name="address">
		</div>
		<div>
			<label></label>
			<input type="submit" value="Save">
		</div>
	</form>