document.addEventListener("DOMContentLoaded", function() {
    const colorButtons = document.querySelectorAll('.color-button');
    const selectedColor = document.getElementById('selectedColor');
    const selectedColorInput = document.getElementById('selectedColorInput');
  
    colorButtons.forEach(button => {
      button.addEventListener('click', () => {
        const color = button.getAttribute('data-color');
        const colorId = button.getAttribute('data-color-id');
        selectedColor.textContent = `Selected color: ${color}`;
        
        // Установка выбранного цвета в скрытое поле
        selectedColorInput.value = colorId;
      });
    });
  });