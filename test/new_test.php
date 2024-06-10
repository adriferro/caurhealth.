<?php
// tests/NewHelperTest.php

use PHPUnit\Framework\TestCase;

class NewHelperTest extends TestCase
{
    protected $backupGlobals = false;

    public function testDatabaseConnection()
    {
        $connection = mysqli_connect('localhost', 'root', '', 'caurhealth');
        $this->assertNotFalse($connection);
        if ($connection) {
            mysqli_close($connection);
        }
    }

    public function testInsertNewHelper()
    {
        $_POST['name'] = 'John';
        $_POST['surname'] = 'Doe';
        $_POST['email'] = 'john@example.com';
        $_POST['phone'] = '123456789';
        $_POST['intern'] = 'Yes';
        $_POST['birth'] = '1990-01-01';
        $_POST['send'] = true;

        $connection = mysqli_connect('localhost', 'root', '', 'caurhealth');
        if (!$connection) {
            $this->fail('Failed to connect to database.');
        }

        include 'new.php';

        $check_query = "SELECT * FROM new_form WHERE email = 'john@example.com' OR phone = '123456789'";
        $check_result = mysqli_query($connection, $check_query);

        $this->assertEquals(1, mysqli_num_rows($check_result));

        mysqli_close($connection);
    }

    public function testRedirectAfterInsert()
    {
        ob_start();
        include 'new.php';
        $output = ob_get_clean();

        $this->assertStringContainsString('Location: helpers.php', xdebug_get_headers());
    }
}
