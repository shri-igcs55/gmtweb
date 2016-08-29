
        <div id="page-wrapper" >
          <div id="page-inner">
            <div class="row">
                <div class="col-md-12">
                  <h2 style="margin:0px 15px 0px 15px;">Service Type</h2>   
                </div>
            </div>              
            <!-- /. ROW  -->
            <hr />
            <div class="col-md-12">
              <h3 style="margin:0px 15px 0px 15px;">Add Service Type</h3> 
              <br/>  
            </div>
            <div style="margin:0px 15px 0px 15px;" class="row">
              <?php 
                if($this->session->flashdata('message'))
                {
                    echo $this->session->flashdata('message');
                }
              ?>
              <form role="form" enctype="multipart/form-data" method="post" action="<?php echo site_url('admin/ServiceType/add_service_type');?>">
                <div class="form-group col-md-4">
                  <label>Service Type</label>
                  <input required="" class="form-control" placeholder="Service Type (Ex. House Relocation)" name="service_type" id="service_type" type="text" autofocus/>
                </div><br><br><br>
                <div class="form-group col-md-4">
                  <button class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
            <hr />
            <br><br>
              <div class="col-md-12">
                <h3 style="margin:0px 15px 10px 15px;">List of Service Type</h3> 
                <hr>  
              </div>
            <hr />
            <div style="margin:0px 15px 0px 15px;" class="row">
                <div class="col-md-12">
                  <table id="service_type_list" class="display" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>Sr. No.</th>
                            <th>Service Type</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Sr. No.</th>
                            <th>Service Type</th>
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
                                echo $value['sf_type'];
                              ?>
                            </td>
                            <td>
                              <a onclick="javascript: return confirm('Are you sure to delete this?');" class="btn btn-warning" href="<?php echo site_url('admin/ServiceType/remove_service_type/').$value['sf_id']; ?>">Delete</a>
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
        $('#service_type_list').DataTable();
    } );
    </script>