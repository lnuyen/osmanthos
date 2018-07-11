        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-12 text-center">
                    <h3>Add a new blend</h3>
                </div>

                <?php echo validation_errors(); ?>

                <div class="col-xs-12">
                    <?php   $attributes = array('id' => 'add_rm_form');
                            echo form_open('blends/add', $attributes); ?>

                        <label for="name">Name:</label>
                        <input type="text" class="form-control" name="name" />

                        <label for="slug">Slug:</label>
                        <input type="text" class="form-control" name="slug" />

                        <label for="description">Description:</label>
                        <textarea class="form-control" name="description"></textarea>

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

                        echo form_dropdown('family', $family_options, 'amber', $class); ?>

                        <label for="raw_materials">Ingredients:</label>
                        <textarea class="form-control" name="raw_materials"></textarea>

                        <label for="rec_combos">Blends Well With:</label>
                        <textarea class="form-control" name="rec_combos"></textarea>

                        <label for="notes">Perfumer's Notes:</label>
                        <textarea class="form-control" name="notes"></textarea>

                        <input type="submit" class="btn btn-primary" class="form-control" name="submit" value="Add" style="margin-top:10px" />
                        <p><a href="<?php echo base_url('blends/'); ?>" >Cancel</a></p>
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>