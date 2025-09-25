<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
<div class="container">
        <div class="content first-content">
            <div class="first-column">
                <h2 class="title title-primary">Seja bem vindo!</h2>
                <p class="description description-primary">Para ficar conectado conosco</p>
                <p class="description description-primary">Por favor faça seu login com sua conta pessoal</p>
                <button id="signin" class="btn btn-primary">login</button>
            </div>    
            <div class="second-column">
                <h2 class="title title-second">Crie sua Conta</h2>
                <div class="social-media">
                    <ul class="list-social-media">
                        <a class="link-social-media" href="#">
                            <li class="item-social-media">
                                <i class="fab fa-facebook-f"></i>        
                            </li>
                        </a>
                        <a class="link-social-media" href="#">
                            <li class="item-social-media">
                                <i class="fab fa-google-plus-g"></i>
                            </li>
                        </a>
                        <a class="link-social-media" href="#">
                            <li class="item-social-media">
                                <i class="fab fa-linkedin-in"></i>
                            </li>
                        </a>
                    </ul>
                </div><!-- social media -->
                <p class="description description-second">Ou use seu email para registro:</p>
                <form class="form">
                    <label class="label-input" for="">
                        <i class="far fa-user icon-modify"></i>
                        <input type="text" placeholder="Name">
                    </label>
                    
                    <label class="label-input" for="">
                        <i class="far fa-envelope icon-modify"></i>
                        <input type="email" placeholder="Email">
                    </label>
                    
                    <label class="label-input" for="">
                        <i class="fas fa-lock icon-modify"></i>
                        <input type="password" placeholder="Password">
                    </label>
                    
                    <button class="btn btn-second">Criar conta</button>        
                </form>
            </div><!-- second column -->
        </div><!-- first content -->
        <div class="content second-content">
            <div class="first-column">
                <h2 class="title title-primary">Olá amigo!</h2>
                <p class="description description-primary">Coloque seu nome de usuario</p>
                <p class="description description-primary">E comece sua jornada conosco</p>
                <button id="signup" class="btn btn-primary">Crie sua Conta</button>
            </div>
            <div class="second-column">
                <h2 class="title title-second">login</h2>
                <div class="social-media">
                    <ul class="list-social-media">
                        <a class="link-social-media" href="#">
                            <li class="item-social-media">
                                <i class="fab fa-facebook-f"></i>
                            </li>
                        </a>
                        <a class="link-social-media" href="#">
                            <li class="item-social-media">
                                <i class="fab fa-google-plus-g"></i>
                            </li>
                        </a>
                        <a class="link-social-media" href="#">
                            <li class="item-social-media">
                                <i class="fab fa-linkedin-in"></i>
                            </li>
                        </a>
                    </ul>
                </div><!-- social media -->
                <p class="description description-second">Ou use seu email para registro:</p>
                <form class="form" action="sistema.php" method="POST">
                
                    <label class="label-input" for="">
                        <i class="far fa-envelope icon-modify"></i>
                        <input type="email" placeholder="Email">
                    </label>
                
                    <label class="label-input" for="">
                        <i class="fas fa-lock icon-modify"></i>
                        <input type="password" placeholder="Password">
                    </label>
                
                    <a class="password" href="">Esqueceu a sua senha?</a>
                    <button class="btn btn-second" action="sistema.php" >Login</button>
                </form>
            </div><!-- second column -->
        </div><!-- second-content -->
    </div>
    <script src="assets/js/app.js"></script>
</body>
</html>