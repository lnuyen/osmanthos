$(document).ready(function() {

    // AJAX MailChimp Submit
    var $form = $('#mc-embedded-subscribe-form')
    if ($form.length > 0) {
        $('#mc-embedded-subscribe-form input[type="submit"]').bind('click', function (event) {
            if (event) event.preventDefault()
            var $label = 'Footer Form';
            register($form, $label)
        })
    }

    var $formModal = $('#mc-embedded-subscribe-form--modal')
    if ($formModal.length > 0) {
        $('#mc-embedded-subscribe-form--modal input[type="submit"]').bind('click', function (event) {
            if (event) event.preventDefault()
            var $label = 'Home Page Modal';
            register($formModal, $label)
        })
    }


    var $formInvite = $('#mc-embedded-subscribe-form--invite')
    if ($formInvite.length > 0) {
        $('#mc-embedded-subscribe-form--invite input[type="submit"]').bind('click', function (event) {
            if (event) event.preventDefault()
            var $label = 'Invite Form';
            register($formInvite, $label)
        })
    }

    function register($form, $label) {
        var $submit = $form.find('#email_submit'),
            $email  = $form.find('#mce-EMAIL'),
            $result = $form.find('#subscribe-result');

        $submit.val('Sending...');
        
        $.ajax({
            type: $form.attr('method'),
            url: $form.attr('action'),
            data: $form.serialize(),
            cache: false,
            dataType: 'json',
            contentType: 'application/json; charset=utf-8',
            error: function (err) { alert('Could not connect to the registration server. Please try again later.') },
            success: function (data) {
                $submit.val('Submit')
                if (data.result === 'success') {
                    // Yeahhhh Success
                    console.log(data.msg)
                    $email.css('borderColor', '#eee')
                    $result.css('color', 'rgb(53, 114, 210)')
                    $result.html("<p>You're on the list! Thank you for subscribing.</p>")
                    $email.val('')

                    // Send Google Analytics Event
                    // Send Google Analytics Event
                    gtag('event', 'submit', {
                        'event_category' : 'MC Signup',
                        'event_label' : $label
                    });
                } else {
                    // Something went wrong, do something to notify the user.
                    console.log(data.msg)
                    $email.css('borderColor', '#ff8282')
                    $result.css('color', '#ff8282')
                    $result.html('<p>' + data.msg.substring(4) + '</p>')
                }
            }
        })
    };

    // smooth scrolling to internal page links
    $('a[href^="#"]').on('click',function (e) {
        e.preventDefault();

        var target = this.hash,
        $target = $(target);

        $('html, body').stop().animate({
            'scrollTop': $target.offset().top
        }, 600, 'swing', function () {
            window.location.hash = target;
        });
    });

    //---------------------- MY ORDERS ---------------------- //
    
    $('button.view-order').click(function(){
        $(this).parent().siblings().slideToggle();
    })
    
    //---------------------- MAIN NAV ---------------------- //
    
    $('.main-nav ul ul').mouseover(function(){
        $(this).prev().addClass('hovered');
    }).mouseout(function(){
        $(this).prev().removeClass('hovered')
    });

    $('#shopping-basket ul').mouseover(function(){
        $(this).prev().addClass('hovered');
    }).mouseout(function(){
        $(this).prev().removeClass('hovered')
    });

    $('.menu-toggle').click(function(){
        $('.mobile-nav-container').toggleClass('mobile-nav--open');
    })

    //---------------------- PARALLAX ---------------------- //
    /* Paroller */
    // initialize paroller.js and set attributes 
    $(".no-touch .text-module").paroller({ factor: '0.1', type: 'foreground', direction: 'vertical' });
    $(".no-touch .image-module").paroller({ factor: '0.01', type: 'foreground', direction: 'vertical' });
    $('.no-touch .parallax-f-v-1').paroller({ factor: '0.1', type: 'foreground', direction: 'vertical' });
    $("[data-paroller-factor]").paroller();

    //---------------------- HOW TO ---------------------- //

    $('a.prevHowTo').each(function(){
        var $prev = $(this).parents('div').prev().data('title');
        $(this)
            .html( '<i class="icon icon-angle-left"></i> ' + $prev )
            .addClass('btn btn-primary')
            .attr( 'data-title', $prev );
    })

    $('a.nextHowTo').each(function(){
        var $next = $(this).parents('div').next().data('title');
        $(this)
            .html( $next + ' <i class="icon icon-angle-right"></i>' )
            .addClass('btn btn-primary')
            .attr( 'data-title', $next );
    })

    function navReset (){
        $(".howToNav li").children().removeClass('selected');
        $('.howTo > div').hide();
        $('body,html').animate( {scrollTop: 0}, 400, 'swing');
    }

    // Display and Hide info about raw materials in How-To Guide
    $(".rmHowTo").click(function(){
        $('.rmDiv').hide();
        $(".rmHowTo").css('color','#222');
        $(this).css('color','#a8dddb');
        var $rawDiv = $('#rmDiv'+$(this).attr('target'));
        if ($rawDiv.css('display') == 'none')
            $rawDiv.show();
        else
            $rawDiv.hide();
    });

    //---------------------- LAB ---------------------- //

    // calculate total drops
    var counter=1;
    $("#addButton").on("click",function (e) {
        e.preventDefault();
        $("#add"+(counter++)).show();

        var price;
        if ( counter < 12 ) {
            price = 20;
        }
        else if ( counter > 16 )  {
            price = 28;
        }
        else {
            price = 24;
        }
        $("#totalPrice").text("$ " + price);

    });

    // hide ingredient and reset drops #
    $(".delete").click(function () {
        $(this).siblings("select").val("--");
        // $(this).siblings("input").val("");
        //$(this).parents('.lab--formula-rm-card').find('input').val('');
    });

    // Check for raw materials > 25%. If OK, submit formula
    $("#submit-all").click(function(e) {
        e.preventDefault();

        $('.formula_errors').html('').removeClass('open');

        var errors=0;

        // Check for raw materials > 25%
        // NOT limiting ingredients right now !!!
        /*$('input.ingredient').each(function(){
            if ( $(this).val() )
            {
                console.log($(this).val());

                if ( $(this).val().indexOf('.') === -1 )
                {
                    console.log($(this).val()+': '+$(this).siblings('input.percent').val());

                    if ( $(this).siblings('input.percent').val() > 25 )
                    {
                        var $message = '<p class="error_message">Whoops! Raw materials cannot exceed 25%, please adjust '+$(this).val()+'</p>';
                        $('div.formula_errors').append($message);
                        errors++;
                    }
                }
            }
        });*/

        // Check for at least one ingredient
        var ingredients = $('.lab--formula-rm-card h4').length;

        if ( ingredients < 1 )
        {
            var $message = '<p class="bg-warning">Please add an ingredient to your formula.</p>';
            $('div.formula_errors').append($message);
            errors++;
        }

        // Check for ingredients at 0%
        var $ingredientsError;
        var ingredientsErrorCounter=0;

        $('input.ingredient').each(function(){
            
            if ( $(this).val() )
            {
                var percent = $(this).siblings('.formula-rm-controls').find('input.percent').val();

                if ( percent == 0 || percent == '' )
                {
                    if ( ingredientsErrorCounter === 0 )
                    {
                        $ingredientsError = $(this).val();
                        errors++;
                        ingredientsErrorCounter++;

                    } else {

                        $ingredientsError += ', '+$(this).val();

                    }

                }
            }
            
        });

        // Append Ingredients Errors
        if (ingredientsErrorCounter > 0) 
        {
            $('div.formula_errors').append('<p class="bg-warning">Please remove or specify an amount for: '+$ingredientsError+'</p>');
        }

        // Check mod name
        var $name = $('input#name').val();

        // Check for blank mod name
        if ($name == '')
        {
            var $message = '<p class="bg-warning">Oops! You need to name your formula before you proceed</p>';
            $('div.formula_errors').append($message);
            errors++;
        }

        // Check if mod name has been used
        if ($name != '')
        {
            console.log('not blank');
            
            var request = $.ajax({
                method: "POST",
                url: $baseUrl+'account/check_mod_name',
                data: { mod_name: $name },
                dataType: "json"
            });

            request.done(function( data ) {
                if (data=='success')
                {
                    console.log('name is good');
                }
                if (data=='false repeat name') 
                {
                    var $message = '<p class="bg-warning">Great name! Unfortunately, it appears you\'ve already used it. Please pick a new name for this mod.</p>';
                    $('div.formula_errors').append($message);
                    errors++;
                    console.log(data+' this name has been used');
                } 
                else 
                {
                    console.log('fail');
                }
            });

            // callback complete
            request.always(function( msg ) {
                //alert( "Data Saved: " + msg );
                console.log(errors);

                // If no errors, then submit formula
                if ( errors === 0 ) 
                { 
                    console.log(msg);
                    $("#new-formula").submit(); 
                }
            });
            
        }

        $('.formula_errors').addClass('open');

    });
    
    // increment drops
    $('.plus').click(function(){
        var drops = $(this).siblings('input.drops');
        increment(drops[0]);
        calculateDrops();
    })
    
    // decrement drops
    $('.minus').click(function(){
        var drops = $(this).siblings('input.drops');
        decrement(drops[0]);
        calculateDrops();
    })

    $('#filter').change(function(){
        $filter = $(this).val();
        console.log($filter);
        filterRawMaterials($filter,'data-tmd');
    })

    $('#filter2').change(function(){
        $filter = $(this).val();
        console.log($filter);
        filterRawMaterials($filter,'data-family');
    })
    
    $('#filter-options span').last().hide();
    $('#filter2').hide();
    
    $('#filter-options span').click(function(){
        $('#filter-options span').toggle();
        $('.filter select').toggle();
    })

    // Hide & Display RM fields 
    $('#add1').show();

    $('.formula').find('.add').each(function(){
        if ( $(this).children('.percent').val() > 0)
        {
            $(this).show();
        }
    });

    var rmcounter = 0;
    $('.add').each(function(){
        if ( $(this).css('display') === 'block' )
        {
            rmcounter+=1;   
        }
        if (rmcounter===10)
        {
            $('#add-formula-field').addClass('hide');
        }
    })
    
    if ( rmcounter === 0) rmcounter = 1;

    $('#add-formula-field').click(function(){
        $('#add'+(rmcounter+=1)).show();
        if (rmcounter===10)
        {
            $(this).addClass('hide');
        }
    });

    //---------------------- Raw Materials + Fragrance DIRECTORIES ---------------------- //

    $('.filter-button').click(function(){

        if ( $(this).hasClass('selected') ) {
            return;
        } else {
            var filter = $(this).data('filter');

            $('button.filter-button').removeClass('selected');
            $(this).addClass('selected');

            $('.rm-filter div.filter-group').slideUp();
            $('.rm-filter div.filter-group#'+filter).slideDown();            
        }
    })

    $('.rm-filter > div > button.filter').click(function(){
        $('.rm-filter div.filter-group').slideUp();
        $('button.filter-button').removeClass('selected');
    })

    //---------------------- Scent FEED ---------------------- //

    $('.feed-tags a').click(function(e){
        e.preventDefault();

        $('#feed-filter-options span').removeClass('selected');
        var $filter = $(this).data('tag');
        filterFeedTags($filter);
    })

    $('#feed-filter-options span').click(function(){
        var filter = $(this).data('filter');

        $('#feed-filter-options span').removeClass('selected');
        $(this).addClass('selected');

        $('.scent-feed > div').show();
        $('.feed-filter div').hide();
        $('.feed-filter div#'+filter).show();
    })

    $('input:radio').change(function(){
        $filter = $(this).val();
        filterFeedTags($filter);
    })

    //---------------------- HEADER > CART ---------------------- //

    // Fancy Box
    /*$(".various").fancybox({
        maxWidth	: 800,
        maxHeight	: 700,
        minWidth    : 280,
        fitToView	: false,
        width		: '70%',
        height		: '80%',
        autoSize	: false,
        closeClick	: false,
        openEffect	: 'fade',
        closeEffect	: 'fade',
        padding : 0,
        helpers : {
            overlay : {
                css : {
                    'background' : 'rgba(255, 255, 255, 0.8)'
                }
            }
        }
    });*/

});

    //---------------------- FUNNNNNNCTIONS ---------------------- //

    $baseUrl = 'http://localhost:8888/scentlab/';

    // display and set background image and height for page banner
    function displayPageBanner (height, background) {
        $('.page-banner').show().css({'height':height, 'background':background})
    }

    // dynamic style changes for Account pages
    function setAccountStyles() {
        $('#container').addClass('grid-bg');
        $('.wrapper').addClass('grey-bg full-width').css({
            //"padding": "20px",
            //"width": "1040px"  
        });
    }

    // add drops to formula
    function increment(myInput) {
        myInput.value = (+myInput.value + 1) || 0;
    }

    // remove drops from formula
    function decrement(myInput) {
        myInput.value = Math.max(0, (myInput.value - 1) || 0);
    }

    function calculateDrops() {
        var $drops = $("#totalDrops");

        // calculate # of drops
        var add = 0;
        $(".drops").each(function() {
            add += Number($(this).val());
        });
        $drops.text(add);

        // calculate % of drops
        var totalDrops = $drops.text();
        var percent = 0;
        $(".percent").each(function() {
            var $thisDrops = $(this).parents('.lab--formula-rm-card').find(".drops").val();
            if ( $thisDrops > 0) {
                percent = Math.floor(( $thisDrops/totalDrops) * 100);
            } else {
                percent = 0;
            }
            ($(this).val(percent));
        });
    }

    // add RM to Favorites
    function performAjaxSubmit() {
        
        var $name = $(this).attr("name");
        var $slug = $(this).attr("value");
        
        console.log( $name + " " + $slug );
        
        $.post($baseUrl+'account/favorite', {name: $name, slug: $slug},

            //This is the function which will be called if ajax call is successful.
            function(data) {
                if (data=='true'){
                    $('#add-fave').addClass('fave').html('<i class="icon icon-heart"></i> Favorite');
                    console.log($name + ' added to favorites');
                } else {
                    console.log('user not logged in');
                }
                  
        }, "json");
    }
    
    // add Frag to Favorites
    function performAjaxSubmitFrag() {
        
        var $name = $(this).attr("name");
        var $slug = $(this).attr("value");
        var $url = $baseUrl+'account/favorite_frag';
        
        console.log( $name + " " + $slug );
        
        $.post( $url, {name: $name, slug: $slug},

            //This is the function which will be called if ajax call is successful.
            function(data) {
                if (data=='true'){
                    $('#add-fave').addClass('fave').html('<i class="icon icon-heart"></i> Favorite');
                    console.log($name + ' added to favorites');
                } else {
                    console.log('user not logged in');
                }
                  
        }, "json");
    }
    
    // add Formula to Favorites
    function performAjaxSubmitFormula(el, id, name) {
        
        $.post($baseUrl+'account/favorite_mod', {formula_name: name, formula_id: id},

            //This is the function which will be called if ajax call is successful.
            function(data) {
                if (data=='true'){
                    el.attr('id','fave').html('<i class="icon icon-heart"></i> Favorite');
                    $('#mod--card-'+id).addClass('favorite');
                    console.log(name + ' added to favorites');
                } else {
                    console.log('user not logged in');
                }
                  
        }, "json");
    }

    // check if Formula is a Favorite
    function ajaxIsModFave(el, mod) {

        $.post($baseUrl+'account/is_favorite_mod/'+mod,

            //This is the function which will be called if ajax call is successful.
            function(data) {
                console.log(data);
                if (data == 'is_fave'){
                    el.attr('id','fave').html('<i class="icon icon-heart"></i> Favorite');
                } else {
                    el.attr('id','add-fave').html('<i class="icon icon-heart-o"></i> Add to Favorites');
                }
        }, "json");
    }

    // save notes for a mod/formula
    function modnotesAjaxSubmit(notes, id) {

        console.log('global: '+notes+' '+id);
        
        $.post($baseUrl+'account/mod_notes', {notes: notes, id: id},

            //This is the function which will be called if ajax call is successful.
            function(data) {
                if (data=='true'){
                    $('.mod--notes p').html('Notes Updated.');
                    $('.mod--notes p').fadeOut(2000);
                    console.log('notes updated');
                } else {
                    console.log('user not logged in');
                }
                  
        }, "json");
    }

    // add Blend to Favorites
    function performAjaxSubmitBlend() {
        
        var $name = $(this).attr("data-name");
        var $slug = $(this).attr("data-slug");
        
        $.post($baseUrl+'account/favorite_blend', {name: $name, slug: $slug},

            //This is the function which will be called if ajax call is successful.
            function(data) {
                if (data=='true'){
                    $('#add-fave').addClass('fave').html('<i class="icon icon-heart"></i> Favorite');
                    console.log($name + ' added to favorites');
                } else {
                    console.log('user not logged in');
                }
                  
        }, "json");
    }
    
    // filter formulas in Scent Feed by clickable tags
    function filterFeedTags($filter){
        $('.scent-feed > div').show();
        $('.scent-feed > div').each(function(){
            var tags = 0;
            
            $(this).find('.feed-tags a').each(function(){ //search for the filter tag in each formula
                var $tag = $(this).data('tag');
                if ($tag == $filter){
                    tags++;
                }
            })

            if ( $filter == 'all') {
                return;
            }
            
            if (tags == 0) {
                $(this).hide(); //hide formulas without the filter tag
            }
        })
    }
    
    // add customized palette to database
    function paletteSubmit() {
	        
	$.post( $baseUrl+'palettes/create', $("#your-palette").serialize(),
	
	    //this is the function which will be called if ajax call is successful.
	    function(data) {
	        if (data=='true')
	        {
	            $('#choose em').html('Your palette was added to your basket.');	
	            $('#your-palette').hide();
                $('#order-palette').hide();
                $('#choose h3').hide();
                
                $('#basketUpdate').html('<h2>Your palette was added to your basket.</h2>').fadeIn('fast', function(){
                    $(this).fadeOut(6000);
                });
                console.log(data.cart);
                
                $('#shopping-basket').load($baseUrl+'snippets/cart-link');
                $('#shopping-basket--mobile').load($baseUrl+'snippets/cart-link--mobile');
	        }
	        if (data=='false') 
	        {
	            $('.alert').html('<p class="bg-warning">Please select 10 ingredients.</p>');
	            console.log('please add 10 materials');
	        } 
	        else 
	        {
	            console.log('fail');
	        }
	    }, "json");
    }

    // create a new set
    function createSet() {
    console.log('create set');

    $.post( $baseUrl+'account/create_set', $("#newTrialForm").serialize(),
        //this is the function which will be called if ajax call is successful.
        function(data) {
            if (data=='success')
            {
                window.location.reload(true);
            }
            if (data=='false materials')
            {
                $('.formula_errors').html('<p class="bg-warning">Please select three mods.</p>').show();
                $('body,html').animate({scrollTop:60}, 400, 'swing');    
                console.log(data+'please select 3 mods');
            }
            if (data=='false no name') 
            {
                $('.formula_errors').html('<p class="bg-warning">Please name your set.</p>').show();
                $('body,html').animate({scrollTop:60}, 400, 'swing');    
                console.log(data+'no name');
            } 
            if (data=='false repeat name') 
            {
                $('.formula_errors').html('<p class="bg-warning">This name has already been used, please pick a new one.</p>').show();
                $('body,html').animate({scrollTop:60}, 400, 'swing');    
                console.log(data+'this name has been used');
            } 
            else 
            {
                console.log('fail');
            }
        }, "json");
    }
    
    // Add lab record to database anytime a formulas is made!
    function submitLabRecord($formulaID, $f_name) {
                                
        $.post($baseUrl+'admin/submit_lab_record', {formula_id: $formulaID, f_name: $f_name},

        //This is the function which will be called if ajax call is successful.
        function(data) {
            if (data=='true'){
                alert('Lab Record Added');
                console.log('success');
            } else {
                console.log('error: lab record not added');
            }

        }, "json");
    }
    
    // Update lab record notes
    function updateLabRecordNotes(notes, $id) {
                                
        $.post($baseUrl+'admin/update_lab_record_notes', {admin_notes: notes, id: $id},

        //This is the function which will be called if ajax call is successful.
        function(data) {
            if (data=='true'){
                alert('Notes Updated');
                console.log('success');
            } else {
                console.log('Error: notes not added');
            }

        }, "json");
    }
    
    // alternate image on hover on Perfume101 main page
    // new img use id, reg image use name
    function changeImgOnHover(img, folder){
        $(img).hover(
            function () {
                var id = $(this).attr('id');
                $(this).attr('src', $baseUrl+'assets/public/images/' + folder + '/' + id + '.png');
            },
            function () {
                var name = $(this).attr('name');
                $(this).attr('src', $baseUrl+'assets/public/images/'+ folder + '/' + name + '.png' );
            }
        );
    }
    
    // change element's OWN text on hover
    function changeTextOnHover (hoverItem, newHtml, regHtml, cssAttr, newCss, regCss){
        $(hoverItem).hover(
            function(){
                $(this).html(newHtml).css(cssAttr,newCss);
            },
            function(){
                $(this).html(regHtml).css(cssAttr,regCss);
            }
        )
    }
    
    // change ANOTHER element's text on hover
    function changeOtherTextOnHover (hoverItem, changeItem, newHtml, regHtml, cssAttr, newCss, regCss){
        $(hoverItem).hover(
            function(){
                $(changeItem).html(newHtml).css(cssAttr,newCss);
            },
            function(){
                $(changeItem).html(regHtml).css(cssAttr,regCss);
            }
        )
    }
    
    // submit form with non-submit button
    function submitForm (button, form){
        $(button).click(function() {
            $(form).submit();
        });
    }
    
    // slideToggle to reveal hidden NEXT SIBLING div or element
    function slideRevealSibling (hoverItem){
        $(hoverItem).mouseenter(function() {
            $(this).next().slideToggle(300);
        }).mouseleave(function() {
            $(this).next().slideToggle(300);
        });
    }

    // open order overlay
    function openOrderOverlay(el, buttons, overlay){
        el.slideUp("fast", function(){
            buttons.slideDown();
            overlay.fadeIn().addClass('open');
        });
    }

    // close order overlay
    function closeOrderOverlay(overlay, meta, buttons, button){
        overlay.fadeOut().removeClass('open');
        buttons.slideUp("fast", function(){
            button.slideDown();
        })   
    }
    
    // call order/add + add item to basket
    function addOrder($id, $option_name, $item_id){
        $.post( $baseUrl+'order/add', {id: $id, option_name: $option_name, item_id: $item_id},

            //This is the function which will be called if ajax call is successful.
            function(data) {
                if (data.status == 'true')
                {
                    //console.log($option_name+' added to basket');
                    //console.log(data.cart);

                    overlay = $('.order-overlay');

                    // call different basket alerts depending on page
                    if ( overlay.length && overlay.hasClass('open') ) {
                        basketAlert($option_name);
                    } else {
                        modBasketAlert($option_name);
                    }
                    
                    $('#shopping-basket').load($baseUrl+'snippets/cart-link');
                    $('#shopping-basket--mobile').load($baseUrl+'snippets/cart-link--mobile');
                } 
                else 
                {
                    alert('error');
                }

        }, "json");
    }

    // Update item quantity from Cart page
    function updateQty($id, $amount, $this) {

        console.log($id + ' ' + $amount);

        $.post( $baseUrl+'order/update', {id: $id, amount: $amount},

            function(data) {
                console.log(data.item);
                $this.siblings('.qty').text(data.item['qty']);
                $this.parent().next().find('.subtotal').text(data.item['subtotal']);
                $('.cart-total').text(data.cartTotal);
            }, 

            // Need to check/update shipping total also
            // or calculate shipping at Checkout (not cart)

        "json");

    }

    // show message in overlay + close overlay (Mods, Sets, Fragrances)
    function basketAlert(name){
        var overlay = $('.order-overlay.open');
        var meta    = overlay.siblings('.formula-box-meta');
        var buttons = meta.find('.toggle');
        var button  = meta.find('.show-buttons');

        buttons.slideUp();
        overlay
            .append('<h3 class="basket-alert">'+name+' was added to your basket.</h3>')
            .delay(2000)
            .fadeOut(400, function(){
                $('h3').remove('.basket-alert');
                button.slideDown();
            })
            .removeClass('open');   
    }

    // show message in overlay + close overlay (Mod View)
    function modBasketAlert(name){
        var overlay = $('.order-overlay');

        overlay
            .append('<h3 class="basket-alert">'+name+' was added to your basket.</h3>')
            .fadeIn()
            .delay(2000)
            .fadeOut(400);
    }
