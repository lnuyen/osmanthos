        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-12 text-center">
                    <h3>Add a new fragrance</h3>
                </div>

                <?php echo validation_errors(); ?>

                <div class="col-xs-12 add_new_rm">
                    <?php $attributes = array('id' => 'add_frag_form');
                            echo form_open('fragrances/add', $attributes); ?>

                        <label for="name">Name:</label>
                        <input class="form-control" type="text" name="name" />

                        <label for="brand">By:</label>
                        <input class="form-control" type="text" name="brand" />

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

                        echo form_dropdown('family', $family_options, 'citrus', $class); ?>

                        <label for="year">Created:</label>
                        <input class="form-control" type="text"  name="year" />

                        <label for="price">Price:</label>
                        <?php
                        $prices = array (
                            '$'     => '$',
                            '$$'    => '$$',
                            '$$$'   => '$$$',
                        );

                        echo form_dropdown('price', $prices, '$', $class) ?>

                        <label for="mainIngredients">Prominent notes:</label>
                        <textarea class="form-control" name="mainIngredients"></textarea>

                        <label for="notes">Additional notes:</label>
                        <textarea class="form-control" name="notes"></textarea>

                        <input type="submit" class="btn btn-primary" name="submit" value="Add" style="margin-top:10px" />
                        <p><a href="<?php echo base_url('fragrances/'); ?>" >Cancel</a></p>
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>