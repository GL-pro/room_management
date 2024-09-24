<div class="container-fluid py-1 mb-6 vh-100">
     <div class="row">
         <div class="col-12">

             <div class="row  ">
                 <div class="col-12  m-auto ">
                     <div class="card">
                         <div class="card-body">
                             <form action="">

                                 <div class="border-radius-xl bg-white">

                                     <div class="d-lg-flex">
                                         <div class="mb-2">
                                             <h5 class="font-weight-bolder mb-0"> Facilitys </h5>
                                             <p class="mb-0 text-sm">Facilitys which is available in hotels.</p>
                                         </div>

                                         <div class="ms-auto my-auto mt-lg-0 mt-4">
                                             <div class="ms-auto my-auto">
                                             <!-- <a href="unapproved_facilities_list"><button class="btn bg-gradient-warning btn-sm mb-0" type="button">unapproved list </button></a> -->
                                                 <a href="hotel_add_facility"><button class="btn bg-gradient-dark btn-sm mb-0" type="button">+&nbsp;Facilitys </button></a>

                                             </div>
                                         </div>
                                     </div>

                                     <div class=" "> 

                                     <?php foreach ($facilities as $facility): ?>
                                <div class="card mt-2">
                                    <div class="card-body">
                                        <div class="d-lg-flex">
                                            <div>
                                            <h6 class="font-weight-bolder mb-0"><?php echo $facility['facilityname']; ?></h6>
                                            </div>
                                            <div class="ms-auto my-auto mt-lg-0 mt-4">
                                                <div class="ms-auto my-auto">
                                                    <a href="<?php echo base_url();?>facilities_edit/<?=$facility['facilityid'];?>"><button class="btn bg-gradient-light btn-sm mb-0" type="button">Edit</button></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mt-3 p-0">
                                            <div class="col-12 p-0">
                                                <div class="d-flex flex-wrap">
                                                    <?php $sub_facilities = $this->HomeModel->get_subfacilities($facility['facilityid']); ?>
                                                    <?php if ($sub_facilities): ?>
                                                        <?php foreach ($sub_facilities as $sub_facility): ?>
                                                            <div class="ps-2 col-12 col-md-3">
                                                                <label class=""><?php echo $sub_facility['subfacilityname']; ?></label>
                                                            </div>
                                                        <?php endforeach; ?>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                                                    
                                         
                                         
                                        </div>
                                 </div>

                                 <div class="button-row d-flex mt-4">
                                     <!-- <a href=" " class="ms-auto mb-0">
                                         <button class="ms-auto mb-0 px-6 btn bg-gradient-dark " type="button" title="submit">Submit</button></a>
                                 </div> -->
                             </form>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </div>