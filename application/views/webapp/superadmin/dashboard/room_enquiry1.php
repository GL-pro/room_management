<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

<style>
    /* Styles for the date range input */
    .input-group-outline {
        position: relative;
    }

    .input-group-outline input:focus {
        outline: none;
        border: 2px solid red;
        /* Red outline when focused */
    }

    .input-group-outline input.error {
        border: 2px solid red;
        /* Red outline for error state */
    }

    .input-group-outline input {
        cursor: pointer;
        /* Change cursor to pointer */
    }
</style>


<div class="container-fluid py-1 mb-6 vh-100">
    <div class="row">
        <div class="col-12">

            <div class="row  ">
                <div class="col-12  m-auto ">
                    <div class="card">
                        <div class="card-body">
                            <!-- <form action=""> -->
                            <form id="roomEnquiryForm" action="<?= base_url('Superadmin/room_enquiry_submit') ?>" method="post" enctype="multipart/form-data">
                                <div class="border-radius-xl bg-white">

                                    <div class="d-lg-flex">
                                        <div class="mb-2">
                                            <h5 class="font-weight-bolder mb-0"> Room Enquiry </h5>
                                        </div>
                                    </div>



                                    <div class=" ">
                                        <div class="">
                                            <div class="row">
                                                <div class="col-12 col-sm-4 mt-2">
                                                    <div class="input-group input-group-static">
                                                        <label class="form-label text-primary">Agent</label>
                                                        <a href="#" class="ms-auto btn btn-sm mb-0 btn-outline-info" style="border-radius: .375rem" data-bs-toggle="modal" data-bs-target="#agentmodel"> + Add Agent</a>
                                                        <select class="form-control" id="choices-Agency" name="agent_id">
                                                            <option value="">Select Agent</option>
                                                            <?php foreach ($agencies as $agent): ?>
                                                                <option value="<?= $agent['agent_id'] ?>"><?= $agent['agent_name'] ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-sm-4 mt-2">
                                                    <div class="input-group input-group-static">
                                                        <label class="form-label text-primary">Customer</label>
                                                        <a href="#" class="ms-auto btn btn-sm mb-0 btn-outline-info" data-bs-toggle="modal" data-bs-target="#customermodel"> + Add Customer</a>
                                                        <select class="form-control" id="choices-Customer" name="customer_id">
                                                            <option value="">Select Customer</option>
                                                            <?php foreach ($customers as $customer): ?>
                                                                <option value="<?= $customer['customer_id'] ?>"><?= $customer['customer_name'] ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>








                                        <?php if (!empty($room_details)): ?>
                                            <?php foreach ($room_details as $room): ?>
                                                <input type="hidden" name="room_id[]" value="<?= $room['hotel_roomid'] ?>">
                                                <input type="hidden" name="roomno[]" value="<?= $room['roomno'] ?>">
                                                <input type="hidden" name="room_name[]" value="<?= $room['room_name'] ?>">
                                                <input type="hidden" name="noofguests[]" value="<?= $room['noofguests'] ?>">

                                                    <div class="card mt-3" id="room-card-<?= $room['hotel_roomid'] ?>">
                                                    <div class="card-body ">
                                                        <div class="d-flex">
                                                            <div>
                                                                <h5 class="font-weight-bolder mb-0"><?= $room['room_name'] ?> - <?= $room['roomno'] ?> <span class="text-sm">(<?= $room['roomtype'] ?>)</span></h5>
                                                            </div>
                                                            <div class="ms-auto my-auto mt-lg-0 mt-4">
                                                                <div class="ms-auto my-auto"> 
                                                                    <button class="btn btn-danger btn-sm remove-room" type="button" data-room-id="<?= $room['hotel_roomid'] ?>">Remove the room</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row mt-2 p-0">
                                                            <div class="col-12 p-0">
                                                                <div class="row">
                                                                    <div class="col-12 col-sm-4 mt-2">
                                                                        <div class="input-group input-group-outline">
                                                                            <label class="form-label" for="daterange">Select Date Range:</label>
                                                                            <input type="text" class="form-control" id="daterange" name="daterange[]" required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-12 col-sm-4 mt-2">
                                                                        <div class="input-group input-group-outline">
                                                                            <select class="form-control extra-guest-count" name="extra_guest_count[]" data-rooms-ids="<?= $room['hotel_roomid'] ?>">
                                                                                <option value="">Select Extra Guest Count</option>
                                                                                <?php for ($i = 1; $i <= $room['extguests']; $i++): ?>
                                                                                    <option value="<?= $i ?>"><?= $i ?></option>
                                                                                <?php endfor; ?>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row mt-3 border py-2">
                                                                    <div class="d-flex">
                                                                        <div class="mb-2">
                                                                            <h6 class="font-weight-bolder mb-0">Guest details</h6>
                                                                        </div>
                                                                    </div>

                                                                    <div class="row ">
                                                                        <?php for ($i = 0; $i < $room['noofguests']; $i++): ?>
                                                                            <div class="col-12 col-sm-3 mt-2">
                                                                                <div class="input-group input-group-outline is-focused">
                                                                                    <label class="form-label">Name</label>
                                                                                    <!-- <input class="form-control" type="text" name="guest_name[<?= $i ?>]" placeholder="Guest Name" /> -->
                                                                                    <input class="form-control" type="text" name="guest_name[<?= $room['hotel_roomid'] ?>][]" placeholder="Guest Name" />
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-12 col-sm-3 mt-2">
                                                                                <div class="input-group input-group-outline is-focused">
                                                                                    <label class="form-label">Age</label>
                                                                                    <input class="form-control" type="number" name="guest_age[<?= $room['hotel_roomid'] ?>][]" placeholder="Guest Age" />
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-12 col-sm-3 mt-2">
                                                                                <div class="input-group input-group-outline is-focused">
                                                                                    <label class="form-label">Phone Number</label>
                                                                                    <!-- <input class="form-control" type="text" name="guest_phone[<?= $i ?>]" placeholder="Phone Number" /> -->
                                                                                    <input class="form-control" type="text" name="guest_phone[<?= $room['hotel_roomid'] ?>][]" placeholder="Phone Number" />
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-12 col-sm-3 mt-2">
                                                                                <div class="input-group input-group-outline is-focused">
                                                                                    <label class="form-label">Id Proof</label>
                                                                                    <!-- <input class="form-control" type="file" name="guest_id_proof[<?= $i ?>]" /> -->
                                                                                    <input class="form-control" type="file" name="guest_id_proof[<?= $room['hotel_roomid'] ?>][]" />
                                                                                </div>
                                                                            </div>
                                                                        <?php endfor; ?>
                                                                    </div>
                                                                </div>

                                                                <!-- Extra Guests will be appended here -->
                                                                <div id="extra-guests-<?= $room['hotel_roomid'] ?>"></div>
                                                                <!-- Extra Guests will be appended here -->

                                                                <div class="row mt-3 border py-2">
                                                                    <div class="d-flex">
                                                                        <div class="mb-2">
                                                                            <h6 class="font-weight-bolder mb-0">Item Details</h6>
                                                                        </div>
                                                                        <div class="ms-auto my-auto mt-lg-0 mt-4">
                                                                            <div class="ms-auto my-auto">
                                                                                <button class="btn btn-primary btn-sm remove-room " type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">Add Items</button> 
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="row ">
                                                                        <div class=" ">
                                                                            <div class="table-responsive ">
                                                                                <table class="table align-items-center mb-0 table-flush table-bordered rounded-3 table-stripe">
                                                                                    <thead class="bg-light">
                                                                                        <tr>
                                                                                            <th class="text-uppercase text-dark text-xxs font-weight-bolder w-30">Item</th>
                                                                                            <th class="text-uppercase text-dark text-xxs font-weight-bolder ps-2">Current Price</th>
                                                                                            <th class="text-uppercase text-dark text-xxs font-weight-bolder ps-2">New Price</th>
                                                                                            <th class="text-uppercase text-dark text-xxs font-weight-bolder ps-2">quantity </th>
                                                                                            <th class="text-uppercase text-dark text-xxs font-weight-bolder ps-2">Totel Price</th>
                                                                                            <th class="text-uppercase text-dark text-xxs font-weight-bolder ps-2">Action</th>
                                                                                        </tr>
                                                                                    </thead>
                                                                                    <tbody>
                                                                                        <tr>
                                                                                            <td class="w-30">
                                                                                                <div class="d-flex px-2 py-1 w-30">
                                                                                                    <div>
                                                                                                        <img src="https://demos.creative-tim.com/test/material-dashboard-pro/assets/img/team-2.jpg" class="avatar avatar-md me-3 my-auto">
                                                                                                    </div>
                                                                                                    <div class="d-flex flex-column justify-content-center w-30">
                                                                                                        <h6 class="mb-0 text-md w-30">Item Name</h6>
                                                                                                        <p class="text-sm text-secondary mb-0 w-30">Category</p>
                                                                                                        <p class="text-sm text-secondary mb-0 w-30">Sub Category</p>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </td>
                                                                                            <td>
                                                                                                <p class="text-md font-weight-bold mb-0">₹ 1000/-</p>
                                                                                            </td>
                                                                                            <td>
                                                                                                <div class="input-group input-group-outline">
                                                                                                    <!-- <label class="form-label"> </label> -->
                                                                                                    <input class="form-control" type="number" name="commamt" required />
                                                                                                </div>
                                                                                            </td>
                                                                                            <td>
                                                                                                <div class=" input-group input-group-outline">
                                                                                                    <!-- <label class="form-label"> </label> -->
                                                                                                    <input class="form-control" type="number" name="commamt" required />
                                                                                                </div>
                                                                                            </td>
                                                                                            <td class="align-middle text-center">
                                                                                                <p class="text-lg font-weight-bold mb-0">₹ 1000/-</p>
                                                                                            </td>
                                                                                            <td class="align-middle text-center">
                                                                                                <button class="btn btn-dark btn-sm mb-0">Remove</button>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <!-- <tr>
                                                                                            <td class="w-30">
                                                                                                <div class="d-flex px-2 py-1 w-30">
                                                                                                    <div>
                                                                                                        <img src="https://demos.creative-tim.com/test/material-dashboard-pro/assets/img/team-2.jpg" class="avatar avatar-md me-3 my-auto">
                                                                                                    </div>
                                                                                                    <div class="d-flex flex-column justify-content-center w-30">
                                                                                                        <h6 class="mb-0 text-md w-30">Item Name</h6>
                                                                                                        <p class="text-sm text-secondary mb-0 w-30">Category</p>
                                                                                                        <p class="text-sm text-secondary mb-0 w-30">Sub Category</p>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </td>
                                                                                            <td>
                                                                                                <p class="text-md font-weight-bold mb-0">₹ 1000/-</p>
                                                                                            </td>
                                                                                            <td>
                                                                                                <div class="input-group input-group-outline">
                                                                                                  
                                                                                                    <input class="form-control" type="number" name="commamt" required />
                                                                                                </div>
                                                                                            </td>
                                                                                            <td>
                                                                                                <div class=" input-group input-group-outline">
                                                                                                   
                                                                                                    <input class="form-control" type="number" name="commamt" required />
                                                                                                </div>
                                                                                            </td>
                                                                                            <td class="align-middle text-center">
                                                                                                <p class="text-lg font-weight-bold mb-0">₹ 1000/-</p>
                                                                                            </td>
                                                                                            <td class="align-middle text-center">
                                                                                                <button class="btn btn-dark btn-sm mb-0">Remove</button>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td class="w-30">
                                                                                                <div class="d-flex px-2 py-1 w-30">
                                                                                                    <div>
                                                                                                        <img src="https://demos.creative-tim.com/test/material-dashboard-pro/assets/img/team-2.jpg" class="avatar avatar-md me-3 my-auto">
                                                                                                    </div>
                                                                                                    <div class="d-flex flex-column justify-content-center w-30">
                                                                                                        <h6 class="mb-0 text-md w-30">Item Name</h6>
                                                                                                        <p class="text-sm text-secondary mb-0 w-30">Category</p>
                                                                                                        <p class="text-sm text-secondary mb-0 w-30">Sub Category</p>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </td>
                                                                                            <td>
                                                                                                <p class="text-md font-weight-bold mb-0">₹ 1000/-</p>
                                                                                            </td>
                                                                                            <td>
                                                                                                <div class="input-group input-group-outline">
                                                                                             
                                                                                                    <input class="form-control" type="number" name="commamt" required />
                                                                                                </div>
                                                                                            </td>
                                                                                            <td>
                                                                                                <div class=" input-group input-group-outline">
                                                                                                 
                                                                                                    <input class="form-control" type="number" name="commamt" required />
                                                                                                </div>
                                                                                            </td>
                                                                                            <td class="align-middle text-center">
                                                                                                <p class="text-lg font-weight-bold mb-0">₹ 1000/-</p>
                                                                                            </td>
                                                                                            <td class="align-middle text-center">
                                                                                                <button class="btn btn-dark btn-sm mb-0">Remove</button>
                                                                                            </td>
                                                                                        </tr> -->

                                                                                        <tr></tr>
                                                                                    </tbody>
                                                                                </table>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endforeach; ?>
                                        <?php else: ?>
                                            <p>No rooms selected.</p>
                                        <?php endif; ?>

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
                                                        <input class="  form-control" type="number" name="advance_amount" placeholder=" " />
                                                    </div>
                                                </div>
                                                <div class="col-12 col-sm-4 mt-2">
                                                    <div class="input-group input-group-outline">
                                                        <select name="payment_method" class="form-control">
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
                                    <!-- <a href=" " class="ms-auto mb-0"> -->
                                    <button class="ms-auto mb-0 btn bg-gradient-dark" type="submit" title="submit">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<script src="<?= base_url() ?>assets2/js/plugins/choices.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


