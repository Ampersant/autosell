function toggleInput(checkbox) {
    // Получаем идентификатор свитча
    var fuelId = checkbox.value;
    // Получаем соответствующий элемент поля ввода
    var inputField = document.getElementById("input-" + fuelId);
  
    // Если свитч выбран, отображаем поле ввода, иначе скрываем его
    if (checkbox.checked) {
      inputField.style.display = "block";
    } else {
      inputField.style.display = "none";
    }
  }
  