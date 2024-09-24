<div class="container-fluid py-1 mb-6 vh-100">
    <div class="row">
        <div class="col-12">
            <div class="row">
                <div class="col-12 m-auto">
                    <div class="card">
                        <div class="card-body">
                            <form action="<?php echo base_url(); ?>subcategoryupdate" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="subcategory_id" value="<?php echo $subcategorys[0]->subcategory_id; ?>">
                                <div class="border-radius-xl bg-white">
                                    <h5 class="font-weight-bolder mb-2">Subcategorys</h5>
                                    <div class="">
                                        <div class="row mt-3">
                                            <div class="col-12 col-sm-6">
                                                <div class="input-group input-group-static">
                                                    <label class="">Subcategory</label>
                                                    <input class="form-control" name="roomtypename" value="<?php echo $subcategorys[0]->subcategory_name; ?>" type="text" placeholder="Item Name" required />
                                                </div>
                                            </div>


                                            <div class="col-12 col-sm-6 mt-3">
                                                <div class="input-group input-group-static">
                                                    <label>Category</label>
                                                    <select class="form-control" id="choices_category" name="category_id" required>
                                                        <?php foreach ($categories as $category): ?>
                                                            <option value="<?php echo $category['category_id']; ?>" <?php echo $category['category_id'] == $subcategorys[0]->category_id ? 'selected' : ''; ?>>
                                                                <?php echo $category['category_name']; ?>
                                                            </option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                            </div>

                                                        </br>
                                                        
                                                        </br>
                                            <div class="col-12 col-sm-6">
                                                <div class="input-group input-group-dynamic">
                                                    <div class="input-group input-group-static">
                                                        <label>Subcategory Image</label>
                                                        <div class="mb-3">
                                                            <?php if (!empty($subcategorys[0]->subcategory_image)): ?>
                                                                <img src="<?php echo base_url('upload/subcategory_images/' . $subcategorys[0]->subcategory_image); ?>" alt="Type Image" style="max-width: 200px;" id="currentTypeImage">
                                                            <?php else: ?>
                                                                <p>No image uploaded for this Item.</p>
                                                                <img id="currentTypeImage" style="max-width: 200px;">
                                                            <?php endif; ?>
                                                        </div>
                                                        <input type="hidden" name="existing_type_image" value="<?php echo $subcategorys[0]->subcategory_image; ?>">
                                                        <div class="mb-3">
                                                            <label for="typeImageInput" class="form-label">Upload New Image</label>
                                                            <input class="form-control" id="typeImageInput" name="roomtype_image" type="file" accept="image/*" onchange="previewTypeImage(event)" <?php echo empty($subcategorys[0]->subcategory_image) ? 'required' : ''; ?>>
                                                        <div id="image-validation-message" class="text-danger mt-2" style="display: none;">Invalid image type. Please upload a .jpg, .jpeg, or .png file.</div>                                               
                                                        </div>                                                       
                                                        <script>
                                                            function previewTypeImage(event) {
                                                                var reader = new FileReader();
                                                                reader.onload = function() {
                                                                    var output = document.getElementById('currentTypeImage');
                                                                    output.src = reader.result;
                                                                }
                                                                reader.readAsDataURL(event.target.files[0]);
                                                            }
                                                        </script>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-5">
                                    <h5 class="font-weight-bolder mb-0">Status</h5>
                                    <div class="col-12 col-sm-6 mt-3">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" id="active-inactive" <?php echo $subcategorys[0]->status ? 'checked' : ''; ?>>
                                            <label class="form-check-label" for="active-inactive">Active Or Inactive</label>
                                        </div>
                                    </div>
                                </div>
                                <input type="hidden" id="status" name="status" value="<?php echo $subcategorys[0]->status; ?>">
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
    <script>
    if (document.getElementById('choices_category')) {
        var element = document.getElementById('choices_category');
        const example = new Choices(element, {
            searchEnabled: true,
            shouldSort: false,
        });
    }
    </script>
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#active-inactive').change(function() {
                var status = $(this).prop('checked') ? 1 : 0; // Get status based on toggle switch
                $('#status').val(status); // Set the value of the hidden input field dynamically
            });
        });
    </script>
   
    <script>
    // Handle file upload validation
    $('#typeImageInput').on('change', function() {
        var file = this.files[0];
        var fileType = file ? file.type : '';
        var validTypes = ['image/jpeg', 'image/png'];
        if (file && !validTypes.includes(fileType)) {
            $('#image-validation-message').show(); // Show image type validation message
            $(this).val(''); // Clear the file input
        } else {
            $('#image-validation-message').hide(); // Hide image type validation message
        }
    });
    </script>
    
