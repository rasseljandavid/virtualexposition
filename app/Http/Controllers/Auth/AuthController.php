<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Event;
use App\Stand;

use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware($this->guestMiddleware(), ['except' => 'logout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data,  $filename = '')
    {   
      
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'logo'  => $filename,
            'phone' => $data['phone'],
            'password' => bcrypt($data['password']),
        ]);
    }

    public function reserve(Event $event, Stand $stand)
    {
        return view('auth.reserve', compact(['event','stand']));
    }

    public function register(Request $request)
    {
        $validator = $this->validator($request->all());

        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }

        //Clean this
        $name = '';
        if($request->logo) {
            $ext = str_replace('image/','',substr($request->logo, 5, strpos($request->logo, ';')-5));
            $img = $request->logo; // Your data 'data:image/png;base64,AAAFBfj42Pj4';
            $img = str_replace("data:image/{$ext};base64,", '', $img);
            $img = str_replace(' ', '+', $img);
            $data = base64_decode($img);
            $name = time() . rand() . '-logo.' . $ext;
            file_put_contents("images/logo/$name", $data);
        }

        Auth::guard($this->getGuard())->login($this->create($request->all(), $name));

        if(!empty($request->stand_id))  {
            $stand = Stand::find($request->stand_id);
            $stand->reserve();
        }
        return Auth::user()->id;
    }

    protected function handleUserWasAuthenticated(Request $request, $throttles)
    {
        if ($throttles) {
            $this->clearLoginAttempts($request);
        }

        if (method_exists($this, 'authenticated')) {
            return $this->authenticated($request, Auth::guard($this->getGuard())->user());
        }

        if($request->event_id) {
            $stand = Stand::find($request->stand_id);
            $stand->reserve();
            return redirect()->intended('/event/' . $request->event_id);
        }
        return redirect()->intended($this->redirectPath());
    }
}
