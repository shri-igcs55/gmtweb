
        <div id="page-wrapper" >
          <div id="page-inner">
            <div class="row">
                <div class="col-md-12">
                  <h2 style="margin:0px 15px 0px 15px;">Description of Work</h2>   
                </div>
            </div>              
            <!-- /. ROW  -->
            <hr />
            <div class="col-md-12">
              <h3 style="margin:0px 15px 0px 15px;">Add Work Description</h3> 
              <br/>  
            </div>
            <div style="margin:0px 15px 0px 15px;" class="row">
              <?php 
                if($this->session->flashdata('message'))
                {
                    echo $this->session->flashdata('message');
                }
              ?>
              <form role="form" enctype="multipart/form-data" method="post" action="<?php echo site_url('admin/workdesc/add_work_desc');?>">
                <div class="form-group col-md-4">
                  <label>Work Description</label>
                  <input required="" class="form-control" placeholder="Work Description (Ex. Construction Work)" name="work_desc" id="work_desc" type="text" autofocus/>
                </div><br><br><br>
                <div class="form-group col-md-4">
                  <button class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
            <hr />
            <br><br>
              <div class="col-md-12">
                <h3 style="margin:0px 15px 10px 15px;">List of Company Types</h3> 
                <hr>  
              </div>
            <hr />
            <div style="margin:0px 15px 0px 15px;" class="row">
                <div class="col-md-12">
                  <table id="work_desc_list" class="display" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>Sr. No.</th>
                            <th>Work Description</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Sr. No.</th>
                            <th>Work Description</th>
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
                                echo $value['dw_type'];
                              ?>
                            </td>
                            <td>
                              <a onclick="javascript: return confirm('Are you sure to delete this?');" class="btn btn-warning" href="<?php echo site_url('admin/workdesc/remove_work_desc/').$value['dw_id']; ?>">Delete</a>
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
        $('#work_desc_list').DataTable();
    } );
    </script>