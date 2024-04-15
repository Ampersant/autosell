document.addEventListener('DOMContentLoaded', function() {
    // Получаем элементы форм и кнопки
    const card = document.getElementById('card');
    const form1 = document.getElementById('form1');
    const form2 = document.getElementById('form2');
    const form3 = document.getElementById('form3');
    const goto2Btn = document.getElementById('goto2');
    const backTo1Btn = document.getElementById('backTo1');
    const goto3Btn = document.getElementById('goto3');
    const backTo2Btn = document.getElementById('backTo2');

    // Обработчик события нажатия на кнопку "Next 1/3"
    goto2Btn.addEventListener('click', function() {
    // Добавляем анимацию для скрытия первой формы и показываем вторую с анимацией
    card.style.overflow = 'hidden';
    form2.classList.remove('hidden');
    form1.classList.add('slideOutTL');
    form2.classList.add('slideInFR');

    // Удаляем классы анимации после завершения анимации
    setTimeout(function() {
        form1.classList.add('hidden');
        form1.classList.remove('slideOutTL');
        form2.classList.remove('slideInFR');
        form2.classList.remove('hidden');
        card.style.overflow = 'auto'
    }, 500); // Время анимации в миллисекундах (500 мс)
    });

    // Обработчик события нажатия на кнопку "Back" для возврата к первой форме
    backTo1Btn.addEventListener('click', function() {
    // Добавляем анимацию для скрытия второй формы и показываем первую с анимацией
    card.style.overflow = 'hidden';
    form1.classList.remove('hidden');
    form2.classList.add('slideOutTR');
    form1.classList.add('slideInFL');

    
    // Удаляем классы анимации после завершения анимации
    setTimeout(function() {
        form2.classList.add('hidden');
        form2.classList.remove('slideOutTR');
        form1.classList.remove('slideInFL');
        form1.classList.remove('hidden');
        card.style.overflow = 'auto';

    }, 500); // Время анимации в миллисекундах (500 мс)
    });
    // Обработчик события нажатия на кнопку "Next 1/3"
    goto3Btn.addEventListener('click', function() {
    card.style.overflow = 'hidden';
    form2.classList.add('slideOutTL');
    form3.classList.add('slideInFR');
    form3.classList.remove('hidden');

    setTimeout(function() {
        form2.classList.add('hidden');
        form2.classList.remove('slideOutTL');
        form3.classList.remove('slideInFR');

        form3.classList.remove('hidden');
        card.style.overflow = 'auto';

    }, 500); // Время анимации в миллисекундах (500 мс)
    });

    // Обработчик события нажатия на кнопку "Back" для возврата к первой форме
    backTo2Btn.addEventListener('click', function() {
    // Добавляем анимацию для скрытия второй формы и показываем первую с анимацией
    card.style.overflow = 'hidden';
    
    form2.classList.remove('hidden');
    
    form3.classList.add('slideOutTR');
    form2.classList.add('slideInFL');
    // Удаляем классы анимации после завершения анимации
    setTimeout(function() {
        form3.classList.add('hidden');
        form3.classList.remove('slideOutTR');
        form2.classList.remove('slideInFL');
        form2.classList.remove('hidden');
        card.style.overflow = 'auto';

    }, 500); // Время анимации в миллисекундах (500 мс)
    });
});