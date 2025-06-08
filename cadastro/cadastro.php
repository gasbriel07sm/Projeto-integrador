<?php

session_start();

$name = $_SESSION['name'] ?? null;
$alerts = $_SESSION['alerts'] ?? [];
$active_form = $_SESSION['active_form'] ?? '';

session_unset();

if($name !== null) $_SESSION['name'] = $name;
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OnionShield</title>

    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.5.0/fonts/remixicon.css"
    rel="stylesheet"/>
    <link rel="stylesheet" href="cadastro.css">
    <link rel="stylesheet" href="../style.css">
    <link href='https://cdn.boxicons.com/fonts/basic/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    <!--============== HEADER ==============-->
    <header class="header">
        <nav class="nav container">
            <div class="nav__data">
                <a href="#" class="nav__logo">
                    <img src="../logo branca.png" alt=""> OnionShield
                </a>

                <div class="nav__toggle" id="nav-toggle">
                    <i class="ri-menu-line nav__burger"></i>
                    <i class="ri-close-line nav__close"></i>
                </div>
            </div>

            <!--============ NAV MENU ============-->
            <div class="nav__menu" id="nav-menu">
                <ul class="nav__list">
                    <li><a href="../index.html" class="nav__link">Home</a></li>

                    <!--============ DROPDOWN 1 ============-->
                    <li class="dropdown__item">
                        <div class="nav__link">
                            Informações<i class="ri-arrow-down-s-line dropdown__arrow"></i>
                        </div>

                        <ul class="dropdown__menu">
                            <li>
                                <a href="#" class="dropdown__link">
                                    <i class="ri-bookmark-line"></i> Conteúdo
                                </a>
                            </li>
                             <!--=============== DROPDOWN SUBMENU ===============-->
                            <li class="dropdown__subitem">
                                <div class="dropdown__link">
                                    <i class="ri-survey-line"></i> Questionários <i class="ri-add-line dropdown__add"></i>
                                </div>

                                    <ul class="dropdown__submenu">
                                        <li>
                                            <a href="#" class="dropdown__sublink">
                                                <i class="ri-file-list-line"></i> Questionário 1
                                            </a>
                                        </li>
                
                                        <li>
                                            <a href="#" class="dropdown__sublink">
                                                <i class="ri-file-list-line"></i> Questionário 2
                                            </a>
                                        </li>
                
                                        <li>
                                            <a href="#" class="dropdown__sublink">
                                                <i class="ri-file-list-line"></i> Questionário 3
                                            </a>
                                        </li>

                                        <li>
                                            <a href="#" class="dropdown__sublink">
                                                <i class="ri-file-list-line"></i> Questionário 4
                                            </a>
                                        </li>

                                        <li>
                                            <a href="#" class="dropdown__sublink">
                                                <i class="ri-file-list-line"></i>Questionário 5
                                            </a>
                                        </li>
                                    </ul>
                                    </li>
                            <li>
                                <a href="#" class="dropdown__link">
                                    <i class="ri-search-line"></i> Pesquisa
                                </a>
                            </li>
                    </ul>
                    <!--============ DROPDOWN 2 ============-->
                    <li class="dropdown__item">
                        <div class="nav__link">
                            Recursos<i class="ri-arrow-down-s-line dropdown__arrow"></i>
                        </div>

                        <ul class="dropdown__menu">
                            <li>
                                <a href="https://trello.com/b/OfHPH3Sw/onionshield" class="dropdown__link" target="_blank">
                                    <i class="ri-picture-in-picture-line"></i> Trello
                                </a>
                            </li>

                            <li>
                                <a href="https://docs.google.com/spreadsheets/d/1qffIZLSposIEQfGGPxXAj9wK_Te64XTsmsmonhHHyGA/edit?usp=sharing" class="dropdown__link" target="_blank">
                                    <i class="ri-calendar-schedule-line"></i> Dailys
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li><a href="" class="nav__link">Sobre</a></li>

                    <li><a href="../contato/contato.html" class="nav__link">Contato</a></li>

                    <div class="user-auth">
                        <?php if (!empty($name)): ?>
                        <div class="profile-box">
                            <div class="avatar-circle">
                                <?= strtoupper($name[0]); ?>
                            </div>
                            <div class="dropdown">
                                <a href="#">My Account</a>
                                <a href="logout.php">Logout</a>
                            </div>
                        </div>
                        <?php else: ?>
                        <button class="login-btn-modal"><a href="cadastro.php" class="nav__link">Login</a></button>
                        <?php endif; ?>
                    </div>
                </ul>
            </div>
        </nav>
    </header>
    <!--============== FIM HEADER ==============-->
<section>
    <?php if (!empty($alerts)): ?>                        
    <div class="alert-box">
        <?php foreach ($alerts as $alert): ?>
        <div class="alert <?= $alert['type']; ?>">
            <i class='bx <?= $alert['type'] === 'success' ?' bxs-check-circle' : 'bxs-x-circle'; ?>'></i> 
            <span><?= $alert['message']; ?></span>
        </div>
        <?php endforeach; ?>
    </div>
    <?php endif; ?>

    <div class="auth-modal <?= $active_form === 'register' ? 'show slide' : ($active_form === 'login' ? 'show' : ''); ?> " >
        <div class="form-box login">
            <h2>Login</h2>
            <form action="auth_process.php" method="POST">
                <div class="input-box">
                    <input type="email" id="email" name="email" placeholder="Email" required>
                    <i class='bx  bxs-envelope'></i> 
                </div>

                <div class="input-box">
                    <input type="password" id="password" name="password" placeholder="Password" required>
                    <i class='bx  bxs-lock'></i> 
                </div>

                <button type="submit" name="login_btn" class="btn">Login</button>

                <p>Não possui uma conta? <a href="#" class="register-link">Registre-se</a></p>

            </form>
        </div>

        <div class="form-box register">
            <h2>Register</h2>
            <form action="auth_process.php" method="POST">
                <div class="input-box">
                    <input type="text" id="name" name="name" placeholder="Name" required>
                    <i class='bx  bxs-user'></i> 
                </div>

                <div class="input-box">
                    <input type="email" id="email" name="email" placeholder="Email" required>
                    <i class='bx  bxs-envelope'></i>
                </div>

                <div class="input-box">
                    <input type="password" id="password" name="password" placeholder="Password" required>
                    <i class='bx  bxs-lock'></i> 
                </div>

                <button type="submit" name="register_btn" class="btn">Register</button>

                <p>Já possui uma conta? <a href="#" class="login-link">Login</a></p>

            </form>
        </div>
    </div>
</section>



    <script src="cadastro.js"></script>
    <script src="../main.js"></script>

</body>
</html>