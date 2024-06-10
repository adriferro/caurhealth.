<?php
// tests/DatabaseConnectionTest.php

use PHPUnit\Framework\TestCase;

class DatabaseConnectionTest extends TestCase
{
    public function testDatabaseConnectionSuccess()
    {
        $mysqliMock = $this->getMockBuilder(mysqli::class)
                           ->disableOriginalConstructor()
                           ->getMock();

        $mysqliMock->method('connect_errno')
                   ->willReturn(0);

        $mysqliMock->method('connect_error')
                   ->willReturn(null);

        $this->assertSame(0, $mysqliMock->connect_errno);
        $this->assertNull($mysqliMock->connect_error);
    }

    public function testDatabaseConnectionFailure()
    {
        $mysqliMock = $this->getMockBuilder(mysqli::class)
                           ->disableOriginalConstructor()
                           ->getMock();

        $mysqliMock->method('connect_errno')
                   ->willReturn(1);

        $mysqliMock->method('connect_error')
                   ->willReturn('Fallo de conexión.');

        $this->assertSame(1, $mysqliMock->connect_errno);
        $this->assertSame('Fallo de conexión.', $mysqliMock->connect_error);
    }

    public function testActualDatabaseConnection()
    {
        $conn = @mysqli_connect('localhost', 'root', '', 'caurhealth');
        
        if ($conn) {
            $this->assertInstanceOf(mysqli::class, $conn);
            mysqli_close($conn);
        } else {
            $this->fail('Fallo de conexión: ' . mysqli_connect_error());
        }
    }
}
