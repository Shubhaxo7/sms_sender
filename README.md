# sms_sender
A simple SMS sending application using HTML, CSS, and PHP in one code.

Change this after making your account on Twilio.
-------------------------------------------------
  1. Twilio account SID
			$url = 'https://api.twilio.com/2010-04-01/Accounts/{TWILIO_ACCOUNT_SID}/Messages.json';
  2. Twilio account SID & Twilio auth token
      'Authorization: Basic ' . base64_encode('{TWILIO_ACCOUNT_SID}:{TWILIO_AUTH_TOKEN}'),
  3. Phone Number
      				'From' => '{TWILIO_PHONE_NUMBER}',

>> Note that this code uses Twilio's API to send SMS messages, so you will need to replace the placeholders in the code with your actual Twilio account SID, auth token, and phone number.
