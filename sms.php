<!DOCTYPE html>
<html>
<head>
	<title>SMS Sending App</title>
	<style>
	body {
	  font-family: Arial, sans-serif;
	  margin: 0;
	}

	h1 {
	  text-align: center;
	}

	form {
	  display: flex;
	  flex-direction: column;
	  align-items: center;
	  margin-top: 50px;
	}

	input[type="text"], textarea {
	  padding: 10px;
	  border-radius: 5px;
	  border: 1px solid #ccc;
	  margin-bottom: 10px;
	  width: 100%;
	  max-width: 400px;
	}

	input[type="submit"] {
	  background-color: #008CBA;
	  color: #fff;
	  border: none;
	  padding: 10px 20px;
	  border-radius: 5px;
	  cursor: pointer;
	}

	input[type="submit"]:hover {
	  background-color: #006B8E;
	}

	.message {
	  margin-top: 50px;
	  text-align: center;
	}
	</style>
</head>
<body>

	<h1>SMS Sending App</h1>

	<?php
		if($_POST) {
			$to = $_POST['phone_number'];
			$message = $_POST['message'];
			$url = 'https://api.twilio.com/2010-04-01/Accounts/AC6f1aea983e6b8ac7e2dc76c25d4915be/Messages.json';

			$data = array (
				'From' => '+18164843691',
				'To' => $to,
				'Body' => $message
			);

			$post = http_build_query($data);
			$x_curl_header = array(
				'Authorization: Basic ' . base64_encode('AC6f1aea983e6b8ac7e2dc76c25d4915be:1518e66cfff2a17f035e40aeda92292f'),
				'Content-Type: application/x-www-form-urlencoded',
				'Content-Length: ' . strlen($post)
			);

			$curl = curl_init();
			curl_setopt($curl, CURLOPT_URL, $url);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($curl, CURLOPT_POST, true);
			curl_setopt($curl, CURLOPT_POSTFIELDS, $post);
			curl_setopt($curl, CURLOPT_HTTPHEADER, $x_curl_header);
			curl_exec($curl);
			curl_close($curl);

			echo "<div class='message'>SMS sent successfully!</div>";
		}
	?>

	<form method="POST">
		<label for="phone_number">Phone Number:</label>
		<input type="text" name="phone_number" placeholder="Enter phone number with country code" required>

		<label for="message">Message:</label>
		<textarea name="message" placeholder="Enter message" rows="5" required></textarea>

		<input type="submit" value="Send SMS">
	</form>

</body>
</html>
