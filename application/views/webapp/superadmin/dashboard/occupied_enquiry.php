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
                        <form id="occupyform" action="<?= base_url('Superadmin/settlement') ?>" method="post" enctype="multipart/form-data">

                        <input type="hidden" name="booking_id" value="<?= $booking_details[0]['booking_id']; ?>"> 
                                <div class="border-radius-xl bg-white">

                                    <div class="d-lg-flex">
                                        <div class="mb-2">
                                            <h5 class="font-weight-bolder mb-0"> Room Enquiry </h5>
                                        </div>
                                        <!-- <div class="ms-auto my-auto mt-lg-0 mt-4">
                                            <div class="ms-auto my-auto">
                                                <button class="btn bg-gradient-info btn-sm mb-0" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal2">+&nbsp;Add Customer</button>
                                            </div>
                                        </div> -->
                                    </div>

                                <div class=" ">

                                    <div class="">
                                    <div class="row">
        <!-- Agent and Customer sections should be outside the room loop -->
        <div class="col-12 col-sm-4 mt-2">
            <div class="input-group input-group-static">
                <label class="form-label text-primary">Agent</label>
                <a href="#" class="ms-auto btn btn-sm mb-0 btn-outline-info" style="border-radius: .375rem" data-bs-toggle="modal" data-bs-target="#agentmodel"> + Add Agent</a>
                <select class="form-control" id="choices-Agency" name="agent_id">
                    <option value="">Select Agent</option>
                    <?php foreach ($agencies as $agent): ?>
                        <option value="<?= $agent['agent_id'] ?>" <?= (!empty($booking_details) && $booking_details[0]['agent_id'] == $agent['agent_id']) ? 'selected' : '' ?>>
                            <?= $agent['agent_name'] ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>

        <div class="col-12 col-sm-4 mt-2">
            <div class="input-group input-group-static">
                <label class="form-label text-primary">Customer</label>
                <a href="#" class="ms-auto btn btn-sm mb-0 btn-outline-info" style="border-radius: .375rem" data-bs-toggle="modal" data-bs-target="#customermodel"> + Add Customer</a>
                <select class="form-control" id="choices-Customer" name="customer_id">
                    <option value="">Select Customer</option>
                    <?php foreach ($customers as $customer): ?>
                        <option value="<?= $customer['customer_id'] ?>" <?= (!empty($booking_details) && $booking_details[0]['customer_id'] == $customer['customer_id']) ? 'selected' : '' ?>>
                            <?= $customer['customer_name'] ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
    </div>


                                    </div>



    <?php if (!empty($booking_details)): ?>
    <?php 
    $rendered_rooms = []; // Initialize an array to track rendered room IDs
    foreach ($booking_details as $room): 
        if (in_array($room['hotel_roomid'], $rendered_rooms)) {
            continue; // Skip rendering if the room is already rendered
        }
        $rendered_rooms[] = $room['hotel_roomid']; // Add the room ID to the rendered list
    ?>

        <input type="hidden" name="room_id[]" value="<?= $room['hotel_roomid'] ?>">
        <input type="hidden" name="roomno[]" value="<?= $room['roomno'] ?>">
        <input type="hidden" name="room_name[]" value="<?= $room['room_name'] ?>">
        <input type="hidden" name="noofguests[]" value="<?= $room['noofguests'] ?>">

        <div class="card mt-3" id="room-card-<?= $room['hotel_roomid'] ?>" style="box-shadow: 0 4px 6px 1px rgb(111 111 111 / 50%), 0 2px 4px 1px rgb(174 174 174 / 50%);">
            <div class="card-body">
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
                                    <label class="form-label" for="daterange-<?= $room['hotel_roomid'] ?>">Select Date Range:</label>
                                    <input type="text" class="form-control daterange-picker" id="daterange-<?= $room['hotel_roomid'] ?>" name="daterange[]" required
                                           data-room-id="<?= $room['hotel_roomid'] ?>"
                                           value="<?= isset($room['checkin'], $room['checkout']) ? date('d/m/Y', strtotime($room['checkin'])) . ' - ' . date('d/m/Y', strtotime($room['checkout'])) : '' ?>">
                                </div>
                            </div>

                            <div class="col-12 col-sm-4 mt-2">
                                <div class="input-group input-group-outline">
                                    <select class="form-control extra-guest-count" name="extra_guest_count[]" data-room-ids="<?= $room['hotel_roomid'] ?>">
                                        <option value="">Select Extra Guest Count</option>
                                        <option value="0" <?= (isset($room['extra_guest_count']) && $room['extra_guest_count'] === '0') ? 'selected' : '' ?>>0</option>
                                        <?php for ($i = 1; $i <= $room['extguests']; $i++): ?>
                                            <option value="<?= $i ?>" <?= (isset($room['extra_guest_count']) && $room['extra_guest_count'] == $i) ? 'selected' : '' ?>>
                                                <?= $i ?>
                                            </option>
                                        <?php endfor; ?>
                                    </select>
                                </div>
                            </div>
                        </div>



                        <?php foreach ($booking_details as $room): ?>
    <!-- Render guest details -->
    <div class="row mt-3 border py-2">
        <div class="d-flex">
            <div class="mb-2">
                <h6 class="font-weight-bolder mb-0">Guest details</h6>
            </div>
        </div>


        <div class="row">
            <?php if (!empty($room['guests'])): ?>
                <?php foreach ($room['guests'] as $guest): ?>
                    <div class="col-12 col-sm-3 mt-2">
                        <div class="input-group input-group-outline">
                            <label class="form-label">Name</label>
                            <input class="form-control" type="text" name="guest_name[<?= $room['hotel_roomid'] ?>][]" value="<?= $guest['guest_name'] ?>" placeholder="Guest Name"  />
                        </div>
                    </div>
                    <div class="col-12 col-sm-3 mt-2">
                        <div class="input-group input-group-outline ">
                            <label class="form-label">Age</label>
                            <input class="form-control" type="number" name="guest_age[<?= $room['hotel_roomid'] ?>][]" value="<?= $guest['age'] ?>" placeholder="Guest Age" />
                        </div>
                    </div>
                    <div class="col-12 col-sm-3 mt-2">
                        <div class="input-group input-group-outline ">
                            <label class="form-label">Phone Number</label>
                            <input class="form-control" type="text" name="guest_phone[<?= $room['hotel_roomid'] ?>][]" value="<?= $guest['phone'] ?>" placeholder="Phone Number" readonly/>
                        </div>
                    </div>
                    <div class="col-12 col-sm-3 mt-2">
                        <div class="input-group input-group-outline ">
                            <label class="form-label">ID Proof</label>
                            <input class="form-control" type="file"  name="guest_id_proof[<?= $room['hotel_roomid'] ?>][]" 
                            value="<?= $guest['id_proof'] ?>" placeholder="ID Proof" />
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
<?php endforeach; ?>


                        <!-- Extra Guests will be appended here -->
                        <div id="extra-guests-<?= $room['hotel_roomid'] ?>"></div>



                     


                     <!-- Item Details Section -->
                <div class="row mt-3 border py-2">
                    <div class="d-flex">
                        <div class="mb-2">
                            <h6 class="font-weight-bolder mb-0">Item Details</h6>
                        </div>
                        <div class="ms-auto my-auto mt-lg-0 mt-4">
                            <div class="ms-auto my-auto">
                                <button class="btn btn-primary btn-sm open-modal-btn" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal" data-room-id="<?= $room['hotel_roomid'] ?>">Add Items</button>
                            </div>
                        </div>
                    </div>
                    
                    <?php if (!empty($room['items'])): ?>
                        <div class="table-responsive">
                            <table class="table align-items-center mb-0 table-flush table-bordered rounded-3 table-stripe" id="table-room-<?= $room['hotel_roomid'] ?>">
                                <thead>
                                    <tr>
                                        <th>Item</th>
                                        <th>Current Price</th>
                                        <th>New Price</th>
                                        <th>Quantity</th>
                                        <th>Total Price</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($room['items'] as $item): ?>
                                        <tr>   
                                            <!-- Hidden input for item_id -->
                                        <input type="hidden" name="item_id[]" value="<?= $item['item_id']; ?>" />
                                            <td><?= $item['item_name'] ?></td>
                                            <td><?= $item['item_price'] ?></td>
                                            <td><?= $item['new_price'] ?></td>
                                            <td><?= $item['quantity'] ?></td>
                                            <td><?= $item['item_total_price'] ?></td>
                                            <td><button class="btn btn-danger btn-sm remove-item" type="button">Remove</button></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    <?php else: ?>
                        <p>No items found for this room.</p>
                    <?php endif; ?>
                </div>






                    </div>
                </div>
            </div>
        </div>



 <?php endforeach; ?>
                     
 
         <!-- Advance Payment Section (Rendered Only Once) -->
    <div class="mt-3">
        <div class="d-lg-flex">
            <div class="mb-2">
                <h5 class="font-weight-bolder mb-0">Advance Payment</h5>
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-sm-4 mt-2">
                <div class="input-group input-group-outline">
                    <label class="form-label">Advance Amount</label>
                    <input class="form-control" type="number" placeholder=" " name="advance_amount"
                           value="<?= isset($booking_details[0]['advance_amount']) ? $booking_details[0]['advance_amount'] : '' ?>" disabled />
                </div>
            </div>
            <div class="col-12 col-sm-4 mt-2">
                <div class="input-group input-group-outline">
                    <select class="form-control"  name="payment_method" disabled>
                        <option value="" disabled>Select Payment Method</option>
                        <option value="cash" <?= (isset($booking_details[0]['payment_method']) && $booking_details[0]['payment_method'] == 'cash') ? 'selected' : '' ?>>Cash</option>
                        <option value="card" <?= (isset($booking_details[0]['payment_method']) && $booking_details[0]['payment_method'] == 'card') ? 'selected' : '' ?>>Card</option>
                    </select>
                </div>
            </div>
        </div>
    </div>
        <?php else: ?>
    <p>No rooms selected.</p>
