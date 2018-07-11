<?php $this->load->helper('html'); ?>

            <!-- Show light box if user is not logged in -->
            <?php if (! $this->ion_auth->logged_in() ) : ?>
                <a data-fancybox data-src="#welcome_lightbox" href="javascript:;" id="block-link"></a>
            <?php endif; ?>
            
            <div class="slider-wrapper" id="home-hero">
                <img class="sr reveal-hero" src="<?php echo base_url('assets/public/images/photos/aromatics-crop.jpg'); ?>">
                <div class="sr reveal-title" id="home-video-overlay">
                    <div class="content-wrapper">
                        <h2>Create custom scents.</h2>
                        <p>Now it's easy for you to create your own fragrances. All of the essentials are here—all you need is a little creativity.</p>
                        <a class="btn btn-primary" href="<?php echo base_url('scent-kits'); ?>" title="Scent Kits" >Get Started</a>
                    </div>
                </div>
            </div>

            <div class="home-quote icy-bg col-xs-12 text-center pad-80">
                <p class="maison-mono">Get lost in the creative process, embrace imperfection, and create the perfect scent for you.</p>
                <a href="<?php echo base_url('scent-kits'); ?>" class="clear btn btn-primary btn-lg get-started">Shop Scent Kits</a>
            </div>

            <!-- Get Started CTA -->
            <div class="hide col-xs-12 text-center cta-page icy-bg">
                <p>Ready to get started?</p>
                <a href="<?php echo base_url('scent-kits'); ?>" class="clear btn btn-primary btn-lg get-started">Shop Scent Kits</a>
            </div><!-- / Get Started CTA -->

            <div style="display: none" id="welcome_lightbox">
                <div class="modal-img"></div>
                <div class="text-inner">
                    <img src="<?php echo base_url('assets/public/images/osmanthos_logo.svg'); ?>" alt="osmanthos" width="175" />
                    <h2>Welcome to the new world of scent.</h2>
                    <p>We equip you with all of the materials, supplies and information you need to start creating your own fragrances.
                        <span class="yellow-line">Opening Summer 2018</span>&mdash;submit your email below to be the first to know.</span>
                    </p>
                    <form action="//osmanthos.us5.list-manage.com/subscribe/post-json?u=ebe2b7e83945317e263fec96c&amp;id=32916f01f5&c=?" method="post" id="mc-embedded-subscribe-form--modal" name="mc-embedded-subscribe-form" class="validate form-inline" target="_blank" >
                        <input class="form-control" type="email" name="EMAIL" id="mce-EMAIL" value="" placeholder="Your Email" autocomplete="off" />
                        <input class="btn btn-primary" type="submit" name="subscribe" id="email_submit" value="Submit">
                        <div id="subscribe-result"></div>
                    </form>
                    <p class="hide">Already have an account? <a href="<?php echo base_url('login'); ?>">Log in</a></p>
                </div>                                          
            </div>

            <script type="text/javascript">
                
                $(document).ready(function () {
                    
                    $("[data-fancybox]").fancybox({
                        animationEffect: "fade",
                        animationDuration: 250,
                        // modal: true,
                        image : {
                            preload: true
                        }
                    }).trigger("click");

                    // ScrollReveal
                    window.sr = ScrollReveal();
                    sr.reveal('.reveal-hero', { scale: 1, duration: 1500, distance: 0 });
                    sr.reveal('.reveal-title', { duration: 1000, scale: 1 } );
                    sr.reveal('.reveal-sequence', { duration: 500, scale: 1 }, 500);
                    
                });
               
            </script>