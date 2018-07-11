            <a class="toggle-mods--actions btn btn-primary" href="#">+ Add Note</a>            

            <?php if (empty($mods)): ?>
            
            <div class="col-xs-12" id="start-prompt">
                <p>Hi there. It looks like you haven't created any mods yet. To get started, go to the <a href="<?php echo base_url('lab'); ?>">Lab</a> and create your first mod.</p>
            </div>
            
            <?php else: ?>

            <div class="col-xs-12 col-sm-6 col-md-4" id="mods--cards">  

                <div class="column--header">
                    <h1 class="page-title sr reveal-sequence">your formulas</h1>
                    <a class="toggle-mods--filter link-uc" href="#">Filter</a>
                    <div class="row">
                        <div class="formula-filter col-xs-12">
                            <div class="sort-parent">
                                <label>Sort:</label>
                                <button class="sort btn btn-default" data-sort="myorder:asc">Newest</button>
                                <button class="sort btn btn-default" data-sort="myorder:desc">Oldest</button> 
                            </div>
                            <div class="filter-parent">
                                <label>Filter:</label>
                                <button class="filter btn btn-default" data-filter="all">All</button>
                                <button class="filter btn btn-default" data-filter=".favorite"><i class="icon icon-heart"></i></button>
                            </div>
                        </div><!--.formula-filter-->
                    </div>
                </div>

                <div class="mods--cards-wrapper row">

                    <div class="success_message"></div>
                           
                    <?php $counter = 1; ?>
                    <?php foreach ($mods as $mod): ?>

                    <div class="mod--card col-xs-12 formula-box" data-id="<?php echo $mod['formula_id']; ?>" data-myorder="<?php echo $counter; ?>" id="mod--card-<?php echo $mod['formula_id']; ?>">
                        <div class="open-formula">
                            <div class="row">
                                <div class="col-xs-7 col-lg-8">
                                    <h3 class="mod"><?php echo $mod['f_name'] ?></h3>
                                </div>
                                <div class="col-xs-5 col-lg-4 text-right">
                                    <p><?php echo $mod['date_created'] ?></p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php $counter++ ?>
                    <?php endforeach ?>

                </div>

            </div><!-- .account-wrapper-->
            <?php endif; ?>

            <div class="col-xs-12 col-sm-6 col-md-8" id="mods--formulas">
                <?php foreach ($mods as $mod): ?>
                    <div class="mod--formula row" id="formula-<?php echo $mod['formula_id']; ?>">
                        <span class="toggle-mod-formula visible-xs">&larr; back</span>
                        <div class="mod--formula-info col-xs-12 col-md-6">
                            <div class="mod--formula-meta">
                                <h2 class="sr reveal-sequence"><?php echo $mod['f_name'] ?></h2>
                                <p><?php echo $mod['date_created'] ?></p>
                            </div>

                            <a href="#" class="fave-status link-uc" data-name="<?php echo $mod['f_name'] ?>" data-id="<?php echo $mod['formula_id'] ?>" ></a>

                            <div class="mod--formula-ingredients row">

                                <?php for ($i = 1; $i <= 12; $i++): // Need to change to 12 ?>

                                    <?php if ( $mod['rm'.$i] != '' && $mod['drops'.$i] != '0') : ?>
                                    <div class="ingredient col-xs-12">
                                        <div class="row">
                                            <div>
                                                <img class="img-responsive img-circle" src="">
                                            </div>
                                            <div>
                                                <p class="formula-view-name"><?php echo $mod['rm'.$i] ?></p>
                                            </div>
                                            <div class="text-right">
                                                <p class="formula-view-percent"><?php echo $mod['percent'.$i] ?> %</p>
                                            </div>
                                        </div>
                                    </div>
                                    <?php endif; ?>

                                <?php endfor; ?>

                                <div class="edit-formula col-xs-12">
                                    <a class="btn btn-primary" href="<?php echo base_url('lab/new_mod/'.$mod['formula_id']); ?>">Duplicate Formula</a>
                                </div>

                            </div>
                        </div>

                        <div class="mod--actions col-xs-12 col-md-6" id="actions-<?php echo $mod['formula_id']; ?>">
                            <h2 class="sr reveal-sequence">Your Notes</h2>
                            <div class="mod--notes-wrapper">
                                <div class="mod--notes" id="notes-<?php echo $mod['formula_id']; ?>">
                                    <?php $attributes = array('id' => '', 'class' => 'clearfix'); 
                                        echo form_open('account/mod_notes', $attributes);
                                        
                                        $textarea = array('class' => 'form-control', 'name' => 'modnotes', 'value' => $mod['notes'], 'placeholder' => 'Love it! Hate it! ...');
                                        echo form_textarea($textarea);

                                        $data = array('class' => 'btn btn-primary', 'name' => 'modnotes', 'content' => 'Save your notes', 'data-id' => $mod['formula_id']);
                                        echo form_button($data);
                                
                                        echo '<p></p>';
                                        
                                        echo form_close();
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach ?>
            </div>

            <!--<div class="slide--right text-center" id="mods--actions">
                <i class="toggle-mods--actions icon icon-times"></i>
                <div class="mods--actions-wrapper">
                    <?php foreach ($mods as $mod): ?>
                        <div class="mod--actions row" id="actions-<?php echo $mod['formula_id']; ?>">
                            <div class="mod--actions-ctas col-xs-12 text-center">
                                <a class="formula-nav btn btn-primary" id="goToLab" href="<?php echo base_url('lab'); ?>">Create a New Formula</a>

                                <a href="#" class="fave-status btn btn-primary" data-name="<?php echo $mod['f_name'] ?>" data-id="<?php echo $mod['formula_id'] ?>" ></a>

                                <a id="new-mod" class="link-uc" href="<?php echo base_url('lab/new_mod/'.$mod['formula_id']); ?>">Edit Formula</a>
                            </div>

                            <div class="mod--notes-wrapper col-xs-12">
                                <h3 class="text-center">Notes</h3>
                                <?php //foreach ($mods as $mod): ?>
                                    <div class="mod--notes" id="notes-<?php echo $mod['formula_id']; ?>">
                                        <?php $attributes = array('id' => '', 'class' => 'clearfix'); 
                                            echo form_open('account/mod_notes', $attributes);
                                            
                                            $textarea = array('class' => 'form-control', 'name' => 'modnotes', 'value' => $mod['notes'], 'placeholder' => 'Love it! Hate it! ...');
                                            echo form_textarea($textarea);

                                            $data = array('class' => 'btn btn-primary', 'name' => 'modnotes', 'content' => 'Save your notes', 'data-id' => $mod['formula_id']);
                                            echo form_button($data);
                                    
                                            echo '<p></p>';
                                            
                                            echo form_close();
                                        ?>
                                    </div>
                                <?php //endforeach ?>
                            </div>
                        </div>
                    <?php endforeach ?>
                </div>
            </div>-->
            
            <script type="text/javascript">

                $(document).ready(function(){
                    
                    // ScrollReveal
                    window.sr = ScrollReveal();
                    sr.reveal('.reveal-sequence', { duration: 500, scale: 1 }, 500);

                    $('#mods--cards').mixItUp({
                        load: {
                            filter: 'all',
                            sort: 'myorder:asc'
                        },
                        selectors: {
                            target: '.mod--card'
                        }
                    });

                    var windowWidth = $(window).width();

                    if(windowWidth > 767) {
                        $('.mod--card').first().addClass('open');
                        $('.mod--formula').first().addClass('open');
                        //$('.mod--actions').first().addClass('open');
                    }

                    $('.fave-status').each(function(){
                        var el  = $(this),
                            mod = el.data('id');
                        ajaxIsModFave(el,mod);
                    })
                })

                $('.open-formula').click(function(){
                    var mod     = $(this).parent().data('id');
                    var name    = $(this).find('h4').text();
                    console.log(mod);

                    if( $(this).parent().hasClass('open') ) {
                        return;
                    } else {
                        $('.mod--card.open').removeClass('open');
                        $('.mod--formula.open').hide().removeClass('open');
                        $('.mod--actions.open').hide().removeClass('open');

                        $(this).parent().addClass('open');
                        $('#formula-'+mod).show().addClass('open');
                        $('#notes-'+mod).show().addClass('open');
                        $('#actions-'+mod).show().addClass('open');
                    }
                    
                })

                // add formula to favorites
                $(".fave-status").click(function(e){
                    e.preventDefault();

                    if( $(this).attr('id') === 'fave' ) {
                        return;
                    } else {
                        var el      = $(this),
                            id      = el.attr("data-id"),
                            name    = el.attr("data-name");
                        performAjaxSubmitFormula(el,id,name);
                    }
                })

                $('.toggle-mods--actions').click(function(e){
                    e.preventDefault();
                    $('#mods--actions').toggleClass('slide--right');
                });

                $('.toggle-mods--filter').click(function(e){
                    e.preventDefault();
                    $('.formula-filter').slideToggle(250);
                })

                $('.toggle-mod-formula').click(function(){
                    $(this).parent().removeClass('open');
                    $('.mod--card.open').removeClass('open');
                })
                
                $('.addtobasket').submit(function(e){
                    e.preventDefault();
                    
                    var $form = $(this);
                    var $id = $form.find( 'input[name="id"]' ).val();
                    var $option_name = $form.find( 'input[name="option_name"]' ).val();
                    var $item_id = $form.find( 'input[name="item_id"]' ).val();
                    
                    addOrder($id, $option_name, $item_id);

                });

                $('.toggle-filters').click(function(){
                    $('.toggle-filters').toggle();
                    $('.formula-filter').slideToggle();
                })

                // pull img for ingredient
                $('.mod--formula .ingredient').each(function(){

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
                $('.mod--notes button').click(function(){
                    var notes = $(this).siblings('textarea').val();
                    var id = $(this).attr('data-id');
                    modnotesAjaxSubmit(notes,id);
                })
            
                <?php foreach ($faves as $fave): ?>

                var $fave = '<?php echo $fave['formula_id']; ?>';

                makeFaveFormula($fave);

                <?php endforeach; ?>               
                
            </script>