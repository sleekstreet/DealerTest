<html>


<head></head>

<body>
	<h1><?=$title?></h1>
	<h3>Result count: <?=$length?></h3>
	<table>
		<thead><th>Year</th><th>Make</th><th>Model</th><th>Trim</th></thead>
		<tbody>
		<?
			foreach($result as $v=>$obj){
				?>
				<tr><td><?=$obj->year?></td><td><?=$obj->make?></td><td><?=$obj->model?></td><td><?=$obj->trim?></td></tr>
				<?
			}
		?>
		</tbody>
	</table>
</body>
</html>