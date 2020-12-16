<?php

namespace App\Http\Controllers\Backend\Auth\Password;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Hash;


class ResetPasswordController extends Controller
{
    public function get(Request $request, $token){
      $title2 = 'Réinitialisation du mot de passe';
      return view('app.auth.passwords.reset',[
        'token' => $token,
        'title2' => $title2,
      ]);
    }

    public function post(Request $request){

      $validator = Validator::make($request->all(), [
        'email' => 'required|email|exists:users,email',
        'password' => 'required|confirmed',
        'token' => 'required'
      ]);

      if ($validator->fails()) {
          return redirect()->back()->withErrors(['email' => 'Veuillez renseigner des informations valides']);
      }

      $response = $this->reset_password($request);

      \Flash::add('Votre mot de passe a bien été réinitialisé.','success');

      return redirect()->route('login');

    }

    private function reset_password($request){
      return $this->broker()->reset(
          $this->credentials($request), function ($user, $password) {
              $this->resetPassword($user, $password);
          }
      );
    }

    private function resetPassword($user, $password)
    {
        $this->setUserPassword($user, $password);
        $user->save();
    }

    private function credentials(Request $request)
    {
        return $request->only(
            'email', 'password', 'password_confirmation', 'token'
        );
    }

    protected function setUserPassword($user, $password)
    {
        $user->password = Hash::make($password);
        $user->save();
    }

    private function broker()
    {
        return Password::broker();
    }
}
