<?php

namespace App\Providers;

use App\Models\User;
use Laravel\Fortify\Fortify;
use Laravel\Jetstream\Jetstream;
use Illuminate\Support\Facades\Hash;
use App\Actions\Jetstream\DeleteUser;
use Illuminate\Support\ServiceProvider;
use Symfony\Component\HttpFoundation\Request;

class JetstreamServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $this->configurePermissions();

        Jetstream::deleteUsersUsing(DeleteUser::class);

        
    }

    /**
     * Configure the permissions that are available within the application.
     */
    protected function configurePermissions(): void
    {
        Jetstream::defaultApiTokenPermissions(['read']);

        Jetstream::permissions([
            'create',
            'read',
            'update',
            'delete',
        ]);
        
        // Fortify::authenticateUsing(function (Request $request) {
        //     $user = User::where('student_number', $request->student_number)->first();
    
        //     if ($user &&
        //         Hash::check($request->password, $user->password)) {
        //         return $user;
        //     }
        // });
    }
}
