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
                                        <!-- <div class="ms-auto my-auto mt-lg-0 mt-4">
                                            <div class="ms-auto my-auto">
                                                <button class="btn bg-gradient-info btn-sm mb-0" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal2">+&nbsp;Add Customer</button>
                                            </div>
                                        </div> -->
                                    </div>

                                <div class=" ">

                                    <div class="">
                                        <div class="row">
                                            <?php if (!empty($booking_details)): ?>
                                                    <?php foreach ($booking_details as $detail): ?>
                                                        <!-- Display Agent -->
                                                        <div class="col-12 col-sm-4 mt-2">
                                                            <div class="input-group input-group-static">
                                                                <label class="form-label text-primary">Agent</label>
                                                                <a href="#" class="ms-auto btn btn-sm mb-0 btn-outline-info" style="border-radius: .375rem" data-bs-toggle="modal" data-bs-target="#agentmodel"> + Add Agent</a>
                                                                <select class="form-control" id="choices-Agency" name="agent_id">
                                                                    <option value="">Select Agent</option>
                                                                    <?php foreach ($agencies as $agent): ?>
                                                                        <option value="<?= $agent['agent_id'] ?>" <?= ($detail['agent_id'] == $agent['agent_id']) ? 'selected' : '' ?>>
                                                                            <?= $agent['agent_name'] ?>
                                                                        </option>
                                                                    <?php endforeach; ?>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <!-- Display Customer -->
                                                        <div class="col-12 col-sm-4 mt-2">
                                                            <div class="input-group input-group-static">
                                                                <label class="form-label text-primary">Customer</label>
                                                                <a href="#" class="ms-auto btn btn-sm mb-0 btn-outline-info" style="border-radius: .375rem" data-bs-toggle="modal" data-bs-target="#customermodel"> + Add Customer</a>
                                                                <select class="form-control" id="choices-Customer" name="customer_id">
                                                                    <option value="">Select Customer</option>
                                                                    <?php foreach ($customers as $customer): ?>
                                                                        <option value="<?= $customer['customer_id'] ?>" <?= ($detail['customer_id'] == $customer['customer_id']) ? 'selected' : '' ?>>
                                                                            <?= $customer['customer_name'] ?>
                                                                        </option>
                                                                    <?php endforeach; ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    <?php endforeach; ?>
                                                <?php else: ?>
                                                    <p>No booking details found.</p>
                                                <?php endif; ?>

                                        </div>
                                    </div>



                                  

                                    <?php if (!empty($booking_details)): ?>
                                            <?php foreach ($booking_details as $room): ?>
                                                <input type="hidden" name="room_id[]" value="<?= $room['hotel_roomid'] ?>">
                                                <input type="hidden" name="roomno[]" value="<?= $room['roomno'] ?>">
                                                <input type="hidden" name="room_name[]" value="<?= $room['room_name'] ?>">
                                                <input type="hidden" name="noofguests[]" value="<?= $room['noofguests'] ?>">
                                                <!-- <div class="card mt-3" style="box-shadow: 0 4px 6px 1px rgb(111 111 111 / 50%), 0 2px 4px 1px rgb(174 174 174 / 50%);"> -->
                                                <!-- <div class="card mt-3 room-card" id="room-card-<?= $room['hotel_roomid'] ?>" style="box-shadow: 0 4px 6px 1px rgb(111 111 111 / 50%), 0 2px 4px 1px rgb(174 174 174 / 50%);">  -->
                                                <div class="card mt-3" id="room-card-<?= $room['hotel_roomid'] ?>" style="box-shadow: 0 4px 6px 1px rgb(111 111 111 / 50%), 0 2px 4px 1px rgb(174 174 174 / 50%);">
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
                                                                        <!-- <div class="input-group input-group-outline">
                                                                            <label class="form-label" for="daterange">Select Date Range:</label>
                                                                            <input type="text" class="form-control" id="daterange" name="daterange[]" required>
                                                                        </div> -->
                                                                        <!-- <div class="input-group input-group-outline">
                                                                            <label class="form-label" for="daterange-<?= $room['hotel_roomid'] ?>">Select Date Range:</label>
                                                                            <input type="text" class="form-control daterange-picker" id="daterange-<?= $room['hotel_roomid'] ?>" name="daterange[]" required data-room-id="<?= $room['hotel_roomid'] ?>">
                                                                        </div> -->
                                                                        <?php foreach ($booking_details as $room): ?>
                                                                            <div class="input-group input-group-outline">
                                                                                <label class="form-label" for="daterange-<?= $room['hotel_roomid'] ?>">Select Date Range:</label>
                                                                                <input type="text" class="form-control daterange-picker"
                                                                                    id="daterange-<?= $room['hotel_roomid'] ?>"
                                                                                    name="daterange[]"
                                                                                    required
                                                                                    data-room-id="<?= $room['hotel_roomid'] ?>"
                                                                                    value="<?= isset($room['checkin'], $room['checkout']) ? date('d/m/Y', strtotime($room['checkin'])) . ' - ' . date('d/m/Y', strtotime($room['checkout'])) : '' ?>">
                                                                            </div>
                                                                        <?php endforeach; ?>
                                                                    </div>

                                                                    <?php foreach ($booking_details as $room): ?>
                                                                        <div class="col-12 col-sm-4 mt-2">
                                                                            <div class="input-group input-group-outline">
                                                                                <select class="form-control extra-guest-count" name="extra_guest_count[]" data-rooms-ids="<?= $room['hotel_roomid'] ?>">
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
                                                                    <?php endforeach; ?>

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
                                                                                    <input class="form-control" type="text" name="guest_phone[<?= $room['hotel_roomid'] ?>][]" placeholder="Phone Number" />
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-12 col-sm-3 mt-2">
                                                                                <div class="input-group input-group-outline is-focused">
                                                                                    <label class="form-label">Id Proof</label>
                                                                             
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
                                                                                <!-- <button class="btn btn-primary btn-sm remove-room" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">Add Items</button>  -->
                                                                                <!-- <button class="btn btn-primary btn-sm open-modal-btn" data-bs-toggle="modal" data-bs-target="#exampleModal" data-room-id="<?= $room['hotel_roomid'] ?>">Add Items</button> -->
                                                                                     <button class="btn btn-primary btn-sm open-modal-btn" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal" data-room-id="<?= $room['hotel_roomid'] ?>">Add Items</button>

                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                            <div class="row">
                                                                                <div class="">
                                                                                    <!-- Main Table -->
                                                                        <!-- Room Section with Add Items Button -->
                                                                        <div class="room-section" data-room-id="<?= $room['hotel_roomid'] ?>">
                                                                            <h5>Room ID: <?= $room['hotel_roomid'] ?></h5>
                                                                            <!-- <button class="open-modal-btn" data-bs-toggle="modal" data-bs-target="#exampleModal" data-room-id="<?= $room['hotel_roomid'] ?>">Add Items for Room <?= $room['hotel_roomid'] ?></button> -->
                                                                        <!-- Updated "Add Items for Room" Button -->
                                                                            <div class="table-responsive">
                                                                                <table class="table align-items-center mb-0 table-flush table-bordered rounded-3 table-stripe" id="table-room-<?= $room['hotel_roomid'] ?>">
                                                                                    <thead>
                                                                                        <tr>
                                                                                            <th>Item</th>
                                                                                            <th>Current Price</th>
                                                                                            <th>New Price</th>
                                                                                            <th>Quantity</th>
                                                                                            <th>Total Price</th>
                                                                                            <th>Actions</th>
                                                                                        </tr>
                                                                                    </thead>
                                                                                    <tbody>
                                                                                        <!-- Items will be added here for this specific room -->
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
                                                        <input class="form-control" type="number" placeholder=" " />
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
                                    <a href=" " class="  mb-0">
                                        <button class="  mb-0 btn bg-gradient-danger " type="button" title="submit">CANCEL BOOKING</button></a>
                                    <a href=" " class="ms-auto mb-0">
                                        <button class="ms-auto mb-0 btn bg-gradient-success " type="button" title="submit">Submit FOR Occupied</button></a>
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