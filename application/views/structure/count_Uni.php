<html>
<head></head>
<body>
	<h1><?=$title?></h1>

	<table>
		<thead>
			<th>make</th><th>count</th>
		</thead>
		<tbody>
			<?
			foreach($result as $v=>$obj){
				?>
				<tr><td><?=$obj->make?></td><td><?=$obj->count?></td></tr>
				<?
			}
			?>
		</tbody>
	</table>

</body>
</html>