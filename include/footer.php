<?php
include_once("footer_main.php");
?>
<!-- #footer -->
</div>
<script type="text/javascript" async>
	jQuery(window).load(function () {

		/* Code start for map reload and center it on category page after tabs changing */
		jQuery(function () {
			jQuery(document).on('click', "ul.view_mode li #locations_map", function () {
				google.maps.event.trigger(map, 'resize');
				map.fitBounds(bounds);
				var center = bounds.getCenter();
				map.setCenter(center);
			})
		});
		/* Code end */

		if (jQuery('#locations_map').hasClass('active')) {
			jQuery('.tev_sorting_option').css('display', 'none');
			jQuery('#directory_sort_order_alphabetical').css('display', 'none');
		} else {
			jQuery('.tev_sorting_option').css('display', '');
			jQuery('#directory_sort_order_alphabetical').css('display', '');
		}
		jQuery('.viewsbox a.listview').click(function (e) {
			jQuery('.tev_sorting_option').css('display', '');
			jQuery('#directory_sort_order_alphabetical').css('display', '');
		});
		jQuery('.viewsbox a.gridview').click(function (e) {
			jQuery('.tev_sorting_option').css('display', '');
			jQuery('#directory_sort_order_alphabetical').css('display', '');
		});
		jQuery('.viewsbox a#locations_map').click(function (e) {
			jQuery('.tev_sorting_option').css('display', 'none');
			jQuery('#directory_sort_order_alphabetical').css('display', 'none');
		});
	});
</script>
<script>
	var jQuery = jQuery.noConflict();
	jQuery(document).ready(function () {
		jQuery.ajax({
			url: 'classifieds/wp-content/plugins/Tevolution/tmplconnector/sharrre.php',
			data: {
				"url": "classifieds/city/philadelphia/classified/nexus-5-white-32gb-unlocked-t-mobile-att/",
				"type": 'facebook',
			},
			success: function (result) {
				var counts = result.count;
				jQuery('.social-media-share .facebook_share .count').html(counts +
					'<span class="showlabel">&nbsp;Share</span>');
				return false;
			}
		});
	});
</script>
<script>
</script>
<script type="text/javascript" async>
	var category_map = '';
</script>
<!-- Login form -->

<script type="text/javascript" async>
	function sort_as_set(val) {
		if (document.getElementById('classified_sortby').value) {
			window.location = 'classifieds/classifiedscategory/mobile-tablets/?' + '&' + 'classified' + '_sortby=' + val;
		}
	}
</script>
<script type="text/javascript">
	var $mgc = jQuery.noConflict();
	$mgc(document).ready(function () {
		$mgc('#dc_jqmegamenu_widget-2-item .mega').dcMegaMenu({
			rowItems: 2,
			subMenuWidth: '',
			speed: 'normal',
			effect: 'fade',
			event: 'hover'
		});
	});
</script>

<link rel='stylesheet' id='jQuery_datepicker_css-css' href='images/jquery.ui.all.min.css' type='text/css' media='all' />
<script type='text/javascript' src='images/core.min.js'></script>
<script type='text/javascript' src='images/widget.min.js'></script>
<script type='text/javascript' src='images/tabs.min.js'></script>
<script type='text/javascript' src='images/jquery.blockui.min.js'></script>
<script type='text/javascript'>
	/* <![CDATA[ */
	var woocommerce_params = {
		"ajax_url": "\/classifieds\/wp-admin\/admin-ajax.php",
		"wc_ajax_url": "\/classifieds\/classifiedscategory\/mobile-tablets\/?wc-ajax=%%endpoint%%"
	};
	/* ]]> */
</script>
<script type='text/javascript' src='images/woocommerce.min.js'></script>
<script type='text/javascript' src='images/_supreme.min.js'></script>
<script type='text/javascript' src='images/wp-embed.min.js'></script>
<script type='text/javascript' src='images/position.min.js'></script>
<script type='text/javascript' src='images/menu.min.js'></script>
<script type='text/javascript' src='images/wp-a11y.min.js'></script>

<script type='text/javascript'>
	/* <![CDATA[ */
	var uiAutocompleteL10n = {
		"noResults": "No results found.",
		"oneResult": "1 result found. Use up and down arrow keys to navigate.",
		"manyResults": "%d results found. Use up and down arrow keys to navigate.",
		"itemSelected": "Item selected."
	};
	/* ]]> */
