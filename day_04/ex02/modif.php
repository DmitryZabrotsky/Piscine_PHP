<?php
$flag = 0;
	if ($_POST['login'] != '' && $_POST['oldpw'] != '' && $_POST['newpw'] != '' && $_POST['submit'] == 'OK')
	{
		$passwd = unserialize(file_get_contents('../private/passwd'));
		foreach($passwd as $key => $user)
		{
			if ($user['login'] == $_POST['login'])
			{
				if ($user['passwd'] == hash('whirlpool', $_POST['oldpw']))
				{
					$passwd[$key]['passwd'] = hash('whirlpool', $_POST['newpw']);
					$flag = 1;
				}
			}
			if ($flag == 1)
			{
				file_put_contents('../private/passwd', serialize($passwd));
				echo "OK\n";
			}
			else
				exit ("ERROR\n");
		}
	}
	else
		exit ("ERROR\n");
?>
