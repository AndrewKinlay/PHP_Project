<?php
/**
 * Created by PhpStorm.
 * User: matt smith
 * Date: 27/01/2016
 * Time: 18:24
 */

namespace ItbTest;

use Hdip\Model;

class UserTest extends \PHPUnit_Framework_TestCase
{
    public function testCanBeCreated()
    {
        // Arrange
        $p = new Model\User();

        // Act

        // Assert
        $this->assertNotNull($p);
    }

    public function testCanSetGetid()
    {
        // Arrange
        $p = new Model\User();
        $p->setid('101');
        $expectedResult = '101';

        // Act
        $result = $p->getid();

        // Assert
        $this->assertEquals($expectedResult, $result);
    }

    public function testCanSetGetUsername()
    {
        // Arrange
        $p = new Model\User();
        $p->setUsername('Andrew');
        $expectedResult = 'Andrew';

        // Act
        $result = $p->getUsername();

        // Assert
        $this->assertEquals($expectedResult, $result);
    }

    public function testCanSetGetPassword()
    {
        // Arrange
        $p = new Model\User();
        $p->setPassword('qwerty');
        $expectedResult = 'qwerty';

        // Act
        $result = $p->getPassword();

        // Assert
        $this->assertEquals($expectedResult, $result);
    }

    public function testCanSetGetRole()
    {
        // Arrange
        $p = new Model\User();
        $p->setRole('1');
        $expectedResult = '1';

        // Act
        $result = $p->getRole();

        // Assert
        $this->assertEquals($expectedResult, $result);
    }
}
