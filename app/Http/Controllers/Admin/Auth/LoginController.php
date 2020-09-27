<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers {
        redirectPath as adminRedirectPath;
        showLoginForm as showLoginAdminForm;
    }

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function authenticated(Request $request, $user)
    {
        // check user has soft delete
        if (isset($user->deleted_at) && $user->deleted_at) {
            //  logout
            Auth::logout();
            // message
            return redirect()->route('login')->withFlashDanger(__('delete_user'));
        }

        if (!$user->isAdmin()) {
            //  logout
            Auth::logout();
            // message
            return redirect()->route('login')->withFlashDanger(__('user_not_admin'));
        }

        // update last login
        $user->update([
            'last_login_at' => Carbon::now()->toDateTimeString(),
        ]);
    }
    public function showLoginForm()
    {
        return view('admin.auth.login');
    }

    public function redirectPath()
    {
        session()->flash('message', 'Login is success!');

        return $this->adminRedirectPath();
    }
}