<?php endif; ?>
                 

                                    </div>
                                </div>


                                <div class="button-row d-flex mt-4"> 
                                        <button class="ms-auto mb-0 btn bg-gradient-info " type="submit" title="submit">settlement</button>
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
<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel2" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title font-weight-normal" id="exampleModalLabel">Add Customer </h5>
                <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="">
                <div class="modal-body">
                    <div class="mt-4 input-group input-group-outline ">
                        <label class="form-label">Customer Name</label>
                        <input class="form-control" type="text" />
                    </div>
                    <div class="mt-4 input-group input-group-outline ">
                        <label class="form-label">Age</label>
                        <input class="form-control" type="number" />
                    </div>
                    <div class="mt-4 input-group input-group-outline ">
                        <label class="form-label">Email</label>
                        <input class="form-control" type="email" />
                    </div>
                    <div class="mt-4 input-group input-group-outline ">
                        <label class="form-label">Mobile</label>
                        <input class="form-control" type="tel" />
                    </div>
                    <div class="mt-4 input-group input-group-outline ">

                        <textarea class="form-control" rows="3" placeholder="Address" spellcheck="false"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn bg-gradient-primary">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Modal -->




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
document.addEventListener('DOMContentLoaded', function() {
    const datepickers = document.querySelectorAll('.daterange-picker');
    
    datepickers.forEach(picker => {
        const roomId = picker.getAttribute('data-room-id');
        fetchBookedDates(roomId, picker);
    });

    function fetchBookedDates(roomId, picker) {
        fetch('<?= site_url("get_booked_dates") ?>', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-Requested-With': 'XMLHttpRequest'
            },
            body: JSON.stringify({ room_id: roomId })
        })
        .then(response => response.json())
        .then(data => {
            initializeFlatpickr(picker, data);
        })
        .catch(error => console.error('Error:', error));
    }

    function initializeFlatpickr(picker, bookedDates) {
        flatpickr(picker, {
            mode: "range",
            dateFormat: "Y-m-d",
            minDate: "today",
            disable: [
                function(date) {
                    // Disable dates in the past
                    if (date < new Date().setHours(0,0,0,0)) return true;

                    // Disable booked dates
                    return bookedDates.some(range => {
                        const from = new Date(range.checkin);
                        const to = new Date(range.checkout);
                        return date >= from && date <= to;
                    });
                }
            ],
            onClose: function(selectedDates, dateStr, instance) {
                console.log("Selected range: ", dateStr);
            }
        });
    }
});

