    <div class="view-container account-view <?php if ($uri != 'fragrances'): ?>mod-view<?php endif; ?>">
    
        <?php if ($uri != 'fragrances' ): ?>
            <div class="col-xs-12 text-center account-nav">
                <a href="<?php echo base_url('account/mods'); ?>">My Formulas</a>
                <a href="<?php echo base_url('account/fragrances'); ?>">My Fragrances</a>
                <a href="<?php echo base_url('account/orders'); ?>">My Orders</a>
            </div>
        <?php endif; ?>

        <?php if ($uri != 'fragrances' ): ?>
            <div class="col-xs-12 text-center title-hero icy-bg">
                <div class="order-overlay"></div>
                <h1 class="page-title"><?php echo $mod['f_name'] ?></h1>
                <div class="directory-details">
                    <p><?php echo $mod['date_created'] ?></p>
                    <?php if ($uri != 'fragrances'): ?>            
                    <div>

                        <?php if (!isset($favorite['formula_name'])): ?>
                        
                        <button href="#" class="btn btn-primary" id="add-fave" data-name="<?php echo $mod['f_name'] ?>" data-id="<?php echo $mod['formula_id'] ?>" ><i class="icon icon-heart-o"></i> Add to Favorites</button>

                        <?php else: ?>
                        
                        <button href="#" class="btn btn-fave fave" id="fave" data-name="<?php echo $mod['f_name'] ?>" data-id="<?php echo $mod['formula_id'] ?>" ><i class="icon icon-heart"></i> Favorite</button>

                        <?php endif; ?>

                        <a id="new-mod" class="btn btn-primary" href="<?php echo base_url('lab/new_mod/'.$mod['formula_id']); ?>">Edit Formula</a>

                    </div>
                    <?php endif; ?>
                </div>
            </div>
        <?php else: ?>
            <div class="formulas_head text-center">
                <h2><?php echo $mod['f_name'] ?></h2>
                <p><?php echo $mod['date_created'] ?></p>
            </div>
        <?php endif; ?>

        <div class="formulas-view col-xs-12 col-md-10 col-md-offset-1 text-center">

            <div class="formula-view row row-fixed <?php if ($uri != 'fragrances'): ?>pad-80<?php endif; ?>">

                <?php for ($i = 1; $i <= 10; $i++): ?>

                    <?php if ( $mod['rm'.$i] != '' && $mod['drops'.$i] != '0') : ?>
                    <div class="<?php if ($uri != 'fragrances'): ?>col-xs-4<?php else: ?>col-xs-6<?php endif; ?> col-sm-3 col-md-2">
                        <img class="img-responsive img-circle" src="">
                        <p class="formula-view-name"><?php echo $mod['rm'.$i] ?></p>
                        <p class="formula-view-percent"><?php echo $mod['percent'.$i] ?> %</p>
                    </div>
                    <?php endif; ?>

                <?php endfor; ?>

                <!-- cut here -->

            </div>
            
        </div> <!-- // .formulas-view -->

        <?php if ($uri != 'fragrances'): ?>

        <div class="col-xs-12 pad-80 mod-notes">
            
            <div class="row row-fixed">

                <div class="col-md-3 col-md-offset-1 col-lg-4 col-lg-offset-0 text-left">
                    <h3>My Notes</h3>
                    <p>Love it? Hate it? Keep track of your reactions, ideas, and other notes here.</p>
                </div>

                <div class="col-md-6 col-md-offset-1 col-lg-8 col-lg-offset-0">
                <?php   $attributes = array('id' => 'modnotes', 'class' => 'clearfix'); 
                        echo form_open('account/mod_notes', $attributes);
                        
                        $textarea = array('class' => 'form-control', 'name' => 'modnotes', 'value' => $mod['notes'], 'placeholder' => 'Write your notes here...');
                        echo form_textarea($textarea);

                        $data = array('class' => 'btn btn-primary pull-right', 'name' => 'modnotes', 'content' => 'Save', 'data-id' => $mod['formula_id']);
                        echo form_button($data);
                
                        echo '<p></p>';
                        
                        echo form_close();
                ?>
                </div>

            </div>

        </div>

        <?php endif; ?>

    </div> <!-- // .view-container -->

    <script type="text/javascript">

        $('#addtobasket').submit(function(e){
                
            e.preventDefault();
            
            var $form = $(this);
            var $id = $form.find( 'input[name="id"]' ).val();
            var $option_name = $form.find( 'input[name="option_name"]' ).val();
            var $item_id = $form.find( 'input[name="item_id"]' ).val();
            
            addOrder($id, $option_name, $item_id);

        });

        // add formula to favorites
        $("#add-fave").click(function(){
            var id = $(this).attr("data-id");
            var name = $(this).attr("data-name");
            performAjaxSubmitFormula(id,name);
        })

        // pull img for ingredient
        $('.formula-view > div').each(function(){

            var slug = $(this).find('.formula-view-name').html(),
                img  = $(this).find('img');

            slug = slug.replace(/\s+/g, "-").replace(/\./g, '').toLowerCase();

            if ( slug.indexOf("no-") != -1 ) {
                img.attr('src','<?php echo base_url("assets/public/images/blends/labels")?>/'+slug+'.jpg');
            } else {
                img.attr('src','<?php echo base_url("assets/public/images/ingredients")?>/'+slug+'.jpg');
            }

        })

        // add/edit/save mod notes
        $('#modnotes button').click(function(){
            var notes = $(this).siblings('textarea').val();
            var id = $(this).attr('data-id');
            modnotesAjaxSubmit(notes,id);
        })

    </script>