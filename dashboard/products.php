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
    <title>Manage Goods and Crops</title>


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
        <h1 class="h2">List of Goods and Crops</h1>
        
      </div>
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
              <th>Quantity(KG)</th>
              <th>Season</th>
              <th>Status</th>
              <th>Action</th>
            </tr>
          </thead>
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
      <form method="post" id="product_form" enctype="multipart/form-data">
            
             <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="prod_img">
                 <img src="../img/uploads/blank.png" class="rounded float-left" alt="..." id="prod_img_container" runat="server" style="max-height: 250px; max-width: 250px;  background-repeat:no-repeat;
  background-size:cover;height: auto;
width:auto;">
              </label>
              <input type="file" class="form-control-file" id="prod_img" name="prod_img">
                </div>
                <div class="form-group col-md-6">
                  <label for="prod_weight" id="prod_weight_label">Available:(<i id="prod_weight"></i>)</label>
                  
                </div>
              </div>
              <div class="form-group">
                <label for="prod_name" class="col-form-label">Name:</label>
                <input type="text" class="form-control" id="prod_name" name="prod_name">
              </div>
              <div class="form-group">
        <label for="prod_category">Category</label>
        <select class="form-control" id="prod_category" name="prod_category">
          <?php 
          $sql = "SELECT * FROM `category`";

          $result = mysqli_query($conn, $sql);
          while ($row = mysqli_fetch_array($result)) {
          ?>
          <option value="<?php echo $row["ctgy_ID"];?>"><?php echo $row["ctgy_Name"];?></option>
          <?php
          }
          ?>
        </select>
      </div>
              <div class="form-group">
                <label for="prod_descr" class="col-form-label">Description:</label>
                <textarea class="form-control" id="prod_descr"  name="prod_descr"></textarea>
              </div>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="prod_sciname">Scientific Name</label>
                  <input type="text" class="form-control" id="prod_sciname" name="prod_sciname" placeholder="" value="">
                </div>
                <div class="form-group col-md-6">
                  <label for="prod_engname">English Name</label>
                  <input type="text" class="form-control" id="prod_engname" name="prod_engname" placeholder="" value="">
                </div>
              </div>
               <div class="form-row">
                <div class="form-group col-md-12">
                  <label for="prod_price">Price:</label>
                  <input type="text" class="form-control " aria-label="Amount (to the nearest dollar)" id="prod_price" name="prod_price" value="0"   maxlength="6" >
                </div>
               <!--  <div class="form-group col-md-6">
                  <label for="prod_qnty">Weight (KG)</label>
                  <input type="text" class="form-control " aria-label="Amount (to the nearest dollar)" id="prod_qnty" id="prod_qnty" value="0"  pattern="\d*" maxlength="6" >
                </div> -->
              </div>
              <div class="form-row">
                <div class="form-group col-md-12">
                  <label for="prod_season">Season:</label>
                </div>
                <div class="form-group col-md-6">
                  <label for="prod_season_start">Start:</label>
                  <select class="form-control" id="prod_season_start" name="prod_season_start">
                    <option value='1'>January</option>
                    <option value='2'>February</option>
                    <option value='3'>March</option>
                    <option value='4'>April</option>
                    <option value='5'>May</option>
                    <option value='6'>June</option>
                    <option value='7'>July</option>
                    <option value='8'>August</option>
                    <option value='9'>September</option>
                    <option value='10'>October</option>
                    <option value='11'>November</option>
                    <option value='12'>December</option>
                  </select>
                 
                </div>
                <div class="form-group col-md-6">
                  <label for="prod_season_end">End:</label>
                  <select class="form-control" id="prod_season_end" name="prod_season_end">
                    <option value='1'>January</option>
                    <option value='2'>February</option>
                    <option value='3'>March</option>
                    <option value='4'>April</option>
                    <option value='5'>May</option>
                    <option value='6'>June</option>
                    <option value='7'>July</option>
                    <option value='8'>August</option>
                    <option value='9'>September</option>
                    <option value='10'>October</option>
                    <option value='11'>November</option>
                    <option value='12'>December</option>
                  </select>
                </div>
              </div>
        
           
      </div>
      <div class="modal-footer">
        <input type="hidden" name="product_ID" id="product_ID" />
        <input type="hidden" name="operation" id="operation" />
        <button type="submit" class="btn btn-primary submit" id="submit_input" value="submit_product">Submit</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
       </form>
    </div>
  </div>
</div>

