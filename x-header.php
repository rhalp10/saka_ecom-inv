
<header>
  <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <a class="navbar-brand" href="index"><img src="img/icon1.png" width="50%" style="max-width:80px; margin-top: -7px; padding: 0px;"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item <?php echo $active_ul_product?>">
          <a class="nav-link" href="products">Crops and Goods <?php echo $active_ul_product_span?></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="https://www.facebook.com/pauljasminrey" target="_BLANK">Visit Us</a>
        </li>
      </ul>
     <i class="fas fa-shopping-cart"></i>
      <form class="form-inline mt-2 mt-md-0">
        <div class="btn-group">
        <a class="btn btn-primary  my-2 my-sm-0" href="#" data-toggle="modal" data-target="#modal_cart" >Cart</a>
        <a class="btn btn-success  my-2 my-sm-0" href="authentication" role="button">Login</a>
      </div>
      </form>
    </div>
  </nav>
</header>