    <?php $this->load->helper('form'); ?>

    <div class="col-xs-12 title-hero icy-bg" style="margin-bottom:0;">
        <h1 class="page-title"><?php echo $blend['name'] ?></h1>
    </div>
    
    <div class="col-xs-12 text-center">
        <div class="directory-details tc">
            <h2 style="margin-bottom:24px;"><?php echo $blend['description'] ?></h2>
        </div>
    </div>

    <div class="col-xs-12 view-notes">
        <div  class="row row-fixed">
            <div class="col-xs-12 col-sm-4 col-md-3 text-center">
                <div class="blend-img">
                    <img src="<?php echo base_url('assets/public/images/blends/labels/'.$blend['slug'].'.jpg'); ?>" alt="<?php echo $blend['name']; ?> custom blend">
                </div>
            
            <?php if ( $this->ion_auth->logged_in() ): ?>
                <?php if (!isset($favorite['name'])): ?>
                    
                    <div class="add_fave">
                        <button href="#" class="btn btn-primary" id="add-fave" data-name="<?php echo $blend['name'] ?>" data-slug="<?php echo $blend['slug'] ?>" ><i class="icon icon-heart-o"></i> Add to Favorites</button>
                    </div>

                <?php else: ?>
                    
                    <div>
                        <button href="#" class="btn btn-default fave" id="fave" data-name="<?php echo $blend['name'] ?>" data-slug="<?php echo $blend['slug'] ?>" ><i class="icon icon-heart"></i> Favorite</button>
                    </div>

                <?php endif; ?>
            <?php endif; ?>
                
    		<?php if ( $this->ion_auth->is_admin() ): ?>

                <div class="edit"><button class="edit-button btn btn-default">Edit <?php echo $blend['name'] ?></button></div>

            <?php endif; ?>

            </div>
            <div class="col-xs-12 col-sm-8 col-md-4 col-md-offset-1">
                <h4 class="inline">Family</h4> / <p class="inline"><?php echo $blend['family'] ?></p><br>
                <br>
                <h4 id="ingredients-expand"><?php echo $blend['name'] ?> Ingredients</h4>
                <div class="ingredients-expand">
                    <p><?php echo $blend['raw_materials'] ?></p>
                    <p class="hide"><small><em>For the sake of full transparency, we list each ingredient that goes into our blends. Some of the are not available in the Scent Market lab and may be unfamiliar to you. 
                    These materials are all synthetic. Some synthetic materials that are easy to use, and to understand, are available in the lab. These ones are too abstract to be useful in your formulas.
                    One of the reasons we created blends was to create a way for you to take advantage of the best synthetic materials.</em></small></p>
                </div>
            </div>
            <div class="col-xs-12 col-sm-8 col-sm-offset-4 col-md-4 col-md-offset-0">
                <h4>Perfumer's Notes</h4><p><?php echo $blend['notes'] ?></p>
                <br>
                <h4>Blends Well With</h4><p><?php echo $blend['rec_combos']; ?></p>
            </div>
        </div>
    </div>

    <?php if ( $this->ion_auth->logged_in() && $this->ion_auth->is_admin() ) : ?>
    <div class="col-xs-12 pad-80" id="edit-rm" style="display: none">
        <div class="row row-fixed">
            <div class="col-xs-12">
                <?php   $attributes = array('id' => 'edit_rm_form');
                        echo form_open('blends/edit', $attributes); ?>

                <label for="name">Name:</label>
                <input type="input" class="form-control" name="name" value="<?php echo set_value('name', $blend['name']); ?>" />

                <label for="slug">Slug:</label>
                <input type="text" class="form-control" name="slug" value="<?php echo set_value('slug', $blend['slug']); ?>" />

                <label for="description">Description:</label>
                <textarea class="form-control" name="description"><?php echo set_value('description', $blend['description']); ?></textarea>

                <label for="family">Family:</label>
                <?php

                $class = 'class="form-control"';

                $family_options = array(
                    'amber' => 'Amber',
                    'aromatic/herbal' => 'Aromatic/Herbal',
                    'citrus' => 'Citrus',
                    'floral' => 'Floral',
                    'fruity' => 'Fruity',
                    'green' => 'Green',
                    'musk' => 'Musk',
                    'spicy' => 'Spicy',
                    'sweet' => 'Sweet',
                    'tobacco' => 'Tobacco',
                    'woody' => 'Woody',
                );

                echo form_dropdown('family', $family_options, $blend['family'], $class); ?>

                <label for="raw_materials">Ingredients:</label>
                <textarea class="form-control" name="raw_materials"><?php echo set_value('raw_materials', $blend['raw_materials']); ?></textarea>

                <label for="notes">Perfumer's Notes:</label>
                <textarea class="form-control" name="notes"><?php echo set_value('notes', $blend['notes']); ?></textarea>

                <label for="rec_combos">Blends Well With:</label>
                <textarea class="form-control" name="rec_combos"><?php echo set_value('rec_combos', $blend['rec_combos']); ?></textarea>

                <input type = "hidden" value="true" name="edit_blend" />
                <input type = "hidden" name="id" value=<?php echo $blend['id']; ?> />
                <input type = "submit" class="btn btn-primary" name="submit" value="Submit" style="margin-top:10px;" />

                <?php echo form_close(); ?>
            </div>
        </div>
    </div><!-- #edit-blend -->
    <?php endif; ?>

    <div class="col-xs-12 similar-container white-bg">
        <div class="row row-fixed similar text-center">
            <h2>More Blends</h2>
            
            <?php foreach ($blends as $other): ?>
                <div class="col-xs-12 col-sm-4 col-md-3 similar-item"> 
                    <a href="<?php echo base_url('blends/'.$other['slug']); ?>" style="background:url('<?php echo base_url('assets/public/images/blends/labels/'.$other['slug'].'.jpg'); ?>')"></a>
                    <h4><a href="<?php echo base_url('blends/'.$other['slug']); ?>"><?php echo $other['name'] ?></a></h4>
                </div>
            <?php endforeach; ?>

            <div class="col-xs-12">
                <a class="btn btn-primary" href='<?php echo base_url('blends'); ?>' >View All Blends</a>
            </div>

        </div>
    </div>

        <script type="text/javascript">

            $(document).ready(function(){

                $('.wrapper').addClass('full-width');

            	// toggle text on edit button
                $(".edit-button").click(function() {
                    $("#edit-rm").slideToggle();
                    if ($(".edit-button").html()=='Edit <?php echo $blend['name'] ?>'){
                        $(this).html('Cancel');
                    } else {
                        $(this).html('Edit <?php echo $blend['name'] ?>');
                    }
                });

                $('.recommendations span').click(function(){
                    $('.recommendations span').removeClass('selected');
                    $(this).addClass('selected');
                    $('.recommendations-tab').hide();
                    $('#'+$(this).attr('data-tab')+'-tab').fadeIn(600);

                })

                $('#ingredients-expand').click(function(){
                    $('.ingredients-expand').slideToggle();
                })

                // add rm to favorites
                $("#add-fave").click(performAjaxSubmitBlend);

            });

        </script>