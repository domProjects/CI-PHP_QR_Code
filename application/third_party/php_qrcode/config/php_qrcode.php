<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| Use Cache
| -------------------------------------------------------------------------
| More disk reads but less CPU power, masks and format templates are stored
| there
|
|     Default value => TRUE
*/
$config['cacheable'] = TRUE;

/*
| -------------------------------------------------------------------------
| Cache Directory
| -------------------------------------------------------------------------
| Used when $config['cacheable'] = TRUE
*/
$config['cache_dir'] = 'application'.DIRECTORY_SEPARATOR.'cache'.DIRECTORY_SEPARATOR;

/*
| -------------------------------------------------------------------------
| Log Directory
| -------------------------------------------------------------------------
| Default error logs directory
*/
$config['log_dir'] = 'application'.DIRECTORY_SEPARATOR.'logs'.DIRECTORY_SEPARATOR;

/*
| -------------------------------------------------------------------------
| Find Best Mask
| -------------------------------------------------------------------------
| If TRUE, estimates best mask (spec. default, but extremally slow; set to
| false to significant performance boost but (propably) worst quality code
|
|          Default value => TRUE
*/
$config['find_best_mask'] = TRUE;

/*
| -------------------------------------------------------------------------
| Find From Random
| -------------------------------------------------------------------------
| If FALSE, checks all masks available, otherwise value tells count of
| masks need to be checked, mask id are got randomly
|
|            Default value => FALSE
*/
$config['find_from_random'] = FALSE;

/*
| -------------------------------------------------------------------------
| Default Mask
| -------------------------------------------------------------------------
| Used when $config['find_best_mask'] = FALSE
|
|        Default value => 2
*/
$config['default_mask'] = 2;

/*
| -------------------------------------------------------------------------
| PNG Maximum Size
| -------------------------------------------------------------------------
| Maximum allowed png image width (in pixels), tune to make sure GD and PHP
| can handle such big images
|
|            Default value => 1024
*/
$config['png_maximum_size'] = 1024;
