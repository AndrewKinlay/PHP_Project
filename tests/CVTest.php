<?php
/**
 * Created by PhpStorm.
 * User: matt smith
 * Date: 27/01/2016
 * Time: 18:24
 */

namespace ItbTest;

use Hdip\Model;

class CVTest extends \PHPUnit_Framework_TestCase
{


    public function testCanBeCreated()
    {
        // Arrange
        $p = new Model\cv();

        // Act

        // Assert
        $this->assertNotNull($p);
    }


    public function testCanSetGetid()
    {
        // Arrange
        $p = new Model\cv();
        $p->setId('101');
        $expectedResult = '101';

        // Act
        $result = $p->getId();

        // Assert
        $this->assertEquals($expectedResult, $result);
    }

    public function testCanSetGetName()
    {
        // Arrange
        $p = new Model\cv();
        $p->setName('Andrew');
        $expectedResult = 'Andrew';

        // Act
        $result = $p->getName();

        // Assert
        $this->assertEquals($expectedResult, $result);
    }

    public function testCanSetGetSurname()
    {
        // Arrange
        $p = new Model\cv();
        $p->setSurname('Kinlay');
        $expectedResult = 'Kinlay';

        // Act
        $result = $p->getSurname();

        // Assert
        $this->assertEquals($expectedResult, $result);
    }

    public function testCanSetGetExperience()
    {
        // Arrange
        $p = new Model\cv();
        $p->setExperience('IBM');
        $expectedResult = 'IBM';

        // Act
        $result = $p->getExperience();

        // Assert
        $this->assertEquals($expectedResult, $result);
    }

    public function testCanSetGetSkills()
    {
        // Arrange
        $p = new Model\cv();
        $p->setSkills('Photoshop');
        $expectedResult = 'Photoshop';

        // Act
        $result = $p->getSkills();

        // Assert
        $this->assertEquals($expectedResult, $result);
    }

    public function testCanSetGetAchievements()
    {
        // Arrange
        $p = new Model\cv();
        $p->setAchievements('none');
        $expectedResult = 'none';

        // Act
        $result = $p->getAchievements();

        // Assert
        $this->assertEquals($expectedResult, $result);
    }
}
