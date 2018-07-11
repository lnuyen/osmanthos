<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>404 Page Not Found | osmanthōs</title>
	<link rel="shortcut icon" href="<?php echo base_url('/favicon.ico')?>" />

	<!-- Main CSS -->
	<link rel="stylesheet" href="<?php echo base_url('assets/public/css/main.css');?>" type="text/css" media="screen" /> <!-- SASS Compiled -->
	<link rel="stylesheet" href="<?php echo base_url('assets/public/fancybox/dist/jquery.fancybox.min.css'); ?>" type="text/css" media="screen" />
	<link rel="stylesheet" href="<?php echo base_url('assets/public/css/style.v2.css');?>" type="text/css" media="screen" />

	<style type="text/css">
		#logo a {
			margin: 0 auto;
		}
		.title-hero {
			margin-bottom:0;
			padding-bottom: 0;
		}
		#how-it-works--table {
			padding-top: 0;
		}
		h1 {
			font-weight: bold;
		}
		h2 p {
			color: #111;
		}
		.btn-primary:hover {
			color: #111;
			background-color: #f3f569;
    		border-color: #f3f569;
		}
		p > a:hover {
			color: #111;
    		text-decoration: none;
		}
		ul {
    		margin-bottom: 45px;
			padding-left: 20px;
		}
		li > p {
			margin-bottom: 0;
		}
	</style>
</head>

<body>
	<div id="container" class="container-fluid">
        <div class="row">
            <div class="col-xs-12 promoBanner text-center"><a href="<?php echo base_url('how-it-works'); ?>">Everything you need to create your own fragrances.</a></div>
        </div>
        <div class="row row-fixed utility-wrap clearfix hidden-xs hidden-sm">
            <div class="col-xs-12 text-center" id="logo">
                <a href="<?php echo base_url(); ?>"></a>
            </div>
        </div>
        <div class="row">
			<div class="col-xs-12 title-hero">
                <h1 class="page-title"><?php echo $heading; ?></h1>
                <div class="directory-details">
                    <h2><?php echo $message; ?></h2>
                </div>
            </div>
            <div class="display-table-container col-xs-12 col-md-12" id="how-it-works--table">
            	<div class="row">
                    <div class="col-sm-12">
                        <div class="display-table">
                            <div class="display-table-cell table-cell-bg-image" style="background-image: url('<?php echo base_url('assets/public/images/photos/pink-pepper-alt.jpg'); ?>'); background-size: 100%;"></div>
                            <div class="display-table-cell">
                                <div class="table-cell-content">
                                    <h4 class="uc">How can we help?</h4>
                                    <h2>Try one of the links below:</h2>
                                    <ul>
                                    	<li><p>Our <a class="" href="<?php echo base_url('raw-materials'); ?>">collection</a> contains natural and synthetic raw materials sourced from all over the world.</p></li>
                                    	<li><p><a href="<?php echo base_url('scent-kits'); ?>" title="Scent Kits">Scent kits</a> have everything you need to make custom scents at home.</p></li>
                                    	<li><p>The <a href="<?php echo base_url('lab'); ?>" title="Scent Lab">scent lab</a> is your personal fragrance lab.</p></li>
                                    </ul>
                                    <a class="btn btn-primary" href="<?php echo base_url(); ?>" title="Scent Kits">Return Home</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
		</div>
    </div>
</body>
</html>