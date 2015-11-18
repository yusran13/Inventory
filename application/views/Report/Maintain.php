<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<table border="1">
    	<tr style="text-align:center">
    		<td width="15px" style="text-align:center">No</td>
            <td width="200px" style="text-align:center">Device</td>
            <td width="180px" style="text-align:center">Type Maintain</td>
            <td width="130px" style="text-align:center">Date</td>
            <td width="200px" style="text-align:center">Description</td>
            <td width="230px" style="text-align:center">Special Remark</td>
        </tr>
        <?php 
        $no=1;
        foreach ($data as $row){ ?>
     	<tr>
         	<td><?php echo $no; ?></td>
         	<td><?php echo $row->name; echo " "; echo $row->merk; echo " "; echo $row->type; echo " "; echo $row->pic;?></td>
         	<td><?php echo $row->category_name; ?></td>
         	<td><?php echo $row->date; ?></td>
         	<td><?php echo $row->desc; ?></td>
         	<td><?php echo $row->remark; ?></td>
        </tr>
         
     <?php $no++; } ?> 

    </table>
</body>
</html>