<?php

	if ($_POST['login'] != '' && $_POST['passwd'] != '' && $_POST['submit'] == 'OK')
	{
		if (!file_exists('../private/passwd')) {
				mkdir('../private', 0777);
		}
		if (($array = file_get_contents('../private/passwd')) === FALSE) {
			$user['login'] = $_POST['login'];
			$user['passwd'] = hash('whirlpool', $_POST['passwd']);
			$array[] = $user;
			file_put_contents('../private/passwd', serialize($array));
			echo "OK\n";
		}
		else {
			$array = unserialize(file_get_contents('../private/passwd'));
			foreach($array as $keypair) {
				if ($keypair['login'] == $_POST['login']) {
					exit ("ERROR\n");
				}
			}
			$user['login'] = $_POST['login'];
			$user['passwd'] = hash('whirlpool', $_POST['passwd']);
			$array[] = $user;
			file_put_contents('../private/passwd', serialize($array));
			echo "OK\n";
		}
	}
	else
		exit ("ERROR\n");
?>
