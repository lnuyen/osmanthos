    <?php $this->load->helper('form'); ?>

    <div class="rm-toolbar col-xs-12 border-top-light">
        <div class="row row-fixed">
            <div class="col-xs-12 text-left">
                <a class="link-uc" href="<?php echo base_url('raw-materials'); ?>">&larr; back</a>
                <?php if ( $this->ion_auth->logged_in() ): ?>
                    <?php if (!isset($favorite['name'])): ?>

                        <a href="#" class="fave-status link-uc" id="add-fave" name="<?php echo $raw_material['name'] ?>" value="<?php echo $raw_material['slug'] ?>"><i class="icon icon-heart-o"></i> Add to Favorites</a>

                    <?php else: ?>

                        <a href="#" class="fave-status link-uc" id="fave" name="<?php echo $raw_material['name'] ?>" value="<?php echo $raw_material['slug'] ?>"><i class="icon icon-heart"></i> Favorite</a>

                    <?php endif; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <div class="col-xs-12 title-hero">
        <img class="sr reveal-hero" src="<?php echo base_url('assets/public/images/ingredients/'.$raw_material['slug'].'.jpg'); ?>" alt="<?php echo $raw_material['name'] ?> perfume ingredient" />
        <div class="sr reveal-title">
            <h1 class="page-title"><?php echo $raw_material['name'] ?></h1>
            <div class="directory-details">
                <?php if ($raw_material['proper_name']): ?>
                    <span class="proper-name"><?php echo $raw_material['proper_name']; ?></span>
                <?php endif; ?>
                <span class="rm-scent"><?php echo $raw_material['scent'] ?></span>
                <?php if ( $this->ion_auth->is_admin() ): ?>
                    <div class="edit"><button class="edit-button btn btn-primary">Edit</button></div>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <div class="sr reveal-content col-xs-12 view-notes">
        <div class="row row-fixed">
            <div class="col-xs-12 col-sm-4 col-md-3">
                <h4 class="inline">Note</h4> / <p class="inline"><?php echo $raw_material['tmd'] ?></p>
                    
                <br><h4 class="inline">Family</h4> / <p class="inline"><?php echo $raw_material['family'] ?></p>

                <br><h4 class="inline">Type</h4> / <p class="inline"><?php echo $raw_material['type'] ?></p>
                
                <?php if (!empty($raw_material['origin'])): ?>
                    <br><h4 class="inline">Origin</h4> / <p class="inline"><?php echo $raw_material['origin']; ?></p>
                <?php endif; ?>
            </div>

            <div class="col-xs-12 col-sm-8 col-md-5">
                <?php if (!empty($raw_material['notes'])): ?>
                <h4>Perfumer's Notes</h4><p><?php echo $raw_material['notes'] ?></p>
                <?php endif; ?>
            </div>

            <div class="col-xs-12 col-sm-8 col-md-4">

                <?php if (!empty($raw_material['pairswith'])): ?>
                <h4>Blends Well With</h4><p><?php echo $raw_material['pairswith'] ?></p>
                <?php endif; ?>

                <?php if (!empty($raw_material['perfumes'])): ?>
                    <br><h4>Prominent In</h4><p><?php echo $raw_material['perfumes'] ?></p>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <?php if ( $this->ion_auth->logged_in() && $this->ion_auth->is_admin() ) : ?>
    <div class="col-xs-12 pad-80" id="edit-rm" style="display: none">
        <div class="row row-fixed">
            <div class="col-xs-12">
            <?php   $attributes = array('id' => 'edit_rm_form');
                    echo form_open('raw-materials/edit', $attributes); ?>

            <label for="name">Name:</label>
            <input type="text" class="form-control" name="name" value="<?php echo set_value('name', $raw_material['name']); ?>" />

            <label for="scent">Smells like:</label>
            <textarea class="form-control" name="scent"><?php echo set_value('scent', $raw_material['scent']); ?></textarea>

            <label for="family">Family:</label>
            <?php

            $class = 'class="form-control"';

            $family_options = array(
                  'amber' => 'Amber',
                  'animal' => 'Animal',
                  'aromatic/herbal' => 'Aromatic/Herbal',
                  'balsamic' => 'Balsamic',
                  'citrus' => 'Citrus',
                  'floral' => 'Floral',
                  'fruity' => 'Fruity',
                  'green' => 'Green',
                  'leather' => 'Leather', 
                  'musk' => 'Musk',
                  'spicy' => 'Spicy',
                  'sweet' => 'Sweet',
                  'tobacco' => 'Tobacco',
                  'woody' => 'Woody'
            );

            echo form_dropdown('family', $family_options, $raw_material['family'], $class); ?>

            <label for="tmd">Note:</label>
            <?php

            $tmd_options = array(
                  'top' => 'Top',
                  'top-heart' => 'Top/Heart',
                  'heart' => 'Heart',
                  'heart-base' => 'Heart/Base',
                  'base' => 'Base'
            );

            echo form_dropdown('tmd', $tmd_options, $raw_material['tmd'], $class); ?>

            <label for="type">Type:</label>
            <?php
            $types = array(
                  'essential oil' => 'Essential Oil',
                  'absolute' => 'Absolute',
                  'CO2' => 'CO2',
                  'resinoid' => 'Resinoid',
                  'concrete' => 'Concrete',
                  'aroma molecule' => 'Aroma Molecule',
                  'blend' => 'Blend'
            );

            echo form_dropdown('type', $types, $raw_material['type'], $class); ?>

            <label for="price">Price:</label>
            <?php

            $price_options = array (
                '$'     => '$',
                '$$'    => '$$',
                '$$$'   => '$$$',
                '$$$$'  => '$$$$',
            );

            echo form_dropdown('price', $price_options, $raw_material['price'], $class); ?>

            <label for="notes">Perfumer's Notes:</label>
            <textarea class="form-control" name="notes"><?php echo set_value('notes', $raw_material['notes']); ?></textarea>

            <label for="perfumes">Prominent in { <i>Perfume (Brand)</i> }:</label>
            <textarea class="form-control" name="perfumes"><?php echo set_value('perfumes', $raw_material['perfumes']); ?></textarea>

            <label for="pairswith">Blends Well With:</label>
            <textarea class="form-control" name="pairswith"><?php echo set_value('pairswith', $raw_material['pairswith']); ?></textarea>

            <input type = "hidden" value ="true" name="edit_rm"/>
            <input type = "hidden" name="id" value=<?php echo $raw_material['id']; ?> />
            <input type = "submit" class="btn btn-primary" name="submit" value="Submit" style="margin-top:10px;" />

            <?php echo form_close(); ?>
            </div>
        </div>
    </div><!-- #edit-blend -->
    <?php endif; ?>

    <div class="col-xs-12 col-md-12 similar-container white-bg">
        <div class="row row-fixed similar text-center">
            <?php if ($raw_materials): ?>
                <h2>More <?php echo $raw_material['family'] ?> Raw Materials</h2>
                
                <?php foreach ($raw_materials as $similar): ?> 
                    <div class="col-xs-6 col-sm-4 col-md-3 similar-item">
                        <a href="<?php echo base_url('raw-materials/'.$similar['slug']); ?>" style="background-image:url('<?php echo base_url('assets/public/images/ingredients/'.$similar['slug'].'.jpg'); ?>')"></a>
                        <h4><a href="<?php echo base_url('raw-materials/'.$similar['slug']); ?>"><?php echo $similar['name'] ?></a></h4>
                    </div>
                <?php endforeach; ?>

                <div class="col-xs-12">
                    <a class="btn btn-primary" href='<?php echo base_url('raw-materials'); ?>'>View All Raw Materials</a>
                </div>
            <?php else: ?>

                <h2>No Other <?php echo $raw_material['family'] ?> Raw Materials</h2>
                <a class="btn btn-primary" href='<?php echo base_url('raw-materials'); ?>'>View All Raw Materials</a>

            <?php endif; ?>
        </div>
    </div>

        <script>
            
            $(document).ready(function(){

                // ScrollReveal
                window.sr = ScrollReveal();
                sr.reveal('.reveal-hero', { duration: 1000, distance: 0, scale: 1 });
                sr.reveal('.reveal-title', { duration: 1000, scale: 1 } );
                sr.reveal('.reveal-content', { delay: 500, distance: 0, duration: 1000, scale: 1 } );

                // toggle text on edit button
                $(".edit-button").click(function() {
                    $("#edit-rm").slideToggle();
                    if ($(".edit-button").html()=='Edit'){
                        $(this).html('Cancel');
                    } else {
                        $(this).html('Edit');
                    }
                });
    
                // add rm to favorites
                $("#add-fave").click(performAjaxSubmit);

            });

        </script>