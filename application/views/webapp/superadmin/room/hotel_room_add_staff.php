<!DOCTYPE html>
<style>
    @import url(https://fonts.googleapis.com/icon?family=Material+Icons); 
</style>

<style>
    /* .upload__box {
         padding: 40px;
     } */

    .upload__inputfile {
        width: .1px;
        height: .1px;
        opacity: 0;
        overflow: hidden;
        position: absolute;
        z-index: -1;
    }

    .upload__btn {
        display: inline-block;
        font-weight: 600;
        color: #fff;
        text-align: center;
        min-width: 116px;
        padding: 5px;
        transition: all .3s ease;
        cursor: pointer;
        border: 2px solid;
        background-color: #4045ba;
        border-color: #4045ba;
        border-radius: 10px;
        line-height: 26px;
        font-size: 14px;
    }

    .upload__btn:hover {
        background-color: unset;
        color: #4045ba;
        transition: all .3s ease;
    }

    .upload__btn-box {
        margin-bottom: 0px;
        display: flex;
        justify-content: start;

    }

    .upload__img-wrap {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        /* margin: 0 -10px; */
    }

    .upload__img-box {
        width: 200px;
        padding: 0 10px;
        margin-bottom: 12px;
    }

    .upload__img-close {
        width: 24px;
        height: 24px;
        border-radius: 50%;
        background-color: rgba(0, 0, 0, 0.5);
        position: absolute;
        top: 10px;
        right: 10px;
        text-align: center;
        line-height: 24px;
        z-index: 1;
        cursor: pointer;
    }

    .upload__img-close:after {
        content: '\2716';
        font-size: 14px;
        color: white;
    }

    .img-bg {
        background-repeat: no-repeat;
        background-position: center;
        background-size: cover;
        position: relative;
        padding-bottom: 100%;
        border-radius: 10px;
    }
</style>

<div class="container-fluid py-1 mb-6 vh-100">
    <div class="row">
        <div class="col-12">
            <div class="row  ">
                <div class="col-12  m-auto ">
                    <div class="card">
                        <div class="card-body">
                        <form id="hotelRoomForm" action="" method="post" enctype="multipart/form-data">
                        <div class="border-radius-xl bg-white">
                                    <div class="d-lg-flex">
                                        <div class="mb-2">
                                            <h5 class="font-weight-bolder mb-0">Room </h5>
                                            <p class="mb-0 text-sm">Add your Room Type and Price</p>
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-12 col-sm-6">
                                            <div class="input-group input-group-static ">
                                                <label class=" ">Rooms No</label>
                                                <input class="form-control" name="roomno" type="text" required/>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6 ">
                                            <div class="input-group input-group-static ">
                                                <label class=" ">Rooms Name</label>
                                                <input class="form-control" name="roomname" type="text" required/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                      <div class="col-12 col-sm-6">
                                            <div class="input-group input-group-static">
                                                <label class=" ">Type of Rooms</label>
                                                <button type="button" class="ms-auto btn btn-sm mb-0 text-info border rounded" data-bs-toggle="modal" data-bs-target="#modal-room-type">+ Add New Type</button>
                                                <?php if (empty($roomtype)) { ?>
                                                    <div class="alert alert-warning mt-2" role="alert">
                                                        No room types available. Please contact the admin or add self to add these data.
                                                    </div>
                                                <?php } else { ?>
                                                    <select class="form-control" name="roomtype[]" id="choices_type_of_rooms" required>
                                                        <option value="" selected disabled>Select Type of Room</option>
                                                        <?php foreach ($roomtype as $values) { ?>
                                                            <option value="<?php echo $values->roomid; ?>">
                                                                <?php echo $values->roomtype; ?>
                                                            </option>
                                                        <?php } ?>
                                                    </select>
                                                <?php } ?>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6">
                                            <div class="input-group input-group-static ">
                                                <label class=" ">Max No of Guests</label>
                                                <input class="form-control" name="noofguests" type="number" required/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-3">

                                       <div class="col-12 col-sm-6">
                                            <div class="input-group input-group-static">
                                                <label>Extra Guests count:</label> 
                                                <input class="form-control" name="extguests" type="number"  required />
                                            </div>
                                        </div>  
                                        <div class="col-12 col-sm-6">
                                            <div class="input-group input-group-static">
                                                <label>Normal Price:</label> 
                                                <input class="form-control" name="nprice" type="number"  required />
                                            </div>
                                        </div>
                                       
                                    </div>

                                    <div class="row mt-3">
                                    <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                                            <div class="input-group input-group-static">
                                                <label>Discount Price:</label> <!-- Display the range value -->
                                                <input class="form-control" name="dprice" type="number"  required />
                                            </div>
                                        </div>                                
                                    </div>


                                                                                    
                                                <div class="row mt-3">
                                                    <div class="col-12  ">
                                                        <div class="input-group input-group-static">
                                                                <label>Description</label>
                                                                <textarea class="form-control" name="description" rows="4" required></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                    </br>
                                                     <p class="h6">UPLOAD ROOM IMAGES (5 photos required)</p>
                                                      <span class="text-sm">Allowed formats: JPG, JPEG, PNG</span>
                                                     <div class="  mt-4 row ">
                                                        <div class="ms-1  col-md-3 col-6 ms-2">
                                                            <div class="box">
                                                               <div class="js--image-preview js--no-default ext-image-preview-1" style=""> </div>
                                                                <div class="upload-options">
                                                                    <label>
                                                                        <input type="file" class="image-upload" name="extimage1" accept="image/*" required/>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div> 
                                                    
                                                        <div class="ms-1  col-md-3 col-6 ms-2">
                                                            <div class="box">
                                                            <div class="js--image-preview js--no-default"  style=""> 
                                                           </div>
                                                                <div class="upload-options">
                                                                    <label>
                                                                        <input type="file" class="image-upload" name="extimage2" accept="image/*" required/>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div> 
                                                    
                                                        <div class="ms-1  col-md-3 col-6 ms-2">
                                                            <div class="box">
                                                            <div class="js--image-preview js--no-default"  style=""> </div>
                                                                <div class="upload-options">
                                                                    <label>
                                                                        <input type="file" class="image-upload" name="extimage3" accept="image/*" required/>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    
                                                        <div class="ms-1  col-md-3 col-6 ms-2">
                                                            <div class="box">
                                                            <div class="js--image-preview js--no-default"  style=""> </div>
                                                                <div class="upload-options">
                                                                    <label>
                                                                        <input type="file" class="image-upload" name="extimage4" accept="image/*" required/>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div> 
                                                    
                                                        <div class="ms-1  col-md-3 col-6 ms-2">
                                                            <div class="box">
                                                            <div class="js--image-preview js--no-default"  style=""> </div>
                                                                <div class="upload-options">
                                                                    <label>
                                                                        <input type="file" class="image-upload" name="extimage5" accept="image/*" required/>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div> 
                                                    </div>
                                                </br>

                                    <div class=" ">
                                    <p class="mb-0 text-sm">Add your Room Facilitys</p>
                                          <!-- Loop through facilities -->
                                    <?php foreach ($allfacilities as $facility): ?>
                                        <div class="card mt-1">
                                            <div class="card-body">
                                                <div class="d-lg-flex">
                                                    <div>
                                                        <h6 class="font-weight-bolder mb-0"><?php echo $facility['facilityname']; ?></h6>
                                                    </div>
                                                
                                                </div>
                                                <div class="row mt-3 p-0">
                                                    <div class="col-12 p-0">
                                                        <div class="form-check ps-2">
                                                            <input type="hidden" name="facility_ids[]" value="<?php echo $facility['facilityid']; ?>">
                                                            <input class="form-check-input check-all-subfacilities" type="checkbox" name="selected_facilities[]" value="<?php echo $facility['facilityid']; ?>" id="checkAllSubfacilities<?php echo $facility['facilityid']; ?>">
                                                            <label class="custom-control-label" for="checkAllSubfacilities<?php echo $facility['facilityid']; ?>">Check All </label>
                                                        </div>
                                                        <div class="d-flex flex-wrap">
                                                            <!-- Loop through subfacilities -->
                                                            <?php foreach ($facility['subfacilities'] as $subfacility): ?>
                                                                <div class="form-check ps-2 col-12 col-md-3">
                                                                    <?php
                                                                        // Check if the subfacility is selected
                                                                        $isChecked = false;
                                                                        if (isset($selected_subfacilities[$facility['facilityid']]) && in_array($subfacility['subfacilityid'], $selected_subfacilities[$facility['facilityid']])) {
                                                                            $isChecked = true;
                                                                        }
                                                                    ?>
                                                                    <input class="form-check-input subfacility-checkbox" type="checkbox" name="selected_subfacilities[<?php echo $facility['facilityid']; ?>][]" value="<?php echo $subfacility['subfacilityid']; ?>" id="customCheck<?php echo $subfacility['subfacilityid']; ?>" <?php echo $isChecked ? 'checked' : ''; ?>>
                                                                    <label class="custom-control-label" for="customCheck<?php echo $subfacility['subfacilityid']; ?>"><?php echo $subfacility['subfacilityname']; ?></label>
                                                                </div>
                                                            <?php endforeach; ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                            
                                        </div>
                                    </div>
                                            <div class="button-row d-flex flex-column mt-3">
                                                <a href=" " class="ms-auto mb-0">
                                                    <button class="ms-auto mb-0 px-6 btn bg-gradient-dark mt-4 mt-sm-0" type="submit" title="submit">Submit</button></a>
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
                    <div class="modal fade" id="modal-room-type" tabindex="-1" role="dialog" aria-labelledby="modal-room-type" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h6 class="modal-title font-weight-normal" id="modal-title-room-type">Add New Room Type</h6>
                                    <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="col-12">
                                        <div class="input-group input-group-static">
                                            <label>Room Type</label>
                                            <input class="form-control" id="roomType" type="text" />
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" id="submitRoomType" class="btn bg-gradient-primary">Submit</button>
                                </div>
                            </div>
                        </div>
                    </div>


<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    function initImageUpload(box) {
        let uploadField = box.querySelector('.image-upload');
        uploadField.addEventListener('change', getFile);
        function getFile(e) {
            let file = e.currentTarget.files[0];
            checkType(file);
        }
        function previewImage(file) {
            let thumb = box.querySelector('.js--image-preview'),
                reader = new FileReader();
            reader.onload = function() {
                thumb.style.backgroundImage = 'url(' + reader.result + ')';
            }
            reader.readAsDataURL(file);
            thumb.className += ' js--no-default';
        }
        function checkType(file) {
            let imageType = /image.*/;
            let validTypes = ['image/jpeg', 'image/png'];
            if (!file.type.match(imageType)) {
                alert('File is not an image');
            } else if (!validTypes.includes(file.type)) {
                alert('Unsupported file type. Please upload JPG, JPEG, or PNG images only.');
            } else {
                previewImage(file);
            }
        }
    }
    // Initialize all image upload boxes
    var boxes = document.querySelectorAll('.box');
    for (let i = 0; i < boxes.length; i++) {
        let box = boxes[i];
        initDropEffect(box);
        initImageUpload(box);
    }
    // Drop effect
    function initDropEffect(box) {
        let area = box.querySelector('.js--image-preview');
        area.addEventListener('click', function(e) {
            let drop = document.createElement('span');
            drop.className = 'drop';
            this.appendChild(drop);
            let maxDistance = Math.max(parseInt(getComputedStyle(this).width), parseInt(getComputedStyle(this).height));
            drop.style.width = maxDistance + 'px';
            drop.style.height = maxDistance + 'px';
            let dropWidth = parseInt(getComputedStyle(this).width),
                dropHeight = parseInt(getComputedStyle(this).height),
                x = e.pageX - this.offsetLeft - (dropWidth / 2),
                y = e.pageY - this.offsetTop - (dropHeight / 2) - 30;
            drop.style.top = y + 'px';
            drop.style.left = x + 'px';
            drop.className += ' animate';
            e.stopPropagation();
        });
    }
</script>

<script>
    $(document).ready(function() {
        $('#submitRoomType').click(function() {
            var roomType = $('#roomType').val().trim();
            if (roomType === '') {
                alert('Room Type cannot be empty');
                return;
            }
            $.ajax({
                url: '<?php echo base_url('Superadmin/room_type_reg1_staff'); ?>',
                method: 'POST',
                data: { roomtype: roomType },
                success: function(response) {
                    alert(response); // Show success message
                    $('#modal-room-type').modal('hide'); // Hide the modal
                    // Optionally, you can reload the page or update the UI as needed
                    location.reload();
                },
                error: function(xhr, status, error) {
                    console.error(error); // Log error to console
                    alert('An error occurred while adding the room type. Please try again.'); // Show error message
                }
            });
        });
    });
</script>
<script>
    $(document).ready(function() {
        // Function to handle Check All Facilities & subfacilities checkbox
        $('.check-all-subfacilities').change(function() {
            var isChecked = $(this).prop('checked');
            $(this).closest('.card-body').find('.subfacility-checkbox').prop('checked', isChecked);
        });
    });
</script>

<script>
$(document).ready(function() {
    $('#hotelRoomForm').submit(function(event) {
        event.preventDefault(); // Prevent the default form submission
   
       // Validate if at least one subfacility is selected
       var subfacilityChecked = false;
        $('.subfacility-checkbox').each(function() {
            if ($(this).is(':checked')) {
                subfacilityChecked = true; // If at least one subfacility is checked, set subfacilityChecked to true
            }
        });
        if (!subfacilityChecked) {
            alert('Please select at least one Room facility.');
            return; // Prevent form submission
        }
        var formData = new FormData($(this)[0]);
        // Submit form data via AJAX
        $.ajax({
            url: '<?php echo base_url('insert_hotel_room_staff'); ?>', // Replace with your actual URL
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                // Handle success response
                console.log(response); // Log the response for debugging
                alert('Room inserted successfully'); // Show success message
               // location.reload();
                 window.location.href = '<?php echo base_url('hotel_added_rooms_staff'); ?>';
            },
            error: function(xhr, status, error) {
                // Handle error response
                console.error(xhr.responseText); // Log the error response for debugging
                alert('Error: ' + xhr.responseText); // Show error message
            }
        });
    });
});
</script>

