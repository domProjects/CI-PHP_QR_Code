<?php
/**
 * PHP QR Code for Codeigniter
 *
 * @package		CodeIgniter
 * @subpackage	Libraries
 * @category	Libraries
 * 
 * @version		1.0.0
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Php_qrcode {

	/**
	 * @var	
	 */
	protected $CI;

	/**
	 * @var	string[]
	 */
	protected $ecc_level = [
		'L',
		'M',
		'Q',
		'H'
	];

	/**
	 * @var	string[]
	 */
	protected $output_format = [
		'jpg',
		'png',
		'svg'
	];

	// --------------------------------------------------------------------

	/**
	 * Constructor - Sets Php_qrcode Preferences
	 */
	public function __construct()
	{
		//
		$CI =& get_instance();

		//
		$CI->config->load('php_qrcode', TRUE);

		//
		define('QR_CACHEABLE', $CI->config->item('cacheable', 'php_qrcode'));
		define('QR_CACHE_DIR', $CI->config->item('cache_dir', 'php_qrcode'));
		define('QR_LOG_DIR', $CI->config->item('log_dir', 'php_qrcode'));
		define('QR_FIND_BEST_MASK', $CI->config->item('find_best_mask', 'php_qrcode'));
		define('QR_FIND_FROM_RANDOM', $CI->config->item('find_from_random', 'php_qrcode'));
		define('QR_PNG_MAXIMUM_SIZE', $CI->config->item('png_maximum_size', 'php_qrcode'));

		if ($CI->config->item('find_best_mask', 'php_qrcode') === FALSE)
		{
			define('QR_DEFAULT_MASK', $CI->config->item('default_mask', 'php_qrcode'));
		}

		//
		define('QR_BASEDIR', dirname(__FILE__).DIRECTORY_SEPARATOR);

		include QR_BASEDIR.'qrconst.php';
		include QR_BASEDIR.'qrtools.php';
		include QR_BASEDIR.'qrspec.php';
		include QR_BASEDIR.'qrimage.php';
		include QR_BASEDIR.'qrinput.php';
		include QR_BASEDIR.'qrbitstream.php';
		include QR_BASEDIR.'qrsplit.php';
		include QR_BASEDIR.'qrrscode.php';
		include QR_BASEDIR.'qrmask.php';
		include QR_BASEDIR.'qrencode.php';

		//
		log_message('info', 'CIqrcode Class Initialized');
	}

	// --------------------------------------------------------------------

	public function generate($param = [])
	{
		//
		foreach ($param as $key => $val)
		{
			$this->$key = $val;
		}

		//
		$data = (string) $this->_data($this->data);

		//
		if ($data !== FALSE)
		{
			$save_folder = (string) $this->_save_folder($this->save_folder);
			$save_name = (string) $this->_save_name($this->save_name);
			$outputformat = (string) $this->_outputformat($this->outputformat);
			$level = (string) $this->_level($this->level);
			$size = (int) $this->_size($this->size);
			$margin = (int) $this->_margin($this->margin);
			$saveandprint = (bool) $this->_saveandprint($this->saveandprint);

			if ($outputformat === 'png')
			{
				if ($save_name !== FALSE)
				{
					$file = $save_folder.$save_name.'.'.$outputformat;

					QRcode::png($data, $file, $level, $size, $margin, $saveandprint);

					return $file;
				}
				else
				{
					QRcode::png($data, FALSE, $level, $size, $margin, $saveandprint);
				}
			}
		}

		$this->clear($param);
	}

	// --------------------------------------------------------------------

	/**
	 * Clears the Php_qrcode values. Useful if multiple QR Code are being generated
	 *
	 * @return	Php_qrcode
	 */
	public function clear($param = [])
	{
		foreach ($param as $key => $val)
		{
			$this->$key = '';
		}

		return $this;
	}

	// --------------------------------------------------------------------

	private function _data($val)
	{
		return isset($val) ? $val : FALSE;
	}

	// --------------------------------------------------------------------

	private function _save_folder($val)
	{
		return isset($val) ? $val : FALSE;
	}

	// --------------------------------------------------------------------

	private function _save_name($val)
	{
		return isset($val) ? $val : FALSE;
	}

	// --------------------------------------------------------------------

	private function _level($val)
	{
		return (isset($val) && in_array($val, $this->ecc_level)) ? $val : 'L';
	}

	// --------------------------------------------------------------------

	private function _size($val)
	{
		return isset($val) ? min(max($val, 1), 10) : 3;
	}

	// --------------------------------------------------------------------

	private function _margin($val)
	{
		return isset($val) ? min(max($val, 1), 10) : 4;
	}

	// --------------------------------------------------------------------

	private function _saveandprint($val)
	{
		return isset($val) ? $val : FALSE;
	}

	// --------------------------------------------------------------------

	private function _outputformat($val)
	{
		return (isset($val) && in_array($val, $this->output_format)) ? $val : FALSE;
	}
}
