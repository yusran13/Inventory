<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<table border="1">
    	<tr style="text-align:center">
    		<td width="15px" style="text-align:center">No</td>
            <td width="130px" style="text-align:center">Name</td>
            <td width="100px" style="text-align:center">Merk</td>
            <td width="130px" style="text-align:center">Type</td>
            <td width="100px" style="text-align:center">Year Purchased</td>
            <td width="120px" style="text-align:center">Cost Center</td>
            <td width="120px" style="text-align:center">PIC</td>
            <td width="120px" style="text-align:center">OS</td>
            <td width="80px" style="text-align:center">RAM (GB)</td>
            <td width="80px" style="text-align:center">HDD (GB)</td>
            <td width="120px" style="text-align:center">Processor</td>
            <td width="120px" style="text-align:center">IP Address</td>    
        </tr>
        <?php 
        $no=1;
        foreach ($data as $row){ ?>
     	<tr>
         	<td><?php echo $no; ?></td>
         	<td><?php echo $row->name; ?></td>
         	<td><?php echo $row->merk; ?></td>
         	<td><?php echo $row->type; ?></td>
         	<td><?php echo $row->year; ?></td>
         	<td><?php echo $row->cost_center; ?></td>
         	<td><?php echo $row->pic; ?></td>
         	<td><?php echo $row->os; ?></td>
         	<td><?php echo $row->ram; ?></td>
         	<td><?php echo $row->hdd; ?></td>
         	<td><?php echo $row->processor; ?></td>
         	<td><?php echo $row->ip; ?></td>
        </tr>
         
     <?php $no++; } ?> 

    </table>
</body>
</html>