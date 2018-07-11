        <div class="blends-container">
            <div class="col-xs-12 text-center title-hero icy-bg" style="margin-bottom:0;">
                <h1 class="page-title">Scent Lab Blends</h1>
                <div class="directory-details">
                    <h2>Our versatile blends are easy to combine and modify when creating your fragrances.</h2>
                    <a href="#learn-more" class="blends-more btn btn-primary">Learn More</a>
                </div>
                <?php if ( $this->ion_auth->is_admin() ): ?>
                        <p class="add-rm"><a class="various fancybox.ajax" href="blends/add/">+</a></p>
                <?php endif; ?>
            </div>

            <div class="col-xs-12 directory-wrapper">
                <div class="row">
                    <?php foreach ($blends as $blend): ?>
                        <div class="col-xs-12 col-sm-4 col-md-3 main blends">
                            <h2 class="text-center card-heading"><a href="blends/<?php echo $blend['slug'] ?>"><?php echo $blend['name'] ?></a></h2>
                            <a href="blends/<?php echo $blend['slug'] ?>"><img src="<?php echo base_url('assets/public/images/blends/labels/'.$blend['slug'].'.jpg'); ?>" alt="<?php echo $blend['name'] ?>" /></a>
                            <div class="text-center rm-card-details">
                                <p class="text-uppercase"><strong><?php echo $blend['family'] ?></strong></p>
                                <p><?php echo $blend['description']; ?></p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div><!-- // .directory-wrapper-->

        </div><!-- // .blends-container -->

        <!-- #learn-more -->
        <div id="learn-more" class="col-xs-12">
            <div class="row" id="learn-blends-1">
                <div class="col-sm-12">
                    <div class="display-table">
                        <div class="display-table-cell">
                            <div class="table-cell-content">
                                <h2>Scent Lab Blends</h2>
                                <hr class="short-blue">
                                <p>We developed our blends to be versatile so you can easily combine and modify them when creating your formulas. Each blend is made up primarily of heart and base notes, which provide character and help a fragrance last longer. Blends <a href="blends/no-11" title="No. 11 iris">No. 11</a> and <a href="blends/no-12" title="No. 12 oud">No. 12</a> contain natural materials (orris butter and oud) that are not available as ingredients for individual use.</p>
                            </div>
                        </div>
                        <div class="display-table-cell table-cell-bg-image"></div>
                    </div>
                </div>
            </div>
            <div class="row hide">
                <div class="col-sm-12">
                    <div class="display-table">
                    <div class="display-table-cell table-cell-bg-image"></div>
                        <div class="display-table-cell">
                            <div class="table-cell-content">
                                <h2>How to Use</h2>
                                <hr class="short-blue">
                                <p>Use our custom blends as the base, or foundation, for your fragrance, then build the rest of the fragrance around it. 
                                Our blends are made up of heart and base notes that help root a fragrance and make it last longer.
                                Begin with a blend, or combination of blends, at 60% or higher. Then, add individual <a href="<?php echo base_url('raw-materials'); ?>">raw materials</a> to make the fragrance uniquely yours.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row hide">
                <div class="col-sm-12">
                    <div class="display-table">
                        <div class="display-table-cell">
                            <div class="table-cell-content">
                                <h2>Mix &amp; Match</h2>
                                <hr class="short-blue">
                                <p>Exquisite as they are on their own, our custom blends can also be easily mixed and matched to create exciting new scents.</p> 
                                <p>Here are some of our favorite combinations:</p>
                                <p>
                                    <a href="blends/no-3" title="No. 3 rose">rose</a> <strong>+</strong> <a href="blends/no-7" title="No. 7 incense">incense</a> 
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
                                    <a href="blends/no-8" title="No. 8 ambrette seed">ambrette seed</a> <strong>+</strong> <a href="blends/no-5" title="No. 5 osmanthus">osmanthus</a> 
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
                                    <br /><br /> 
                                    <a href="blends/no-2" title="No. 2 jasmine">jasmine</a> <strong>+</strong> <a href="blends/no-4" title="No. 4 orange flower">orange flower</a>
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <a href="blends/no-9" title="No. 9 milk">milk</a> <strong>+</strong> <a href="blends/no-11" title="No. 11 iris">iris</a> 
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
                                    <br /><br /> 
                                    <a href="blends/no-7" title="No. 7 incense">incense</a> <strong>+</strong> <a href="blends/no-10" title="No. 10 cedar">cedar</a> 
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
                                    <a href="blends/no-6" title="No. 6 tuberose">tuberose</a> <strong>+</strong> <a href="blends/no-12" title="No. 12 oud">oud</a>
                                </p>
                            </div>
                        </div>
                        <div class="display-table-cell table-cell-bg-image"></div>
                    </div>
                </div>
            </div>
        </div><!-- // learn more -->

        <!-- Get Started CTA -->
        <div class="col-xs-12 text-center cta-page icy-bg">
            <p>Ready to create your own fragrance?</p>
            <a href="<?php echo base_url('scent-kits'); ?>" class="clear btn btn-primary btn-lg get-started">Shop Scent Kits</a>
        </div><!-- / Get Started CTA -->

        <script type="text/javascript">
            
            $(document).ready(function(){

                // smooth scrolling to internal page links
                $('a[href^="#"]').on('click',function (e) {
                    e.preventDefault();

                    var target = this.hash,
                    $target = $(target);

                    $('html, body').stop().animate({
                        'scrollTop': $target.offset().top
                    }, 300, 'swing', function () {
                        window.location.hash = target;
                    });
                });
                
                <?php foreach ($faves as $fave): ?>

                var $fave = "<?php echo $fave["name"]; ?>";

                makeFave($fave);

                <?php endforeach; ?>

            });
            
        </script>
        
        
        
        
        
        



