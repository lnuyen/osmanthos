<div class="lab-column col-xs-12 col-md-4" id="lab--info">
    <span class="close-modal visible-xs visible-sm" aria-hidden="true">&times;</span>
    <h1 class="sr reveal-sequence page-title">Scent Lab</h1>
    <div class="lab--info-wrapper row">
        <div class="col-xs-12">
            <p class="text-grey">Edit the formula that you created for <strong><?php echo $formula['f_name']; ?></strong> and save it as a new mod.</p>
        </div>
    </div>
</div>

<div class="lab-column col-xs-12 col-md-4" id="lab--raw-materials">
    <span class="close-drawer visible-xs" aria-hidden="true">&larr; back to formula</span>
    <h2 class="sr reveal-sequence">Raw Materials</h2>
    <div class="lab--rm-wrapper row">
        <div class="col-xs-12">
            <p class="text-grey">Add up to 12 raw materials to your formula.</p>
        </div>
        <?php foreach ($raw_materials as $raw_material): ?>
            <div class="lab--rm-card col-xs-6" data-slug="<?php echo $raw_material['slug']; ?>" data-name="<?php echo $raw_material['name']; ?>">
                <div class="open-modal">
                    <div class="row text-center">
                        <div class="col-xs-12">
                            <img class="img-responsive img-circle" src="<?php echo base_url('assets/public/images/ingredients/'.$raw_material['slug'].'.jpg'); ?>">
                        </div>
                        <div class="col-xs-12">
                            <h3><?php echo $raw_material['name']; ?></h3>
                        </div>
                        <span class="added-to-formula"><i class="icon icon-check"></i></span>
                    </div>
                </div>

                <div class="lab--rm-modal">
                    <span class="close-drawer visible-xs" aria-hidden="true">&larr; back</span>
                    <span class="close-modal hidden-xs" aria-hidden="true">&times;</span>

                    <div class="modal-inner">

                        <div class="modal-inner--details col-xs-12 col-sm-8">
                            <img class="img-responsive visible-xs" src="<?php echo base_url('assets/public/images/ingredients/'.$raw_material['slug'].'.jpg'); ?>" alt="<?php echo $raw_material['name'] ?>" />

                            <div class="text-center-mobile">
                            
                                <h3 class="modal-title"><?php echo $raw_material['name'] ?></h3>
                                
                                <?php if ($raw_material['proper_name']): ?>
                                    <span class="proper-name"><?php echo $raw_material['proper_name']; ?></span>
                                <?php endif; ?>

                                <?php if (!empty($raw_material['origin'])): ?>
                                    <span class="origin">(<?php echo $raw_material['origin']; ?>)</span>
                                <?php endif; ?>

                                <span class="rm-scent maison-mono"><?php echo $raw_material['scent'] ?></span>

                                <h4 class="rm-properties"><?php echo $raw_material['tmd'] ?> note / <?php echo $raw_material['family'] ?> / <?php echo $raw_material['type'] ?></h4>

                            </div>
                            
                            <?php if (!empty($raw_material['notes'])): ?>
                            <h4>Perfumer's Notes</h4><p><?php echo $raw_material['notes'] ?></p><br>
                            <?php endif; ?>
                            
                            <?php if (!empty($raw_material['pairswith'])): ?>
                            <h4>Blends With</h4><p><?php echo $raw_material['pairswith'] ?></p>
                            <?php endif; ?>
                        </div>
                        
                        <div class="col-xs-4 hidden-xs">
                            <img class="img-responsive" src="<?php echo base_url('assets/public/images/ingredients/'.$raw_material['slug'].'.jpg'); ?>" alt="<?php echo $raw_material['name'] ?>" />
                        </div>

                    </div>

                    <div class="modal-inner--cta border-top-light text-center">
                        <a class="add-to-formula btn btn-primary" data-name="<?php echo $raw_material['name']; ?>" data-slug="<?php echo $raw_material['slug']; ?>">Add to formula</a>
                    </div>
                    
                </div><!-- // .lab-rm-modal -->
            </div>
        <?php endforeach ?>
    </div>
</div>

