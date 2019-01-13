<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
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
            <a class="nav-link active" href="javascript:void(0);">Home</a>
            <a class="nav-link" href="dashboard.php">Dashboard</a>
          </nav>
        </div>
    </header>
    <div class="container">
        <div class="table-responsive">
            <div class="col-md-8 order-md-1">
                  <h4 class="mb-3">Please enter details.</h4>
                  <form class="needs-validation" name="frm">
                    <div class="row">
                      <div class="col-md-6 mb-3">
                        <label for="firstName">First name</label>
                        <input type="text" class="form-control" id="fname" placeholder="" value="" required>
                      </div>
                      <div class="col-md-6 mb-3">
                        <label for="lastName">Last name</label>
                        <input type="text" class="form-control" id="lname" placeholder="" value="" >
                      </div>
                    </div>
            
                    <div class="mb-3">
                      <label for="email">Email</label>
                      <input type="email" class="form-control" id="email" placeholder="you@example.com">
                    </div>
                    <div class="mb-3">
                      <label for="email">Phone</label>
                      <input type="tel" class="form-control" id="phone" >
                    </div>
                    <div class="mb-3">
                      <label for="address">Address</label>
                      <input type="text" class="form-control" id="address" >
                    </div>
                    <div class="mb-3">
                      <label for="email">Home square footage</label>
                      <input type="text" class="form-control" id="hfeet" >
                    </div>
                    <input type="hidden" id="fid" value="" />
                    <hr class="mb-4">
                    <button class="btn btn-primary btn-lg btn-block" type="button" onClick="saveMe();">Save</button>
                </form>
            </div>
         </div>
     </div>
</div>
<script language="javascript">
    (function($) {
      $.fn.donetyping = function(callback) {
        var _this = $(this);
        var x_timer;
        _this.keyup(function() {
          clearTimeout(x_timer);
          x_timer = setTimeout(clear_timer, 1000);
        });
    
        function clear_timer() {
          clearTimeout(x_timer);
          callback.call(_this);
        }
      }
    })(jQuery);
    
    $('.form-control').donetyping(function(callback) {
      //alert('done typing');
        var id = $("#fid").val();
        var fname = $("#fname").val();
        var lname = $("#lname").val();
        var email = $("#email").val();
        var phone = $("#phone").val();
        var address = $("#address").val();
        var hfeet = $("#hfeet").val();
        
        if(fname != '')
        {
            $.ajax({
                  type: "POST",
                  url: "savetodb.php",
                  data: {id:id,fname:fname,lname:lname,email:email,phone:phone,address:address,hfeet:hfeet},
                  success: function(msg){
                        //alert(msg);
                        $("#fid").val(msg);				
                  },
                  error: function() {
                    //alert("Error");
                  }
            });
        }
        
    });
    
    function saveMe()
    {
        //alert('Hai');
        var id = $("#fid").val();
        var fname = $("#fname").val();
        var lname = $("#lname").val();
        var email = $("#email").val();
        var phone = $("#phone").val();
        var address = $("#address").val();
        var hfeet = $("#hfeet").val();
        
        if(fname != '')
        {
            $.ajax({
                  type: "POST",
                  url: "savetodb.php",
                  data: {id:id,fname:fname,lname:lname,email:email,phone:phone,address:address,hfeet:hfeet},
                  success: function(msg){
                        //alert(msg);
                        $("#fid").val('');
                        $('form[name="frm"]')[0].reset();
                        alert('Successfully inserted...');				
                  },
                  error: function() {
                    //alert("Error");
                  }
            });
        }
        
    }
</script>
</body>
</html>
