  <!-- FOOTER -->
  <footer class="container">
    <p class="float-right"><a href="#">Back to top</a></p>
    <p> &copy; <?php
            $fromYear = 2019; 
            $thisYear = (int)date('Y'); 
            echo $fromYear . (($fromYear != $thisYear) ? '-' . $thisYear : '');?> Cavite State University Main Indang - Saka, All rights reserved</p>
  </footer>