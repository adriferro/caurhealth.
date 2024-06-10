<?php
// tests/HelpersPageTest.php

use PHPUnit\Framework\TestCase;

class HelpersPageTest extends TestCase
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

    public function testHelperFetching()
    {
        $connection = mysqli_connect('localhost', 'root', '', 'caurhealth');
        if (!$connection) {
            $this->fail('Failed to connect to database.');
        }

        $query = "SELECT * FROM new_form";
        $result = mysqli_query($connection, $query);

        $this->assertNotFalse($result);
        $this->assertGreaterThan(0, mysqli_num_rows($result));

        mysqli_close($connection);
    }

    public function testHelperDisplay()
    {
        ob_start();
        include '../helpers.php';
        $output = ob_get_clean();

        // Verificar que al menos un cuidador se muestra en la página
        $this->assertStringContainsString('<div class="box"', $output);

        // Verificar que la información del cuidador se muestra correctamente
        $this->assertStringContainsString('class="content"', $output);
        $this->assertStringContainsString('class="btn show-more"', $output);
        $this->assertStringContainsString('class="btn cancel-show"', $output);
    }
}
