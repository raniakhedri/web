<?php
include_once '../../Model/Adherent.php';
include_once '../../Controller/AdherentC.php';

$error = "";

// create adherent
$paiement = null;

// create an instance of the controller
$adherentC = new AdherentC();
if (
	isset($_POST["BankName"]) &&
	isset($_POST["BranchName"]) &&
	isset($_POST["Email"]) &&
	isset($_POST["AccountName"]) &&
	isset($_POST["AccountNumber"]) &&

	isset($_POST["Date"]) &&

	isset($_POST["Prix"])
) {
	if (
		!empty($_POST["BankName"]) &&
		!empty($_POST['BranchName']) &&
		!empty($_POST["Email"]) &&
		!empty($_POST["AccountName"]) &&

		!empty($_POST["AccountNumber"]) &&

		!empty($_POST["Date"]) &&
		!empty($_POST["Prix"])
	) {
		$paiement = new paiement(
			$_POST['BankName'],
			$_POST['BranchName'],
			$_POST['Email'],
			$_POST['AccountName'],
			$_POST['AccountNumber'],
			$_POST['Date'],
			$_POST['Prix']

		);
		$adherentC->AddUser($paiement);

		header('Location: /yosr/Views/back/affrpayment.php');

	} else
		$error = "Missing information";
}
ini_set("SMTP", "localhost");
ini_set("smtp_port", "465");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	// récupérer les champs du formulaire
	$email = $_POST['Email'];

	// construction du message
	$message = "Bonjour,
  
	Merci de nous avoir fait part de votre réclamation, notre équipe vous répondra dans les plus brefs délais.";

	// envoi du mail
	$to = $email;
	$subject = "Réclamation";


	if (mail($to, $subject, $message)) {
		// afficher un message de confirmation
		echo "<p>Your reservation details have been sent to your email address.</p>";
	} else {
		// afficher un message d'erreur
		echo "<p>Sorry, something went wrong. Please try again later.</p>";
	}
}
?>
<!DOCTYPE html>
<html>
<style>
	.subbtn {
		color: white;
		background-color: #25b45b;
		border-radius: 30px;
		padding-left: 30px;
		padding-right: 30px;
		padding-bottom: 10px;
		padding-top: 10px;
		font-family: 'Nunito', sans-serif;
		font-size: 18px;
		border: none;
	}

	.subbtn:hover {
		background-color: #219c50;
	}
</style>

<head>
	<meta charset="utf-8">
	<title>Wizard-v5</title>
	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<!-- Font-->
	<link rel="stylesheet" type="text/css" href="css/nunito-font.css">
	<link rel="stylesheet" type="text/css"
		href="fonts/material-design-iconic-font/css/material-design-iconic-font.min.css">
	<!-- Main Style Css -->
	<link rel="stylesheet" href="css/style.css" />
</head>

