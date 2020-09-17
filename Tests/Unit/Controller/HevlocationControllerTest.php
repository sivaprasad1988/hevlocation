<?php
namespace Eoss\Hevlocation\Tests\Unit\Controller;
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
 * Test case for class Eoss\Hevlocation\Controller\HevlocationController.
 *
 * @author Joachim Rinck <jr@eoss.ch>
 */
class HevlocationControllerTest extends \TYPO3\CMS\Core\Tests\UnitTestCase {

	/**
	 * @var \Eoss\Hevlocation\Controller\HevlocationController
	 */
	protected $subject = NULL;

	protected function setUp() {
		$this->subject = $this->getMock('Eoss\\Hevlocation\\Controller\\HevlocationController', array('redirect', 'forward', 'addFlashMessage'), array(), '', FALSE);
	}

	protected function tearDown() {
		unset($this->subject);
	}

	/**
	 * @test
	 */
	public function listActionFetchesAllHevlocationsFromRepositoryAndAssignsThemToView() {

		$allHevlocations = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array(), array(), '', FALSE);

		$hevlocationRepository = $this->getMock('Eoss\\Hevlocation\\Domain\\Repository\\HevlocationRepository', array('findAll'), array(), '', FALSE);
		$hevlocationRepository->expects($this->once())->method('findAll')->will($this->returnValue($allHevlocations));
		$this->inject($this->subject, 'hevlocationRepository', $hevlocationRepository);

		$view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
		$view->expects($this->once())->method('assign')->with('hevlocations', $allHevlocations);
		$this->inject($this->subject, 'view', $view);

		$this->subject->listAction();
	}

	/**
	 * @test
	 */
	public function showActionAssignsTheGivenHevlocationToView() {
		$hevlocation = new \Eoss\Hevlocation\Domain\Model\Hevlocation();

		$view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
		$this->inject($this->subject, 'view', $view);
		$view->expects($this->once())->method('assign')->with('hevlocation', $hevlocation);

		$this->subject->showAction($hevlocation);
	}
}
