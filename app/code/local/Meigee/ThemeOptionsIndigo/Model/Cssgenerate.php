<?php 
/**
 * Magento
 *
 * @author    Meigeeteam http://www.meaigeeteam.com <nick@meaigeeteam.com>
 * @copyright Copyright (C) 2010 - 2012 Meigeeteam
 *
 */
class Meigee_ThemeOptionsIndigo_Model_Cssgenerate extends Mage_Core_Model_Abstract
{
    private $baseColors;
    private $catlabelsColors;
    private $appearance;
    private $mediaPath;
    private $dirPath;
    private $filePath;
	private $headerColors;
	private $headerSlider;
	private $menuColors;
	private $contentColors;
	private $buttonsColors;
	private $productColors;
	private $socialLinksColors;
	private $footerColors;

    private function setParams () {
        $this->baseColors = Mage::getStoreConfig('meigee_indigo_design/base');
		$this->catlabelsColors = Mage::getStoreConfig('meigee_indigo_design/catlabels');
        $this->appearance = Mage::getStoreConfig('meigee_indigo_design/appearance');
		$this->headerColors = Mage::getStoreConfig('meigee_indigo_design/header');
		$this->headerSlider = Mage::getStoreConfig('meigee_indigo_design/headerslider');
		$this->menuColors = Mage::getStoreConfig('meigee_indigo_design/menu');
		$this->contentColors = Mage::getStoreConfig('meigee_indigo_design/content');
		$this->buttonsColors = Mage::getStoreConfig('meigee_indigo_design/buttons');
		$this->productColors = Mage::getStoreConfig('meigee_indigo_design/products');
		$this->socialLinksColors = Mage::getStoreConfig('meigee_indigo_design/social_links');
		$this->footerColors = Mage::getStoreConfig('meigee_indigo_design/footer');
    }

    private function setLocation () {
        $this->mediaPath = Mage::getBaseDir('media') . 'images/';
        $this->dirPath = Mage::getBaseDir('skin') . '/frontend/indigo/default/css/';
        $this->filePath = $this->dirPath . 'skin.css';
    }

