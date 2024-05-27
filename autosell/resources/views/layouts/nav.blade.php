
<div class="col-3 m-5 " style="box-shadow: 1px 2px 10px rgba(0, 0, 0, 0.1);">
  <h3>Filters:</h3>
  <form method="post">
    @csrf
  <div class="accordion mt-2" id="accordionExample">
    <div class="accordion-item">
      <h2 class="accordion-header">
        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
          Tech data
        </button>
      </h2>
      <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
        <div class="accordion-body">
          <ul>
             <li>
                <div class="nice-form-group">
                    <label>Transmission</label>
                  <select name="transmission">
                    <option>Please select a value</option>
                    <option>Option 1</option>
                    <option>Option 2</option>
                  </select>
                </div>
              </li>
              <li>
                <div class="nice-form-group">
                  <label>State:</label>
                  <div id="statesContainer">
                    <input type="checkbox" id="html">
                    <label for="html">HTML</label>
                  </div>
                </div>
              </li>
              <li>
                <div class="nice-form-group">
                    <label>Year</label>
                    <div class="row">
                      <div class="col nice-form-group">
                        <select name="year_from">
                          <option>From</option>
                          <option>Option 1</option>
                          <option>Option 2</option>
                        </select>
                      </div>
                      <div class="col nice-form-group">
                        <select name="year_to">
                          <option>To</option>
                          <option>Option 1</option>
                          <option>Option 2</option>
                        </select>
                      </div>
                    </div>
                </div>
              </li>
              <li>
                <div class="nice-form-group">
                    <label>Form</label>
                  <select name="form">
                    <option>Please select a value</option>
                    <option>Option 1</option>
                    <option>Option 2</option>
                  </select>
                </div>
              </li>
           </ul> 
        </div>
      </div>
    </div>
    <div class="accordion-item">
      <h2 class="accordion-header">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
          Auto history
        </button>
      </h2>
      <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
        <div class="accordion-body">
          <ul>
            <li>
              <div class="nice-form-group">
                <label>Mileage</label>
                <div class="row">
                  <div class="col nice-form-group">
                    <select name="mileage_from">
                      <option>From</option>
                      <option>Option 1</option>
                      <option>Option 2</option>
                    </select>
                  </div>
                  <div class="col nice-form-group">
                    <select name="mileage_to">
                      <option>To</option>
                      <option>Option 1</option>
                      <option>Option 2</option>
                    </select>
                  </div>
                </div>
            </div>
            </li>
            <li>
              <div class="nice-form-group">
                <label>Number of users</label>

                <input type="number" name="num_of_users" min=0 max=5>
            </div>
            </li>
            <li>
              <div class="nice-form-group">
                <label>Last technical inspection</label>
                <input type="date" name="last_tech_insp" id="">
            </div>
            </li>
         </ul>
        </div>
      </div>
    </div>
    <div class="accordion-item">
      <h2 class="accordion-header">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
          Fuel and consumption
        </button>
      </h2>
      <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
        <div class="accordion-body">
          <ul>
            <li>
              <div class="nice-form-group">
                <div id="fuel-container">
                  <label>Type of fuel</label>
                  <input type="checkbox" id="check-3" class="switch">
                </div>
              </div>
            </li>
            <li>Consumption:</li>
         </ul>
        </div>
      </div>
    </div>
  </div>
  
<!-- Non-blocking Modal -->
<div id="filterModal" class="fixed-bottom bg-light p-3 shadow" style="display: none;">
  <div class="d-flex justify-content-between align-items-center">
    <span>Do you want to apply the selected filters?</span>
    <div>
      <button type="button" class="btn btn-secondary me-2" id="resetFilters">Reset</button>
      <button type="button" class="btn btn-primary" id="applyFilters">Apply</button>
    </div>
  </div>
</div>

  <!-- Tag Cloud -->
  <div id="tagCloud" class="mt-3"></div>
