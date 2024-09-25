<style>
    .scrollbar {
        /* margin-left: 30px; */
        /* float: left; */
        /* height: 300px;
        width: 65px; */
        /* background: #F5F5F5; */
        overflow-y: scroll;
        /* margin-bottom: 25px; */
    }

    .force-overflow {
        min-height: 215px;
    }

    #style-2::-webkit-scrollbar-track {
        -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
        border-radius: 10px;
        background-color: #F5F5F5;
    }

    #style-2::-webkit-scrollbar {
        width: 12px;
        background-color: #F5F5F5;
    }

    #style-2::-webkit-scrollbar-thumb {
        border-radius: 10px;
        -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, .3);
        background-color: #5a5c69b3;
    }

    .btn-group1 {
        display: flex;
        gap: 10px;
    }

    .btn-check1 {
        display: none;
    }

    .btn1 {
        padding: 10px 20px;
        border: 1px solid #000;
        border-radius: 5px;
        background-color: transparent;
        color: #007bff;
        cursor: pointer;
        transition: background-color 0.3s, color 0.3s;
    }

    .btn1:hover {
        background-color: #5a5c69b3;
        color: white;
    }

    .btn-check1:checked+.btn {
        background-color: #007bff;
        color: white;
    }

    .badge-dot.badge-md i {
        width: 1rem;
        height: 1rem;
    }