<script>
    if (document.getElementById('choices-Customer')) {
        var element = document.getElementById('choices-Customer');
        const example = new Choices(element, {
            searchEnabled: true,
            shouldSort: false,
        });
    };
    if (document.getElementById('choices-Agency')) {
        var element = document.getElementById('choices-Agency');
        const example = new Choices(element, {
            searchEnabled: true,
            shouldSort: false,
        });
    };
</script>


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


<script>
    document.querySelectorAll('.extra-guest-count').forEach(function(select) {
        select.addEventListener('change', function() {
            const roomId = this.getAttribute('data-rooms-ids');
            const extraGuestCount = parseInt(this.value);
            const container = document.getElementById('extra-guests-' + roomId);
            // Clear previous extra guest fields
            container.innerHTML = '';
            if (extraGuestCount > 0) {
                for (let i = 1; i <= extraGuestCount; i++) {
                    // Create the guest detail fields for each extra guest
                    container.innerHTML += `
                    <div class="row mt-3 border py-2">
                        <div class="col-12 col-sm-3 mt-2">
                            <div class="input-group input-group-outline is-focused">
                                <label class="form-label">Extra Guest ${i} Name</label>
                                <input class="form-control" type="text" name="extra_guest_name_${roomId}[]" placeholder="Extra Guest Name" />
                            </div>
                        </div>
                        <div class="col-12 col-sm-3 mt-2">
                            <div class="input-group input-group-outline is-focused">
                                <label class="form-label">Age</label>
                                <input class="form-control" type="number" name="extra_guest_age_${roomId}[]" placeholder="Guest Age" />
                            </div>
                        </div>
                        <div class="col-12 col-sm-3 mt-2">
                            <div class="input-group input-group-outline is-focused">
                                <label class="form-label">Phone Number</label>
                                <input class="form-control" type="text" name="extra_guest_phone_${roomId}[]" placeholder="Phone Number" />
                            </div>
                        </div>
                        <div class="col-12 col-sm-3 mt-2">
                            <div class="input-group input-group-outline is-focused">
                                <label class="form-label">Id Proof</label>
                                <input class="form-control" type="file" name="extra_guest_id_proof_${roomId}[]" />
                            </div>
                        </div>
                    </div>
                `;
                }
            }
        });
    });
