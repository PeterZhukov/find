<form>
<input type="text" name="find" value="<?if (isset($_REQUEST['find'])){ echo $_REQUEST['find'];};?>"><br>
<input type="submit" value="Найти">
<?php

if (isset($_REQUEST['find'])){
	$inputFind = $_REQUEST['find'];
	$find = '';
	for($i = 0; $i < strlen($inputFind); $i++){
		if ($inputFind[$i] == '-'){
			$find .= '\\-';
		} else {
			$find .= $inputFind[$i];
		}
	}
	$command = 'grep -irl "'.$find.'" ./';
	echo $command."<br>";
	ob_start();
	passthru($command);
	$content = ob_get_clean();
	echo nl2br($content);
}
