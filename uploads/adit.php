<?php
session_start();
if (!isset($_SESSION["id"])) {
	header("Location:index.php");
}
if (isset($_REQUEST['eid'])) {
	$eid = $_REQUEST['eid'];
	include('config.php');
	$sql = "SELECT * FROM `client_info` WHERE cid='$eid'";
	$res = mysqli_query($conn, $sql);
	$row = mysqli_fetch_array($res);
	$a = $row['source'];
	$b = explode(',', $a);
	$d =  $row['lead'];
	$level = $row['Audience'];
	$type = $row['type'];
	$connenction = $row['connenction'];
	$reply = $row['reply'];
	$c = explode(',', $row['dataform']);
}
?>
<!DOCTYPE html>
<html>

<head>
	<title></title>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="image.css">
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<!-- Popper JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
	<style>
		.btns {
			border: 2px solid #000;
			color: #000;
			font-size: 20px;
			font-weight: 600;
			padding: 5px 10px;
			/* width: 120px !important; */
			border-radius: 5px;
			text-decoration: none;
		}

		.btns:hover {
			text-decoration: none;
			color: #000;
		}
	</style>
</head>

<body>
	<div class="container">
		<img src="manas.png" class="img-fluid"><br>
		<a class="btn btns" style="float: right;" href="l	ogout"><i class="fas fa-sign-out-alt"></i> Logout </a>
		<a class="btn btns" href="home">Home</a>
		<a href="notes?id=<?= $_REQUEST['eid'] ?>" class="btn btns">Show History</a>
		<a class="btn btns" href="research?id=<?= $_REQUEST['eid'] ?>">Show Research</a>
        <a class='btns btn' href="javascript:history.back()">Back</a>
		<div class="myform form " style="margin-top: 30px;">
			<form action="edit_profile" method="post">
				<div class="row">
					<div class="col-md-3">
						<div class="form-group">
							<label>First Name</label>
							<input type="text" name="name" value="<?php echo $row['firstname'] ?>" class="form-control my-input" id="name" placeholder="Name">
							<input type="hidden" name="cid" value="<?= $row['cid']; ?>">
						</div>
						<div class="form-group">
							<label>Last Name</label>
							<input type="text" name="lname" value="<?php echo $row['lastname']; ?>" class="form-control my-input" id="email" placeholder="Email">
						</div>
						<div class="form-group">
							<label>Email</label>
							<input type="test" name="email" value="<?php echo $row['email']; ?>" id="phone" class="form-control my-input" placeholder="Phone">
						</div>
						<div class="form-group">
							<label>Contact Number</label>
							<input type="number" name="number" value="<?php echo $row['phone']; ?>" min="0" id="phone" class="form-control my-input" placeholder="Phone">
						</div>
						<div class="form-group">
							<label>Address</label>
							<textarea class="form-control" rows="2" id="comment" name="address"><?php echo $row['address']; ?></textarea>
						</div>
					</div>
					<div class="col-md-3">
						<label class="font-weight-bold">Lead Owener</label>
						<div class="form-check">
							<label class="form-check-label">
								<input type="radio" name="leadowener" value="Rajah Sharma" <?php if (isset($d) && $d == "Rajah Sharma") {
																								echo "checked";
																							} ?> class="form-check-input">Rajah Sharma
							</label>
						</div>
						<div class="form-check">
							<label class="form-check-label">
								<input type="radio" name="leadowener" value="Anmol Nagpal" <?php if (isset($d) && $d == "Anmol Nagpal") {
																								echo "checked";
																							} ?> class="form-check-input">Anmol Nagpal
							</label>
						</div>
						<div class="form-check">
							<label class="form-check-label">
								<input type="radio" name="leadowener" value="SP1" <?php if (isset($d) && $d == "SP1") {
																						echo "checked";
																					} ?> class="form-check-input"> SP1 </label>
						</div>
						<div class="form-check">
							<label class="form-check-label">
								<input type="radio" name="leadowener" value="SP2" <?php if (isset($d) && $d == "SP2") {
																						echo "checked";
																					} ?> class="form-check-input"> SP2
							</label>
						</div>
						<br><br>
						<label class="font-weight-bold">Type</label>
						<div class="form-check">
							<label class="form-check-label">
								<input type="radio" name="type" value="yoga" <?php if (isset($type) && $type == "yoga") {
																					echo "checked";
																				} ?> class="form-check-input"> Yoga Teachers
							</label>
						</div>
						<div class="form-check">
							<label class="form-check-label">
								<input type="radio" name="type" value="coaching" <?php if (isset($type) && $type == "coaching") {
																						echo "checked";
																					} ?> class="form-check-input"> Coaching
							</label>
						</div>
					</div>
					<div class="col-md-3">
						<label class="font-weight-bold">Source</label>
						<div class="form-check">
							<label class="form-check-label">
								<input type="checkbox" name="Source[]" value="Facebook" <?php if (in_array("Facebook", $b)) {
																							echo "checked";
																						} ?> class="form-check-input">
								Facebook
							</label>
						</div>
						<div class="form-check">
							<label class="form-check-label">
								<input type="checkbox" name="Source[]" value="Linkedin" <?php if (in_array("Linkedin", $b)) {
																							echo "checked";
																						} ?> class="form-check-input">
								Linkedin
							</label>
						</div>
						<div class="form-check">
							<label class="form-check-label">
								<input type="checkbox" name="Source[]" value="Instagram" <?php if (in_array("Instagram", $b)) {
																								echo "checked";
																							} ?> class="form-check-input">
								Instagram
							</label>
						</div>
						<div class="form-check">
							<label class="form-check-label">
								<input type="checkbox" name="Source[]" value="Other" <?php if (in_array("Other", $b)) {
																							echo "checked";
																						} ?> class="form-check-input">Other</label>
						</div>
						<br>
						<label class="font-weight-bold">Friend Request Status </label>
						<div class="form-check">
							<label class="form-check-label">
								<input type="radio" class="form-check-input" name="requeststatus" value="Sent" <?php if (isset($connenction) && $connenction == "Sent") {
																													echo "checked";
																												} ?>> Sent
							</label>
						</div>
						<div class="form-check">
							<label class="form-check-label">
								<input type="radio" class="form-check-input" name="requeststatus" value="Accepted" <?php if (isset($connenction) && $connenction == "Accepted") {
																														echo "checked";
																													} ?>> Accepted
							</label>
						</div>
						<div class="form-check">
							<label class="form-check-label">
								<input type="radio" class="form-check-input" name="requeststatus" value="Pending" <?php if (isset($connenction) && $connenction == "Pending") {
																														echo "checked";
																													} ?>> Pending
							</label>
						</div>
						<br>
						<label class="font-weight-bold">Reply Status</label>
						<div class="form-check">
							<label class="form-check-label">
								<input type="radio" class="form-check-input" name="ReplyStatus" value="No" <?php if (isset($reply) && $reply == "No") {
																												echo "checked";
																											} ?>> No
							</label>
						</div>
						<div class="form-check">
							<label class="form-check-label">
								<input type="radio" class="form-check-input" name="ReplyStatus" value="Yes" <?php if (isset($reply) && $reply == "Yes") {
																												echo "checked";
																											} ?>> Yes
							</label>
						</div>
					</div>
					<div class="col-md-3">
						<label class="font-weight-bold">Level</label>
						<div class="form-check">
							<label class="form-check-label">
								<input type="radio" name="Audience" value="1" <?php if (isset($level) && $level == "1") {
																				echo "checked";
																			} ?> class="form-check-input"> Level 1 - Sent Friend Request/ Connection Request/ Welcome Message
							</label>
						</div>
						<div class="form-check">
							<label class="form-check-label">
								<input type="radio" name="Audience" value="1" <?php if (isset($level) && $level == "2") {
																				echo "checked";
																			} ?> class="form-check-input"> Level 2 - Cold Audience/ Want Info/ Educate
							</label>
						</div>
						<div class="form-check">
							<label class="form-check-label">
								<input type="radio" name="Audience" value="2" <?php if (isset($level) && $level == "3") {
																				echo "checked";
																			} ?> class="form-check-input"> Level 3 - Interested Audience
							</label>
						</div>
						<div class="form-check">
							<label class="form-check-label">
								<input type="radio" name="Audience" value="3" <?php if (isset($level) && $level == "4") {
																				echo "checked";
																			} ?> class="form-check-input"> Level 4 - Warm Audience / Had Interaction/Ready For Call
							</label>
						</div>
						<div class="form-check">
							<label class="form-check-label">
								<input type="radio" name="Audience" value="4" <?php if (isset($level) && $level == "5") {
																				echo "checked";
																			} ?> class="form-check-input"> Level 5 - Hot Audience /Ready For Offer
							</label>
						</div>
						<div class="form-check">
							<label class="form-check-label">
								<input type="radio" name="Audience" value="5" <?php if (isset($level) && $level == "6") {
																				echo "checked";
																			} ?> class="form-check-input"> Level 6 - No Match
							</label>
						</div>
						<div class="form-check">
							<label class="form-check-label">
								<input type="radio" name="Audience" value="5" <?php if (isset($level) && $level == "7") {
																				echo "checked";
																			} ?> class="form-check-input"> Level 7 - Converted
							</label>
						</div>
					</div>
					<div class="col-md-12">
						<input type="submit" name="submit" value="Submit" class="btn btns">
					</div>
				</div>
			</form>
		</div>
	</div>
</body>

</html>