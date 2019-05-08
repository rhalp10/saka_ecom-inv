
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.5">
    <title>Dashboard Template · Bootstrap</title>


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

      <h2>List of Product</h2>
      <div class="table-responsive">
         <button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#ActionModal"  data-id="<?php echo $prod_ID?>" id="view_prod">Add</button>
         <br><br>
        <table class="table table-striped table-sm" id="example">
          <thead>
            <tr>
              <th>#</th>
              <th>Header</th>
              <th>Header</th>
              <th>Header</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>1,001</td>
              <td>Lorem</td>
              <td>ipsum</td>
              <td>dolor</td>
              <td>
                  <div class="btn-group">
                  <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#ActionModal"  data-id="<?php echo $prod_ID?>" id="view_prod">View</button>
                  <button type="button" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#ActionModal"  data-id="A-<?php echo $prod_ID?>" id="action">Edit</button>
                   <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#ActionModal"  data-id="A-<?php echo $prod_ID?>" id="action">Delete</button>
                </div>
              </td>
            </tr>
            <tr>
              <td>1,002</td>
              <td>amet</td>
              <td>consectetur</td>
              <td>adipiscing</td>
              <td>
                  <div class="btn-group">
                  <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#ActionModal"  data-id="<?php echo $prod_ID?>" id="view_prod">View</button>
                  <button type="button" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#ActionModal"  data-id="A-<?php echo $prod_ID?>" id="action">Edit</button>
                   <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#ActionModal"  data-id="A-<?php echo $prod_ID?>" id="action">Delete</button>
                </div>
              </td>
            </tr>
            <tr>
              <td>1,003</td>
              <td>Integer</td>
              <td>nec</td>
              <td>odio</td>
              <td>
                  <div class="btn-group">
                  <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#ActionModal"  data-id="<?php echo $prod_ID?>" id="view_prod">View</button>
                  <button type="button" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#ActionModal"  data-id="A-<?php echo $prod_ID?>" id="action">Edit</button>
                   <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#ActionModal"  data-id="A-<?php echo $prod_ID?>" id="action">Delete</button>
                </div>
              </td>
            </tr>
            <tr>
              <td>1,003</td>
              <td>libero</td>
              <td>Sed</td>
              <td>cursus</td>
              <td>
                  <div class="btn-group">
                  <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#ActionModal"  data-id="<?php echo $prod_ID?>" id="view_prod">View</button>
                  <button type="button" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#ActionModal"  data-id="A-<?php echo $prod_ID?>" id="action">Edit</button>
                   <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#ActionModal"  data-id="A-<?php echo $prod_ID?>" id="action">Delete</button>
                </div>
              </td>
            </tr>
     
          </tbody>
        </table>
      </div>
    </main>
  </div>
</div>

<script src="../js/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
      <script>window.jQuery || document.write('<script src="../js/jquery-slim.min.js"><\/script>')</script>

      <script src="../js/bootstrap.bundle.min.js" integrity="sha384-xrRywqdh3PHs8keKZN+8zzc5TX0GRTLCcmivcbNJWm2rs5C8PRhcEn3czEjhAO9o" crossorigin="anonymous"></script>
      <script src="../js/jquery-3.3.1.min.js" ></script>
        <script src="../js/feather.min.js"></script>
        <script src="../js/dashboard.js"></script>
        <script type="text/javascript" src="../datatables/datatables.min.js"></script>
        <script type="text/javascript">
          $(document).ready(function() {
              $('#example').DataTable();
          } );
        </script>
        </body>

</html>