<div class="lab-column col-xs-12 col-md-4" id="lab--formula">
    <h2 class="sr reveal-sequence">Formula</h2>

    <div class="lab--formula-wrapper row">

        <div class="col-xs-12" id="msg--empty-formula">
            <p class="text-grey">Your formula is empty. Select a raw material to get started.</p>
        </div>

        <form id="new-formula" action="<?php echo base_url('lab/create'); ?>" method="post">

            <?php for ($i = 1; $i <= 12; $i++): ?>

                <div class="lab--formula-rm-card col-xs-12">
                    <div>
                        <div class="row">
                            <div class="formula-rm-img col-xs-3">
                                <img class="img-responsive img-circle" src="">
                            </div>
                            <div class="formula-rm-drops controls col-xs-6">
                                <h4></h4>
                                <span class="formula-button more-less minus" title="decrease">-</span>
                                <input type='text' name='<?php echo 'drops'.$i; ?>' class="drops" id='<?php echo 'drops'.$i; ?>' value="<?php echo $formula['drops'.$i]; ?>" readonly=readonly />
                                <span class="formula-button more-less plus" title="increase">+</span>
                                <span class="formula-button delete" title="remove"><i class="icon icon-trash-o"></i></span>
                            </div>                       
                            <div class="formula-rm-controls controls col-xs-3">
                                <input type='text' name='<?php echo 'percent'.$i; ?>' class="percent" id='<?php echo 'percent'.$i; ?>' value="<?php echo $formula['percent'.$i]; ?>" readonly=readonly />
                            </div>                    
                            <input type='hidden' name='<?php echo 'rm'.$i; ?>' class='ingredient' value='<?php echo $formula['rm'.$i]; ?>' />
                        </div>
                    </div>
                </div>  

            <?php endfor; ?>

            <div class="toggle--lab-formula lab--formula-drops-total col-xs-12">
                <label>Total Drops:</label> <span id="totalDrops">0</span>
            </div>

            <div class="col-xs-12 visible-xs">
                <a class="toggle--lab-raw-materials add-rm btn btn-primary">+ Add Raw Material</a>
                <a class="toggle--lab-raw-materials max-rm hide btn btn-primary">View Raw Materials</a>
                <span class="max-rm hide">Maximum ingredients reached</span>
            </div>

            <div class="col-xs-12 formula_errors">
                <?php echo validation_errors(); ?>
            </div>

            <div class="toggle--lab-formula lab--formula-submit col-xs-12">
                <?php if ($this->ion_auth->logged_in()): ?>
                    <input type="text" name="f_name" id="name" value="<?php echo set_value('f_name'); ?>" autocomplete="off" placeholder="Name this formula..." />
                    <button class="btn btn-primary btn-lg" id="submit-all">Finish and save</button>
                <?php endif; ?>
            </div>

        </form> <!-- /#new-formula -->

    </div>
</div>

