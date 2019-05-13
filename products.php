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
 function month($date){
    if($date == '1' ){
      $var = "January";
    }
      if($date == '2' ){
        $var = "February";
      }
      if($date == '3' ){
        $var = "March";
      }
      if($date == '4' ){
        $var = "April";
      }
      if($date == '5' ){
        $var = "May";
      }
      if($date == '6' ){
        $var = "June";
      }
      if($date == '7' ){
        $var = "July";
      }
      if($date == '8' ){
        $var = "August";
      }
      if($date == '9' ){
        $var = "September";
      }
      if($date == '10'){
        $var = "October";
      }
      if($date == '11'){
        $var = "November";
      }
      if($date == '12'){
        $var = "December";
      }
      return $var;
  }
 ?>
 <style type="text/css">
   #prod_minus:hover{
    background-color: #dc3545;
    color: white;
   }
   #prod_plus:hover{
    background-color: #28a745;
    color: white;
   }
 </style>

<main role="main">

  <section class="jumbotron text-center">
    <div class="container">

      <h1 class="jumbotron-heading">LIST OF AVAILABLE PRODUCT</h1>
  
    </div>
    <h1 style="background-color: #693; padding: 5px; color: white;">Fruits and Vegetables </h1>
  </section>

  <div class="album py-5 bg-secondary">
    <div class="container">
        <?php 
      $sql = "SELECT * FROM `products` WHERE ctgy_ID = 1";
      $result = mysqli_query($conn, $sql);
      $count_question = mysqli_num_rows($result) ;
     
      ?>
      <div class="row">
        <?php 
         if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_array($result)) {
        $prod_ID = $row['prod_ID'];
      if (!empty($row['prod_Img'])) {
        
        $prod_Img = 'data:image/jpeg;base64,'.base64_encode($row['prod_Img']);
      }
      else{
        $prod_Img = "img/uploads/blank.png";
      }
        $prod_Name = $row['prod_Name'];
        $prod_Qnty = $row['prod_Weight'];
        
        if (isset($row['prod_ScientificName'])) {
           $prod_scientific_name= 'Scientific Name: '.$row['prod_ScientificName'];
        }
        else{
           $prod_scientific_name= '';
        }
       if (isset($row['prod_EnglishName'])) {
          $prod_english_name= 'English Name: <i>'.$row['prod_EnglishName'].'</i>';
        }
        else{
           $prod_english_name= '';
        }
        if (isset($row['prod_SeasonStart'])) {
             $prod_Season = 'Season: '. month($row["prod_SeasonStart"]).' - '.month($row["prod_SeasonEnd"]);
        }
        else{
           $prod_english_name= '';
        }
        if ($prod_Qnty > 0) {
          $av = "<label  class='btn btn-success btn-sm float-right'>Available</label>";
        }
        else{
           $av = "<label class='btn btn-danger btn-sm float-right'>Out of Stock</label>";
        }
         ?>

          <div class="col-md-4">
          <div class="card mb-4 shadow-sm" >
            <img  class="bd-placeholder-img card-img-top" src="<?php echo $prod_Img?>" width="100%" height="100%" >
            <div class="card-body" style="min-height: 200px;">
              <p class="card-text" >
              <strong><?php echo $prod_Name?><?php echo $av?></strong>
              <br>
              <?php echo $prod_scientific_name;?>
              <br>
              <?php echo $prod_english_name;?>
              </p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <button type="button" class="btn btn-sm btn-outline-primary" data-toggle="modal" data-target="#ActionModal"  data-id="<?php echo $prod_ID?>" id="view_prod">View</button>
                  <button type="button" class="btn btn-sm btn-outline-warning" data-toggle="modal" data-target="#ActionModal"  data-id="<?php echo $prod_ID?>" id="addcart_prod">Add to Cart</button>
                </div>
                <small class="text-muted"><strong> <?php echo $prod_Season?></strong></small>
              </div>
            </div>
          </div>
        </div>
   
         <?php
            }
          }
        ?>
      
      </div>
    </div>
  </div>

    <section class="jumbotron text-center">

    <h1 style="background-color: #693; padding: 5px; color: white;">Open Field Demonstration Project</h1>
  </section>


      <section class="jumbotron text-center">

    <h1 style="background-color: #693; padding: 5px; color: white;">Urban Agriculture Demonstration Project</h1>
  </section>



</main>

<!-- Modal -->
<div class="modal fade" id="ActionModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header" id="modal_header">
        <h5 class="modal-title" id="ActionModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         <div class="row">
        <div class="col-md-6">
           <img  class="bd-placeholder-img card-img-top" src="img/uploads/blank.png" width="100%" height="100%" id="modal_prodImg">
        </div>
        <div class="col-md-6">
          <h6 id="modal_prodName"></h6>
          <div id="modal_prodQnty"></div>
          <hr>
          <p id="modal_prodDescription"></p>
         
            <div id="modal_prodPrice"><b>PRICE:</b> &#x20b1; 180 Per KG </div>
            
        
           <div class="input-group mb-3"  style="width: 150px;">

              <div class="input-group-prepend">
                <span class="input-group-text" id="prod_minus">-</span>
              </div>
              <input type="text" class="form-control text-center" aria-label="Amount (to the nearest dollar)" id="item_number" value="1"  pattern="\d*" maxlength="4">
              <div class="input-group-append">
                <span class="input-group-text" id="prod_plus" >+</span>
              </div>
            </div>
         
            <button type="button" class="btn btn-sm btn-warning" id="addtoCart">Add to Cart</button>
        </div>
      </div>
      </div>
      <div class="modal-footer">
           <input type="hidden" name="mprod_ID" id="mprod_ID" value="">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
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
include('x-script.php');
?>
<script type="text/javascript">
  $(document).ready(function(){
  refreshTable();
});
function refreshTable(){
    $('#cart_mbody').load('load_shoppincart.php', function(){
       setTimeout(refreshTable, 5000);
    });
}


