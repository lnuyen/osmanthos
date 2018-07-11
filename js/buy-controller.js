function showErrorDialogWithMessage(message,type)
{
	// controls error Messages in shipping and billing details forms 
        if (type === 'ship') {
                $('.message-sh').html(message);
        }
        if (type === 'bill') {
                $('.message-bil').html(message);
        }
        if (type === 'pay') {
                $('.message-pay').html(message);
        }
        
}

//data - shipping
var $fName  = $('#first-name').val();
var $lName  = $('#last-name').val();
var $add1   = $('#sh-address-line1').val();
var $add2   = $('#sh-address-line2').val();
var $city   = $('#sh-city').val();
var $state  = $('#sh-state').val();
var $zip    = $('#sh-zip').val();
var $email  = $('#email').val();
var $phone  = $('#sh-telephone').val();

//date - billing
var $fNameB = $('#bil-first-name').val();
var $lNameB = $('#bil-last-name').val();
var $add1B  = $('#bil-address-line1').val();
var $add2B  = $('#bil-address-line2').val();
var $cityB  = $('#bil-city').val();
var $stateB = $('#bil-state').val();
var $zipB   = $('#bil-zip').val();
var $phoneB = $('#bil-telephone').val();
    
    
function billIsShip() {
    if ($('#same').is(':checked'))
    {
        $('#bil-first-name').val($('#first-name').val());
        $('#bil-last-name').val($('#last-name').val());
        $('#bil-address-line1').val($('#sh-address-line1').val());
        $('#bil-address-line2').val($('#sh-address-line2').val());
        $('#bil-city').val($('#sh-city').val());
        var state = $('#sh-state option:selected').val();
        $('#bil-state option[value=' + state + ']').attr('selected','selected');
        $('#bil-zip').val($('#sh-zip').val());
        $('#bil-telephone').val($('#sh-telephone').val());
    }
}

function orderReview(){
    
    var $b = $('#billing-review');
    var $s = $('#shipping-review');
    
    //data - shipping
    var $fName  = $('#first-name').val();
    var $lName  = $('#last-name').val();
    var $add1   = $('#sh-address-line1').val();
    var $add2   = $('#sh-address-line2').val();
    var $city   = $('#sh-city').val();
    var $state  = $('#sh-state').val();
    var $zip    = $('#sh-zip').val();
    var $email  = $('#email').val();
    var $phone  = $('#sh-telephone').val();

    //date - billing
    var $fNameB = $('#bil-first-name').val();
    var $lNameB = $('#bil-last-name').val();
    var $add1B  = $('#bil-address-line1').val();
    var $add2B  = $('#bil-address-line2').val();
    var $cityB  = $('#bil-city').val();
    var $stateB = $('#bil-state').val();
    var $zipB   = $('#bil-zip').val();
    var $phoneB = $('#bil-telephone').val();
    
    if ($('#same').is(':checked'))
    {
        $info = '<span>'+$fName+' '+$lName+'</span><span>'+$add1+'<br>'+$add2+'</span><span>'+$city+', '+$state+' '+$zip+'</span>';
        $b.html($info);
        $s.html($info);
    }
    else
    {
        $b.html('<span>'+$fNameB+' '+$lNameB+'</span><span>'+$add1B+'<br>'+$add2B+'</span><span>'+$cityB+', '+$stateB+' '+$zipB+'</span>');
        $s.html('<span>'+$fName+' '+$lName+'</span><span>'+$add1+'<br>'+$add2+'</span><span>'+$city+', '+$state+' '+$zip+'</span>');
    }
};

