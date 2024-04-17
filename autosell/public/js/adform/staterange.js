function updateParagraph(value) {
    var output = document.getElementById("output");
    var text = "";

    // Определите текст в соответствии с значением ползунка
    switch(value) {
        case "1":
            text = "After accident";
            break;
        case "2":
            text = "Poor";
            break;
        case "3":
            text = "Not good";
            break;
        case "4":
            text = "Ok";
            break;
        case "5":
            text = "Normal";
            break;
        case "6":
            text = "Good";
            break;
        case "7":
            text = "New";
            break;
        default:
            text = "Choose the state";
    }

    // Обновите содержимое параграфа
    output.textContent = text;
}
