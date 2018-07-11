<? header("Content-Type: text/html; charset=UTF-8"); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">

    <head>

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-31812044-1"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      // gtag('config', 'UA-31812044-1');
    </script>

	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <?php if(isset($description)): ?>
    <meta name="description" content="<?php echo $description ?>" />
    <?php endif; ?>
	<meta name="robots" content="INDEX,FOLLOW" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
	
    <title><?php echo $title ?> | osmanthōs</title>
    <link rel="shortcut icon" href="<?php echo base_url('/favicon.ico')?>" />

    <style>

      /* Ensure elements load hidden before ScrollReveal runs */
      .sr { visibility: hidden; }

    </style>

    <!-- Main CSS -->
    <link rel="stylesheet" href="<?php echo base_url('assets/public/css/main.css');?>" type="text/css" media="screen" /> <!-- SASS Compiled -->
    <link rel="stylesheet" href="<?php echo base_url('assets/public/fancybox/dist/jquery.fancybox.min.css'); ?>" type="text/css" media="screen" />
    <link rel="stylesheet" href="<?php echo base_url('assets/public/css/style.v2.css');?>" type="text/css" media="screen" />

    <!-- Google Web Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,700" rel="stylesheet">
    
    <!-- JS -->
    <script src="<?php echo base_url('assets/public/js/jquery-2.1.3.min.js');?>" type="text/javascript"></script>
    <script src="<?php echo base_url('assets/public/js/modernizr.dev.js');?>" type="text/javascript"></script>
    <script src="//cdn.jsdelivr.net/jquery.mixitup/latest/jquery.mixitup.min.js"></script>
    <script src="<?php echo base_url('assets/public/js/preload.js');?>" type="text/javascript"></script>
    
    <!-- Nivo Slider -->
    <?php if (isset($nivoSlider)): ?>
        <link rel="stylesheet" href="<?php echo base_url('assets/public/nivo-slider/nivo-slider.css'); ?>" type="text/css" media="screen" />
        <script src="<?php echo base_url('assets/public/nivo-slider/jquery.nivo.slider.pack.js'); ?>" type="text/javascript"></script>
    <?php endif; ?>

    <!-- Fonticons -->
    <script src="//use.fonticons.com/b6b428f6.js"></script>

    </head>

    <body class="<?php if(isset($template)) echo 'page-' . $template; ?>">
    <!-- insert Google Analytics here -->
    	<div id="container" class="container-fluid">
        <div class="row">
            <div class="col-xs-12 promoBanner text-center"><a href="<?php echo base_url('how-it-works'); ?>">Everything you need to create your own fragrances.</a></div>
        </div>
        <div class="row row-fixed utility-wrap clearfix hidden-xs hidden-sm">
            <div class="col-md-3 text-center" id="logo">
                <a href="<?php echo base_url(); ?>"></a>
            </div>
            <div class="col-md-9">
                <div class="main-nav-container">
                    <div class="main-nav">
                        <ul class="list-unstyled list-inline text-right clearfix">
                            <li><a class="hoverline" href="<?php echo base_url('scent-kits'); ?>" >Scent Kits</a>
                                <ul class="hide sub-menu-custom list-unstyled">
                                    <li><a href="<?php echo base_url('scent-kits/01-jasmine-grandiflorum'); ?>"><span style="font-family: 'Roboto';">01</span> jasmine</a></li>
                                </ul>
                            </li>
                            <li><a class="hoverline" href="<?php echo base_url('lab'); ?>">Lab</a></li>
                            <li><a class="hoverline" href="<?php echo base_url('raw-materials'); ?>">Raw Materials</a></li>
                            <?php if ( $this->ion_auth->logged_in() ) : ?>
                                <li><a class="hoverline" href="<?php echo base_url('account/mods'); ?>">Account</a>
                                    <ul class="sub-menu list-unstyled">
                                        <li><a href="<?php echo base_url('/account/mods'); ?>">Formulas</a></li>
                                        <li><a href="<?php echo base_url('/account/orders'); ?>">Order History</a></li>
                                        <li><a href="<?php echo base_url('auth/logout/'); ?>">Log Out</a></li>
                                    </ul>
                                </li>   
                                <?php if( $this->ion_auth->is_admin() ) : ?>
                                    <li><a class="hoverline" href="<?php echo base_url('admin/formulas'); ?>" >Admin</a></li>
                                <?php endif; ?> 
                            <?php else: ?>
                                <li><a class="hoverline" href="<?php echo base_url('login'); ?>" >Log In</a></li>
                            <?php endif; ?>
                            <li id="shopping-basket">
                                <a id="cart-link" href="<?php echo base_url('checkout/cart'); ?>">
                                    <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="294px" height="427.5px" viewBox="0 0 294 427.5" enable-background="new 0 0 294 427.5" xml:space="preserve">
                                        <rect x="15" y="148.5" fill="#FFFFFF" stroke="#000000" stroke-width="30" stroke-miterlimit="10" width="264" height="264"></rect>
                                        <path fill="none" stroke="#000000" stroke-width="30" stroke-miterlimit="10" d="M59.577,148.969C59.577,74.979,98.56,15,146.647,15
                                        c48.087,0,87.07,59.979,87.07,133.969"></path>
                                    </svg>
                                    <span><?php echo $this->cart->total_items(); ?></span>
                                </a>
                                <ul class="list-unstyled">
                                    <div id="cart-widget">
                                    <?php if ( $cart = $this->cart->contents() ): ?>
                                        <table>
                                            <caption class="text-center">Shopping Basket</caption>
                                            <?php foreach ($cart as $item): ?>
                                            <tr>
                                                <td><?php echo $item['name']; ?></td>
                                                <td>
                                                    <?php if ($this->cart->has_options($item['rowid']))
                                                    {
                                                        $array = $this->cart->product_options($item['rowid']);
                                                        echo reset($array);
                                                        //foreach($this->cart->product_options($item['rowid']) as $option => $value)
                                                        //{echo "<em>" . $value . "</em>";}
                                                    } ?>
                                                </td>
                                                <td>$<?php echo $item['subtotal']; ?></td>
                                            </tr>
                                            <?php endforeach;?>
                                            <tr class="total">
                                                <td colspan="2">Order Total</td>
                                                <td>$<?php echo $this->cart->total(); ?></td>
                                            </tr>
                                        </table>
                                        <a class="btn btn-primary btn-sm" href="<?php echo base_url('checkout/cart'); ?>">Checkout</a>
                                    <?php else: ?>
                                        <table>
                                            <caption class="text-center">Shopping Basket</caption>
                                        </table>
                                        <p class="text-center">Your basket is empty.</p> 
                                    <?php endif; ?>
                                    </div><!-- end cart-widget-->
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div><!--end main-nav-container -->
            </div>
        </div><!--end utility-wrap-->
        <div class="row row-fixed utility-wrap clearfix visible-xs visible-sm">
            <div class="col-xs-2" style="padding-right:0;">
                <div class="menu-toggle">Menu</div>
                <div class="mobile-nav-container">
                    <div class="menu-close menu-toggle">
                        <button type="button" class="close" aria-label="Close"><span aria-hidden="true">&larr; back</span></button>
                    </div>
                    <div class="main-nav">
                        <ul class="list-unstyled text-left clearfix">
                            <li><a href="<?php echo base_url('scent-kits'); ?>" >Scent Kits</a></li>
                            <li><a href="<?php echo base_url('lab'); ?>">Lab</a></li>
                            <li><a href="<?php echo base_url('raw-materials'); ?>">Raw Materials</a></li>
                            <li><a href="<?php echo base_url('about-us'); ?>" title="About osmanthōs">About</a></li>
                            <?php if ( $this->ion_auth->logged_in() ) : ?>
                                <hr>
                                <li><a href="<?php echo base_url('account/mods'); ?>">Account</a></li>
                                <li><a href="<?php echo base_url('/account/mods'); ?>">Formulas</a></li>
                                <li><a href="<?php echo base_url('/account/orders'); ?>">Order History</a></li>
                                <li><a href="<?php echo base_url('auth/logout/'); ?>">Log Out</a></li>   
                                <?php if( $this->ion_auth->is_admin() ) : ?>
                                    <li><a class="hoverline" href="<?php echo base_url('admin/formulas'); ?>" >Admin</a></li>
                                <?php endif; ?> 
                            <?php else: ?>
                                <li><a href="<?php echo base_url('auth/login/'); ?>" >Log In</a></li>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div><!--end mobile-nav-container-->
            </div>
            <div class="col-xs-8 text-center" id="logo">
                <a href="<?php echo base_url(); ?>"></a>
            </div>
            <div class="col-xs-2 text-right" id="shopping-basket--mobile" style="padding-left:0;">
                <a id="cart-link" href="<?php echo base_url('checkout/cart'); ?>">
                    <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="294px" height="427.5px" viewBox="0 0 294 427.5" enable-background="new 0 0 294 427.5" xml:space="preserve">
                        <rect x="15" y="148.5" fill="#FFFFFF" stroke="#000000" stroke-width="30" stroke-miterlimit="10" width="264" height="264"></rect>
                        <path fill="none" stroke="#000000" stroke-width="30" stroke-miterlimit="10" d="M59.577,148.969C59.577,74.979,98.56,15,146.647,15
                        c48.087,0,87.07,59.979,87.07,133.969"></path>
                    </svg>
                    <span><?php echo $this->cart->total_items(); ?></span>
                </a>
            </div>
        </div><!--mobile-nav-->
        <div class="page-banner"></div>
        <div class="row wrapper">