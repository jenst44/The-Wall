<?php 
session_start();
require_once('login_connection.php');

if(isset($_POST['action']) && $_POST['action'] == 'message')
{
	if(empty($_POST['messagePost']))
	{
		header("Location:successPage");
	} 
	else 
	{
		$message = mysqli_real_escape_string($connection, $_POST['messagePost']);
		$user_id = $_SESSION['user_id'];
		$query = "INSERT INTO messages (message, user_id, created_at, updated_at) VALUE ('$message', '$user_id', NOW(), NOW())";
		mysqli_query($connection, $query);
		header("Location:successPage");
	}
}

if(isset($_POST['action']) && $_POST['action'] == 'comment')
{
	if(empty($_POST['commentPost']))
	{
		header("Location:successPage");
	}
	else
	{
		$query = "SELECT users.id as user_id, messages.id as message_id FROM users
						JOIN messages ON users.id = messages.user_id";
		$result = fetch_all($query);
		$user_id = $_SESSION['user_id'];
		$message_id = $_POST['message_id'];
		
		//Figure out how to get the message_id from the post you clicked on!//

		$comment = mysqli_real_escape_string($connection, $_POST['commentPost']);
		$query = "INSERT INTO comments (comment, user_id, message_id, created_at, updated_at) VALUE ('$comment', '$user_id', '$message_id', NOW(), NOW())";

		mysqli_query($connection, $query);
		header("Location:successPage");
	}
}

if(isset($_POST['action']) && $_POST['action'] == 'deleteComment')
{
	$whereToDelete = $_POST['deleteThis'];
	$deleteQuery = "DELETE FROM comments WHERE id='$whereToDelete'";
	mysqli_query($connection, $deleteQuery);

}

if(isset($_POST['action']) && $_POST['action'] == 'deleteMessage')
{
	$whereToDelete = $_POST['deleteThis'];
	$deleteQuery = "DELETE FROM messages WHERE id='$whereToDelete'";
	mysqli_query($connection, $deleteQuery);

}

header("Location:successPage.php");


 ?>