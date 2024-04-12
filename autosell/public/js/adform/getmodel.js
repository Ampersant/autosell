$(document).ready(function() {
    $("#mark").change(function() {
      var selectedValue = $(this).val();
      if (selectedValue == "null") {
        $("#model").attr("disabled");
      }
      if (selectedValue) {
        $.ajax({
          url: "/api/getmodelsbymark",
          type: "GET",
          data: { selectedOption: selectedValue },
          success: function(response) {
            $("#model").empty();
            $("#model").removeAttr("disabled");
            response.forEach(function(model) {
              $("#model").append('<option value="' + model.id + '">' + model.name + '</option>');
          });
          },
          error: function(jqXHR, textStatus, errorThrown) {
            console.error("Error:", textStatus, errorThrown);
          }
        });
      } else {
        $("#result").html(""); // Clear the result div if nothing is selected
      }
    });
  });