<?php
namespace Eoss\Hevlocation\Controller;


/***************************************************************
 *
 *  Copyright notice
 *
 *  (c) 2015 Joachim Rinck <jr@eoss.ch>, eoss
 *
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 3 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/

/**
 * HevlocationController
 */
class HevlocationController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController {

	/**
	 * hevlocationRepository
	 *
	 * @var \Eoss\Hevlocation\Domain\Repository\HevlocationRepository
	 * @inject
	 */
	protected $hevlocationRepository = NULL;


	/**
	 * action locationform
	 *
	 * @return void
	 */
	public function locationformAction() {
		
		$ort = (string)\TYPO3\CMS\Core\Utility\GeneralUtility::_GP("settlement");
		$sid = (string)\TYPO3\CMS\Core\Utility\GeneralUtility::_GP("SID");
		$sid_pattern = '/[0-9][0-9][0-9]/';

	 
		
		if (preg_match($sid_pattern, $sid)) {
			$this->view->assign('sid', $sid);
		}
		
		//\TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump(__FILE__.__LINE__.': '.$ort); 
		
		$target = $this->settings['target'];
		if(empty($target)) {
			$target = intval($GLOBALS['TSFE']->id);
		}
		$this->view->assign('target', $target);
		$this->view->assign('ort', $ort);
    	
    	$this->view->assign('contentId', $this->settings['contenttohide']);
		
		$buttontext = $this->settings['buttontext'];
		if ($buttontext == '') {
			$buttontext = 'Suchen';
		}
		$this->view->assign('buttontext', $buttontext);
		
		
	}
	/**
	 * action locationform
	 *
	 * @return void
	 */
	public function cantonMapAction() {
		
		$kt = (string)\TYPO3\CMS\Core\Utility\GeneralUtility::_GP("KT");
		$kt_pattern = '/[A-Z][A-Z]/';
	
		if (preg_match($kt_pattern, $kt)) {
			$this->view->assign('kt', $kt);
		}
	
		// \TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump(__FILE__.__LINE__.': '.$ort);
	
		// $target = 27558;
		$target = $this->settings['target'];
		
		
		// \TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump(__FILE__.__LINE__.': '.$target);
		
		
		
		if(empty($target)) {
			$target = intval($GLOBALS['TSFE']->id);
		}
		
		

		
		$cantons = array();
		$cantons['ag'] = 'AG';
		$cantons['ai'] = 'AI';
		$cantons['ar'] = 'AR';
		$cantons['be'] = 'BE';
		$cantons['bl'] = 'BL';
		$cantons['bs'] = 'BS';
		$cantons['fr'] = 'FR';
		$cantons['ge'] = 'GE';
		$cantons['gl'] = 'GL';
		$cantons['gr'] = 'GR';
		$cantons['ju'] = 'JU';
		$cantons['lu'] = 'LU';
		$cantons['ne'] = 'NE';
		$cantons['nw'] = 'NW';
		$cantons['ow'] = 'OW';
		$cantons['sg'] = 'SG';
		$cantons['sh'] = 'SH';
		$cantons['so'] = 'SO';
		$cantons['sz'] = 'SZ';
		$cantons['tg'] = 'TG';
		$cantons['ti'] = 'TI';
		$cantons['ur'] = 'UR';
		$cantons['vd'] = 'VD';
		$cantons['vs'] = 'VS';
		$cantons['zg'] = 'ZG';
		$cantons['zh'] = 'ZH';
		
		$this->view->assign('target', $target);
		$this->view->assign('cantons', $cantons);
		$this->view->assign('ort', $ort);
	
	
	}	
	
	/**
	 * action show
	 *
	 * @param \Eoss\Hevlocation\Domain\Model\Hevlocation $hevlocation
	 * @return void
	 */
	public function showAction(\Eoss\Hevlocation\Domain\Model\Hevlocation $hevlocation) {
		$ort = (string)\TYPO3\CMS\Core\Utility\GeneralUtility::_GP("settlement");
		\TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump(__FILE__.__LINE__.$ort);
		
		$this->view->assign('ort', $ort);
		//$this->view->assign('hevlocation', $hevlocation);
	}

}