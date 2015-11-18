   
    <table id="table" class="table table-striped table-bordered" cellspacing="0">
      <thead>
       <tr>
          <th style="text-align:center" width="140px">Action</th>
          <th style="text-align:center" width=1%>No</th>
          <th style="text-align:center" width="140px">Category</th>
          <th style="text-align:center">SN</th>
          <th style="text-align:center">Name</th>
          <th style="text-align:center">Merk</th>
          <th style="text-align:center">Type</th>
          <th style="text-align:center">Year</th>
          <th style="text-align:center">Cost Center</th>
          <th style="text-align:center">PIC</th>
          <th style="text-align:center">Room</th>
          <th style="text-align:center">OS</th>
          <th style="text-align:center">RAM</th>
          <th style="text-align:center">HDD</th>
          <th style="text-align:center">Processor</th>
          <th style="text-align:center">IP</th>
          <th style="text-align:center">Port</th>          
        </tr>
      </thead>
      <tbody>

                <?php $no = 1;

                foreach ($data as $row) {

                echo "
                
                <tr class=\"text-center\">
                  <td>
                      <a style=\"width: 70px\" title=\"Edit\" class=\"btn btn-primary btn-sm\" onclick=\"edit_data($row->id_asset)\"><i class=\"glyphicon glyphicon-pencil\"></i> Edit</a>
                      <a style=\"width: 70px\" title=\"Delete\" class=\"btn btn-danger btn-sm\" onclick=\"return confirm('Are you sure you want to delete this user?');\" href=\""; echo base_url(); echo "index.php/data/delete_data/$row->id_asset\"><i class=\"glyphicon glyphicon-trash\"></i> Delete</a>
                  </td>
                  <td>$no</td>
                  <td>$row->category_name</td>
                  <td>$row->sn</td>
                  <td>$row->name</td>
                  <td>$row->merk</td>
                  <td>$row->type</td>
                  <td>$row->year</td>
                  <td>$row->cost_center</td>
                  <td>$row->pic</td>
                  <td>$row->room</td>
                  <td>$row->os</td>
                  <td>$row->ram</td>
                  <td>$row->hdd</td>
                  <td>$row->processor</td>
                  <td>$row->ip</td>
                  <td>$row->port</td>
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
      "scrollX": 2400,
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
            $('.modal-title').text('Add Data'); // Set Title to Bootstrap modal title
            $('#add_data').on('hidden.bs.modal', function () {
    
          });
        }

    function edit_data(id)
    {
      $('#form_edit_data')[0].reset(); // reset form on modals

      //Ajax Load data from ajax
      $.ajax({
        url : "<?php echo site_url('data/edit_data/')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
            $('[name="id_asset"]').val(data.id_asset);
            $('[name="sn"]').val(data.sn);
            $('[name="name"]').val(data.name);
            $('[name="merk"]').val(data.merk);
            $('[name="type"]').val(data.type);
            $('[name="year"]').val(data.year);
            $('[name="cost_center"]').val(data.cost_center);
            $('[name="pic"]').val(data.pic);
            $('[name="room"]').val(data.room);
            $('[name="os"]').val(data.os);
            $('[name="ram"]').val(data.ram);
            $('[name="hdd"]').val(data.hdd);
            $('[name="processor"]').val(data.processor);
            $('[name="ip"]').val(data.ip);
            $('[name="port"]').val(data.port);

            if (data.id_category==1) 
                $('#edit_pc').modal('show');
            else if (data.id_category==2)
                $('#edit_printer').modal('show');
            else if (data.id_category==5)
                $('#edit_network').modal('show');
             else 
                $('#edit_other').modal('show');

            $('.modal-title').text('Edit Data Asset'); // Set title to Bootstrap modal title           
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });

    }

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
          $('#category_selector').on('change.category', function() {
            $("#none").toggle($(this).val() == 'none');
            $("#desktop").toggle($(this).val() == 'PC Desktop');
            $("#printer").toggle($(this).val() == 'Printer');
            $("#scanner").toggle($(this).val() == 'Scanner');
            $("#ups").toggle($(this).val() == 'UPS');
            $("#network").toggle($(this).val() == 'Network Device');
            $("#cctv").toggle($(this).val() == 'CCTV Device');
           }).trigger('change.category');
    });
</script>

