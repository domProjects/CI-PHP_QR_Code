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
			'data' => 'mailto:john.doe@example.com?subject=Mail%20from%20Our%20Site',
			'save_folder' => $save_folder,
			'save_name' => 'qrc_email_address_with_subject',
			'level' => 'L',
			'size' => 5,
			'margin' => 1,
			'saveandprint' => $saveandprint,
			'outputformat' => $outputformat
		];
		$this->data['qrc_email_2'] = $this->php_qrcode->generate($email_2);

		// ------------------------------------------------------------

		// TEL
		$tel = [
			'data' => 'tel:+33123456789',
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
			'data' => 'MECARD:N:Doe,John;ADR:76 9th Avenue, 4th Floor, New York, NY 10011;TEL:+33123456789;EMAIL:john.doe@example.com;;',
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
			'data' => 'BIZCARD:N:Doe;X:John;T:Software Engineer;C:Google;A:76 9th Avenue, 4th Floor, New York, NY 10011;B:+33123456789;E:john.doe@example.com;;',
			'save_folder' => $save_folder,
			'save_name' => 'qrc_bizcard',
			'level' => 'L',
			'size' => 5,
			'margin' => 1,
			'saveandprint' => $saveandprint,
			'outputformat' => $outputformat
		];
		$this->data['qrc_bizcard'] = $this->php_qrcode->generate($bizcard);

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
		$calendar = [
			'data' => 'BEGIN:VEVENT
SUMMARY:Summer Vacation!
DTSTART:20180601T070000Z
DTEND:20180831T070000Z
END:VEVENT',
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
