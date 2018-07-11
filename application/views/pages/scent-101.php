            <div class="visible-xs visible-sm text-center" id="mobile-nav-toggle">
                <i class="icon icon-bars"></i>
            </div>            

            <div class="col-xs-12">
                <div class="row row-fixed" style="position: relative;">
                    <div class="sr reveal-content left-nav">
                        <div class="visible-xs visible-sm" id="mobile-nav-close"> 
                            <i class="icon icon-times"></i>
                        </div>
                        <ul class="list-unstyled howToNav">
                            <li style="color: #111;"><strong>Contents</strong></li>
                            <li><a href="#scent-101">Scent 101</a></li>
                            <li><a href="#raw-materials">Raw Materials</a></li>
                            <li><a href="#resources">Resources</a></li>
                            <li><a href="#glossary">Glossary</a></li>
                            <li><a href="#questions">Questions</a></li>
                        </ul>
                    </div><!--.left-nav-->  
                    <div class="howTo col-xs-12 col-md-9 col-md-offset-3 " id="scent-101">

                        <!-- Scent 101 -->
                        <div data-title="Scent 101">
                            <div class="sr reveal-title">
                                <h1 class="h2">Scent <span>101</span></h1>
                                <p class="lead">Discover the art, science and language of scent.</p>
                            </div>
                            
                            <img class="sr reveal-hero" src="<?php echo base_url(); ?>/assets/public/images/photos/lemon+vial.jpg">

                            <p class="sr reveal-content">Fragrance is a mixture of scented oils and/or aroma molecules dissolved in a solvent, typically alcohol and water, or oil. In industry jargon, the scented mixture is referred to as the “juice.”</p>

                            <hr>

                            <div class="row">
                            
                                <div class="col-sm-3">
                                    <h4>Types of Fragrance</h4>
                                </div>
                                <div class="col-sm-9">

                                    <p>The concentration of a fragrance, the percentage of scented mixture, is typically between 10% and 30%. Different concentrations are sold and marketed under different names. There are no defined standards for fragrance concentration, so every brand categorizes their products differently. Parfum, or extrait, is the most concentrated form of fragrance, eau de parfum (edp) is somewhere in the middle, and eau de toilette (edt) is the least concentrated. Cologne and eau de cologne may be 5% to 10% or lower.</p>
                                </div>

                            </div>
                        </div>
                        <!-- // Scent 101 -->
                        
                        <!-- Raw Materials -->
                        <div data-title="Raw Materials" id="raw-materials">
                            <h2 class="sr reveal-title">Raw Materials</h2>
                            <p class="lead">The individual ingredients that make up a fragrance.</p>
                            <hr>
                            
                            <div class="raw-materials-carousel">
                                <?php $counter = 1; ?>
                                <?php foreach ($raw_materials as $raw_material): ?>

                                    <?php   $slugtype=preg_replace('/\s+/', '', $raw_material['type']);
                                            $slugfamily=str_replace('/','-',$raw_material['family']); 
                                            ?>
                                    <div class="col-xs-12 col-sm-4 col-md-3 main rm rm-family-<?php echo $slugfamily ?> rm-tmd-<?php echo $raw_material['tmd'] ?> rm-type-<?php echo $slugtype ?>" data-myorder="<?php echo $counter; ?>">
                                        <div>    
                                            <a href="raw-materials/<?php echo $raw_material['slug'] ?>"><img src="<?php echo base_url('assets/public/images/ingredients/'.$raw_material['slug'].'.jpg'); ?>" alt="<?php echo $raw_material['name'] ?>" /></a>
                                            <h2 class="text-center card-heading"><a href="raw-materials/<?php echo $raw_material['slug'] ?>"><?php echo $raw_material['name'] ?></a></h2>
                                        </div>
                                    </div>
                                <?php $counter++ ?>    
                                <?php endforeach ?>
                            </div>

                            <hr>

                            <p>Our <a href="<?php echo base_url('raw-materials'); ?>" title="Raw Materials">collection</a> contains natural and synthetic ingredients sourced from all over the world. Two types of raw materials are used in fragrance: natural (derived from plant materials) and synthetic (created through chemical synthesis).</p>

                            <hr>

                            <div class="row">
                        
                                <div class="col-sm-3">
                                    <h4>Natural <br class="hidden-xs">Raw Materials</h4>
                                </div>
                                <div class="col-sm-9">
                                    <p>Natural ingredients have been used since the beginning of perfumery. Various methods are used to extract and concentrate the fragrant parts into raw materials. Depending on the method of extraction, the resulting raw material will be an essential oil, absolute, or CO<sub>2</sub> extract.</p>

                                    <div class="row pad-45">

                                        <div class="col-sm-4">
                                            <h5>Essential Oil</h5>
                                            <p>A natural oil that carries the distinctive scent, or essence, of the plant (flowers, leaves, wood, bark, roots, seeds, peel) from which it is derived. Essential oils are usually obtained through steam distillation.</p>
                                        </div>

                                        <div class="col-sm-4">
                                            <h5>Absolute</h5>
                                            <p>A highly concentrated aromatic oil obtained through alcohol extraction. The residual product that contains aromatic content after extraction is the concrete, which is further filtered to remove plant waxes and the resulting product is the absolute.</p>
                                        </div>

                                        <div class="col-sm-4">
                                            <h5>CO<sub>2</sub> Extract</h5>
                                            <p>Supercritical CO<sub>2</sub> extraction is a more recent invention that uses carbon dioxide in its liquid state. Because the process is quick and gentle it can produce an absolute that retains the original odor of the natural material.</p>
                                        </div>

                                    </div>

                                    <p>Plants can produce a variety of raw materials depending on the species, the part of the plant that is extracted and the extraction method used. For example, a bitter orange tree produces three common raw materials: <a href="<?php echo base_url('raw-materials/petit-grain') ?>">petit grain</a> (steam distilled from branches and leaves), <a href="<?php echo base_url('raw-materials/neroli') ?>">neroli</a> oil (steam distilled from the flower), and <a href="<?php echo base_url('raw-materials/orange-flower') ?>">orange flower</a> absolute (extracted with alcohol from the flower). <a href="<?php echo base_url('raw-materials/rose-damascena') ?>">Rose absolute</a>, obtained through alcohol extraction, and rose essential oil, obtained through steam distillation, from the same rose plant will have distinctive scents.</p>
                                </div>

                            </div>

                            <hr>

                            <div class="row">
                        
                                <div class="col-sm-3">
                                    <h4>Synthetic <br class="hidden-xs">Raw Materials</h4>
                                </div>
                                <div class="col-sm-9">
                                    <p>In the late 19th century perfumers began using synthetic ingredients, which allowed them to expand their palettes beyond natural oils and absolutes. With these materials perfumers can reinvent naturally occurring smells and create entirely new scents. Synthetic ingredients make up to 80% of many modern perfumes and give perfumers enhanced creative freedom and odor performance. We include synthetic ingredients in our collection because they’re an essential part of modern perfumery. We love to experiment and create with synthetic ingredients and hope that you will too.</p>

                                    <div class="row pad-45">

                                        <div class="col-sm-4">
                                            <h5>Aroma Molecule</h5>
                                            <p>An original molecule that is not found in nature. Some aroma molecules have unique scents that have never been smelled before; others resemble a natural material that cannot be obtained naturally for one reason or another.</p>
                                        </div>

                                        <div class="col-sm-4">
                                            <h5>Absolute</h5>
                                            <p>Called “nature-identical” because the synthetic and natural molecules are exactly the same. Natural molecules are synthesized when it’s too difficult or cost-prohibitive to extract the aromatic compounds</p>
                                        </div>

                                        <div class="col-sm-4">
                                            <h5>Accord</h5>
                                            <p>A blend of two or more natural and/or synthetic raw materials that together create a distinct fragrance. Accords often recreate the effect of another material.</p>
                                        </div>

                                    </div>

                                    <p>The rise in popularity of organic and green products in beauty and cosmetics has led many people to view all unnatural ingredients negatively. In reality, synthetic ingredients can be less harmful than nat-ural ones. Synthetic ingredients are created as alternatives to natural ingredients due to high costs, e.g. iris, overharvesting, e.g. sandalwood, technical contraints, e.g. fruity raw materials, or regulation (ingredients are restricted or banned if they are found to be allergens, e.g. oakmoss, or if obtaining the ingredient causes harm to a species, e.g. musk).</p>
                                </div>

                            </div>

                            <hr>

                            <div class="row">
                        
                                <div class="col-sm-3">
                                    <h4>Top, Heart and Base Notes</h4>
                                </div>
                                <div class="col-sm-9">
                                    <p>Fragrances are made of raw materials that have different rates of evaporation. Raw materials are classified as top, heart or base notes according to their volatility. Most fragrances are built with a combination of top, heart and base notes to balance the fragrance as it evolves over time.</p>

                                    <h5>Top Notes</h5>
                                    <p><em>high volatility + low tenacity—they evaporate the fastest and you smell them first</em>
                                    <br>
                                    Top notes provide the first impression; a lovely scent upon first spritz. However, their scent is fleeting so top notes do not define the character of a fragrance.</p>

                                    <h5>Heart Notes</h5>
                                    <p><em>intermediate volatility and tenacity</em>
                                    <br>
                                    Also called middle notes or modifiers, heart notes add character, complexity and harmony to a fragrance. They can also cover any unpleasant scents that base notes may have in early stages of evaporation.</p>

                                    <h5>Base Notes</h5>
                                    <p><em>low volatility + high tenacity—they last the longest</em>
                                    <br>
                                    When the top and heart notes have evaporated and only the base notes remain, this is called a fragrance's "dry down." The base notes in a formula will determine the main characteristics of a fragrance. Some base notes have fixative properties, meaning they help a fragrance last longer by preventing the more volatile perfume ingredients from evaporating too rapidly.</p>
                                </div>

                            </div>

                            <hr>

                            <div class="row">
                        
                                <div class="col-sm-3">
                                    <h4>Families</h4>
                                </div>

                                <div class="col-sm-9">
                                    <p>Raw materials are organized into families containing ingredients with similar scents. There are different systems of classification used across the industry. We use these families:</p>

                                    <div class="row">
                                        <div class="col-sm-6">
                                            <h5>Amber</h5>
                                            <p>sweet, sensuous, and warm</p>
                                            
                                            <h5>Aromatic/Herbal</h5>
                                            <p>vibrant, energetic, fresh</p>

                                            <h5>Citrus</h5>
                                            <p>fresh, sparkling and uplifting</p>

                                            <h5>Floral</h5>
                                            <p>sweet, soft, varied by the natural scent of each flower</p>

                                            <h5>Fruity</h5>
                                            <p>very popular today and often created synthetically</p>

                                            <h5>Green</h5>
                                            <p>natural, fresh and youthful</p>
                                        </div>

                                        <div class="col-sm-6">

                                            <h5>Leather</h5>
                                            <p>smells like leather</p>

                                            <h5>Musk</h5>
                                            <p>impart warmth, diffusion and staying power</p>

                                            <h5>Spicy</h5>
                                            <p>impart warmth, body and character</p>

                                            <h5>Sweet</h5>
                                            <p>popular in gourmand fragrances</p>

                                            <h5>Woody</h5>
                                            <p>rich, powerful, masculine</p>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <!-- //Raw Materials -->

                        <!-- Resources -->
                        <div data-title="Resources" id="resources">
                            <h2 class="sr reveal-title">Resources</h2>
                            <p class="lead">Feed your curiosity with these online and offline resources for perfume and fragrance.</p>
                            <hr>
                            <div class="row">
                                <div class="col-md-6">
                                    <h4 style="margin:20px 0;">Blogs</h4>
                                    <p><a href="http://blog.thescentmarket.com/" target="_blank">Scent Notes</a></p>
                                    <p><a href="http://boisdejasmin.com/" target="_blank">Bois de Jasmin</a></p>
                                    <p><a href="http://http://www.cafleurebon.com/" target="_blank">Ca Fleure Bon</a></p>
                                    <p><a href="http://graindemusc.blogspot.com/" target="_blank">Grain de Musc</a></p>
                                    <p><a href="http://www.nstperfume.com/" target="_blank">Now Smell This</a></p>
                                    <p><a href="http://www.olfactorialist.com/" target="_blank">Olfactorialist</a></p>
                                    <p><a href="http://perfumeshrine.blogspot.com/" target="_blank">Perfume Shrine</a></p>
                                </div>
                                <div class="col-md-6">
                                    <h4 style="margin:20px 0;">Websites</h4>
                                    <p><a href="http://osmoz.com" target="_blank">OSMOZ</a></p>
                                    <p><a href="http://www.fragrance.org/" target="_blank">The Fragrance Foundation</a></p>
                                    <p><a href="http://http://www.fragrancesoftheworld.com/" target="_blank">Fragrances of the World</a></p>
                                    <p><a href="http://www.fragrantica.com/" target="_blank">Fragrantica</a></p>
                                    <p><a href="http://www.basenotes.net/" target="_blank">Base Notes</a></p>
                                </div>
                            </div>
                            <hr>
                            <h4 style="margin:20px 0;">Books</h4>
                            <p><a href="http://www.amazon.com/Perfect-Scent-Inside-Perfume-Industry/dp/B006Z39LO2" target="_blank">The Perfect Scent</a> by Chandler Burr</p>
                            <p><a href="http://www.amazon.com/Perfume-Alchemy-Scent-Jean-Claude-Ellena/dp/1611453305" target="_blank">Perfume: The Alchemy of Scent</a> by Jean Claude Ellena</p>
                            <p><a href="http://www.perfumestheguide.com/Perfumes_The_A-Z_Guide_-_Luca_Turin_and_Tania_Sanchez/Home.html" target="_blank">Perfumes: The Guide</a> by Luca Turin and Tania Sanchez</p>
                        </div>
                        <!-- //Resources -->
                        
                        <!-- Glossary -->
                        <div data-title="Glossary" id="glossary">
                            <h2 class="sr reveal-title">Glossary</h2>
                            <p class="lead">Vocabulary used by the fragrance industry to describe a scent can at times sound like a foreign language: woody, aldehydic, powdery, balsamic. Let us break down some common terms for you.</p>
                            <img class="sr reveal-image" src="<?php echo base_url(); ?>assets/public/images/photos/pink-pepper-alt.jpg" />
                            <dl class="dl-horizontal">
                                <dt>Absolute</dt>
                                <dd>Many natural materials, for example flowers, are too delicate to undergo the high heat of the distillation process. In this case, the fragrant compounds are extracted from the raw material using solvent. The resulting absolute is essentially a highly concentrated essential oil.</dd>
                                <dt>Accord</dt>
                                <dd>Two or more ingredients that together create a distinct fragrance. Accords often recreate the effect of another material. For example, you may see a ‘candied-cherry’ accord. Candied cherry cannot be bottled up, instead a perfumer will find a combination of ingredients that come together to create a ‘candied-cherry’ scent.</dd>
                                <dt>Animalic</dt>
                                <dd>Previously attributed to scents with animal-derived origins, most animalic ingredients today are aromachemicals. When smelled alone, animalic notes can be intense and unpleasant, but used in small amounts they add sensuality and depth to a fragrance.</dd>
                                <dt>Aldehydic</dt>
                                <dd>Aldehydes are synthetic materials popularized by the heavy use of them in Chanel No. 5. They are the same organic compounds as ketones and though their scents vary, they tend to add lift, air, and "sparkle" to a fragrance.</dd>
                                <dt>Aroma Molecule</dt>
                                <dd>An original molecule that is not found in nature. It may have a unique scent or resemble a natural material that cannot be obtained naturally for one reason or another.</dd>
                                <dt>Aromatic</dt>
                                <dd>This term refers to raw materials and notes that are vibrant, energetic, fresh, like lavender and mint. Aromatic notes are common in masculine fragrances.</dd>
                                <dt>Balsamic</dt>
                                <dd>Balsamic refers to a family of raw materials with a sweet, heavy, sticky scent (think balsamic vinegar). Most balsamic notes, like benzoin, are derived from resins and gums and they're important in Oriental fragrances.</dd>
                                <dt>Chypre</dt>
                                <dd>Chypre (pronounced "sheepra") refers to a family of fragrances originating from the mossy, woody, citrusy perfume Chypre (Coty, 1917). Classic chypre fragrances generally had sparkling citrus and floral notes over a dark, earthy base of oakmoss, patchouli, woods and labdanum. Modern chypre fragrances use less (or zero) oakmoss due to regulatory restrictions; sometimes they use synthetic substitutes. </dd>
                                <dt>CO<sub>2</sub> Extract</dt>
                                <dd>Supercritical CO<sub>2</sub> extraction is a more recent invention that uses carbon dioxide in its liquid state. Because the process is quick and gentle it produces an absolute that can retain the original odor of the natural material.</dd>
                                <dt>Concentration</dt>
                                <dd>Perfume is made up of scented oils and alcohol. The ratio of oil to alcohol is the "concentration" and it is typically between 10 to 20%. Parfum is the most concentrated form of fragrance and eau de cologne the least.</dd>
                                <dt>Essential Oil</dt>
                                <dd>A natural oil that carries the distinctive scent, or essence, of the plant (flowers, leaves, wood, bark, roots, seeds, or peel) from which it is derived. Essential oils are created through the steam distillation or expression process.</dd>
                                <dt>Flanker</dt>
                                <dd>Flankers are like TV spinoffs, but if the original was a perfume and the spinoff was a twist or interpretation of that perfume. Flankers are ever popular today and some are less obvious than others. Bestseller Coco Mademoiselle, for example, is a flanker of the original Coco. Many flankers are released as limited editions. There have been nearly 20 flankers of L'Eau D'Issey Pour Homme released since the original was created in 1994. Usually, flankers have the same bottle as the original fragrance, but in different colors or with a different decoration.</dd>
                                <dt>Fougère</dt>
                                <dd>Fougère is a fragrance family (the word means 'fern' in French) originating from Fougère Royale (Houbigant, 1884). The fougère structure includes notes like lavender, coumarin, oakmoss, woods, and bergamot.</dd>
                                <dt>GC-MS</dt>
                                <dd>Gas Chromatography-Mass Spectrometry is an instrumental technique by which complex mixtures of chemicals may be separated, identfied and quantified. Used in the perfume industry to analyze ingredients and fragrances.</dd>
                                <dt>Gourmand</dt>
                                <dd>A dessert-like fragrance that is so sweet it's nearly edible. Common notes include vanilla, chocolate, caramel, cotton candy, maple syrup.</dd>
                                <dt>Juice</dt>
                                <dd>Refers to the scented oils. The ratio of "juice" to alcohol determines the concentration, or strength, of a perfume.</dd>
                                <dt>Mod</dt>
                                <dd>"Mod" is industry speak for a fragrance formula. Each formula you create on Scent Market is a "mod".</dd>
                                <dt>Musk</dt>
                                <dd>The name musk originates from an odorous substance obtained from a gland of the male musk deer that was historically used in perfumery. The name now encompasses a family of scents with similar odors. The musk odors used today are nearly all synthetic.</dd>
                                <dt>Narcotic</dt>
                                <dd>Used to describe the effect indoles have on a fragrance; strong, heady, addictive. Generally used to describe white florals.</dd>
                                <dt>Nature-Identical Molecule</dt>
                                <dd>Called “nature-identical” because the synthetic and natural molecules are exactly the same. Natural molecules have to be synthesized when it’s difficult or impossible to extract the aromatic compounds from a fruit.</dd>
                                <dt>Nose</dt>
                                <dd>Industry speak for a perfumer.</dd>
                                <dt>Note</dt>
                                <dd>Notes are the raw materials or scents that make up a fragrance. A ‘note’ can be a single ingredient (natural or synthetic), or an accord.</dd>
                                <dt>Oriental</dt>
                                <dd>A fragrance family that uses amber, vanilla, spices, and musk to create rich, heady, sensual scents.</dd>
                                <dt>Powdery</dt>
                                <dd>Often, fragrance descriptions move beyond simple smells and refer to the perceived texture or aesthetic of the scent. A scent, such as iris, that is perceived as soft and somewhat dry is referred to as "powdery." Powdery scents can give the suggestion of makeup or baby powder.</dd>
                                <dt>Woody</dt>
                                <dd>Reminiscent of dry wood, like pencil shavings.</dd>
                            </dl>
                        </div>
                        <!-- //Glossary -->

                        <!-- Questions -->
                        <div data-title="Questions" id="questions">
                            <h2 class="sr reveal-title">Questions</h2>
                            <p class="lead">Any questions? Email <a href="mailto:scent101@osmanthos.com?subject=Question">scent101@osmanthos.com</a> or read our <a href="<?php echo base_url('frequently-asked-questions'); ?>"  >Frequently Asked Questions</a>.</p>
                            <img class="sr reveal-image" src="<?php echo base_url(); ?>assets/public/images/photos/lavender-field.jpg" />
                        </div>
                        <!-- //Resources -->
                    </div> 
                </div>
            </div>

            <!-- Get Started CTA -->
            <div class="col-xs-12 text-center cta-page icy-bg">
                <p class="h2">Ready to get started<span class="symbol">?</span></p>
                <a href="<?php echo base_url('scent-kits'); ?>" class="clear btn btn-primary btn-lg get-started">Shop Scent Kits</a>
            </div><!-- / Get Started CTA -->

