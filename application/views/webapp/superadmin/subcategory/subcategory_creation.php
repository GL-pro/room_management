 <div class="container-fluid py-1 mb-6 vh-100">
     <div class="row">
         <div class="col-12">
             <div class="row  ">
                 <div class="col-12  m-auto ">
                     <div class="card">
                         <div class="card-body">
                         <form action="<?php echo base_url(); ?>subcategory_reg" method="post" enctype="multipart/form-data">
                                 <div class="border-radius-xl bg-white">
                                     <h5 class="font-weight-bolder mb-2">Subcategory Creation</h5>

                                     <div class=" "> 
                                         <div class="row mt-3">
                                             <div class="col-12 col-sm-6">
                                                 <div class="input-group input-group-static ">
                                                     <label class=" "> Subcategory</label>
                                                     <input class="form-control" name="roomtypename" type="text" placeholder="Subcategory Name" required/>
                                                 </div>
                                             </div> 
                                             

                                             <div class="col-12 col-sm-6">
                                                <div class="input-group input-group-static">
                                                    <label>Category</label>
                                                    <select class="form-control" name="category_id" required>
                                                        <option value="">Select Category</option>
                                                        <?php foreach ($categories as $category): ?>
                                                            <option value="<?php echo $category['category_id']; ?>">
                                                                <?php echo $category['category_name']; ?>
                                                            </option>
                                                        <?php endforeach; ?>
                                                    </select>
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
                                     </div>
                                 </div>

                                 <div class="row mt-5">
                                     <h5 class="font-weight-bolder mb-0"> Status</h5>
                                     <div class="col-12 col-sm-6 mt-3">
                                         <div class="form-check form-switch">
                                             <input class="form-check-input" type="checkbox" id="active-inactive" checked="">
                                             <label class="form-check-label" for="active-inactive">Active Or Inactive</label>
                                         </div>
                                     </div>
                                 </div>

                                <!-- region status toggle -->
                                    <input type="hidden" id="status" name="status" value="1">
                                <!-- region status toggle -->

                                    <div class="button-row d-flex mt-4">
                                        <a href="all_room_type" class="ms-auto mb-0">
                                            <button class="ms-auto mb-0 px-6 btn bg-gradient-dark " type="submit" title="submit" data-bs-toggle="modal" data-bs-target="#modal-coordinator">Submit</button></a>
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
     }; 
 </script>

 <!-- region status toggle -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#active-inactive').change(function() {
            var status = $(this).prop('checked') ? 1 : 0; // Get status based on toggle switch
            $('#status').val(status); // Set the value of the hidden input field dynamically
        });
    });
</script>
<!-- region status toggle -->


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

