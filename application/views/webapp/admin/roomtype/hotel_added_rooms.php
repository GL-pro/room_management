<div class="container-fluid py-1 mb-6">
    <div class="row">
        <div class="col-12">
            <div class="card">

                <div class="card-header pb-0">
                    <div class="d-lg-flex">
                        <div>
                            <h5 class="mb-0">Rooms </h5>

                        </div>

                        <div class="ms-auto my-auto mt-lg-0 mt-4">
                            <div class="ms-auto my-auto">

                                <a href="hotel_room_add" class="btn bg-gradient-dark btn-sm mb-0">+ Add Rooms</a> 
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-body px-0 pb-0">
                    <div class="table-responsive">
                        <table class="table table-flush" id="room-list">
                            <thead class="thead-light">
                                <tr>
                                    <th class="  text-uppercase text-secondary text-xs font-weight-bolder w-10">sl/no</th>
                                    <th class="  text-uppercase text-secondary text-xs font-weight-bolder ">Rooms Name</th> 
                                    <th class="  text-uppercase text-secondary text-xs font-weight-bolder ">Type of Rooms </th> 
                                    <th class="  text-uppercase text-secondary text-xs font-weight-bolder ">No:- of Rooms </th> 
                                    <th class="  text-uppercase text-secondary text-xs font-weight-bolder ">Normal price </th> 
                                    <th class="  text-uppercase text-secondary text-xs font-weight-bolder ">Discount price </th> 
                                    <th class="  text-uppercase text-secondary text-xs font-weight-bolder text-center w-10">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="w-10">
                                        <p class="text-xs font-weight-bold mb-0">1</p>
                                    </td>
                                    <td class=""> 
                                            <h6 class="ms-3 my-auto text-wrap text-break">Rooms Name</h6> 
                                    </td> 
                                    <td class=""> 
                                            <h6 class="ms-3 my-auto text-wrap text-break">Type of Rooms</h6> 
                                    </td> 
                                    <td class=""> 
                                            <h6 class="ms-3 my-auto text-wrap text-break">No:- of Rooms</h6> 
                                    </td> 
                                    <td class=""> 
                                            <h6 class="ms-3 my-auto text-wrap text-break">Normal price </h6> 
                                    </td> 
                                    <td class=""> 
                                            <h6 class="ms-3 my-auto text-wrap text-break">Discount price </h6> 
                                    </td> 
                                    <td class="text-sm text-center w-10">
                                        <a href="hotel_room_add" class="mx-3" data-bs-toggle="tooltip" data-bs-original-title="Edit Rooms">
                                            <i class="material-icons text-success position-relative text-lg">drive_file_rename_outline</i>
                                        </a> 
                                    </td>

                                </tr> 
                                
                            </tbody>
                        </table>
                    </div>
                </div>

                
            </div>
        </div>
    </div>
</div>
<script src="assets2/js/plugins/datatables.js"></script> 


<script>
    if (document.getElementById('room-list')) {
        const dataTableSearch = new simpleDatatables.DataTable("#room-list", {
            searchable: true,
            fixedHeight: false,
            perPage: 20
        });

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

                dataTableSearch.export(data);
            });
        });
    };
</script>