</script>


<script>
    let removedRooms = [];
    document.querySelectorAll('.remove-room').forEach(button => {
        button.addEventListener('click', function() {
            const roomId = this.getAttribute('data-room-id');
            // Hide or remove the room card
            const roomCard = document.getElementById('room-card-' + roomId);
            roomCard.style.display = 'none'; // You can also use roomCard.remove();
            // Add the room ID to the removedRooms array
            removedRooms.push(roomId);
        });
    });
    // When submitting the form
    document.getElementById('roomEnquiryForm').addEventListener('submit', function() {
        // Convert removedRooms array to a JSON string and include it in the form
        const removedRoomsInput = document.createElement('input');
        removedRoomsInput.type = 'hidden';
        removedRoomsInput.name = 'removed_rooms';
        removedRoomsInput.value = JSON.stringify(removedRooms);
        this.appendChild(removedRoomsInput);
    });
</script>







<!-- Customer Modal -->
<div class="modal fade" id="customermodel" tabindex="-1" role="dialog" aria-labelledby="customermodel" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title font-weight-normal" id="customermodel">Add Customer </h5>
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
                            <option value="">-- Select Agent --</option>
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
<!-- End Customer Modal -->


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




<!-- Modal -->
<div class="modal fade" id="agentmodel" tabindex="-1" role="dialog" aria-labelledby="agentmodel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title font-weight-normal" id="agentmodel">Add Agent </h5>
                <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="agentForm" action="add_agent" method="POST">
                <div class="modal-body">

                    <div class="mt-4 input-group input-group-outline">
                        <label class="form-label">Agent Name</label>
                        <input class="form-control" type="text" name="agent_name" required />
                    </div>

                    <div class="mt-4 input-group input-group-outline">
                        <label class="form-label">Email</label>
                        <input class="form-control" type="email" name="email1" required />
                    </div>

                    <div class="mt-4 input-group input-group-outline">
                        <label class="form-label">Mobile</label>
                        <input class="form-control" type="tel" name="mobile1" required />
                    </div>

                    <div class="mt-4 input-group input-group-outline">
                        <textarea class="form-control" name="address1" rows="3" placeholder="Address" spellcheck="false" required></textarea>
                    </div>

                    <div class="mt-4 input-group input-group-outline">
                        <label class="form-label">Commission(%)</label>
                        <input class="form-control" type="text" name="comm" required />
                    </div>

                    <div class="mt-4 input-group input-group-outline">
                        <label class="form-label">Commission Amount</label>
                        <input class="form-control" type="text" name="commamt" required />
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

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title font-weight-normal" id="exampleModalLabel">Add Items</h5>
                <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card">
                    <div class="table-responsive ">
                        <table class="table align-items-center mb-0 table-flush table-bordered rounded-3 table-stripe">
                            <thead class="bg-light">
                                <tr>
                                    <th class="text-uppercase text-dark text-xxs font-weight-bolder w-30">Item</th>
                                    <th class="text-uppercase text-dark text-xxs font-weight-bolder ps-2">Current Price</th>
                                    <th class="text-uppercase text-dark text-xxs font-weight-bolder ps-2">New Price</th>
                                    <th class="text-uppercase text-dark text-xxs font-weight-bolder ps-2">quantity </th>
                                    <th class="text-uppercase text-dark text-xxs font-weight-bolder ps-2">Totel Price</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="w-30">
                                        <div class="d-flex px-2 py-1 w-30">
                                            <div>
                                                <img src="https://demos.creative-tim.com/test/material-dashboard-pro/assets/img/team-2.jpg" class="avatar avatar-md me-3 my-auto">
                                            </div>
                                            <div class="d-flex flex-column justify-content-center w-30">
                                                <h6 class="mb-0 text-md w-30">Item Name</h6>
                                                <p class="text-sm text-secondary mb-0 w-30">Category</p>
                                                <p class="text-sm text-secondary mb-0 w-30">Sub Category</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <p class="text-md font-weight-bold mb-0">₹ 1000/-</p>
                                    </td>
                                    <td>
                                        <div class="input-group input-group-outline">
                                            <!-- <label class="form-label"> </label> -->
                                            <input class="form-control" type="number" name="commamt" required />
                                        </div>
                                    </td>
                                    <td>
                                        <div class=" input-group input-group-outline">
                                            <!-- <label class="form-label"> </label> -->
                                            <input class="form-control" type="number" name="commamt" required />
                                        </div>
                                    </td>
                                    <td class="align-middle text-center">
                                        <p class="text-lg font-weight-bold mb-0">₹ 1000/-</p>
                                    </td>
                                </tr>
                                <!-- <tr>
                                    <td class="w-30">
                                        <div class="d-flex px-2 py-1 w-30">
                                            <div>
                                                <img src="https://demos.creative-tim.com/test/material-dashboard-pro/assets/img/team-2.jpg" class="avatar avatar-md me-3 my-auto">
                                            </div>
                                            <div class="d-flex flex-column justify-content-center w-30">
                                                <h6 class="mb-0 text-md w-30">Item Name</h6>
                                                <p class="text-sm text-secondary mb-0 w-30">Category</p>
                                                <p class="text-sm text-secondary mb-0 w-30">Sub Category</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <p class="text-md font-weight-bold mb-0">₹ 1000/-</p>
                                    </td>
                                    <td>
                                        <div class="input-group input-group-outline">
                                           
                                            <input class="form-control" type="number" name="commamt" required />
                                        </div>
                                    </td>
                                    <td>
                                        <div class=" input-group input-group-outline">
                                         
                                            <input class="form-control" type="number" name="commamt" required />
                                        </div>
                                    </td>
                                    <td class="align-middle text-center">
                                        <p class="text-lg font-weight-bold mb-0">₹ 1000/-</p>
                                    </td>
                                </tr> -->
                                <!-- <tr>
                                    <td class="w-30">
                                        <div class="d-flex px-2 py-1 w-30">
                                            <div>
                                                <img src="https://demos.creative-tim.com/test/material-dashboard-pro/assets/img/team-2.jpg" class="avatar avatar-md me-3 my-auto">
                                            </div>
                                            <div class="d-flex flex-column justify-content-center w-30">
                                                <h6 class="mb-0 text-md w-30">Item Name</h6>
                                                <p class="text-sm text-secondary mb-0 w-30">Category</p>
                                                <p class="text-sm text-secondary mb-0 w-30">Sub Category</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <p class="text-md font-weight-bold mb-0">₹ 1000/-</p>
                                    </td>
                                    <td>
                                        <div class="input-group input-group-outline">
                                          
                                            <input class="form-control" type="number" name="commamt" required />
                                        </div>
                                    </td>
                                    <td>
                                        <div class=" input-group input-group-outline">
                                           
                                            <input class="form-control" type="number" name="commamt" required />
                                        </div>
                                    </td>
                                    <td class="align-middle text-center">
                                        <p class="text-lg font-weight-bold mb-0">₹ 1000/-</p>
                                    </td>
                                </tr> -->

                                <tr></tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn bg-gradient-primary">Add</button>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->







