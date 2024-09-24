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
                        <!-- <form action="<?php echo base_url('hotel_room_update'); ?>" method="post" enctype="multipart/form-data"> -->
                        <form action="" method="post" enctype="multipart/form-data">
                          <div class="border-radius-xl bg-white">

                                    <div class="d-lg-flex">
                                        <div class="mb-2">
                                            <h5 class="font-weight-bolder mb-0">Room </h5>
                                            <p class="mb-0 text-sm">Add your Room Type and Price</p>
                                        </div>
                                    </div>

                                    <!-- <div class="row mt-3">
                                        <div class="col-12  ">
                                            <div class="input-group input-group-static ">
                                                <label class=" ">Rooms Name</label>
                                                <input type="hidden" name="hotel_roomid" value="<?php echo $rooms[0]->hotel_roomid; ?>">
                                                <input class="form-control" name="roomname" value="<?php echo !empty($rooms) ? $rooms[0]->room_name : ''; ?>" type="text" required/>
                                            </div>
                                        </div>
                                    </div> -->


                                    <div class="row mt-3">
                                        <div class="col-12 col-sm-6">
                                            <div class="input-group input-group-static ">
                                                <label class=" ">Rooms No</label>
                                                <input class="form-control" name="roomno" value="<?php echo !empty($rooms) ? $rooms[0]->roomno : ''; ?>" type="text" required/>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6 ">
                                            <div class="input-group input-group-static ">
                                                <label class=" ">Rooms Name</label>
                                                <input type="hidden" name="hotel_roomid" value="<?php echo $rooms[0]->hotel_roomid; ?>">
                                                <input class="form-control" name="roomname" value="<?php echo !empty($rooms) ? $rooms[0]->room_name : ''; ?>" type="text" required/>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="row mt-3">
                                        <div class="col-12 col-sm-6">
                                            <div class="input-group input-group-static ">
                                                <label class=" ">Type of Rooms</label><button type="button" class="ms-auto btn btn-sm mb-0 text-info border rounded" data-bs-toggle="modal" data-bs-target="#modal-room-type">+ Add New Type</button>
                                            
                                                <select class="form-control" name="roomtype" id="choices_type_of_rooms" required>
                                                    <option value="" disabled>Select Type of Room</option>
                                                    <?php foreach ($roomtype as $value): ?>
                                                        <?php $selected = (!empty($rooms) && $rooms[0]->roomtypeid == $value->roomid) ? 'selected' : ''; ?>
                                                        <option value="<?php echo $value->roomid; ?>" <?php echo $selected; ?>>
                                                            <?php echo $value->roomtype; ?>
                                                        </option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6">
                                            <div class="input-group input-group-static ">
                                                <label class=" ">Max No of Guests </label>
                                                <input class="form-control" name="noofguests" value="<?php echo !empty($rooms) ? $rooms[0]->noofguests : ''; ?>" type="number" required />
                                            </div>
                                        </div>
                                    </div>


                                    <div class="row mt-3">
                                    <div class="col-12 col-sm-6">
                                            <div class="input-group input-group-static">
                                                <label>Normal Price: </label>
                                                <input class="form-control" name="nprice" type="text"  
                                                value="<?php echo !empty($rooms) ? $rooms[0]->normalprice : ''; ?>" 
                                                required />
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                                            <div class="input-group input-group-static">
                                                <label>Discount Price:</label>
                                                <input class="form-control" name="dprice" type="text" 
                                                    value="<?php echo !empty($rooms) ? $rooms[0]->discountprice : ''; ?>" 
                                                    required />
                                            </div>
                                        </div>
                                    </div>

                                  
                           <!-- <div class="row mt-3"> 
                                <div class="col-12 col-sm-6 mt-3 mt-sm-0"> 
                                  <div class="input-group input-group-static">
                                     <label for="checkin">Check-in Time:</label>
                                       <input type="datetime-local" class="form-control" 
                                        value="<?php echo !empty($rooms) && isset($rooms[0]->checkin_date_time) ? date('Y-m-d\TH:i', strtotime($rooms[0]->checkin_date_time)) : ''; ?>" 
                                        id="checkin" 
                                        name="checkin" 
                                        required>
                                    </div>
                                </div>

                                <div class="col-12 col-sm-6 mt-3 mt-sm-0"> 
                                    <div class="input-group input-group-static">
                                      <label for="checkout">Check-out Time:</label>
                                        <input type="datetime-local" class="form-control" 
                                            value="<?php echo !empty($rooms) && isset($rooms[0]->checkout_date_time) ? date('Y-m-d\TH:i', strtotime($rooms[0]->checkout_date_time)) : ''; ?>" 
                                            id="checkout" 
                                            name="checkout" 
                                            required>
                                    </div>
                                </div>

                                <div class="col-12 col-sm-6 mt-3 mt-sm-0"> 
                                    <div class="input-group input-group-static">
                                        <label for="addonPrice">Add-on Price:</label>
                                        <input type="number" class="form-control" value="<?php echo !empty($rooms) ? $rooms[0]->addonprice : ''; ?>" id="addonPrice" name="addonprice" value="0" readonly>
                                    </div>
                                </div>
                            </div> -->

                                    <div class="row mt-3">                             
                                        <div class="col-12">
                                            <div class="input-group input-group-static">
                                                    <label>Description</label>
                                                    <textarea class="form-control" name="description" rows="4" required>
                                                    <?php echo !empty($rooms) ? $rooms[0]->description : ''; ?>
                                                    </textarea>
                                            </div>
                                        </div>
                                    </div>
                               

                                <p class="h6">UPLOAD ROOM IMAGES (5 photos required)</p>
                                <div class="  mt-4 row ">
                                    <div class="ms-1  col-md-3 col-6 ms-2">
                                        <div class="box">
                                        <div class="js--image-preview js--no-default ext-image-preview-1" style="background-image: url('<?php echo isset($room_images[0]->image1) ? base_url('upload/room_images/'.$room_images[0]->image1) : ''; ?>');"> </div>
                                            <div class="upload-options">
                                                <label>
                                                    <input type="file" class="image-upload" name="extimage1" accept="image/*" />
                                                </label>
                                            </div>
                                        </div>
                                    </div> 
                    
                    
                                <div class="ms-1  col-md-3 col-6 ms-2">
                                    <div class="box">
                                    <div class="js--image-preview js--no-default"  style="background-image: url('<?php echo isset($room_images[0]->image2) ? base_url('upload/room_images/'.$room_images[0]->image2) : ''; ?>');"> 
                                </div>
                                        <div class="upload-options">
                                            <label>
                                                <input type="file" class="image-upload" name="extimage2" accept="image/*" />
                                            </label>
                                        </div>
                                    </div>
                                </div> 
                    
                                <div class="ms-1  col-md-3 col-6 ms-2">
                                    <div class="box">
                                    <div class="js--image-preview js--no-default"  style="background-image: url('<?php echo isset($room_images[0]->image3) ? base_url('upload/room_images/'.$room_images[0]->image3) : ''; ?>');"> </div>
                                        <div class="upload-options">
                                            <label>
                                                <input type="file" class="image-upload" name="extimage3" accept="image/*" />
                                            </label>
                                        </div>
                                    </div>
                                </div>
                    
                                <div class="ms-1  col-md-3 col-6 ms-2">
                                    <div class="box">
                                    <div class="js--image-preview js--no-default"  style="background-image: url('<?php echo isset($room_images[0]->image4) ? base_url('upload/room_images/'.$room_images[0]->image4) : ''; ?>');"> </div>
                                        <div class="upload-options">
                                            <label>
                                                <input type="file" class="image-upload" name="extimage4" accept="image/*" />
                                            </label>
                                        </div>
                                    </div>
                                </div> 
                            
                                <div class="ms-1  col-md-3 col-6 ms-2">
                                    <div class="box">
                                    <div class="js--image-preview js--no-default"  style="background-image: url('<?php echo isset($room_images[0]->image5) ? base_url('upload/room_images/'.$room_images[0]->image5) : ''; ?>');"> </div>
                                        <div class="upload-options">
                                            <label>
                                                <input type="file" class="image-upload" name="extimage5" accept="image/*" />
                                            </label>
                                        </div>
                                    </div>
                                </div> 
                            </div>
                            
                            
                        
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
                                                        <input class="form-check-input check-all-subfacilities subf" type="checkbox" name="selected_facilities[]" value="<?php echo $facility['facilityid']; ?>" id="checkAllSubfacilities<?php echo $facility['facilityid']; ?>">
                                                        <label class="custom-control-label" for="checkAllSubfacilities<?php echo $facility['facilityid']; ?>">Check All</label>
                                                    </div>
                                                    <div class="d-flex flex-wrap">
                                                        <!-- Loop through subfacilities -->
                                                        <?php foreach ($facility['subfacilities'] as $subfacility): ?>
                                                            <?php
                                                                // Check if the subfacility is selected for the current room
                                                                $isChecked = false;
                                                                foreach ($rooms as $room) {
                                                                    if ($room->subfacilityid == $subfacility['subfacilityid']) {
                                                                        $isChecked = true;
                                                                        break;
                                                                    }
                                                                }
                                                            ?>
                                                            <div class="form-check ps-2 col-12 col-md-3">
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
    jQuery(document).ready(function() {
        ImgUpload();
    });

    function ImgUpload() {
        var imgWrap = "";
        var imgArray = [];

        $('.upload__inputfile').each(function() {
            $(this).on('change', function(e) {
                imgWrap = $(this).closest('.upload__box').find('.upload__img-wrap');
                var maxLength = $(this).attr('data-max_length');

                var files = e.target.files;
                var filesArr = Array.prototype.slice.call(files);
                var iterator = 0;
                filesArr.forEach(function(f, index) {

                    if (!f.type.match('image.*')) {
                        return;
                    }

                    if (imgArray.length > maxLength) {
                        return false
                    } else {
                        var len = 0;
                        for (var i = 0; i < imgArray.length; i++) {
                            if (imgArray[i] !== undefined) {
                                len++;
                            }
                        }
                        if (len > maxLength) {
                            return false;
                        } else {
                            imgArray.push(f);

                            var reader = new FileReader();
                            reader.onload = function(e) {
                                var html = "<div class='upload__img-box'><div style='background-image: url(" + e.target.result + ")' data-number='" + $(".upload__img-close").length + "' data-file='" + f.name + "' class='img-bg'><div class='upload__img-close'></div></div></div>";
                                imgWrap.append(html);
                                iterator++;
                            }
                            reader.readAsDataURL(f);
                        }
                    }
                });
            });
        });

        $('body').on('click', ".upload__img-close", function(e) {
            var file = $(this).parent().data("file");
            for (var i = 0; i < imgArray.length; i++) {
                if (imgArray[i].name === file) {
                    imgArray.splice(i, 1);
                    break;
                }
            }
            $(this).parent().parent().remove();
        });
    }


   