<script>
    
    $(document).ready(function(){

        // ScrollReveal
        window.sr = ScrollReveal();
        sr.reveal('.reveal-title', { duration: 1000, scale: 1 } );
        sr.reveal('.reveal-hero', { duration: 1000, distance: 0, scale: 1 });
        sr.reveal('.reveal-content', { delay: 500, distance: 0, duration: 1000, scale: 1 } );
        sr.reveal('.reveal-lower-content', { distance: 0, duration: 1000, scale: 1 } );
        sr.reveal('.reveal-image', { duration: 1000, distance: 0, scale: 1 });

        $('.raw-materials-carousel').slick({
            slidesToShow: 4,
            slidesToScroll: 2,
            autoplay: true,
            autoplaySpeed: 5000,
            arrow: true,
            responsive: [
                {
                  breakpoint: 600,
                  settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2
                  }
                }
            ]
        });

        // Highlight Left Nav items on scroll
        // Cache selectors
        var lastId,
            topMenu = $(".howToNav"),
            topMenuHeight = topMenu.outerHeight()+1,
            // All list items
            menuItems = topMenu.find("a"),
            // Anchors corresponding to menu items
            scrollItems = menuItems.map(function(){
                var item = $($(this).attr("href"));
                if (item.length) { return item; }
            });

            // Bind click handler to menu items
            // so we can get a fancy scroll animation
            menuItems.click(function(e){
                var href = $(this).attr("href"),
                offsetTop = href === "#" ? 0 : $(href).offset().top-40;
                $('html, body').stop().animate({ 
                    scrollTop: offsetTop
                }, 850);
                e.preventDefault();
            });

            // Bind to scroll
            $(window).scroll(function(){
            // Get container scroll position
            var fromTop = $(this).scrollTop()+40;

            // Get id of current scroll item
            var cur = scrollItems.map(function(){
                if ($(this).offset().top < fromTop)
                return this;
            });
            // Get the id of the current element
            cur = cur[cur.length-1];
            var id = cur && cur.length ? cur[0].id : "";

            if (lastId !== id) {
                lastId = id;
                // Set/remove active class
                menuItems
                .parent().removeClass("active")
                .end().filter("[href=#"+id+"]").parent().addClass("active");
            }                   
        });

        // Make .left-nav sticky on scroll
        var nav = $(".left-nav"),
            offsetTop       = nav.offset().top - 30,
            offsetLeft      = nav.offset().left,
            navMobile       = $('#mobile-nav-toggle'),
            offsetTopMobile = navMobile.offset().top - 30,
            screen          = $(window).width();

        $(window).scroll(function() {
            var scroll = $(window).scrollTop();    
            if (screen < 992) {
                if (scroll >= offsetTopMobile) {
                    navMobile.addClass("fixed");
                    nav.addClass("fixed")
                } else {
                    navMobile.removeClass("fixed");
                    nav.removeClass("fixed")
                }
            } else {
                if (scroll >= offsetTop) {
                    nav.addClass("fixed").css('left', offsetLeft);
                } else {
                    nav.removeClass("fixed").css('left', '15px');
                }
            }
        });

        // Toggle .left-nav on mobile
        $('#mobile-nav-toggle, #mobile-nav-close').click(function(){
            nav.fadeToggle();
        });
        
    });
    
</script>