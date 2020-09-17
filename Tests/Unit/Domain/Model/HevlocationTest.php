<?php

namespace Eoss\Hevlocation\Tests\Unit\Domain\Model;

/***************************************************************
 *  Copyright notice
 *
 *  (c) 2015 Joachim Rinck <jr@eoss.ch>, eoss
 *
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 2 of the License, or
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
 * Test case for class \Eoss\Hevlocation\Domain\Model\Hevlocation.
 *
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 * @author Joachim Rinck <jr@eoss.ch>
 */
class HevlocationTest extends \TYPO3\CMS\Core\Tests\UnitTestCase {
	/**
	 * @var \Eoss\Hevlocation\Domain\Model\Hevlocation
	 */
	protected $subject = NULL;

	protected function setUp() {
		$this->subject = new \Eoss\Hevlocation\Domain\Model\Hevlocation();
	}

	protected function tearDown() {
		unset($this->subject);
	}

	/**
	 * @test
	 */
	public function getHeaderReturnsInitialValueForString() {
		$this->assertSame(
			'',
			$this->subject->getHeader()
		);
	}

	/**
	 * @test
	 */
	public function setHeaderForStringSetsHeader() {
		$this->subject->setHeader('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'header',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getLocationReturnsInitialValueForInteger() {
		$this->assertSame(
			0,
			$this->subject->getLocation()
		);
	}

	/**
	 * @test
	 */
	public function setLocationForIntegerSetsLocation() {
		$this->subject->setLocation(12);

		$this->assertAttributeEquals(
			12,
			'location',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getTargetReturnsInitialValueForInteger() {
		$this->assertSame(
			0,
			$this->subject->getTarget()
		);
	}

	/**
	 * @test
	 */
	public function setTargetForIntegerSetsTarget() {
		$this->subject->setTarget(12);

		$this->assertAttributeEquals(
			12,
			'target',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getDisplaySectionNameReturnsInitialValueForBoolean() {
		$this->assertSame(
			FALSE,
			$this->subject->getDisplaySectionName()
		);
	}

	/**
	 * @test
	 */
	public function setDisplaySectionNameForBooleanSetsDisplaySectionName() {
		$this->subject->setDisplaySectionName(TRUE);

		$this->assertAttributeEquals(
			TRUE,
			'displaySectionName',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getBodytextReturnsInitialValueForString() {
		$this->assertSame(
			'',
			$this->subject->getBodytext()
		);
	}

	/**
	 * @test
	 */
	public function setBodytextForStringSetsBodytext() {
		$this->subject->setBodytext('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'bodytext',
			$this->subject
		);
	}
}
