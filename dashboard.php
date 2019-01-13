<?php
	include('lib/MySQLConn.php');
		
	$dataset = new MySQLConn();
	$table = "details";
	$result = @$dataset->getAllRecord($table);
	
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Dashboard</title>
<!--<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">-->
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap.min.css">
<script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js"></script>
<script language="javascript">
	$(document).ready(function() {
		$('#example').DataTable({
			"columnDefs": [
				{
					"targets": [ 3 ],
					"orderable": false
				}
			]
		});
	} );
</script>
</head>

<body>
<div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
    <header class="masthead mb-auto text-center">
        <div class="inner">
          <nav class="nav nav-masthead justify-content-center">
            <a class="nav-link active" href="index.php" >Home</a>
            <a class="nav-link" href="javascript:void(0);">Dashboard</a>
          </nav>
        </div>
    </header>
    <div class="container-fluid">
        <div class="table-responsive">
            <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Detail</th>
                    </tr>
                </thead>
                <tbody>
                <?php
					if(empty($result)){
				?>
                		<tr>
                        	<td colspan="4" align="center" style="color:red;">No records found!!!</td>
                        </tr>
                <?php	
					}
					else{
                    	for($i=0; $i<count($result); $i++)
                    	{
                ?>
                            <tr>
                                <td><?=$result[$i]['fname']; ?></td>
                                <td><?=$result[$i]['lname']; ?></td>
                                <td><?=$result[$i]['email']; ?></td>
                                <td align="center"><a href="detail.php?id=<?=$result[$i]['id']; ?>"><img src="images/view.png" width="20" /></a></td>
                            </tr>
                <?php 
						}
                    }    
                ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Detail</th>
                    </tr>
                </tfoot>
             </table> 
        </div> 
    </div> 
</div>      
</body>
</html>
