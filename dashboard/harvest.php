<?php 
include('../dbconfig.php');
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
    <title>Manage Harvest</title>


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
      <a class="nav-link" href="#">Sign out</a>
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
        <h1 class="h2">Manage Harvest</h1>
        
      </div>
      <div class="table-responsive">
         <button type="button" class="btn btn-sm btn-success add" data-toggle="modal" data-target="#harvest_modal">Add</button>
         <br><br>
        <table class="table table-striped table-sm" id="harvest_data">
          <thead>
            <tr>
              <th>#</th>
              <th>Name</th>
              <th>Price</th>
              <th>Weight</th>
              <th>Date</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            
     
          </tbody>
        </table>


<div class="modal fade" id="harvest_modal" tabindex="-1" role="dialog" aria-labelledby="product_modal_title" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="harvest_modal_title">Add New Harvest</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="product_modal_content">
      <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#product_modal" id="product_browse">BROWSE</button>
      <form method="post" id="harvest_form" enctype="multipart/form-data">
            <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="prod_name">Name</label>
                  <input type="text" class="form-control" id="prod_name" name="prod_name" placeholder="" value="" disabled="">
                </div>
                <div class="form-group col-md-6">
                  <label for="prod_weight">Weight(KG):</label>
                  <input type="text" class="form-control" id="prod_weight" name="prod_weight" placeholder="" value="">
                </div>
              </div> 
      </div>
      <div class="modal-footer">
        <input type="hidden" name="product_ID" id="product_ID" />
        <input type="hidden" name="harvest_ID" id="harvest_ID" />
        <input type="hidden" name="operation" id="operation" />
        <button type="submit" class="btn btn-primary submit" id="submit_input" value="submit_harvest">Submit</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
       </form>
    </div>
  </div>
</div>


<div class="modal fade" id="product_modal" tabindex="-1" role="dialog" aria-labelledby="product_modal_title" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="product_modal_title">Product List</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="table-responsive" style="overflow-x: hidden;">
        <table class="table table-striped table-sm" id="product_data">
          <thead>
            <tr>
              <th>#</th>
              <th>Category</th>
              <th>Name</th>
              <th>Price</th>
              <th>Weight</th>
              <th>Season</th>
              <th>Status</th>
              <th>Action</th>
            </tr>
          </thead>
        </table>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="delharvest_modal" tabindex="-1" role="dialog" aria-labelledby="product_modal_title" aria-hidden="true">
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
        <button type="submit" class="btn btn-danger" id="harvest_delform">Delete</button>
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
             
            var dataTable = $('#harvest_data').DataTable({
            "processing":true,
            "serverSide":true,
            "order":[],
            "ajax":{
              url:"datatable/harvest/fetch.php",
              type:"POST"
            },
            "columnDefs":[
              {
                "targets":[0],
                "orderable":false,
              },
            ],

          });
          var dataTable_product_data = $('#product_data').DataTable({
            "processing":true,
            "serverSide":true,
            "autoWidth": false,
            "order":[],
            "ajax":{
              url:"datatable/products/fetch.php",
              type:"POST"
            },
            "columnDefs":[
              {
                "targets":[0],
                "orderable":false,
              },
            ],

          });
          dataTable_product_data.column( 7 ).visible( false );
      




      


          //----------------------------------------------------------------
          //JQUERY FOR SELECTING STUDENT ID WHEN BROWSING
          //----------------------------------------------------------------
            var addproduct_data = '#product_data tbody';

            $(addproduct_data).on('click', 'tr', function(){
              
              var cursor = dataTable_product_data.row($(this));//get the clicked row
              var data=cursor.data();// this will give you the data in the current row.
            
              
              if(confirm("Are you sure you want to add harvest data in ("+data[2]+")?"))
              {
                $('#product_ID').val(data[0]);
                $('#prod_name').val(data[2]);
              }
              else
              {
                return false; 
              }
              $('#product_modal').modal('hide');
              
            });

          $(document).on('submit', '#harvest_form', function(event){
            event.preventDefault();

              $.ajax({
                url:"datatable/harvest/insert.php",
                method:'POST',
                data:new FormData(this),
                contentType:false,
                processData:false,
                success:function(data)
                {
                  alert(data);
                  $('#harvest_form')[0].reset();
                  $('#harvest_modal').modal('hide');
                  dataTable.ajax.reload();
                  dataTable_product_data.ajax.reload();
                }
              });
           
          });

          $(document).on('click', '.add', function(){
            $('#harvest_modal_title').text('Add New Harvest');
            $('#harvest_form')[0].reset();
            $('#submit_input').show();
            $('#product_browse').show();
            $("#prod_weight").prop("disabled", false);
            $('#submit_input').text('Submit');
            $('#submit_input').val('submit_harvest');
            $('#operation').val("submit_harvest");
          });

          $(document).on('click', '.view', function(){
            var harvest_ID = $(this).attr("id");
            $('#harvest_modal_title').text('View Harvest');
            $('#harvest_modal').modal('show');
            $("#prod_weight").prop("disabled", true);
            $('#product_browse').hide();
            
             $.ajax({
                url:"datatable/harvest/fetch_single.php",
                method:'POST',
                data:{action:"harvest_view",harvest_ID:harvest_ID},
                dataType    :   'json',
                success:function(data)
                {
                  $('#prod_name').val(data.prod_Name);
                  $('#prod_weight').val(data.harvest_Weight);
                  $('#submit_input').hide();
                  $('#prod_weight_label').show();
                  $('#harvest_ID').val(harvest_ID);
                  $('#operation').val("harvest_view");
                  
                }
              });


            });
          $(document).on('click', '.edit', function(){
            var harvest_ID = $(this).attr("id");
            $('#harvest_modal_title').text('Edit Harvest');
            $('#harvest_modal').modal('show');
            $("#prod_weight").prop("disabled", false);
            $('#product_browse').hide();
            
             $.ajax({
                url:"datatable/harvest/fetch_single.php",
                method:'POST',
                data:{action:"harvest_view",harvest_ID:harvest_ID},
                dataType    :   'json',
                success:function(data)
                {
                  $('#prod_name').val(data.prod_Name);
                  $('#prod_weight').val(data.harvest_Weight);
                  $('#submit_input').show();
                  $('#prod_weight_label').show();
                  $('#harvest_ID').val(harvest_ID);
                  $('#operation').val("harvest_view");
                  $('#submit_input').text('Update');
                  $('#submit_input').val('harvest_edit');
                  $('#operation').val("harvest_edit");
                  
                }
              });


            });
            $(document).on('click', '.delete', function(){
            var harvest_ID = $(this).attr("id");
             $('#delharvest_modal').modal('show');
              $('.submit').hide();
             
             $('#harvest_ID').val(harvest_ID);
            });

           


          $(document).on('click', '#harvest_delform', function(event){
             var harvest_ID =  $('#harvest_ID').val();
            $.ajax({
             type        :   'POST',
             url:"datatable/harvest/insert.php",
             data        :   {operation:"delete_harvest",harvest_ID:harvest_ID},
             dataType    :   'json',
             complete     :   function(data) {
               $('#delharvest_modal').modal('hide');
               alert(data.responseText);
               dataTable.ajax.reload();
               dataTable_product_data.ajax.reload();
                
             }
            })
           
          });
          
          } );


        </script>
        </body>

</html>