    public function saveCss()
    {

        $this->setParams();

$css = "/**
*
* This file is generated automaticaly. Please do no edit it directly cause all changes will be lost.
*
*/
";
if ($this->appearance['font'] == 1)
{
    $css .= '/*====== Font Replacement =======*/ ';
    if ($this->appearance['default_sizes'] == 0)
        {
$css .= '
a.aw-blog-read-more,
.block.block-blog h5,
.nav-wide#nav-wide .right-content h2,
.nav-wide#nav-wide .top-content,
.nav-wide#nav-wide .bottom-content,
.nav-wide#nav-wide ul.level0 a span.subtitle,
.product-collateral h2,
header#header .top-cart .block-title a,
.text-block button span,
.std h1,
.price,
.product-name a,
body .widget .widget-title h1,
body .widget .widget-title h2,
.page-title h2,
.page-title h1,
#footer .custom_footer h3,
aside.sidebar .block .block-title strong span,
aside.sidebar .block .filter-label span,
aside.sidebar .actions a,
button.button span span,
.dashboard .welcome-msg .hello,
.dashboard .box-head h2,
.dashboard .box-title h3,
#login-holder form .actions .link-box a,
.add-to-cart-success,
.add-to-cart-success a,
.account-login .indent h2,
.opc .step-title,
.opc .grid_4 h3,
aside.sidebar .block.block-progress .block-title strong span,
#onepagecheckout_forgotbox .page-title span,
#onepagecheckout_loginbox .page-title span,
#onepagecheckout_forgotbox button.button span span,
#onepagecheckout_loginbox button.button span span,
#onepagecheckout_orderform .col3-set.onepagecheckout_datafields .op_block_title,
#checkout-coupon-discount-load .discount-form .buttons-set button.button span span,
#checkout-review-submit #review-buttons-container button.btn-checkout,
.cart .cart-collaterals h2,
.cart .btn-proceed-checkout,
.product-view .product-name h1,
.block-related .block-title strong span,
.catalog-product-view .box-reviews ul li h6,
header#header .top-cart .block-content .actions a,
header#header .top-cart .block-content .subtotal span,
.catalog-product-view .box-reviews h2,
aside.sidebar .block.block-wishlist li.item .product-details .product-name a,
aside.sidebar .block.block-wishlist .link-cart,
.header-slider-container .iosSlider .slider .item .slide-container h2,
.header-slider-container .iosSlider .slider .item .slide-container.slide-skin-2 h3,
.header-slider-container .iosSlider .slider .item h5,
.header-slider-container .iosSlider .slider .item .slide-container.slide-skin-3 h3{
    font-family: '. $this->appearance['gfont'] .', sans-serif; 
    font-size:'. $this->appearance['fontsize'] .'px !important;
    line-height:' . $this->appearance['lineheight'] .'px !important;
    font-weight:' .$this->appearance['fontweight'] .' !important;
	-webkit-text-stroke-width: 0.02em;
}';
        } else {
        $css .= '
a.aw-blog-read-more,
.block.block-blog h5,
.nav-wide#nav-wide .right-content h2,
.nav-wide#nav-wide .top-content,
.nav-wide#nav-wide .bottom-content,
.nav-wide#nav-wide ul.level0 a span.subtitle,
.product-collateral h2,
header#header .top-cart .block-title a,
.text-block button span,
.std h1,
.price,
.product-name a,
body .widget .widget-title h1,
body .widget .widget-title h2,
.page-title h2,
.page-title h1,
#footer .custom_footer h3,
aside.sidebar .block .block-title strong span,
aside.sidebar .block .filter-label span,
aside.sidebar .actions a,
button.button span span,
.dashboard .welcome-msg .hello,
.dashboard .box-head h2,
.dashboard .box-title h3,
#login-holder form .actions .link-box a,
.add-to-cart-success,
.add-to-cart-success a,
.account-login .indent h2,
.opc .step-title,
.opc .grid_4 h3,
aside.sidebar .block.block-progress .block-title strong span,
#onepagecheckout_forgotbox .page-title span,
#onepagecheckout_loginbox .page-title span,
#onepagecheckout_forgotbox button.button span span,
#onepagecheckout_loginbox button.button span span,
#onepagecheckout_orderform .col3-set.onepagecheckout_datafields .op_block_title,
#checkout-coupon-discount-load .discount-form .buttons-set button.button span span,
#checkout-review-submit #review-buttons-container button.btn-checkout,
.cart .cart-collaterals h2,
.cart .btn-proceed-checkout,
.product-view .product-name h1,
.block-related .block-title strong span,
.catalog-product-view .box-reviews ul li h6,
header#header .top-cart .block-content .actions a,
header#header .top-cart .block-content .subtotal span,
.catalog-product-view .box-reviews h2,
aside.sidebar .block.block-wishlist li.item .product-details .product-name a,
aside.sidebar .block.block-wishlist .link-cart,
.header-slider-container .iosSlider .slider .item .slide-container h2,
.header-slider-container .iosSlider .slider .item .slide-container.slide-skin-2 h3,
.header-slider-container .iosSlider .slider .item h5,
.header-slider-container .iosSlider .slider .item .slide-container.slide-skin-3 h3{font-family: ' . $this->appearance['gfont'] .', sans-serif; -webkit-text-stroke-width: 0.02em;}';
    }
}

if ($this->appearance['custompatern']) {
$css .= '

/*====== Custom Patern =======*/
body { background: url("' . MAGE::helper('ThemeOptionsIndigo')->getThemeOptionsIndigo('mediaurl') . $this->appearance['custompatern'] . '") center top repeat !important;}';
}
$css .= '

/*====== Site Bg =======*/
body {background-color:#' . $this->baseColors['sitebg'] . ';}

/*====== Skin Color #1 =======*/
.product-collateral .box-collateral ul a:hover,
.product-collateral .box-collateral ol a:hover,
.product-view .short-description ul a:hover,
.product-view .short-description ol a:hover,
.price-as-configured .price,
.minimal-price .price,
.price-box .regular-price .price,
.product-name a:hover,
.color-block .grid_3:hover h3,
nav.breadcrumbs li a:hover,
#categories-accordion li.parent .btn-cat.closed i,
#categories-accordion li.parent.closed .btn-cat i,
.minimal-price-link .price,
.special-price .price,
a,
.availability-only span,
.add-to-links li a i,
p.email-friend a i ,
.add-to-links li a:hover,
p.email-friend a:hover,
.dashboard .welcome-msg .hello strong,
.dashboard a:hover,
.block-account li:hover i,
.block-account li.current i,
#login-holder .close-button i:hover,
#login-holder form a.f-left:hover,
.add-to-cart-success > span,
.account-login .content .buttons-set a:hover,
#checkout-step-login .buttons-set .f-left:hover,
.close_la i:hover,
.onepagecheckout-index-index #onepagecheckout_forgotbox.op_login_area #forgot-password-form .onepagecheckout_loginlink:hover,
.onepagecheckout-index-index #onepagecheckout_loginbox.op_login_area #login-form .onepagecheckout_forgotlink:hover,
.data-table .c_actions a:hover,
.cart-table .price,
.cart .totals table .price,
.cart .totals li > a:hover,
.ratings .rating-links a:hover,
.availability.out-of-stock span,
.tier-prices .price,
.price-from .price,
.price-to .price,
.price-notice .price,
.block-related .block-content .block-subtitle a,
.catalog-product-view .box-reviews ul li small span,
.catalog-product-view .box-reviews .form-add h3 span,
header#header .top-cart .product-name a:hover,
header#header .top-cart .btn-remove i:hover,
header#header .top-cart .btn-edit i:hover,
header#header .top-cart .block-content .mini-products-list .product-details .price,
aside.sidebar .btn-remove i:hover,
.my-wishlist .data-table .table-buttons a:hover i,
.fancybox-close i:hover,
#header > .container_12 .form-currency a:hover,
#header > .container_12 .form-language a:hover,
header#header .top-cart .block-content .subtotal .price,
.block-poll .block-subtitle,
aside.sidebar .block.block-wishlist li.item .product-details .product-name a:hover {color: #' . $this->baseColors['maincolor'] . ';} 

a.aw-blog-read-more,
.text-block button.btn-buy span,
.products-list li.item .product-shop button > span,
.header-slider-container button.button > span,
#checkout-step-login .buttons-set button > span,
.op_login_area button.button > span,
#checkout-coupon-discount-load .discount-form .buttons-set button.button > span,
.cart-table .btn-continue > span,
.discount button > span,
.cart .shipping .buttons-set > span,
.cart .btn-proceed-checkout > span,
#footer > .container_12 button > span,
.block-compare button > span,
.block-reorder button > span,
.products-grid li.item .btn-quick-view.small > span,
aside.sidebar .block.block-subscribe button > span,
.my-wishlist td button > span,
.my-wishlist button.btn-share > span,
#login-holder form .actions button > span,
header#header .form-search button:hover > span,
header#header .top-cart .block-content .button > span,
.btn-buy > span,
.add-to-cart-success a > span,
#checkout-review-submit #review-buttons-container button.btn-checkout,
header#header .home-button,
#nav > li:hover > a,
#nav > li.over > a,
#nav > li.active > a,
#nav-wide > li:hover > a,
#nav-wide > li.over > a,
#nav-wide > li.active > a,
.header-slider-container .iosSlider .prev:hover,
.header-slider-container .iosSlider .next:hover,
.color-block .grid_3:hover span,
.slider-container .prev i,
.slider-container .next i,
.more-views .prev i,
.more-views .next i,
.block-related .prev i,
.block-related .next i,
aside.sidebar .block.block-wishlist .next i,
aside.sidebar .block.block-wishlist .prev i,
ul.social-links li a:hover,
#slider-range.ui-slider .ui-slider-range.ui-widget-header,
.label-sale,
.products-grid .availability-only,
.products-list .availability-only,
.opc .active .step-title .number,
#cart-accordion h3.accordion-title.active,
#cart-accordion h3.accordion-title:hover,
.meigee-tabs li.active a,
.meigee-tabs li a:hover,
.product-collateral#collateral-accordion h2:hover,
.product-collateral#collateral-accordion h2.active,
.catalog-product-view .box-reviews .full-review,
#toTopHover,
header#header .links-container > .links > li:hover,
.widget-products .pager .pages ol li.current,
.widget-products .pager .pages ol li:hover a,
.toolbar-bottom .pager .pages ol li.current,
.toolbar-bottom .pager .pages ol li:hover a,
.menu-button i,
aside.sidebar .block .block-title.active i,
header#header .top-cart .block-title .title-cart > span,
aside.sidebar .block .block-title i:hover,
.ajax-index-options .product-view .product-shop .add-to-cart button > span {background-color: #' . $this->baseColors['maincolor'] . ';}

#onepagecheckout_forgotbox button.button > span,
#onepagecheckout_loginbox button.button > span{background-color: #' . $this->baseColors['maincolor'] . '!important;}

.block.block-blog h5:after,
ul.social-links li a:hover,
aside.sidebar .block .filter-label span:after,
header#header .links-container > .links > li:hover a span,
.slider-container .next:after,
aside.sidebar .block.block-wishlist .next:after,
.block-related .next:after {border-color: #' . $this->baseColors['maincolor'] . ';}

.label-type-2 .label-sale:after,
.products-grid.label-type-2 .availability-only:after,
.products-list.label-type-2 .availability-only:after {border-top-color: #' . $this->baseColors['maincolor'] . '; border-left-color: #' . $this->baseColors['maincolor'] . ';}

.label-type-5 div.label-sale:before,
.products-grid.label-type-5 .availability-only:before,
.products-list.label-type-5 .availability-only:before {border-top-color: #' . $this->baseColors['maincolor'] . ';}
.label-type-5 div.label-sale:after,
.products-grid.label-type-5 .availability-only:after,
.products-list.label-type-5 .availability-only:after {border-bottom-color: #' . $this->baseColors['maincolor'] . ';}
.label-type-2.bottom-left .label-sale:after,
.products-grid.label-type-2.bottom-left .availability-only:after,
.products-list.label-type-2.bottom-left .availability-only:after,
.label-type-2.top-left .label-sale:after,
.products-grid.label-type-2.top-left .availability-only:after,
.products-list.label-type-2.top-left .availability-only:after {
	border-top-color: #' . $this->baseColors['maincolor'] . ';
	border-right-color: #' . $this->baseColors['maincolor'] . ';
}

/*====== Skin Color #2 =======*/
a:hover,
.product-name a,
.color-block .grid_3 h3,
.minimal-price-link .label,
.dashboard .welcome-msg .hello,
.dashboard .box-title h3,
.account-login .indent h2,
.block-related .block-content .block-subtitle a:hover,
header#header .top-cart .product-name a,
aside.sidebar .block.block-wishlist li.item .product-details .product-name a,
.header-slider-container .iosSlider .slider .item .slide-container.right-caption h2,
.header-slider-container .iosSlider .slider .item .slide-container.slide-skin-2 h3 {color:#' . $this->baseColors['secondcolor'] . ';}

.product-view .product-prev,
.product-view .product-next,
.nav-wide#nav-wide .right-content .banner-box i,
header#header,
footer#footer,
.color-block .grid_3 span,
.view-mode strong,
.view-mode a:hover,
.pager a.asc i,
.pager a.desc i,
aside.sidebar .block.block-layered-nav .ui-slider .ui-slider-handle,
.label-new,
div.quantity-decrease i,
div.quantity-increase i,
#login-holder form .actions .link-box a,
.catalog-product-view .box-reviews .data-table thead,
.button > span,
aside.sidebar .actions a,
.product-buttons .btn-quick-view > span,
header#header .top-cart .block-content .actions a,
.products-grid .product-img-box .btn-quick-view:hover span span,
.products-list .product-img-box .btn-quick-view:hover span span,
 aside.sidebar .block.block-wishlist .link-cart {background-color:#' . $this->baseColors['secondcolor'] . ';}
 
.label-new:after {
    border-top-color: #' . $this->baseColors['secondcolor'] . ';
    border-left-color: #' . $this->baseColors['secondcolor'] . ';
}

.label-type-5 span.label-new:after {border-bottom-color: #' . $this->baseColors['secondcolor'] . ';}
.label-type-5 span.label-new:before {border-top-color: #' . $this->baseColors['secondcolor'] . ';}

';

if ($this->baseColors['base_override'] == 1) {
    $css .= '/*====== Header ======*/
/**** Top Block ****/
header#header {
	background-color: #' . $this->headerColors['top_bg'] . ';
} 
header#header,
header#header .welcome-msg {color: #' . $this->headerColors['top_color'] . ';}
header#header .form-currency,
header#header .links {
	border-color: #' . $this->headerColors['top_border'] . ';
	border-width: ' . $this->headerColors['top_border_width'] . 'px;
}
#header > .container_12 > .grid_12 a,
#header > .container_12 .form-currency a,
#header > .container_12 .form-language a {color: #' . $this->headerColors['top_links_and_switchers'] . ';}
#header .sbSelector > span {border-top-color: #' . $this->headerColors['top_links_and_switchers'] . ';}
#header > .container_12 > .grid_12 a:hover,
#header > .container_12 .form-currency a:hover,
#header > .container_12 .form-language a:hover {color: #' . $this->headerColors['top_links_and_switchers_h'] . ';}
#header .sbSelector:hover > span {border-top-color: #' . $this->headerColors['top_links_and_switchers_h'] . ';}
#header .sbSelector {
	background-color: #' . $this->headerColors['top_switchers_bg'] . ';
	border-color: #' . $this->headerColors['top_switchers_border'] . ';
	border-width: ' . $this->headerColors['top_switchers_border_width'] . 'px;
}
#header .sbSelector:hover {
	background-color: #' . $this->headerColors['top_switchers_bg_h'] . ';
	border-color: #' . $this->headerColors['top_switchers_border_h'] . ';
}

/**** Header Cart ****/
header#header .top-cart {background-color: #' . $this->headerColors['cart_bg'] . ';}
header#header .top-cart.active,
header#header .top-cart:hover {background-color: #' . $this->headerColors['cart_bg_h'] . ';}
header#header .top-cart .block-title a {color: #' . $this->headerColors['cart_color'] . ';}
header#header .top-cart:hover .block-title a {color: #' . $this->headerColors['cart_color_h'] . ';}
header#header .top-cart .block-title .title-cart > span {
	background-color: #' . $this->headerColors['cart_count_bg'] . ';
	color: #' . $this->headerColors['cart_count'] . ';
}
header#header .top-cart .block-content {background-color: #' . $this->headerColors['cart_dropdown_bg'] . ';}
header#header .top-cart .mini-products-list li {background-color: #' . $this->headerColors['cart_dropdown_product_bg'] . ';}
header#header .top-cart .mini-products-list li:hover {background-color: #' . $this->headerColors['cart_dropdown_product_bg_h'] . ';}
header#header .top-cart .product-name a {color: #' . $this->headerColors['cart_dropdown_product_title'] . ';}
header#header .top-cart .product-name a:hover {color: #' . $this->headerColors['cart_dropdown_product_title_h'] . ';}
header#header .top-cart .block-content .mini-products-list .product-details .price {color: #' . $this->headerColors['cart_dropdown_price'] . ';}
header#header .top-cart .cart-price-qt {
	background-color: #' . $this->headerColors['cart_dropdown_count_bg'] . ';
	color: #' . $this->headerColors['cart_dropdown_count'] . ';
}
header#header .top-cart .block-content .item-options dt {color: #' . $this->headerColors['cart_dropdown_label_color'] . ';}
header#header .top-cart .block-content .item-options dd {color: #' . $this->headerColors['cart_dropdown_options_color'] . ';}
header#header .top-cart .block-content .subtotal {background-color: #' . $this->headerColors['cart_dropdown_total_bg'] . ';}
header#header .top-cart .block-content .subtotal span {color: #' . $this->headerColors['cart_dropdown_total_label'] . ';}
header#header .top-cart .block-content .subtotal .price {color: #' . $this->headerColors['cart_dropdown_total_price'] . ';}

/**** Header Links Block ****/
header#header .links-container > .links > li {background-color: #' . $this->headerColors['links_bg'] . ';}
header#header .links-container > .links > li > a,
header#header .links-container > .links > .company > dl.company-links dt a {color: #' . $this->headerColors['links_color'] . ';}
header#header .links-container > .links > li:hover {background-color: #' . $this->headerColors['links_bg_h'] . ';}
header#header .links-container > .links > li:hover > a,
header#header .links-container > .links > .company > dl.company-links dt a:hover {color: #' . $this->headerColors['links_color_h'] . ';}
header#header .links-container > .links > li > a > span,
header#header .links-container .links > li.company dt a > span {
	border-width: ' . $this->headerColors['links_divider_width'] . 'px;
	border-color: #' . $this->headerColors['links_divider'] . ';
}
header#header .container_12 dl.company-links dd {
	box-shadow: 0 3px 4px rgba('.MAGE::helper('ThemeOptionsIndigo')->HexToRGB($this->headerColors['links_dropdown_shadow']).',.2);
} 
header#header .container_12 dl.company-links dd ul li {background-color: #' . $this->headerColors['links_dropdown_link_bg'] . ';}
header#header .container_12 dl.company-links dd ul li a {
	color: #' . $this->headerColors['links_dropdown_link'] . ';
	border-color: #' . $this->headerColors['links_dropdown_divider'] . ';
}
header#header .container_12 dl.company-links dd ul li a:hover {
	background-color: #' . $this->headerColors['links_dropdown_link_bg_h'] . ';
	border-color: #' . $this->headerColors['links_dropdown_divider_h'] . ';
	color: #' . $this->headerColors['links_dropdown_link_h'] . ';
}
header#header .container_12 dl.company-links dd ul li:hover a {color: #' . $this->headerColors['links_dropdown_link_h'] . ';}
header#header .container_12 dl.company-links dd ul li:hover {background-color: #' . $this->headerColors['links_dropdown_link_bg_h'] . ';}

/**** Login and Register Popup ****/
#login-holder {
	background-color: #' . $this->headerColors['login_bg'] . ';
	border-color: #' . $this->headerColors['login_border'] . ';
	border-width: ' . $this->headerColors['login_border_width'] . 'px;
}
#login-holder form .fieldset {background-color: #' . $this->headerColors['login_bg'] . ';}
#login-holder .page-title h1 {color: #' . $this->headerColors['login_title_color'] . ';}
#login-holder form .fieldset .legend,
#login-holder form p,
#login-holder form label,
#login-holder .account-create .form-list label {color: #' . $this->headerColors['login_text'] . ';}
#login-holder .close-button i,
#login-holder form a.f-left {color: #' . $this->headerColors['login_link'] . ';}
#login-holder .close-button i:hover,
#login-holder form a.f-left:hover {color: #' . $this->headerColors['login_link_h'] . ';}
#login-holder form p.required,
#login-holder .form-list label.required em {color: #' . $this->headerColors['login_system_text'] . ';}
#login-holder form .input-box input {
	background-color: #' . $this->headerColors['login_input_bg'] . ';
	border-color: #' . $this->headerColors['login_input_border'] . ';
	border-width: ' . $this->headerColors['login_input_border_width'] . 'px;
	color: #' . $this->headerColors['login_input_color'] . ';
}
#login-holder form .actions {
	border-color: #' . $this->headerColors['login_divider'] . ';
	border-width: ' . $this->headerColors['login_divider_width'] . 'px;
}

/**** Bottom Block ****/
#header .header-wrapper {
	background-color: #' . $this->headerColors['bottom_bg'] . ';
	box-shadow: 1px 1px 6px rgba('.MAGE::helper('ThemeOptionsIndigo')->HexToRGB($this->buttonsColors['bottom_shadow']).', 0.13);
	border-width: ' . $this->headerColors['bottom_border_width'] . 'px;
	border-color: #' . $this->headerColors['bottom_border'] . ';
}
header#header .home-button {
	background-color: #' . $this->headerColors['bottom_home_bg'] . ';
	color: #' . $this->headerColors['bottom_home'] . ';
}
header#header .home-button:hover {color: #' . $this->headerColors['bottom_home_h'] . ';}
header#header .form-search {
	background-color: #' . $this->headerColors['search_bg'] . ';
	border-color: #' . $this->headerColors['search_border'] . ';
	border-width: ' . $this->headerColors['search_border_width'] . 'px;
}
header#header .form-search input {color: #' . $this->headerColors['search_color'] . ';}
header#header .form-search button span {background-color: #' . $this->headerColors['search_button_bg'] . ';}
header#header .form-search button span i {color: #' . $this->headerColors['search_button_color'] . ';}
header#header .form-search button:hover > span {background-color: #' . $this->headerColors['search_button_bg_h'] . ';}
header#header .form-search button:hover span i {color: #' . $this->headerColors['search_button_color_h'] . ';}

