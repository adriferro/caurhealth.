<?php
// tests/ProfileTest.php

use PHPUnit\Framework\TestCase;

class ProfileTest extends TestCase
{
    protected $conn;

    protected function setUp(): void
    {
        // Configura una conexión simulada a la base de datos
        $this->conn = $this->getMockBuilder(mysqli::class)
                           ->disableOriginalConstructor()
                           ->getMock();
        $_SESSION = [];
        $_GET = [];
    }

    public function testRedirectToLoginWhenNotLoggedIn()
    {
        $this->expectOutputString('');
        $_SESSION['user_id'] = null;

        ob_start();
        include '../profile.php';
        $output = ob_get_clean();

        $this->assertStringContainsString('location:login.php', xdebug_get_headers());
    }

    public function testLogout()
    {
        $_SESSION['user_id'] = 1;
        $_GET['logout'] = 1;

        ob_start();
        include '../profile.php';
        $output = ob_get_clean();

        $this->assertEmpty($_SESSION);
        $this->assertStringContainsString('location:login.php', xdebug_get_headers());
    }

    public function testDisplayUserProfile()
    {
        $_SESSION['user_id'] = 1;

        $resultMock = $this->createMock(mysqli_result::class);
        $this->conn->method('query')
                   ->willReturn($resultMock);
        $resultMock->method('num_rows')
                   ->willReturn(1);
        $resultMock->method('fetch_assoc')
                   ->willReturn(['name' => 'Test User', 'image' => 'test.png']);

        ob_start();
        include '../profile.php';
        $output = ob_get_clean();

        $this->assertStringContainsString('<h3>Test User</h3>', $output);
        $this->assertStringContainsString('<img src="../assets/uploaded_img/test.png">', $output);
    }

    public function testDisplayDefaultImageWhenNoImage()
    {
        $_SESSION['user_id'] = 1;

        $resultMock = $this->createMock(mysqli_result::class);
        $this->conn->method('query')
                   ->willReturn($resultMock);
        $resultMock->method('num_rows')
                   ->willReturn(1);
        $resultMock->method('fetch_assoc')
                   ->willReturn(['name' => 'Test User', 'image' => '']);

        ob_start();
        include '../profile.php';
        $output = ob_get_clean();

        $this->assertStringContainsString('<h3>Test User</h3>', $output);
        $this->assertStringContainsString('<img src="../assets/uploaded_img/predeterminado.png">', $output);
    }
}
