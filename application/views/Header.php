<!DOCTYPE html>
<html lang="en">
  
  <head> 
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="yusran">
  
  <title>
    Master Inventory IT
  </title>
  
  <!-- Favicon -->
  <link rel="shortcut icon" href="../img/favicon.png">
  

  <link href="<?php echo base_url() ?>assets/bootstrap/css/bootstrap.css" rel="stylesheet">
  <link href="<?php echo base_url() ?>assets/datepicker/css/bootstrap-datepicker.css" rel="stylesheet">
  <link href="<?php echo base_url() ?>assets/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">
  <link href="<?php echo base_url() ?>assets/bootstrap/css/styles.css" rel="stylesheet">
  <link href="<?php echo base_url() ?>assets/bootstrap/fonts/font-awesome.css" rel="stylesheet" type="text/css">

 

  <style>
      @media (min-width:768px) {
  #menu li {
    position: relative;
  }
  #menu > li ul {
    position: absolute;
    left: 100%;
    top: 0;
    min-width: 200px;
    display: none;
  }
  #menu li:hover > ul,
  #menu li:hover > ul.collapse{
    display: block !important;
    height: auto !important;
    z-index: 1000;
    background: #ddd;
    visibility: visible;
  }
      }
    </style>
    <style>
      @media (max-width:767px) {
  section.content {
    float: left;
    width: 100%;
  }
      }
    </style>
   
    <!-- Jquery.min -->
    <script type="text/javascript" src="<?php echo base_url() ?>assets/bootstrap/js/jquery.min.js"></script>
    <script src="<?php echo base_url() ?>assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url() ?>assets/bootstrap/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url() ?>assets/bootstrap/js/dataTables.bootstrap.js"></script>
    <script src="<?php echo base_url() ?>/assets/datepicker/js/bootstrap-datepicker.js"></script>
    <script src="<?php echo base_url() ?>/assets/datepicker/locales/bootstrap-datepicker.id.min.js"></script>

</head>



<!-- Navigation -->
    <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            
            <a class="navbar-brand" href="">
              Master IT Asset Purinusa Ekapersada 
            </a>
        </div>
  <!-- /.navbar-header -->
        <ul  class="nav navbar-top-links navbar-right">
          
           <li class="">
                
                User :  <?php $logged_in = $this->session->userdata('logged_in'); echo $this->session->userdata('name_info');?>
            </li>
          <li class="">
              <a class="" href="<?php echo base_url() ?>index.php/page/logout">
                  <i class="fa fa-user fa-fw"></i> Logout
              </a>    
            <!-- /.dropdown -->
        </ul>
    </nav>
   
    
      