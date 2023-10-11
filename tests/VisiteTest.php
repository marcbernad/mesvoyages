<?php


namespace App\Tests;

use App\Entity\Environnement;
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
    
    public function testAddEnvironnement(){
        $environnement = new Environnement();
        $environnement->setNom("plage");
        $visite = new Visite();
        $visite->addEnvironnement($environnement);
        $nbEnvironnementAvant = $visite->getEnvironnements()->count();
        $visite->addEnvironnement($environnement);
        $nbEnvironnementApres = $visite->getEnvironnements()->count();
        $this->assertEquals($nbEnvironnementAvant, $nbEnvironnementApres, "ajout même environnement devrait échouer");
    }  
}
