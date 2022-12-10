	<?php include("header.php");?>

    <!-- Shop Detail Start -->
    <div class="container-fluid py-5">
	
			<?php 
				$id         = $_GET['id'];
				$products   = $mysqli->query("SELECT * from pos_items where item_id='$id'");
				while($valp = $products->fetch_object()){	
			?>
        <div class="row px-xl-5">
            <div class="col-lg-5 pb-5">
                <div id="product-carousel" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner border">
                        <div class="carousel-item active">
                            <img class="w-100 h-100" src="admin/assets/menu/<?php echo $valp->image;?>" alt="Image">
                        </div>
                    </div>

                </div>
            </div>

            <div class="col-lg-7 pb-5">
				<?php if(isset($_GET['added'])){?>
				<div class="alert alert-info alert-dismissable">
					<strong>Order Added!</strong> Please see your cart!
				</div>
				<?php } ?>
                <h3 class="font-weight-semi-bold"><?php echo $valp->item_name;?></h3>

                <h3 class="font-weight-semi-bold mb-4"> ₱ <?php echo number_format($valp->item_price,2);?></h3>
                <p class="mb-4"><b>Description :</b> <br> <?php echo $valp->description;?></p>
				<p class="mb-4"><b>Small :</b> <br>  ₱ <?php echo number_format($valp->small,2);?></p>
                <p class="mb-4"><b>Meduim :</b> <br>  ₱ <?php echo number_format($valp->meduim,2);?></p>
                <p class="mb-4"><b>Large :</b> <br>  ₱ <?php echo number_format($valp->large,2);?></p>
				<hr>
				
            </div>
        </div>
     
	<?php } ?>
    </div>
    <!-- Shop Detail End -->

	<?php include("footer.php");?>