    <?php $this->load->helper('form'); ?>

    <div class="col-xs-12 title-hero icy-bg" style="margin-bottom:0;">
        <h1 class="page-title"><?php echo $fragrance['name'] ?></h1>
    </div>

    <div class="col-xs-12 text-center">
        <div class="directory-details">
            <h2 style="margin-bottom:24px;"><?php echo $fragrance['brand'] ?></h2>
        </div>
    </div>

    <div class="col-xs-12 view-notes">
        <div class="row row-fixed">
            <div class="col-sm-4 text-center">
                <div class="rm-img">
                    <img src="<?php echo base_url('assets/public/images/fragrances/'.$fragrance['slug'].'.jpg'); ?>" alt="<?php echo $fragrance['brand'].' '.$fragrance['name'] ?>"/>
                </div>
                
            <?php if ( $this->ion_auth->logged_in() ): ?>
                <?php if (!isset($favorite['name'])): ?>
                    
                    <div class="add_fave">
                        <button href="#" class="btn btn-primary" id="add-fave" name="<?php echo $fragrance['name'] ?>" value="<?php echo $fragrance['slug'] ?>" ><i class="icon icon-heart-o"></i> Add to Favorites</button>
                    </div>

                <?php else: ?>
                    
                    <div>
                        <button href="#" class="btn btn-default fave" id="fave" name="<?php echo $fragrance['name'] ?>" value="<?php echo $fragrance['slug'] ?>" ><i class="icon icon-heart"></i> Favorite</button>
                    </div>

                <?php endif; ?>
            <?php endif;?>
                
            <?php if ($this->ion_auth->is_admin() ): ?>
                
                <div class="edit"><button class="edit-button btn btn-default">Edit <?php echo $fragrance['name'] ?></button></div>
                
            <?php endif; ?>
                
            </div>
            
            <div class="col-sm-8 col-md-7">
                    <!--<h1 class="card-heading"><?php echo $fragrance['name'] ?> by <?php echo $fragrance['brand'] ?></h1>
                    <br />-->
                    <h4 class="inline">Family</h4> / <p class="inline"><?php echo $fragrance['family'] ?></p>
                    <br><br>
                    <h4 class="inline">Year</h4> / <p class="inline"><?php echo $fragrance['year'] ?></p>
                    <br><br>
                    <h4>Ingredients</h4><p><?php echo $fragrance['mainIngredients'] ?></p>
                    
                    <?php if (!empty($fragrance['notes'])): ?>
                    
                    <br><h4>Notes...</h4><p><?php echo $fragrance['notes'] ?></p>
                    
                    <?php endif; ?>
            </div>
        </div>
    </div>
        
    <?php if ( $this->ion_auth->logged_in() && $this->ion_auth->is_admin() ) : ?>
    <div class="col-xs-12 pad-80" id="edit-frag" style="display: none">
        <div class="row row-fixed">
            <div class="col-xs-12">
                <?php   $attributes = array('id' => 'edit_frag_form');
                        echo form_open('fragrances/edit', $attributes); ?>

                <label for="name">Name:</label>
                <input type="input" class="form-control" name="name" value="<?php echo set_value('name', $fragrance['name']); ?>" />

                <label for="brand">Brand:</label>
                <input class="form-control" name="brand" value="<?php echo set_value('brand', $fragrance['brand']); ?>" />

                <label for="family">Family:</label>
                <?php

                $class = 'class="form-control"';

                $family_options = array(
                    'citrus' => 'Citrus',
                    'water' => 'Water',
                    'green' => 'Green',
                    'fruity' => 'Fruity',
                    'floral' => 'Floral',
                    'soft floral' => 'Soft Floral',
                    'floral oriental' => 'Floral Oriental',
                    'soft oriental' => 'Soft Oriental',
                    'oriental' => 'Oriental',
                    'woody oriental' => 'Woody Oriental',
                    'woods' => 'Woods',
                    'mossy woods' => 'Mossy Woods',
                    'dry woods' => 'Dry Woods',
                    'aromatic' => 'Aromatic'
                );

                echo form_dropdown('family', $family_options, $fragrance['family'], $class); ?>

                <label for="year">Year:</label>
                <input type="input" class="form-control" name="year" value="<?php echo set_value('year', $fragrance['year']); ?>" />

                <label for="price">Price:</label>
                <?php

                $price_options = array (
                    '$'     => '$',
                    '$$'    => '$$',
                    '$$$'   => '$$$',
                );

                echo form_dropdown('price', $price_options, $fragrance['price'], $class); ?>

                <label for="mainIngredients">Ingredients:</label>
                <textarea class="form-control" name="mainIngredients"><?php echo set_value('mainIngredients', $fragrance['mainIngredients']); ?></textarea>

                <label for="notes">Additional notes:</label>
                <textarea class="form-control" name="notes"><?php echo set_value('notes', $fragrance['notes']); ?></textarea>

                <input type = "hidden" value ="true" name="edit_frags"/>
                <input type = "hidden" name="id" value=<?php echo $fragrance['id']; ?> >
                <input type = "submit" class="btn btn-primary" name="submit" style="margin-top:10px" value="Submit" />

                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
    <?php endif; ?>

    <div class="col-xs-12 similar-container white-bg">
        <div class="row row-fixed similar text-center">
            <?php if ($fragrances): ?>
                <h2>More <?php echo $fragrance['family'] ?> Fragrances</h2>
                
                <?php foreach ($fragrances as $similar): ?>
                    <div class="col-sm-4 col-md-3 similar-item"> 
                        <a href="<?php echo base_url('fragrances/'.$similar['slug']); ?>" style="background:url('<?php echo base_url('assets/public/images/fragrances/'.$similar['slug'].'.jpg'); ?>')"></a>
                        <h4><a href="<?php echo base_url('fragrances/'.$similar['slug']); ?>"><?php echo $similar['name'] ?></a></h4>
                    </div>
                <?php endforeach; ?>

                <div class="col-xs-12">
                    <a class="btn btn-primary" href='<?php echo base_url('fragrances'); ?>' >View All Fragrances</a>
                </div>

            <?php else: ?>

                <h2>No Other <span class="coral-text"><?php echo $fragrance['family'] ?></span> Fragrances</h2>
                <a class="btn btn-primary" href='<?php echo base_url('fragrances'); ?>' >View All Fragrances</a>

            <?php endif;?>
        </div>
    </div>

    <script>
        
        $(document).ready(function(){

            $('.wrapper').addClass('full-width');
            
            $(".edit-button").click(function() {
                $("#edit-frag").slideToggle();
                if ($(".edit-button").html()=="Edit <?php echo $fragrance['name'] ?>"){
                    $(this).html('Cancel');
                } else {
                    $(this).html("Edit <?php echo $fragrance['name'] ?>");
                }
            });
            
            // add frag to favorites
            $("#add-fave").click(performAjaxSubmitFrag);
        
        });
        
    </script>