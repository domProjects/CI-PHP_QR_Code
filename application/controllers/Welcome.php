<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	// Parameters for view components
	protected $data = [];

	public function __construct()
	{
		parent::__construct();

		// Define data array
		$this->data = [];

	}

	public function index()
	{
		// Add package & library PHP QR Code
		$this->load->add_package_path(APPPATH.'third_party/php_qrcode');
		$this->load->library('php_qrcode');

		// Add Helper URL for the demo
		$this->load->helper('url');

		// Values by default for the demo
		$save_folder = 'images'.DIRECTORY_SEPARATOR;
		$saveandprint = FALSE;
		$outputformat = 'png';

		//
		// Generate QR Code
		//

		// ------------------------------------------------------------

		// TEXT
		$text = [
			'data' => 'Hello World :)',
			'save_folder' => $save_folder,
			'save_name' => 'qrc_text',
			'level' => 'L',
			'size' => 5,
			'margin' => 1,
			'saveandprint' => $saveandprint,
			'outputformat' => $outputformat
		];
		$this->data['qrc_text'] = $this->php_qrcode->generate($text);

		// ------------------------------------------------------------

		// URL
		$url = [
			'data' => 'https://domprojects.com',
			'save_folder' => $save_folder,
			'save_name' => 'qrc_url',
			'level' => 'L',
			'size' => 5,
			'margin' => 1,
			'saveandprint' => $saveandprint,
			'outputformat' => $outputformat
		];
		$this->data['qrc_url'] = $this->php_qrcode->generate($url);

		// ------------------------------------------------------------

		// EMAIL >> ADDRESS
		$email_1 = [
			'data' => 'mailto:john.doe@example.com',
			'save_folder' => $save_folder,
			'save_name' => 'qrc_email_address',
			'level' => 'L',
			'size' => 5,
			'margin' => 1,
			'saveandprint' => $saveandprint,
			'outputformat' => $outputformat
		];
		$this->data['qrc_email_1'] = $this->php_qrcode->generate($email_1);

		// EMAIL >> ADDRESS + SUBJECT
		$email_2 = [
			'data' => 'mailto:john.doe@example.com?subject='.urlencode('Mail from our site'),
			'save_folder' => $save_folder,
			'save_name' => 'qrc_email_address_+_subject',
			'level' => 'L',
			'size' => 5,
			'margin' => 1,
			'saveandprint' => $saveandprint,
			'outputformat' => $outputformat
		];
		$this->data['qrc_email_2'] = $this->php_qrcode->generate($email_2);

		// EMAIL >> ADDRESS + SUBJECT + BODY
		$email_3 = [
			'data' => 'mailto:john.doe@example.com?subject='.urlencode('Mail from our site').'&body='.urlencode('Please write your question here'),
			'save_folder' => $save_folder,
			'save_name' => 'qrc_email_address_+_subject_+_body',
			'level' => 'L',
			'size' => 5,
			'margin' => 1,
			'saveandprint' => $saveandprint,
			'outputformat' => $outputformat
		];
		$this->data['qrc_email_3'] = $this->php_qrcode->generate($email_3);

		// ------------------------------------------------------------

		// TEL
		$tel = [
			'data' => 'tel:(049)012-345-678',
			'save_folder' => $save_folder,
			'save_name' => 'qrc_tel',
			'level' => 'L',
			'size' => 5,
			'margin' => 1,
			'saveandprint' => $saveandprint,
			'outputformat' => $outputformat
		];
		$this->data['qrc_tel'] = $this->php_qrcode->generate($tel);

		// ------------------------------------------------------------

		// CONTACT >> MECARD
		$mecard = [
			'data' => 'MECARD:N:Doe,John;ADR:76 9th Avenue, 4th Floor, New York, NY 10011;TEL:(049)012-345-678;EMAIL:john.doe@example.com;;',
			'save_folder' => $save_folder,
			'save_name' => 'qrc_mecard',
			'level' => 'L',
			'size' => 5,
			'margin' => 1,
			'saveandprint' => $saveandprint,
			'outputformat' => $outputformat
		];
		$this->data['qrc_mecard'] = $this->php_qrcode->generate($mecard);

		// CONTACT >> BIZCARD
		$bizcard = [
			'data' => 'BIZCARD:N:Doe;X:John;T:Software Engineer;C:My Company Inc.;A:76 9th Avenue, 4th Floor, New York, NY 10011;B:(049)012-345-678;E:john.doe@example.com;;',
			'save_folder' => $save_folder,
			'save_name' => 'qrc_bizcard',
			'level' => 'L',
			'size' => 5,
			'margin' => 1,
			'saveandprint' => $saveandprint,
			'outputformat' => $outputformat
		];
		$this->data['qrc_bizcard'] = $this->php_qrcode->generate($bizcard);

		// CONTACT >> VCARD SIMPLE
		$vcard_simple_data = 'BEGIN:VCARD'."\n";
		$vcard_simple_data.= 'FN:John Doe'."\n";
		$vcard_simple_data.= 'TEL;WORK;VOICE:(049)012-345-678'."\n";
		$vcard_simple_data.= 'END:VCARD';

		$vcard_simple = [
			'data' => $vcard_simple_data,
			'save_folder' => $save_folder,
			'save_name' => 'qrc_vcard_simple',
			'level' => 'L',
			'size' => 5,
			'margin' => 1,
			'saveandprint' => $saveandprint,
			'outputformat' => $outputformat
		];
		$this->data['qrc_vcard_simple'] = $this->php_qrcode->generate($vcard_simple);

		// CONTACT >> VCARD DETAILED
		$vcard_detailed_data = 'BEGIN:VCARD'."\n";
		$vcard_detailed_data.= 'VERSION:2.1'."\n";
		$vcard_detailed_data.= 'N:Doe;John'."\n";
		$vcard_detailed_data.= 'FN:John Doe'."\n";
		$vcard_detailed_data.= 'ORG:My Company Inc.'."\n";
		$vcard_detailed_data.= 'TEL;WORK;VOICE:(049)012-345-678'."\n";
		$vcard_detailed_data.= 'TEL;HOME;VOICE:(049)012-345-987'."\n";
		$vcard_detailed_data.= 'TEL;TYPE=cell:(049)888-123-123'."\n";
		$vcard_detailed_data.= 'ADR;TYPE=work;LABEL="Our Office":;Suite 123;7th Avenue;New York;NY;91921-1234;USA'."\n";
		$vcard_detailed_data.= 'EMAIL:john.doe@example.com'."\n";
		$vcard_detailed_data.= 'END:VCARD';

		$vcard_detailed = [
			'data' => $vcard_detailed_data,
			'save_folder' => $save_folder,
			'save_name' => 'qrc_vcard_detailed',
			'level' => 'L',
			'size' => 5,
			'margin' => 1,
			'saveandprint' => $saveandprint,
			'outputformat' => $outputformat
		];
		$this->data['qrc_vcard_detailed'] = $this->php_qrcode->generate($vcard_detailed);

		// ------------------------------------------------------------

		// SMS
		$sms = [
			'data' => 'sms:+33123456789',
			'save_folder' => $save_folder,
			'save_name' => 'qrc_sms',
			'level' => 'L',
			'size' => 5,
			'margin' => 1,
			'saveandprint' => $saveandprint,
			'outputformat' => $outputformat
		];
		$this->data['qrc_sms'] = $this->php_qrcode->generate($sms);

		// ------------------------------------------------------------

		// MAPS
		$maps = [
			'data' => 'geo:40.742024,-74.004501,100',
			'save_folder' => $save_folder,
			'save_name' => 'qrc_maps',
			'level' => 'L',
			'size' => 5,
			'margin' => 1,
			'saveandprint' => $saveandprint,
			'outputformat' => $outputformat
		];
		$this->data['qrc_maps'] = $this->php_qrcode->generate($maps);

		// ------------------------------------------------------------

		// CALENDAR
		$calendar_data = 'BEGIN:VEVENT'."\n";
		$calendar_data.= 'SUMMARY:Summer Vacation!'."\n";
		$calendar_data.= 'DTSTART:20180601T070000Z'."\n";
		$calendar_data.= 'DTEND:20180831T070000Z'."\n";
		$calendar_data.= 'END:VEVENT';

		$calendar = [
			'data' => $calendar_data,
			'save_folder' => $save_folder,
			'save_name' => 'qrc_calendar',
			'level' => 'L',
			'size' => 5,
			'margin' => 1,
			'saveandprint' => $saveandprint,
			'outputformat' => $outputformat
		];
		$this->data['qrc_calendar'] = $this->php_qrcode->generate($calendar);

		// ------------------------------------------------------------

		// WI-FI
		$wifi = [
			'data' => 'WIFI:S:My SSID;T:WPA;P:my_passphrase;false',
			'save_folder' => $save_folder,
			'save_name' => 'qrc_wifi',
			'level' => 'L',
			'size' => 5,
			'margin' => 1,
			'saveandprint' => $saveandprint,
			'outputformat' => $outputformat
		];
		$this->data['qrc_wifi'] = $this->php_qrcode->generate($wifi);

		// ------------------------------------------------------------

		$this->load->view('welcome_message', $this->data);
	}
}
