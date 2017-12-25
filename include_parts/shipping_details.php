<?php
	$select="ar_id,name,email,image,phone,landline,address,acnt_created";
    $from="ambit_registration";
    $condition=array("ar_id"=>trim($v["uploader"]));
    $v2=getDetails(doSelect1($select, $from, $condition))[0];
?>
<!-- reviews tabs content start-->
<section role="tabpanel" aria-hidden="false" class="content" id="classified_shipping" class="reviews-cls">
	<h2 class="print-heading">Shipping/Payment</h2>
	<section id="comments-template">
		<div class="row">
			<div class="col-sm-8">
				<p class="shipping-payment-heading">
					Shipping Options
				</p>
				<p class="border-bottom-gray paddin-top-20">
					All Of NZ > urban > Courier
					<span class="pull-right bold">
						$
						<?= $v['shipping_cost'] ?>
					</span>
				</p>
				<? if($v['pick_ups'] == 2 || $v['pick_ups'] == 3): ?>
					<span class="bold">Seller allows pick-ups</span>
					<br> Seller Location:
					<span class="bold"><?= $v2['address'] ?></span>

					<? else: ?>
						<span class="bold">Seller does not allows pick-ups</span>
						<? endif; ?>
			</div>
			<div class="col-sm-4">
				<p class="shipping-payment-heading">
					Payment Options
				</p>
				<p class="border-bottom-gray paddin-top-20">
					<span class="bold">
						Other Options
					</span>
				</p>
				<p>
					<?php if($v['payment']):?>
					<?= preg_replace('(\|\|)', ',' , $v['payment']) ?>
						<?php else: ?> -------
						<?php endif; ?>
				</p>
			</div>
		</div>
		<!-- .comments-wrap -->
	</section>
	<!-- #comments-template -->
</section>
<style>
	.shipping-payment-heading {
		font-weight: 400;
		font-size: 1.3em;
		border-bottom: 2px gray solid;
	}

	.paddin-top-20 {
		padding-top: 20px;
	}

	.bold {
		font-weight: 500;
	}

	.border-bottom-gray {
		border-bottom: 1px gray solid;
	}
</style>
<!-- reviews tabs content end-->