<body>

	<div class="page-content">
		<div class="wizard-v5-content">
			<div class="wizard-form">
				<form class="form-register" id="form-register" method="POST"
					action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
					<div id="form-total">

						<!-- SECTION 1 -->

						<h2>
							<span class="step-icon"><i class="zmdi zmdi-check"></i></span>


							<span class="step-text">Personal Information</span>
						</h2>
						<section>
							<div class="inner">
								<div class="form-row">
									<div class="form-holder">
										<label for="first_name">First Name</label>
										<input type="text" placeholder="ex: Laura" class="form-control" id="first_name"
											name="first_name">
									</div>
									<div class="form-holder">
										<label for="last_name">Last Name</label>
										<input type="text" placeholder="ex: Vaughn" class="form-control" id="last_name"
											name="last_name">
									</div>
								</div>
								<div class="form-row">
									<div id="radio">
										<label for="gender">Gender:</label>
										<input type="radio" name="gender" value="male" checked> Male
										<input type="radio" name="gender" value="female"> Female
									</div>
								</div>
								<div class="form-row">
									<div class="form-holder form-holder-2">
										<label for="address">Address Location</label>
										<input type="text" placeholder="622 Dixie Path, South Tobinchester, UT 98336"
											class="form-control" id="address" name="address">
										<span><i class="zmdi zmdi-pin"></i></span>
									</div>
								</div>
								<div class="form-row">
									<div class="form-holder form-holder-3">
										<label for="phone">Phone Number</label>
										<input type="text" placeholder="+1 777-888-8888" class="form-control" id="phone"
											name="phone">
									</div>
									<div class="form-holder">
										<label for="code">Zip Code</label>
										<input type="text" class="form-control" id="code" name="code">
									</div>
								</div>
								<div class="form-row form-row-date">
									<div class="form-holder form-holder-2">
										<label for="date" class="special-label">Date of Birth:</label>
										<select name="date" id="date" class="form-control">
											<option value="15" selected>15</option>
											<option value="16">16</option>
											<option value="17">17</option>
											<option value="18">18</option>
											<option value="19">19</option>
										</select>
										<select name="month" id="month" class="form-control">
											<option value="Jan" selected>Jan</option>
											<option value="Feb">Feb</option>
											<option value="Mar">Mar</option>
											<option value="Apr">Apr</option>
											<option value="May">May</option>
										</select>
										<select name="year" id="year" class="form-control">
											<option value="2018" selected>2018</option>
											<option value="2017">2017</option>
											<option value="2016">2016</option>
											<option value="2015">2015</option>
											<option value="2014">2014</option>
											<option value="2013">2013</option>
										</select>
									</div>
								</div>
							</div>
						</section>
						<!-- SECTION 2 -->
						<h2>
							<span class="step-icon"><i class="zmdi zmdi-check"></i></span>
							<span class="step-text">Bank Information</span>
						</h2>
						<section>
							<div class="inner">
								<div class="form-row">
									<div class="form-holder">
										<label for="BankName">Bank Name:</label>
										<input type="text" placeholder="UsBank" onkeypress="return isLetterKey(event)"
											class="form-control input-step-2" id="BankName" name="BankName">
										<span><i class="zmdi zmdi-search"></i></span>
									</div>
									<div class="form-holder">
										<label for="BranchName">Branch Name:</label>
										<input type="text" placeholder="America" onkeypress="return isLetterKey(event)"
											class="form-control input-step-2" id="BranchName" name="BranchName">
									</div>
								</div>
								<div class="form-row">
									<div class="form-holder form-holder-2">
										<label for="Email">Email Address:</label>
										<input type="email" name="Email" class="email input-step-2-1" id="Email"
											placeholder="ex: example@email.com" pattern="[^@]+@[^@]+.[a-zA-Z]{2,6}">
									</div>
								</div>
								<div class="form-row">
									<div class="form-holder form-holder-2">
										<label for="AccountName">Account Name:</label>
										<input type="text" name="AccountName" class=" input-step-2-1" id="AccountName"
											placeholder="Account Name" onkeypress="return isLetterKey(event)">
									</div>
								</div>
								<div class="form-row">
									<div class="form-holder form-holder-2">
										<label for="AccountNumber">Account Number:</label>

										<input type="number" name="AccountNumber" class=" input-step-2-2"
											id="AccountNumber" placeholder="4576-6970-3801-2620"
											onkeypress="return isNumberKey(event)">
										<span class="card"><i class="zmdi zmdi-card"></i></span>
									</div>
								</div>
								<div class="form-row form-row-date form-row-step-2">
									<div class="form-holder form-holder-2">
										<label for="date_2" class="special-label">Expiry Date:</label>
										<select name="Date" id="Date" class="form-control">
											<option value="15" selected>15</option>
											<option value="16">16</option>
											<option value="17">17</option>
											<option value="18">18</option>
											<option value="19">19</option>
										</select>
										<select name="month_2" id="month_2" class="form-control">
											<option value="Jan" selected>Jan</option>
											<option value="Feb">Feb</option>
											<option value="Mar">Mar</option>
											<option value="Apr">Apr</option>
											<option value="May">May</option>
										</select>
										<select name="year_2" id="year_2" class="form-control">
											<option value="2018" selected>2018</option>
											<option value="2017">2017</option>
											<option value="2016">2016</option>
											<option value="2015">2015</option>
											<option value="2014">2014</option>
											<option value="2013">2013</option>
										</select>
									</div>
								</div>
								<div class="form-row">
								<div class="form-holder form-holder-2">
									<label for="Prix">Montant de transaction:</label>
									<input type="text" name="Prix" onkeypress="return isNumberKey(event)">
								</div>
								</div>
							</div>


						</section>
						<!-- SECTION 3 -->
						<h2>
							<span class="step-icon"><i class="zmdi zmdi-check"></i></span>
							<span class="step-text">Confirm Details</span>
						</h2>
						<section>
							<div class="inner">
								<h3>Confirm Details</h3>
								<div class="form-row table-responsive">
									<table class="table">
										<tbody>
											<tr class="space-row">
												<th>Full Name:</th>
												<td id="fullname-val"></td>
											</tr>
											<tr class="space-row">
												<th>Email Address:</th>
												<td id="email-val"></td>
											</tr>
											<tr class="space-row">
												<th>Phone Number:</th>
												<td id="phone-val"></td>
											</tr>
											<tr class="space-row">
												<th>Address Location:</th>
												<td id="address-val"></td>
											</tr>
											<tr class="space-row">
												<th>Gender:</th>
												<td id="gender-val"></td>
											</tr>
											<tr class="space-row">
												<th>Account Name:</th>
												<td id="AccountName-val"></td>
											</tr>
											<tr class="space-row">
												<th>Account Number:</th>
												<td id="AccountNumber-val"></td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
							<center>
								<input type="submit" value="submit" class="subbtn">
							</center>
						</section>
					</div>

				</form>
			</div>
		</div>
	</div>
	<script src="js/jquery-3.3.1.min.js"></script>
	<script src="js/jquery.steps.js"></script>
	<script src="js/main.js"></script>
</body>

</html>
<script>
	function isLetterKey(evt) {
		var charCode = (evt.which) ? evt.which : event.keyCode;
		if ((charCode < 65 || charCode > 90) && (charCode < 97 || charCode > 122))
			return false;
		return true;
	}
	function isNumberKey(evt) {
		var charCode = (evt.which) ? evt.which : event.keyCode;
		if (charCode > 31 && (charCode < 48 || charCode > 57))
			return false;
		return true;
	}
</script>

</html>