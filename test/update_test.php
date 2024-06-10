<?php
// tests/UpdateProfileTest.php

use PHPUnit\Framework\TestCase;

class UpdateProfileTest extends TestCase
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
        $_SESSION = ['user_id' => 1];
    }

    public function testUpdateUserProfile()
    {
        $_POST['update_profile'] = true;
        $_POST['update_name'] = 'newname';
        $_POST['update_email'] = 'newemail@example.com';

        $this->conn->expects($this->exactly(2))
                   ->method('query')
                   ->willReturn(true);

        ob_start();
        include '../update_profile.php';
        $output = ob_get_clean();

        $this->assertStringContainsString('¡Consulta fallida!', $output);
    }

    public function testIncorrectOldPassword()
    {
        $_POST['update_profile'] = true;
        $_POST['update_name'] = 'newname';
        $_POST['update_email'] = 'newemail@example.com';
        $_POST['old_password'] = 'incorrectpassword';
        $_POST['update_password'] = 'newpassword';
        $_POST['new_password'] = 'newpassword';
        $_POST['confirm_password'] = 'newpassword';

        $resultMock = $this->createMock(mysqli_result::class);
        $this->conn->method('query')
                   ->willReturn($resultMock);
        $resultMock->method('fetch_assoc')
                   ->willReturn(['password' => md5('correctpassword')]);

        ob_start();
        include '../update_profile.php';
        $output = ob_get_clean();

        $this->assertStringContainsString('¡Contraseña antigua incorrecta!', $output);
    }

    public function testNewPasswordMismatch()
    {
        $_POST['update_profile'] = true;
        $_POST['update_name'] = 'newname';
        $_POST['update_email'] = 'newemail@example.com';
        $_POST['old_password'] = md5('correctpassword');
        $_POST['update_password'] = md5('correctpassword');
        $_POST['new_password'] = 'newpassword';
        $_POST['confirm_password'] = 'differentpassword';

        $resultMock = $this->createMock(mysqli_result::class);
        $this->conn->method('query')
                   ->willReturn($resultMock);
        $resultMock->method('fetch_assoc')
                   ->willReturn(['password' => md5('correctpassword')]);

        ob_start();
        include '../update_profile.php';
        $output = ob_get_clean();

        $this->assertStringContainsString('¡Contraseña de confirmación incorrecta!', $output);
    }

    public function testUpdateImageTooLarge()
    {
        $_POST['update_profile'] = true;
        $_POST['update_name'] = 'newname';
        $_POST['update_email'] = 'newemail@example.com';
        $_FILES['update_image']['name'] = 'test.png';
        $_FILES['update_image']['size'] = 3000000; // 3MB
        $_FILES['update_image']['tmp_name'] = '/tmp/test.png';

        $resultMock = $this->createMock(mysqli_result::class);
        $this->conn->method('query')
                   ->willReturn($resultMock);
        $resultMock->method('fetch_assoc')
                   ->willReturn(['password' => md5('correctpassword')]);

        ob_start();
        include '../update_profile.php';
        $output = ob_get_clean();

        $this->assertStringContainsString('¡Imagen muy grande!', $output);
    }

    public function testSuccessfulProfileUpdate()
    {
        $_POST['update_profile'] = true;
        $_POST['update_name'] = 'newname';
        $_POST['update_email'] = 'newemail@example.com';
        $_FILES['update_image']['name'] = 'test.png';
        $_FILES['update_image']['size'] = 1000;
        $_FILES['update_image']['tmp_name'] = '/tmp/test.png';

        $resultMock = $this->createMock(mysqli_result::class);
        $this->conn->method('query')
                   ->willReturn($resultMock);
        $resultMock->method('fetch_assoc')
                   ->willReturn(['password' => md5('correctpassword')]);

        $this->conn->method('real_escape_string')
                   ->will($this->returnArgument(0));

        $this->conn->method('insert_id')
                   ->willReturn(1);

        ob_start();
        include '../update_profile.php';
        $output = ob_get_clean();

        $this->assertStringContainsString('¡Imagen editada correctamente!', $output);
        $this->assertTrue(file_exists('/tmp/test.png'));
    }
}