<script type="text/javascript">

    $(document).ready(function(){

        // ScrollReveal
        window.sr = ScrollReveal();
        sr.reveal('.reveal-sequence', { duration: 500, scale: 1 }, 500);

        // adding ingredients stuff
        var index = 1;

        // NEW MOD functions: show RMs in the selected formula

        $('#msg--empty-formula').hide();

        $('.toggle--lab-formula').show();

        $('#submit-all').removeClass('hide');

        $('.lab--formula-rm-card').each(function(){

            // cache formula variables
            var card        = $(this),
                ingredient  = card.find('input.ingredient').val(),
                drops       = Number( card.find('input.drops' ).val() );

            if ( ingredient != '')
            {
                card.addClass('active').insertBefore($('.lab--formula-rm-card:not(.active)').first());
                card.find('h4').text(ingredient);

                index++;
                addDrops(drops);
                formulaToggle();

                var slug = disableRmCard(ingredient);
                card.attr('data-slug', slug);
                card.find('.formula-rm-img img').attr('src', 'http://localhost:8888/scentlab/assets/public/images/ingredients/' + slug + '.jpg');
                // card.find('.formula-rm-img img').attr('src', 'https://osmanthos.com/assets/public/images/ingredients/' + slug + '.jpg');
            }

        });

        function addDrops(drops) {
            var totalDrops = Number( $("#totalDrops").text() );

            totalDrops += drops;

            $("#totalDrops").text(totalDrops);
        }

        function disableRmCard(ingredient) {
            var slug;

            $('.lab--rm-card').each(function(){
                var card    = $(this),
                    rm      = card.data('name');

                if(rm === ingredient) {
                    $(this).addClass('disabled');
                    slug = card.data('slug');
                }
            })
            
            //console.log(slug);
            return slug;
        }

        var windowWidth = $(window).width();

        $('.toggle--lab-raw-materials').click(function(){
            $('#lab--raw-materials').addClass('slide--in');
        })

        $('.open-modal').click(function(){
            if( windowWidth < 768 ) {
                $(this).parent().find('.lab--rm-modal').addClass('slide--in');
            } else {
                $(this).parent().find('.lab--rm-modal').fadeIn();
                $('body').addClass('modal--open');
            }
        });

        $('.close-drawer').click(function(){
            $(this).parent().removeClass('slide--in');
        });

        $('.close-modal').click(function(){
            $(this).parent().fadeOut();  
            $('body').removeClass('modal--open'); 
        });

        // add rm to formula
        $('#lab--raw-materials .add-to-formula').click(function(e){
            e.preventDefault();

            // cache rm variables
            var name        = $(this).data('name'),
                parentCard  = $(this).parents('.lab--rm-card'),
                img         = parentCard.find('.img-circle').attr('src'),
                slug        = parentCard.data('slug'),
                parentModal = $(this).parents('.lab--rm-modal'),
                rmModal     = $('#lab--raw-materials');

            if ( parentCard.hasClass('disabled') ) {
                parentModal.fadeOut();
                $('body').removeClass('modal--open');
                return;
            }

            if ( index < 13 ) { /* if formula has <12 ingredients, add to formula */

                var formulaCard = $('.lab--formula-rm-card:nth-of-type(' + index + ')');

                formulaCard.find('h4').text(name);
                formulaCard.find('input.ingredient').val(name);
                formulaCard.find('input.percent' ).val(0);
                formulaCard.find('input.drops' ).val(0);
                formulaCard.find('.formula-rm-img img').attr('src', img);
                formulaCard.attr('data-slug', slug);
                formulaCard.addClass('active');
                parentCard.addClass('disabled');

                if( windowWidth < 768 ) {
                    parentModal.removeClass('slide--in');
                    rmModal.removeClass('slide--in');
                } else {
                    parentModal.fadeOut();
                    $('body').removeClass('modal--open');
                }

                index++;
                formulaToggle();
            } else {
                alert('Maximum ingredients reached');
            }
        })

        // delete ingredient from formula
        $('.delete').click(function(){

            var formulaCard = $(this).parents('.lab--formula-rm-card'),
                slug        = formulaCard.data('slug');
                rmCard      = $('.lab--rm-card[data-slug='+slug+']');

            formulaCard.insertAfter($('.lab--formula-rm-card').last());
            formulaCard.find('h4').text('');
            formulaCard.find('input').val('');
            formulaCard.find('.formula-rm-img img').attr('src', '');
            formulaCard.removeClass('active');
            rmCard.removeClass('disabled');

            index--;
            calculateDrops();
            formulaToggle();
        })

        function formulaToggle() {

            if( index === 1 ) {
                $('#msg--empty-formula').fadeIn(250);
                $('.toggle--lab-formula').hide();
                $('.formula_errors').html('').removeClass('open');
            } else {
                $('#msg--empty-formula').hide();
                $('.toggle--lab-formula').fadeIn(250);

                if( index === 13 ) {
                    // maximum ingredients reached
                    $('.add-rm').addClass('hide');
                    $('.max-rm').removeClass('hide');
                } else {
                    $('.add-rm').removeClass('hide');
                    $('.max-rm').addClass('hide');
                }
            }
        }
        
    });
    
    <?php foreach ($faves as $fave): ?>

    var $fave = '<?php echo $fave['name']; ?>';

    addLabFavorite($fave);

    <?php endforeach; ?>

    <?php foreach ($faves_blends as $fave): ?>

    var $fave = '<?php echo $fave['name']; ?>';

    addLabFavorite($fave);

    <?php endforeach; ?>
    
</script>