            <div class="sr reveal-title col-xs-12 title-hero border-bottom-light" style="margin-bottom:0;">
                <h1 class="page-title">How It Works</h1>
                <div class="directory-details">
                    <h2>We equip you with all of the materials, supplies and information you need to create your own fragrances.</h2>
                </div>
            </div>

            <!-- #learn-more -->
            <div class="sr reveal-content display-table-container col-xs-12 col-md-12" id="how-it-works--table">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="display-table">
                            <div class="visible-xs display-table-cell table-cell-bg-image"></div>
                            <div class="display-table-cell">
                                <div class="table-cell-content">
                                    <h4 class="uc">Perfume Ingredients</h4>
                                    <h2>Discover raw materials</h2>
                                    <p>Our <a class="" href="<?php echo base_url('raw-materials'); ?>">collection</a> contains natural and synthetic ingredients sourced from all over the world. We’re constantly seeking out and testing new raw materials in order to provide the highest-quality ingredients. </p>
                                    <a class="btn btn-primary" href="<?php echo base_url('raw-materials'); ?>">get started</a>
                                </div>
                            </div>
                            <div class="hidden-xs display-table-cell table-cell-bg-image parallax-f-v-1"></div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="display-table">
                            <div class="display-table-cell table-cell-bg-image parallax-f-v-1"></div>
                            <div class="display-table-cell">
                                <div class="table-cell-content">
                                    <h4 class="uc">Scent Kits</h4>
                                    <h2>Create original scents</h2>
                                    <p><a href="<?php echo base_url('scent-kits'); ?>" title="Scent Kits">Scent kits</a> contain everything you need to make custom scents at home. Each kit is based around a featured ingredient and contains a curated selection of raw materials to explore. Learn to smell and evaluate raw materials, then experiment with different blends to create unique fragrance formulas.</p>
                                    <a class="btn btn-primary" href="<?php echo base_url('scent-kits'); ?>" title="Scent Kits">Get Started</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="display-table">
                            <div class="display-table-cell">
                                <div class="visible-xs display-table-cell table-cell-bg-image"></div>
                                <div class="table-cell-content">
                                    <h4 class="uc">Scent Lab</h4>
                                    <h2>Order custom fragrances</h2>
                                    <p>The <a href="<?php echo base_url('lab'); ?>" title="Scent Lab">scent lab</a> is your personal fragrance lab. Save your fragrance formulas and order custom bottles of the scents you create with your <a href="<?php echo base_url('scent-kits'); ?>" title="Scent Kits">scent kits</a>.</p>
                                    <a class="btn btn-primary" href="<?php echo base_url('lab'); ?>">Learn More</a>
                                </div>
                            </div>
                            <div class="hidden-xs display-table-cell table-cell-bg-image parallax-f-v-1"></div>
                        </div>
                    </div>
                </div>
            </div><!-- // #learn more -->

            <!-- Get Started CTA -->
            <div class="col-xs-12 text-center cta-page icy-bg">
                <p class="h2">Ready to get started<span class="symbol">?</span></p>
                <a href="<?php echo base_url('scent-kits'); ?>" class="clear btn btn-primary btn-lg get-started">Shop Scent Kits</a>
            </div><!--Get Started prompt-->

            <script type="text/javascript">
                $(document).ready(function(){

                    // ScrollReveal
                    window.sr = ScrollReveal();
                    sr.reveal('.reveal-title', { duration: 1000, scale: 1 } );
                    sr.reveal('.reveal-content', { delay: 500, distance: 0, duration: 1000, scale: 1 } );

                });
            </script>