</style>
<div class="container-fluid py-1 text-uppercase mb-6">


    <div class="row mt-2 ">

        <div class="col-lg-3 col-md-4 col-sm-6 mb-xl-0 mb-4">
            <div class="card mb-4">
                <div class="card-header p-3 pt-2">
                    <div class="icon icon-lg icon-shape bg-dark shadow text-center border-radius-md mt-n4 position-absolute">
                        <i class="material-symbols-outlined opacity-10">request_quote</i>
                    </div>
                    <div class="text-end pt-1">
                        <h5 class="mb-0">
                            70
                        </h5>
                    </div>
                </div>
                <hr class="dark horizontal my-0">
                <div class="card-footer d-flex align-items-center px-3 py-1">
                    <p class="text-md font-weight-bolder mb-0 text-capitalize">
                        <span class="text-xs mt-n5 mb-0 text-capitalize">Total <br></span>
                        Rooms
                    </p>
                    <div class="ms-auto">
                        <a href=" " class="text-primary text-xs icon-move-right ">See more
                            <i class="fas fa-arrow-right text-xs ms-1" aria-hidden="true"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-6 mb-xl-0 mb-4">
            <div class="card mb-4">
                <div class="card-header p-3 pt-2">
                    <div class="icon icon-lg icon-shape bg-dark shadow text-center border-radius-md mt-n4 position-absolute">
                        <i class="material-symbols-outlined opacity-10">paid</i>
                    </div>
                    <div class="text-end pt-1">
                        <h5 class="mb-0">
                            235
                        </h5>
                    </div>
                </div>
                <hr class="dark horizontal my-0">
                <div class="card-footer d-flex align-items-center px-3 py-1">
                    <p class="text-md font-weight-bolder mb-0 text-capitalize">
                        <span class="text-xs mt-n5 mb-0 text-capitalize">Total <br></span>
                        Availiable Rooms
                    </p>
                    <div class="ms-auto">
                        <a href=" " class="text-primary text-xs icon-move-right ">See more
                            <i class="fas fa-arrow-right text-xs ms-1" aria-hidden="true"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-6 mb-xl-0 mb-4">
            <div class="card mb-4">
                <div class="card-header p-3 pt-2">
                    <div class="icon icon-lg icon-shape bg-dark shadow text-center border-radius-md mt-n4 position-absolute">
                        <i class="material-symbols-outlined opacity-10">dangerous</i>
                    </div>
                    <div class="text-end pt-1">
                        <h5 class="mb-0">
                            235
                        </h5>
                    </div>
                </div>
                <hr class="dark horizontal my-0">
                <div class="card-footer d-flex align-items-center px-3 py-1">
                    <p class="text-md font-weight-bolder mb-0 text-capitalize">
                        <span class="text-xs mt-n5 mb-0 text-capitalize">Total <br></span>
                        Booked Rooms
                    </p>
                    <div class="ms-auto">
                        <a href=" " class="text-primary text-xs icon-move-right ">See more
                            <i class="fas fa-arrow-right text-xs ms-1" aria-hidden="true"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-6 mb-xl-0 mb-4">
            <div class="card mb-4">
                <div class="card-header p-3 pt-2">
                    <div class="icon icon-lg icon-shape bg-dark shadow text-center border-radius-md mt-n4 position-absolute">
                        <i class="material-symbols-outlined opacity-10">dangerous</i>
                    </div>
                    <div class="text-end pt-1">
                        <h5 class="mb-0">
                            235
                        </h5>
                    </div>
                </div>
                <hr class="dark horizontal my-0">
                <div class="card-footer d-flex align-items-center px-3 py-1">
                    <p class="text-md font-weight-bolder mb-0 text-capitalize">
                        <span class="text-xs mt-n5 mb-0 text-capitalize">Total <br></span>
                        Reservations
                    </p>
                    <div class="ms-auto">
                        <a href=" " class="text-primary text-xs icon-move-right ">See more
                            <i class="fas fa-arrow-right text-xs ms-1" aria-hidden="true"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="row ">
        <div class="col-xl-8">
            <div class="card card-calendar">
                <div class="card-header pb-0 p-3">
                    <div class="d-flex justify-content-between">
                        <h6 class="mb-0">Calendar</h6>
                    </div>
                </div>
                <div class="card-body pt-0 p-3">
                    <div class="row ">
                        <div class=" col-lg-3">
                            <div class="input-group input-group-outline  my-3 ">
                                <input type="date" id="date-search" class="form-control " placeholder="Search for a date">
                            </div>
                        </div>
                        <div class=" col-lg-3">
                            <div class="input-group input-group-outline  my-3 ">
                                <select class="form-control" id="exampleFormControlSelect1">
                                    <option selected disabled>Room Type</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="calendar" data-bs-toggle="calendar" id="calendar"></div>
                </div>
            </div>
        </div>
        <div class="col-xl-4">
            <div class="card  ">

                <div class="card-body p-3 ">

                    <div>
                        <div class="">
                            <h6 class="mb-0">Today Room Status</h6>
                        </div>
                        <div class="scrollbar" id="style-2" style="height: 315px; overflow-y: scroll;">
                            <ul class="list-group force-overflow">
                                <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                                    <div class="d-flex align-items-center">
                                        <div class="icon icon-shape icon-sm me-3 bg-gradient-dark shadow text-center text-light">
                                            <h6 class="mt-1 text-light">1</h6>
                                        </div>
                                        <div class="d-flex flex-column">
                                            <h6 class="mb-1 text-dark text-sm">Single Room</h6>

                                            <span class="text-xs">Booked <span class="font-weight-bold">3</span></span>
                                            <span class="text-xs">vacant <span class="font-weight-bold">3</span></span>

                                        </div>
                                    </div>
                                    <div class="d-flex">
                                        <button class="btn btn-link btn-icon-only btn-rounded btn-sm text-dark icon-move-right my-auto"><i
                                                class="ni ni-bold-right" aria-hidden="true"></i></button>
                                    </div>
                                </li>
                                <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                                    <div class="d-flex align-items-center">
                                        <div class="icon icon-shape icon-sm me-3 bg-gradient-dark shadow text-center text-light">
                                            <h6 class="mt-1 text-light">2</h6>
                                        </div>
                                        <div class="d-flex flex-column">
                                            <h6 class="mb-1 text-dark text-sm">Double Room</h6>
                                            <span class="text-xs">Booked <span class="font-weight-bold">3</span></span>
                                            <span class="text-xs">vacant <span class="font-weight-bold">3</span></span>
                                        </div>
                                    </div>
                                    <div class="d-flex">
                                        <button class="btn btn-link btn-icon-only btn-rounded btn-sm text-dark icon-move-right my-auto"><i
                                                class="ni ni-bold-right" aria-hidden="true"></i></button>
                                    </div>
                                </li>
                                <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                                    <div class="d-flex align-items-center">
                                        <div class="icon icon-shape icon-sm me-3 bg-gradient-dark shadow text-center text-light">
                                            <h6 class="mt-1 text-light">3</h6>
                                        </div>
                                        <div class="d-flex flex-column">
                                            <h6 class="mb-1 text-dark text-sm">Triple Room</h6>
                                            <span class="text-xs">Booked <span class="font-weight-bold">3</span></span>
                                            <span class="text-xs">vacant <span class="font-weight-bold">3</span></span>
                                        </div>
                                    </div>
                                    <div class="d-flex">
                                        <button class="btn btn-link btn-icon-only btn-rounded btn-sm text-dark icon-move-right my-auto"><i
                                                class="ni ni-bold-right" aria-hidden="true"></i></button>
                                    </div>
                                </li>
                                <li class="list-group-item border-0 d-flex justify-content-between ps-0 border-radius-lg">
                                    <div class="d-flex align-items-center">
                                        <div class="icon icon-shape icon-sm me-3 bg-gradient-dark shadow text-center text-light">
                                            <h6 class="mt-1 text-light">4</h6>
                                        </div>
                                        <div class="d-flex flex-column">
                                            <h6 class="mb-1 text-dark text-sm">Quad Room</h6>
                                            <span class="text-xs">Booked <span class="font-weight-bold">3</span></span>
                                            <span class="text-xs">vacant <span class="font-weight-bold">3</span></span>
                                        </div>
                                    </div>
                                    <div class="d-flex">
                                        <button class="btn btn-link btn-icon-only btn-rounded btn-sm text-dark icon-move-right my-auto"><i
                                         class="ni ni-bold-right" aria-hidden="true"></i></button>
                                    </div>
                                </li>
                                <li class="list-group-item border-0 d-flex justify-content-between ps-0 border-radius-lg">
                                    <div class="d-flex align-items-center">
                                        <div class="icon icon-shape icon-sm me-3 bg-gradient-dark shadow text-center text-light">
                                            <h6 class="mt-1 text-light">4</h6>
                                        </div>
                                        <div class="d-flex flex-column">
                                            <h6 class="mb-1 text-dark text-sm">Quad Room</h6>
                                            <span class="text-xs">Booked <span class="font-weight-bold">3</span></span>
                                            <span class="text-xs">vacant <span class="font-weight-bold">3</span></span>
                                        </div>
                                    </div>
                                    <div class="d-flex">
                                        <button class="btn btn-link btn-icon-only btn-rounded btn-sm text-dark icon-move-right my-auto"><i
                                                class="ni ni-bold-right" aria-hidden="true"></i></button>
                                    </div>
                                </li>
                            </ul>
                        </div>

                    </div>

                    <div class=" ">
                        <div class="mt-3">
                            <h6 class="mb-0">Filter Rooms</h6>
                        </div>
                        <div class=" ">
                            <div class="input-group input-group-outline  my-3">
                                <input type="date" id="filterDate" class="form-control  ">
                            </div>
                        </div>
                        <div class=" ">
                            <div class="input-group input-group-outline  my-3">
                                <select id="filterType" class="form-control  ">
                                    <option value="">Filter by Type</option>
                                    <option value="type1">Type 1</option>
                                    <option value="type2">Type 2</option>
                                    <option value="type3">Type 3</option>
                                    <!-- Add more options as needed -->
                                </select>
                            </div>
                        </div>
                        <div class=" ">
                            <div class="input-group input-group-outline  my-3">
                                <select id="filterRoom" class="form-control  ">
                                    <option value="">Filter by Room</option>
                                    <option value="room1">Room 1</option>
                                    <option value="room2">Room 2</option>
                                    <option value="room3">Room 3</option>
                                    <!-- Add more options as needed -->
                                </select>
                            </div>
                        </div>
                        <div class=" ">
                            <button id="searchButton" class="btn btn-primary w-100  mb-0">Search</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

   

