
        <div id="page-wrapper" >
          <div id="page-inner">
            <div class="row">
                <div class="col-md-12">
                  <h2 style="margin:0px 15px 0px 15px;">Vehicle Types</h2>   
                </div>
            </div>              
            <!-- /. ROW  -->
            <hr />
            <div class="col-md-12">
              <h3 style="margin:0px 15px 10px 15px;">Add Vehicle Types</h3> 
              <br>  
            </div>
            <div style="margin:0px 15px 0px 15px;" class="row">
              <?php 
                if($this->session->flashdata('message'))
                {
                    echo $this->session->flashdata('message');
                }
              ?>
              <form role="form" enctype="multipart/form-data" method="post" action="<?php echo site_url('admin/vehicle/add_vehicle');?>">
                <div class="form-group col-md-4">
                  <label>Vehicle Type</label>
                  <input required="" class="form-control" placeholder="Vehicle Type (Ex. Tata Pickup 407)" name="vehicle_type" id="vehicle_type" type="text" autofocus/>
                </div>
                <div class="form-group col-md-4">
                  <label>Vehicle Image</label>
                  <input required="" class="form-control" name="vehicle_img" id="vehicle_img" type="file" autofocus/>
                </div><br><br><br><br>
                <div class="form-group col-md-4">
                  <button class="btn btn-primary">Submit</button>
                </div>
              </form>
	          </div>
            <hr />
            <br><br>
              <div class="col-md-12">
                <h3 style="margin:0px 15px 10px 15px;">List of Vehicle Types</h3> 
                <hr>  
              </div>
            <hr />
            <div style="margin:0px 15px 0px 15px;" class="row">
                <div class="col-md-12">
                  <table id="vehicle_list" class="display" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>Sr. No.</th>
                            <th>Vehicle Name</th>
                            <th>Vehicle Image</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Sr. No.</th>
                            <th>Vehicle Name</th>
                            <th>Vehicle Image</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                      <?php 
                        $v = 1;
                        foreach ($view_data as $key => $value) {
                      ?>
                        <tr>
                            <td>
                              <?php 
                                echo $v;
                              ?>
                            </td>
                            <td>
                              <?php
                                echo $value['vehicle_typ'];
                              ?>
                            </td>
                            <td style="width:35%">
                              <a target="blank" href="<?php echo base_url('uploads/vehicle/').$value['vehicle_img'];?>"><img style="width:20%;height:20%;" src="<?php echo base_url('uploads/vehicle/').$value['vehicle_img'];?>"></a>                         
                            </td>
                            <td>
                            <a class="btn btn-warning" 
            onclick="javascript: return confirm('Are you sure to delete this?');" href="<?php echo site_url('admin/vehicle/remove_vehicle/').$value['vehicle_id']; ?>">Delete</a>
                            </td>
                        </tr>
                      <?php
                        $v++;
                        }
                      ?>  
                    </tbody>
                </table>
              </div>
            </div>
            <!-- /. ROW  -->           
          </div>
          <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    
    <script type="text/javascript">
    $(document).ready(function() {
        $('#vehicle_list').DataTable();
    } );
    </script>