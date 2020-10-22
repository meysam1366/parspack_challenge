<?php

namespace App\Providers;

use App\Contract\Interfaces\CreateInterface;
use App\Contract\Interfaces\LoginInterface;
use App\Contract\Interfaces\RegisterInterface;
use App\Contract\Repositories\CreateRepository;
use App\Contract\Repositories\LoginRepository;
use App\Contract\Repositories\RegisterRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryProvider extends ServiceProvider
{
    protected $repositories = [
        RegisterInterface::class => RegisterRepository::class,
        LoginInterface::class => LoginRepository::class,
        CreateInterface::class => CreateRepository::class
    ];
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        foreach($this->repositories as $interface => $repository) {
            $this->app->bind($interface, $repository);
        }
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
