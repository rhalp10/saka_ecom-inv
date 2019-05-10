<?php 

include('../../../dbconfig.php');
if (isset($_POST['action'])) {
	
	if (
		$_POST['action'] == "product_add"  ||
		$_POST['action'] == "product_view" ||
		$_POST['action'] == "product_edit"   ) {
		if (isset($_POST['product_ID'])) {
			$product_ID = $_POST['product_ID'];
			$sql = "SELECT * FROM `products` WHERE prod_ID = $product_ID";
			$result = mysqli_query($conn, $sql);
		    while ($row = mysqli_fetch_array($result)) {
		    	$prod_Name = $row["prod_Name"];
				$prod_Description = $row["prod_Description"];
				$prod_ScientificName = $row["prod_ScientificName"];
				$prod_EnglishName = $row["prod_EnglishName"];
				$prod_Price = $row["prod_Price"];
				$prod_Weight = $row["prod_Weight"];
				$prod_Season = $row["prod_Season"];
				$prod_Date = $row["prod_Date"];
				$ctgy_ID = $row["ctgy_ID"];
		    }
			
		}
		else{
			$prod_Name = "";
			$prod_Description  = "";
			$prod_ScientificName  = "";
			$prod_EnglishName  = "";
			$prod_Price  = "";
			$prod_Weight  = "";
			$prod_Season  = "";
			$prod_Date  = "";
			$ctgy_ID  = "";
		}
		?>
		<form>
		          <div class="form-group">
		    <label for="prod_img">Example file input</label>
		    <input type="file" class="form-control-file" id="prod_img" name="prod_img">
		  </div>
		          <div class="form-group">
		            <label for="prod_name" class="col-form-label">Name:</label>
		            <input type="text" class="form-control" id="prod_name" name="prod_name" value="<?php echo $prod_Name?>">
		          </div>
		          <div class="form-group">
		    <label for="prod_category">Category</label>
		    <select class="form-control" id="prod_category" name="prod_category">
		      <?php 
		      $sql = "SELECT * FROM `category`";

		      $result = mysqli_query($conn, $sql);
		      while ($row = mysqli_fetch_array($result)) {
		      	if ($row["ctgy_ID"] == $ctgy_ID) {
		      		$selected = "selected";
		      	}
		      	else{
		      		$selected = "";
		      	}
		      ?>
		      <option <?php echo $selected;?> value="<?php echo $row["ctgy_ID"];?>"><?php echo $row["ctgy_Name"];?></option>
		      <?php
		      }
		      ?>
		    </select>
		  </div>
		          <div class="form-group">
		            <label for="prod_descr" class="col-form-label">Description:</label>
		            <textarea class="form-control" id="prod_descr" ><?php echo $prod_Description?></textarea>
		          </div>
		          <div class="form-row">
		            <div class="form-group col-md-6">
		              <label for="prod_sciname">Scientific Name</label>
		              <input type="text" class="form-control" id="prod_sciname" name="prod_sciname" placeholder="" value="<?php echo $prod_ScientificName?>">
		            </div>
		            <div class="form-group col-md-6">
		              <label for="prod_engname">English Name</label>
		              <input type="text" class="form-control" id="prod_engname" name="prod_engname" placeholder="" value="<?php echo $prod_EnglishName?>">
		            </div>
		          </div>
		           <div class="form-row">
		            <div class="form-group col-md-6">
		              <label for="prod_price">Price:</label>
		              <input type="text" class="form-control " aria-label="Amount (to the nearest dollar)" id="prod_price" name="prod_price" value="0"  pattern="\d*" maxlength="6" value="<?php echo $prod_Price?>">
		            </div>
		            <div class="form-group col-md-6">
		              <label for="prod_qnty">Weight (KG)</label>
		              <input type="text" class="form-control " aria-label="Amount (to the nearest dollar)" id="prod_qnty" id="prod_qnty" value="0"  pattern="\d*" maxlength="6" value="<?php echo $prod_Weight?>">
		            </div>
		          </div>
        
		        </form>


		<?php
	}
	if ($_POST['action'] == "product_delete") {
		echo $_POST['product_ID'];
		?>
		<div class="text-center">
		<div class="btn-group">
		<button type="button" class="btn btn-danger">Delete</button>
		<button type="button" class="btn btn-secondary">Cancel</button>
		</div>
		</div>
		<?php


	}
}
?>