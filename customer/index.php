<?php include("header.php");?>


    <!-- Products Start -->
	<?php 
	if(isset($_GET['data'])){
	?>
    <div class="container-fluid pt-5">
        <div class="text-center mb-4">
            <h2 class="section-title px-5"><span class="px-2"><?php echo strtoupper($_GET['category']);?> PRODUCTS</span></h2>
        </div>
        <div class="row px-xl-5 pb-3">
			<?php 
			if(isset($_POST['search'])){
				$product    = $_POST['product'];
				$products   = $mysqli->query("SELECT * from pos_items where item_name LIKE '%$product%'");
			} else {
				$id         = $_GET['data'];
				$products   = $mysqli->query("SELECT * from pos_items where category='$id'");
			}
			while($valp = $products->fetch_object()){	
			?>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="card product-item border-0 mb-4">
                    <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                        <img class="i" src="../admin/assets/menu/<?php echo $valp->image;?>" width="300px" height="300px">
                    </div>
                    <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                        <h6 class="text-truncate mb-3"><?php echo $valp->item_name;?></h6>
                        <div class="d-flex justify-content-center">
							<p class="mb-4"><b>Small | </b> <br>  ₱ <?php echo number_format($valp->small,2);?> | </p> 
							<p class="mb-4"><b>Meduim | </b> <br>  ₱ <?php echo number_format($valp->meduim,2);?> |</p>
							<p class="mb-4"><b>Large </b> <br>  ₱ <?php echo number_format($valp->large,2);?></p>
                        </div>
                    </div>
                    <div class="card-footer d-flex justify-content-center bg-light border">
                        <a href="product-details.php?id=<?php echo $valp->item_id;?>" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>View Detail</a>
                    </div>
                </div>
            </div>
			
			<?php } ?>
           
        </div>
    </div>
	<?php } ?>

    
	<?php include("footer.php");?>