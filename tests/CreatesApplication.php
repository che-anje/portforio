<?php

namespace Tests;

use Illuminate\Contracts\Console\Kernel;

trait CreatesApplication
{
    /**
     * Creates the application.
     *
     * @return \Illuminate\Foundation\Application
     */
    public function createApplication()
    {
        $app = require __DIR__.'/../bootstrap/app.php';

        $app->make(Kernel::class)->bootstrap();

        $this->setUpDatabase();

        return $app;
    }

    protected function setUpDatabase(): void
    {
        if ($this->isSetUpDatabase) {
            return;
        }

        Artisan::call('migrate:fresh');

        $this->isSetUpDatabase = true;
    }
}
