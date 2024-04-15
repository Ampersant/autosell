function updateParagraph(value) {
    var output = document.getElementById("output");
    var text = "";

    // Определите текст в соответствии с значением ползунка
    switch(value) {
        case "0":
            text = "After accident";
            break;
        case "1":
            text = "Poor";
            break;
        case "2":
            text = "Not good";
            break;
        case "3":
            text = "Ok";
            break;
        case "4":
            text = "Normal";
            break;
        case "5":
            text = "Good";
            break;
        case "6":
            text = "New";
            break;
        default:
            text = "Choose the state";
    }

    // Обновите содержимое параграфа
    output.textContent = text;
}