</div>
<script>
    $(document).ready(function(){
      let csrfToken = $('meta[name="csrf-token"]').attr('content');
      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': csrfToken
        }
      });
      $.ajax({
        url: '{{route('allfilters')}}',
          success: function(result){
          fillFilters(result);
          console.log(result);
        }
      });

    function fillFilters(data){
      //transmissions
      let transmissionSelect = $('select[name="transmission"]');
      transmissionSelect.empty();
      transmissionSelect.append('<option value="null">Please select a value</option>');
      data.transmissions.forEach(function(item){
        transmissionSelect.append('<option value="'+item.id+'">'+item.type+'</option>');
      });
      //states
      let statesContainer = $('#statesContainer');
      statesContainer.empty();
      data.states.forEach(function(item){
        statesContainer.append('<div class="nice-form-group"><input type="checkbox" id="state-'+item.id+'" name="state" value="'+item.id+'"><label for="state-'+item.id+'">'+item.name+'</label></div>');
      });
      //years
      let yearFromSelect = $('select[name="year_from"]');
      let yearToSelect = $('select[name="year_to"]');
      yearFromSelect.empty();
      yearToSelect.empty();
      yearFromSelect.append('<option value="null">From</option>');
      yearToSelect.append('<option value="null">To</option>');
      data.years.forEach(function(year) {
        yearFromSelect.append('<option value="'+year+'">'+year+'</option>');
        yearToSelect.append('<option value="'+year+'">'+year+'</option>');
      });

       //forms
       let formSelect = $('select[name="form"]');
      formSelect.empty();
      formSelect.append('<option value="null">Please select a value</option>');
      data.forms.forEach(function(item) {
        formSelect.append('<option value="'+item.id+'">'+item.name+'</option>');
      });
      //mileage
      let mileageFromSelect = $('select[name="mileage_from"]');
      let mileageToSelect = $('select[name="mileage_to"]');
      mileageFromSelect.empty();
      mileageToSelect.empty();
      mileageFromSelect.append('<option value="null">From</option>');
      mileageToSelect.append('<option value="null">To</option>');
      data.mileages.forEach(function(mileage) {
        mileageFromSelect.append('<option value="'+mileage+'">'+mileage+'</option>');
        mileageToSelect.append('<option value="'+mileage+'">'+mileage+'</option>');
      });
      let fuelContainer = $('#fuel-container');
      fuelContainer.empty();
      data.fuels.forEach(function(item) {
        fuelContainer.append('<div class="nice-form-group"><input type="checkbox" class="switch" id="fuel-'+item.id+'" name="fuel" value="'+item.id+'"><label for="fuel-'+item.id+'">'+item.type+'</label></div>');
      });
    }

    // Show modal on filter change
  $('select, input[type="checkbox"], input[type="number"], input[type="date"]').change(function() {
    $('#filterModal').fadeIn();
  });

  // Apply filters and create tag cloud
  $('#applyFilters').click(function() {
    createTagCloud();
    sendFilters();
    $('#filterModal').fadeOut();
  });

  // Reset filters
  $('#resetFilters').click(function() {
    $('select').val('');
    $('input[type="checkbox"]').prop('checked', false);
    $('input[type="number"]').val('');
    $('input[type="date"]').val('');
    $('#tagCloud').empty();
    $('#filterModal').fadeOut();
  });

  // Create tag cloud
  function createTagCloud() {
    $('#tagCloud').empty();
    $('#tagCloud').append('<label> Tag cloud: </label>');
    $('select, input[type="checkbox"]:checked, input[type="number"], input[type="date"]').each(function() {
      let tag = $(this).find('option:selected').text() || $(this).next('label').text() || $(this).val();

      if (tag) {
        $('#tagCloud').append('<span class="badge bg-primary m-1">'+ tag +'</span>');
      }
    });
  }

  // Send filters to backend
  function sendFilters() {
    let filters = {
      transmission: $('select[name="transmission"]').val(),
      state: $('input[name="state"]:checked').map(function() { return this.value; }).get(),
      year_from: $('select[name="year_from"]').val() === 'null' ? null : $('select[name="year_from"]').val(),
      year_to: $('select[name="year_to"]').val() === 'null' ? null : $('select[name="year_to"]').val(),
      form: $('select[name="form"]').val() === 'null' ? null : $('select[name="form"]').val(),
      mileage_from: $('select[name="mileage_from"]').val() === 'null' ? null : $('select[name="mileage_from"]').val(),
      mileage_to: $('select[name="mileage_to"]').val() === 'null' ? null : $('select[name="mileage_to"]').val(),
      num_of_users: $('input[name="num_of_users"]').val(),
      last_tech_insp: $('input[name="last_tech_insp"]').val(),
      fuel: $('input[name="fuel"]:checked').map(function() { return this.value; }).get(),
    };

    $.ajax({
      url: '{{route('applyfilters')}}',
      method: 'POST',
      data: filters,
      success: function(response) {
        console.log('Filters applied:', response);
        updateContent(response)
      }
    });
  }
  function updateContent(autos) {
    let contentDiv = $('#item');
    contentDiv.empty();
    autos.forEach(function(auto) {
      let autoElement = `
        <div class="row featurette m-5 p-3" style="box-shadow: 1px 2px 10px rgba(0, 0, 0, 0.1);">
          <div class="col-md-7 order-md-2">
            <a class="featurette-heading fw-normal lh-1" href="/singleitem/${auto.id}"><h2 class="featurette-heading fw-normal lh-1">${auto.mark.name} <span class="text-body-secondary">${auto.markmodel.name}</span></h2></a>
            <p class="lead">${auto.description}</p>
          </div>
          <div class="col-md-5 order-md-1">
            <img src="${auto.image[0].thumb_path}" alt="${auto.mark.name}" class="img-fluid mx-auto d-block" style="width: 300px; height: 300px; object-fit: contain;">
          </div>
        </div>`;
      contentDiv.append(autoElement);
    });
  }
});
</script>