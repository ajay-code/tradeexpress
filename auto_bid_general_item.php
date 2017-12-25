<?php
    session_start();
    include 'function.php';
    if (!isLoggedIn()) {
        header('LOCATION: login.php');
    }
    if (isset($_POST['submit_auto_bid'])) {
        // do data base stuf
		$data = [
			'email_me' => 0,
			'agi_id' => $_POST['agi_id'],
			'auto_bid' => $_POST['auto_bid_ammount'],
			'bid_price' => 0,
			'cus_id' => $_SESSION['ar_id']
		];
		if(isset($_POST['email_me'])){
			$data['email_me'] = 1;
		}
		$prev_bid=higest_bid_general_item($_POST["agi_id"]);
		$data['bid_price'] = $prev_bid + 0.50;
		if($data['auto_bid'] >= $prev_bid + 1 && $data['bid_price'] <= $data['auto_bid']){
			if(alreadyMadeBidOnItem($_POST["agi_id"], $_SESSION['ar_id'])){
				$status = updateBidOnItem($_POST["agi_id"], $_SESSION['ar_id'], $data['bid_price']);
				$status = updateAutoBidOnItem($_POST["agi_id"], $_SESSION['ar_id'], $data['auto_bid']);
				$status = updateEmailMeOnItem($_POST["agi_id"], $_SESSION['ar_id'], $data['email_me']);
			}else{
				$status=doInsert($data, "ambit_general_item_bid");
			}
		}
		// then refirect
		header("LOCATION: general_item_details.php?id={$_POST["agi_id"]}");
		exit();
    }
    $auto_bid_ammount =  $_POST['auto_bid_amount'];
    $agi_id = $_POST['agi_id'];
    $field = "agi_id, uploader, listing_title, payment";
	$v = getValueDetails('add_general_items', $field, $agi_id, 'agi_id');
	
	$select="ar_id,name,email,image,phone,landline,address,acnt_created";
    $from="ambit_registration";
    $condition=array("ar_id"=>trim($v["uploader"]));
    $seller=getDetails(doSelect1($select, $from, $condition))[0];

?>
	<!DOCTYPE html>
	<html>

	<head lang="en">
		<title>Trade Express | Submit Auto Bid</title>
		<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<style>
			@media all and (max-width: 1200px) {
				/* screen size until 1200px */
				body {
					font-size: 1.3em;
					/* 1.5x default size */
				}
			}

			@media all and (max-width: 1000px) {
				/* screen size until 1000px */
				body {
					font-size: 1em;
					/* 1.2x default size */
				}
			}

			@media all and (max-width: 500px) {
				/* screen size until 500px */
				body {
					font-size: 0.7em;
					/* 0.8x default size */
				}
				.me_centered {
					margin-top: 10px;
					margin-bottom: 10px;
					margin-right: 2px;
					marker-mid: 2px;
				}
				input {
					margin: 0;
				}
				.top_line {
					padding: 1px 1px 1px 1px;
				}
				.left_line {
					padding: 1px 1px 1px 1px;
				}
				.right_line {
					padding: 1px 1px 1px 1px;
				}
			}

			@media all and (min-width: 800px) {
				.me_centered {
					margin-left: 25%;
					margin-right: 25%;
				}
			}

			.me_centered {
				max-width: 720px;
			}

			.top_line {
				background: #ff6700;
				font-weight: bold;
				padding: 4px 4px 4px 15px;
				margin-bottom: 1px;
				font-size: 1.3em;
			}

			.left_line {
				background: #fff9c4;
				padding: 4px 4px 4px 15px;
				margin-bottom: 1px;
			}

			.right_line {
				background: #d7ccc8;
				padding: 4px 4px 4px 15px;
				margin-bottom: 1px;
			}

			.bold_text {
				font-weight: bold;
			}

			.small_text {
				font-size: 0.9em;
				font-weight: bold;
			}

			.caution {
				margin-top: 15px;
			}

			.confirm_button {
				background: #094cb7;
				border: none;
				margin-right: 10px;
			}

			.cancel_button {
				background: #b5b6b7;
				border: none;
			}
		</style>
	</head>

	<body>

		<div class="container">

			<div class="d-flex justify-content-center" style="margin-top:10px;">
				<img src="https://tradeexpress.co.nz/images/logo.png" class="img-fluid">
			</div>


			<div class="me_centered mt-4 mr-1 ml-1 mr-sm-auto ml-sm-auto">
				<form method="post">
					<input type="hidden" name="auto_bid_ammount" value="<?=$auto_bid_ammount?>">
					<input type="hidden" name="agi_id" value="<?=$agi_id?>">
					<div class="row">
						<div class=" col-12 top_line">Bid details</div>
						<div class="col-sm-4 col-6 left_line">Item Detail</div>
						<div class="col-sm-8 col-6 right_line">
							<?= $v['listing_title']?>
						</div>
						<div class="col-sm-4 col-6 left_line">
							<span class="bold_text">Your bid</span>
						</div>
						<div class="col-sm-8 col-6 right_line">
							<span class="bold_text">
								$<?=$auto_bid_ammount?>
							</span> You will lead the bidding upto
							<span class="small_text">
								$<?=$auto_bid_ammount?>
							</span>
						</div>
						<div class="col-sm-4 col-6 left_line">My preferred shipping option is</div>
						<div class="col-sm-8 col-6 right_line">
							<label>
								<input class="mr-1" type="radio" name="optradio">Courier,Shipping</label>
							<div>
								<label>
									<input class="mr-1" type="radio" name="optradio">I intend to Pick-up
								</label>
							</div>
							<p class="small_text"> The seller is located in <?= $seller['address']?></p>
						</div>
						<div class="col-sm-4 col-6 left_line">Payment Options</div>
						<div class="col-sm-8 col-6 right_line">
							<?= $v['payment']?>
						</div>
						<div class="col-sm-4 col-6 left_line">Reminders</div>
						<div class="col-sm-8 col-6 right_line">
							<label>
								<input class="mr-1" type="checkbox" value="true" name="email_me">Email me if I'm outbid
							</label>
						</div>
						<div class=" col-12 text-center caution">You are legally binded to completing your purchase if you win this auction</div>
						<div class=" col-12 text-center caution">
							<button name="submit_auto_bid" type="submit" class="btn btn-success confirm_button">Confirm</button>
							<a href="/general_item_details.php?id=<?=$_POST["agi_id"]?>">
								<span class="btn btn-danger cancel_button">Cancel</span>
							</a>
						</div>
				</form>

				</div>
			</div>

		</div>


	</body>

	</html>