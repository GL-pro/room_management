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
                                            <div class="col-12 col-sm-4 mt-2">
                                                <div class="input-group input-group-static">
                                                    <label class="form-label text-primary">Agent</label>
                                                    <a href="#" class="ms-auto btn btn-sm mb-0 btn-outline-info" style="border-radius: .375rem" data-bs-toggle="modal" data-bs-target="#agentmodel"> + Add Agent</a>
                                                    <select class="form-control" id="choices-Agency" name="agent_id">
                                                        <option value="">Select Agent</option>
                                                        <?php foreach ($agencies as $agent): ?>
                                                            <option value="<?= $agent['agent_id'] ?>" <?= (isset($booking_details[0]) && $booking_details[0]['agent_id'] == $agent['agent_id']) ? 'selected' : '' ?>>
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
                                                            <option value="<?= $customer['customer_id'] ?>" <?= (isset($booking_details[0]) && $booking_details[0]['customer_id'] == $customer['customer_id']) ? 'selected' : '' ?>>
                                                                <?= $customer['customer_name'] ?>
                                                            </option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                        <!-- <div class=" ">
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
                                        </div> -->

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
    flatpickr("#daterange", {
        mode: "range", // Enable date range selection
        dateFormat: "Y-m-d", // Format for displaying the selected dates
        minDate: "today", // Set the minimum date as today
        onClose: function(selectedDates, dateStr, instance) {
            console.log("Selected range: ", dateStr); // Logs the selected date range (optional)
        }
    });
</script>