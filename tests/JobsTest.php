<?php
/**
 * Created by PhpStorm.
 * User: matt smith
 * Date: 27/01/2016
 * Time: 18:24
 */

namespace ItbTest;

use Hdip\Model;

class JobsTest extends \PHPUnit_Framework_TestCase
{


    public function testCanBeCreated()
    {
        // Arrange
        $p = new Model\Jobs();

        // Act

        // Assert
        $this->assertNotNull($p);
    }


    public function testCanSetGetid()
    {
        // Arrange
        $p = new Model\Jobs();
        $p->setId('101');
        $expectedResult = '101';

        // Act
        $result = $p->getId();

        // Assert
        $this->assertEquals($expectedResult, $result);
    }

    public function testCanSetGetTitle()
    {
        // Arrange
        $p = new Model\Jobs();
        $p->setTitle('Designer');
        $expectedResult = 'Designer';

        // Act
        $result = $p->getTitle();

        // Assert
        $this->assertEquals($expectedResult, $result);
    }

    public function testCanSetGetEmployer()
    {
        // Arrange
        $p = new Model\Jobs();
        $p->setEmployer('JMAC');
        $expectedResult = 'JMAC';

        // Act
        $result = $p->getEmployer();

        // Assert
        $this->assertEquals($expectedResult, $result);
    }

    public function testCanSetGetLength()
    {
        // Arrange
        $p = new Model\Jobs();
        $p->setLength('1 week');
        $expectedResult = '1 week';

        // Act
        $result = $p->getLength();

        // Assert
        $this->assertEquals($expectedResult, $result);
    }

    public function testCanSetGetStartDate()
    {
        // Arrange
        $p = new Model\Jobs();
        $p->setStartDate('july 1st');
        $expectedResult = 'july 1st';

        // Act
        $result = $p->getStartDate();

        // Assert
        $this->assertEquals($expectedResult, $result);
    }
}
