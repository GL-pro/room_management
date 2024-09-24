<div class="container-fluid py-1 mb-6">
    <div class="row">
        <div class="col-12 ">
            <div class="card mb-3">
                <div class="card-body">
                <form action="<?php echo base_url(); ?>saveFacility" method="post">

                        <div class="border-radius-xl bg-white">
                            <h5 class="font-weight-bolder mb-2">Facility</h5>
                            <div class=" ">
                                <div class="row mt-4">
                                    <div class="col-12 col-sm-6">
                                        <div class="input-group input-group-dynamic">
                                            <div class="input-group input-group-static ">
                                                <label class=" "> Facility  </label>
                                                <input class="form-control" type="text" name=facilityname placeholder="Facility Name" required />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="border-radius-xl bg-white mt-4">
                            <div class="d-lg-flex">
                                <div>
                                    <h5 class="font-weight-bolder mb-0">Sub Facility </h5>
                                </div>
                                <div class="ms-auto my-auto mt-lg-0 mt-4">
                                    <div class="ms-auto my-auto"> 
                                        <button class="btn bg-gradient-primary btn-sm mb-0" type="button" onclick="addSubFacility()" >+&nbsp; Add </button></a>
                                    </div>
                                </div>
                            </div>
                            <div class="">
                                <div class="row sub-facility-container ">
                                    <div class="col-12 col-sm-6 mt-3 sub-facility-row">
                                        <div class="input-group input-group-static ">
                                            <label class=" "> Sub Facility</label>
                                            <input class="  form-control" type="text"  name="subfacilityname[]" placeholder="Sub Facility Name" required/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="  mt-3">
                            <div class="button-row d-flex">
                                <a href="hotel_facilitys" class="ms-auto mb-0">
                                <button class=" px-6 btn bg-gradient-dark" title="submit" type="submit">Save</button>
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    function addSubFacility() {
        // Create a new set of input fields for sub facility
        var newSubFacility = $('.sub-facility-row:first').clone();

        // Clear the input field in the new set
        newSubFacility.find('input[type="text"]').val('');

        // Append the new set to the container
        $('.sub-facility-container').append(newSubFacility);
    }
</script>