<?php

use Faker\Generator;
use Illuminate\Contracts\Console\Kernel;
use Laravel\BrowserKitTesting\TestCase;

abstract class BrowserKitTestCase extends TestCase
{
    /**
     * The base URL of the application.
     *
     * @var string
     */
    public $baseUrl = 'https://www.gymforgym.dev';

    /**
     * Creates the application.
     *
     * @return \Illuminate\Foundation\Application
     */
    public function createApplication()
    {
        $app = require __DIR__.'/../bootstrap/app.php';

        $app->make(Kernel::class)->bootstrap();

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
