<?php

namespace App\Providers;

use App\Repositories\CourseInterface;
use App\Repositories\CourseRepository;
use App\Repositories\DisciplineInterface;
use App\Repositories\DisciplineRepository;
use App\Repositories\DocumentInterface;
use App\Repositories\DocumentRepository;
use App\Repositories\TeacherInterface;
use App\Repositories\TeacherRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(CourseInterface::class, CourseRepository::class);
        $this->app->bind(DisciplineInterface::class, DisciplineRepository::class);
        $this->app->bind(DocumentInterface::class, DocumentRepository::class);
        $this->app->bind(TeacherInterface::class, TeacherRepository::class);
    }
}
