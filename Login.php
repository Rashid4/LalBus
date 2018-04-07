<!DOCTYPE html>
<html>
	<head>
		<title>Log in</title>
		<style>
			body{
				background-color: lightgreen;
				font-size: 100%
			}
			input[type=text]{
				padding: 5px;
				margin: 8px;
				border: 1px solid black;
				border-radius: 5px;
			}
			input[type=text]:focus{
				background-color: lightgray;
			}
			input[type=button]{
				background-color: azure;
				padding: 10px;
				border: 2px solid darkred;
			}
			input[type=button]:hover{
				background-color: cyan;
			}
		</style>
	</head>
	<body>
		<h1><font color="white">Login title</font></h1>
		<form>
			<table>
				<tr>
					<td><input type="button" name="Sign_up" onclick="location.href='Registration.php';" value="Register"/></td>
				</tr>
				<tr>
					<td align="right">Name:</td>
					<td align="left"><input type="text" name="user_name" size="20"/></td>
				</tr>
				<tr>
					<td align="right">E-mail:</td>
					<td align="left"><input type="text" name="gmail" size="20"/></td>
				</tr>
				<tr>
					<td align="right">Registered?</td>
					<td align="left"><input type="button" onclick="location.href='index.php';" value="Sign in"/></td>
				</tr>
			</table>
		</form>
	</body>
</html>
