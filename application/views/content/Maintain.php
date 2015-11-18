    <table id="table" class="table table-striped table-bordered" cellspacing="0">
      <thead>
       <tr>
          <th style="text-align:center" width="140px">Action</th>
          <th style="text-align:center" width=1%>No</th>
          <th style="text-align:center" width="140px">Category</th>
          <th style="text-align:center">Device</th>
          <th style="text-align:center" width="140px">Date</th>
          <th style="text-align:center">Description</th>
          <th style="text-align:center">Special Remark</th>         
        </tr>
      </thead>
      <tbody>
                <?php $no = 1;

                foreach ($data as $row) {

                echo "
                <tr class=\"text-center\">
                  <td>
                      <a style=\"width: 70px\" title=\"Edit\" class=\"btn btn-primary btn-sm\" onclick=\"edit_data($row->id_maintain)\"><i class=\"glyphicon glyphicon-pencil\"></i> Edit</a>
                      <a style=\"width: 70px\" title=\"Delete\" class=\"btn btn-danger btn-sm\" onclick=\"return confirm('Are you sure you want to delete this user?');\" href=\""; echo base_url(); echo "index.php/data/delete_data/$row->id_asset\"><i class=\"glyphicon glyphicon-trash\"></i> Delete</a>
                  </td>
                  <td>$no</td>
                  <td>$row->category_name</td>
                  <td>$row->cost_center"?> <?php echo "- $row->pic</td>
                  <td>$row->date</td>
                  <td>$row->desc</td>
                  <td>$row->remark</td>
                </tr> 
                ";

                $no++;
              }
                ?>
            </tbody>
  </table>

  </body>
  
  <script type="text/javascript">
    
    $(document).ready(function() {
      var table = $('#table').dataTable({
      "scrollX": "1300"
      });
      $('#table tbody').on( 'click', 'tr', function () {
            if ( $(this).hasClass('selected') ) {
                $(this).removeClass('selected');
            }
            else {
                table.$('tr.selected').removeClass('selected');
                $(this).addClass('selected');
            }
        } );
    });

     function add_data()
        {
            $('#form_add_data')[0].reset(); // reset form on modals
            $('#add_data').modal('show'); // show bootstrap modal
            $('.modal-title').text('Add Maintain Record'); // Set Title to Bootstrap modal title
            $('#add_data').on('hidden.bs.modal', function () {
    
          });
        }

    function edit_data(id)
    {
      $('#form_edit_data')[0].reset(); // reset form on modals

      //Ajax Load data from ajax
      $.ajax({
        url : "<?php echo site_url('data/edit_data_maintain/')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
            if (data.id_type==1)
              $('[name="category_name"]').val("Cleaning");
            else if (data.id_type==2)
              $('[name="category_name"]').val("Upgrade / Downgrade");
            else 
              $('[name="category_name"]').val("Service");
            $('[name="id_maintain"]').val(data.id_maintain);
            $('[name="date"]').val(data.date);
            $('[name="desc"]').val(data.desc);
            $('[name="remark"]').val(data.remark);
            

            $('#edit_maintain').modal('show');

            $('.modal-title').text('Edit Maintain Record'); // Set title to Bootstrap modal title           
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });

    }
  </script>


<script type="text/javascript">
        // When the document is ready
            $(document).ready(function () {
                  $('#datepicker').datepicker({
                      format: "yyyy-mm-dd",
                      todayHighlight: true,
                      autoclose: true
                  });
            });
</script>

<script type="text/javascript">
        // When the document is ready
            $(document).ready(function () {
                  $('#datepicker2').datepicker({
                      format: "yyyy-mm-dd",
                      todayHighlight: true,
                      autoclose: true
                  });
            });
</script>
  <!-- Modal Add Asset -->
  <div class="modal fade" id="add_data" role="dialog">
        <div class="modal-dialog">
             <div class="modal-content">
                   <div class="modal-header">
                         <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                         <h3 class="modal-title"></h3>
                   </div>
                   <form id="form_add_data" method="post" class="form-horizontal" action="<?php echo base_url(); ?>index.php/data/add_maintain_record">
                   <div class="modal-body form">
                            <div class="form-body">
                                 <div class="form-group">
                                     <label class="control-label col-md-3">Category</label>
                                         <div class="col-md-9">
                                                <select class="form-control" id="category_selector" name="category_name">
                                                  <option disabled="disabled" selected="selected" value="none">Please Select One!</option>
                                                  <?php foreach($category as $row) { ?>
                                                    <option value="<?php echo $row->category_name; ?>"><?php echo $row->category_name; ?></option>
                                                    <?php } ?>
                                                </select>
                                         </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="control-label col-md-3">Device</label>
                                      <div class="col-md-9">
                                           <select class="form-control" name="id_asset">
                                                  <option disabled="disabled" selected="selected" value="none">Please Select One!</option>
                                                  <?php foreach($asset as $row) { ?>
                                                    <option value="<?php echo $row->id_asset; ?>"><?php echo $row->cost_center; echo " "; echo $row->name; echo " "; echo $row->merk; echo " "; echo $row->type;?></option>
                                                    <?php } ?>
                                           </select>
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="control-label col-md-3">Date</label>
                                      <div class="col-md-9">
                                           <input id="datepicker" type="text" class="form-control" name="date" placeholder="Date Maintain" required="required"/>
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="control-label col-md-3">Description</label>
                                      <div class="col-md-9">
                                           <input type="text" class="form-control" name="desc" placeholder="Description"/>
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="control-label col-md-3">Special Remark</label>
                                      <div class="col-md-9">
                                           <input type="text" class="form-control" name="remark" placeholder="Special Remark"/>
                                      </div>
                                  </div>
                            </div>
                      
                    </div>
                    
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Save</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                    </div>
                  </form>   
              </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
  </div>

