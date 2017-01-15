<?php

use Faker\Generator;

abstract class TestCase extends Illuminate\Foundation\Testing\TestCase
{
    /**
     * The base URL to use while testing the application.
     *
     * @var string
     */
    protected $baseUrl = 'http://localhost';

    /**
     * Creates the application.
     *
     * @return \Illuminate\Foundation\Application
     */
    public function createApplication()
    {
        $app = require __DIR__.'/../bootstrap/app.php';

        $app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

        return $app;
    }

    /**
     * @return Generator
     */
    protected function faker(): Generator
    {
        return app(Generator::class);
    }

    /**
     * @param string $prefix
     *
     * @return string
     */
    protected function uniqid(string $prefix = ''): string
    {
        return uniqid($prefix, false);
    }
}
