<?php
if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
	$_EXTKEY,
	'Hevlocation',
	'hevlocation'
);



$pluginSignature = str_replace ( '_', '', $_EXTKEY ) . '_hevlocation';
$TCA ['tt_content'] ['types'] ['list'] ['subtypes_addlist'] [$pluginSignature] = 'pi_flexform';
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue ( $pluginSignature, 'FILE:EXT:' . $_EXTKEY . '/Configuration/Flexforms/flexform.xml' );




\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile($_EXTKEY, 'Configuration/TypoScript', 'HEV Location');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_hevlocation_domain_model_hevlocation', 'EXT:hevlocation/Resources/Private/Language/locallang_csh_tx_hevlocation_domain_model_hevlocation.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_hevlocation_domain_model_hevlocation');
$GLOBALS['TCA']['tx_hevlocation_domain_model_hevlocation'] = array(
	'ctrl' => array(
		'title'	=> 'LLL:EXT:hevlocation/Resources/Private/Language/locallang_db.xlf:tx_hevlocation_domain_model_hevlocation',
		'label' => 'header',
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		'dividers2tabs' => TRUE,

		'versioningWS' => 2,
		'versioning_followPages' => TRUE,

		'languageField' => 'sys_language_uid',
		'transOrigPointerField' => 'l10n_parent',
		'transOrigDiffSourceField' => 'l10n_diffsource',
		'delete' => 'deleted',
		'enablecolumns' => array(
			'disabled' => 'hidden',
			'starttime' => 'starttime',
			'endtime' => 'endtime',
		),
		'searchFields' => 'header,location,target,display_section_name,bodytext,',
		'dynamicConfigFile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($_EXTKEY) . 'Configuration/TCA/Hevlocation.php',
		'iconfile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($_EXTKEY) . 'Resources/Public/Icons/tx_hevlocation_domain_model_hevlocation.gif'
	),
);
