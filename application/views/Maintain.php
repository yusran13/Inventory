 <?php include "header.php" ?>
 <?php include "nav-menu.php" ?>
        <div id="page-wrapper">
            <div class="row">
                <h3 align="left">Maintain Record</h3> <br><br>
                <div align="left" style="padding-right: 50px;">
                    <button class="btn btn-success" onClick="add_data()"><i class="glyphicon glyphicon-plus"></i> Add Data</button>
                    <button class="btn btn-primary" onClick="create_report()"><i class="fa fa-files-o fa-fw"></i> Report</button>
                </div>
            </div>
            <br>
            <div id="holder">
                <div class="row">
                    <div id="body">
                    <?php 
                        include "content/maintain.php"
                    ?>
                    </div>
                
                </div>
             </div>
        </div>
<?php include "footer.php" ?>
       
        
