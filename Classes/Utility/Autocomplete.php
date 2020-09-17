<?php
namespace Eoss\Hevlocation\Utility;


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
use Psr\Http\Message\ResponseInterface; 
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;

use TYPO3\CMS\Extbase\Object\ObjectManager;
use TYPO3\CMS\Core\Localization\LanguageService;
use TYPO3\CMS\Core\Utility\GeneralUtility;

use TYPO3\CMS\Core\Database\ConnectionPool;
use TYPO3\CMS\Core\Database\Connection;

class Autocomplete
{
 
    /**
    * @param ResponseInterface $response
    */
    public function searchAction(ServerRequestInterface $request, ResponseInterface $response): ResponseInterface
    {
        $parameters = array();
        /*
        $this->getDatabaseConnection()->exec_SELECTgetRows('sm.name as settlementname,sm.postal as settlementpostal,sm.sid as sid,
                            sec.companyname as sectionname ', 'tx_hevsectioninfo_settlement sm left join tx_hevsectioninfo_section sec on sm.section=sec.uid', ''
                        );
         */

        $queryBuilder = GeneralUtility::makeInstance(ConnectionPool::class)->getQueryBuilderForTable('tx_hevsectioninfo_settlement');
        $rows = $queryBuilder
            ->select('tx_hevsectioninfo_settlement.name as settlementname', 'tx_hevsectioninfo_settlement.postal as settlementpostal','tx_hevsectioninfo_settlement.sid as sid',' sec.companyname as sectionname')
            ->from('tx_hevsectioninfo_settlement')
            ->leftJoin(
                'tx_hevsectioninfo_settlement',
                'tx_hevsectioninfo_section',
                'sec',
                $queryBuilder->expr()->eq('tx_hevsectioninfo_settlement.section', $queryBuilder->quoteIdentifier('sec.uid'))
            ) 
            ->execute()
            ->fetchAll(); 
        $json_response = array();

        foreach ($rows as $key => $row  ) {
            $row_array['label'] = $row['settlementpostal'] . " " . $row['settlementname'];
            $row_array['value'] = $row['sid'];
            $row_array['sectionname'] = $row['sectionname'];
            //push the values in the array
            array_push($json_response,$row_array);
        }

        $response->getBody()->write(json_encode($json_response));
        return $response
            ->withStatus(200)
            ->withHeader('Content-Type', 'application/json');
    } 
}