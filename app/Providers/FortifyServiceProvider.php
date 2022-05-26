<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Http\Request;
use Laravel\Fortify\Fortify;
use Illuminate\Support\Facades\Hash;
use App\Actions\Fortify\CreateNewUser;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\ServiceProvider;
use Illuminate\Cache\RateLimiting\Limit;
use App\Actions\Fortify\ResetUserPassword;
use App\Actions\Fortify\UpdateUserPassword;
use Illuminate\Support\Facades\RateLimiter;
use App\Actions\Fortify\UpdateUserProfileInformation;

class FortifyServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Fortify::createUsersUsing(CreateNewUser::class);
        Fortify::updateUserProfileInformationUsing(UpdateUserProfileInformation::class);
        Fortify::updateUserPasswordsUsing(UpdateUserPassword::class);
        Fortify::resetUserPasswordsUsing(ResetUserPassword::class);

            Fortify::loginView(function () {
                return view('auth.login');
            });

            Fortify::authenticateUsing(function (Request $request) {
                $user = User::where('email', $request->email)->first();

                $lifetime = time() + 60 * 60 * 24 * 365;
                if ($user && Hash::check($request->password, $user->password)) {
                    if($request->has('rememberme')){
                        Cookie::queue('cookie_email',$request->email, $lifetime);
                        Cookie::queue('cookie_password',$request->password,$lifetime);
                    }else{
                        Cookie::queue('cookie_email',$request->email, -$lifetime);
                        Cookie::queue('cookie_password',$request->password,-$lifetime);
                    }
                    return $user;
                }
            });

            Fortify::registerView(function () {
                return view('auth.register');
            });

            Fortify::requestPasswordResetLinkView(function () {
                return view('auth.forgot-password');
            });

            Fortify::resetPasswordView(function ($request) {
                return view('auth.reset-password', ['request' => $request]);
            });

            Fortify::verifyEmailView(function () {
                return view('auth.verify-email');
            });

        RateLimiter::for('login', function (Request $request) {
            $email = (string) $request->email;

            return Limit::perMinute(5)->by($email.$request->ip());
        });

        RateLimiter::for('two-factor', function (Request $request) {
            return Limit::perMinute(5)->by($request->session()->get('login.id'));
        });
    }
}
