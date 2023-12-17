<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="{{ asset('css/transactionform_style.css') }}" />
    <script src="{{ asset('js/transactionform.js') }}" defer></script>
    <title>Order Form</title>
    <style>
      #addMoreBtn {
        margin-top: 200px;
      }
    </style>
  </head>
  <body>
    <form action="{{ route('transaction.processorderform', ['customerId' => $customerId]) }}" method="POST" class="form">
      @csrf
      <h1 class="text-center">Order Form</h1>
      <!-- Progress bar -->
      <div class="progressbar">
        <div class="progress" id="progress"></div>
        
        <div
          class="progress-step progress-step-active"
          data-title="Service"
        ></div>
        <div class="progress-step" data-title="Delivery"></div>
        <div class="progress-step" data-title="Total"></div>
        <div class="progress-step" data-title="Payment"></div>
      </div>

      <!-- Steps -->
      <div class="form-step form-step-active">
        <!-- First form step -->
        <div class="formwrapper">
          <div id="FormItems">
            <!-- transactionform.blade.php -->
            <table>
              <tr>
                <td>
                  <select name="addmore[0][service]" class="service form-control">
                    <option value="">Select a service</option>
                    @foreach($services as $svc_id => $svc_name)
                    <option value="{{ $svc_name }}">{{ $svc_name }}</option>
                    @endforeach
                  </select>
                </td>
                <td>
                  <input type="text" name="addmore[0][qty]" placeholder="Enter your Qty" class="form-control" />
                </td>
              </tr>
            </table>
          </div>
          <input type="button" value="Add More" class="Addmore">
          <a href="#" class="btn btn-next">Next</a>
        </div>
      </div>
      <div class="form-step">
        <div class="input-group">
          <label for="delivery">Do you need delivery?</label>
          <div class="radio-group">
            <input type="radio" name="delivery" id="delivery-yes" value="yes" required />
            <label for="delivery-yes">Yes</label>
            <input type="radio" name="delivery" id="delivery-no" value="no" required />
            <label for="delivery-no">No</label>
          </div>
        </div>
        <div class="input-group">
          <label for="address">Address Optional</label>
          <input type="text" name="address" id="address" />
        </div>
        <div class="btns-group">
          <a href="#" class="btn btn-prev">Previous</a>
          <input type="submit" value="Submit" class="btn" />
        </div>
      </div>
    </form>
    <script>
      const serviceOptions = [
        @foreach($services as $svc_id => $svc_name)
        { id: "{{ $svc_id }}", name: "{{ $svc_name }}" },
        @endforeach
      ];

      let i = 0;
      const addMoreBtn = document.querySelector(".Addmore");
      addMoreBtn.addEventListener("click", (e) => {
        e.preventDefault();

        i++;

        // create table row
        const tr = document.createElement("tr");
        const td1 = document.createElement("td");
        const td2 = document.createElement("td");

        // create select element
        const selectElement = document.createElement("select");
        selectElement.name = "addmore[" + i + "][service]";
        selectElement.className = "service form-control";

        // add default option
        const defaultOption = document.createElement("option");
        defaultOption.value = "";
        defaultOption.textContent = "Select a service";
        selectElement.appendChild(defaultOption);

        // add options from server-side data
        serviceOptions.forEach(option => {
          const optionElement = document.createElement("option");
          optionElement.value = option.id;
          optionElement.textContent = option.name;
          selectElement.appendChild(optionElement);
        });

        // create input field
        const inputElement = document.createElement("input");
        inputElement.type = "text";
        inputElement.name = "addmore[" + i + "][qty]";
        inputElement.placeholder = "Enter your Qty";
        inputElement.className = "form-control";

        td1.appendChild(selectElement);
        td2.appendChild(inputElement);

        tr.appendChild(td1);
        tr.appendChild(td2);

        // append the table row to the table
        const table = document.querySelector("#FormItems table");
        table.appendChild(tr);
      });

      const btnNext = document.querySelector(".btn-next");
      btnNext.addEventListener("click", (e) => {
        e.preventDefault();
        const currentStep = document.querySelector(".form-step-active");
        const nextStep = currentStep.nextElementSibling;

        currentStep.classList.remove("form-step-active");
        nextStep.classList.add("form-step-active");
      });

      const btnPrev = document.querySelector(".btn-prev");
      btnPrev.addEventListener("click", (e) => {
        e.preventDefault();
        const currentStep = document.querySelector(".form-step-active");
        const prevStep = currentStep.previousElementSibling;

        currentStep.classList.remove("form-step-active");
        prevStep.classList.add("form-step-active");
      });
    </script>
  </body>
</html>
