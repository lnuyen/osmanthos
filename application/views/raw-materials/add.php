        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-12 text-center">
                    <h3>Add a new raw material</h3>
                </div>

                <?php echo validation_errors(); ?>

                <div class="col-xs-12">
                    <?php   $attributes = array('id' => 'add_rm_form');
                            echo form_open('raw-materials/add', $attributes); ?>

                        <label for="name">Name:</label>
                        <input type="input" class="form-control" name="name" />

                        <label for="scent">Smells like:</label>
                        <textarea class="form-control" name="scent"></textarea>

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

                        echo form_dropdown('family', $family_options, 'amber', $class); ?>

                        <label for="tmd">Note:</label>
                        <?php
                        $tmd_options = array(
                            'top' => 'Top',
                            'top-heart' => 'Top/Heart',
                            'mid' => 'Heart',
                            'heart-base' => 'Heart/Base',
                            'base' => 'Base'
                        );

                        echo form_dropdown('tmd', $tmd_options, 'top', $class); ?>
                        
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

                        echo form_dropdown('type', $types, 'essential oil', $class); ?>

                        <label for="price">Price:</label>
                        <?php
                        $prices = array (
                            '$'     => '$',
                            '$$'    => '$$',
                            '$$$'   => '$$$',
                            '$$$$'  => '$$$$',
                        );

                        echo form_dropdown('price', $prices, '$', $class) ?>

                        <label for="perfumes">Prominent in these perfumes:</label>
                        <textarea class="form-control" name="perfumes"></textarea>

                        <label for="pairswith">Mixes nicely with these ingredients:</label>
                        <textarea class="form-control" name="pairswith"></textarea>

                        <label for="notes">Additional notes:</label>
                        <textarea class="form-control" name="notes"></textarea>

                        <input type="submit" class="btn btn-primary" class="form-control" name="submit" value="Add" style="margin-top:10px" />
                        <p><a href="<?php echo base_url('raw-materials/'); ?>" >Cancel</a></p>
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>