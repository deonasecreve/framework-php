<h1>Edit patiënt</h1>
	<form action="<?= URL ?>patient/editSave" method="post">
		<div>
			<input type="hidden" name="id" value="<?=$patient['id']?>">
			<label for="name">Name:</label>
			<input type="text" id="name" name="name" value="<?=$patient['name']?>">
		</div>
		<div>
			<label for="species">Species:</label>
			<select name="species">
  				<option value="cat">Cat</option>
  				<option value="dog">Dog</option>
  				<option value="fish">Fish</option>
  				<option value="hamster">Hamster</option>
			</select>
		</div>
		<div>
			<label for="gender">Gender:</label>
			<input type="radio" id="male" name="gender" value="0"> Male
  			<input type="radio" id="female" name="gender" value="1"> Female
		</div>
		<div>
			<label for="name">Status:</label>
			<textarea id="status" name="status"><?=$patient['status']?></textarea>
		</div>
		<div>
			<label></label>
			<input type="submit" value="Save">
		</div>
	</form>