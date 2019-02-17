<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>CodeIgniter - PHP QR Code</title>
	</head>
	<body>
		<div class="container">
			<h1>TEXT</h1>
			<p><img src="<?php echo base_url($qrc_text); ?>"></p>

			<h1>URL</h1>
			<p><img src="<?php echo base_url($qrc_url); ?>"></p>

			<h1>EMAIL</h1>
			<h2>Address</h2>
			<p><img src="<?php echo base_url($qrc_email_1); ?>"></p>
			<h2>Address + Subject</h2>
			<p><img src="<?php echo base_url($qrc_email_2); ?>"></p>
			<h2>Address + Subject + Body</h2>
			<p><img src="<?php echo base_url($qrc_email_3); ?>"></p>

			<h1>TEL</h1>
			<p><img src="<?php echo base_url($qrc_tel); ?>"></p>

			<h1>CONTACT</h1>
			<h2>MECARD</h2>
			<p><img src="<?php echo base_url($qrc_mecard); ?>"></p>
			<h2>BIZCARD</h2>
			<p><img src="<?php echo base_url($qrc_bizcard); ?>"></p>
			<h2>VCARD Simple</h2>
			<p><img src="<?php echo base_url($qrc_vcard_simple); ?>"></p>
			<h2>VCARD Detailed</h2>
			<p><img src="<?php echo base_url($qrc_vcard_detailed); ?>"></p>

			<h1>SMS</h1>
			<p><img src="<?php echo base_url($qrc_sms); ?>"></p>

			<h1>MAPS</h1>
			<p><img src="<?php echo base_url($qrc_maps); ?>"></p>

			<h1>CALENDAR</h1>
			<p><img src="<?php echo base_url($qrc_calendar); ?>"></p>

			<h1>WI-FI</h1>
			<p><img src="<?php echo base_url($qrc_wifi); ?>"></p>

			<h1>ADD IMAGE IN QR CODE</h1>
			<p><img src="<?php echo base_url($qrc_add_image); ?>"></p>
		</div>

		<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>
	</body>
</html>