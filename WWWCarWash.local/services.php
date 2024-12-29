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
    <title>WWW Car Wash</title>
    <link rel="stylesheet" href="./style/style.css">
</head>

<body>

    <!--Шапка страницы-->

    <header>
        <div class="headWrapper">

            <!--Логотип со ссылкой-->

            <div class="logotip">
                <a href="index.php" class="logo">
                    <img width="100px" height="100px" src="icons/icons8-автомойка-64.png" alt="Логотип"> <br>
                    <i>Car Wash</i>
                </a>
            </div>

            <!-- Кнопки регистрации/авторизации или иконка пользователя -->
             
        <div class="autentification">
            <?php
            session_start();
            if (isset($_SESSION['user'])) {
                echo '<div class="user-profile">';
                echo '<img class="user-icon" src="icons\icons8-пользователь-100.png" alt="Иконка пользователя">';
                echo '<span class="user-login">' . $_SESSION['user']['nick'] . '</span>';
                echo '<form action="logout.php" method="post">';
                echo '<input type="submit" value="Выход" class="logout-button">';
                echo '</form>';
                echo '</div>';
            } else {
            ?>
            <div class="but">
            <a href="./formregistration.php"><button>Регистрация</button></a>
            <a href="./formauthorisation.php"><button>Авторизация</button></a>
            </div>
            <?php
            }
            ?>
        </div>

            <!--Навигационное меню-->

            <nav class="navmenu">
                <li>
                    <a href="index.php">Главная</a>
                </li>
                <li class="current">
                    <a href="services.php">Услуги</a>
                </li>
                <li>
                    <a href="contacts.php">Контакты</a>
                </li>
            </nav>

            <!-- Номера телефонов для связи + email-->

            <div class="contactshead">
                <div class="tel">
                    <a href=»tel:88002328925″><img class="icon" src="./icons/icons8-телефон-48.png" alt="tel">
                        88002328925</a><br>
                    <a href=»tel:89932328925″><img class="icon" src="./icons/icons8-whatsapp-48.png" alt="whatsap">
                        89932328925</a><br>
                    <a href="#"><img class="iconsocial" src="./icons/icons8-vk-48.png" alt="vk"></a>
                    <a href="#"><img class="iconsocial" src="./icons/icons8-телеграмма-app-48.png" alt="telegramm"></a>
                    <a href="#"><img class="iconsocial" src="./icons/icons8-twitter-в-квадрате-48.png"
                            alt="tvitter"></a>
                    <a href="#"><img class="iconsocial" src="./icons/icons8-facebook-новый-48.png" alt="facebook"></a>
                </div>
                <div class="email">
                    <a href="Realkom55@Yandex.ru"> <img class="icon"
                            src="./icons/icons8-эл.-адрес-48 (1).png" alt="email"> CarWash@Yandex.ru.</a>
                </div>
            </div>

        </div>
    </header>

    <!--Основной контент страницы-->

    <main>
        <div class="serviseswrap">
            <figure>
                <figcaption>Специальные услуги</figcaption>
                <table class="specialServices">
                    <tr>
                        <th>Наименование услуги</th>
                        <th>Цена</th>
                    </tr>
                    <tr>
                        <th>Уборка салона</th>
                        <td>500</td>
                    </tr>
                    <tr>
                        <th>Нанесение воска</th>
                        <td>500</td>
                    </tr>
                    <tr>
                        <th>Чернение шин</th>
                        <td>500</td>
                    </tr>
                </table>
            </figure>
            <figure>
                <figcaption> Прайс на стоимость наших услуг</figcaption>
                <table class="priceListOftheOost">
                    <tr>
                        <th>Наименование услуги </th>
                        <th>Седан</th>
                        <th>Хэтчбек</th>
                        <th>Внедорожник/Кроссовер</th>
                        <th>Минивен</th>
                        <th>Пикап</th>
                    </tr>
                    <tr>
                        <th>Экспресс мойка</th>
                        <td>100</td>
                        <td>110</td>
                        <td>120</td>
                        <td>130</td>
                        <td>140</td>
                    </tr>
                    <tr>
                        <th>Стандартная мойка</th>
                        <td>130</td>
                        <td>140</td>
                        <td>150</td>
                        <td>160</td>
                        <td>170</td>
                    </tr>
                    <tr>
                        <th>Делюкс мойка</th>
                        <td>150</td>
                        <td>160</td>
                        <td>170</td>
                        <td>180</td>
                        <td>190</td>
                    </tr>
                    
                </table>
            </figure>
        </div>
    </main>

    <!--Подвал страницы-->

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