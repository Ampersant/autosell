$(document).ready(function() {
    $("#type").change(function() {
      var selectedValue = $(this).val();
      if (selectedValue == "null") {
        $("#mark").attr("disabled");
      }
      if (selectedValue) {
        $.ajax({
          url: "/api/getmarks",
          type: "GET",
          data: { selectedOption: selectedValue },
          success: function(response) {
            $("#mark").empty();
            $("#mark").removeAttr("disabled");
            $("#mark").append('<option value="">Choose the mark</option>');
            response.forEach(function(mark) {
              $("#mark").append('<option value="' + mark.id + '">' + mark.name + '</option>');
          });
          $("#mark option:first").attr('selected', 'selected');
          },
          error: function(jqXHR, textStatus, errorThrown) {
            console.error("Error:", textStatus, errorThrown);
          }
        }),
        $.ajax({
          url: "/api/getforms",
          type: "GET",
          data: { selectedOption: selectedValue },
          success: function(response) {
            $("#form").empty();
            $("#form").removeAttr("disabled");
            $("#form").append('<option value="">Choose the form</option>');
            response.forEach(function(form) {
              $("#form").append('<option value="' + form.id + '">' + form.name + '</option>');
          });
          $("#mark option:first").attr('selected', 'selected');
          },
          error: function(jqXHR, textStatus, errorThrown) {
            console.error("Error:", textStatus, errorThrown);
          }
        });
      } else {
        $("#result").html(""); // Clear the result div if nothing is selected
      }
    });
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
            $("#model").append('<option value="">Choose the model</option>');
            response.forEach(function(model) {
              $("#model").append('<option value="' + model.id + '">' + model.name + '</option>');
          });
          $("#model option:first").attr('selected', 'selected');
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