<div class="modal fade" id="delproduct_modal" tabindex="-1" role="dialog" aria-labelledby="product_modal_title" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="product_modal_title">Delete this Product</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="text-center">
        <div class="btn-group">
        <button type="submit" class="btn btn-danger" id="product_delform">Delete</button>
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
            function readURL(input) {
        
                  if (input.files && input.files[0]) {
                    var reader = new FileReader();
                
                    reader.onload = function(e) {
                      $('#prod_img_container').attr('src', e.target.result);
                    }
                
                    reader.readAsDataURL(input.files[0]);
                  }
                }
                
                $("#prod_img").change(function() {
                  readURL(this);
                });


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

          $(document).on('submit', '#product_form', function(event){
            event.preventDefault();
           var prod_img = $('prod_img').val();
           var prod_name = $('prod_name').val();
           var prod_category = $('prod_category').val();
           var prod_descr = $('prod_descr').val();
           var prod_sciname = $('prod_sciname').val();
           var prod_engname = $('prod_engname').val();
           var prod_price = $('prod_price').val();
           var prod_qnty = $('prod_qnty').val();
           var prod_season_start = $('prod_season_start').val();
           var prod_season_end = $('prod_season_end').val();

   
  
            var extension = $('#prod_img').val().split('.').pop().toLowerCase();
            if(extension != '')
            {
              if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)
              {
                alert("Invalid Image File");
                $('#prod_img').val('');
                return false;
              }
            } 
         
              $.ajax({
                url:"datatable/products/insert.php",
                method:'POST',
                data:new FormData(this),
                contentType:false,
                processData:false,
                success:function(data)
                {
                  alert(data);
                  $('#product_form')[0].reset();
                  $('#product_modal').modal('hide');
                  dataTable.ajax.reload();
                }
              });
           
          });

          $(document).on('click', '.add', function(){
            $('#product_modal_title').text('Add New Product');
            $('#product_form')[0].reset();
            $('#prod_img_container').attr('src', '../img/uploads/blank.png');
             $("#prod_img").show();
            $('#submit_input').show();
            $('#submit_input').text('Submit');
            $('#submit_input').val('submit_product');
            $('#operation').val("submit_product");
            $('#prod_weight_label').hide();
            
            
           
          });

          $(document).on('click', '.view', function(){
            var product_ID = $(this).attr("id");
            $('#product_modal_title').text('View Product');
            $('#product_modal').modal('show');

             $.ajax({
                url:"datatable/products/fetch_single.php",
                method:'POST',
                data:{action:"product_view",product_ID:product_ID},
                dataType    :   'json',
                success:function(data)
                {

            $("#prod_name").prop("disabled", true);
            $("#prod_category").prop("disabled", true);
            $("#prod_descr").prop("disabled", true);
            $("#prod_sciname").prop("disabled", true);
            $("#prod_engname").prop("disabled", true);
            $("#prod_price").prop("disabled", true);
            $("#prod_weight").prop("disabled", true);
            $("#prod_season_end").prop("disabled", true);
            $("#prod_season_start").prop("disabled", true);
             $("#prod_img").hide();
            

                  $('#prod_img_container').attr('src', data.prod_Img);
                  $('#prod_name').val(data.prod_Name);
                  $('#prod_category').val(data.ctgy_ID).change();
                  $('#prod_descr').val(data.prod_Description);
                  $('#prod_sciname').val(data.prod_ScientificName);
                  $('#prod_engname').val(data.prod_EnglishName);
                  $('#prod_price').val(data.prod_Price);
                  $('#prod_weight').text(data.prod_Weight);
                  $('#prod_season_start').val(data.prod_SeasonStart).change();
                  $('#prod_season_end').val(data.prod_SeasonEnd).change();
                  $('#submit_input').hide();
                  $('#prod_weight_label').show();
                  $('#product_ID').val(product_ID);
                  $('#operation').val("product_view");
                  
                }
              });


            });
            $(document).on('click', '.edit', function(){
            var product_ID = $(this).attr("id");
            $('#product_modal_title').text('View Product');
            $('#product_modal').modal('show');

             $.ajax({
                url:"datatable/products/fetch_single.php",
                type:'POST',
                data:{action:"product_view",product_ID:product_ID},
                dataType    :   'json',
                success:function(data)
                {

            $("#prod_name").prop("disabled", false);
            $("#prod_category").prop("disabled", false);
            $("#prod_descr").prop("disabled", false);
            $("#prod_sciname").prop("disabled", false);
            $("#prod_engname").prop("disabled", false);
            $("#prod_price").prop("disabled", false);
            $("#prod_weight").prop("disabled", false);
            $("#prod_season_end").prop("disabled", false);
            $("#prod_season_start").prop("disabled", false);

                  $('#prod_img_container').attr('src', data.prod_Img);
                    $("#prod_img").show();
                     $('#prod_name').val(data.prod_Name);
                  $('#prod_category').val(data.ctgy_ID).change();
                  $('#prod_descr').val(data.prod_Description);
                  $('#prod_sciname').val(data.prod_ScientificName);
                  $('#prod_engname').val(data.prod_EnglishName);
                  $('#prod_price').val(data.prod_Price);
                  $('#prod_weight').text(data.prod_Weight);
                  $('#prod_season_start').val(data.prod_SeasonStart).change();
                  $('#prod_season_end').val(data.prod_SeasonEnd).change();
                  $('#submit_input').show();
                  $('#prod_weight_label').show();
                  $('#submit_input').text('Update');
                  $('#submit_input').val('submit_upproduct');
                  $('#operation').val("product_edit");
                  $('#product_ID').val(product_ID);
                  
                }
              });


            });
            $(document).on('click', '.delete', function(){
            var product_ID = $(this).attr("id");
             $('#delproduct_modal').modal('show');
              $('.submit').hide();
             
             $('#product_ID').val(product_ID);
            });

           


          $(document).on('click', '#product_delform', function(event){
             var product_ID =  $('#product_ID').val();
            $.ajax({
             type        :   'POST',
             url:"datatable/products/insert.php",
             data        :   {operation:"delete_product",product_ID:product_ID},
             dataType    :   'json',
             complete     :   function(data) {
               $('#delproduct_modal').modal('hide');
               alert(data.responseText);
               dataTable.ajax.reload();
                
             }
            })
           
          });
          
          } );


        </script>
        </body>

</html>