</script>



<script>
    $(document).ready(function() {
        $('#submitRoomType').click(function() {
            var roomType = $('#roomType').val().trim();

            // Validate room type
            if (roomType === '') {
                alert('Room Type cannot be empty');
                return;
            }

            // Send AJAX request to add room type
            $.ajax({
                url: '<?php echo base_url('Admin/room_type_reg1'); ?>',
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
        // Save checkbox states to local storage when checked/unchecked
        $('.subfacility-checkbox').change(function() {
            var checkboxId = $(this).attr('id');
            var isChecked = $(this).prop('checked');
            localStorage.setItem(checkboxId, isChecked);
        });

        // Function to handle Check All Facilities & subfacilities checkbox
        $('#checkAllFacilities').change(function() {
            var isChecked = $(this).prop('checked');
            $('.check-all-subfacilities').prop('checked', isChecked);
            $('.subfacility-checkbox').prop('checked', isChecked).change(); // Trigger change event to update local storage
        });

        // Function to handle individual subfacilities checkboxes
        $('.check-all-subfacilities').change(function() {
            var isChecked = $(this).prop('checked');
            $(this).closest('.card-body').find('.subfacility-checkbox').prop('checked', isChecked).change(); // Trigger change event to update local storage
            var allSubfacilitiesUnchecked = $('.subfacility-checkbox:not(:checked)').length === 0;
            $('#checkAllFacilities').prop('checked', allSubfacilitiesUnchecked);
        });
    });
</script> 

<!-- update subfacility status -->
<script>
  $(document).ready(function() {
    // Function to handle checkbox change event
    $('.subfacility-checkbox').change(function() {
        var isChecked = $(this).prop('checked');
        var subfacilityId = $(this).val();
        var facilityId = $(this).closest('.card-body').find('input[name="selected_facilities[]"]').val();
        var hotelRoomId = $('input[name="hotel_roomid"]').val();
        // Send AJAX request to update subfacility status
        $.ajax({
            url: '<?php echo base_url('Admin/update_subfacility_status111'); ?>',
            method: 'POST',
            data: {
                subfacilityId: subfacilityId,
                facilityId: facilityId,
                hotelRoomId: hotelRoomId,
                isChecked: isChecked ? 1 : 0 // Convert boolean to integer
            },
            success: function(response) {
                console.log(response);
            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        });
    });

    // Check subfacility status on page load and update checkboxes accordingly
    $('.subfacility-checkbox').each(function() {
        var checkbox = $(this);
        var subfacilityId = checkbox.val();
        var hotelRoomId = $('input[name="hotel_roomid"]').val();

        // Send AJAX request to check subfacility status
        $.ajax({
            url: '<?php echo base_url('Admin/check_subfacility_status'); ?>',
            method: 'POST',
            data: {
                hotelRoomId: hotelRoomId,
                subfacilityId: subfacilityId
            },
            success: function(response) {
                if (response == '1') {
                    checkbox.prop('checked', true);
                } else {
                    checkbox.prop('checked', false);
                }
            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        });
    });
});
</script>


<!-- update other all fields -->
<script>
$('form').submit(function(event) {
    event.preventDefault(); 
    var formData = new FormData(); 
    formData.append('roomno', $('input[name="roomno"]').val());
    formData.append('roomName', $('input[name="roomname"]').val());
    formData.append('roomType', $('#choices_type_of_rooms').val());
    formData.append('noOfRooms', $('input[name="noofrooms"]').val());
    formData.append('noofguests', $('input[name="noofguests"]').val());
    formData.append('normalPrice', $('input[name="nprice"]').val());
    formData.append('discountPrice', $('input[name="dprice"]').val());
    formData.append('hotelRoomId', $('input[name="hotel_roomid"]').val());
    formData.append('checkin', $('input[name="checkin"]').val());
    formData.append('checkout', $('input[name="checkout"]').val());
    formData.append('addonprice', $('input[name="addonprice"]').val());
    formData.append('description', $('textarea[name="description"]').val()); // Updated line
    // Append image files
    for (var i = 1; i <= 5; i++) {
        var fileInput = $('input[name="extimage' + i + '"]')[0];
        if (fileInput.files.length > 0) {
            formData.append('extimage' + i, fileInput.files[0]);
        }
    }

    // Send AJAX request to update all fields
    $.ajax({
        url: '<?php echo base_url('Admin/update_room_fields111'); ?>',
        method: 'POST',
        data: formData,
        processData: false, // Prevent jQuery from processing the data
        contentType: false, // Prevent jQuery from setting the content type
        success: function(response) {
            if (response.success) {
                // Display success alert
                alert(response.message);
            } else {
                // Display error alert
                alert('Successfully update room fields');
                  location.reload();
            }
        },
        error: function(xhr, status, error) {
            // Handle error
            console.error(error);
            alert('An error occurred while updating room fields');
        }
    });
});
</script>





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
            if (!file.type.match(imageType)) {
                throw 'Datei ist kein Bild';
            } else if (!file) {
                throw 'Kein Bild gewählt';
            } else {
                previewImage(file);
            }
        }

    }

    // initialize box-scope
    var boxes = document.querySelectorAll('.box');

    for (let i = 0; i < boxes.length; i++) {
        let box = boxes[i];
        initDropEffect(box);
        initImageUpload(box);
    }



    /// drop-effect
    function initDropEffect(box) {
        let area, drop, areaWidth, areaHeight, maxDistance, dropWidth, dropHeight, x, y;

        // get clickable area for drop effect
        area = box.querySelector('.js--image-preview');
        area.addEventListener('click', fireRipple);

        function fireRipple(e) {
            area = e.currentTarget
            // create drop
            if (!drop) {
                drop = document.createElement('span');
                drop.className = 'drop';
                this.appendChild(drop);
            }
            // reset animate class
            drop.className = 'drop';

            // calculate dimensions of area (longest side)
            areaWidth = getComputedStyle(this, null).getPropertyValue("width");
            areaHeight = getComputedStyle(this, null).getPropertyValue("height");
            maxDistance = Math.max(parseInt(areaWidth, 10), parseInt(areaHeight, 10));

            // set drop dimensions to fill area
            drop.style.width = maxDistance + 'px';
            drop.style.height = maxDistance + 'px';

            // calculate dimensions of drop
            dropWidth = getComputedStyle(this, null).getPropertyValue("width");
            dropHeight = getComputedStyle(this, null).getPropertyValue("height");

            // calculate relative coordinates of click
            // logic: click coordinates relative to page - parent's position relative to page - half of self height/width to make it controllable from the center
            x = e.pageX - this.offsetLeft - (parseInt(dropWidth, 10) / 2);
            y = e.pageY - this.offsetTop - (parseInt(dropHeight, 10) / 2) - 30;

            // position drop and animate
            drop.style.top = y + 'px';
            drop.style.left = x + 'px';
            drop.className += ' animate';
            e.stopPropagation();

        }
    }
</script>


<script>
    function updateImagePreviews(imageData) {
        // Update exterior image previews
        for (var i = 1; i <= 5; i++) {
            var extImage = imageData['extimage' + i];
            if (extImage !== '') {
                $('.ext-image-preview-' + i).css('background-image', 'url(<?php echo base_url('upload/room_images/'); ?>' + extImage + ')');
            }
        }

    }
</script>


<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Normal Price
        var normalPriceRange = document.getElementById('normalPrice');
        var normalPriceValue = document.getElementById('normalPriceValue');
        normalPriceValue.textContent = normalPriceRange.value;
        normalPriceRange.addEventListener('input', function() {
            normalPriceValue.textContent = this.value;
        });
        // Discount Price
        var discountPriceRange = document.getElementById('discountPrice');
        var discountPriceValue = document.getElementById('discountPriceValue');
        discountPriceValue.textContent = discountPriceRange.value;
        discountPriceRange.addEventListener('input', function() {
            discountPriceValue.textContent = this.value;
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

