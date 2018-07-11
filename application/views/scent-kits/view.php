    <?php $this->load->helper('form'); ?>

    <div class="buy-button-fixed text-center border-bottom-light">
        <div class="col-xs-12">
        <p class="maison-mono">$95. scent kit <?php echo $kit['number'] ?></p>
        <?php $attribute = array('class' => 'addtobasket'); echo form_open('order/add', $attribute); ?>
        <?php echo form_hidden('id','9'); ?>
        <?php echo form_hidden('option_name', $kit['number'] . ' ' . $kit['name']); ?>
        <?php echo form_submit(array(
                'name' => 'action',
                'value' => 'Add to Basket',
                'class' => 'add-to-cart btn btn-primary btn-sm'
            )); ?>
        <?php echo form_close(); ?>
        </div>
    </div>

    <div class="col-xs-12 title-hero">
        <div class="row row-fixed">
            <div class="col-xs-12 col-md-10 col-md-offset-1">
                <img class="sr reveal-hero img-responsive" src="<?php echo base_url('assets/public/images/kits/kit-01-hero.jpg'); ?>" />
                <div class="img-textbox-overlay">
                    <div class="sr reveal-title">
                        <h2>scent kit <?php echo $kit['number'] ?></h2>
                        <h1 class="page-title"><?php echo $kit['name'] ?></h1>

                        <p>Create custom scents with a curated selection of raw materials featuring Jasmine grandiflorum, one of the oldest known and most widely-used botanical scents.</p>
                        <a class="link-uc" href="#kit-details">Learn More</a>
                        <?php $attribute = array('class' => 'addtobasket hide'); echo form_open('order/add', $attribute); ?>
                        <?php echo form_hidden('id','9'); ?>
                        <?php echo form_hidden('option_name', $kit['number'] . ' ' . $kit['name']); ?>
                        <?php echo form_submit(array(
                                'name' => 'action',
                                'value' => '$95 - Add to Basket',
                                'class' => 'add-to-cart btn btn-primary btn-sm'
                            )); ?>
                        <?php echo form_close(); ?>
                    </div>
                </div>
            </div>
        </div>


        <div class="coming-soon--opt-in text-right">
            <a class="toggle--opt-in visible-xs text-center" href="#coming-soon"><span>Coming</span><span>Soon!</span><span>Notify Me</span></a>
            <a class="toggle--opt-in btn btn-primary hidden-xs" href="#">Coming Soon - Notify Me!</a>
            <div class="text-left celadon-bg-solid" id="coming-soon--opt-in">
                <h4>Limited quantity coming soon!</h4>
                <p>Enter your email to be the first to know when this kit becomes available.</p>
                <div class="form-messages"><span></span></div>
                <form class="form-inline kits-signup" method="post" action="<?php echo base_url('scent-kits/mailer'); ?>">
                    <input type="email" class="form-control" id="email" name="email" autocomplete="off" required placeholder="Your Email">
                    <input type="hidden" name="form_id" value="view01">
                    <input type="submit" class="btn btn-primary">
                </form>
                <div class="toggle--opt-in close--opt-in"></div>
            </div>
        </div>
    </div>

    <div class="col-xs-12 icy-bg-solid" id="kit-details">
        <div class="row row-fixed">
            <div class="text-module parallax col-sm-8 col-md-5" id="general-info">
                <div class="text-module-inner">
                    <h3>Think like a perfumer</h3>
                    <p class="large">Learn how to create and evaluate unique fragrance formulas.</p>
                    <div class="text-group">
                        <h5>scent 101</h5>
                        <p>Learn about topics like types of fragrance, natural and synthetic raw materials, and perfume lingo.</p>
                    </div>
                    <div class="text-group">
                        <h5>smell</h5>
                        <p>Get to know <a href="<?php echo base_url('raw-materials/jasmine-grandiflorum'); ?>" title="Jasmine grandiflorum">Jasmine grandiflorum</a> and the other raw materials in the kit. Learn how to smell, evaluate and classify raw materials.</p>
                    </div>
                    <div class="text-group">
                        <h5>experiment</h5>
                        <p>Blend <a href="<?php echo base_url('raw-materials'); ?>" title="Raw Materials">raw materials</a> to create unique fragrance formulas. We’ll show you how to combine raw materials to create well-balanced scents.</p>
                    </div>
                    <div class="text-group">
                        <h5>make scents</h5>
                        <p>Turn your favorite scents into mini Eau de Parfums (2 ml). Save your favorite formulas in the <a href="<?php echo base_url('lab'); ?>">lab</a>, then order custom bottles (10ml) of your scents.</p>
                    </div>
                </div>
            </div>

            <div class="image-module parallax hidden-sm col-md-3">
                <img class="sr reveal-image img-overflow" src="<?php echo base_url('assets/public/images/kits/'.$kit['slug'].'-view.jpg'); ?>" alt="<?php echo $kit['main_ingredient'] ?>" />  
            </div>

            <div class="blockquote maison-mono col-sm-4 pull-right">
                Jasmine is known as the “King of Flowers”
            </div>
        </div>

        <div class="row row-fixed">
            <div class="image-module parallax visible-sm col-sm-6">
                <img class="sr reveal-image img-responsive" src="<?php echo base_url('assets/public/images/kits/'.$kit['slug'].'-view.jpg'); ?>" alt="<?php echo $kit['main_ingredient'] ?>" />  
            </div>
            <div class="text-module parallax col-sm-5 pull-right" id="general-info">
                <div class="text-module-inner">
                    <h3>Raw Materials</h3>
                    <p class="large">Kit 01 features Jasmine grandiflorum plus 11 complementary natural and synthetic raw materials:</p>
                    <?php if ($raw_materials): ?>
                        <p class="kit-rm-list">
                            <?php foreach ($raw_materials as $similar): ?> 
                                <a href="<?php echo base_url('raw-materials/'.$similar['slug']); ?>"><?php echo $similar['name'] ?></a><span></span>
                            <?php endforeach; ?>
                        </p>
                    <?php else: ?>
                        <p>Add Kit Ingredients!</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <div class="row row-fixed">
            <div class="text-module parallax col-sm-8 col-md-5 col-md-offset-1" id="general-info">
                <div class="text-module-inner">
                    <h3>What's Inside</h3>
                    <p class="large">Everything you need to create custom scents.</p>
                    <div class="text-group">
                        <h5>raw materials</h5>
                        <p>Raw materials are diluted in perfumer's alcohol and come in amber glass vials (3.7 ml) with droppers for easy blending.</p>
                    </div>
                    <div class="text-group">
                        <h5>supplies</h5>
                        <p>Test vials, labels, blotters and note pages to make and track your blends. Bottle up your favorite scents in mini spray bottles (2 ml).</p>
                    </div>
                    <div class="text-group">
                        <h5>how-to guide</h5>
                        <p>Exclusive tips to guide you through every step of the perfume-making process.</p>
                    </div>
                </div>
            </div>

            <div class="image-module alt-position parallax col-sm-4 col-md-5">
                <img class="sr reveal-image img-responsive" src="<?php echo base_url('assets/public/images/kits/kit-01-contents.jpg'); ?>" alt="<?php echo $kit['main_ingredient'] ?>" />  
            </div>

            <div class="blockquote maison-mono col-sm-12 col-md-4 hidden-xs" style="clear: left">
                Fragrance ingredients impart more than just scent—they can also convey texture, dimension, sensation, feeling
            </div>
        </div>
    </div>

    <div class="col-xs-12 pad-80 similar-container-kits white-bg">
        <div class="row row-fixed similar text-center">
            <?php if ($raw_materials): ?>
                <div class="col-xs-12">
                    <h2>Explore the raw materials in kit <span class="symbol"><?php echo $kit['number']; ?></span></h2>
                </div>
                
                <?php foreach ($raw_materials as $similar): ?> 
                    <div class="col-xs-6 col-sm-3 similar-item">
                        <a href="<?php echo base_url('raw-materials/'.$similar['slug']); ?>" style="background-image:url('<?php echo base_url('assets/public/images/ingredients/'.$similar['slug'].'.jpg'); ?>')"></a>
                        <h4><a href="<?php echo base_url('raw-materials/'.$similar['slug']); ?>"><?php echo $similar['name'] ?></a></h4>
                    </div>
                <?php endforeach; ?>

                <div class="col-xs-12">
                    <a class="btn btn-primary" href='<?php echo base_url('scent-kits'); ?>'>View All Scent Kits</a>
                </div>
            <?php else: ?>

                <h2>Add Kit Ingredients!</h2>

            <?php endif; ?>
        </div>
    </div>

    <!-- Get Updates CTA -->
    <div class="col-xs-12 text-center cta-page icy-bg-reverse" id="coming-soon">
        <div class="row row-fixed">
            <div class="col-xs-12">
                <h2>Limited quantity coming soon<span class="symbol">!</span></h2>
                <p>Submit your email to be the first to know when this kit becomes available.</p>
                <div class="form-messages"><span></span></div>
                <form class="form-inline kits-signup" method="post" action="<?php echo base_url('scent-kits/mailer'); ?>">
                    <input type="email" class="form-control" id="email" name="email" autocomplete="off" required placeholder="Your Email">
                    <input type="hidden" name="form_id" value="view02">
                    <input type="submit" class="btn btn-primary">
                </form>
            </div>
        </div>
    </div><!-- // Get Updates CTA -->

    <script type="text/javascript">

        $(document).ready(function () {

            // ScrollReveal
            window.sr = ScrollReveal();
            sr.reveal('.reveal-hero', { duration: 1000, distance: 0, scale: 1 });
            sr.reveal('.reveal-title', { duration: 1000, scale: 1 } );
            sr.reveal('.reveal-image', { duration: 1000, distance: 0, scale: 1 });
        });

        // add product to basket
        $('.addtobasket').submit(function(e){
            e.preventDefault();
            
            var $form = $(this);
            var $id = $form.find( 'input[name="id"]' ).val();
            var $option_name = $form.find( 'input[name="option_name"]' ).val();
            
            addOrder($id, $option_name);

        });

        $('.toggle--opt-in.hidden-xs, .close--opt-in').click(function(e){
            e.preventDefault();
            $('#coming-soon--opt-in').fadeToggle(250);  
        })

        $(window).scroll( function(){
            var ctaDivTop   = $('.cta-page').offset().top,
                ctaIconTop  = $('.toggle--opt-in.visible-xs').offset().top;

            console.log('div: '+ctaDivTop+' icon: '+ctaIconTop);

            if ( ctaDivTop > ctaIconTop ) {
                $('.toggle--opt-in.visible-xs').removeClass('hide');
            } else {
                $('.toggle--opt-in.visible-xs').addClass('hide');
            }
        });

        // show sticky purchase div on scroll
        function update() {
            if ($(window).scrollTop() > 400) {
                $('.buy-button-fixed').animate({
                    "top": '0px'
                }, 300);
            } else {
                $('.buy-button-fixed').animate({
                    "top": '-90px'
                }, 300);
            }
        }
        // setInterval(update, 500); * Add this back when in stock !

        // Get the form.
        var form = $('.kits-signup');

        // Get the messages div.
        var formMessages = $('#form-messages span');

        // Set up an event listener for the contact form.
        $('.kits-signup').submit(function(e) {
            // Stop the browser from submitting the form.
            e.preventDefault();

            // Get the form.
            var form = $(this);

            // Get the messages div.
            var formMessages = $(form).siblings('.form-messages').find('span');

            // Serialize the form data.
            var formData = $(form).serialize();

            // Submit the form using AJAX.
            $.ajax({
                type: 'POST',
                url: $(form).attr('action'),
                data: formData
            })
            .done(function(response) {
                // Make sure that the formMessages div has the 'success' class.
                $(formMessages).removeClass('error');
                $(formMessages).addClass('success');

                // Set the message text.
                $(formMessages).text(response);

                // Clear the form.
                $('#email').val('');
                form.hide();
            })
            .fail(function(data) {
                // Make sure that the formMessages div has the 'error' class.
                $(formMessages).removeClass('success');
                $(formMessages).addClass('error');

                // Set the message text.
                if (data.responseText !== '') {
                    $(formMessages).text(data.responseText);
                } else {
                    $(formMessages).text('Oops! An error occured and your message could not be sent.');
                }
            });

        });
    </script>
    