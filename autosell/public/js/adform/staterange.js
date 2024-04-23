function updateParagraph(value) {
    var output = document.getElementById("output");
    var text = "";

    // Отправляем AJAX-запрос
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                var states = JSON.parse(xhr.responseText);
                text = getStateText(value, states);
            } else {
                text = "Error fetching data";
            }
            output.textContent = text;
        }
    };
    xhr.open("GET", "/api/getstates", true);
    xhr.send();
}

function getStateText(value, states) {
    // Найдем соответствующее состояние
    var state = states.find(function(item) {
        return item.id == value;
    });

    if (state) {
        return state.name; // Предположим, что у состояния есть поле "name"
    } else {
        return "State not found";
    }
}
