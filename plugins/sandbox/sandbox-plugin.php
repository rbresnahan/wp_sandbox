<?php
/**
 * @package sandbox
 * @version 1.0.0
 */
/*
Plugin Name: Sandbox
Description: Sandbox
Author: Ryan Bresnahan
Version: 1.0.0
*/

/* CPT */
require_once __DIR__ . '/CPT/custom-post-types.php';

/* Actions */
require_once __DIR__ . '/Actions/ajax-votes.php';
require_once __DIR__ . '/Actions/ajax-bookmark.php';

/* Enqueue */
require_once __DIR__ . '/assets/enqueuers/enqueue-ajax.php';