</script>
<script type='text/javascript' src='images/autocomplete.min.js'></script>
<script type='text/javascript' src='images/tevolution-script.min.js'></script>
<script type='text/javascript' src='images/jquery_cookies.js'></script>
<script type='text/javascript' src='images/mouse.min.js'></script>
<script type='text/javascript' src='images/slider.min.js'></script>
<script type='text/javascript' src='images/bootstrap-mini.js'></script>
<script type="text/javascript" async>
	jQuery(document).ready(function () {
		var custom_wrap_taxonomy = '.tevolution_taxonomy_wrap';
		var custom_wrap_archive = '.tevolution_archive_wrap';
		jQuery("blockquote").before('<span class="before_quote"></span>').after('<span class="after_quote"></span>'),
			jQuery(".viewsbox a#listview").click(function (i) {
				i.preventDefault(), jQuery(custom_wrap_taxonomy).removeClass("grid"), jQuery(custom_wrap_taxonomy).addClass(
						"list"), jQuery(custom_wrap_archive).removeClass("grid"), jQuery(custom_wrap_archive).addClass("list"), jQuery(
						".viewsbox a").attr("class", ""), jQuery(this).attr("class", "active"), jQuery(".viewsbox a.gridview").attr(
						"class", ""), jQuery.cookie("display_view", "list"), jQuery("#directory_listing_map").css("visibility",
						"hidden"), jQuery(custom_wrap_taxonomy).show(), jQuery(custom_wrap_archive).show(), jQuery("#listpagi").show(),
					jQuery("#directory_listing_map").height(0), "undefined" != typeof infoBubble && infoBubble.close()
			}), jQuery(".viewsbox a#gridview").click(function (i) {
				i.preventDefault(), jQuery(custom_wrap_taxonomy).removeClass("list"), jQuery(custom_wrap_taxonomy).addClass(
					"grid"), jQuery(custom_wrap_archive).removeClass("list"), jQuery(custom_wrap_archive).addClass("grid"), jQuery(
					".viewsbox a").attr("class", ""), jQuery(this).attr("class", "active"), jQuery(".viewsbox .listview a").attr(
					"class", ""), jQuery.cookie("display_view", "grid"), jQuery("#directory_listing_map").css("visibility",
					"hidden"), jQuery("#directory_listing_map").height(0), jQuery(custom_wrap_taxonomy).show(), jQuery(
					custom_wrap_archive).show(), jQuery("#listpagi").show(), "undefined" != typeof infoBubble && infoBubble.close()
			}), jQuery(".viewsbox a#locations_map").click(function (i) {
				i.preventDefault(), jQuery(".viewsbox a").attr("class", ""), jQuery(this).attr("class", "active"), jQuery(
						".viewsbox .listview a").attr("class", ""), jQuery(".viewsbox a.gridview").attr("class", ""), jQuery(
						custom_wrap_taxonomy).hide(), jQuery(custom_wrap_archive).hide(), jQuery("#listpagi").hide(), jQuery(
						"#directory_listing_map").css("visibility", "visible"), jQuery("#directory_listing_map").height("auto"),
					jQuery.cookie("display_view", "locations_map")
			})
	});
</script>
<script type="text/javascript" async>
	jQuery(function () {
		jQuery(document).on('click', '.addtofav', function () {
			post_id = jQuery(this).attr('data-id');
			/*add  html while login to add to favorite*/
			jQuery('#tmpl_login_frm form#loginform').append('<input type="hidden" name="post_id" value="' + post_id + '" />');
			jQuery('#tmpl_login_frm form#loginform').append('<input type="hidden" name="addtofav" value="addtofav" />');
			jQuery('#tmpl_login_frm form#loginform [name=redirect_to]').val(jQuery(location).attr('href'));
			/*add  html while register to add to favorite*/
			jQuery('#tmpl_sign_up form#userform').append('<input type="hidden" name="post_id" value="' + post_id + '" />');
			jQuery('#tmpl_sign_up form#userform').append('<input type="hidden" name="addtofav" value="addtofav" />');
			jQuery('#tmpl_sign_up form#userform [name=reg_redirect_link]').val(jQuery(location).attr('href'));
		});
	});