$(document).on('click', '#view_prod', function(){

    var data_id = $(this).data('id');
 
     var mh = document.getElementById("modal_header");
        mh.className = mh.className.replace(/\bbg-primary\b/g, "");
        mh.className = mh.className.replace(/\bbg-danger\b/g, "");
        $('#modal_header').css("color","white");
        mh.classList.add("modal-header");
        mh.classList.add("bg-info");
        $('#ActionModalLabel').html('View');
        $('#modal-loading').show();
        $.ajax({
            type        :   'POST',
            url:"action-data.php",
            data        :   {action:"product_view",data_id:data_id},
            dataType    :   'json',
            complete     :   function(data) {
              
              $("#mprod_ID").val(data_id);
              $("#modal_prodImg").attr("src",data.responseJSON.prod_Img);
              $('#modal_prodName').html(data.responseJSON.prod_Name);
              $('#modal_prodDescription').text(data.responseJSON.prod_Description);
              $('#modal_prodScientificName').text(data.responseJSON.prod_ScientificName);
              $('#modal_prodEnglishName').text(data.responseJSON.prod_EnglishName);
              $('#modal_prodPrice').html('<b>PRICE:</b> &#x20b1; '+data.responseJSON.prod_Price+' Per KG ');
              $('#modal_prodQnty').html('Available: (<i id="avQnty">'+data.responseJSON.prod_Qnty+'</i>) KG');
              $('#modal_prodSeason').text(data.responseJSON.prod_Season);
            
               
            }
        })



  
});
$(document).on('click', '#addcart_prod', function(){

    var data_id = $(this).data('id');
 
     var mh = document.getElementById("modal_header");
        mh.className = mh.className.replace(/\bbg-primary\b/g, "");
        mh.className = mh.className.replace(/\bbg-danger\b/g, "");
        $('#modal_header').css("color","white");
        mh.classList.add("modal-header");
        mh.classList.add("bg-info");
        $('#ActionModalLabel').html('Add to Cart');
        $('#modal-loading').show();
        $.ajax({
            type        :   'POST',
            url:"action-data.php",
            data        :   {action:"product_view",data_id:data_id},
            dataType    :   'json',
            complete     :   function(data) {
              $("#mprod_ID").val(data_id);
              $("#modal_prodImg").attr("src",data.responseJSON.prod_Img);
              $('#modal_prodName').html(data.responseJSON.prod_Name);
              $('#modal_prodDescription').text(data.responseJSON.prod_Description);
              $('#modal_prodScientificName').text(data.responseJSON.prod_ScientificName);
              $('#modal_prodEnglishName').text(data.responseJSON.prod_EnglishName);
              $('#modal_prodPrice').html('<b>PRICE:</b> &#x20b1; '+data.responseJSON.prod_Price+' Per KG ');
              $('#modal_prodQnty').html('Available: (<i id="avQnty">'+data.responseJSON.prod_Qnty+'</i>) KG');
              $('#modal_prodSeason').text(data.responseJSON.prod_Season);
            
               
            }
        })



  
});

 $(document).on('click', '#prod_minus', function(){
  var item_qty = $('#item_number').val();
 
 
  
  if (parseFloat(item_qty) <= 1.00) {

  }
 
  else{
      var  new_item_qty = parseFloat(item_qty) - .1;
      new_item_qty = parseFloat(new_item_qty).toFixed( 2 );
    $('#item_number').val(new_item_qty);
  }

  
});
  $(document).on('click', '#prod_plus', function(){
     var item_qty = $('#item_number').val();
     var avQnty = $('#avQnty').text();

  if (isNaN(item_qty)) {
    $('#item_number').val('1');
  }
  else {
      if (parseFloat(avQnty) == parseFloat(item_qty)){

  }
 
  else{
var  new_item_qty = parseFloat(item_qty) + .1;
  
  new_item_qty = parseFloat(new_item_qty).toFixed( 2 );
   
    $('#item_number').val(new_item_qty);
  }
  }
 
    
  
  
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

  $(document).on('click', '#addtoCart', function(){
      if(confirm("Are you sure you want to cart this items?"))
    {
      var prod_ID = $("#mprod_ID").val();
      var item_qty = $('#item_number').val();
  
        $.ajax({
            type        :   'POST',
            url:"action-data.php",
            data        :   {action:"addtoCart",prod_ID:prod_ID,item_qty:item_qty},
            dataType    :   'json',
            complete     :   function(data) {
              alert(data.responseJSON.msg);
            }
        });
    }
    else
    {
      return false; 
    }
    });
  
function productsAdd() {
  $("#cartTable tbody").append(
      "<tr>" +
        "<td>21</td>" +
        "<td>My First Video</td>" +
        "<td>6/11/2015</td>" +
        "<td>www.pluralsight.com</td>" +
      "</tr>"
  );
}




</script>

</body>
</html>