<script type="text/javascript">
    $(document).ready(function() {
          $('#printer_category').on('change.lan', function() {
            $("#yes").toggle($(this).val() == 'yes');
           }).trigger('change.lan');
    });
</script>

<script type="text/javascript">
        // When the document is ready
            $(document).ready(function () {
                  $('#yearpicker').datepicker({
                      format: "yyyy",
                      minViewMode: 2,
                      autoclose: true
                  });

                  $('#yearpicker2').datepicker({
                      format: "yyyy",
                      minViewMode: 2,
                      autoclose: true
                  });

                  $('#yearpicker3').datepicker({
                      format: "yyyy",
                      minViewMode: 2,
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
                   <form id="form_add_data" method="post" class="form-horizontal" action="<?php echo base_url(); ?>index.php/data/add_data">
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
                                      <label class="control-label col-md-3">Serial Number</label>
                                      <div class="col-md-9">
                                           <input type="text" class="form-control" name="sn" placeholder="Serial Number" required="required"/>
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="control-label col-md-3">Name</label>
                                      <div class="col-md-9">
                                           <input type="text" class="form-control" name="name" placeholder="Name" required="required"/>
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="control-label col-md-3">Merk</label>
                                      <div class="col-md-9">
                                           <input type="text" class="form-control" name="merk" placeholder="Merk / Brand" required="required"/>
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="control-label col-md-3">Type</label>
                                      <div class="col-md-9">
                                           <input type="text" class="form-control" name="type" placeholder="Type" required="required"/>
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="control-label col-md-3">Year</label>
                                      <div class="col-md-9">
                                          <input type="text" class="form-control" id="yearpicker" name="year" placeholder="Year Purchased" required="required"/>
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="control-label col-md-3">Cost Center</label>
                                      <div class="col-md-9">
                                           <input type="text" class="form-control" name="cost_center" placeholder="Cost Center" required="required"/>
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="control-label col-md-3">PIC</label>
                                      <div class="col-md-9">
                                           <input type="text" class="form-control" name="pic" placeholder="PIC" required="required"/>
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="control-label col-md-3">Room</label>
                                      <div class="col-md-9">
                                           <input type="text" class="form-control" name="room" placeholder="Placement" required="required"/>
                                      </div>
                                  </div>

                                  <div id="category">
                                      <div id="none">
                                      </div>
                                      <div id="desktop">
                                          <div class="form-group">
                                              <label class="control-label col-md-3">OS</label>
                                              <div class="col-md-9">
                                                   <input type="text" class="form-control" name="os" placeholder="Operating System"/>
                                              </div>
                                          </div>
                                          <div class="form-group">
                                              <label class="control-label col-md-3">RAM</label>
                                              <div class="col-md-9">
                                                   <input type="text" class="form-control" name="ram" placeholder="RAM (GB)"/>
                                              </div>
                                          </div>
                                          <div class="form-group">
                                              <label class="control-label col-md-3">HDD</label>
                                              <div class="col-md-9">
                                                   <input type="text" class="form-control" name="hdd" placeholder="HDD (GB)"/>
                                              </div>
                                          </div>
                                          <div class="form-group">
                                              <label class="control-label col-md-3">Processor</label>
                                              <div class="col-md-9">
                                                   <input type="text" class="form-control" name="processor" placeholder="Processor"/>
                                              </div>
                                          </div>
                                          <div class="form-group">
                                              <label class="control-label col-md-3">IP</label>
                                              <div class="col-md-9">
                                                   <input type="text" class="form-control" name="ip" placeholder="Type DHCP or Static IP Address"/>
                                              </div>
                                          </div>                          
                                      </div>

                                      <div id="printer">
                                          <div class="form-group">
                                             <label class="control-label col-md-3">LAN</label>
                                                 <div class="col-md-9">
                                                        <select class="form-control" id="printer_category" name="printer_category">
                                                            <option value="yes">YES</option>
                                                            <option value="no" selected="selected">NO</option>
                                                        </select>
                                                 </div>
                                          </div>
                                                  <div id="lan">
                                                        <div id="yes">
                                                               <div class="form-group">
                                                                  <label class="control-label col-md-3">IP</label>
                                                                  <div class="col-md-9">
                                                                       <input type="text" class="form-control" name="ip_printer" placeholder="IP Address"/>
                                                                  </div>
                                                              </div> 
                                                        </div>
                                                  </div>                      
                                      </div>

                                      <div id="scanner"></div>
                                      <div id="ups"></div>
                                      <div id="network">
                                           <div class="form-group">
                                              <label class="control-label col-md-3">IP</label>
                                              <div class="col-md-9">
                                                   <input type="text" class="form-control" name="ip" placeholder="Type DHCP or Static IP Address"/>
                                              </div>
                                          </div> 
                                           <div class="form-group">
                                              <label class="control-label col-md-3">Port</label>
                                              <div class="col-md-9">
                                                   <input name="port" type="text" class="form-control" placeholder="Available PORT"/>
                                              </div>
                                          </div> 
                                      </div>
                                      <div id="cctv"></div>
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

<!-- Modal Edit Category PC -->
  <div class="modal fade" id="edit_pc" role="dialog">
        <div class="modal-dialog">
             <div class="modal-content">
                   <div class="modal-header">
                         <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                         <h3 class="modal-title"></h3>
                   </div>
                   <form id="form_edit_data" method="post" class="form-horizontal" action="<?php echo base_url(); ?>index.php/data/update_data">
                   <div class="modal-body form">
                        <div class="form-body">
                                  <input type="hidden" value="" name="id_asset"/>
                                  <div class="form-group">
                                      <label class="control-label col-md-3">Serial Number</label>
                                      <div class="col-md-9">
                                           <input type="text" class="form-control" name="sn" placeholder="Serial Number" required="required"/>
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="control-label col-md-3">Name</label>
                                      <div class="col-md-9">
                                           <input type="text" class="form-control" name="name" placeholder="Name" required="required"/>
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="control-label col-md-3">Merk</label>
                                      <div class="col-md-9">
                                           <input type="text" class="form-control" name="merk" placeholder="Merk / Brand" required="required"/>
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="control-label col-md-3">Type</label>
                                      <div class="col-md-9">
                                           <input type="text" class="form-control" name="type" placeholder="Type" required="required"/>
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="control-label col-md-3">Year</label>
                                      <div class="col-md-9">
                                          <input type="text" class="form-control" id="yearpicker2" name="year" placeholder="Year Purchased" required="required"/>
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="control-label col-md-3">Cost Center</label>
                                      <div class="col-md-9">
                                           <input type="text" class="form-control" name="cost_center" placeholder="Cost Center" required="required"/>
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="control-label col-md-3">PIC</label>
                                      <div class="col-md-9">
                                           <input type="text" class="form-control" name="pic" placeholder="PIC" required="required"/>
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="control-label col-md-3">Room</label>
                                      <div class="col-md-9">
                                           <input type="text" class="form-control" name="room" placeholder="Placement" required="required"/>
                                      </div>
                                  </div>
                                  <div class="form-group">
                                              <label class="control-label col-md-3">OS</label>
                                              <div class="col-md-9">
                                                   <input type="text" class="form-control" name="os" placeholder="Operating System"/>
                                              </div>
                                          </div>
                                          <div class="form-group">
                                              <label class="control-label col-md-3">RAM</label>
                                              <div class="col-md-9">
                                                   <input type="text" class="form-control" name="ram" placeholder="RAM (GB)"/>
                                              </div>
                                          </div>
                                          <div class="form-group">
                                              <label class="control-label col-md-3">HDD</label>
                                              <div class="col-md-9">
                                                   <input type="text" class="form-control" name="hdd" placeholder="HDD (GB)"/>
                                              </div>
                                          </div>
                                          <div class="form-group">
                                              <label class="control-label col-md-3">Processor</label>
                                              <div class="col-md-9">
                                                   <input type="text" class="form-control" name="processor" placeholder="Processor"/>
                                              </div>
                                          </div>
                                          <div class="form-group">
                                              <label class="control-label col-md-3">IP</label>
                                              <div class="col-md-9">
                                                   <input type="text" class="form-control" name="ip" placeholder="Type DHCP or Static IP Address"/>
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

<!-- Modal Edit Category Printer -->
  <div class="modal fade" id="edit_printer" role="dialog">
        <div class="modal-dialog">
             <div class="modal-content">
                   <div class="modal-header">
                         <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                         <h3 class="modal-title"></h3>
                   </div>
                   <form id="form_edit_data" method="post" class="form-horizontal" action="<?php echo base_url(); ?>index.php/data/update_data">
                   <div class="modal-body form">
                        <div class="form-body">
                        <input type="hidden" value="" name="id_asset"/> 
                                  <div class="form-group">
                                      <label class="control-label col-md-3">Serial Number</label>
                                      <div class="col-md-9">
                                           <input type="text" class="form-control" name="sn" placeholder="Serial Number" required="required"/>
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="control-label col-md-3">Name</label>
                                      <div class="col-md-9">
                                           <input type="text" class="form-control" name="name" placeholder="Name" required="required"/>
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="control-label col-md-3">Merk</label>
                                      <div class="col-md-9">
                                           <input type="text" class="form-control" name="merk" placeholder="Merk / Brand" required="required"/>
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="control-label col-md-3">Type</label>
                                      <div class="col-md-9">
                                           <input type="text" class="form-control" name="type" placeholder="Type" required="required"/>
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="control-label col-md-3">Year</label>
                                      <div class="col-md-9">
                                          <input type="text" class="form-control" id="yearpicker3" name="year" placeholder="Year Purchased" required="required"/>
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="control-label col-md-3">Cost Center</label>
                                      <div class="col-md-9">
                                           <input type="text" class="form-control" name="cost_center" placeholder="Cost Center" required="required"/>
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="control-label col-md-3">PIC</label>
                                      <div class="col-md-9">
                                           <input type="text" class="form-control" name="pic" placeholder="PIC" required="required"/>
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="control-label col-md-3">Room</label>
                                      <div class="col-md-9">
                                           <input type="text" class="form-control" name="room" placeholder="Placement" required="required"/>
                                      </div>
                                  </div>
                                  <div class="form-group">
                                     <label class="control-label col-md-3">IP</label>
                                         <div class="col-md-9">
                                            <input type="text" class="form-control" name="ip" placeholder="IP Address or Leave it Blank"/>
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

<!-- Modal Edit Category Network -->
  <div class="modal fade" id="edit_network" role="dialog">
        <div class="modal-dialog">
             <div class="modal-content">
                   <div class="modal-header">
                         <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                         <h3 class="modal-title"></h3>
                   </div>
                   <form id="form_edit_data" method="post" class="form-horizontal" action="<?php echo base_url(); ?>index.php/data/update_data">
                   <div class="modal-body form">
                        <div class="form-body">
                                  <input type="hidden" value="" name="id_asset"/> 
                                  <div class="form-group">
                                      <label class="control-label col-md-3">Serial Number</label>
                                      <div class="col-md-9">
                                           <input type="text" class="form-control" name="sn" placeholder="Serial Number" required="required"/>
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="control-label col-md-3">Name</label>
                                      <div class="col-md-9">
                                           <input type="text" class="form-control" name="name" placeholder="Name" required="required"/>
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="control-label col-md-3">Merk</label>
                                      <div class="col-md-9">
                                           <input type="text" class="form-control" name="merk" placeholder="Merk / Brand" required="required"/>
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="control-label col-md-3">Type</label>
                                      <div class="col-md-9">
                                           <input type="text" class="form-control" name="type" placeholder="Type" required="required"/>
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="control-label col-md-3">Year</label>
                                      <div class="col-md-9">
                                          <input type="text" class="form-control" id="yearpicker" name="year" placeholder="Year Purchased" required="required"/>
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="control-label col-md-3">Cost Center</label>
                                      <div class="col-md-9">
                                           <input type="text" class="form-control" name="cost_center" placeholder="Cost Center" required="required"/>
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="control-label col-md-3">PIC</label>
                                      <div class="col-md-9">
                                           <input type="text" class="form-control" name="pic" placeholder="PIC" required="required"/>
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="control-label col-md-3">Room</label>
                                      <div class="col-md-9">
                                           <input type="text" class="form-control" name="room" placeholder="Placement" required="required"/>
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="control-label col-md-3">IP</label>
                                         <div class="col-md-9">
                                             <input type="text" class="form-control" name="ip" placeholder="Type DHCP or Static IP Address"/>
                                        </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="control-label col-md-3">Port</label>
                                         <div class="col-md-9">
                                             <input type="text" class="form-control" name="port" placeholder="Available Port"/>
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

  <!-- Modal Edit Category Scanner, UPS, CCTV -->
  <div class="modal fade" id="edit_other" role="dialog">
        <div class="modal-dialog">
             <div class="modal-content">
                   <div class="modal-header">
                         <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                         <h3 class="modal-title"></h3>
                   </div>
                   <form id="form_edit_data" method="post" class="form-horizontal" action="<?php echo base_url(); ?>index.php/data/update_data">
                   <div class="modal-body form">
                        <div class="form-body">
                                  <input type="hidden" value="" name="id_asset"/> 
                                  <div class="form-group">
                                      <label class="control-label col-md-3">Serial Number</label>
                                      <div class="col-md-9">
                                           <input type="text" class="form-control" name="sn" placeholder="Serial Number" required="required"/>
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="control-label col-md-3">Name</label>
                                      <div class="col-md-9">
                                           <input type="text" class="form-control" name="name" placeholder="Name" required="required"/>
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="control-label col-md-3">Merk</label>
                                      <div class="col-md-9">
                                           <input type="text" class="form-control" name="merk" placeholder="Merk / Brand" required="required"/>
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="control-label col-md-3">Type</label>
                                      <div class="col-md-9">
                                           <input type="text" class="form-control" name="type" placeholder="Type" required="required"/>
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="control-label col-md-3">Year</label>
                                      <div class="col-md-9">
                                          <input type="text" class="form-control" id="yearpicker" name="year" placeholder="Year Purchased" required="required"/>
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="control-label col-md-3">Cost Center</label>
                                      <div class="col-md-9">
                                           <input type="text" class="form-control" name="cost_center" placeholder="Cost Center" required="required"/>
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="control-label col-md-3">PIC</label>
                                      <div class="col-md-9">
                                           <input type="text" class="form-control" name="pic" placeholder="PIC" required="required"/>
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="control-label col-md-3">Room</label>
                                      <div class="col-md-9">
                                           <input type="text" class="form-control" name="room" placeholder="Placement" required="required"/>
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
    $(document).ready(function() {
          $('#category_report').on('change.report', function() {
            $("#none").toggle($(this).val() == 'none');
            $("#report_id_category").toggle($(this).val() == 'id_category');
            $("#report_cost_center").toggle($(this).val() == 'cost_center');
            $("#report_year").toggle($(this).val() == 'year');
            
           }).trigger('change.report');
    });
</script>

<script type="text/javascript">
    // When the document is ready
      $(document).ready(function () {
                
        $('.input-daterange').datepicker({
                format: "yyyy",
                minViewMode: 2,
                forceParse: false,
                autoclose: true,
                todayHighlight: true
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
                   <form id="form_create_report" method="post" class="form-horizontal" action="<?php echo base_url(); ?>index.php/report/asset">
                   <div class="modal-body form">
                            <div class="form-body">
                                 <div class="form-group">
                                     <label class="control-label col-md-3">Category</label>
                                         <div class="col-md-9">
                                                <select class="form-control" id="category_report" name="category_report">
                                                  <option disabled="disabled" selected="selected" value="none">Please Select One!</option>
                                                  <option value="id_category">By Asset Category</option>
                                                  <option value="cost_center">By Cost Center</option>
                                                  <option value="year">By Year</option>
                                               </select>
                                         </div>
                                  </div>
                                  
                                  <div id="report">

                                      <div id="report_id_category">
                                          <div class="form-group">
                                              <label class="control-label col-md-3">Select Asset Category</label>
                                              <div class="col-md-9">
                                                   <select class="form-control" name="report_by_asset_category">
                                                      <option disabled="disabled" selected="selected">Please Select One!</option>
                                                      <?php foreach($category as $row) { ?>
                                                        <option value="<?php echo $row->category_name; ?>"><?php echo $row->category_name; ?></option>
                                                      <?php } ?>
                                                    </select>
                                              </div>
                                          </div>
                                                                    
                                      </div>

                                      <div id="report_cost_center">
                                          <div class="form-group">
                                             <label class="control-label col-md-3">Select Cost Center</label>
                                                 <div class="col-md-9">
                                                        <select class="form-control" name="report_by_cost_center">
                                                            <option disabled="disabled" selected="selected">Please Select One!</option>
                                                            <?php foreach($cost_center as $row) { ?>
                                                              <option value="<?php echo $row->cost_center; ?>"><?php echo $row->cost_center; ?></option>
                                                            <?php } ?>
                                                        </select>
                                                 </div>
                                          </div>                      
                                      </div>

                                      <div id="report_year">
                                          <div class="form-group">
                                             <label class="control-label col-md-3">Select Year</label>
                                                <div class="col-md-9">
                                                   <div class="input-daterange" id="datepicker" >
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