        <div class="sr reveal-title col-xs-12 text-center title-hero">
            <h1 class="page-title">raw materials</h1>
            <div class="directory-details">
                <h2>Our collection of natural and synthetic perfume ingredients.</h2>
            </div>
            <?php if ( $this->ion_auth->is_admin() ): ?>
                <p class="add-rm"><a class="various fancybox.ajax" href="raw-materials/add/">+</a></p>
            <?php endif; ?>
        </div>

        <div class="col-xs-12 visible-xs text-center" style="margin-bottom: 30px;">
            <a class="btn btn-default toggle-filters">Filters</a>
            <div class="filter-mobile--sort">
                <button class="sort btn btn-default" data-sort="myorder:asc">A-Z</button>
                <button class="sort desc btn btn-default" data-sort="myorder:desc">Z-A</button>
            </div>
        </div>

        <div class="col-xs-12 rm-filter">
            <span class="toggle-filters visible-xs" aria-hidden="true">&larr; back</span>

            <div>
                <p class="hidden-xs">Sort:</p>
                <button class="sort btn btn-default hidden-xs" data-sort="myorder:asc">A-Z</button>
                <button class="sort desc btn btn-default hidden-xs" data-sort="myorder:desc">Z-A</button>
                
                <p>Filter:</p>
                <button class="filter btn btn-default" data-filter=".rm">All</button>
                <?php if ( $this->ion_auth->logged_in() ): ?>
                    <button class="filter btn btn-default" data-filter=".favorite"><i class="icon icon-heart"></i></button>
                <?php endif; ?>
                <div class="clearfix visible-xs"></div>
                <button class="filter-button btn btn-default" data-filter="filter-notes">By Note <span class="visible-xs"><i class="icon icon-caret-up"></i></span></button>
                <button class="filter-button btn btn-default" data-filter="filter-families">By Family <span class="visible-xs"><i class="icon icon-caret-up"></i></span></button>
                <button class="filter-button btn btn-default" data-filter="filter-types">By Type <span class="visible-xs"><i class="icon icon-caret-up"></i></span></button>
                
                <div class="filter-group" id="filter-notes">
                    <p>Notes:</p>
                    <button class="filter btn btn-default" data-filter=".rm-tmd-top">Top</button>
                    <button class="filter btn btn-default" data-filter=".rm-tmd-heart">Heart</button>
                    <button class="filter btn btn-default" data-filter=".rm-tmd-base">Base</button>
                </div>
                
                <div class="filter-group" id="filter-families">
                    <p>Families:</p>
                    <?php foreach ($families as $family)
                        {
                            $slug=str_replace('/','-',$family['family']);
                            echo '<button class="filter btn btn-default" data-filter=".rm-family-'.$slug.'">'.$family['family'].'</button> ';
                        }
                    ?>
                </div>
                
                <div class="filter-group" id="filter-types">
                    <p>Types:</p>
                    <?php foreach ($types as $type)
                        {
                            $slug=preg_replace('/\s+/', '', $type);
                            echo '<button class="filter btn btn-default" data-filter=".rm-type-'.$slug['type'].'">'.$type['type'].'</button> ';
                        }
                    ?>
                </div>
            </div>
        </div>

        <div class="col-xs-12 directory-wrapper" id="filter-container">
            <div class="row">
                <div class="main definition rm-type-essentialoil">
                    <h2 class="rm-type">Type: Essential Oil (Eo)</h2>
                    <p>Extracted from natural materials through steam distillation or cold press resulting in an oil or essence.</p>
                </div>
                <div class="main definition rm-type-absolute">
                    <h2 class="rm-type">Type: Absolute (Ab)</h2>
                    <p>Obtained from natural materials through alcohol extraction. Absolutes are essentially highly concentrated essential oils.</p>
                </div>
                <div class="main definition rm-type-CO2">
                    <h2 class="rm-type">Type: CO<sub>2</sub></h2>
                    <p>Supercritical CO<sub>2</sub> extraction is a recent invention that uses carbon dioxide in its liquid state to produce an absolute that can retain the original odor of the natural material.</p>
                </div>
                <div class="main definition rm-type-aromamolecule">
                    <h2 class="rm-type">Type: Aroma Molecule (Am)</h2>
                    <p>Molecules that are synthesized in a lab. Some have unique scents that do not occur in nature, and others resemble natural odors that are not available as natural extracts for various technical and economic reasons.</p>
                </div>
                <div class="main definition rm-type-accord">
                    <h2 class="rm-type">Type: Accords (Ac)</h2>
                    <p>An accord is a combination of natural and/or synthetic materials that resemble a specific scent.</p>
                </div>
                <div class="main definition rm-tmd-top">
                    <h2>Top Notes</h2>
                    <p>Oils with lighter molecules that evaporate the fastest, so when smelling a fragrance you smell them first. They're the first impression of a fragrance, but they don't linger for long giving way to the heart and base notes.</p>
                </div>
                <div class="main definition rm-tmd-heart">
                    <h2>Heart Notes</h2>
                    <p>Heart notes follow the top notes and add character to the base notes. Most floral raw materials are heart notes, as well as many spicy raw materials.</p>
                </div>
                <div class="main definition rm-tmd-base">
                    <h2>Base Notes</h2>
                    <p>Base notes evaporate the slowest, have the longest staying power and thus determine much of the character of a fragrance. Though top notes are responsible for the first impression, base notes last for hours on end. Woody, sweet, and balsamic raw materials are usually base notes.</p>
                </div>
                <div class="main definition rm-family-amber">
                    <h2>Family: Amber</h2>
                    <p>The raw materials in the amber family are sweet, sensuous, and warm.</p>
                </div>
                <div class="main definition rm-family-aromatic-herbal">
                    <h2>Family: Aromatic/Herbal</h2>
                    <p>The raw materials in the aromatic-herbal family are vibrant, energetic, fresh and commonly used in men's fragrances.</p>
                </div>
                <div class="main definition rm-family-balsamic">
                    <h2>Family: Balsamic</h2>
                    <p>The raw materials in the balsamic family are sweet and woody. They are often combined with amber/oriental notes.</p>
                </div>
                <div class="main definition rm-family-citrus">
                    <h2>Family: Citrus</h2>
                    <p>The raw materials in the citrus family are fresh, sparkling and uplifting. They are often used in colognes and eaux fraiches.</p>
                </div>
                <div class="main definition rm-family-floral">
                    <h2>Family: Floral</h2>
                    <p>The raw materials in the floral family are sweet and varied by the natural scent of each flower.</p>
                </div>
                <div class="main definition rm-family-fruity">
                    <h2>Family: Fruity</h2>
                    <p>The raw materials in the fruity family are very popular today and often created synthetically.</p>
                </div>
                <div class="main definition rm-family-green">
                    <h2>Family: Green</h2>
                    <p>The raw materials in the green family are natural, fresh and youthful.</p>
                </div>
                <div class="main definition rm-family-musk">
                    <h2>Family: Musk</h2>
                    <p>The raw materials in the musk family are mostly synthetic today. They impart warmth, diffusion and staying power.</p>
                </div>
                <div class="main definition rm-family-spicy">
                    <h2>Family: Spicy</h2>
                    <p>The raw materials in the spicy family give warmth, body and character to a fragrance.</p>
                </div>
                <div class="main definition rm-family-sweet">
                    <h2>Family: Sweet</h2>
                    <p>The raw materials in the sweet family are popular today in gourmand fragrances.</p>
                </div>
                <div class="main definition rm-family-woody">
                    <h2>Family: Woody</h2>
                    <p>The raw materials in the wood family are rich and powerful.</p>
                </div>

            <?php $counter = 1; ?>
            <?php foreach ($raw_materials as $raw_material): ?>

                <?php   $slugtype=preg_replace('/\s+/', '', $raw_material['type']);
                        $slugfamily=str_replace('/','-',$raw_material['family']); 
                        ?>
                <div class="col-xs-6 col-sm-4 col-md-3 main rm rm-family-<?php echo $slugfamily ?> rm-tmd-<?php echo $raw_material['tmd'] ?> rm-type-<?php echo $slugtype ?>" data-myorder="<?php echo $counter; ?>">    
                    <h2 class="text-center card-heading"><a href="raw-materials/<?php echo $raw_material['slug'] ?>"><?php echo $raw_material['name'] ?></a></h2>
                    <a href="raw-materials/<?php echo $raw_material['slug'] ?>"><img src="<?php echo base_url('assets/public/images/ingredients/'.$raw_material['slug'].'.jpg'); ?>" alt="<?php echo $raw_material['name'] ?>" /></a>
                    <div class="text-center rm-card-details">
                        <p class="text-uppercase"><?php echo $raw_material['family'] ?></p>
                        <p><?php echo $raw_material['scent'] ?></p>
                    </div>
                </div>
            <?php $counter++ ?>    
            <?php endforeach ?>
            </div>
        </div><!-- // .directory-wrapper-->

        <div class="rm-info col-xs-12 pad-80">

            <div class="row row-fixed">

                <div class="col-xs-12 col-sm-8 col-sm-offset-2">
                    <p><strong>Raw materials</strong> are the individual ingredients that make up a fragrance. Two types of raw materials are used in fragrance: natural (derived from plant materials) and synthetic (created through chemical synthesis). <strong>Natural raw materials</strong> have been used since the beginning of perfumery. Various methods are used to extract and concentrate the fragrant parts of plant materials. Depending on the method of extraction, the resulting raw material will be an essential oil, absolute, or CO<sub>2</sub> extract. In the late 19th century perfumers began using <strong>synthetic raw materials</strong>, which allowed them to expand their palettes beyond natural oils and absolutes. With these materials perfumers can reinvent naturally occurring smells and create entirely new scents. <a href="<?php echo base_url('scent-101#raw-materials'); ?>">Learn More</a></p>
                </div>

            </div>

        </div>

        <!-- Get Started CTA -->
        <div class="col-xs-12 text-center cta-page icy-bg">
            <p class="h2">Ready to get started<span class="symbol">?</span></p>
            <a href="<?php echo base_url('scent-kits'); ?>" class="clear btn btn-primary btn-lg get-started">Shop Scent Kits</a>
        </div><!-- / Get Started CTA -->

        <script type="text/javascript">
            
            $(document).ready(function(){

                // ScrollReveal
                window.sr = ScrollReveal();
                sr.reveal('.reveal-title', { duration: 1000, scale: 1 } );

                $('.main.definition').addClass('col-xs-12 col-sm-4 col-md-3');

                $('#filter-container').mixItUp({
                    load: {
                        filter: '.rm',
                        sort: 'myorder:asc'
                    },
                    selectors: {
                        target: '.main'
                    }
                });
                
                $('.wrapper').addClass('full-width');

                $('.toggle-filters').click(function(){
                    $('.rm-filter').toggleClass('slide--in');
                })

                $('button.filter').click(function(){
                    $('.rm-filter').removeClass('slide--in');
                });

            });
            
            <?php if ( $this->ion_auth->logged_in() ): ?>

                <?php foreach ($faves as $fave): ?>

                var $fave = '<?php echo $fave['name']; ?>';

                makeFave($fave);

                <?php endforeach; ?>

            <?php endif; ?>
            
        </script>