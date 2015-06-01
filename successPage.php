<?php 
	session_start();
	require_once('login_connection.php');
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Login Successful</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="loginStyling.css">
</head>
<body class="successBody">
	<div class="fluidcontainer">
		<div class="row header">
			<div class="col-md-2">
				<h3 class="text-center">Your Wall</h3>
			</div>
			<div class="col-md-6"></div>
			<div id="userName" class="col-md-2">
				<h4 class="text-right">Hello <?=$_SESSION['user_name']?></h4>
			</div>
			<div id="logOut" class="col-md-2">
				<a id="logoutLink" href="loginProcess.php">Log Out</a>
			</div>
		</div>
		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-7">
				<div id="messageArea">
					<h4>Post a message</h4>
					<form action="messageProcess.php" method="post">
						<input type="hidden" name="action" value="message">
						<textarea id="messageText" name="messagePost"></textarea>
						<input id="messageSubmitButton" type="submit" value="Post Message">
					</form>
				</div>
			</div>
			<div class="col-md-2"></div>
		</div>
		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-7">
				<?php 
					$query = "SELECT users.first_name, users.last_name, messages.id as message_id, DATE_FORMAT(messages.created_at, '%M %D %Y') as created_at, messages.message FROM messages
					JOIN users ON messages.user_id = users.id  
					ORDER BY messages.id DESC";

					$result = fetch_all($query);
					if($result>0){
						foreach ($result as $key1 => $value1) { ?>
							<div class="postDiv">
								<h4 class="poster"><?=$result[$key1]['first_name']?> <?=$result[$key1]['last_name']?></h4>
								<h5 class="postTime"><?=$result[$key1]['created_at']?><h5>
								<p class="messageText"><?=$result[$key1]['message'];?></p>
								<?php 
									if($_SESSION['user_name']===$result[$key1]['first_name']){
								 ?>
								 	<form id="deleteForm" action="messageProcess.php" method="post">
									 	<input type="hidden" name="action" value="deleteMessage">
									 	<input type="hidden" name="deleteThis" value="<?=$result[$key1]['message_id']?>">
									 	<input class="button buttonRight" type="submit" value="delete">
									</form>
								<?php } ?>
								<div class="row">
									<?php
										$commentQuery = "SELECT comments.comment, comments.id as comment_id, users.first_name, users.last_name, DATE_FORMAT(comments.created_at, '%M %D %Y') as created_at FROM comments
										JOIN users ON comments.user_id = users.id
										WHERE comments.message_id = {$result[$key1]['message_id']}
										ORDER BY comments.created_at";

										$commentResult = fetch_all($commentQuery);
										if($commentResult>0){
											foreach ($commentResult as $key2 => $value2){ ?>
											<div class="col-md-2"></div>
											<div class="col-md-10 comment">
												<p id="red"><span><?=$commentResult[$key2]['first_name'];?> <?=$commentResult[$key2]['last_name'];?></span> - <?=$commentResult[$key2]['created_at'];?> </p>
												<p><?=$commentResult[$key2]['comment'];?></p>
												<?php
													if($_SESSION['user_name']===$commentResult[$key2]['first_name']) {
												 ?>
												 <form id="deleteForm" action="messageProcess.php" method="post">
												 	<input type="hidden" name="action" value="deleteComment">
												 	<input type="hidden" name="deleteThis" value="<?=$commentResult[$key2]['comment_id']?>">
												 	<input class="button buttonRight" type="submit" value="delete">
												 </form>
												 <?php } ?>
											</div>


											<?php } ?>
										<?php } ?>
								</div>
								<div class="row">
									<div class="col-md-6"></div>
									<div class="col-md-4">
										<h4 class="text-left" id="postAComment">Post a comment</h4>
									</div>
								</div>
								<form class="text-left" action="messageProcess.php" method="post">
									<input type="hidden" name="action" value="comment">
									<input type="hidden" name="message_id" value="<?=$result[$key1]['message_id'];?>">
									<div class="row">
										<div class="col-md-6"></div>
										<div class="col-md-6">
											<textarea id="commentText" name="commentPost"></textarea>
										</div>
									</div>
									<div class="row">
										<div class="col-md-9"></div>
										<div class="col-md-3 text-right">
											<input class="button" type="submit" value="Comment">
										</div>
									</div>
								</form>
				 			</div>
				 		<?php } ?>
				 	<?php } ?>
			</div>
		</div>
	</div>
</body>
</html>