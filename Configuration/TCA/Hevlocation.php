<?php
if (!defined ('TYPO3_MODE')) {
	die ('Access denied.');
}

$GLOBALS['TCA']['tx_hevlocation_domain_model_hevlocation'] = array(
	'ctrl' => $GLOBALS['TCA']['tx_hevlocation_domain_model_hevlocation']['ctrl'],
	'interface' => array(
		'showRecordFieldList' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, header, location, target, display_section_name, bodytext',
	),
	'types' => array(
		'1' => array('showitem' => 'sys_language_uid;;;;1-1-1, l10n_parent, l10n_diffsource, hidden;;1, header, location, target, display_section_name, bodytext;;;richtext:rte_transform[mode=ts_links], --div--;LLL:EXT:cms/locallang_ttc.xlf:tabs.access, starttime, endtime'),
	),
	'palettes' => array(
		'1' => array('showitem' => ''),
	),
	'columns' => array(
	
		'sys_language_uid' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.language',
			'config' => array(
				'type' => 'select',
				'foreign_table' => 'sys_language',
				'foreign_table_where' => 'ORDER BY sys_language.title',
				'items' => array(
					array('LLL:EXT:lang/locallang_general.xlf:LGL.allLanguages', -1),
					array('LLL:EXT:lang/locallang_general.xlf:LGL.default_value', 0)
				),
			),
		),
		'l10n_parent' => array(
			'displayCond' => 'FIELD:sys_language_uid:>:0',
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.l18n_parent',
			'config' => array(
				'type' => 'select',
				'items' => array(
					array('', 0),
				),
				'foreign_table' => 'tx_hevlocation_domain_model_hevlocation',
				'foreign_table_where' => 'AND tx_hevlocation_domain_model_hevlocation.pid=###CURRENT_PID### AND tx_hevlocation_domain_model_hevlocation.sys_language_uid IN (-1,0)',
			),
		),
		'l10n_diffsource' => array(
			'config' => array(
				'type' => 'passthrough',
			),
		),

		't3ver_label' => array(
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.versionLabel',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'max' => 255,
			)
		),
	
		'hidden' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.hidden',
			'config' => array(
				'type' => 'check',
			),
		),
		'starttime' => array(
			'exclude' => 1,
			'l10n_mode' => 'mergeIfNotBlank',
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.starttime',
			'config' => array(
				'type' => 'input',
				'size' => 13,
				'max' => 20,
				'eval' => 'datetime',
				'checkbox' => 0,
				'default' => 0,
				'range' => array(
					'lower' => mktime(0, 0, 0, date('m'), date('d'), date('Y'))
				),
			),
		),
		'endtime' => array(
			'exclude' => 1,
			'l10n_mode' => 'mergeIfNotBlank',
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.endtime',
			'config' => array(
				'type' => 'input',
				'size' => 13,
				'max' => 20,
				'eval' => 'datetime',
				'checkbox' => 0,
				'default' => 0,
				'range' => array(
					'lower' => mktime(0, 0, 0, date('m'), date('d'), date('Y'))
				),
			),
		),

		'header' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:hevlocation/Resources/Private/Language/locallang_db.xlf:tx_hevlocation_domain_model_hevlocation.header',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'location' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:hevlocation/Resources/Private/Language/locallang_db.xlf:tx_hevlocation_domain_model_hevlocation.location',
			'config' => array(
				'type' => 'select',
				'items' => array(
					array('-- Label --', 0),
				),
				'size' => 1,
				'maxitems' => 1,
				'eval' => ''
			),
		),
		'target' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:hevlocation/Resources/Private/Language/locallang_db.xlf:tx_hevlocation_domain_model_hevlocation.target',
			'config' => array(
				'type' => 'input',
				'size' => 4,
				'eval' => 'int'
			)
		),
		'display_section_name' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:hevlocation/Resources/Private/Language/locallang_db.xlf:tx_hevlocation_domain_model_hevlocation.display_section_name',
			'config' => array(
				'type' => 'check',
				'default' => 0
			)
		),
		'bodytext' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:hevlocation/Resources/Private/Language/locallang_db.xlf:tx_hevlocation_domain_model_hevlocation.bodytext',
			'config' => array(
				'type' => 'text',
				'cols' => 40,
				'rows' => 15,
				'eval' => 'trim',
				'wizards' => array(
					'RTE' => array(
						'icon' => 'wizard_rte2.gif',
						'notNewRecords'=> 1,
						'RTEonly' => 1,
						'script' => 'wizard_rte.php',
						'title' => 'LLL:EXT:cms/locallang_ttc.xlf:bodytext.W.RTE',
						'type' => 'script'
					)
				)
			),
		),
		
	),
);
