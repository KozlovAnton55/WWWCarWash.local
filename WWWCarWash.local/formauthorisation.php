<!-- Принудительное отключениее кэширования -->
<?php
header("Cache-Control: no-cache, no-store, must-revalidate");
header("Pragma: no-cache");
header("Expires: 0");
?>

<!-- Код страницы -->

<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Авторизация | WWW Car Wash</title>
    <link rel="stylesheet" href="style/style.css">
</head>

<body>
    <!-- Шапка страницы -->

    <header>
        <div class="headWrapper">

            <!--Логотип со ссылкой-->

            <div class="logotip">
                <a href="index.php" class="logo">
                    <img width="100px" height="100px" src="icons/icons8-автомойка-64.png" alt="Логотип"> <br>
                    <i>Car Wash</i>
                </a>
            </div>

            <!--Кнопка регистрации + авторизации-->

            <div class="autentification">
                <div class="but">
                    <a href="./formregistration.php"><button>Регистрация</button></a>
                </div>
            </div>

            <!-- Номера телефонов для связи + email-->

            <div class="contactshead">
                <div class="email">
                    <a href="Realkom55@Yandex.ru"> <img class="icon"
                            src="./icons/icons8-эл.-адрес-48 (1).png" alt="email"> CarWash@Yandex.ru.</a>
                </div>
                <div class="tel">
                    <a href=»tel:88002328925″><img class="icon" src="./icons/icons8-телефон-48.png" alt="tel">
                        88002328925</a><br>
                    <a href=»tel:89932328925″><img class="icon" src="./icons/icons8-whatsapp-48.png" alt="whatsap">
                        89932328925</a><br>
                    <a href="#"><img class="iconsocial" src="./icons/icons8-vk-48.png" alt="vk"></a>
                    <a href="#"><img class="iconsocial" src="./icons/icons8-телеграмма-app-48.png" alt="telegramm"></a>
                    <a href="#"><img class="iconsocial" src="./icons/icons8-twitter-в-квадрате-48.png" alt="tvitter"></a>
                    <a href="#"><img class="iconsocial" src="./icons/icons8-facebook-новый-48.png" alt="facebook"></a>
                </div>
            </div>

        </div>
    </header>

    <!-- Основной контент -->

    <main>

        <!--Форма авторизации-->

        <div class="formauthoris">
            <form action="authorisation.php" method="post">
                <h2>Добро пожаловать на страницу авторизации</h2>
                <label for="login">Логин:</label>
                <input type="text" name="login" id="login" required><br>
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" required><br>
                <label for="password">Пароль:</label>
                <input type="password" name="password" id="password" required><br>
                <input class="enter" type="submit" value="Войти">
            </form>
        </div>
    </main>

    <!-- Подвал страницы -->

    <footer>
        <div class="logoname">
            <a href="index.php">Car Wash.</a><br>
            <p>
                Copiright &copy; 2024.
            </p>
        </div>
    </footer>
</body>

</html>