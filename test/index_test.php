<?php
// tests/IndexPageTest.php

use PHPUnit\Framework\TestCase;

class IndexPageTest extends TestCase
{
    protected $backupGlobals = false;

    protected function setUp(): void
    {
        $_SESSION['user_id'] = 1;
    }

    public function testRedirectIfNotLoggedIn()
    {
        unset($_SESSION['user_id']);
        ob_start();
        include 'index.php';
        $output = ob_get_clean();
        $this->assertStringContainsString('login/login.php', $output);
    }

    public function testDatabaseConnection()
    {
        $connection = @mysqli_connect('localhost', 'root', '', 'caurhealth');
        $this->assertNotFalse($connection);
        if ($connection) {
            mysqli_close($connection);
        }
    }

    public function testFetchCuidadores()
    {
        $connection = @mysqli_connect('localhost', 'root', '', 'caurhealth');
        if (!$connection) {
            $this->fail('Failed to connect to database.');
        }

        $sql = "SELECT id, name, surname, image FROM new_form ORDER BY id ASC LIMIT 3";
        $result = mysqli_query($connection, $sql);

        $this->assertNotFalse($result);
        $this->assertGreaterThan(0, mysqli_num_rows($result));

        mysqli_close($connection);
    }

    public function testFetchUserImage()
    {
        $connection = @mysqli_connect('localhost', 'root', '', 'caurhealth');
        if (!$connection) {
            $this->fail('Failed to connect to database.');
        }

        $sql = "SELECT image FROM user_form WHERE id = {$_SESSION['user_id']}";
        $result = mysqli_query($connection, $sql);

        $this->assertNotFalse($result);
        $this->assertEquals(1, mysqli_num_rows($result));

        mysqli_close($connection);
    }
}
