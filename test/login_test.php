<?php
// tests/LoginTest.php

use PHPUnit\Framework\TestCase;

class LoginTest extends TestCase
{
    protected $conn;

    protected function setUp(): void
    {
        // Configura una conexión simulada a la base de datos
        $this->conn = $this->getMockBuilder(mysqli::class)
                           ->disableOriginalConstructor()
                           ->getMock();
    }

    public function testLoginSuccess()
    {
        $_POST['submit'] = true;
        $_POST['email'] = 'test@example.com';
        $_POST['password'] = 'password123';

        // Simula la consulta a la base de datos
        $resultMock = $this->createMock(mysqli_result::class);
        $this->conn->method('query')
                   ->willReturn($resultMock);
        $resultMock->method('num_rows')
                   ->willReturn(1);
        $resultMock->method('fetch_assoc')
                   ->willReturn(['id' => 1]);

        include '../login.php';

        $this->assertArrayHasKey('user_id', $_SESSION);
        $this->assertEquals(1, $_SESSION['user_id']);
    }

    public function testLoginFailure()
    {
        $_POST['submit'] = true;
        $_POST['email'] = 'wrong@example.com';
        $_POST['password'] = 'wrongpassword';

        // Simula la consulta a la base de datos
        $resultMock = $this->createMock(mysqli_result::class);
        $this->conn->method('query')
                   ->willReturn($resultMock);
        $resultMock->method('num_rows')
                   ->willReturn(0);

        include '../login.php';

        $this->assertNotContains('¡Sesión iniciada!', $message);
        $this->assertContains('¡Email o contraseña incorrectos!', $message);
    }
}
