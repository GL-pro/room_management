<div class="container-fluid py-1 mb-6">
    <div class="row">
        <div class="col-12">
            <div class="card">

                <div class="card-header pb-0">
                    <div class="d-lg-flex">
                        <div>
                            <h5 class="mb-0">Room Type List </h5>

                        </div>

                        <div class="ms-auto my-auto mt-lg-0 mt-4">
                            <div class="ms-auto my-auto"> 

                                <button class="btn btn-outline-dark btn-sm export mb-0 mt-sm-0 mt-1" data-type="csv" type="button" name="button">Download</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-body px-0 pb-0">
                    <div class="table-responsive">
                        <table class="table table-flush" id="sub-category-list">
                            <thead class="thead-light">
                                <tr>
                                    <th class="  text-uppercase text-secondary text-xs font-weight-bolder ">sl/no</th>
                                    <th class="  text-uppercase text-secondary text-xs font-weight-bolder ">Room Type</th>  
                                    <th class="  text-uppercase text-secondary text-xs font-weight-bolder text-center">Action</th>
                                </tr>
                            </thead>
                            <!-- <tbody>
                                <tr>
                                    <td>
                                        <p class="text-xs font-weight-bold mb-0">1</p>
                                    </td>
                                    <td>
                                        <div class="d-flex"> 
                                            <h6 class="ms-3 my-auto">Room Type</h6>
                                        </div>
                                    </td>  
                                    <td class="text-sm text-center">
                                    <button type="button" class="btn btn-primary btn-sm text-xs">approve</button> 
                                    </td>

                                </tr> 
                                 
                            </tbody> -->

                            <tbody>
    <?php foreach ($room_type as $index => $type): ?>
    <tr>
        <td>
            <p class="text-xs font-weight-bold mb-0"><?php echo $index + 1; ?></p>
        </td>
        <td>
            <div class="d-flex">
                <!-- Display room type name -->
                <h6 class="ms-3 my-auto"><?php echo $type->roomtype; ?></h6>
            </div>
        </td>
        <td class="text-sm text-center">
            <!-- Display approve button -->
            <!-- <button type="button" class="btn btn-primary btn-sm text-xs">Approve</button>  -->
            <a href="<?php echo base_url();?>approve_roomtype/<?=$type->roomid;?>" class="btn btn-primary btn-sm text-xs"> Approve</a> 
        </td>
    </tr>
    <?php endforeach; ?>
</tbody>



                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="assets2/js/plugins/datatables.js"></script>
<script src="assets2/js/plugins/choices.min.js"></script>


<script>
    if (document.getElementById('sub-category-list')) {
        const dataTableSearch = new simpleDatatables.DataTable("#sub-category-list", {
            searchable: true,
            fixedHeight: false,
            perPage: 7
        });

        document.querySelectorAll(".export").forEach(function(el) {
            el.addEventListener("click", function(e) {
                var type = el.dataset.type;

                var data = {
                    type: type,
                    filename: "sub-category list " + type,
                };

                if (type === "csv") {
                    // data.columnDelimiter = "|";
                }

                dataTableSearch.export(data);
            });
        });
    };
</script>