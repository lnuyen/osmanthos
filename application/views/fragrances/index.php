        <div class="col-xs-12 title-hero icy-bg">
            <h1 class="page-title">fragrance finder</h1>
            <div class="directory-details">
                <h2 style="margin-bottom:0;">Explore classic and popular perfumes.</h2>
            </div>
            <?php if ( $this->ion_auth->is_admin() ): ?>
                <p class="add-rm add-rm--invert"><a class="various fancybox.ajax" href="fragrances/add/">+</a></p>
            <?php endif; ?>
        </div>

        <div class="col-xs-12 visible-xs text-center" style="margin-bottom: 30px;">
            <a class="btn btn-default toggle-filters">Show Filters</a>
            <a class="btn btn-default toggle-filters" style="display:none">Hide Filters</a>
        </div>
        
        <div class="col-xs-12 rm-filter text-center">
            <p>Filter:</p>
            <button class="filter btn btn-default" data-filter=".frag-directory-card">All</button>
            <?php if ( $this->ion_auth->logged_in() ): ?>
            <button class="filter btn btn-default" data-filter=".favorite">Favorites</button>
            <?php endif; ?>
            <button class="filter-button btn btn-default" data-filter="filter-brands">By Brand <i class="fa fa-caret-right"></i></button>
            <button class="filter-button btn btn-default" data-filter="filter-families">By Family <i class="fa fa-caret-right"></i></button>
            <p>Sort:</p>
            <button class="sort btn btn-default" data-sort="myorder:asc">A-Z</button>
            <button class="sort btn btn-default" data-sort="myorder:desc">Z-A</button> 
            <div id="filter-brands">
                <p>Brands:</p>
                <?php foreach ($brands as $brand)
                    {
                        $slug=preg_replace('/\s+/', '-', $brand);
                        $slug=preg_replace('/[^\p{L}\p{N}\s]/u', '', $slug);
                        echo '<button class="filter btn btn-default" data-filter=".brand-'.$slug['brand'].'">'.$brand['brand'].'</button> ';
                    }
                ?>
            </div>
            <div id="filter-families">
                <p>Families:</p>
                <?php foreach ($families as $family)
                    {
                        $slug=preg_replace('/\s+/', '-', $family);
                        echo '<button class="filter btn btn-default" data-filter=".frag-family-'.$slug['family'].'">'.$family['family'].'</button> ';
                    }
                ?>
            </div>
        </div>

        <div class="col-xs-12 directory-wrapper" id="filter-container">
            <div class="row">
                <div class="main definition frag-family-floral">
                    <h2>Floral</h2>
                    <p>Main notes include fresh-cut flowers.</p>
                </div>
                <div class="main definition frag-family-soft-floral">
                    <h2>Soft Floral</h2>
                    <p>Main notes include aldehydes and powdery notes.</p>
                </div>
                <div class="main definition frag-family-floral-oriental">
                    <h2>Floral Oriental</h2>
                    <p>Main notes include orange flower and sweet spices.</p>
                </div>
                <div class="main definition frag-family-soft-oriental">
                    <h2>Soft Oriental</h2>
                    <p>Main notes include incense and amber.</p>
                </div>
                <div class="main definition frag-family-oriental">
                    <h2>Oriental</h2>
                    <p>Main notes include amber notes and vanilla.</p>
                </div>
                <div class="main definition frag-family-woody-oriental">
                    <h2>Woody Oriental</h2>
                    <p>Main notes include sandalwood and patchouli.</p>
                </div>
                <div class="main definition frag-family-woods">
                    <h2>Woods</h2>
                    <p>Main notes include aromatic woods and vetiver.</p>
                </div>
                <div class="main definition frag-family-mossy-woods">
                    <h2>Mossy Woods</h2>
                    <p>Main notes include oakmoss and amber.</p>
                </div>
                <div class="main definition frag-family-dry-woods">
                    <h2>Dry Woods</h2>
                    <p>Main notes include dry woods and leather.</p>
                </div>
                <div class="main definition frag-family-aromatic-fougere">
                    <h2>Aromatic Fougère</h2>
                    <p>Main notes include lavender and aromatic herbs. This universal fragrance family includes elements from different families: the freshness of from the Citrus family, floral notes of lavender, the spicy-sweetness of a Floral Oriental, the ambery depth of an Oriental and the Mossy Woods warmth of sandalwood and oakmoss.</p>
                </div>
                <div class="main definition frag-family-citrus">
                    <h2>Citrus</h2>
                    <p>Main notes include bergamot and other citrus oils.</p>
                </div>
                <div class="main definition frag-family-water">
                    <h2>Water</h2>
                    <p>Main notes include marine and aquatic notes, generally from the chemical calone.</p>
                </div>
                <div class="main definition frag-family-green">
                    <h2>Green</h2>
                    <p>Main notes include galbanum and green notes.</p>
                </div>
                <div class="main definition frag-family-fruity">
                    <h2>Fruity</h2>
                    <p>Main notes include berries and other non-citrus fruits.</p>
                </div>

                <?php $counter = 1; ?>
                <?php foreach ($fragrances as $fragrance): ?>

                <?php   $slugbrand=preg_replace('/\s+/', '-', $fragrance['brand']);
                        $slugbrand=preg_replace('/[^\p{L}\p{N}\s]/u', '', $slugbrand);
                        $slugfamily=preg_replace('/\s+/', '-', $fragrance['family']);
                ?>
                <div class="col-xs-12 col-sm-4 col-md-3 main directory-card frag-directory-card brand-<?php echo $slugbrand; ?> frag-family-<?php echo $slugfamily; ?>" data-myorder="<?php echo $counter; ?>">
                    <h2 class="text-center card-heading"><a href="fragrances/<?php echo $fragrance['slug'] ?>"><?php echo $fragrance['name'] ?></a></h2>
                    <a href="fragrances/<?php echo $fragrance['slug'] ?>"><img src="<?php echo base_url('assets/public/images/fragrances/'.$fragrance['slug'].'.jpg'); ?>" alt="<?php echo $fragrance['brand'].' '.$fragrance['name'] ?>" /></a>
                    <div class="text-center rm-card-details">
                        <br />
                        <p class="text-uppercase"><strong><?php echo $fragrance['brand'] ?></strong></p>
                        <p><?php echo $fragrance['family'] ?></p>
                        <a class="details" href="fragrances/<?php echo $fragrance['slug'] ?>">+ Details</a>
                    </div>
                </div>

                <?php $counter++ ?>
                <?php endforeach ?>
            </div>
        </div><!--directory-wrapper-->

        <script type="text/javascript">
            
            $(document).ready(function(){

                $('.main.definition').addClass('col-xs-12 col-sm-4 col-md-3');

                $('#filter-container').mixItUp({
                    load: {
                        filter: '.frag-directory-card',
                        sort: 'myorder:asc'
                    },
                    selectors: {
                        target: '.main'
                    }
                });

                $('.toggle-filters').click(function(){
                    $('.toggle-filters').toggle();
                    $('.rm-filter').slideToggle();
                })

            });
            
            <?php foreach ($faves as $fave): ?>

            var $fave = "<?php echo $fave["name"]; ?>";

            makeFave($fave);

            <?php endforeach; ?>
        
        </script>