/* =Lab
-------------------------------------------------------------- */

// replace plain lab bottle with FAVE lab bottle for fave raw materials !
function addLabFavorite($fave){
    
    $('.lab--rm-card').each(function(){
       if ( $(this).attr('data-name') == $fave )
       { 
           $(this).addClass('favorite');
       }
    }); 
}

/* =Raw Materials :: Directory
-------------------------------------------------------------- */
// add fave heart to corner of RM cards of fave raw materials in directory
function makeFave($fave){
    
    $('.main h2').each(function(){
       if ( $(this).text() == $fave )
       { 
           $(this).parent().addClass('favorite'); 
       }
    }); 
}

/* =Account
-------------------------------------------------------------- */
// add fave heart to corner of formula cards of fave formulas in My Mods
function makeFaveFormula($fave){
    
    $('.mod--card').each(function(){
       if ( $(this).attr('data-id') == $fave )
       { 
           $(this).addClass('favorite'); 
       }
    }); 
}