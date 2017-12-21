<!-- Custom css -->
<?php if ($custom_css) { ?>
<style>
<?php echo $custom_css_content; ?>
</style>
<?php } ?>
<!-- Custom script -->
<?php if ($custom_javascript) { ?>
<script type="text/javascript">
$(document).ready(function() {
<?php echo $custom_javascript_content; ?>
});
</script>
<!-- Custom Code -->
<?php } ?>
<?php if ($custom_code) { ?>
<?php echo $custom_code_content; ?>
<?php } ?>
<!-- Design -->
<style>
body{
   <?php if ($backgroundimage) { ?>
   background-image: url(<?php echo $backgroundimage; ?>) ;
   background-repeat:<?php echo $repeatbackground; ?>;
  <?php } else { ?>
  <?php } ?>
   background-color: <?php echo $backgroundcolor; ?> ;
   color: <?php echo $moupanel_textcolor; ?>;
}
a {
	color: <?php echo $moupanel_linkcolor; ?>;
}
a:hover {
    color: <?php echo $moupanel_linkhover; ?>;
}
h1, h2, h3, h4, h5, h6 {
	color: <?php echo $moupanel_titlecolor; ?>;
}
.dropdown-menu li > a:hover {
	color: <?php echo $moupanel_dropdownhv; ?>;
	background: <?php echo $moupanel_dropdownbghover; ?>;
}
#top {
	background: <?php echo $moupanel_topnavbg; ?>;
	border-bottom-width:<?php echo $moupanel_topnavline; ?>;
    border-bottom-color:<?php echo $moupanel_topnavlinecolor; ?>;
}
#top #form-currency .currency-select:hover,
#top #form-language .language-select:hover {
	color: <?php echo $moupanel_languagecolorhv; ?>;
    background:<?php echo $moupanel_languagehvbg; ?>;
}
#top .btn-link, #top-links li, #top-links a {
	color: <?php echo $moupanel_toplink; ?>;
}
#top .btn-link:hover, #top-links a:hover {
	color: <?php echo $moupanel_toplinkhover; ?>;
}
#top .fa{
   font-size:<?php echo $moupanel_topiconsize; ?> ;
}
#top-links .dropdown-menu a:hover {
	color: <?php echo $moupanel_topdropdownhv; ?>;
}
#search .input-lg {
    background: <?php echo $moupanel_searchinbg; ?>;
}
#search .btn-lg {
    background: <?php echo $moupanel_searchbutton; ?>;
}
#search .fa {
    font-size: <?php echo $moupanel_searchiconsize; ?>;
}
#cart > .btn {
	color: <?php echo $moupanel_topcartcolor; ?>;
    background:<?php echo $moupanel_topcartbg; ?>;
}
#cart.open > .btn {
    background:<?php echo $moupanel_topcartopenbg; ?>;
	border-width:<?php echo $moupanel_topcartopenbosize; ?>   ;
    border-color:<?php echo $moupanel_topcartopenborder; ?>;
	color: <?php echo $moupanel_topcartopen; ?>;
}
#menu {
	background: <?php echo $moupanel_topmenbg; ?>;
	border-color: <?php echo $moupanel_topmenbocolor; ?>;
    border-width:<?php echo $moupanel_topmenborder; ?>;
}
#menu .nav > li > a {
	color: <?php echo $moupanel_menulicolor; ?>;
}
#menu .nav > li > a:hover, #menu .nav > li.open > a {
	background-color: <?php echo $moupanel_menulibghover; ?>;
    color: <?php echo $moupanel_menulihover; ?>;
}
#menu .dropdown-menu {
	background: <?php echo $moupanel_menuinnerbg; ?>;
}
#menu .dropdown-inner a {
	color: <?php echo $moupanel_menuinnerlink; ?>;
}
#menu .dropdown-inner li a:hover {
	color: <?php echo $moupanel_menuinnerlinkhover; ?>;
    background: <?php echo $moupanel_menuinnerbghover; ?>;
}
#menu .see-all{
	color: <?php echo $moupanel_menushowalllink; ?>;
	background: <?php echo $moupanel_menushowallbg; ?>;
}
#menu .see-all:hover{
	color: <?php echo $moupanel_menushowalllinkhover; ?>;
	background: <?php echo $moupanel_menushowallbghover; ?>;
}
.product-thumb {
   border-color: <?php echo $moupanel_product_list_bordercolor; ?>;
   border-width:<?php echo $moupanel_product_list_bordersize; ?>;
   background: <?php echo $moupanel_product_list_bg; ?>;
}
.product-thumb h4 a{
  	color: <?php echo $moupanel_product_name; ?>;
}
.product-thumb p{
  	color: <?php echo $moupanel_product_description; ?>;
}
.product-thumb .price {
   color: <?php echo $moupanel_product_price; ?>;
}
.product-thumb .button-group {
	border-top-width: <?php echo $moupanel_product_btgroupborder; ?>;
    border-top-color: <?php echo $moupanel_product_btgroupcolor; ?>;
	background: <?php echo $moupanel_product_btgroup; ?>;
}
.product-thumb .button-group button {
	background: <?php echo $moupanel_product_cartbg; ?>;
	color: <?php echo $moupanel_product_cartcolor; ?>;
}
.product-thumb .button-group button:hover {
	color: <?php echo $moupanel_product_cartcolorhover; ?>;
	background: <?php echo $moupanel_product_cartbghover; ?>;
}
.product-thumb .button-group button + button {
	border-left-width: <?php echo $moupanel_product_wishlistborder; ?>;
    border-left-color:<?php echo $moupanel_product_wishlistbordercolor; ?>;
    background:   <?php echo $moupanel_product_wishlistbg; ?>;
    color: <?php echo $moupanel_product_wishlistcolor; ?>;
}
.product-thumb .button-group button + button:hover {
    background:   <?php echo $moupanel_product_wishlistbghover; ?>;
    color: <?php echo $moupanel_product_wishlistcolorhover; ?>;
}
footer {
	background: <?php echo $moupanel_footer_bg; ?>;
	border-top-width: <?php echo $moupanel_footer_border; ?>;
    border-top-color:<?php echo $moupanel_footer_bordercolor; ?>;
	color: <?php echo $moupanel_footer_textcolor; ?>;
}
footer a {
	color: <?php echo $moupanel_footer_linkcolor; ?>;
}
footer a:hover {
	color: <?php echo $moupanel_footer_linkhover; ?>;
}
footer h5 {
	color: <?php echo $moupanel_footer_titlecolor; ?>;   
}
</style>