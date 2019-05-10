<?php 
 echo $current_url = $_SERVER['REQUEST_URI'];
$url_explde = explode('/', $current_url);

$pagefile_name = $url_explde[3];


function navlist($pagefile_name,$name,$link,$icon){
 
  if ($pagefile_name == $link) {
    $active_ul_snav = "active";
    $active_ul_snav_span = '<span class="sr-only">(current)</span>';
    
  }
  else{
     $active_ul_snav = '';
      $active_ul_snav_span = '';
  }
  ?>
   <li class="nav-item">
            <a class="nav-link <?php echo $active_ul_snav;?>" href="<?php echo $link;?>">
              <span data-feather="<?php echo $icon;?>"></span>
              <?php echo $name.' '.$active_ul_snav_span; ?>
            </a>
          </li>
  <?php
}
?>
<nav class="col-md-2 d-none d-md-block bg-light sidebar">
      <div class="sidebar-sticky">
        <ul class="nav flex-column">
          <?php 
          navlist($pagefile_name,"Dashboard","index","home");
          navlist($pagefile_name,"Harvest","harvest","file");
          navlist($pagefile_name,"Orders","orders","file");
          navlist($pagefile_name,"Products","products","shopping-cart");
           navlist($pagefile_name,"Account","account","users");
           navlist($pagefile_name,"Customers","customers","users");
          ?>
     <!--      <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="bar-chart-2"></span>
              Reports
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="layers"></span>
              Integrations
            </a>
          </li> -->
        </ul>

    <!--     <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
          <span>Saved reports</span>
          <a class="d-flex align-items-center text-muted" href="#">
            <span data-feather="plus-circle"></span>
          </a>
        </h6>
        <ul class="nav flex-column mb-2">
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="file-text"></span>
              Current month
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="file-text"></span>
              Last quarter
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="file-text"></span>
              Social engagement
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="file-text"></span>
              Year-end sale
            </a>
          </li>
        </ul> -->
      </div>
    </nav>