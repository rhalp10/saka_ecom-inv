<?php 
include('dbconfig.php');
session_start();
?>
<!doctype html>
<html lang="en">

<?php 
  include ('x-head.php')
?>
  <body>
 <?php 
 include('x-header.php');
 ?>
 <link rel="stylesheet" type="text/css" href="datatables/datatables.min.css"/>

<main role="main">
<br>


  <!-- Marketing messaging and featurettes
  ================================================== -->
  <!-- Wrap the rest of the page in another container to center all the content. -->

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
         <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
         </div>
         </form>
      </div>
   </div>
</div>
<!-- Modal -->
<div class="modal fade" id="modal_cart" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header" id="modal_header">
        <h5 class="modal-title" id="ActionModalLabel">Shopping Cart</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="cart_mbody">
       

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" id="checkout">Check out</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<?php 
include('x-footer.php');
?>
</main>
<?php 
include('x-script.php');
?>
<script type="text/javascript" src="datatables/datatables.min.js"></script>
<script type="text/javascript">
   $(document).ready(function(){
  refreshTable();
});
function refreshTable(){
    $('#cart_mbody').load('load_shoppincart.php', function(){
       setTimeout(refreshTable, 5000);
    });
}
$(document).ready(function() {
             
            var dataTable = $('#order_data').DataTable({
            "processing":true,
            "serverSide":true,
            "order":[],
            "ajax":{
              url:"dashboard/datatable/order/fetch_order.php",
              type:"POST"
            },
            "columnDefs":[
              {
                "targets":[0],
                "orderable":false,
              },
            ],

          });
            $(document).on('click', '.view', function(){
            var order_ID = $(this).attr("id");
            $('#account_modal_title').text('View Order');
            $('#order_modal').modal('show');
   
            
             $.ajax({
                url:"dashboard/datatable/order/fetch_single.php",
                method:'POST',
                data:{action:"order_view",order_ID:order_ID},
                dataType    :   'json',
                success:function(data)
                {


                  $('#acc_username').text(data.user_Name);
                  $('#acc_email').text(data.user_Email);
                  $('#acc_name').text(data.user_Fullname);
                  $('#acc_add').text(data.user_Address);
                  $( "#load_order" ).load( "dashboard/datatable/order/fetchtable.php?order_ID="+order_ID);

                  $('#submit_input').show();
                  $('#account_ID').val(order_ID);
                  $('#submit_input').text('Process');
                  $('#submit_input').val('order_process');
                  $('#operation').val("order_process");
                  
                }
              });


            });
  $(document).on('click', '#checkout', function(){
    or_ID = $('#or_ID').val();

  if(confirm("Are you sure you want to checkout this items?"))
    {
      if ($('#or_ID').length) {
        $.ajax({
            type        :   'POST',
            url:"action-data.php",
            data        :   {action:"checkout",or_ID:or_ID},
            dataType    :   'json',
            complete     :   function(data) {
              alert(data.responseJSON.msg);
              if (data.responseJSON.success) {
                    window.location.assign("order?or_ID="+or_ID);
              }
          
            }
        });
      }
      else{
         alert('You must order first');
      }
      
    
    }
    else
    {
      return false; 
    }
      
  
});
    $(document).on('click', '.remove_item', function(){
    
     var data_id   = $(this).data('id');
       
        $.ajax({
            type        :   'POST',
            url:"action-data.php",
            data        :   {action:"removeitemtoCart",data_id:data_id},
            dataType    :   'json',
            complete     :   function(data) {
              alert(data.responseJSON.msg);
            }
        });
 
    });
});
</script>
</body>
</html>
