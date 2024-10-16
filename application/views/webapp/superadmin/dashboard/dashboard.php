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
                            100
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
                            50
                        </h5>
                    </div>
                </div>
                <hr class="dark horizontal my-0">
                <div class="card-footer d-flex align-items-center px-3 py-1">
                    <p class="text-md font-weight-bolder mb-0 text-capitalize">
                        <span class="text-xs mt-n5 mb-0 text-capitalize">Total <br></span>
                        Vacant Rooms
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
                            20
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
                            30
                        </h5>
                    </div>
                </div>
                <hr class="dark horizontal my-0">
                <div class="card-footer d-flex align-items-center px-3 py-1">
                    <p class="text-md font-weight-bolder mb-0 text-capitalize">
                        <span class="text-xs mt-n5 mb-0 text-capitalize">Total <br></span>
                        Occupied Rooms
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
                                <!-- <select class="form-control" id="exampleFormControlSelect1">
                                    <option selected disabled>Room Type</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                </select> -->
                                <select id="exampleFormControlSelect1" class="form-control">
                                    <option selected disabled >Room Type</option>
                                    <?php foreach ($room_types as $type): ?>
                                        <option value="<?= htmlspecialchars($type['roomtype']) ?>"><?= htmlspecialchars($type['roomtype']) ?></option>
                                    <?php endforeach; ?>
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
                                <!-- <select id="filterType" class="form-control  ">
                                    <option value="">Filter by Type</option>
                                    <option value="type1">Type 1</option>
                                    <option value="type2">Type 2</option>
                                    <option value="type3">Type 3</option>
                                </select> -->
                                <select id="filterType" class="form-control">
                                    <option value="">Filter by Type</option>
                                    <?php foreach ($room_types as $type): ?>
                                        <option value="<?= htmlspecialchars($type['roomtype']) ?>"><?= htmlspecialchars($type['roomtype']) ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class=" ">
                            <div class="input-group input-group-outline  my-3">
                                <!-- <select id="filterRoom" class="form-control  ">
                                    <option value="">Filter by Room</option>
                                    <option value="room1">Room 1</option>
                                    <option value="room2">Room 2</option>
                                    <option value="room3">Room 3</option>
                                </select> -->
                                <select id="filterRoom" class="form-control">
                                    <option value="">Filter by Room</option>
                                    <?php foreach ($hotel_rooms as $rooms): ?>
                                        <option value="<?= htmlspecialchars($rooms['room_name']) ?>"><?= htmlspecialchars($rooms['room_name']) ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="my-3">
                            <button id="searchButton" type="button" class="btn btn-primary w-100 mb-0">Search</button>
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
                        <form id="room-form" method="POST" action="">
                            <input type="hidden" name="selected_rooms" id="selected_rooms" value="">
                            <button id="proceed-btn" class="btn btn-secondary mb-0" type="button" disabled>Proceed</button>
                        </form>
                    </div>
                </div>
                <div class="d-flex align-items-center">
                    <span class="badge badge-md badge-dot me-4">
                        <i class="bg-success"></i>
                        <span class="text-dark text-xs">Vacant</span>
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

            <!-- <?php foreach ($room_data1 as $room_type => $rooms): ?>
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
                        // Check the room status and assign the appropriate class for button color
                        if ($room['status'] === 'vacant' || $room['status'] === 'available') {
                            $status_class = 'btn-success'; // Green for available or vacant
                        } elseif ($room['status'] === 'booked') {
                            $status_class = 'btn-warning'; // Yellow for booked
                        } elseif ($room['status'] === 'occupied') {
                            $status_class = 'btn-danger'; // Red for any other status (e.g., occupied)
                        }
                        ?>
                                    <input type="checkbox" class="btn-check1 room-checkbox" id="btncheck<?php echo $room['hotel_roomid']; ?>" data-status="<?php echo $room['status']; ?>" data-userid="<?php echo $room['customer_id']; ?>" autocomplete="off">
                                    <label class="btn <?php echo $status_class; ?>" for="btncheck<?php echo $room['hotel_roomid']; ?>">
                                        <?php echo $room['roomno']; ?>
                                    </label>
                                <?php endforeach; ?>

                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?> -->

                <?php foreach ($room_data2 as $room_type => $rooms): ?>
                    <div class="card">
                        <div class="card-header py-0">
                            <div class="d-flex">
                                <div class="col-md-8 me-auto my-auto text-left">
                                    <h5><?php echo htmlspecialchars($room_type); ?> Room</h5>
                                </div>
                            </div>
                        </div>
                        <div class="card-body row py-0">
                            <div class="">
                                <div class="btn-group1" role="group" aria-label="Basic checkbox toggle group">
                                    <?php foreach ($rooms as $room): ?>
                                        <?php
                                            // Assign class based on status
                                            if ($room['status'] === 'available' || $room['status'] === 'vaccant') {
                                                $status_class = 'btn-success';
                                            } elseif ($room['status'] === 'booked') {
                                                $status_class = 'btn-warning';
                                            } elseif ($room['status'] === 'occupied') {
                                                $status_class = 'btn-danger';
                                            }
                                        ?>
                                        <input type="checkbox" class="btn-check1 room-checkbox" id="btncheck<?php echo $room['hotel_roomid']; ?>" data-status="<?php echo htmlspecialchars($room['status']); ?>" autocomplete="off">
                                        <label class="btn <?php echo $status_class; ?>" for="btncheck<?php echo $room['hotel_roomid']; ?>">
                                            <?php echo htmlspecialchars($room['roomno']); ?>
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
    var calendar = new FullCalendar.Calendar(document.getElementById("calendar"), {
        contentHeight: 'auto',
        initialView: "dayGridMonth",
        headerToolbar: {
            start: 'title',
            center: '',
            end: 'today prev,next'
        },
        selectable: true,
        editable: false,
        initialDate: new Date(), // Set to the current date
        events: [], // Start with an empty event array
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

    // Fetch booking data for the specified date range
    // fetch('Superadmin/getBookingsForDateRange') // Replace with your actual endpoint
    //     .then(response => response.json())
    //     .then(data => {
    //         // Prepare events from the data
    //         data.forEach(booking => {
    //             let className = '';
    //             if (booking.booking_status === 'booked') {
    //                 className = 'bg-gradient-warning';
    //             } else if (booking.booking_status === 'occupied') {
    //                 className = 'bg-gradient-danger';
    //             } else if (booking.booking_status === 'available') {
    //                 className = 'bg-gradient-success';
    //             }
                
    //             // Add events for each booking date
    //             calendar.addEvent({
    //                 title: `${booking.booking_status} (${booking.count}) - Room: ${booking.room_number} - Customer: ${booking.customer_name}`,
    //                 start: booking.booking_date, // Use booking date from the response
    //                 end: booking.booking_date, // Single day event
    //                 className: className,
    //                 extendedProps: {
    //                     booking_id: booking.booking_id,
    //                     customer_name: booking.customer_name,
    //                     customer_email: booking.customer_email,
    //                     customer_phone: booking.customer_phone,
    //                     room_number: booking.room_number,
    //                 }
    //             });
    //         });

    //         // Render the calendar with the new events
    //         calendar.render();
    //     })
    //     .catch(error => console.error('Error fetching booking data:', error));


    fetch('Superadmin/getBookingsForDateRange')
    .then(response => response.json())
    .then(data => {
        data.forEach(booking => {
            let className = '';
            if (booking.booking_status === 'booked') {
                className = 'bg-gradient-warning'; // Booked
            } else if (booking.booking_status === 'occupied') {
                className = 'bg-gradient-danger'; // Occupied
            }

            // Add events for each booking date
            calendar.addEvent({
                title: `${booking.booking_status} (${booking.count}) - Room: ${booking.room_number} - Customer: ${booking.customer_name}`,
                start: booking.booking_date,
                end: booking.booking_date,
                className: className,
                extendedProps: {
                    booking_id: booking.booking_id,
                    customer_name: booking.customer_name,
                    room_number: booking.room_number
                }
            });
        });

        calendar.render();
    })
    .catch(error => console.error('Error fetching booking data:', error));


    
    // Add event listener to trigger date search when date is selected
    document.getElementById('date-search').addEventListener('change', function() {
        var dateInput = this.value;
        if (dateInput) {
            calendar.gotoDate(dateInput); // Navigate to the selected date
        }
    });

    // Optional: Add a click listener to display customer details in alert
    calendar.on('eventClick', function(info) {
        const event = info.event;
        const selectedDate = event.startStr; // Get the selected event's date
        window.location.href = `all_bookings?date=${selectedDate}`;
        // window.location.href = `booked_enquiry?booking_id=${event.extendedProps.booking_id}&status=${event.extendedProps.booking_status}`;
       // alert(`Booking ID: ${event.extendedProps.booking_id}\n` +
         //     `Customer Name: ${event.extendedProps.customer_name}`);
            //   `Email: ${event.extendedProps.customer_email}\n` +
            //   `Phone: ${event.extendedProps.customer_phone}\n` +
            //   `Room Number: ${event.extendedProps.room_number}`);
    });
</script>




<!-- <script>
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
</script> -->




<!-- JavaScript for room selection and button behavior -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
    const checkboxes = document.querySelectorAll('.room-checkbox');
    const proceedBtn = document.getElementById('proceed-btn');
    const selectedRoomsInput = document.getElementById('selected_rooms');
    
    checkboxes.forEach(checkbox => {
        checkbox.addEventListener('change', function() {
            let selectedRooms = [];
            let selectedStatuses = new Set(); // Track room statuses
            let selectedUsers = new Set(); // Track user IDs
            let anyChecked = false;
            let status = null;

            // checkboxes.forEach(cb => {
            //     if (cb.checked) {
            //         anyChecked = true;
            //         selectedRooms.push(cb.id.replace('btncheck', '')); // Get room IDs
            //         status = cb.getAttribute('data-status'); // Track the last selected room's status
            //         selectedStatuses.add(status); // Add room status to set
            //         selectedUsers.add(cb.getAttribute('data-userid')); // Add user ID to set
            //     }
            // });
            checkboxes.forEach(cb => {
                if (cb.checked) {
                    anyChecked = true;
                    selectedRooms.push(cb.id.replace('btncheck', '')); // Get room IDs
                    let status = cb.getAttribute('data-status');
                    // Normalize 'vaccant' and 'available' to the same value
                    if (status === 'vaccant' || status === 'available') {
                        normalizedStatus = 'available'; // Treat both as 'available'
                    } else {
                        normalizedStatus = status;
                    }
                    selectedStatuses.add(normalizedStatus); // Add normalized status to the set
                    selectedUsers.add(cb.getAttribute('data-userid')); // Add user ID to set
                }
            });

            if (selectedStatuses.size > 1) {
                // Multiple statuses selected: disable the proceed button
                proceedBtn.classList.remove('btn-primary');
                proceedBtn.classList.add('btn-secondary');
                proceedBtn.disabled = true;
                proceedBtn.textContent = 'Select rooms with the same status';
            } else if (selectedUsers.size > 1) {
                // Multiple users selected: disable the proceed button
                proceedBtn.classList.remove('btn-primary');
                proceedBtn.classList.add('btn-secondary');
                proceedBtn.disabled = true;
                proceedBtn.textContent = 'Cannot proceed: Users are different';
            } else if (anyChecked) {
                // Rooms have the same status and same user, enable the proceed button
                proceedBtn.classList.remove('btn-secondary');
                proceedBtn.classList.add('btn-primary');
                proceedBtn.disabled = false;

               // Update button text based on room status
               if (normalizedStatus === 'available') {
                    proceedBtn.textContent = 'Proceed to Enquiry';
                } else if (normalizedStatus === 'booked') {
                    proceedBtn.textContent = 'Proceed to Occupy';
                } else if (normalizedStatus === 'occupied') {
                    proceedBtn.textContent = 'Continue to Occupy';
                }
            }  else {
                // No rooms selected, disable the button
                proceedBtn.classList.remove('btn-primary');
                proceedBtn.classList.add('btn-secondary');
                proceedBtn.disabled = true;
                proceedBtn.textContent = 'Proceed';
            }

            // Store selected room IDs in the hidden input field
            selectedRoomsInput.value = selectedRooms.join(',');
        });
    });

   // Add click event for the proceed button
   proceedBtn.addEventListener('click', function() {
        const selectedRooms = Array.from(checkboxes)
            .filter(checkbox => checkbox.checked)
            .map(checkbox => ({
                id: checkbox.id.replace('btncheck', ''),
                status: checkbox.dataset.status,
            }));

        if (selectedRooms.length > 0) {
            let firstRoomStatus = selectedRooms[0].status;

            // Normalize 'vaccant' and 'available' to 'available'
            if (firstRoomStatus === 'vaccant' || firstRoomStatus === 'available') {
                firstRoomStatus = 'available';
            }

            // Redirect based on normalized status
            if (firstRoomStatus === 'available') {
                document.getElementById('room-form').action = '<?php echo site_url("room_enquiry1"); ?>';
                document.getElementById('room-form').submit();
            } else if (firstRoomStatus === 'booked') {
                document.getElementById('room-form').action = '<?php echo site_url("booked_enquiry"); ?>';
                document.getElementById('room-form').submit();
            } else if (firstRoomStatus === 'occupied') {
                document.getElementById('room-form').action = '<?php echo site_url("occupied_enquiry"); ?>';
                document.getElementById('room-form').submit();
            }
        }
    });
});


</script>






<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    $('#searchButton').click(function() {
        var filterDate = $('#filterDate').val();
        var filterType = $('#filterType').val();
        var filterRoom = $('#filterRoom').val();
        $.ajax({
            url: '<?= base_url("Superadmin/dashboard") ?>',
            type: 'POST',
            data: {
                filterDate: filterDate,
                filterType: filterType,
                filterRoom: filterRoom
            },
            success: function(response) {
                // Update the part of the page that displays the rooms
                $('#room-results').html($(response).find('#room-results').html());
            }
        });
    });
});
</script>

