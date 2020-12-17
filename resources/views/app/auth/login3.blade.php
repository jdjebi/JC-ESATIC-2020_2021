@extends('app.page3')

@section('extras_style')
    @include('app.styles.login')
@endsection

@section('content')
<div class="wrapper">
    <div class="title">
      <h1>Connexion</h1>
    </div>
    <div class="contact-form">
      <div class="input-fields">
        <form action="" method="POST">
            <input type="text" class="input" name="login_code" placeholder="Code de connexion" required>
            <div style="color: red">
                @isset($error_message)
                    {{ $error_message }}
                @endisset
            </div>
            <br> <br>
            <center>
                <button type="submit" class="btn">Connexion</button>
            </center>
        </form>
      </div>
    </div>
  </div>
  <script src="https://kit.fontawesome.com/a076d05399.js"></script>
@endsection