<!-- customer insertion -->
<script>
    document.getElementById('customerForm').addEventListener('submit', function(event) {
        console.log("Customer form submitted");
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

<script>
    document.querySelectorAll('.modal-content').forEach(function(modalContent) {
        modalContent.addEventListener('click', function(event) {
            event.stopPropagation();
        });
    });
    document.querySelector('.modal-backdrop').addEventListener('click', function() {
        console.log("Backdrop clicked");
    });

    $('#customermodel').modal({
        backdrop: 'static',
        keyboard: false
    });
</script>
<!-- agent insertion -->
<script>
    document.getElementById('agentForm').addEventListener('submit', function(event) {
        console.log("Agent form submitted");
        event.preventDefault(); // Prevent the default form submission
        const formData = new FormData(this);
        fetch('add_agent', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert('Agent added successfully!');
                    // Optionally, you can reload the page or update the table dynamically
                    location.reload();
                } else {
                    alert('Error adding agent');
                }
            })
            .catch(error => console.error('Error:', error));
    });
</script>



<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Initialize the date picker for the date range input
        flatpickr("#daterange", {
            mode: "range",
            dateFormat: "Y-m-d"
        });
        document.getElementById('roomEnquiryForm').addEventListener('submit', function(event) {
            const dateRangeInput = document.getElementById('daterange').value; // Get the value of the date range
            let isValid = false; // Flag to check if at least one guest detail is filled
            const roomCards = document.querySelectorAll('.card');
            // First, check if the date range is selected
            if (!dateRangeInput) {
                event.preventDefault(); // Prevent form submission
                alert('Please select a date range for the room.'); // Show warning message
                return; // Exit the function early
            }
            // Now check for guest details
            roomCards.forEach((roomCard) => {
                const guestInputs = roomCard.querySelectorAll('input[name^="guest_name"], input[name^="guest_age"], input[name^="guest_phone"]');
                let hasGuestDetail = false; // Flag for this specific room card
                // Check if at least one guest's details are filled
                guestInputs.forEach((input) => {
                    if (input.value.trim() !== '') {
                        hasGuestDetail = true; // Set the flag if at least one field is filled
                    }
                });
                if (hasGuestDetail) {
                    isValid = true; // Set overall validity to true
                }
            });
            if (!isValid) {
                event.preventDefault(); // Prevent form submission
                alert('Please add at least one guest detail before submitting the form.'); // Show warning message
            }
        });
    });
</script>