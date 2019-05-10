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
    <title>Products</title>


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
        <h1 class="h2">Inventory</h1>
        
      </div>

      <h2>List of Item Product</h2>
      <div class="table-responsive">
         <button type="button" class="btn btn-sm btn-success add" data-toggle="modal" data-target="#product_modal">Add</button>
         <br><br>
        <table class="table table-striped table-sm" id="product_data">
          <thead>
            <tr>
              <th>#</th>
              <th>Category</th>
              <th>Name</th>
              <th>Price</th>
              <th>Weight</th>
              <th>Season</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            
     
          </tbody>
        </table>


<div class="modal fade" id="product_modal" tabindex="-1" role="dialog" aria-labelledby="product_modal_title" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="product_modal_title">Add New Product</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="product_modal_content">
    
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id="submit" value="submit_product">Submit</button>
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
             
            var dataTable = $('#product_data').DataTable({
            "processing":true,
            "serverSide":true,
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

          $(document).on('click', '.add', function(){
              $('#product_modal_title').text('Add New Product');
             $('#product_modal_content').html('');
                $.ajax({
                type        :   'POST',
                url         :   "datatable/products/modal.php",
                data        :   {action:"product_add"},
                dataType    :   'html',
                complete    :   function(data) {
                  $('#product_modal_content').html(data.responseText);
                    }
                });
                $('#submit').show();
                 $('#submit').text('Submit');
                 $('#submit').val('submit_product');
                 
            

           
          });

          $(document).on('click', '.view', function(){
            var product_ID = $(this).attr("id");
            $('#product_modal_title').text('View Product');
            $('#product_modal_content').html('');
            $.ajax({
            type        :   'POST',
            url:"datatable/products/modal.php",
            data        :   {action:"product_view",product_ID:product_ID},
            dataType    :   'html',
            complete     :   function(data) {
              $('#product_modal_content').html(data.responseText);
                }
            });
                $('#submit').show();
                 $('#submit').text('Update');
                 $('#submit').val('submit_upproduct');

            });

           $(document).on('click', '.edit', function(){
            var product_ID = $(this).attr("id");
             $('#product_modal_title').text('Edit this Product');
             $('#product_modal_content').html('');
             $.ajax({
            type        :   'POST',
            url:"datatable/products/modal.php",
            data        :   {action:"product_edit",product_ID:product_ID},
            dataType    :   'html',
            complete     :   function(data) {
              $('#product_modal_content').html(data.responseText);
                }
            });
            
            });
            $(document).on('click', '.delete', function(){
               var product_ID = $(this).attr("id");
            $('#product_modal_title').text('Delete this Product');
            $('#product_modal_content').html('');
            $.ajax({
            type        :   'POST',
            url:"datatable/products/modal.php",
            data        :   {action:"product_delete",product_ID:product_ID},
            dataType    :   'html',
            complete     :   function(data) {
              $('#product_modal_content').html(data.responseText);
                }
            });
            
            $('#submit').hide();
            });

              $(document).on('click', '#submit', function(){
             
              // alert('asdasd');
             
                  $('#product_modal').modal('hide');
              
            
            });
          } );


        </script>
        </body>

</html>
