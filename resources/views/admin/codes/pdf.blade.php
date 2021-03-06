<!DOCTYPE html>
<html lang="fr">
  <head>
    <link rel="stylesheet" href="{{ cdn_asset('asset/css/bootstrap/4.5/bootstrap.min.css') }}">
    <style>
        .code-item{
            width: 160px;
            padding: 10px;
            text-align: center;
            font-weight: 600;
            font-size:22px
        }
    </style>
  </head>
  <body>
    @foreach($codes as $key => $code)
        <div class="border border-dark mb-5 "> 
            <div class="h3 text-center">{{ $code['type'] }}</div>
            <div class="d-flex flex-wrap flex-row justify-content-center">
                @foreach($code['data'] as $key2 => $user)
                    <div  class="mr-1 d-flex mb-2 m-2">
                        <div class="border border-dark code-item" >{{ $user->login_code }}</div>
                        <div class="border border-dark code-item" >{{ $key + $key2 }}</div>
                        <div class="border border-dark code-item" >{{ $key + $key2 }}</div>
                    </div>
                @endforeach 
    
            </div>
        </div>
    @endforeach
  </body>
</html>