</script>

<script>
   document.querySelectorAll('.extra-guest-count').forEach(function(select) {
    select.addEventListener('change', function() {
        const roomId = this.getAttribute('data-room-ids');  // Fixed the attribute name
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
    document.getElementById('occupyform').addEventListener('submit', function() {
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

    // Prevent form submission when "Add Items" button is clicked
    document.querySelector('.open-modal-btn').addEventListener('click', function(event) {
        event.preventDefault(); // Prevent the form from submitting when Add Items is clicked
    });

    // Form submission validation
    document.getElementById('occupyform').addEventListener('submit', function(event) {
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
                    <div class="table-responsive">
                        <table class="table align-items-center mb-0 table-flush table-bordered rounded-3 table-stripe">
                            <thead class="bg-light">
                                <tr>
                                    <th class="text-uppercase text-dark text-xxs font-weight-bolder w-30">Item</th>
                                    <th class="text-uppercase text-dark text-xxs font-weight-bolder ps-2">Current Price</th>
                                    <th class="text-uppercase text-dark text-xxs font-weight-bolder ps-2">New Price</th>
                                    <th class="text-uppercase text-dark text-xxs font-weight-bolder ps-2">Quantity</th>
                                    <th class="text-uppercase text-dark text-xxs font-weight-bolder ps-2">Total Price</th>
                                </tr>
                            </thead>

                             <tbody>
                                    <?php foreach ($itemss as $category => $categoryItems): ?>
                                        <?php foreach ($categoryItems as $item): ?>
                                            <tr class="item-row" data-item-name="<?= htmlspecialchars($item['item_name']); ?>"
                                               
                                                data-category="<?= htmlspecialchars($category); ?>"
                                                data-subcategory="<?= htmlspecialchars($item['subcategory_name']); ?>"
                                                data-price="<?= $item['price1']; ?>">
                                                <td class="w-30">
                                                    <div class="d-flex px-2 py-1 w-30">
                                                        <div>
                                                            <img src="https://demos.creative-tim.com/test/material-dashboard-pro/assets/img/team-2.jpg" class="avatar avatar-md me-3 my-auto" alt="Item Image">
                                                        </div>
                                                        <div class="d-flex flex-column justify-content-center w-30">
                                                            <h6 class="mb-0 text-md w-30"><?= htmlspecialchars($item['item_name']); ?></h6>
                                                            <p class="text-sm text-secondary mb-0 w-30"><?= htmlspecialchars($category); ?></p>
                                                            <p class="text-sm text-secondary mb-0 w-30"><?= htmlspecialchars($item['subcategory_name']); ?></p>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <p class="text-md font-weight-bold mb-0">₹ <?= number_format($item['price1'], 2); ?>/-</p>
                                                </td>
                                                <td>
                                                    <div class="input-group input-group-outline">
                                                        <input class="form-control new-price" type="number" name="new_price_<?= $item['item_id']; ?>" placeholder="Enter new price" />
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="input-group input-group-outline">
                                                        <input class="form-control quantity" type="number" name="quantity_<?= $item['item_id']; ?>" value="1" min="1" placeholder="Quantity" />
                                                    </div>
                                                </td>
                                                <td class="align-middle text-center total-price">
                                                    <p class="text-lg font-weight-bold mb-0">₹ 0.00</p>
                                                </td>

                                                  <!-- Add hidden input for item_id -->
                <input type="hidden" name="item_id[]" value="<?= $item['item_id']; ?>" />

                                            </tr>
                                        <?php endforeach; ?>
                                    <?php endforeach; ?>
                                </tbody>

                        </table>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>
                <!-- <button id="addItemsButton" type="button" data-room-id="<?= $room['hotel_roomid'] ?>">Add Selected Items</button> -->
         <!-- Updated "Add Selected Items" Button -->
            <button id="addItemsButton" class="btn btn-primary btn-sm" type="button" data-room-id="<?= $room['hotel_roomid'] ?>">Add Selected Items</button>
            </div>
        </div>
    </div>
</div>







 <script>
let selectedRoomId;
let roomItemsData = {}; // Store items for multiple rooms

$(document).ready(function () {
    // When an "Add Items" button is clicked for a room
    $('.open-modal-btn').on('click', function () {
        selectedRoomId = $(this).data('room-id'); // Set the selected room ID dynamically
    });

    // Handle row selection
    $('.item-row').on('click', function () {
        $(this).toggleClass('selected-row'); // Toggle the selected state
        const isSelected = $(this).hasClass('selected-row');
        $(this).css('background-color', isSelected ? '#d3f4ff' : ''); // Highlight the row when selected
    });

    function calculateTotal($row) {
        const currentPrice = parseFloat($row.data('price')) || 0; // Get the current price from the data attribute
        let newPrice = parseFloat($row.find('.new-price').val().trim()); // Get the new price
        if (isNaN(newPrice) || newPrice <= 0) {
            newPrice = currentPrice; // Use current price for calculation
        }
        const quantity = parseInt($row.find('.quantity').val()) || 1; // Get the quantity or default to 1
        const totalPrice = newPrice * quantity; // Calculate the total price
        $row.find('.total-price').text(`₹ ${totalPrice.toFixed(2)}`);
    }

    // Event listener for changes in new price and quantity inputs in the modal
    $(document).on('input', '.new-price, .quantity', function () {
        const $row = $(this).closest('tr'); // Get the closest item row
        calculateTotal($row); // Recalculate total price when new price or quantity changes
    });

    // When the "Add Selected Items" button in the modal is clicked
    $('#addItemsButton').on('click', function (event) {
        event.preventDefault();
        let selectedItems = [];
        $('.item-row.selected-row').each(function () {
            const itemName = $(this).data('item-name');
            const itemId = $(this).find('input[name="item_id[]"]').val(); // Get item_id from hidden input
            const itemPrice = parseFloat($(this).data('price')) || 0;
            let newPrice = parseFloat($(this).find('.new-price').val().trim());
            if (isNaN(newPrice) || newPrice <= 0) {
                newPrice = itemPrice;
            }
            const quantity = parseInt($(this).find('.quantity').val().trim()) || 1;
            const totalPrice = newPrice * quantity;
            selectedItems.push({ 
                id: itemId, // Include item_id in the selected items
                name: itemName,
                currentPrice: itemPrice,
                newPrice: newPrice,
                quantity: quantity,
                totalPrice: totalPrice.toFixed(2)
            });
        });

        roomItemsData[selectedRoomId] = selectedItems; // Store items for the selected room
        console.log('Room Items Data:', roomItemsData); // Debugging
        selectedItems.forEach(item => {
        const rowHtml = `
    <tr data-price="${item.currentPrice}" data-room-id="${selectedRoomId}">
        <td>${item.name}</td>
        <td>₹ ${item.currentPrice.toFixed(2)}</td>  
        <td class="new-price">₹ ${item.newPrice.toFixed(2)}</td>
        <td class="quantity">${item.quantity}</td>
        <td class="total-price">₹ ${item.totalPrice}</td>
        <td><button class="btn btn-danger btn-sm remove-item">Remove</button></td>
        <input type="hidden" name="item_id[]" value="${item.id}" /> 
    </tr>
`;

            $(`#table-room-${selectedRoomId} tbody`).append(rowHtml);
        });

        // Clear the modal inputs
        $('.item-row').removeClass('selected-row').css('background-color', '');
        $('.new-price').val('');
        $('.quantity').val(1);

        $('#exampleModal').modal('hide');
    });

$(document).on('click', '.remove-item', function () {
    const $row = $(this).closest('tr'); // Get the entire row
    const bookingId = $('input[name="booking_id"]').val(); // Assuming booking_id is somewhere in your HTML
    const itemId = $row.find('input[name="item_id[]"]').val(); // Access the hidden input for item_id
    // Log values for debugging
    console.log('Booking ID:', bookingId);
    console.log('Item ID:', itemId);
    // Ensure both IDs are available
    if (!itemId || !bookingId) {
        console.error('Missing required data for item removal');
        alert('Unable to remove item due to missing data. Please try again.');
        return;
    }
    // AJAX call to remove the item
    $.ajax({
        url: '<?= base_url('Superadmin/update_item_status1') ?>',
        type: 'POST',
        data: {
            booking_id: bookingId,
            item_id: itemId,
            status: 0 // Assuming 0 means removed
        },
        dataType: 'json',
        success: function (response) {
            if (response.success) {
                console.log('Item status updated successfully:', response);
                $row.remove(); // Remove the row from the table
            } else {
                console.error('Failed to update item status:', response.message);
                alert('Failed to remove item: ' + response.message);
            }
        },
        error: function (xhr, status, error) {
            console.error('Error updating item status:', error);
            let errorMessage = 'An error occurred while removing the item.';
            try {
                const response = JSON.parse(xhr.responseText);
                if (response && response.message) {
                    errorMessage = response.message;
                }
            } catch (e) {
                console.error('Error parsing error response:', e);
            }
            alert(errorMessage);
        }
    });
});


    // Handle form submission
    $('#occupyform').on('submit', function (event) {
        event.preventDefault();
        const formData = new FormData(this);
        formData.append('items_data', JSON.stringify(roomItemsData));
        const bookingId = $('input[name="booking_id"]').val(); // Get the booking_id
        const guestCode = $('input[name="guest_code"]').val(); // Get the guest_code from the form (add this field if not present)
        formData.append('booking_id', bookingId); // Append it to formData
        formData.append('guest_code', guestCode); // Append guest_code to formData
        $.ajax({
            url: '<?= base_url('Superadmin/update_room_occupy_submit') ?>',
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function (response) {
                console.log('Form submitted successfully:', response);
                window.location.href = '<?= base_url('Superadmin/settlement') ?>';
            },
            error: function (xhr, status, error) {
                console.error('Error submitting form:', xhr.responseText);
            }
        });
    });
});
</script> 



