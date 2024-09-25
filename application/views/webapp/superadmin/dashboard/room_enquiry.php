<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

<style>

</style>


<div class="container-fluid py-1 mb-6 vh-100">
    <div class="row">
        <div class="col-12">

            <div class="row  ">
                <div class="col-12  m-auto ">
                    <div class="card">
                        <div class="card-body">
                            <form action="">
                                <div class="border-radius-xl bg-white">
                                    <div class="d-lg-flex">
                                        <div class="mb-2">
                                            <h5 class="font-weight-bolder mb-0"> Room Enquiry </h5>
                                        </div>
                                        <div class="ms-auto my-auto mt-lg-0 mt-4">
                                            <div class="ms-auto my-auto">
                                                <button class="btn bg-gradient-info btn-sm mb-0" type="button" data-bs-toggle="modal" data-bs-target="#customermodel">+&nbsp;Add Customer</button>
                                            </div>
                                        </div>
                                    </div>

                                       <!-- Display Selected Room IDs -->
                                    <!-- <div class="row mt-3">
                                        <div class="col-12">
                                            <h6>Selected Room IDs:</h6>
                                            <p><?php echo implode(', ', $room_ids); ?></p> 
                                        </div>
                                    </div> -->

                                    <div class=" ">
                                        <div class=" ">
                                            <div class="row  ">
                                                <div class="col-12 col-sm-4 mt-2">
                                                    <div class="input-group input-group-outline ">
                                                        <select id=" " class="form-control  ">
                                                            <option value="">Select Customer</option>
                                                            <option value=" "> 1</option>
                                                            <option value=" "> 2</option>
                                                            <option value=" "> 3</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="card mt-3" style="box-shadow: 0 4px 6px 1px rgb(111 111 111 / 50%), 0 2px 4px 1px rgb(174 174 174 / 50%);">
                                            <div class="card-body ">
                                                <div class="d-lg-flex">
                                                    <div>
                                                        <h5 class="font-weight-bolder mb-0">Room Name - 201 <span class="text-sm">(Room Type)</span></h5>
                                                    </div>

                                                    <div class="ms-auto my-auto mt-lg-0 mt-4">
                                                        <div class="ms-auto my-auto">

                                                            <button class="btn bg-gradient-danger btn-sm mb-0" type="button">Remove</button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row mt-2 p-0">
                                                    <div class="col-12 p-0">
                                                        <div class="row">
                                                            <div class="col-12 col-sm-4 mt-2">
                                                                <div class="input-group input-group-outline">
                                                                    <label class="form-label" for="daterange">Select Date Range:</label>
                                                                    <input type="text" class="form-control" id="daterange" name="daterange" required>
                                                                </div>
                                                            </div>
                                                            <div class="col-12 col-sm-4 mt-2">
                                                                <div class="input-group input-group-outline">
                                                                    <select id=" " class="form-control  ">
                                                                        <option value="">Select Extra Guest Count</option>
                                                                        <option value=" "> 1</option>
                                                                        <option value=" "> 2</option>
                                                                        <option value=" "> 3</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row mt-3 border py-2">
                                                            <div class="d-flex">
                                                                <div class="mb-2">
                                                                    <h6 class="font-weight-bolder mb-0">Guest details</h6>
                                                                </div>
                                                                <div class="ms-auto my-auto  ">
                                                                    <div class="ms-auto my-auto">
                                                                        <button class="btn bg-gradient-primary btn-sm mb-0" type="button">+&nbsp;Add</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row ">
                                                                <div class="col-12 col-sm-3 mt-2">
                                                                    <div class="input-group input-group-outline is-focused">
                                                                        <label class="form-label"> Name</label>
                                                                        <input class="  form-control" type="text" placeholder=" " />
                                                                    </div>
                                                                </div>
                                                                <div class="col-12 col-sm-3 mt-2">
                                                                    <div class="input-group input-group-outline is-focused">
                                                                        <label class="form-label"> Age</label>
                                                                        <input class="  form-control" type="text" placeholder=" " />
                                                                    </div>
                                                                </div>
                                                                <div class="col-12 col-sm-3 mt-2">
                                                                    <div class="input-group input-group-outline is-focused">
                                                                        <label class="form-label"> Phone Number</label>
                                                                        <input class="  form-control" type="text" placeholder=" " />
                                                                    </div>
                                                                </div>
                                                                <div class="col-12 col-sm-3 mt-2">
                                                                    <div class="input-group input-group-outline is-focused">
                                                                        <label class="form-label"> Id Proof</label>
                                                                        <input class="  form-control" type="file" placeholder=" " />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="card mt-3" style="box-shadow: 0 4px 6px 1px rgb(111 111 111 / 50%), 0 2px 4px 1px rgb(174 174 174 / 50%);">
                                            <div class="card-body ">
                                                <div class="d-lg-flex">
                                                    <div>
                                                        <h5 class="font-weight-bolder mb-0">Room Name - 202 <span class="text-sm">(Room Type)</span></h5>

                                                    </div>

                                                    <div class="ms-auto my-auto mt-lg-0 mt-4">
                                                        <div class="ms-auto my-auto">

                                                            <button class="btn bg-gradient-danger btn-sm mb-0" type="button">Remove</button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row mt-2 p-0">
                                                    <div class="col-12 p-0">
                                                        <div class="row">
                                                            <div class="col-12 col-sm-4 mt-2">
                                                                <div class="input-group input-group-outline">
                                                                    <label class="form-label" for="daterange">Select Date Range:</label>
                                                                    <input type="text" class="form-control" id="daterange" name="daterange" required>
                                                                </div>
                                                            </div>
                                                            <div class="col-12 col-sm-4 mt-2">
                                                                <div class="input-group input-group-outline">
                                                                    <select id=" " class="form-control  ">
                                                                        <option value="">Select Extra Guest Count</option>
                                                                        <option value=" "> 1</option>
                                                                        <option value=" "> 2</option>
                                                                        <option value=" "> 3</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row mt-3 border py-2">
                                                            <div class="d-flex">
                                                                <div class="mb-2">
                                                                    <h6 class="font-weight-bolder mb-0">Guest details</h6>
                                                                </div>
                                                                <div class="ms-auto my-auto  ">
                                                                    <div class="ms-auto my-auto">
                                                                        <button class="btn bg-gradient-primary btn-sm mb-0" type="button">+&nbsp;Add</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row ">
                                                                <div class="col-12 col-sm-3 mt-2">
                                                                    <div class="input-group input-group-outline is-focused">
                                                                        <label class="form-label"> Name</label>
                                                                        <input class="  form-control" type="text" placeholder=" " />
                                                                    </div>
                                                                </div>
                                                                <div class="col-12 col-sm-3 mt-2">
                                                                    <div class="input-group input-group-outline is-focused">
                                                                        <label class="form-label"> Age</label>
                                                                        <input class="  form-control" type="text" placeholder=" " />
                                                                    </div>
                                                                </div>
                                                                <div class="col-12 col-sm-3 mt-2">
                                                                    <div class="input-group input-group-outline is-focused">
                                                                        <label class="form-label"> Phone Number</label>
                                                                        <input class="  form-control" type="number" placeholder=" " />
                                                                    </div>
                                                                </div>
                                                                <div class="col-12 col-sm-3 mt-2">
                                                                    <div class="input-group input-group-outline is-focused">
                                                                        <label class="form-label"> Id Proof</label>
                                                                        <input class="  form-control" type="file" placeholder=" " />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class=" mt-3">
                                            <div class="d-lg-flex">
                                                <div class="mb-2">
                                                    <h5 class="font-weight-bolder mb-0">Advance Payment</h5>
                                                </div>
                                            </div>

                                            <div class="row ">
                                                <div class="col-12 col-sm-4 mt-2">
                                                    <div class="input-group input-group-outline ">
                                                        <label class="form-label">Advance Amount</label>
                                                        <input class="  form-control" type="number" placeholder=" " />
                                                    </div>
                                                </div>
                                                <div class="col-12 col-sm-4 mt-2">
                                                    <div class="input-group input-group-outline">
                                                        <select class="form-control">
                                                            <option value="" disabled>Select Payment Method</option>
                                                            <option value="cash">Cash</option>
                                                            <option value="card">Card</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <div class="button-row d-flex mt-4">
                                    <a href=" " class="ms-auto mb-0">
                                        <button class="ms-auto mb-0 btn bg-gradient-dark " type="button" title="submit">Submit</button></a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="customermodel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel2" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title font-weight-normal" id="exampleModalLabel">Add Customer </h5>
                <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="customerForm" action="add_customer" method="POST">
                <div class="modal-body">

                    <div class="mt-4 input-group input-group-outline">
                        <label class="form-label">Customer Name</label>
                        <input class="form-control" type="text" name="customer_name" required />
                    </div>

                    <div class="mt-4 input-group input-group-outline">
                        <label class="form-label">Age</label>
                        <input class="form-control" type="number" name="age" required />
                    </div>

                    <div class="mt-4 input-group input-group-outline">
                        <label class="form-label">Email</label>
                        <input class="form-control" type="email" name="email" required />
                    </div>

                    <div class="mt-4 input-group input-group-outline">
                        <label class="form-label">Mobile</label>
                        <input class="form-control" type="tel" name="mobile" required />
                    </div>

                    <div class="mt-4 input-group input-group-outline">
                        <textarea class="form-control" name="address" rows="3" placeholder="Address" spellcheck="false" required></textarea>
                    </div>
                    <div class="mt-4 input-group input-group-outline">
                        <label class="form-label"></label>
                        <select class="form-control" name="agency_id" required>
                            <option value="">-- Select Agency --</option>
                            <?php foreach ($agencies as $agency): ?>
                                <option value="<?= $agency['agent_id'] ?>"><?= $agency['agent_name'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="mt-4 input-group input-group-outline">
                        <select class="form-control" name="customer_type" id="customerType" required>
                            <option value="" selected disabled>-- Select Customer Type --</option>
                            <option value="own">Own</option>
                            <option value="company">Company</option>
                        </select>
                    </div>
                    <div id="companyDetails" style="display:none;">
                        <div class="mt-4 input-group input-group-outline">
                            <label class="form-label">Company Name</label>
                            <input class="form-control" type="text" name="company_name" />
                        </div>
                        <div class="mt-4 input-group input-group-outline">
                            <label class="form-label">Company Address</label>
                            <textarea class="form-control" name="company_address" rows="3" spellcheck="false"></textarea>
                        </div>
                        <div class="mt-4 input-group input-group-outline">
                            <label class="form-label">GST Number</label>
                            <input class="form-control" type="text" name="gst_number" />
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn bg-gradient-primary">Add</button>
                </div>
            </form>

        </div>
    </div>
</div>
<!-- Modal -->

<script>
    flatpickr("#daterange", {
        mode: "range", // Enable date range selection
        dateFormat: "Y-m-d", // Format for displaying the selected dates
        minDate: "today", // Set the minimum date as today
        onClose: function(selectedDates, dateStr, instance) {
            console.log("Selected range: ", dateStr); // Logs the selected date range (optional)
        }
    });
</script>

<!-- customer insertion -->
<script>
    document.getElementById('customerForm').addEventListener('submit', function(event) {
    event.preventDefault(); // Prevent the default form submission
    const formData = new FormData(this);
    fetch('add_customer', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            alert('Customer added successfully!');
            // Optionally, you can reload the page or update the table dynamically
            location.reload();
        } else {
            alert('Error adding customer');
        }
    })
    .catch(error => console.error('Error:', error));
});
</script>


<!-- JavaScript to Toggle Company Fields -->
<script>
document.getElementById('customerType').addEventListener('change', function() {
    const companyDetails = document.getElementById('companyDetails');
    const companyNameField = document.querySelector('input[name="company_name"]');
    const companyAddressField = document.querySelector('textarea[name="company_address"]');
    const gstNumberField = document.querySelector('input[name="gst_number"]');

    if (this.value === 'company') {
        companyDetails.style.display = 'block';
        companyNameField.required = true; // Make required
        companyAddressField.required = true; // Make required
        gstNumberField.required = true; // Make required
    } else {
        companyDetails.style.display = 'none';
        companyNameField.required = false; // Not required
        companyAddressField.required = false; // Not required
        gstNumberField.required = false; // Not required
    }
});


</script>

