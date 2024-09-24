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

                            <!-- <a href="unapproved_room_type_list"><button class="btn bg-gradient-warning btn-sm mb-0" type="button">unapproved list </button></a> -->
                                <a href="room_type_creation" class="btn bg-gradient-dark btn-sm mb-0">+ Add Room Type</a>

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
                                    <th class="  text-uppercase text-secondary text-xs font-weight-bolder text-center">Status</th>
                                    <th class="  text-uppercase text-secondary text-xs font-weight-bolder text-center">Action</th>
                                </tr>
                            </thead>
                          
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
        <td class="align-middle text-center text-sm">
            <!-- Display status switch -->
            <div class="form-check form-switch">
                <!-- <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" checked=""> -->
<input class="form-check-input text-center room-status-switch" type="checkbox" id="regionToggle_<?php echo $type->roomid; ?>" <?php echo ($type->status == 1) ? 'checked' : ''; ?> data-region-id="<?php echo $type->roomid; ?>"> 
            </div>
        </td>
        <td class="text-sm text-center">
            <!-- Display edit button -->
            <a href="<?php echo base_url();?>roomtype_edit/<?=$type->roomid;?>" class="mx-3" data-bs-toggle="tooltip" data-bs-original-title="Edit Category">
                <i class="material-icons text-success position-relative text-lg">drive_file_rename_outline</i>
            </a> 
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

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

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



<script>
    $(document).ready(function() {
        $(document).on('change', '.room-status-switch', function() {
            var roomId = $(this).data('region-id');
             var status = this.checked ? 1 : 0;

        $.ajax({
            url: '<?php echo base_url("update_statusroomtype"); ?>',
            method: 'POST',
            data: { room_id: roomId, status: status }, // Send room_id and status as data
            success: function(response) {
                var data = JSON.parse(response);
                if (data.success) {
                        // Reload the DataTable to reflect changes across all pages
                        // $('#category-list').DataTable().ajax.reload();
                        location.reload();
                    }
                },
                error: function(xhr, status, error) {
                    console.error(error); // Output error message to console
                }
            });
        });

        // Initialize DataTable
        const dataTable = new simpleDatatables.DataTable("#category-list", {
            searchable: true,
            fixedHeight: false,
            perPage: 7
        });

        // Add event listener for export button
        document.querySelectorAll(".export").forEach(function(el) {
            el.addEventListener("click", function(e) {
                var type = el.dataset.type;
                var data = {
                    type: type,
                    filename: "category list " + type,
                };

                if (type === "csv") {
                    // data.columnDelimiter = "|";
                }

                dataTable.export(data);
            });
        });
    });
</script>