<!-- Modal Edit Maintain -->
  <div class="modal fade" id="edit_maintain" role="dialog">
        <div class="modal-dialog">
             <div class="modal-content">
                   <div class="modal-header">
                         <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                         <h3 class="modal-title"></h3>
                   </div>
                   <form id="form_edit_data" method="post" class="form-horizontal" action="<?php echo base_url(); ?>index.php/data/update_data_maintain">
                   <div class="modal-body form">
                        <div class="form-body">
                                  <input type="hidden" value="" name="id_maintain"/>
                                  <div class="form-group">
                                      <label class="control-label col-md-3">Category</label>
                                      <div class="col-md-9">
                                           <select class="form-control" id="category_selector" name="category_name">
                                                  <option disabled="disabled" selected="selected" value="none">Please Select One!</option>
                                                  <?php foreach($category as $row) { ?>
                                                    <option value="<?php echo $row->category_name; ?>"><?php echo $row->category_name; ?></option>
                                                    <?php } ?>
                                            </select>
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="control-label col-md-3">Date</label>
                                      <div class="col-md-9">
                                           <input id="datepicker2" type="text" class="form-control" name="date" placeholder="Date Maintain" required="required"/>
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="control-label col-md-3">Descrption</label>
                                      <div class="col-md-9">
                                           <input type="text" class="form-control" name="desc" placeholder="Description"/>
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="control-label col-md-3">Special Remarks</label>
                                      <div class="col-md-9">
                                          <input type="text" class="form-control" id="yearpicker2" name="remark" placeholder="Special Remark"/>
                                      </div>
                                  </div> 
                            </div> 
                    </div>
                    
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Save</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                    </div>
                  </form>   
              </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
  </div>

  <script type="text/javascript">
      function create_report()
        {
            $('#form_create_report')[0].reset(); // reset form on modals
            $('#create_report').modal('show'); // show bootstrap modal
            $('.modal-title').text('Create Report'); // Set Title to Bootstrap modal title
            $('#add_data').on('hidden.bs.modal', function () {
    
          });
        }
  </script>

  <script type="text/javascript">
    $(document).ready(function() {
          $('#category_report').on('change.report', function() {
            $("#report_id_category").toggle($(this).val() == 'id_category');
            $("#report_maintain_date").toggle($(this).val() == 'maintain_date');            
           }).trigger('change.report');
    });
  </script>

  <script type="text/javascript">
    // When the document is ready
      $(document).ready(function () {
                
        $('.input-daterange').datepicker({
            format: "yyyy-mm-dd",
            todayHighlight: true,
            autoclose: true
        });         
    });
  </script>

  <!-- Modal Create Report -->
  <div class="modal fade" id="create_report" role="dialog">
        <div class="modal-dialog">
             <div class="modal-content">
                   <div class="modal-header">
                         <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                         <h3 class="modal-title"></h3>
                   </div>
                   <form id="form_create_report" method="post" class="form-horizontal" action="<?php echo base_url(); ?>index.php/report/maintain">
                   <div class="modal-body form">
                            <div class="form-body">
                                 <div class="form-group">
                                     <label class="control-label col-md-3">Category</label>
                                         <div class="col-md-9">
                                                <select class="form-control" id="category_report" name="category_report">
                                                  <option disabled="disabled" selected="selected">Please Select One!</option>
                                                  <option value="id_category">By Maintain Category</option>
                                                  <option value="maintain_date">By Maintain Date</option>
                                                  <option value="remark">By Special Remark</option>
                                               </select>
                                         </div>
                                  </div>
                                  
                                  <div id="report">
                                      <div id="report_id_category">
                                          <div class="form-group">
                                              <label class="control-label col-md-3">Select Maintain Category</label>
                                              <div class="col-md-9">
                                                   <select class="form-control" name="report_by_maintain_category">
                                                      <option disabled="disabled" selected="selected">Please Select One!</option>
                                                      <?php foreach($category as $row) { ?>
                                                        <option value="<?php echo $row->category_name; ?>"><?php echo $row->category_name; ?></option>
                                                      <?php } ?>
                                                    </select>
                                              </div>
                                          </div>
                                                                    
                                      </div>

                                      <div id="report_maintain_date">
                                          <div class="form-group">
                                             <label class="control-label col-md-3">Select Date</label>
                                                <div class="col-md-9">
                                                   <div class="input-daterange">
                                                      <input type="text" class="input-small" name="start"/> 
                                                      <span class="add-on">to</span>
                                                      <input type="text" class="input-small" name="end" />                    
                                                  </div>
                                                </div>
                                          </div>                      
                                      </div>
                                  </div>
                            </div>
                      
                    </div>
                    
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">GO!</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                    </div>
                  </form>   
              </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
  </div>