$(document).ready(function(){
    
    // Validate Shipping Details
    $('#display-bil').click(function(){

        //data - shipping
        var $fName  = $('#first-name').val();
        var $lName  = $('#last-name').val();
        var $add1   = $('#sh-address-line1').val();
        var $add2   = $('#sh-address-line2').val();
        var $city   = $('#sh-city').val();
        var $state  = $('#sh-state').val();
        var $zip    = $('#sh-zip').val();
        var $email  = $('#email').val();
        var $phone  = $('#sh-telephone').val();


        // First and last name fields: make sure they're not blank
        if ($fName === "") {
                showErrorDialogWithMessage("Please enter your first name.",'ship');
                return;
        }
        if ($lName === "") {
                showErrorDialogWithMessage("Please enter your last name.",'ship');
                return;
        }

        // Address fields: make sure they're not blank
        if ($add1 === "") {
                showErrorDialogWithMessage("Please enter your address.",'ship');
                return;
        }
        if ($city === "") {
                showErrorDialogWithMessage("Please enter your city.",'ship');
                return;
        }
        if ($state === "0") {
                showErrorDialogWithMessage("Please select your state.",'ship');
                return;
        }
        if (($zip.length != 5) || $zip === "") {
                showErrorDialogWithMessage("Please enter your zipcode.",'ship');
                return;
        }

        //Validate telephone number
        intRegex = /[0-9 -()+]+$/;
        if ($phone === "") {
                showErrorDialogWithMessage("Please enter your phone number.",'ship');
                return;
        }
        if (($phone.length < 10) || (!intRegex.test($phone))) {
                showErrorDialogWithMessage("Please enter a valid phone number.",'ship');
                return;
        }

        // Validate the email address:
        var emailFilter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        if ($email === "") {
                showErrorDialogWithMessage("Please enter your email address.",'ship');
                return;
        } else if (!emailFilter.test($email)) {
                showErrorDialogWithMessage("Your email address is not valid.",'ship');
                return;
        }

        $('.message-sh').html(''); 
        $('#buy-form-sh').hide('slow');
        if ($('#same').is(':checked'))
            {
                $('#you-pay-now > div').show('slow');
            }
        else
            {
                $('#buy-form-bil').show('slow');
            }
    });

    // Validate Billing Details
    $('#end-bil').click(function(){
        
        //date - billing
        var $fNameB = $('#bil-first-name').val();
        var $lNameB = $('#bil-last-name').val();
        var $add1B  = $('#bil-address-line1').val();
        var $add2B  = $('#bil-address-line2').val();
        var $cityB  = $('#bil-city').val();
        var $stateB = $('#bil-state').val();
        var $zipB   = $('#bil-zip').val();
        var $phoneB = $('#bil-telephone').val();

        // First and last name fields: make sure they're not blank
        if ($fNameB === "") {
                showErrorDialogWithMessage("Please enter your first name.",'bill');
                return;
        }
        if ($lNameB === "") {
                showErrorDialogWithMessage("Please enter your last name.",'bill');
                return;
        }

        // Address fields: make sure they're not blank
        if ($add1B === "") {
                showErrorDialogWithMessage("Please enter your address.",'bill');
                return;
        }
        if ($cityB === "") {
                showErrorDialogWithMessage("Please enter your city.",'bill');
                return;
        }
        if ($stateB === "0") {
                showErrorDialogWithMessage("Please select your state.",'bill');
                return;
        }
        if (($zipB.length != 5) || $zipB === "") {
                showErrorDialogWithMessage("Please enter your zipcode.",'bill');
                return;
        }

        //Validate telephone number
        intRegex = /[0-9 -()+]+$/;
        if ($phoneB === "") {
                showErrorDialogWithMessage("Please enter your phone number.",'bill');
                return;
        }
        if (($phoneB.length < 10) || (!intRegex.test($phoneB))) {
                showErrorDialogWithMessage("Please enter a valid phone number.",'bill');
                return;
        }

        $('.message-bil').html(''); 
        $('#buy-form-bil').hide('slow');
        $('#you-pay-now > div').show('slow');
    });

    // After submitting payment...
    $('#payButton').click(function(){

        // POST DATA variables !!!!
        var $amount = '$' + $('#cart-total').val() + '.00';
        //data - shipping
        var $fName  = $('#first-name').val();
        var $lName  = $('#last-name').val();
        var $add1   = $('#sh-address-line1').val();
        var $add2   = $('#sh-address-line2').val();
        var $city   = $('#sh-city').val();
        var $state  = $('#sh-state').val();
        var $zip    = $('#sh-zip').val();
        var $email  = $('#email').val();
        var $phone  = $('#sh-telephone').val();

        //date - billing
        var $fNameB = $('#bil-first-name').val();
        var $lNameB = $('#bil-last-name').val();
        var $add1B  = $('#bil-address-line1').val();
        var $add2B  = $('#bil-address-line2').val();
        var $cityB  = $('#bil-city').val();
        var $stateB = $('#bil-state').val();
        var $zipB   = $('#bil-zip').val();
        var $phoneB = $('#bil-telephone').val();

        // Create token, append ALL data and submit form
        var token = function(res) {
            var $input = $('<input type=hidden name=stripeToken />').val(res.id);
            var $a  = $('<input type=hidden name=firstName />').val($fNameB);
            var $b  = $('<input type=hidden name=lastName />').val($lNameB);
            var $c  = $('<input type=hidden name=add1 />').val($add1B);
            var $d  = $('<input type=hidden name=add2 />').val($add2B);
            var $e  = $('<input type=hidden name=city />').val($cityB);
            var $f  = $('<input type=hidden name=state />').val($stateB);
            var $g  = $('<input type=hidden name=zip />').val($zipB);
            var $g1 = $('<input type=hidden name=phone />').val($phoneB);
            var $h  = $('<input type=hidden name=firstNameS />').val($fName);
            var $i  = $('<input type=hidden name=lastNameS />').val($lName);
            var $j  = $('<input type=hidden name=add1S />').val($add1);
            var $k  = $('<input type=hidden name=add2S />').val($add2);
            var $l  = $('<input type=hidden name=cityS />').val($city);
            var $m  = $('<input type=hidden name=stateS />').val($state);
            var $n  = $('<input type=hidden name=zipS />').val($zip);
            var $o  = $('<input type=hidden name=phoneS />').val($phone);
            var $p  = $('<input type=hidden name=email />').val($email);
            $('#you-pay-now').append( $input,$a,$b,$c,$d,$e,$f,$g,$g1,$h,$i,$j,$k,$l,$m,$n,$o,$p ).submit();
        };

        var handler = StripeCheckout.configure({
            key:        'pk_test_m2tSzMsaphDIvBvr4NyAVK9t',
            image:      'assets/public/images/checkout/stripe-checkout.png',
            token:      token
        });

        // Open Checkout with further options
        handler.open({
            address:        false,
            name:           'Scent Market',
            email:          $email,
            description:    $amount,
            panelLabel:     'Complete My Purchase'
        });

        return false;
    });

    // Show shipping details after section has been completed and hidden
    $('#shipping-details').click(function(){
        var $ship = $('#buy-form-sh');
        if ($ship.attr('display', 'none'))
        {
           $ship.show('slow');
           $('#buy-form-bil').hide('slow');
           $('#you-pay-now > div').hide('slow');
        }
    })
    
    // Show billing details after section has been completed and hidden
    $('#billing-details').click(function(){
        var $bill = $('#buy-form-bil');
        var $fNameB = $('#bil-first-name').val();

        if ( $bill.attr('display','none') && $fNameB != '' )
        {
            $bill.show('slow');
            $('#buy-form-sh').hide('slow');
            $('#you-pay-now > div').hide('slow');
        }
    })

    $('#same').click(billIsShip);
    $('#display-bil').click(orderReview);
    $('#end-bil').click(orderReview);

});