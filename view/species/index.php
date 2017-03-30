
<h1>Species</h1>
	<p class="options"><a href="<?= URL ?>species/create">create</a></p>
	<!--Make a table for the name, species and breed-->
	<table>
		<thead>
			<tr>
				<th>Name</th>
				<th>Species</th>
				<th>Breed</th>
				<th></th>
				<th></th>
			</tr>
		</thead>
		</tbody>
<!--Foreach spe-->

<?php
	foreach($species as $race):
?>
			<tr>
				<td><?=$race['name']?></td>
				<td><?=$race['species']?></td>
				<td><?=$race['breed']?></td>
				<td class="center"><a href="<?= URL ?>species/edit/<?= $race['id'] ?>">edit</a></td>
				<td class="center"><a href="<?= URL ?>species/delete/<?= $race['id'] ?>">delete</a></td>
			</tr>

<?php
	endforeach;
?>
		</tbody>
	</table>