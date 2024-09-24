 <div class="container-fluid py-1 mb-6 vh-100">
     <div class="row">
         <div class="col-12">

             <div class="row  ">
                 <div class="col-12  m-auto ">
                     <div class="card">
                         <div class="card-body">
                            <form action="<?php echo base_url(); ?>item_reg" method="post" enctype="multipart/form-data">
                                <div class="border-radius-xl bg-white">
                                    <h5 class="font-weight-bolder mb-2">Item Creation</h5>
                                    <div class="">
                                        <div class="row mt-3">
                                            <!-- Category Dropdown -->
                                         <div class="col-12 col-sm-6">
                                            <div class="input-group input-group-static">
                                                <label>Category</label>
                                                <select class="form-control" name="category_id" id="category" required>
                                                    <option value="">Select Category</option>
                                                    <?php foreach ($categories as $category): ?>
                                                        <option value="<?php echo $category->category_id; ?>">
                                                            <?php echo $category->category_name; ?>
                                                        </option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6">
                                            <div class="input-group input-group-static">
                                                <label>Subcategory</label>
                                                <select class="form-control" name="subcategory_id" id="subcategory" required>
                                                    <option value="">Select subCategory</option>
                                                    <?php foreach ($subcategories as $subcategory): ?>
                                                        <option value="<?php echo $subcategory->subcategory_id; ?>">
                                                            <?php echo $subcategory->subcategory_name; ?>
                                                        </option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>
                                        </div>

                                        <div class="row mt-3">
                                            <div class="col-12 col-sm-6">
                                                <div class="input-group input-group-static">
                                                    <label>Item</label>
                                                    <input class="form-control" name="roomtypename" type="text" placeholder="Item Name" required />
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-6">
                                                <div class="input-group input-group-static">
                                                    <label>Image Upload</label>
                                                    <input class="form-control custom-file-upload mt-2" name="roomtype_image" type="file" accept="image/*" id="facilityImageInput" onchange="previewFacilityImage(event)" required>
                                                    <div class="mt-2">
                                                        <img id="facilityImagePreview" style="max-width: 200px; display: none;" alt="Image Preview" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mt-3">
                                            <div class="col-12 col-sm-6">
                                                <div class="input-group input-group-static">
                                                    <label>Price1</label>
                                                    <input class="form-control" name="price1" type="text" placeholder="Price1" required />
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-6">
                                                <div class="input-group input-group-static">
                                                    <label>Price2</label>
                                                    <input class="form-control" name="price2" type="text" placeholder="Price2" required />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mt-3">
                                            <div class="col-12 col-sm-6">
                                                <div class="input-group input-group-static">
                                                    <label>Tax</label>
                                                    <input class="form-control" name="tax" type="text" placeholder="Tax" required />
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-6">
                                                <div class="input-group input-group-static">
                                                    <label>Description</label>
                                                    <input class="form-control" name="description" type="text" placeholder="Description" required />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mt-3">
                                            <div class="col-12 col-sm-6">
                                                <div class="input-group input-group-static">
                                                    <label>Available</label>
                                                    <select class="form-control" name="availability" required>
                                                        <option value="" disabled selected>Select availability</option>
                                                        <option value="yes">Yes</option>
                                                        <option value="no">No</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>


                                   </div>
                                </div>
                                <div class="row mt-5">
                                    <h5 class="font-weight-bolder mb-0">Status</h5>
                                    <div class="col-12 col-sm-6 mt-3">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" id="active-inactive" checked>
                                            <label class="form-check-label" for="active-inactive">Active Or Inactive</label>
                                        </div>
                                    </div>
                                </div>
                                <input type="hidden" id="status" name="status" value="1">
                                <div class="button-row d-flex mt-4">
                                    <a href="all_room_type" class="ms-auto mb-0">
                                        <button class="ms-auto mb-0 px-6 btn bg-gradient-dark" type="submit" title="submit" data-bs-toggle="modal" data-bs-target="#modal-coordinator">Submit</button>
                                    </a>
                                </div>
                            </form>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </div>

 <script src="assets2/js/plugins/choices.min.js"></script>
 <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<script>
    function previewFacilityImage(event) {
        var reader = new FileReader();
        reader.onload = function() {
            var output = document.getElementById('facilityImagePreview');
            output.src = reader.result;
            output.style.display = 'block'; // Show the image preview
        }
        reader.readAsDataURL(event.target.files[0]);
    }
</script>


<script>
$(document).ready(function() {
    $('#category').change(function() {
        var category_id = $(this).val();
        if (category_id) {
            $.ajax({
                url: "<?php echo base_url(); ?>Superadmin/get_subcategories",
                type: "POST",
                data: {category_id: category_id},
                dataType: "json",
                success: function(data) {
                    console.log(data); // Check if data is being logged correctly
                    $('#subcategory').empty(); // Clear existing options
                    $('#subcategory').append('<option value="">Select Subcategory</option>');
                    $.each(data, function(key, value) {
                        $('#subcategory').append('<option value="'+ value.subcategory_id +'">'+ value.subcategory_name +'</option>');
                    });
                },
                error: function() {
                    alert('Error retrieving subcategories.');
                }
            });
        } else {
            $('#subcategory').empty();
            $('#subcategory').append('<option value="">Select Subcategory</option>');
        }
    });
});
</script>

