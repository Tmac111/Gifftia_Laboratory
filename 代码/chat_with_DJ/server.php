
<?PHP
	echo "ok";
	$playPos=$_GET['playPos'];
	
	
	switch ($playPos)
	{
		case "pos_1":
			echo "<li>总经理</li>";
			echo "<li>副总经理</li>";break;
		case "pos_2":
			echo "<li>研发工程师</li>";
			echo "<li>测试工程师</li>";break;
		case "pos_3":
			echo "<li>主任</li>";
			echo "<li>会计</li>";break;
		}
?>
