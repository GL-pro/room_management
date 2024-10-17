<!-- Bootstrap Timepicker CSS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-timepicker/0.5.2/css/bootstrap-timepicker.min.css" rel="stylesheet">

<div class="container-fluid py-1 mb-6 vh-100">
    <div class="row">
        <div class="col-12">
            <div class="row">
                <div class="col-12 m-auto">
                    <div class="card">
                        <div class="card-header bg-gradient-dark text-white">
                            <h4 class="font-weight-bold mb-0">Hotel Profile</h4>
                            <p class="mb-0 text-sm">Complete your hotel profile with the necessary details.</p>
                        </div>
                        <div class="card-body">
                            <form id="hotelForm" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="hotel_id" value="<?php echo !empty($hotel_details) ? $hotel_details[0]->hotel_id : ''; ?>">
                                <!-- Hotel Image Upload -->
                                <div class="row">
                                    
                                <div class="col-12 col-md-4 text-center mb-4">
                                    <label for="hotelImage" class="d-block font-weight-bold">Upload Hotel Image</label>
                                    
                                    <div class="profile-image-upload mb-2">
                                        <?php if (!empty($hotel_details[0]->image)): ?>
                                            <!-- Display the image with the correct path -->
                                            <img src="<?php echo base_url($hotel_details[0]->image); ?>" 
                                                alt="Hotel Image" 
                                                class="img-fluid rounded-circle" 
                                                width="150" 
                                                height="150" 
                                                id="currentHotelImage">
                                        <?php else: ?>
                                            <p>No image uploaded for this hotel.</p>
                                        <?php endif; ?>
                                    </div>
                                    
                                    <!-- Hidden input to retain the existing image value -->
                                    <input type="hidden" name="existing_hotel_image" value="<?php echo $hotel_details[0]->image; ?>">
                                    
                                    <div class="mb-3">
                                        <label for="hotelImageInput" class="form-label">Upload New Image</label>
                                        <input class="form-control-file" id="hotelImageInput" name="hotelImage" type="file" accept="image/*" onchange="previewHotelImage(event)">
                                    </div>
                                    
                                    <script>
                                        function previewHotelImage(event) {
                                            var reader = new FileReader();
                                            reader.onload = function() {
                                                var output = document.getElementById('currentHotelImage');
                                                output.src = reader.result;
                                            }
                                            reader.readAsDataURL(event.target.files[0]);
                                        }
                                    </script>
                                </div>

                                   


                                    <div class="col-12 col-md-8">
                                        <!-- Hotel Basic Details -->
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="input-group input-group-static">
                                                    <label for="hotelName">Hotel Name</label>
                                                    <input class="form-control" type="text" id="hotelName" name="hotelname" placeholder="Hotel Name" value="<?php echo !empty($hotel_details) ? $hotel_details[0]->hotelname : ''; ?>" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="input-group input-group-static">
                                                    <label for="hotelOwner">Hotel Owner</label>
                                                    <input class="form-control" type="text" id="hotelOwner" name="hotelowner" placeholder="Hotel Owner" value="<?php echo !empty($hotel_details) ? $hotel_details[0]->hotelowner : ''; ?>" required>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- About Section -->
                                        <div class="mt-3">
                                            <div class="input-group input-group-static">
                                                <label for="aboutHotel">About Hotel</label>
                                                <textarea class="form-control" id="aboutHotel" name="about" rows="4" placeholder="Write something about your hotel..." spellcheck="true" required><?php echo !empty($hotel_details) ? $hotel_details[0]->about : ''; ?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Address and Contact Section -->
                                <div class="mt-4">
                                    <div class="section-header mb-3">
                                        <h5 class="font-weight-bold">Contact Information</h5>
                                        <p class="text-sm">Please provide your contact details.</p>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="input-group input-group-static">
                                                <label for="email">Email Address</label>
                                                <input type="email" class="form-control" id="email" name="email" placeholder="Enter email" value="<?php echo !empty($hotel_details) ? $hotel_details[0]->email : ''; ?>" required>
                                            </div>
                                        </div>
                                      
                                    <div class="row mt-3">
                                        <div class="col-md-6">
                                            <div class="input-group input-group-static">
                                                <label for="whatsappno">Whatsapp Number</label>
                                                <input type="tel" class="form-control" id="whatsappno" name="whatsappno" value="<?php echo !empty($hotel_details) ? $hotel_details[0]->whatsappno : ''; ?>" pattern="[0-9]{10}" title="Enter a valid 10-digit number" required>
                                            </div>
                                        </div>
                                    </div>


                                    </div>


                                    <div class="row mt-3">
                                            <p class="text-md font-weight-bolder">Contact Person 1</p>
                                            <div class="col-12 col-sm-6">
                                                <div class="input-group input-group-static  ">
                                                    <label class=" "> Name </label>
                                                    <input class="form-control" name="person1" type="text" value="<?php echo !empty($hotel_details) ? $hotel_details[0]->person1 : ''; ?>" required/>
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                                                <div class="input-group input-group-static ">
                                                    <label class=" ">Mobile Number</label>
                                                    <input class="form-control" value="<?php echo !empty($hotel_details) ? $hotel_details[0]->phone1 : ''; ?>" name="phone1" type="tel"  pattern="[0-9]{10}" title="Please enter a 10-digit phone number" placeholder=" " required/>
                                                </div>
                                            </div>
                                        </div> 
                                        



                                    <div class="row mt-3">
                                        <div class="col-12">
                                            <div class="input-group input-group-static">
                                                <label for="address">Address</label>
                                                <textarea class="form-control" id="address" name="address" rows="3" placeholder="Enter your address" spellcheck="true" required><?php echo !empty($hotel_details) ? $hotel_details[0]->address : ''; ?></textarea>
                                            </div>
                                        </div>

                                        <div class="col-12 mt-3">
                                            <div class="input-group input-group-static">
                                                <label for="location">Location</label>
                                                <textarea class="form-control" id="location" name="location" rows="3" placeholder="Enter your location" spellcheck="true" required><?php echo !empty($hotel_details) ? $hotel_details[0]->location : ''; ?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Hotel Rules -->
                                <div class="mt-4">
                                    <div class="section-header mb-3">
                                        <h5 class="font-weight-bold">Hotel Rules</h5>
                                        <p class="text-sm">Specify your hotel's rules.</p>
                                    </div>
                                    <div class="input-group input-group-static">
                                        <label for="rules">Hotel Rules</label>
                                        <textarea class="form-control" id="rules" name="rules" rows="5" placeholder="Enter rules for your hotel" spellcheck="true" required><?php echo !empty($hotel_details) ? $hotel_details[0]->rules : ''; ?></textarea>
                                    </div>
                                </div>

                                <!-- Submit Button -->
                                <div class="button-row d-flex flex-column mt-4">
                                    <button class="ms-auto mb-0 px-6 btn bg-gradient-dark" type="submit" title="submit">Save Profile</button>
                                </div>
                            </form>
                        </div> <!-- End of card body -->
                    </div> <!-- End of card -->
                </div> <!-- End of col -->
            </div> <!-- End of row -->
        </div> <!-- End of col -->
    </div> <!-- End of row -->
</div> <!-- End of container -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
    $(document).ready(function () {
        $('#hotelForm').submit(function (e) {
            e.preventDefault(); // Prevent form from submitting normally
            var formData = new FormData(this);
            $.ajax({
                type: 'POST',
                url: '<?php echo base_url(); ?>membhotelreg',
                data: formData,
                contentType: false,
                processData: false,
                success: function (response) {
                    alert('Hotel profile saved successfully!');
                    window.location.href = '<?php echo base_url(); ?>hotel_creation';
                },
                error: function (xhr, status, error) {
                    alert('Error! Please try again.');
                }
            });
        });
    });
</script>

<!-- Bootstrap Timepicker JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-timepicker/0.5.2/js/bootstrap-timepicker.min.js"></script>
<script>
    $(document).ready(function () {
        $('.timepicker').timepicker({
            showMeridian: false,
            minuteStep: 1,
            showSeconds: true
        });
    });
</script>
