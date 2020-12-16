<?php

namespace App\Http\Controllers\Backend\Auth\Password;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;


class ValidatePasswordRequest extends Controller
{
  public function __invoke(Request $request)
  {

    $response = $this->sendResetEmail($request);

    if($response == 'passwords.throttled'){
      return redirect()->back()->withErrors(['error' => trans('Veuillez patienter, avant de réessayer.')]);
    }else if($response == 'passwords.user'){
      return redirect()->back()->withErrors(['email' => 'Adresse E-mail non reconnue.']);
    }else if($response == 'passwords.sent'){
      \Flash::add('Consultez votre adresse E-mail, un lien de réinitialisation de mot de passe vous a été envoyé.','success');
      return redirect()->back();
    }else{
      Flash::add("Désolé, une erreur c'est produite. Réessayez ou contactez un administrateur.",'error');
    }

  }

  protected function sendResetEmail($request)
  {
    return  $this->broker()->sendResetLink(
        $this->credentials($request)
    );
  }

  protected function credentials(Request $request)
  {
      return $request->only('email');
  }

  private function broker()
  {
      return Password::broker();
  }

}
