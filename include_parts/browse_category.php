<style>
.categoty-list {
	display: flex;
	flex-direction: column;
	flex-wrap: wrap;
	max-height: 200px;
	align-content: flex-start;
}

.category-list__item {
	display: block;
	width: 33.33%;
	border: none !important;
	padding: 0 15px 0 0 !important;
	white-space: nowrap;
	overflow: hidden;
	text-overflow: ellipsis;
}

.category-list__item__link {
	text-decoration: none;
	color: rgb(0, 93, 212);
}

.category-list__item__link:hover {
	text-decoration: none;
}

.padding-top {
	padding-top: 10px;
}

@media (max-width: 575px) {
	.categoty-list {
		max-height: 310px;
	}
	.category-list__item {
		width: 50%;
	}
}
</style>
<div id="directory_featured_category_list-2" class="widget all_category_list_widget">
	<div class="widget-wrap widget-inside">
		<h3 class="widget-title">Browse Categories</h3>
		<section class="row">
			
			<article class="">
				<h4 class="padding-top">General Items</h4>
				<ul class="categoty-list">
				<?php
					$category=getDetails(doSelect("gic_id,category","general_item_category",array("parent_id"=>0),' ORDER BY rand() LIMIT 20')); 
				?>
				<?php foreach($category as $k=>$v):?>
					<li class="category-list__item">
						<a class="category-list__item__link" href="general_item_listing.php?category=<?php echo $v[" gic_id "]; ?>" title="">
							<?= $v["category"] . " {$k}" ?>
						</a>  
					</li>
				<?php endforeach; ?>
					<li class="view category-list__item">
						<a class="category-list__item__link" href="general_item_listing.php">View all &raquo;</a>
					</li>
				</ul>
			</article>

			<article class="">
				<h4 class="padding-top">Proprty</h4>
				<ul class="categoty-list">
				<?php
					$category=getDetails(doSelect("pc_id,category","property_category",array("parent_id"=>0),' ORDER BY rand() LIMIT 20'));
				?>
				<?php foreach($category as $k=>$v):?>
					<li class="category-list__item">
						<a class="category-list__item__link" href="property_listing.php?category=<?php echo $v[" pc_id "]; ?>" title="">
							<?= $v["category"] . " {$k}" ?>
						</a>  
					</li>
				<?php endforeach; ?>
					<li class="view category-list__item">
						<a class="category-list__item__link" href="property_listing.php">View all &raquo;</a>
					</li>
				</ul>
			</article>
			<article class="">
				<h4 class="padding-top">Jobs</h4>
				<ul class="categoty-list">
				<?php
					$category=getDetails(doSelect("jc_id,category","job_category",array("parent_id"=>0),' ORDER BY rand() LIMIT 20'));
				?>
				<?php foreach($category as $k=>$v): ?>
					<li class="category-list__item">
						<a class="category-list__item__link" href="job_listing.php?category=<?php echo $v[" jc_id "]; ?>" title="">
							<?= $v["category"] . " {$k}" ?>
						</a>  
					</li>
				<?php endforeach; ?>
					<li class="view category-list__item">
						<a class="category-list__item__link" href="job_listing.php">View all &raquo;</a>
					</li>
				</ul>
			</article>
												
			<article class="">
				<h4 class="padding-top">Car and Moterbikes</h4>
				<ul class="categoty-list">
				<?php
				$category=getDetails(doSelect("cc_id,category","car_category",array("parent_id"=>0),' ORDER BY rand() LIMIT 20'));
				?>
				<?php foreach($category as $k=>$v): ?>
					<li class="category-list__item">
						<a class="category-list__item__link" href="car_listing.php?category=<?php echo $v[" cc_id "]; ?>" title="">
							<?= $v["category"] . " {$k}" ?>
						</a>  
					</li>
				<?php endforeach; ?>
					<li class="view category-list__item">
						<a class="category-list__item__link" href="car_listing.php">View all &raquo;</a>
					</li>
				</ul>
			</article>
		</section>
	</div>
</div>