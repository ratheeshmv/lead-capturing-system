<?php
	include('lib/MySQLConn.php');
		
	$dataset = new MySQLConn();
	$table = "details";
	$id = (isset($_GET['id'])? $_GET['id']: 1);
	$result = $dataset->getRecordBy_ID($table, 'id', $id);
	//print_r($result);
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Details</title>
<!--<link rel="stylesheet" type="text/css" href="css/style.css">-->
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap.min.css">
<script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js"></script>
</head>

<body>
<div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
    <header class="masthead mb-auto text-center">
        <div class="inner">
          <nav class="nav nav-masthead justify-content-center">
            <a class="nav-link active" href="index.php" >Home</a>
            <a class="nav-link" href="dashboard.php">Dashboard</a>
          </nav>
        </div>
    </header>
    <div class="container-fluid">
        <div class="table-responsive">
                <table width="600" border="0" class="table table-striped table-bordered" align="center">
                  <tr>
                    <td colspan="2" align="center" class="head" >Details...</td>
                  </tr>
                  <tr>
                    <td>First Name</td>
                    <td><?=$result['fname']; ?></td>
                  </tr>
                  <tr>
                    <td>Last Name</td>
                    <td><?=$result['lname']; ?></td>
                  </tr>
                  <tr>
                    <td>Email</td>
                    <td><?=$result['email']; ?></td>
                  </tr>
                  <tr>
                    <td>Phone</td>
                    <td><?=$result['phone']; ?></td>
                  </tr>
                  <tr>
                    <td>Address</td>
                    <td><?=$result['address']; ?></td>
                  </tr>
                  <tr>
                    <td>Home square footage</td>
                    <td><?=$result['hfeet']; ?></td>
                  </tr>
                  <tr>
                    <td>&nbsp;</td>
                    <td align="right"><input type="button" class="btn" value="Back" onclick="window.history.back();" /></td>
                  </tr>
              </table>
        </div>
    </div>
</div>
</body>
</html>
