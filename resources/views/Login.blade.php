<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <link rel="stylesheet" href="login.css">
   <link rel="stylesheet" href="css/bootstrap.css">
   <link rel="stylesheet" href="./assets/css/all.min.css">
    <link rel="stylesheet" href="./assets/css/uf-style.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto" rel="stylesheet">
   
</head>
<body>
    <div class="container">
        <img src="./img/LOGO2.png" alt="" id="logo">
        <div class="uf-form-signin" id="login">
            <div class="text-center">
            <h1 class="text-white h5">Seja Bem-Vindo!</h1>
            </div>
            <form class="mt-4">
              <div class="input-group uf-input-group input-group-lg mb-3">
                <span class="input-group-text fa fa-user"></span>
                <input type="text" class="form-control" placeholder="Usuário ou E-mail">
              </div>
              <div class="input-group uf-input-group input-group-lg mb-3">
                <span class="input-group-text fa fa-lock"></span>
                <input type="password" class="form-control" placeholder="Senha">
              </div>
              <div class="d-flex mb-3 justify-content-between">
                <div class="form-check">
                  <input type="checkbox" class="form-check-input uf-form-check-input" id="exampleCheck1">
                  <label class="form-check-label text-white" for="exampleCheck1">Lembre-me</label>
                </div>
                <a href="#">Esqueceu a Senha?</a>
              </div>
              <div class="d-grid mb-4">
                <button type="submit" class="btn uf-btn-primary btn-lg">Entrar</button>
              </div>
              <div class="d-flex mb-3">
                  <div class="dropdown-divider m-auto w-25"></div>
                  <small class="text-nowrap text-white">Ou acesse com</small>
                  <div class="dropdown-divider m-auto w-25"></div>
              </div>
              <div class="uf-social-login d-flex justify-content-center">
                <a href="#" class="uf-social-ic" title="Login with Facebook"><i class="fab fa-facebook-f"></i></a>
                <a href="#" class="uf-social-ic" title="Login with Twitter"><i class="fab fa-twitter"></i></a>
                <a href="#" class="uf-social-ic" title="Login with Google"><i class="fab fa-google"></i></a>
              </div>
              <div class="mt-4 text-center">
                <span class="text-white">Não possui uma conta?</span>
                <a href="register.html">Cadastre-se</a>
              </div>
            </form>
        </div>       
    </div>


   
    <script src="/public/assets/js/popper.min.js"></script>
    <script src="/public/assets/js/bootstrap.min.js"></script>
    
</body>
</html>