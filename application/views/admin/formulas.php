<div class="admin-wrapper">

    <div class="col-md-12 text-center account-nav">
        <a class="selected" href="#">Formulas</a>
        <a href="orders">Orders</a>
        <a href="lab_records">Lab Records</a>
    </div>

    <div class="col-xs-12 title-hero invert">
        <h1 class="page-title">Admin Area : Formulas</h1>
    </div>

    <div class="col-xs-12 text-center pad-80b">
        <h4> Click to Change Size: <strong><span style="cursor:pointer;" id="calculate-grams">1.2</span></strong> g</h4>
        <br>
        Search by Formula No.
        <form>
            <input type="text" id="search">
        </form>
    </div>

    <div class="col-xs-12 account-wrapper pad-80b">
        <div class="row row-fixed">
        
            <?php foreach ($formulas as $formula): ?>
                <div class="col-xs-12 admin-formulas">
                    <div class="row">

                        <div class="col-sm-4 formulas-details">
                            <h3>Formula No. <?php echo $formula['formula_id'] ?></h3>
                            <p>
                                <strong>Date Created: </strong><?php echo $formula['date_created'] ?>
                                <br/>
                                <strong>Name: </strong><?php echo $formula['f_name'] ?>
                                <br/>
                                <strong>User ID: </strong><?php echo $formula['user_id'] ?>
                            </p>
                            <button class="btn btn-default" id="labrecord-submit" data-formula-id="<?php echo $formula['formula_id'] ?>" data-fname="<?php echo $formula['f_name'] ?>">Add Lab Record</button>
                            <div class="alert"></div>
                        </div>

                        <div class="col-sm-8">
                            <table>
                                <thead>
                                    <th class="header_rm">Raw Material</th>
                                    <th class="header_percent">Percentage</th>
                                    <th class="header_grams">Grams</th>
                                    <th class="header_checkbox">Added!</th>
                                </thead>
                                <tbody>
                                    <?php for ($i = 1; $i <= 10; $i++): ?>
                                        <?php if ( $formula['rm'.$i] != '' && $formula['drops'.$i] != '') : ?>
                                        <tr>
                                            <td><?php echo $formula['rm'.$i] ?></td>
                                            <td class="formula-drops"><?php echo $formula['percent'.$i] ?></td>
                                            <td class="grams"></td>
                                            <td><input type="checkbox"></td>
                                        </tr>
                                        <?php endif; ?>
                                    <?php endfor; ?>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            <?php endforeach ?>

        </div>
    </div><!-- .account-wrapper -->

</div><!-- .admin-wrapper -->

<script src="<?php echo base_url('assets/public/js/jquery.quicksearch.js');?>" type="text/javascript"></script>
<script type="text/javascript">

    $('.wrapper').addClass('admin-bg');

    $('input#search').quicksearch('div.admin-formulas', {
        selector: 'h3'
    });
 
    $('#calculate-grams').click(function(){
        if ( $(this).html() == '1.2' )
        {
            $(this).html('1.0');    
        }
        else if ( $(this).text() == 1.0 )
        {
            $(this).text(1.2);
        }
        calculateGrams();
        console.log( $(this).html() );
    })

    $('.admin.formulas h3').click(function(){
        $(this).siblings('.formula_table').toggle();
        $(this).siblings('#labrecord-submit').toggle();
    })


    $('button#labrecord-submit').click(function(){
        $formulaID = $(this).attr('data-formula-id');
        $f_name = $(this).attr('data-fname');
        console.log('formula id'+$formulaID);
        submitLabRecord($formulaID, $f_name);
    })
    
    function calculateGrams(){
                        	
        $('.grams').each(function(){
            $totalGrams = $('#calculate-grams').text();
            $grams = $(this).siblings('.formula-drops').html();
            $addGrams = $grams * .01 * $totalGrams;
            $(this).html( $addGrams.toFixed(2) );
        })
    }
    
</script>