</script>
<script id="tmpl-foundation" src="images/foundation.min.js">
</script>
<script type="text/javascript" async>
	function tmpl_find_click(search_id) {
		if (jQuery('#search_near-' + search_id).val() == 'What?') {
			jQuery('#search_near-' + search_id).val(' ');
		}
		if (jQuery('#location').val() == 'Address') {
			jQuery('#location').val('');
		}
	}
</script>
<script type="text/javascript" async>
	jQuery(document).ready(function () {

		/* When click on links available in login box widget */

		jQuery('#login_widget #tmpl-reg-link').click(function () {
			jQuery('#login_widget #tmpl_sign_up').show();
			jQuery('#login_widget #tmpl_login_frm').hide();
		});

		jQuery('#login_widget #tmpl-back-login').click(function () {
			jQuery('#login_widget #tmpl_sign_up').hide();
			jQuery('#login_widget #tmpl_login_frm').show();
		});

		/* When click on links Login/reg pop ups */

		jQuery('#tmpl_reg_login_container #tmpl-reg-link').click(function () {
			jQuery('#tmpl_reg_login_container #tmpl_sign_up').show();
			jQuery('#tmpl_reg_login_container #tmpl_login_frm').hide();
		});

		jQuery('#tmpl_reg_login_container #tmpl-back-login').click(function () {
			jQuery('#tmpl_reg_login_container #tmpl_sign_up').hide();
			jQuery('#tmpl_reg_login_container #tmpl_login_frm').show();
		});

		jQuery('#login_widget .lw_fpw_lnk').click(function () {
			if (jQuery('#login_widget #lostpassword_form').css('display') == 'none') {
				jQuery('#login_widget #lostpassword_form').show();
			} else {
				jQuery('#login_widget #lostpassword_form').hide();
			}
			jQuery('#login_widget #tmpl_sign_up').hide();
		});

	});
</script>

<style type="text/css">
		.by_this_theme_fix {
		display: none;
	}

	@media only screen and (min-width: 1024px) {
		.by_this_theme_fix {
			background-color: #4DC46F;
			color: #fff;
			position: fixed;
			bottom: 80px;
			right: 80px;
			z-index: 99999;
			display: inline-block;
			text-align: center;
			border-radius: 3px%;
			-webkit-border-radius: 3px;
			-moz-border-radius: 3px;
			box-shadow: -6.772px 8.668px 16px 0px rgba(28, 30, 35, 0.15);
			-webkit-box-shadow: -6.772px 8.668px 16px 0px rgba(28, 30, 35, 0.15);
			-moz-box-shadow: -6.772px 8.668px 16px 0px rgba(28, 30, 35, 0.15);
			font-size: 20px;
			font-weight: bold;
			transition: all 1s ease;
			-webkit-transition: all 1s ease;
			-moz-transition: all 1s ease;
			-o-transition: all 1s ease;
			animation-name: animFadeUp;
			animation-fill-mode: both;
			animation-duration: 0.4s;
			animation-timing-function: ease;
			animation-delay: 1.5s;
			-webkit-animation-name: animFadeUp;
			-webkit-animation-fill-mode: both;
			-webkit-animation-duration: 0.4s;
			-webkit-animation-timing-function: ease;
			-webkit-animation-delay: 1.5s;
			-moz-animation-name: animFadeUp;
			-moz-animation-fill-mode: both;
			-moz-animation-duration: 0.4s;
			-moz-animation-timing-function: ease;
			-moz-animation-delay: 1.5s;
			-o-animation-name: animFadeUp;
			-o-animation-fill-mode: both;
			-o-animation-duration: 0.4s;
			-o-animation-timing-function: ease;
			-o-animation-delay: 1.5s;
			padding: 8px 25px
		}
		.by_this_theme_fix span {
			font-size: 16px;
			vertical-align: middle;
		}
		.by_this_theme_fix:hover {
			background-color: #58da7d;
			color: #fff;
		}
</style>
<script src="js/script.js"></script>
</body>

</html>
<!-- Dynamic page generated in 4.418 seconds. -->
<!-- Cached page generated by WP-Super-Cache on 2017-05-08 15:05:29 -->

<!-- super cache -->