<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<?php 
	if(!isset($_GET['msgid']) || $_GET['msgid'] == NULL){
	
		//header("Location:catlist.php");
	} else {
		$id = $_GET['msgid'];
	}
?>
<div class="grid_10">

	<div class="box round first grid">
		<h2>Replay Message</h2>
		
<?php 
 if($_SERVER['REQUEST_METHOD'] == 'POST'){
	$to 	 = $fm->validation($_POST['toEmail']);
	$from 	 = $fm->validation($_POST['fromEmail']);
	$subject = $fm->validation($_POST['subject']);
	$message = mysqli_real_escape_string($_POST['message']);
	
	$sendmail = mail($to, $subject, $message, $from);
	if($sendmail){
		echo "<span class='success'>Message Send Successfully.</span>";
	}else{
		echo "<span class='error'>Something went Wrong.</span>";
	}
 }
?>
		
		<div class="block">               
		 <form action="" method="post">
		 		<?php
					$query = "select * from  tbl_conact where id='$id'";
					$mgs = $db->select($query);
					if($mgs){
						while ($result = $mgs->fetch_assoc()){		
				?>
			<table class="form">
			   
				<tr>
					<td>
						<label>To</label>
					</td>
					<td>
						<input type="text" readonly name="toEmail" value="<?php echo $result['email'];?>" class="medium" />
					</td>
				</tr>
				<tr>
					<td>
						<label>From</label>
					</td>
					<td>
						<input type="text" name="fromEmail" placeholder="Please Enter your Email Address" class="medium" />
					</td>
				</tr>
				<tr>
					<td>
						<label>Subject</label>
					</td>
					<td>
						<input type="text" name="subject" placeholder="Please Enter your Subject" class="medium" />
					</td>
				</tr>

				<tr>
					<td>
						<label>Message</label>
					</td>
					<td>
						<textarea class="tinymce" name="message">
							
						</textarea>
					</td>
				</tr>
				
				<tr>
					<td></td>
					<td>
						<input type="submit" name="submit" Value="Send" />
					</td>
				</tr>
			</table>
				<?php } } ?>
			</form>
		</div>
	</div>
<!-- Load TinyMCE -->
<script src="js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>
<script type="text/javascript">
	$(document).ready(function () {
		setupTinyMCE();
		setDatePicker('date-picker');
		$('input[type="checkbox"]').fancybutton();
		$('input[type="radio"]').fancybutton();
	});
</script>
<!-- Load TinyMCE -->
<?php include 'inc/footer.php'; ?>