/*====== Header Slider ======*/

/**** Buttons ****/
.header-slider-container .iosSlider .prev,
.header-slider-container .iosSlider .next {background-color: #' . $this->headerSlider['buttons_bg'] . ';}
.header-slider-container .iosSlider .prev i,
.header-slider-container .iosSlider .next i {color: #' . $this->headerSlider['buttons_color'] . ';}
.header-slider-container .iosSlider .prev:hover,
.header-slider-container .iosSlider .next:hover {background-color: #' . $this->headerSlider['buttons_bg_h'] . ';}
.header-slider-container .iosSlider .prev i,
.header-slider-container .iosSlider .next i {color: #' . $this->headerSlider['buttons_color_h'] . ';}

/**** Type 1 ****/
.header-slider-container .iosSlider .slider .item .slide-container.right-caption h2 {color: #' . $this->headerSlider['type1_title'] . ';}
.header-slider-container .iosSlider .slider .item .slide-container.right-caption h3 {color: #' . $this->headerSlider['type1_subtitle'] . ';}
.header-slider-container .iosSlider .slider .item .slide-container.right-caption p {color: #' . $this->headerSlider['type1_text'] . ';}

/**** Type 2 ****/
.header-slider-container .iosSlider .slider .item .slide-container.slide-skin-2 h2 {color: #' . $this->headerSlider['type2_title'] . ';}
.header-slider-container .iosSlider .slider .item .slide-container.slide-skin-2 h3 {color: #' . $this->headerSlider['type2_subtitle'] . ';}
.header-slider-container .iosSlider .slider .item .slide-container.slide-skin-2 p {color: #' . $this->headerSlider['type2_text'] . ';}

/**** Type 3 ****/
.header-slider-container .iosSlider .slider .item .slide-container.slide-skin-3 h2 {color: #' . $this->headerSlider['type3_title'] . ';}
.header-slider-container .iosSlider .slider .item .slide-container.slide-skin-3 h3 {color: #' . $this->headerSlider['type3_subtitle'] . ';}
.header-slider-container .iosSlider .slider .item .slide-container.slide-skin-3 p {color: #' . $this->headerSlider['type3_text'] . ';}
.header-slider-container .iosSlider .slider .item .slide-container.slide-skin-3 h5 {color: #' . $this->headerSlider['type3_additional_subtitle'] . ';}

/*====== Menu ======*/

/**** Top Level ****/
.nav-wide#nav-wide li.level-top > a,
#nav li.level-top > a {background-color: #' . $this->menuColors['top_link_bg'] . ';}
.nav-wide#nav-wide li.level-top > a span,
#nav li.level-top > a {color: #' . $this->menuColors['top_link_color'] . ';}
#nav > li.level-top:hover > a,
#nav > li.level-top.over > a,
#nav > li.level-top.active > a,
#nav-wide > li.level-top:hover > a,
#nav-wide > li.level-top.over > a,
#nav-wide > li.level-top.active > a {background-color: #' . $this->menuColors['top_link_bg_h'] . ';}
#nav > li.level-top:hover > a:hover > span,
#nav > li.level-top.over > a > span,
#nav > li.level-top.active > a > span,
.nav-wide#nav-wide > li.level-top:hover > a:hover > span,
.nav-wide#nav-wide > li.level-top.over > a > span,
.nav-wide#nav-wide > li.level-top.active > a > span {color: #' . $this->menuColors['top_link_color_h'] . ';}
#nav > li.parent > a i,
#nav-wide > li.parent > a i {color: #' . $this->menuColors['top_link_icon'] . ';}
#nav > li.parent:hover > a > i,
#nav > li.parent.over > a > i,
#nav-wide > li.parent.active > a > i
#nav-wide > li.parent:hover > a > i,
#nav-wide > li.parent.over > a > i,
#nav-wide > li.parent.active > a > i {color: #' . $this->menuColors['top_link_icon_h'] . ';}

/**** Submenu ****/
.nav-wide#nav-wide .menu-wrapper {background-color: #' . $this->menuColors['submenu_bg'] . ';}
.nav-wide#nav-wide ul.level0 li.level1 span.subtitle {color: #' . $this->menuColors['submenu_top_link_color'] . ';}
.nav-wide#nav-wide ul.level0 li.level1 a:hover span.subtitle {color: #' . $this->menuColors['submenu_top_link_color_h'] . ';}
.nav-wide#nav-wide ul.level0 li.level1 > a:after {
	background-color: #' . $this->menuColors['submenu_top_link_divider'] . ';
	height: ' . $this->menuColors['submenu_top_link_divider_width'] . 'px;
}
.nav-wide#nav-wide ul.level0 li.level1 > a:hover:after {background-color: #' . $this->menuColors['submenu_top_link_divider_h'] . ';}
.nav-wide#nav-wide ul.level0 a,
.nav-wide#nav-wide ul.level0 li.level1 > a,
.nav-wide#nav-wide ul.level0 li.level1 > a span.subtitle {
	background-color: #' . $this->menuColors['submenu_link_bg'] . ';
	border-color: #' . $this->menuColors['submenu_link_border'] . ';
	border-width: ' . $this->menuColors['submenu_link_border_width'] . 'px;
}
.nav-wide#nav-wide ul.level0 a span {color: #' . $this->menuColors['submenu_link_color'] . ';}
.nav-wide#nav-wide ul.level0 a span:before {background-color: #' . $this->menuColors['submenu_link_color'] . ';}
.nav-wide#nav-wide ul.level0 a:hover,
.nav-wide#nav-wide ul.level0 li.level1 > a:hover span.subtitle,
.nav-wide#nav-wide ul.level0 li.level1 > a:hover {
	background-color: #' . $this->menuColors['submenu_link_bg_h'] . ';
	border-color: #' . $this->menuColors['submenu_link_border_h'] . ';
}
.nav-wide#nav-wide ul.level0 a:hover span {color: #' . $this->menuColors['submenu_link_color_h'] . ';}
.nav-wide#nav-wide ul.level0 a:hover span:before {background-color: #' . $this->menuColors['submenu_link_color_h'] . ';}
.nav-wide#nav-wide .top-content,
.nav-wide#nav-wide .bottom-content {
	border-color: #' . $this->menuColors['submenu_borders_color'] . ';
	border-width: ' . $this->menuColors['submenu_borders_width'] . 'px;
}
.nav-wide#nav-wide .top-content,
.nav-wide#nav-wide .bottom-content,
.nav-wide#nav-wide .right-content {color: #' . $this->menuColors['submenu_text_color'] . ';}
.nav-wide#nav-wide .top-content a,
.nav-wide#nav-wide .bottom-content a,
.nav-wide#nav-wide .right-content a {color: #' . $this->menuColors['submenu_links_color'] . ';}
.nav-wide#nav-wide .top-content a:hover,
.nav-wide#nav-wide .bottom-content a:hover,
.nav-wide#nav-wide .right-content a:hover {color: #' . $this->menuColors['submenu_links_color_h'] . ';}
.nav-wide#nav-wide .top-content span,
.nav-wide#nav-wide .bottom-content span {color: #' . $this->menuColors['submenu_strong_text_color'] . ';}
.nav-wide#nav-wide .right-content h2,
.nav-wide#nav-wide .top-content h2,
.nav-wide#nav-wide .bottom-content h2 {color: #' . $this->menuColors['submenu_title_color'] . ';}
.nav-wide#nav-wide .right-content .banner-box {
	background-color: #' . $this->menuColors['submenu_text_banner_bg'] . ';
	color: #' . $this->menuColors['submenu_text_banner'] . ';
}
.nav-wide#nav-wide .right-content .banner-box h2 {color: #' . $this->menuColors['submenu_text_banner_title'] . ';}
.nav-wide#nav-wide .right-content .banner-box i {
	color: #' . $this->menuColors['submenu_text_banner_icon'] . ';
	background-color: #' . $this->menuColors['submenu_text_banner_icon_bg'] . ';
}

/*====== Content ======*/
.page-title h1,
.page-title h2,
body .widget .widget-title h1,
body .widget .widget-title h2 {color: #' . $this->contentColors['page_title_color'] . ';}
.widget .widget-title .right-divider,
.page-title .right-divider {
	border-color: #' . $this->contentColors['page_title_border'] . ';
	border-width: ' . $this->contentColors['page_title_border_width'] . 'px;
}
.view-mode label.view,
.sort-by label,
.limiter label {color: #' . $this->contentColors['toolbar_label'] . ';}
.toolbar .sbSelector,
.toolbar .sbHolder .sbToggleOpen + .sbSelector {
	background-color: #' . $this->contentColors['toolbar_select_bg'] . ';
	border-color: #' . $this->contentColors['toolbar_select_border'] . ';
	border-width: ' . $this->contentColors['toolbar_select_border_width'] . 'px;
	color: #' . $this->contentColors['toolbar_select_text'] . ';
}
.toolbar .sbOptions li {background-color: #' . $this->contentColors['toolbar_select_item_bg'] . ';}
.toolbar .sbOptions a,
.toolbar .sbOptions a:link,
.toolbar .sbOptions a:visited {color: #' . $this->contentColors['toolbar_select_item'] . ';}
.toolbar .sbOptions li:hover {background-color: #' . $this->contentColors['toolbar_select_item_bg_h'] . ';}
.toolbar .sbOptions li:hover a {color: #' . $this->contentColors['toolbar_select_item_h'] . ';}
.toolbar .pager,
.toolbar-bottom {
	border-color: #' . $this->contentColors['toolbar_border'] . ';
	border-width: ' . $this->contentColors['toolbar_border_width'] . 'px;
}
.widget-products .pager .pages ol li a,
.toolbar-bottom .pager .pages ol li a {
	background-color: #' . $this->contentColors['pager_buttons_bg'] . ';
	color: #' . $this->contentColors['pager_buttons_color'] . ';
}
.widget-products .pager .pages ol li:hover a,
.toolbar-bottom .pager .pages ol li:hover a {
	background-color: #' . $this->contentColors['pager_buttons_bg_h'] . ';
	color: #' . $this->contentColors['pager_buttons_color_h'] . ';
}
.widget-products .pager .pages ol li.current,
.toolbar-bottom .pager .pages ol li.current {
	background-color: #' . $this->contentColors['pager_active_button_bg'] . ';
	color: #' . $this->contentColors['pager_active_button'] . ';
}

/*====== Buttons ======*/

/**** Type 1 ****/
a.aw-blog-read-more,
.text-block button.btn-buy span,
.products-list li.item .product-shop button > span,
.header-slider-container button.button > span,
#checkout-step-login .buttons-set button > span,
.op_login_area button.button > span,
#checkout-coupon-discount-load .discount-form .buttons-set button.button > span,
.cart-table .btn-continue > span,
.discount button > span,
.cart .shipping .buttons-set > span,
.cart .btn-proceed-checkout > span,
#footer > .container_12 button > span,
.block-compare button > span,
.block-reorder button > span,
.products-grid li.item .btn-quick-view.small > span,
aside.sidebar .block.block-subscribe button > span,
.my-wishlist td button > span,
.my-wishlist button.btn-share > span,
#login-holder form .actions button > span,
header#header .top-cart .block-content .button > span,
.btn-buy > span,
.add-to-cart-success a > span,
#checkout-review-submit #review-buttons-container button.btn-checkout,
.ajax-index-options .product-view .product-shop .add-to-cart button > span {
	background-color: #' . $this->buttonsColors['buttons_bg'] . ';
	border-color: #' . $this->buttonsColors['buttons_border'] . ';
	border-width: ' . $this->buttonsColors['buttons_border_width'] . 'px;
}
a.aw-blog-read-more,
.text-block button.btn-buy span span,
.products-list li.item .product-shop button span span,
.header-slider-container button.button span span,
#checkout-step-login .buttons-set button span span,
.op_login_area button.button span span,
#checkout-coupon-discount-load .discount-form .buttons-set button.button span span,
.cart-table .btn-continue span span,
.discount button span span,
.cart .shipping .buttons-set span span,
.cart .btn-proceed-checkout span span,
#footer > .container_12 button span span,
.block-compare button span span,
.block-reorder button span span,
.products-grid li.item .btn-quick-view.small span span,
aside.sidebar .block.block-subscribe button span span,
.my-wishlist td button span span,
.my-wishlist button.btn-share span span,
#login-holder form .actions button span span,
header#header .top-cart .block-content .button span span,
.btn-buy span span,
.add-to-cart-success a > span,
#checkout-review-submit #review-buttons-container button.btn-checkout,
.ajax-index-options .product-view .product-shop .add-to-cart button span span {color: #' . $this->buttonsColors['buttons_color'] . ';}
a.aw-blog-read-more:hover,
.text-block button.btn-buy:hover span span,
.products-list li.item .product-shop button:hover span span,
.header-slider-container button.button:hover span span,
#checkout-step-login .buttons-set button:hover span span,
.op_login_area button.button:hover span span,
#checkout-coupon-discount-load .discount-form .buttons-set button.button:hover span span,
.cart-table .btn-continue:hover span span,
.discount:hover button span span,
.cart .shipping .buttons-set:hover span span,
.cart .btn-proceed-checkout:hover span span,
#footer > .container_12 button:hover span span,
.block-compare button:hover span span,
.block-reorder button:hover span span,
.products-grid li.item .btn-quick-view.small:hover span span,
aside.sidebar .block.block-subscribe button:hover span span,
.my-wishlist td button:hover span span,
.my-wishlist button.btn-share:hover span span,
#login-holder form .actions button:hover span span,
header#header .top-cart .block-content .button:hover span span,
.btn-buy:hover span span,
.add-to-cart-success a:hover > span,
#checkout-review-submit #review-buttons-container button.btn-checkout:hover,
.ajax-index-options .product-view .product-shop .add-to-cart button:hover span span {color: #' . $this->buttonsColors['buttons_color_h'] . ';}

/**** Type 2 ****/
.pager a.asc i,
.pager a.desc i,
.view-mode strong,
.view-mode a:hover,
#login-holder form .actions .link-box a,
.catalog-product-view .box-reviews .data-table thead,
.product-view .product-prev,
.product-view .product-next,
button.button > span,
aside.sidebar .actions a,
.product-buttons .btn-quick-view > span,
header#header .top-cart .block-content .actions a {
	background-color: #' . $this->buttonsColors['buttons2_bg'] . ';
	border-color: #' . $this->buttonsColors['buttons2_border'] . ';
	border-width: ' . $this->buttonsColors['buttons2_border_width'] . 'px;
}
.pager a.asc i,
.pager a.desc i,
.view-mode strong,
.view-mode a:hover,
#login-holder form .actions .link-box a,
.product-view .product-prev,
.product-view .product-next,
button.button span span,
aside.sidebar .actions a,
.product-buttons .btn-quick-view span span,
header#header .top-cart .block-content .actions a {color: #' . $this->buttonsColors['buttons2_color'] . ';}
.pager a.asc i:hover,
.pager a.desc i:hover,
#login-holder form .actions .link-box a:hover,
.product-view .product-prev:hover,
.product-view .product-next:hover,
button.button:hover span span,
aside.sidebar .actions a:hover,
.product-buttons .btn-quick-view:hover span span,
header#header .top-cart .block-content .actions a:hover {color: #' . $this->buttonsColors['buttons2_color_h'] . ';}

/**** "Quick View" Button ****/
.products-grid .product-img-box .btn-quick-view span span,
.products-list .product-img-box .btn-quick-view span span {background-color: rgba('.MAGE::helper('ThemeOptionsIndigo')->HexToRGB($this->buttonsColors['quick_view_bg']).',.4);}
.products-grid .product-img-box .btn-quick-view span span i,
.products-list .product-img-box .btn-quick-view span span i {color: #' . $this->buttonsColors['quick_view_text'] . ';}
.products-grid .product-img-box .btn-quick-view:hover span span,
.products-list .product-img-box .btn-quick-view:hover span span {background-color: #' . $this->buttonsColors['quick_view_bg_h'] . ';}
.products-grid .product-img-box .btn-quick-view:hover span span i,
.products-list .product-img-box .btn-quick-view:hover span span i {color: #' . $this->buttonsColors['quick_view_text_h'] . ';}

/*====== Products =======*/

.products-list .product-image,
.products-grid .product-image {
	background-color: #' . $this->productColors['product_bg'] . ';
	border-width: ' . $this->productColors['product_border_width'] . 'px;
	border-color: #' . $this->productColors['product_border'] . ';
}
.products-grid .product-name a,
.products-list .product-name a {color: #' . $this->productColors['product_title'] . ';}
.products-grid .product-name a:hover,
.products-list .product-name a:hover {color: #' . $this->productColors['product_title_h'] . ';}
.products-list .desc,
.products-grid .desc {color: #' . $this->productColors['product_text'] . ';}
.products-list .desc a,
.products-grid .desc a {color: #' . $this->productColors['product_link_color'] . ';}
.products-list .desc a:hover,
.products-grid .desc a:hover {color: #' . $this->productColors['product_link_color_h'] . ';}
.products-list .price-box .price,
.products-grid .price-box .price {color: #' . $this->productColors['product_price'] . ';}
.products-list .price-box .old-price .price,
.products-grid .price-box .old-price .price {color: #' . $this->productColors['product_old_price'] . ';}
.products-list .price-box .special-price .price,
.products-grid .price-box .special-price .price {color: #' . $this->productColors['product_special_price'] . ';}

/**** Product Labels ****/
.label-new {
	background-color: #' . $this->productColors['label_new_bg'] . ';
	color: #' . $this->productColors['label_new_color'] . ';
}
.label-type-2 .label-new:after {
	border-top-color: #' . $this->productColors['label_new_bg'] . ';
	border-left-color: #' . $this->productColors['label_new_bg'] . ';
}
.label-type-5 span.label-new:after {border-bottom-color: #' . $this->productColors['label_new_bg'] . ';}
.label-type-5 span.label-new:before {border-top-color: #' . $this->productColors['label_new_bg'] . ';}
.label-sale,
.products-grid .availability-only,
.products-list .availability-only {
	background-color: #' . $this->productColors['label_sale_bg'] . ';
	color: #' . $this->productColors['label_sale_color'] . ';
}
.label-type-2.bottom-left .label-sale:after,
.products-grid.label-type-2.bottom-left .availability-only:after,
.products-list.label-type-2.bottom-left .availability-only:after,
.label-type-2.top-left .label-sale:after,
.products-grid.label-type-2.top-left .availability-only:after,
.products-list.label-type-2.top-left .availability-only:after {
	border-top-color: #' . $this->productColors['label_sale_bg'] . ';
	border-right-color: #' . $this->productColors['label_sale_bg'] . ';
}
.label-type-5 div.label-sale:before,
.products-grid.label-type-5 .availability-only:before,
.products-list.label-type-5 .availability-only:before {border-top-color: #' . $this->productColors['label_sale_bg'] . ';}
.label-type-5 div.label-sale:after,
.products-grid.label-type-5 .availability-only:after,
.products-list.label-type-5 .availability-only:after {border-bottom-color: #' . $this->productColors['label_sale_bg'] . ';}
.label-type-2 .label-sale:after,
.products-grid.label-type-2 .availability-only:after,
.products-list.label-type-2 .availability-only:after {
	border-top-color: #' . $this->productColors['label_sale_bg'] . ';
	border-left-color: #' . $this->productColors['label_sale_bg'] . ';
}

/*====== Social Links =======*/

ul.social-links li a,
#footer ul.social-links li a {
	background-color: #' . $this->socialLinksColors['social_links_bg'] . ';
	color: #' . $this->socialLinksColors['social_links_color'] . '; 
	border-color: #' . $this->socialLinksColors['social_links_border'] . ';
	border-width: ' . $this->socialLinksColors['social_links_border_width'] . 'px;
}
ul.social-links li a:hover,
#footer ul.social-links li a:hover {
	background-color: #' . $this->socialLinksColors['social_links_bg_h'] . ';
	color: #' . $this->socialLinksColors['social_links_color_h'] . ';
	border-color: #' . $this->socialLinksColors['social_links_border_h'] . ';
}

/*====== Footer ======*/

footer#footer {background-color: #' . $this->footerColors['footer_bg'] . ';}
footer#footer,
#footer .footer-columns-block .alpha .indent,
#footer address,
#footer .store-switcher {color: #' . $this->footerColors['footer_text'] . ';}
#footer a,
#footer address a {color: #' . $this->footerColors['footer_links'] . ';}
#footer .custom_footer h3 {color: #' . $this->footerColors['footer_title'] . ';}
#footer .custom_footer .right-divider {
	border-color: #' . $this->footerColors['footer_divider'] . ';
	border-width: ' . $this->footerColors['footer_divider_width'] . 'px;
}
#footer .custom-footer-content li {
	background-color: #' . $this->footerColors['footer_link_bg'] . ';
	border-color: #' . $this->footerColors['footer_link_border'] . ';
	border-width: ' . $this->footerColors['footer_link_border_width'] . 'px;
}
#footer .custom-footer-content li a {color: #' . $this->footerColors['footer_link_color'] . ';}
#footer .custom-footer-content li:hover {
	background-color: #' . $this->footerColors['footer_link_bg_h'] . ';
	border-color: #' . $this->footerColors['footer_link_border_h'] . ';
}
#footer .custom-footer-content li:hover a {color: #' . $this->footerColors['footer_link_color_h'] . ';}
#footer label[for="newsletter"] {color: #' . $this->footerColors['footer_subscribe_text'] . ';}
#footer #newsletter {
	background-color: #' . $this->footerColors['footer_subscribe_input_bg'] . ';
	border-color: #' . $this->footerColors['footer_subscribe_input_border'] . ';
	border-width: ' . $this->footerColors['footer_subscribe_input_border_width'] . 'px;
	color: #' . $this->footerColors['footer_subscribe_input_text'] . ';
}
#footer .focus #newsletter {
	background-color: #' . $this->footerColors['footer_subscribe_active_input_bg'] . ';
	border-color: #' . $this->footerColors['footer_subscribe_active_input_border'] . ';
	color: #' . $this->footerColors['footer_subscribe_active_input_text'] . ';
}

/*====== Category Labels =======*/
.nav-wide#nav-wide li.level-top .category-label.label_one { 
    background-color: #' . $this->catlabelsColors['label_one'] . ';
    border-color: #' . $this->catlabelsColors['label_one'] . ';
    color: #' . $this->catlabelsColors['label_one_color'] . ';
}
.nav-wide#nav-wide li.level-top a.level-top:hover .category-label.label_one,
.nav-wide#nav-wide li.level-top li a:hover .category-label.label_one  { 
    background-color: #' . $this->catlabelsColors['label_one_h'] . ';
    border-color: #' . $this->catlabelsColors['label_one_h'] . ';
    color: #' . $this->catlabelsColors['label_one_color_h'] . ';
}
.nav-wide#nav-wide li.level-top .category-label.label_two { 
    background-color: #' . $this->catlabelsColors['label_two'] . ';
    border-color: #' . $this->catlabelsColors['label_two'] . ';
    color: #' . $this->catlabelsColors['label_two_color'] . ';
}
.nav-wide#nav-wide li.level-top a.level-top:hover .category-label.label_two,
.nav-wide#nav-wide li.level-top li a:hover .category-label.label_two { 
    background-color: #' . $this->catlabelsColors['label_two_h'] . ';
    border-color: #' . $this->catlabelsColors['label_two_h'] . ';
    color: #' . $this->catlabelsColors['label_two_color_h'] . ';
}
.nav-wide#nav-wide li.level-top .category-label.label_three { 
    background-color: #' . $this->catlabelsColors['label_three'] . ';
    border-color: #' . $this->catlabelsColors['label_three'] . ';
    color: #' . $this->catlabelsColors['label_three_color'] . ';
}
.nav-wide#nav-wide li.level-top a.level-top:hover .category-label.label_three,
.nav-wide#nav-wide li.level-top li a:hover .category-label.label_three { 
    background-color: #' . $this->catlabelsColors['label_three_h'] . ';
    border-color: #' . $this->catlabelsColors['label_three_h'] . ';
    color: #' . $this->catlabelsColors['label_three_color_h'] . ';
}

';
}
    	$this->saveData($css);
        Mage::getSingleton('adminhtml/session')->addSuccess(Mage::helper('ThemeOptionsIndigo')->__("CSS file with custom styles has been created"));
        Mage::getSingleton('adminhtml/session')->addNotice(Mage::helper('ThemeOptionsIndigo')->__('<div class="meigee-please"><a target="_blank" href="https://meigeeteam.freshdesk.com/support/home"><img src="' . Mage::getBaseUrl('skin') . '/adminhtml/default/indigo/images/support.png" /></a>&nbsp;<a target="_blank" href="http://themeforest.net/downloads"><img src="' . Mage::getBaseUrl('skin') . '/adminhtml/default/indigo/images/rating.png" /></a><h2>Like us</h2>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
  fjs.parentNode.insertBefore(js, fjs);
}(document, "script", "facebook-jssdk"));</script>
<div class="fb-like" data-href="http://facebook.com/meigeeteam" data-layout="button_count" data-action="like" data-show-faces="false" data-width="200" data-share="true"></div>&nbsp;
<a href="https://twitter.com/meigeeteam" class="twitter-follow-button" data-show-count="false" data-lang="en">Follow @meigeeteam</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
</div>'));




        return true;
    }

    private function saveData($data)
    {
        $this->setLocation ();

        try {
	        /*$fh = fopen($file, 'w');
	       	fwrite($fh, $data);
	        fclose($fh);*/

            $fh = new Varien_Io_File(); 
            $fh->setAllowCreateFolders(true); 
            $fh->open(array('path' => $this->dirPath));
            $fh->streamOpen($this->filePath, 'w+'); 
            $fh->streamLock(true); 
            $fh->streamWrite($data); 
            $fh->streamUnlock(); 
            $fh->streamClose(); 
    	}
    	catch (Exception $e) {
            Mage::getSingleton('adminhtml/session')->addError(Mage::helper('ThemeOptionsIndigo')->__('Failed creation custom css rules. '.$e->getMessage()));
        }
    }

}