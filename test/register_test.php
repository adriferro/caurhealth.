<?php
// tests/RegisterTest.php

use PHPUnit\Framework\TestCase;

class RegisterTest extends TestCase
{
    protected $conn;

    protected function setUp(): void
    {
        // Configura una conexión simulada a la base de datos
        $this->conn = $this->getMockBuilder(mysqli::class)
                           ->disableOriginalConstructor()
                           ->getMock();
        $_POST = [];
        $_FILES = [];
    }

    public function testUserAlreadyExists()
    {
        $_POST['submit'] = true;
        $_POST['name'] = 'testuser';
        $_POST['email'] = 'test@example.com';
        $_POST['password'] = 'password123';
        $_POST['cpassword'] = 'password123';
        $_FILES['image']['name'] = 'test.png';
        $_FILES['image']['size'] = 1000;
        $_FILES['image']['tmp_name'] = '/tmp/test.png';

        // Simula la consulta a la base de datos para un usuario existente
        $resultMock = $this->createMock(mysqli_result::class);
        $this->conn->method('query')
                   ->willReturn($resultMock);
        $resultMock->method('num_rows')
                   ->willReturn(1);

        ob_start();
        include '../register.php';
        $output = ob_get_clean();

        $this->assertStringContainsString('¡Este usuario ya existe!', $output);
    }

    public function testPasswordsDoNotMatch()
    {
        $_POST['submit'] = true;
        $_POST['name'] = 'testuser';
        $_POST['email'] = 'test@example.com';
        $_POST['password'] = 'password123';
        $_POST['cpassword'] = 'differentpassword';
        $_FILES['image']['name'] = 'test.png';
        $_FILES['image']['size'] = 1000;
        $_FILES['image']['tmp_name'] = '/tmp/test.png';

        $resultMock = $this->createMock(mysqli_result::class);
        $this->conn->method('query')
                   ->willReturn($resultMock);
        $resultMock->method('num_rows')
                   ->willReturn(0);

        ob_start();
        include '../register.php';
        $output = ob_get_clean();

        $this->assertStringContainsString('¡Las contraseñas no coinciden!', $output);
    }

    public function testImageSizeTooLarge()
    {
        $_POST['submit'] = true;
        $_POST['name'] = 'testuser';
        $_POST['email'] = 'test@example.com';
        $_POST['password'] = 'password123';
        $_POST['cpassword'] = 'password123';
        $_FILES['image']['name'] = 'test.png';
        $_FILES['image']['size'] = 3000000; // 3MB
        $_FILES['image']['tmp_name'] = '/tmp/test.png';

        $resultMock = $this->createMock(mysqli_result::class);
        $this->conn->method('query')
                   ->willReturn($resultMock);
        $resultMock->method('num_rows')
                   ->willReturn(0);

        ob_start();
        include '../register.php';
        $output = ob_get_clean();

        $this->assertStringContainsString('¡Tamaño de la imagen muy grande!', $output);
    }

    public function testSuccessfulRegistration()
    {
        $_POST['submit'] = true;
        $_POST['name'] = 'testuser';
        $_POST['email'] = 'test@example.com';
        $_POST['password'] = 'password123';
        $_POST['cpassword'] = 'password123';
        $_FILES['image']['name'] = 'test.png';
        $_FILES['image']['size'] = 1000;
        $_FILES['image']['tmp_name'] = '/tmp/test.png';

        $resultMock = $this->createMock(mysqli_result::class);
        $this->conn->method('query')
                   ->willReturn($resultMock);
        $resultMock->method('num_rows')
                   ->willReturn(0);

        $this->conn->method('real_escape_string')
                   ->will($this->returnArgument(0));

        $this->conn->method('insert_id')
                   ->willReturn(1);

        ob_start();
        include '../register.php';
        $output = ob_get_clean();

        $this->assertStringContainsString('¡Registro exitoso!', $output);
        $this->assertTrue(file_exists('/tmp/test.png'));
    }
}
