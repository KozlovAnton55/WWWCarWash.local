// Калькулятор услуг

function calculatePrice() {
    const carType = document.getElementById('car-type').value;
    const washType = document.getElementById('wash-type').value;
    const additionalServices = document.querySelectorAll('input[name="additional-services"]:checked');
    let totalPrice = 0;

    // Цены на услуги
    const carPrices = {
        sedan: 100,
        hatchback: 110,
        suv: 130,
        minivan: 150,
        pickup: 140
    };

    const washPrices = {
        standard: 200,
        deluxe: 350,
        express: 150
    };

    const servicePrices = {
        interior: 100,
        wax: 50,
        tire: 30
    };

    if (carType && washType) {
        totalPrice += carPrices[carType];
        totalPrice += washPrices[washType];

        additionalServices.forEach(service => {
            totalPrice += servicePrices[service.value];
        });
        document.getElementById('result').classList.remove('hidden');
        document.getElementById('total-price').textContent = totalPrice;

    } else {
        alert('Пожалуйста, выберите тип автомобиля и тип мойки.');
    }
}

// Счетчик новогодней акции

document.addEventListener('DOMContentLoaded', function () {
    const targetDate = new Date('2025-01-01T00:00:00').getTime(); // Замените на нужную дату

    function updateTimer() {
        const now = new Date().getTime();
        const distance = targetDate - now;

        if (distance <= 0) {
            clearInterval(timerInterval);
            document.querySelector('.timer-container').innerHTML = '<h1>Акция закончилась</h1>';
            return;
        }

        const days = Math.floor(distance / (1000 * 60 * 60 * 24));
        const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        const seconds = Math.floor((distance % (1000 * 60)) / 1000);

        document.getElementById('days').innerText = String(days).padStart(2, '0');
        document.getElementById('hours').innerText = String(hours).padStart(2, '0');
        document.getElementById('minutes').innerText = String(minutes).padStart(2, '0');
        document.getElementById('seconds').innerText = String(seconds).padStart(2, '0');
    }
    updateTimer(); // запуск сразу при загрузке
    const timerInterval = setInterval(updateTimer, 1000); // Обновлять каждую секунду
});