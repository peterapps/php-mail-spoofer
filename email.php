<?php
//Email Spoofer

if(isset($_GET['send']) && isset($_POST['to']) && isset($_POST['from']) && isset($_POST['fromname']) && isset($_POST['subject']) && isset($_POST['message']))
{
	$headers = 'From: '.$_POST['fromname'].' <'.$_POST['from'].'>' . "\r\n" .
	    'Reply-To: '. $_POST['from'] . "\r\n";

	$mail = mail($_POST['to'],$_POST['subject'],$_POST['message'],$headers);
	
	if($mail)
	{
		$mail = '<div style="color:green">Mail sent.</div>';
	} else {
		$mail = '<div style="color:red">Error</div>';
	}
} elseif (isset($_GET['send'])) {
	if(!isset($mail))
	{
		$mail = '<div style="color:red">Fill in all inputs</div>';
	}
} else {
	$mail = '';	
}



?>
<!DOCTYPE html>
<html>
	<head>
		<title>Email Spoofer</title>
		<style>
			body {
				font-family: sans-serif;
			}
		</style>
	</head>
	<body>
		<h1>Email Spoofer</h1>
		<?php echo $mail; ?>
		<form action="?send=1" method="post">
			<table border="0">
				<tr>
					<td>To: </td>
					<td><input type="text" name="to"></td>
				</tr>
				
				<tr>
					<td>Fake From Email: </td>
					<td><input type="text" name="from"></td>
				</tr>
				<tr>
					<td>Fake From Name: </td>
					<td><input type="text" name="fromname"></td>
				</tr>
				<tr>
					<td>Subject: </td>
					<td><input type="text" name="subject"></td>
				</tr>
				<tr>
					<td>Message: </td>
					<td><textarea name="message"></textarea></td>
				</tr>
				<tr>
					<td colspan="2">
						<input type="submit" value="Send Email" />
					</td>
				</tr>
			</table>
		</form>
	</body>
</html> 