<div class="row mt-4">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header pb-0">
                <div class="d-flex">
                    <div>
                        <h5 class="mb-0">Rooms</h5>
                    </div>
                    <div class="ms-auto my-auto">
                        <!-- Use form for redirection -->
                        <form id="room-form" method="POST" action="room_enquiry">
                            <input type="hidden" name="selected_rooms" id="selected_rooms" value="">
                            <button id="proceed-btn" class="btn btn-secondary mb-0" type="submit" disabled>Proceed</button>
                        </form>
                    </div>
                </div>
                <div class="d-flex align-items-center">
                    <span class="badge badge-md badge-dot me-4">
                        <i class="bg-success"></i>
                        <span class="text-dark text-xs">Vaccant</span>
                    </span>
                    <span class="badge badge-md badge-dot me-4">
                        <i class="bg-warning"></i>
                        <span class="text-dark text-xs">Booked</span>
                    </span>
                    <span class="badge badge-md badge-dot me-4">
                        <i class="bg-danger"></i>
                        <span class="text-dark text-xs">Occupied</span>
                    </span>
                </div>
            </div>

            <?php foreach ($room_data as $room_type => $rooms): ?>
                <div class="card">
                    <div class="card-header py-0">
                        <div class="d-flex">
                            <div class="col-md-8 me-auto my-auto text-left">
                                <h5><?php echo $room_type; ?> Room</h5>
                            </div>
                        </div>
                    </div>
                    <div class="card-body row py-0">
                        <div class="">
                            <div class="btn-group1" role="group" aria-label="Basic checkbox toggle group">
                                <?php foreach ($rooms as $room): ?>
                                    <?php
                                    $status_class = ($room['status'] === 'vaccant') ? 'btn-success' : (($room['status'] === 'booked') ? 'btn-warning' : 'btn-danger');
                                    ?>
                                    <input type="checkbox" class="btn-check1 room-checkbox" id="btncheck<?php echo $room['hotel_roomid']; ?>" data-status="<?php echo $room['status']; ?>" autocomplete="off">
                                    <label class="btn <?php echo $status_class; ?>" for="btncheck<?php echo $room['hotel_roomid']; ?>">
                                        <?php echo $room['roomno']; ?>
                                    </label>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>




