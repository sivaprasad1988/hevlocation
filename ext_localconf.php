<?php
if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
	'Eoss.' . $_EXTKEY,
	'Hevlocation',
	array(
		'Hevlocation' => 'locationform, list, show',
		
	),
	// non-cacheable actions
	array(
		'Hevlocation' => 'locationformAction',
		
	)
);


$GLOBALS['TYPO3_CONF_VARS']['FE']['eID_include']['autocomplete'] = Eoss\Hevlocation\Utility\Autocomplete::class . '::searchAction';