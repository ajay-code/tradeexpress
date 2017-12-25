<div id="myCarousel" class="carousel slide" data-ride="carousel">
		<!-- Indicators -->
		<div class="carousel-inner" role="listbox">
			<?php
				$s_q="select * from slides";
				$s_res=mysqli_query($conn, $s_q);
				$s_i=0;
				while($s_data=mysqli_fetch_assoc($s_res)){
					extract($s_data);
					$s_i++;
			?>
			<div class="item <?php if($s_i==1){echo 'active';}?>" style="background:url('admin/<?=$path?>')no-repeat center 0px;background-size:cover;"> 
				<div class="container">
					<div class="carousel-caption" style="display:none">
						<div>
						<h3><?=$heading?></h3>
						<p><?=$text?></p>
						</div>
					</div>
				</div>
			</div>
			<?php }?>
		</div>
    </div> 
	<!-- //slider -->
	