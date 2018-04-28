<?php
	function openmysqlconnection()
	{
		$conn = mysqli_connect('127.0.0.1', 'root', '', 'dulalbus');
		if(!$conn)
		{
			return null;
		}
		return $conn;
	}
	function closemysql($conn)
	{
		mysqli_close($conn);
	}
	function getBusName($conn, $id)
	{
		$sql = "SELECT busname from busid where busid = '" . $id . "'";
		$result = mysqli_query($conn, $sql);
		$row = mysqli_fetch_assoc($result);
		return $row['busname'];
	}
	function getBusId($conn, $name)
	{
		$sql = "SELECT busid from busid where busname = '" . $name . "'";
		$result = mysqli_query($conn, $sql);
		$row = mysqli_fetch_assoc($result);
		return $row['busid'];
	}
	function addDropdown()
	{
		$conn = openmysqlconnection();
		$sql = "SELECT distinct busid FROM businfo";
		$result = mysqli_query($conn, $sql);
		if(mysqli_num_rows($result)>0)
		{
			while($row = mysqli_fetch_assoc($result))
			{
				echo "<a href='Anando.php?var=".getBusName($conn, $row['busid'])."'>" . getBusName($conn, $row['busid']) . "</a><br>";
			}
		}
		closemysql($conn);
	}
	function setTitle($var)
	{
		echo "<title>".$var."</title>";
	}
	function setBackground($bname)
	{
		$conn = openmysqlconnection();
		$sql = "SELECT path FROM imagepath where busid = '".getBusId($conn, $bname)."'";
		$result = mysqli_query($conn, $sql);
		$row = mysqli_fetch_assoc($result);
		echo "background-image: url('".$row['path']."');";
		closemysql($conn);
	}
?>
