            <div class="col-xs-12 text-center account-nav" id="fragrances-nav">
                <a href="mods">My Formulas</a>
                <a class="selected" href="#">My Fragrances</a>
                <a href="orders">Order History</a>
            </div><!-- // .account-nav -->

            <div class="col-xs-12 text-center pad-80 new-full-size">
                <div class="row row-fixed">
                    <div class="col-md-10 col-md-offset-1">

                        <h2>Create a Fragrance</h2>
                        <div class="formula_errors"></div>

                        <!-- LABEL PREVIEW-->
                        <div class="label-preview-container white-bg">
                            <div class="preview-bottle-toggle">Label Preview: <span class="on">Eau de Parfum</span> / <span>Perfume Oil</span></div>
                            <img class="fragrance-oil-bottle hide" src="<?php echo base_url('assets/public/images/icons/dropper.png'); ?>" alt="Fragrance Oil bottle">
                            <img class="fragrance-edp-bottle hide" src="<?php echo base_url('assets/public/images/icons/edp-blackcap.png'); ?>" alt="Fragrance EDP bottle">
                            <div id="label-preview">
                                <div>
                                    <span class="hide" id="your-name-preview">Perfumer's Name</span>
                                    <span id="frag-name-preview" class="large">Fragrance Name</span>
                                    <span id="label-byline">scent market</span>
                                    <span class="label-product">eau de parfum • 30 ml</span>
                                    <span class="label-product" style="display:none;">perfume oil • 30 ml</span>
                                </div>
                            </div>
                        </div>
                        <!-- END LABEL PREVIEW-->

                        <div class="label-customize-container white-bg">
                            
                            <?php $attributes2 = array('id' => 'full-size_label' );
                                echo form_open('account/create_fragrance', $attributes2); ?>
                            
                            <!-- choose a mod -->
                            <h4>1. Choose a Mod <span id="selected-mod"></span></h4>
                            <div class="clearfix open" style="display:block;">
                                <?php foreach ($mods as $mod) : ?>
                                <div class="checkboxes">

                                    <?php $data = array(
                                        'name'        => 'formula_id',
                                        'data-name'   => $mod['f_name'],
                                        'value'       => $mod['formula_id'],
                                        'checked'     => FALSE,
                                        'style'       => 'box-shadow:none; margin-right:20px; width:auto; height:auto;',
                                        );

                                    echo form_radio($data); ?>
                                    <label for="formula"><?php echo '<strong>' . $mod['f_name'] . '</strong> <span>'. $mod['date_created'] . '</span>'; ?></label>
                                </div>    
                                <?php endforeach; ?>
                            </div><!-- // choose a mod -->
                            
                            <!-- customize the label -->
                            <h4>2. Customize the Label</h4>
                            <div class="clearfix" id="customize-label">
                                <?php $attributes4 = array(
                                            'name'          =>  'full-size-your-name',
                                            'id'            =>  'full-size-your-name',
                                            'maxlength'     => '24',
                                            'autocomplete'  => 'off',
                                            'placeholder'   => "Perfumer's Name (that's you!)"
                                        );
                                    //echo form_input($attributes4); ?>

                                <?php echo form_label('Name this fragrance:', 'full-size-name'); ?>
                                <?php $attributes3 = array(
                                            'name'          =>  'full-size-name',
                                            'id'            =>  'full-size-name',
                                            'maxlength'     =>  '20',
                                            'autocomplete'  => 'off'
                                        );
                                        echo form_input($attributes3); ?>
                                
                                <?php //echo form_label('Choose a Font', 'font'); ?><br />
                                <?php $options1 = array(
                                            'plain'         => 'Plain',
                                            'handwriting'   => 'Handwriting'
                                      );

                                      //echo form_dropdown('font', $options1); ?><br />
                            </div><!-- customize the label -->

                            <?php echo form_close(); ?>
                        </div><!-- // .label-customize-container -->

                        <div id="submit-new-fragrance" class="">
                            <button class="key-button btn btn-primary" id="submit-fragrance">Add To My Collection</button>
                        </div>

                        <a href="#" class="right" id="close-new-fragrance">CANCEL</a>

                    </div>
                </div>                      
            </div><!-- // .new-full-size -->

            <div class="account-content account-fragrances">

                <div class="col-xs-12 title-hero icy-bg" style="margin-bottom:0">
                    <h1 class="page-title">my fragrances</h1>
                    <div class="directory-details">
                        <h2>Create full-sized fragrances from your favorite formulas.
                        <br/>
                        <small>$110. 30ml Eau de Parfum &middot; $140. 30ml Perfume Oil</small>
                        </h2>

                        <a class="formula-nav btn btn-primary" id="newFullSize" href="#">Create A Fragrance</a>
                    </div>
                </div>
                
                <?php if (empty($fragrances)): ?>

                <div class="col-xs-12 text-center" id="start-prompt">
                    <p>Hi there. It looks like you haven't created any full-size fragrances yet.</p>
                    <p>After you've created at least one mod, you can create new full-size fragrances in <a href="<?php echo base_url('account/mods'); ?>">My Mods</a></p>
                </div>

                <?php endif; ?>
                
                <div class="col-xs-12 account-wrapper" style="margin-top:0">

                    <div class="row">
                    
                    <?php foreach ($fragrances as $fragrance): ?>

                        <div class="col-xs-12 col-sm-4 col-md-3 formula-box text-center full-size">
                            <div class="order-overlay">
                                <div class="close-overlay"><i class="icon icon-times"></i></div>
                            </div>
                            <p><?php echo $fragrance['date_created'] ?></p>
                            <h3 data-id="<?php echo $fragrance['formula_id']; ?>" class="mod<?php if ($fragrance['font'] == 'handwriting'): ?> cursive <?php endif; ?>" >
                                <a data-id="<?php echo $fragrance['formula_id']; ?>" class="view-formula various fancybox.ajax" href="<?php echo base_url('account/fragrances/'.$fragrance['formula_id']); ?>"><?php echo $fragrance['fragrance_name'] ?></a>
                            </h3>
                            <div class="formula-box-meta row text-center">
                                <div class="col-md-12 show-buttons">
                                    <a href="#" class="">+ Add to Basket</a>
                                </div>
                                <div class="col-xs-12 toggle" style="display: none; margin-bottom:20px;">
                                    <!-- Eau de Parfum -->
                                    <p>Eau de Parfum, $110</p>
                                    <?php $attribute = array('class' => 'addtobasket'); echo form_open('order/add', $attribute); ?>
                                    <?php echo form_hidden('id','6'); ?>
                                    <?php echo form_hidden('option_name', $fragrance['fragrance_name']); ?>
                                    <?php echo form_hidden('item_id', $fragrance['formula_id']); ?>
                                    <?php echo form_submit(array(
                                            'name' => 'action',
                                            'value' => 'Add to Basket',
                                            'class' => 'add-to-cart btn btn-primary btn-sm'
                                        )); ?>
                                    <?php echo form_close(); ?>
                                    <!-- //Eau de Parfum -->
                                </div>

                                <div class="col-xs-12 toggle" style="display: none;">
                                    <!-- Perfume Oil -->
                                    <p>Perfume Oil, $140</p>
                                    <?php $attribute = array('class' => 'addtobasket'); echo form_open('order/add', $attribute); ?>
                                    <?php echo form_hidden('id','8'); ?>
                                    <?php echo form_hidden('option_name', $fragrance['fragrance_name']); ?>
                                    <?php echo form_hidden('item_id', $fragrance['formula_id']); ?>
                                    <?php echo form_submit(array(
                                            'name' => 'action',
                                            'value' => 'Add to Basket',
                                            'class' => 'add-to-cart btn btn-primary btn-sm'
                                        )); ?>
                                    <?php echo form_close(); ?>
                                    <!-- Perfume Oil -->
                                </div>
                            </div><!-- // .formula-box-meta -->
                        </div><!-- // .formula-box -->

                    <?php endforeach ?>

                    </div>

                </div><!-- // .account-wrapper-->

            </div><!-- // .account-content -->
            
            <script type="text/javascript">

                // open order overlay
                $('.show-buttons a').click(function(e){
                    e.preventDefault();
                    
                    var el      = $(this).parent();
                    var buttons = el.siblings('.toggle');
                    var overlay = el.parents('.full-size').find('.order-overlay');

                    // close any other open overlays
                    $('.order-overlay.open').find('.close-overlay').click();

                    openOrderOverlay(el, buttons, overlay);

                })

                // close order overlay
                $('.close-overlay').click(function(){
                    var overlay = $(this).parent();
                    var meta    = overlay.siblings('.formula-box-meta');
                    var buttons = meta.find('.toggle');
                    var button  = meta.find('.show-buttons');
                    
                    closeOrderOverlay(overlay, meta, buttons, button);
                })

                // add product to basket
                $('.addtobasket').submit(function(e){
                    e.preventDefault();
                    
                    var $form = $(this);
                    var $id = $form.find( 'input[name="id"]' ).val();
                    var $option_name = $form.find( 'input[name="option_name"]' ).val();
                    var $item_id = $form.find( 'input[name="item_id"]' ).val();
                    
                    addOrder($id, $option_name, $item_id);

                });

                /********************************* 
                    CREATE A FRAGRANCE
                *********************************/

                // open main container
                $('#newFullSize').click(function(e){
                    e.preventDefault();
                    
                    $('div.new-full-size').slideToggle(250);

                    /*if ($('#newFullSize').html()=='Create A Fragrance +'){
                        $(this).html('Cancel x').addClass('active');
                    } else {
                        $(this).html('Create A Fragrance +').removeClass('active');
                    }*/
                });

                // close main container
                $('#close-new-fragrance').click(function(e){
                    e.preventDefault();
                    $('#newFullSize').click();
                })

                // toggle customize containers
                $('#full-size_label h4').click(function(){
                    if ( $(this).next('div').hasClass('open') ) {
                        $(this).next('div').slideUp().removeClass('open');
                    } else {
                        $('#full-size_label > div.open').slideUp().removeClass('open');
                        $(this).next('div').slideDown().addClass('open');
                    }
                })

                // toggle preview bottle
                $('.preview-bottle-toggle').click(function(){
                    //$('.label-preview-container img').toggle();
                    $('.label-product').fadeToggle();
                    $(this).find('span').toggleClass('on');
                })

                // show name of selected mod
                $('input[name="formula_id"]').change(function(){
                    $mod = $(this).data('name');
                    $('span#selected-mod').hide().html($mod).delay().fadeIn();
                })

                // match fragrance name to input
                $('#full-size-name').keyup(function(){
                    $fname = $('#frag-name-preview');
                    $fname.html( $(this).val() );

                    if ( $fname.height() > 30 ) {
                        $fname.css('padding-top','0');
                    } else {
                        $fname.css('padding-top','15px');
                    }
                })

                // match perfumer's name to input
                $('#full-size-your-name').change(function(){
                    $mname = $('#your-name-preview');
                    $mname.html( $(this).val() );
                })

                // preview font
                $('select[name="font"]').change(function(){
                    $font = $('select[name="font"]').val();
                    
                    if ( $font === 'plain' )
                    {
                        $fname.removeClass('cursive-label').addClass('plain-label');
                    }
                    if ( $font === 'handwriting' )
                    {
                        $fname.removeClass('plain-label').addClass('cursive-label');
                    }  
                })
                
                // Add To My Collection
                $('#submit-fragrance').click(function(){

                    // clear and hide error messages
                    $('div.formula_errors').html('').slideUp(500);

                    var errors=0,
                    //$id = $('input[name="formula_id"]').val(),
                    $id = $('span#selected-mod').html(),
                    $name = $('#full-size-name').val(),
                    $pname = $('#full-size-your-name').val(),
                    $font = $('select[name="font"]').val();

                    console.log($id+' '+$name+' '+$pname+' '+$font);

                    // ---> How to check for if a radio is selected??

                    if ( $name == '' || $pname == '' ) {
                        var $message = '<p class="bg-warning">Whoops! You forgot to enter a name.</p>';
                        $('div.formula_errors').append($message);
                        errors++;
                    }

                    if ( $id == '' ) {
                        var $message = '<p class="bg-warning">Whoops! You forgot to choose a mod.</p>';
                        $('div.formula_errors').append($message);
                        errors++;
                    }

                    // If no errors, then submit formula
                    if ( errors === 0 ) 
                    { 
                        $('#full-size_label').submit();
                    }

                    $('.formula_errors').slideToggle();
                })

                /********************************* 
                    END CREATE A FRAGRANCE
                *********************************/
                
            </script>