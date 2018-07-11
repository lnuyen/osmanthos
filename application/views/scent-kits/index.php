<div class="col-xs-12 title-hero">
    <div class="row row-fixed display-table">
        <div class="display-table-cell">
            <img class="img-responsive visible-xs" src="<?php echo base_url('assets/public/images/kits/kits_index-mobile.jpg'); ?>" />
            <img class="sr reveal-hero img-responsive hidden-xs" src="<?php echo base_url('assets/public/images/kits/kits_index.jpg'); ?>" />
        </div>
        <div class="sr reveal-title display-table-cell text-left">
            <h1 class="page-title">Scent Kits</h1>
            <div class="directory-details">
                <h2>Everything you need to create custom scents.</h2>
                <br>
                <p>Each scent kit is based around a featured ingredient and contains a curated selection of raw materials to explore. Learn to smell and evaluate raw materials, then experiment with different blends to create unique fragrance formulas.</p>
                <a class="link-uc hidden-xs" href="#shop-kits">See kits for details</a>
            </div>
        </div>
    </div>
</div>

<div class="col-xs-12" id="shop-kits">
    <?php foreach ($kits as $kit): ?>
    	<div class="row row-fixed pad-80">
            <div class="kit-image col-xs-12 col-sm-7 text-center">
                <a class="" href="scent-kits/<?php echo $kit['slug'] ?>" title="scent kit 01 jasmine">
                    <img class="sr reveal-image img-responsive" src="<?php echo base_url('assets/public/images/kits/'.$kit['slug'].'-index.jpg'); ?>" alt="<?php echo $kit['main_ingredient'] ?>" />
                </a>
            </div>
            <div class="sr reveal-title kit-description col-xs-12 col-sm-4 col-sm-offset-1">
                <p class="subtitle-kit">scent kit <?php echo $kit['number'] ?></p>
                <h2 class="title-kit"><a class="" href="scent-kits/<?php echo $kit['slug'] ?>" title="scent kit 01 jasmine"><?php echo $kit['name']; ?></a></h2>
                <p class="description-kit"><?php echo $kit['description']; ?></p>
                <?php if ( $kit['status'] === 'preview' ): ?>
                    <div class="coming-soon--opt-in">
                        <a class="toggle--opt-in btn btn-primary hidden-xs" href="#">Coming Soon - Notify Me!</a>
                        <a class="link-uc" href="scent-kits/<?php echo $kit['slug'] ?>">Learn More</a>
                        <div class="text-left celadon-bg-solid" id="coming-soon--opt-in">
                            <h4>Limited quantity coming soon!</h4>
                            <p>Enter your email to be the first to know when this kit becomes available.</p>
                            <div class="form-messages"><span></span></div>
                            <form class="form-inline kits-signup" method="post" action="<?php echo base_url('scent-kits/mailer'); ?>">
                                <input type="email" class="form-control" id="email" name="email" autocomplete="off" required placeholder="Your Email">
                                <input type="hidden" name="form_id" value="index01">
                                <input type="submit" class="btn btn-primary">
                            </form>
                            <div class="toggle--opt-in close--opt-in"></div>
                        </div>
                    </div>
                <?php else: ?>
                    <div class="kit-cta">
                        <?php $attribute = array('class' => 'addtobasket'); echo form_open('order/add', $attribute); ?>
                        <?php echo form_hidden('id','9'); ?>
                        <?php echo form_hidden('option_name', $kit['number'] . ' ' . $kit['name']); ?>
                        <?php echo form_submit(array(
                                'name' => 'action',
                                'value' => '$' . $kit['price'] . ' - Add to Basket',
                                'class' => 'add-to-cart btn btn-primary btn-sm'
                            )); ?>
                        <?php echo form_close(); ?>
                        <a class="link-uc" href="scent-kits/<?php echo $kit['slug'] ?>">Learn More</a>
                    </div>
                <?php endif; ?>
            </div>
    	</div>
    <?php endforeach; ?>
</div>

<!-- Get Updates CTA -->
<div class="col-xs-12 text-center cta-page icy-bg-reverse">
    <div class="row row-fixed">
        <div class="col-xs-12">
            <h2>More Kits Coming Soon<span class="symbol">!</span></h2>
            <p>We’re busy developing exciting new kits that will launch soon. Submit your email to be the first to know when they arrive.</p>
            <div class="form-messages"><span></span></div>
            <form class="form-inline kits-signup" method="post" action="<?php echo base_url('scent-kits/mailer'); ?>">
                <input type="email" class="form-control" id="email" name="email" autocomplete="off" required placeholder="Your Email">
                <input type="hidden" name="form_id" value="index02">
                <input type="submit" class="btn btn-primary">
            </form>
        </div>
    </div>
</div><!-- // Get Updates CTA -->

<script type="text/javascript">
    $(function() {

        $(document).ready(function () {
            
            // ScrollReveal
            window.sr = ScrollReveal();
            sr.reveal('.reveal-hero', { duration: 1000, distance: 0, scale: 1 });
            sr.reveal('.reveal-title', { duration: 1000, scale: 1 } );
            sr.reveal('.reveal-image', { duration: 1000, distance: 0, scale: 1 });
        });

        // toggle coming soon opt-in
        $('.toggle--opt-in.hidden-xs, .close--opt-in').click(function(e){
            e.preventDefault();
            $('#coming-soon--opt-in').fadeToggle(250);  
        })

        // add product to basket
        $('.addtobasket').submit(function(e){
            e.preventDefault();
            
            var $form = $(this);
            var $id = $form.find( 'input[name="id"]' ).val();
            var $option_name = $form.find( 'input[name="option_name"]' ).val();
            
            addOrder($id, $option_name);

        });

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

    });
</script>