<script>
    function updateImagePreviews(imageData) {
        // Update exterior image previews
        for (var i = 1; i <= 5; i++) {
            var extImage = imageData['ext_image' + i];
            if (extImage !== '') {
                $('.ext-image-preview-' + i).css('background-image', 'url(<?php echo base_url('upload/hotel_images/'); ?>' + extImage + ')');
            }
        }
        // Update interior image previews
        for (var i = 1; i <= 5; i++) {
            var intImage = imageData['int_image' + i];
            if (intImage !== '') {
                $('.int-image-preview-' + i).css('background-image', 'url(<?php echo base_url('upload/hotel_images/'); ?>' + intImage + ')');
            }
        }
    }
</script>

<script>$(document).ready(function() {
    $('#normalPrice').on('input', function() {
        $('#normalPriceValue').text($(this).val());
    });

    $('#discountPrice').on('input', function() {
        $('#discountPriceValue').text($(this).val());
    });
});
</script>

<script>
document.getElementById('checkout').addEventListener('change', function() {
    var checkin = new Date(document.getElementById('checkin').value);
    var checkout = new Date(document.getElementById('checkout').value);
    if (checkout > checkin) {
        var timeDiff = checkout - checkin;
        var hours = timeDiff / (1000 * 60 * 60);
        if (hours > 24) {
            var extraHours = hours - 24;
            var addonPrice = extraHours * 100; // Example: $100 for each extra hour
            document.getElementById('addonPrice').value = addonPrice;
            alert('Stay exceeds 24 hours. Additional cost: Rs/-' + addonPrice);
        } else {
            document.getElementById('addonPrice').value = 0;
        }
    } else {
        alert('Check-out time must be after check-in time.');
        document.getElementById('checkout').value = ''; // Reset checkout time
    }
});
</script>