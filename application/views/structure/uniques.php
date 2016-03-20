<html>
<head></head>
<body>
	<h1><?=$title?></h1>

	<table>
		<thead>
			<th>make</th><th>model</th><th>year</th><th>trim</th><th>count</th>
		</thead>
		<tbody>
			<?
			foreach($result as $v=>$obj){
				?>
				<tr><td><?=$obj->make?></td><td><?=$obj->model?></td><td><?=$obj->year?></td><td><?=$obj->trim?></td><td><?=$obj->count?></td></tr>
				<?
			}
			?>
		</tbody>
	</table>

</body>
</html>