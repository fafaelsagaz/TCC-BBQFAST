<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="./assets/recuperacaodesenha.css">
</head>

<body>
  <div class="container">
    <div class="form-container">
      <div class="logo-container">
        Esqueceu sua senha?
      </div>
      <x-auth-session-status class="mb-4" :status="session('status')" />

      <form class="form" method="POST" action="{{ route('password.email')}}">
        @csrf
        <div class="form-group">
          <label for="email">Email</label>
          <input type="text" id="email" name="email" placeholder="Coloque seu email" :value="old('email')" required autofocus />
          <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>
        <button class="form-submit-btn" type="submit">Enviar Link de Recuperação</button>
      </form>

      <p class="signup-link">
        Não tem uma conta?
        <a href="/cadastro" class="signup-link link"> Cadastre agora</a>
      </p>
    </div>
  </div>
</body>

</html>