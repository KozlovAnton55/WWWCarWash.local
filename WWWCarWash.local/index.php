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
    <link rel="stylesheet" href="style/style.css">
    <script src="./scripts/script.js"></script>
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
                <li class="current">
                    <a href="index.php">Главная</a>
                </li>
                <li>
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
        <div class="landingpage">
            <article id="carwash">
                <h1>Работаем для вас
                    24 часа <br>на 7 дней
                </h1>
            </article>

            <!-- Калькулятор стоимости -->

            <div class="calculatePrice">
                <h3>Калькулятор стоимости мойки</h3>
                <form id="wash-form">
                    <div class="form-group">
                        <label for="car-type">Тип автомобиля:</label>
                        <select id="car-type" required>
                            <option value="">Выберите тип</option>
                            <option value="sedan">Седан</option>
                            <option value="hatchback">Хэтчбек</option>
                            <option value="suv">Внедорожник/Кроссовер</option>
                            <option value="minivan">Минивэн</option>
                            <option value="pickup">Пикап</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="wash-type">Тип мойки:</label>
                        <select id="wash-type" required>
                            <option value="">Выберите тип</option>
                            <option value="express">Экспресс мойка</option>
                            <option value="standard">Стандартная мойка</option>
                            <option value="deluxe">Делюкс мойка</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Дополнительные услуги:</label>
                        <div class="checkbox-group">
                            <input type="checkbox" id="interior-cleaning" name="additional-services" value="interior">
                            <label for="interior-cleaning">Уборка салона</label>
                        </div>
                        <div class="checkbox-group">
                            <input type="checkbox" id="waxing" name="additional-services" value="wax">
                            <label for="waxing">Нанесение воска</label>
                        </div>
                        <div class="checkbox-group">
                            <input type="checkbox" id="tire-shine" name="additional-services" value="tire">
                            <label for="tire-shine">Чернение шин</label>
                        </div>
                    </div>

                    <button class="button" type="button" onclick="calculatePrice()">Рассчитать стоимость</button>
                </form>

                <div id="result" class="result hidden">
                    <p>Итоговая стоимость: <span id="total-price"></span> рублей</p>
                    <button class="button"
                        onclick="document.getElementById('result').classList.add('hidden')">Закрыть</button>
                </div>
            </div>
        </div>

        <!-- Отчет до окончания акции акции -->

        <section class="about">
            <div class="countdown-container">
                <h1 class="promo-title">Только у нас действует новогодняя акция!</h1>
                <p class="promo-text">Скидка 20% Не опоздайте!</p>
                <div class="timer-container">
                    <div class="timer-unit">
                        <span id="days">00</span>
                        <span>Дней</span>
                    </div>
                    <div class="timer-unit">
                        <span id="hours">00</span>
                        <span>Часов</span>
                    </div>
                    <div class="timer-unit">
                        <span id="minutes">00</span>
                        <span>Минут</span>
                    </div>
                    <div class="timer-unit">
                        <span id="seconds">00</span>
                        <span>Секунд</span>
                    </div>
                </div>
            </div>

            <!-- Отзывы наших клиентов -->

            <div class="coments">
                <article class="review-card">
                    <header class="card">
                        <img class="circle-image" src="./images/chening.jpg" alt="Ченинг">
                        <h4>
                            Cheni
                        </h4>
                    </header>
                    <blockquote class="review-text">
                        <p>Мне очень понравилось ваше обслуживание! </p>
                        <cite>Chening Tatum</cite>
                    </blockquote>
                </article>
                <article class="review-card">
                    <header class="card">
                        <img class="circle-image" src="./images/bradlei.jpg" alt="Бредли">
                        <h4>
                            Brad
                        </h4>
                    </header>
                    <blockquote class="review-text">
                        <p>Сервис очень хорошь! </p>
                        <cite>Bradlei Cooper</cite>
                    </blockquote>
                </article>
                <article class="review-card">
                    <header class="card">
                        <img class="circle-image" src="./images/mark.jpeg" alt="Marr">
                        <h4>
                            Mark
                        </h4>
                    </header>
                    <blockquote class="review-text">
                        <p>Мне очень понравилось ваше обслуживание, и кофе наливают! </p>
                        <cite>Mark uolberg</cite>
                    </blockquote>
                </article>
                <article class="review-card">
                    <header class="card">
                        <img class="circle-image" src="./images/ryan.webp" alt="Райен">
                        <h4>
                            Ryan
                        </h4>
                    </header>
                    <blockquote class="review-text">
                        <p>Видел обслуживание и лучше! </p>
                        <cite>Ryan Reinolds</cite>
                    </blockquote>
                </article>
                <article class="review-card">
                    <header class="card">
                        <img class="circle-image" src="./images/tom.jpg" alt="Ченинг">
                        <h4>
                            Tom
                        </h4>
                    </header>
                    <blockquote class="review-text">
                        <p>Мне очень понравилось качество обслуживания! </p>
                        <cite>Tom Hanks</cite>
                    </blockquote>
                </article>
                <article class="review-card hidden">
                    <header class="card">
                        <img class="circle-image" src="./images/ben.jpg" alt="Ченинг">
                        <h4>
                            Ben
                        </h4>
                    </header>
                    <blockquote class="review-text">
                        <p>А мне вобще ни чего не нравится в этой жизни! </p>
                        <cite>Ben stiller</cite>
                    </blockquote>
                </article>
                <article class="review-card">
                    <header class="card">
                        <img class="circle-image" src="./images/tomcruz.jpg" alt="Ченинг">
                        <h4>
                            Tom
                        </h4>
                    </header>
                    <blockquote class="review-text">
                        <p>Мне очень понравилось ваше обслуживание Доволен всем! </p>
                        <cite>Tom Cruze</cite>
                    </blockquote>
                </article>
            </div>

        </section>
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