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
        <input type="text" class="input" placeholder="Code de connexion" required>
        <br> <br>
        <button type="submit" class="btn">Connexion</button>
      </div>
    </div>
  </div>
  <script src="https://kit.fontawesome.com/a076d05399.js"></script>
@endsection