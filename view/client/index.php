<h1>Clients</h1>
	<p class="options"><a href="<?= URL ?>client/create">create</a></p>
	<table>
		<thead>
			<tr>
				<th>Name</th>
				<th>Lastname</th>
				<th>Address</th>
			</tr>
		</thead>
		</tbody>
<?php
	foreach($clients as $client):
?>
			<tr>
				<td><?=$client['name']?></td>
				<td><?=$client['lastname']?></td>
				<td><?=$client['address']?></td>
				<td class="center"><a href="<?= URL ?>client/edit/<?= $client['id'] ?>">edit</a></td>
				<td class="center"><a href="<?= URL ?>client/delete/<?= $client['id'] ?>">delete</a></td>
			</tr>

<?php
	endforeach;
?>
		</tbody>
	</table>