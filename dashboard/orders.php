<?php 
include('../session.php');


if ($_SESSION['login_level'] !=  2) {
    header('Location: ../index.php');
}
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.5">
    <link rel="icon" href="../img/logo.png" type="image/x-icon">
    <title>Manage Order</title>


    <!-- Bootstrap core CSS -->
<link href="../css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="../datatables/datatables.min.css"/>
 



    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <!-- Custom styles for this template -->
    <link href="../css/dashboard.css" rel="stylesheet">
  </head>
  <body>
    <nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">SAKA</a>
  
  <ul class="navbar-nav px-3">
    <li class="nav-item text-nowrap">
      <a class="nav-link" href="../logout.php">Sign out</a>
    </li>
  </ul>
</nav>

<div class="container-fluid">
  <div class="row">
      <?php 
    include('x-sidenav.php');
    ?>

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Manage Order</h1>
        
      </div>
      <div class="table-responsive">
        <table class="table table-striped table-sm" id="order_data">
          <thead>
            <tr>
              <th>#</th>
              <th>Customer</th>
              <th>Status</th>
              <th>Date</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            
     
          </tbody>
        </table>


<div class="modal fade" id="order_modal" tabindex="-1" role="dialog" aria-labelledby="product_modal_title" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="account_modal_title">Add Order</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <div class="modal-body" id="product_modal_content">
      
        <form method="post" id="order_form" enctype="multipart/form-data">
              <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="acc_username">Username</label>
                    <div  id="acc_username" ></div>
                  </div>
                  <div class="form-group col-md-6">
                    <label for="acc_email">Email:</label>
                    <div id="acc_email"></div>
                  </div>
                </div>  
                 <div class="form-row">
                  <div class="form-group col-md-12">
                    <label for="acc_name">Full Name</label>
                    <div id="acc_name"></div>
               
                  </div>
                </div> 
                <div class="form-row">
                  <div class="form-group col-md-12">
                    <label for="acc_add">Address</label>
                    <div id="acc_add"></div>
                  </div>
                </div> 
                <div id="load_order">
                  
                </div>
        </div>
        <div class="modal-footer">
          <input type="hidden" name="order_ID" id="order_ID" />
          <input type="hidden" name="operation" id="operation" />
          <button type="submit" class="btn btn-primary submit" id="submit_input" value="submit_order">Submit</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
        </form>
    </div>
  </div>
</div>




<div class="modal fade" id="delorder_modal" tabindex="-1" role="dialog" aria-labelledby="product_modal_title" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="harvest_modal_title">Delete this Product</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="text-center">
        <div class="btn-group">
        <button type="submit" class="btn btn-danger" id="order_delform">Delete</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
      </div>
    </main>
  </div>
</div>

<script src="../js/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
      <script>window.jQuery || document.write('<script src="../js/jquery-slim.min.js"><\/script>')</script>

      <script src="../js/jquery-3.3.1.min.js" ></script>
      <script src="../js/bootstrap.bundle.min.js" integrity="sha384-xrRywqdh3PHs8keKZN+8zzc5TX0GRTLCcmivcbNJWm2rs5C8PRhcEn3czEjhAO9o" crossorigin="anonymous"></script>
        <script src="../js/feather.min.js"></script>
        <script src="../js/dashboard.js"></script>
        <script type="text/javascript" src="../datatables/datatables.min.js"></script>
        <script type="text/javascript">
   


          $(document).ready(function() {
             
            var dataTable = $('#order_data').DataTable({
            "processing":true,
            "serverSide":true,
            "order":[],
            "ajax":{
              url:"datatable/order/fetch.php",
              type:"POST"
            },
            "columnDefs":[
              {
                "targets":[0],
                "orderable":false,
              },
            ],

          });



          $(document).on('submit', '#order_form', function(event){
            event.preventDefault();

              $.ajax({
                url:"datatable/order/insert.php",
                method:'POST',
                data:new FormData(this),
                contentType:false,
                processData:false,
                success:function(data)
                {
                  alert(data);
                  $('#order_modal').modal('hide');
                  dataTable.ajax.reload();
                }
              });
           
          });


          $(document).on('click', '.view', function(){
            var order_ID = $(this).attr("id");
            $('#account_modal_title').text('View Order');
            $('#order_modal').modal('show');
   
            
             $.ajax({
                url:"datatable/order/fetch_single.php",
                method:'POST',
                data:{action:"order_view",order_ID:order_ID},
                dataType    :   'json',
                success:function(data)
                {


                  $('#acc_username').text(data.user_Name);
                  $('#acc_email').text(data.user_Email);
                  $('#acc_name').text(data.user_Fullname);
                  $('#acc_add').text(data.user_Address);
                 
                  $( "#load_order" ).load( "datatable/order/fetchtable.php?order_ID="+order_ID);

                  $('#submit_input').show();
                  $('#account_ID').val(order_ID);
                  $('#submit_input').text('Process');
                  if (data.ors_ID == 0) {
                    $('#submit_input').text('Checkout');
                  }
                  $('#submit_input').val('order_process');
                  $('#operation').val("order_process");
                  $('#order_ID').val(order_ID);
                  
                  
                }
              });


            });

                   $(document).on('click', '.delete', function(){
            var order_ID = $(this).attr("id");
             $('#delorder_modal').modal('show');
              $('.submit').hide();
             
             $('#order_ID').val(order_ID);
            });

           


          $(document).on('click', '#order_delform', function(event){
             var order_ID =  $('#order_ID').val();
           
            $.ajax({
             type        :   'POST',
             url:"datatable/order/insert.php",
             data        :   {operation:"delete_order",order_ID:order_ID},
             dataType    :   'json',
             complete     :   function(data) {
               $('#delorder_modal').modal('hide');
               alert(data.responseText);
               dataTable.ajax.reload();
                
             }
            })
           
          });
          
          
          } );


        </script>
        </body>

</html>