</div>
<script src="assets2/js/plugins/fullcalendar.js"></script>
<script>
    var currentDate = new Date(); // Get the current date
    var calendar = new FullCalendar.Calendar(document.getElementById("calendar"), {
        contentHeight: 'auto',
        initialView: "dayGridMonth",
        headerToolbar: {
            start: 'title', // will normally be on the left. if RTL, will be on the right
            center: '',
            end: 'today prev,next' // will normally be on the right. if RTL, will be on the left
        },
        selectable: true,
        editable: false,
        initialDate: currentDate,
        events: [
            {
                title: 'Occupied 10',
                start: '2024-09-17',
                end: '2024-09-18',
                className: 'bg-gradient-danger'
            },

            {
                title: 'Booked 20',
                start: '2024-09-17',
                end: '2024-09-18',
                className: 'bg-gradient-warning'
            },

            {
                title: 'Veccant 20',
                start: '2024-09-17',
                end: '2024-09-18',
                className: 'bg-gradient-success'
            },
            
            {
                title: 'Occupied 10',
                start: '2024-09-20',
                end: '2024-09-21',
                className: 'bg-gradient-danger'
            },
            {
                title: 'Booked 20',
                start: '2024-09-20',
                end: '2024-09-21',
                className: 'bg-gradient-warning'
            },

            {
                title: 'Veccant 20',
                start: '2024-09-20',
                end: '2024-09-21',
                className: 'bg-gradient-success'
            }, 



        ],
        views: {
            month: {
                titleFormat: {
                    month: "long",
                    year: "numeric"
                }
            },
            agendaWeek: {
                titleFormat: {
                    month: "long",
                    year: "numeric",
                    day: "numeric"
                }
            },
            agendaDay: {
                titleFormat: {
                    month: "short",
                    year: "numeric",
                    day: "numeric"
                }
            }
        },

        dateClick: function(info) {
            alert('Selected date: ' + info.dateStr);
        }
    });


    calendar.render();
    // Add event listener to trigger date search when date is selected
    document.getElementById('date-search').addEventListener('change', function() {
        var dateInput = this.value;
        if (dateInput) {
            calendar.gotoDate(dateInput); // Navigate to the selected date
        }
    });
</script>


<!-- JavaScript for room selection and button behavior -->
<script>
   document.addEventListener('DOMContentLoaded', function() {
    const checkboxes = document.querySelectorAll('.room-checkbox');
    const proceedBtn = document.getElementById('proceed-btn');
    const selectedRoomsInput = document.getElementById('selected_rooms');
    
    checkboxes.forEach(checkbox => {
        checkbox.addEventListener('change', function() {
            let selectedRooms = [];
            let selectedStatuses = new Set(); // To keep track of room statuses
            let anyChecked = false;
            let status = null;
            
            checkboxes.forEach(cb => {
                if (cb.checked) {
                    anyChecked = true;
                    selectedRooms.push(cb.id.replace('btncheck', '')); // Get room IDs
                    status = cb.getAttribute('data-status'); // Track last room's status
                    selectedStatuses.add(status); // Track room status
                }
            });

            if (selectedStatuses.size > 1) {
                // Multiple statuses selected: disable proceed button, show warning
                proceedBtn.classList.remove('btn-primary');
                proceedBtn.classList.add('btn-secondary');
                proceedBtn.disabled = true;
                proceedBtn.textContent = 'Select rooms with same status';
            } else if (anyChecked) {
                // If all rooms have the same status, enable the proceed button and update text
                proceedBtn.classList.remove('btn-secondary');
                proceedBtn.classList.add('btn-primary');
                proceedBtn.disabled = false;

                // Set button text based on the room status
                if (status === 'vaccant') {
                    proceedBtn.textContent = 'Proceed to Enquiry';
                } else if (status === 'booked') {
                    proceedBtn.textContent = 'Proceed to Occupy';
                } else if (status === 'occupied') {
                    proceedBtn.textContent = 'Continue to Occupy';
                }
            } else {
                // No rooms selected, disable button
                proceedBtn.classList.remove('btn-primary');
                proceedBtn.classList.add('btn-secondary');
                proceedBtn.disabled = true;
                proceedBtn.textContent = 'Proceed';
            }

            // Store selected room IDs in the hidden input field
            selectedRoomsInput.value = selectedRooms.join(',');
        });
    });
});

</script>