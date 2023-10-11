<?php


namespace App\Tests;

use App\Entity\Visite;
use DateTime;
use PHPUnit\Framework\TestCase;

/**
 * Description of VisiteTest
 *
 * @author marcb
 */
class VisiteTest extends TestCase {
    
    public function testGetDateCreationString(){
        $visite = new Visite();
        $visite->setDatecreation(new DateTime("2023-04-29"));
        $this->assertEquals("29/04/2023", $visite->getDateCreationString());
    }
}
