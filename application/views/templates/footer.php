            </div><!-- End Wrapper -->
            <div class="row footer clear">
                <!--<div class="feedback">
                    <a href="mailto:hello@thescentmarket.com?subject=Feedback">Send Us Your Feedback</a>
                </div>-->
                <div class="col-xs-12">
                    <div class="row row-fixed">
                        <div class="hidden-xs col-sm-12 col-md-7 footer-nav">
                            <ul class="list-unstyled">
                                <li class="list-title">Customer Care</li>
                                <li><a href="mailto:hello@osmanthos.com" title="Email hello@osmanthos.com">Contact Us <span>→</span></a></li>
                                <li><a href="<?php echo base_url('frequently-asked-questions'); ?>">Help &amp; FAQ <span>→</span></a></li>
                                <li><a href="<?php echo base_url('shipping-and-returns'); ?>">Shipping &amp; Returns <span>→</span></a></li>
                                <li><a href="<?php echo base_url('privacy'); ?>">Privacy <span>→</span></a></li>
                                <li><a href="<?php echo base_url('terms'); ?>">Terms <span>→</span></a></li>
                            </ul>
                            <ul class="list-unstyled">
                                <li class="list-title">About</li>
                                <li><a href="<?php echo base_url('how-it-works'); ?>" title="How osmanthōs Works">How it Works <span>→</span></a></li>
                                <li><a href="<?php echo base_url('scent-101'); ?>" title="Scent 101">Scent 101 <span>→</span></a></li>
                                <li><a href="<?php echo base_url('about-us'); ?>" title="About osmanthōs">About Us <span>→</span></a></li>
                            </ul>
                            <?php if ( $this->ion_auth->logged_in() ) : ?>
                                <ul class="list-unstyled">
                                    <li class="list-title">Account</li>
                                    <li><a href="<?php echo base_url('account/mods'); ?>">Formulas <span>→</span></a></li>
                                    <li style="display:none"><a href="<?php echo base_url('account/fragrances'); ?>">Fragrances <span>→</span></a></li>
                                    <li><a href="<?php echo base_url('account/orders'); ?>">Order History <span>→</span></a></li>
                                </ul>
                            <?php else: ?>
                                <ul class="list-unstyled">
                                    <li class="list-title">Get Started <span>→</span></li>
                                    <li><a href="<?php echo base_url('scent-kits'); ?>" >Scent Kits</a></li>
                                    <li><a href="<?php echo base_url('lab'); ?>">Scent Lab</a></li>
                                    <li><a href="<?php echo base_url('raw-materials'); ?>">Raw Materials</a></li>
                                </ul>
                            <?php endif; ?>
                        </div>
                        <div class="col-xs-12 col-md-5">
                            <ul class="list-unstyled footer-mailing-list text-center">
                                <li class="list-title">Hear from us</li>
                                <li>
                                    <div>
                                        <p>Join the list for early access to new products and special offers.</p>
                                        <form action="//osmanthos.us5.list-manage.com/subscribe/post-json?u=ebe2b7e83945317e263fec96c&amp;id=32916f01f5&c=?" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate form-inline" target="_blank" >
                                            <label for="mce-EMAIL"></label>
                                            <input class="form-control" type="email" name="EMAIL" id="mce-EMAIL" value="" placeholder="Your Email" autocomplete="off" />
                                            <input type="submit" name="subscribe" class="btn btn-primary" id="email_submit" value="Submit">
                                            <div id="subscribe-result"></div>
                                        </form>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="visible-xs col-xs-12 footer-nav">
                            <ul class="list-unstyled">
                                <li><a href="<?php echo base_url('scent-kits'); ?>" >Scent Kits</a></li>
                                <li><a href="<?php echo base_url('lab'); ?>">Scent Lab</a></li>
                                <li><a href="<?php echo base_url('raw-materials'); ?>">Raw Materials</a></li>
                                <li><a href="<?php echo base_url('about-us'); ?>" title="About osmanthōs">About Us</a></li>
                                <li><a href="<?php echo base_url('how-it-works'); ?>" title="How osmanthōs Works">How It Works</a></li>
                                <li><a href="<?php echo base_url('scent-101'); ?>" title="Scent 101">Scent 101</a></li>
                                <li><a href="mailto:hello@osmanthos.com" title="Email hello@osmanthos.com">Contact Us</a></li>
                                <li><a href="<?php echo base_url('frequently-asked-questions'); ?>">Help &amp; FAQ</a></li>
                                <li><a href="<?php echo base_url('shipping-and-returns'); ?>">Shipping &amp; Returns</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 footer-content text-center">
                    <div class="row row-fixed">
                        <div class="col-xs-12 col-sm-6 copyright">
                            <p>&copy; <?php echo date("Y"); ?> osmanthōs. All rights reserved.</p>
                            <p class="visible-xs">
                                <a href="<?php echo base_url('privacy'); ?>">Privacy</a>
                                &nbsp; &nbsp; &nbsp;
                                <a href="<?php echo base_url('terms'); ?>">Terms</a>
                            </p>
                        </div>
                    </div>
                    
                    
                </div>
            </div>
        </div><!--End Container-->

        <div class="modal--background"></div>

        <script type="text/javascript" src="<?php echo base_url('assets/public/fancybox/dist/jquery.fancybox.min.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url('assets/public/js/slick.min.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url('assets/public/js/jquery.paroller.min.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url('assets/public/js/scrollreveal.min.js'); ?>"></script>
        <script src="<?php echo base_url('assets/public/js/global.js');?>" type="text/javascript"></script>
    </body>
</html>