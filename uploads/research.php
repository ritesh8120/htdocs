<?php
session_start();
if (!isset($_SESSION["id"])) {
	header("Location:index.php");
}
include('config.php');

$id = $_GET['id'];

$result = $conn->query("SELECT * FROM `client_info` WHERE cid='$id'");

if ($result->num_rows > 0) {

	while ($row = $result->fetch_assoc()) {

		$name = $row['firstname'] . "" . $row['lastname'];
	}
}

$delid = $_REQUEST["id"];
$sql = "SELECT * FROM `client_info` WHERE cid='$delid'";
$res = mysqli_query($conn, $sql);
$arow = mysqli_fetch_array($res);
?>

<!DOCTYPE html>

<html>

<head>

	<title><?php echo $name; ?></title>

	<link rel="stylesheet" type="text/css" href="image.css">

	<!-- <link rel="stylesheet" type="text/css" href="customstyle.css"> -->

	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

	<!-- Latest compiled and minified CSS -->

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

	<!-- jQuery library -->

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

	<!-- Popper JS -->

	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

	<!-- Latest compiled JavaScript -->

	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

	<script src="https://use.fontawesome.com/6c6c4c0fcc.js"></script>

	<script src="https://cdn.ckeditor.com/ckeditor5/24.0.0/classic/ckeditor.js"></script>

	<style>
		.alert-box {

			padding: 15px;

			margin-bottom: 20px;

			border: 1px solid transparent;

			border-radius: 4px;

		}



		.success {

			color: #3c763d;

			background-color: #dff0d8;

			border-color: #d6e9c6;

			display: none;

		}

		p a {
			display: block;
			width: 100%;
			height: calc(1.5em + .75rem + 2px);
			padding: .375rem .75rem;
			font-size: 1rem;
			font-weight: 400;
			line-height: 1.5;
			/*color: #495057;*/
			background-color: #fff;
			background-clip: padding-box;
			border: 1px solid #ced4da;
			border-radius: .25rem;
			transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out;
		}

		.btns {
			border: 2px solid #000;
			color: #000;
			font-size: 20px;
			font-weight: 600;
			padding: 5px 10px;
			/* width: 120px !important; */
			text-decoration: none;
		}

		.btns:hover {
			text-decoration: none;
			color: #000;
		}

		.form-control {
			border: 2px solid #000;
		}
	</style>

</head>

