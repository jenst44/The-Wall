<?php 
	session_start();
	require_once('login_connection.php');

	if(isset($_POST['action']) && $_POST['action'] == 'login')
	{
		login_user($_POST, $connection);

	}

	elseif(isset($_POST['action']) && $_POST['action'] == 'register')
	{

		register_user($_POST, $connection);
	}

	else
	{
		session_destroy();
		header("Location:loginPage.php");
	}

	function login_user($post, $connection)
	{
		$_SESSION['loginErrors'] = array();

		$email = strtolower($post['email']);
		$query = "SELECT * FROM users WHERE users.password = '{$post['password']}' AND users.email = '$email'";
		$result = fetch_all($query);
		
		if(count($result)===0){
			$_SESSION['loginErrors'][] = "Email or Password not found";
		}

		if(count($_SESSION['loginErrors'])>0)
		{

			header("Location:loginPage.php");
		}

		if(count($result)>0) {
			$_SESSION['user_name'] = $result[0]['first_name'];
			$_SESSION['user_id'] = $result[0]['id'];
			header("Location: successPage.php");
		}
	}

	function register_user($post, $connection)
	{
		$_SESSION['registerErrors'] = array();

		if(empty($post['first_name']))
		{
			$_SESSION['registerErrors'][] = "First Name cannot be blank";
		}

		if(empty($post['last_name']))
		{
			$_SESSION['registerErrors'][] = "Last Name cannot be blank";
		}

		if(empty($post['email']))
		{
			$_SESSION['registerErrors'][] = "Email cannot be blank";
		}

		if(empty($post['password']))
		{
			$_SESSION['registerErrors'][] = "Password cannot be blank";
		}

		elseif(strlen($post['password'])<6) {
			$_SESSION['registerErrors'][] = "Password cannot be less than six characters";
		}

		if($post['password'] != $post['confirm_password'])
		{
			$_SESSION['registerErrors'][] = "Passwords don't match";
		}

		$firstQuery = "SELECT * FROM users WHERE users.email = '{$post['email']}'";
		$result = fetch_all($firstQuery);
		
		if(count($result)>0)
		{
			$_SESSION['registerErrors'][] = "Email already exists";
		}


		if(count($_SESSION['registerErrors'])>0)
		{
			header("Location:loginPage.php");
		} 
		else 
		{
			$firstname = ucwords(strtolower($post['first_name']));
			$lastname = ucwords(strtolower($post['last_name']));
			$email = strtolower($post['email']);
			$query = "INSERT INTO users (first_name, last_name, email, password, created_at, updated_at) 
			VALUES ('$firstname', '$lastname', '$email', '{$post['password']}', NOW(), NOW())";

			mysqli_query($connection, $query);
			$setQuery = "SELECT * FROM users WHERE users.email = '$email'";
			$newResult = fetch_all($setQuery);

			$_SESSION['user_name'] = $firstname;
			$_SESSION['user_id'] = $newResult[0]['id'];
			header('Location:successPage.php');
		}
	}
 ?>




