<?php
namespace Eoss\Hevlocation\Domain\Model;


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
 * Hevlocation
 */
class Hevlocation extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {

	/**
	 * header
	 *
	 * @var string
	 */
	protected $header = '';

	/**
	 * location
	 *
	 * @var integer
	 */
	protected $location = 0;

	/**
	 * target
	 *
	 * @var integer
	 */
	protected $target = 0;

	/**
	 * displaySectionName
	 *
	 * @var boolean
	 */
	protected $displaySectionName = FALSE;

	/**
	 * bodytext
	 *
	 * @var string
	 */
	protected $bodytext = '';

	/**
	 * Returns the header
	 *
	 * @return string $header
	 */
	public function getHeader() {
		return $this->header;
	}

	/**
	 * Sets the header
	 *
	 * @param string $header
	 * @return void
	 */
	public function setHeader($header) {
		$this->header = $header;
	}

	/**
	 * Returns the location
	 *
	 * @return integer $location
	 */
	public function getLocation() {
		return $this->location;
	}

	/**
	 * Sets the location
	 *
	 * @param integer $location
	 * @return void
	 */
	public function setLocation($location) {
		$this->location = $location;
	}

	/**
	 * Returns the target
	 *
	 * @return integer $target
	 */
	public function getTarget() {
		return $this->target;
	}

	/**
	 * Sets the target
	 *
	 * @param integer $target
	 * @return void
	 */
	public function setTarget($target) {
		$this->target = $target;
	}

	/**
	 * Returns the displaySectionName
	 *
	 * @return boolean $displaySectionName
	 */
	public function getDisplaySectionName() {
		return $this->displaySectionName;
	}

	/**
	 * Sets the displaySectionName
	 *
	 * @param boolean $displaySectionName
	 * @return void
	 */
	public function setDisplaySectionName($displaySectionName) {
		$this->displaySectionName = $displaySectionName;
	}

	/**
	 * Returns the boolean state of displaySectionName
	 *
	 * @return boolean
	 */
	public function isDisplaySectionName() {
		return $this->displaySectionName;
	}

	/**
	 * Returns the bodytext
	 *
	 * @return string $bodytext
	 */
	public function getBodytext() {
		return $this->bodytext;
	}

	/**
	 * Sets the bodytext
	 *
	 * @param string $bodytext
	 * @return void
	 */
	public function setBodytext($bodytext) {
		$this->bodytext = $bodytext;
	}

}