<body>

	<div class="container">

		<br>
		<a class="btns btn" href="home">Home</a>
		<a href="notes?id=<?= $id ?>" class='btns btn'>Show History</a>
		<a class="float-right btns btn" href="logout"><i class="fas fa-sign-out-alt"></i> Logout </a>
		<a class='btns btn' href="javascript:history.back()">Back</a>
		<button type="button" class='float-right btns btn mx-2 save' data-id="<?php echo $id; ?>">save</button>
		<div class="row" style="margin-top: 25px;">
			<div class="col-md-6">
				<table>

					<tr>
						<th>Name - </th>
						<td><?php echo $arow['firstname'] ?><?php echo " " . $arow['lastname']; ?></td>
					</tr>
					<tr>
						<th>Email - </th>
						<td><?php echo $arow['email']; ?></td>
					</tr>
					<tr>
						<th>Phone - </th>
						<td><?php echo $arow['phone']; ?></td>
					</tr>
					<tr>
						<th>Address - </th>
						<td><?php echo $arow['address']; ?></td>
					</tr>
					<tr>
						<th>Source - </th>
						<td><?php echo $arow['source'];  ?></td>
					</tr>
					<tr>
						<th>Leadowner - </th>
						<td><?php echo $arow['lead']; ?></td>
					</tr>
				</table>

			</div>
			<div class="col-md-6">
				<div class="funkyradio">
					<h5>Levels</h5>
					<div class="funkyradio-default">
						<input type="radio" name="radio" class="Audience" value="1" id="radio1" <?php if (($arow['Audience']) == '1') echo "checked='checked'"; ?> />
						<label for="radio1" style="font-size: smaller;font-weight: 700;">Sent Friend Request/ Connection Request/ Welcome Message</label>
					</div>
					<div class="funkyradio-default">
						<input type="radio" name="radio" class="Audience" value="2" id="radio1" <?php if (($arow['Audience']) == '2') echo "checked='checked'"; ?> />
						<label for="radio1" style="font-size: smaller;font-weight: 700;">Cold Audience/ Want Info/ Educate</label>
					</div>
					<div class="funkyradio-primary">
						<input type="radio" name="radio" class="Audience" value="3" id="radio2" <?php if (($arow['Audience']) == '3') echo "checked='checked'"; ?> />
						<label for="radio2" style="font-size: smaller;font-weight: 700;">Interested Audience</label>
					</div>
					<div class="funkyradio-success">
						<input type="radio" name="radio" class="Audience" value="4" id="radio3" <?php if (($arow['Audience']) == '4') echo "checked='checked'"; ?> />
						<span for="radio3" style="font-size: smaller;font-weight: 700;">Warm Audience / Had Interaction/Ready For Call</span>
					</div>
					<div class="funkyradio-danger">
						<input type="radio" name="radio" class="Audience" value="5" id="radio4" <?php if (($arow['Audience']) == '5') echo "checked='checked'"; ?> />
						<label for="radio4" style="font-size: smaller;font-weight: 700;">Hot Audience /Ready For Offer</label>
					</div>
					<div class="funkyradio-danger">
						<input type="radio" name="radio" class="Audience" value="6" id="radio5" <?php if (($arow['Audience']) == '6') echo "checked='checked'"; ?> />
						<label for="radio5" style="font-size: smaller;font-weight: 700;">Nurture / No match</label>
					</div>
					<div class="funkyradio-danger">
						<input type="radio" name="radio" class="Audience" value="7" id="radio7" <?php if (($arow['Audience']) == '7') echo "checked='checked'"; ?> />
						<label for="radio7" style="font-size: smaller;font-weight: 700;">Converted</label>
					</div>
				</div>
			</div>

			<br>
			<div class="col-md-6">
				<div class="form-group">
					<label for="">Description </label>
					<textarea name="description" data-id="<?= $id; ?>" id="description" class="form-control"><?php echo nl2br($arow['description']); ?></textarea>
				</div>
			</div>
			<div class="col-md-6">
				<div class="funkyradio">
					<h5>FB Group</h5>
					<div class="funkyradio-default">
						<input type="radio" data-id="<?= $id; ?>" name="fggroup" class="fggroup" value="0" id="radio1" <?php if (($arow['fggroup']) == '0') echo "checked='checked'"; ?> />
						<label for="radio1" style="font-size: smaller;font-weight: 700;">Yes</label>
					</div>
					<div class="funkyradio-default">
						<input type="radio" data-id="<?= $id; ?>" name="fggroup" class="fggroup" value="1" id="radio1" <?php if (($arow['fggroup']) == '1') echo "checked='checked'"; ?> />
						<label for="radio1" style="font-size: smaller;font-weight: 700;">No</label>
					</div>
					<div class="funkyradio-default">
						<input type="radio" data-id="<?= $id; ?>" name="fggroup" class="fggroup" value="2" id="radio1" <?php if (($arow['fggroup']) == '2') echo "checked='checked'"; ?> />
						<label for="radio1" style="font-size: smaller;font-weight: 700;">left</label>
					</div>
				</div>
			</div>
		</div>

		<div class="row">

			<div class="col-md-12">

				<form class="form-horizontal">

					<div class="panel panel-default">

						<div class="panel-heading">

							<!-- <h3 class="panel-title">Name:- <?= $name ?></h3> -->

							<div class="alert-box success">Success !!!</div>

						</div>

						<div class="panel-body">

							<?php

							$historyMember = $conn->query("SELECT * FROM `research` WHERE `user_id`='$id'");

							if ($historyMember->num_rows > 0) {

								while ($history = $historyMember->fetch_assoc()) {

							?>
									<div class="row">
										<div class="col-md-6">
										    										<div class="form-group">
										    <label>Notes </label>
											<textarea name="historyNotes" id="historyNotes1" class="form-control " rows="10"><?php echo nl2br($history['search']); ?></textarea>
										</div>
										<div class="form-group">
										    <label>Personal </label>
											<textarea name="historyNotes" id="historyNotes2" class="form-control " rows="10"><?php echo nl2br($history['personal']); ?></textarea>
										</div>
										<div class="form-group">
										    <label>Business</label>
											<textarea name="historyNotes" id="historyNotes3" class="form-control " rows="10"><?php echo nl2br($history['business']); ?></textarea>
										</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label>Facebook Profile Link -</label>
												<?php
												if ($history['fbprolink'] == "") {
													echo '<textarea class="form-control fbprolink" rows="1"></textarea>';
												} else {
													echo '<br><div contentEditable="true"><a href="' . nl2br($history['fbprolink']) . '" target="_blank">' . nl2br($history['fbprolink']) . '</a></div>';
												} ?>
											</div>
											<div class="form-group">
												<label for="">Facebook Page Link - </label>
												<?php
												if ($history['fbpagelink'] == "") {
													echo '<textarea class="form-control fbpagelink" rows="1"></textarea>';
												} else {
													echo '<br><div contentEditable="true"><a href="' . nl2br($history['fbpagelink']) . '" target="_blank">' . nl2br($history['fbpagelink']) . '</a></div>';
												} ?>
												<!--<textarea class="form-control fbpagelink" rows="1"><?php echo nl2br($history['fbpagelink']); ?></textarea>-->
											</div>
											<div class="form-group">
												<label for="">Website Link - </label>
												<?php
												if ($history['weblink'] == "") {
													echo '<textarea class="form-control weblink" rows="1"></textarea>';
												} else {
													echo '<br><div contentEditable="true"><a href="' . nl2br($history['weblink']) . '" target="_blank">' . nl2br($history['weblink']) . '</a></div>';
												} ?>
												<!--<textarea class="form-control weblink" rows="1"><?php echo nl2br($history['weblink']); ?></textarea>-->
											</div>
											<div class="form-group">
												<label for="">Instagram Link - </label>
												<?php
												if ($history['intalink'] == "") {
													echo '<textarea class="form-control intalink" rows="1"></textarea>';
												} else {
													echo '<br><div contentEditable="true"><a href="' . nl2br($history['intalink']) . '" target="_blank">' . nl2br($history['intalink']) . '</a><div>';
												} ?>
												<!--<textarea class="form-control intalink" rows="1"><?php echo nl2br($history['intalink']); ?></textarea>-->
											</div>
											<div class="form-group">
												<label for="">Designation -</label>
												<?php
												if ($history['desiglink'] == "") {
													echo '<textarea class="form-control desiglink" rows="1"></textarea>';
												} else {
													echo '<br><div contentEditable="true"><a href="' . nl2br($history['desiglink']) . '" target="_blank">' . nl2br($history['desiglink']) . '</a></div>';
												} ?>
												<!--<textarea class="form-control desiglink" rows="1"><?php echo nl2br($history['desiglink']); ?></textarea>-->
											</div>

											<label>Beliefs & LimitationsBeliefs & Limitations - </label>
											<div class="form-group">
												<?php
												if ($history['belief1'] == "") {
													echo '<textarea class="form-control belief1" rows="1"></textarea>';
												} else {
													echo '<br><div contentEditable="true"><a href="' . nl2br($history['belief1']) . '" target="_blank">' . nl2br($history['belief1']) . '</a></div>';
												} ?>
												<!--<textarea class="form-control belief1" rows="1"><?php echo nl2br($history['belief1']); ?></textarea>-->
											</div>
											<div class="form-group">
												<?php
												if ($history['belief2'] == "") {
													echo '<textarea class="form-control belief2" rows="1"></textarea>';
												} else {
													echo '<br><div contentEditable="true"><a href="' . nl2br($history['belief2']) . '" target="_blank">' . nl2br($history['belief2']) . '</a></div>';
												} ?>
												<!--<textarea class="form-control belief2" rows="1"><?php echo nl2br($history['belief2']); ?></textarea>-->
											</div>
											<div class="form-group">
												<?php
												if ($history['belief3'] == "") {
													echo '<textarea class="form-control belief3" rows="1"></textarea>';
												} else {
													echo '<br><div contentEditable="true"><a href="' . nl2br($history['belief3']) . '" target="_blank">' . nl2br($history['belief3']) . '</a></div>';
												} ?>
												<!--<textarea class="form-control belief3" rows="1"><?php echo nl2br($history['belief3']); ?></textarea>-->
											</div>
											<label>Key Phrases/ Key Words - </label>
											<div class="form-group">
												<?php
												if ($history['keyphra1'] == "") {
													echo '<textarea class="form-control keyphra1" rows="1"></textarea>';
												} else {
													echo '<br><div contentEditable="true"><a href="' . nl2br($history['keyphra1']) . '" target="_blank">' . nl2br($history['keyphra1']) . '</a></div>';
												} ?>
												<!--<textarea class="form-control keyphra1" rows="1"><?php echo nl2br($history['keyphra1']); ?></textarea>-->
											</div>
											<div class="form-group">
												<?php
												if ($history['keyphra2'] == "") {
													echo '<textarea class="form-control keyphra2" rows="1"></textarea>';
												} else {
													echo '<br><div contentEditable="true"><a href="' . nl2br($history['keyphra2']) . '" target="_blank">' . nl2br($history['keyphra2']) . '</a></div>';
												} ?>
												<!--<textarea class="form-control keyphra2" rows="1"><?php echo nl2br($history['keyphra2']); ?></textarea>-->
											</div>
											<div class="form-group">
												<?php
												if ($history['keyphra3'] == "") {
													echo '<textarea class="form-control keyphra3" rows="1"></textarea>';
												} else {
													echo '<br><div contentEditable="true"><a href="' . nl2br($history['keyphra3']) . '" target="_blank">' . nl2br($history['keyphra3']) . '</a></div>';
												} ?>
												<!--<textarea class="form-control keyphra3" rows="1"><?php echo nl2br($history['keyphra3']); ?></textarea>-->
											</div>
											<label>Problems - </label>
											<div class="form-group">
												<?php
												if ($history['problem1'] == "") {
													echo '<textarea class="form-control problem1" rows="1"></textarea>';
												} else {
													echo '<br><div contentEditable="true"><a href="' . nl2br($history['problem1']) . '" target="_blank">' . nl2br($history['problem1']) . '</a></div>';
												} ?>
												<!--<textarea class="form-control problem1" rows="1"><?php echo nl2br($history['problem1']); ?></textarea>-->
											</div>
											<div class="form-group">
												<?php
												if ($history['problem2'] == "") {
													echo '<textarea class="form-control problem2" rows="1"></textarea>';
												} else {
													echo '<br><div contentEditable="true"><a href="' . nl2br($history['problem2']) . '" target="_blank">' . nl2br($history['problem2']) . '</a></div>';
												} ?>
												<!--<textarea class="form-control problem2" rows="1"><?php echo nl2br($history['problem2']); ?></textarea>-->
											</div>
											<div class="form-group">
												<?php
												if ($history['problem3'] == "") {
													echo '<textarea class="form-control problem3" rows="1"></textarea>';
												} else {
													echo '<br><div contentEditable="true"><a href="' . nl2br($history['problem3']) . '" target="_blank">' . nl2br($history['problem3']) . '</a></div>';
												} ?>
												<!--<textarea class="form-control problem3" rows="1"><?php echo nl2br($history['problem3']); ?></textarea>-->
											</div>
										</div>

									</div>

								<?php
								}
							} else { ?>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
										    <label>Notes </label>
											<textarea name="historyNotes" id="historyNotes1" class="form-control " rows="10"></textarea>
										</div>
										<div class="form-group">
										    <label>Personal </label>
											<textarea name="historyNotes" id="historyNotes2" class="form-control " rows="10"></textarea>
										</div>
										<div class="form-group">
										    <label>Business</label>
											<textarea name="historyNotes" id="historyNotes3" class="form-control " rows="10"></textarea>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>Facebook Profile Link -</label>
											<textarea class="form-control fbprolink" rows="1"></textarea>
										</div>
										<div class="form-group">
											<label for="">Facebook Page Link - </label>
											<textarea class="form-control fbpagelink" rows="1"></textarea>
										</div>
										<div class="form-group">
											<label for="">Website Link - </label>
											<textarea class="form-control weblink" rows="1"></textarea>
										</div>
										<div class="form-group">
											<label for="">Instagram Link</label>
											<textarea class="form-control intalink" rows="1"></textarea>
										</div>
										<div class="form-group">
											<label for="">Designation -</label>
											<textarea class="form-control desiglink" rows="1"></textarea>
										</div>

										<label>Beliefs & LimitationsBeliefs & Limitations</label>
										<div class="form-group">
											<textarea class="form-control belief1" rows="1"></textarea>
										</div>
										<div class="form-group">
											<textarea class="form-control belief2" rows="1"></textarea>
										</div>
										<div class="form-group">
											<textarea class="form-control belief3" rows="1"></textarea>
										</div>
										<label>Key Phrases/ Key Words</label>
										<div class="form-group">
											<textarea class="form-control keyphra1" rows="1"></textarea>
										</div>
										<div class="form-group">
											<textarea class="form-control keyphra2" rows="1"></textarea>
										</div>
										<div class="form-group">
											<textarea class="form-control keyphra3" rows="1"></textarea>
										</div>
										<label>Problems</label>
										<div class="form-group">
											<textarea class="form-control problem1" rows="1"></textarea>
										</div>
										<div class="form-group">
											<textarea class="form-control problem2" rows="1"></textarea>
										</div>
										<div class="form-group">
											<textarea class="form-control problem3" rows="1"></textarea>
										</div>
									</div>

								</div>
							<?php } ?>
							<button type="button" style="width:200px;font-size:20px;font-weight:600;" class="float-right btn btns save" data-id="<?php echo $id; ?>">save</button>


						</div>

					</div>

				</form>

			</div>

		</div>

	</div>

	<script>
			ClassicEditor
			.create(document.querySelector('#historyNotes1'))
			.then(newEditor => {
				editor = newEditor;
				newEditor.ui.view.editable.element.style.height = '250px';
			})
			.catch(error => {
				console.error(error);
			});
			ClassicEditor
			.create(document.querySelector('#historyNotes2'))
			.then(newEditor => {
				editor2 = newEditor;
				newEditor.ui.view.editable.element.style.height = '250px';
			})
			.catch(error => {
				console.error(error);
			});
			ClassicEditor
			.create(document.querySelector('#historyNotes3'))
			.then(newEditor => {
				editor3 = newEditor;
				newEditor.ui.view.editable.element.style.height = '250px';
			})
			.catch(error => {
				console.error(error);
			});
	</script>
	<script>
		$(document).ready(function() {
			$('.save').click(function() {
				var search = editor.getData();
				var personal = editor2.getData();
				var business = editor3.getData();
				var fbprolink = $('.fbprolink').val();
				var fbpagelink = $('.fbpagelink').val();
				var weblink = $('.weblink').val();
				var intalink = $('.intalink').val();
				var desiglink = $('.desiglink').val();
				var belief1 = $('.belief1').val();
				var belief2 = $('.belief2').val();
				var belief3 = $('.belief3').val();
				var keyphra1 = $('.keyphra1').val();
				var keyphra2 = $('.keyphra2').val();
				var keyphra3 = $('.keyphra3').val();
				var problem1 = $('.problem1').val();
				var problem2 = $('.problem2').val();
				var problem3 = $('.problem3').val();
				var search_id = $(this).attr('data-id');

				$.ajax({
					url: "history_notes",
					data: {
						"search_id": search_id,
						"search": search,
						"personal":personal,
						"business":business,
						"fbprolink": fbprolink,
						"fbpagelink": fbpagelink,
						"weblink": weblink,
						"intalink": intalink,
						"desiglink": desiglink,
						"belief1": belief1,
						"belief2": belief2,
						"belief3": belief3,
						"keyphra1": keyphra1,
						"keyphra2": keyphra2,
						"keyphra3": keyphra3,
						"problem1": problem1,
						"problem2": problem2,
						"problem3": problem3
					},
					type: "POST",
					success: function(data) {
						$("div.success").fadeIn(300).delay(1500).fadeOut(400);
					}
				});

				var fggroup = $('.fggroup:checked').val();
				var description = $('#description').val();
				var audience = $('.Audience:checked').val();
				var cid = <?php echo $id; ?>;
				$.ajax({
					type: "POST",
					url: "check",
					data: {
						fggroup: fggroup,
						description: description,
						audience: audience,
						cid: cid
					}
				});
			});
		});
	</script>
</body>

</html>