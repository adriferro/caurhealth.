<?php
// tests/ArticlesPageTest.php

use PHPUnit\Framework\TestCase;

class ArticlesPageTest extends TestCase
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

    public function testArticleFetching()
    {
        $connection = mysqli_connect('localhost', 'root', '', 'caurhealth');
        if (!$connection) {
            $this->fail('Failed to connect to database.');
        }

        $query = "SELECT * FROM articles";
        $result = mysqli_query($connection, $query);

        $this->assertNotFalse($result);
        $this->assertGreaterThan(0, mysqli_num_rows($result));

        mysqli_close($connection);
    }

    public function testArticleDisplay()
    {
        ob_start();
        include '../articles.php';
        $output = ob_get_clean();

        // Verificar que al menos un artículo se muestra en la página
        $this->assertStringContainsString('<div class="article', $output);

        // Verificar que la información del artículo se muestra correctamente
        $this->assertStringContainsString('class="content"', $output);
        $this->assertStringContainsString('class="btn"', $output);
    }
}
