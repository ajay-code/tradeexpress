jQuery.cookie=function(e,t,n){if(typeof t!="undefined"){n=n||{};if(t===null){t="";n.expires=-1}var r="";if(n.expires&&(typeof n.expires=="number"||n.expires.toUTCString)){var i;if(typeof n.expires=="number"){i=new Date;i.setTime(i.getTime()+n.expires*24*60*60*1e3)}else{i=n.expires}r="; expires="+i.toUTCString()}var s=n.path?"; path="+n.path:"";var o=n.domain?"; domain="+n.domain:"";var u=n.secure?"; secure":"";document.cookie=[e,"=",encodeURIComponent(t),r,s,o,u].join("")}else{var a=null;if(document.cookie&&document.cookie!=""){var f=document.cookie.split(";");for(var l=0;l<f.length;l++){var c=jQuery.trim(f[l]);if(c.substring(0,e.length+1)==e+"="){a=decodeURIComponent(c.substring(e.length+1));break}}}return a}};

jQuery(function(){var e=jQuery.cookie("display_view");if(e=="grid"){jQuery("#loop_classified_taxonomy").removeClass("list");jQuery("#loop_classified_taxonomy").addClass("grid");jQuery(".classified-short").hide();jQuery("#loop_classified_taxonomy").css("display","block");jQuery("#loop_listing_archive").removeClass("list");jQuery("#loop_listing_archive").addClass("grid");jQuery("#loop_listing_archive").css("display","block");jQuery("#gridview").addClass("active");jQuery("#listview").removeClass("active");jQuery("#locations_map").removeClass("active");jQuery("#directory_listing_map").css("visibility","hidden");jQuery("#directory_listing_map").height("0")}else if(e=="locations_map"){jQuery("#loop_classified_taxonomy").hide();jQuery("#loop_listing_archive").hide();jQuery("#listview").removeClass("active");jQuery("#directory_listing_map").css("visibility","visible");jQuery("#directory_listing_map").height("auto");jQuery("#locations_map").addClass("active")}else if(e=="list"){jQuery("#loop_classified_taxonomy").removeClass("grid");jQuery("#loop_classified_taxonomy").addClass("list");jQuery("#loop_classified_taxonomy").css("display","block");jQuery("#loop_listing_archive").css("display","block");jQuery("#loop_listing_archive").removeClass("grid");jQuery("#loop_listing_archive").addClass("list");jQuery("#listview").addClass("active");jQuery("#gridview").removeClass("active");jQuery("#locations_map").removeClass("active"); jQuery("#directory_listing_map").css("visibility","hidden");jQuery("#directory_listing_map").height("0")}});

jQuery(document).ready(function(){jQuery("blockquote").before('<span class="before_quote"></span>').after('<span class="after_quote"></span>');

jQuery(".viewsbox a#listview").click(function(e){e.preventDefault();jQuery("#loop_classified_taxonomy").removeClass("grid");jQuery("#loop_classified_taxonomy").addClass("list");jQuery("#loop_listing_archive").removeClass("grid");jQuery("#loop_listing_archive").addClass("list");jQuery(".viewsbox a").attr("class","");jQuery(this).attr("class","active");jQuery(".viewsbox a.gridview").attr("class","");jQuery.cookie("display_view","list");jQuery("#directory_listing_map").css("visibility","hidden");jQuery("#loop_classified_taxonomy").show();jQuery("#loop_listing_archive").show();jQuery("#listpagi").show();jQuery("#directory_listing_map").height(0);jQuery(".classified-short").show(); if(typeof infoBubble !=='undefined'){ infoBubble.close() }});

jQuery(".viewsbox a#gridview").click(function(e){ e.preventDefault();

jQuery("#loop_classified_taxonomy").removeClass("list");
jQuery("#loop_classified_taxonomy").addClass("grid");
jQuery("#loop_listing_archive").removeClass("list");
jQuery("#loop_listing_archive").addClass("grid");
jQuery(".viewsbox a").attr("class","");
jQuery(this).attr("class","active");
jQuery(".viewsbox .listview a").attr("class","");
jQuery.cookie("display_view","grid");
jQuery("#directory_listing_map").css("visibility","hidden");
jQuery("#directory_listing_map").height(0);
jQuery("#loop_classified_taxonomy").show();
jQuery(".classified-short").hide();
jQuery("#loop_listing_archive").show();
jQuery("#listpagi").show();
if(typeof infoBubble !=='undefined'){ infoBubble.close() }
});
var cc = jQuery.cookie('display_view');	
if(cc =='locations_map'){
	jQuery(".classified-short").hide();
}
jQuery("a#locations_map").click(function(e){e.preventDefault();jQuery(".viewsbox a").attr("class","");jQuery(this).attr("class","active");jQuery(".viewsbox .listview a").attr("class","");jQuery(".viewsbox a.gridview").attr("class","");jQuery("#loop_classified_taxonomy").hide();jQuery("#loop_listing_archive").hide();jQuery("#directory_listing_map").css("visibility","visible");jQuery("#directory_listing_map").height("auto"); jQuery(".classified-short").hide(); jQuery.cookie("display_view","locations_map")})});jQuery(document).ready(function(){jQuery("#directory_sortby").change(function(){jQuery("#event_sorting").submit()})})