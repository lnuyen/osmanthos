<div class="container-fluid">

    <div class="row text-center">
        <div class="formulas_head">
            <h2>Custom Palette</h2>
            <p></p>
        </div>
        <div class="formula-view">
            <?php for ($i = 1; $i <= 10; $i++): ?>
            <div class="col-xs-6 col-sm-3 col-md-2">
                <img class="img-responsive img-circle" src="">
                <p class="formula-view-name"><?php echo $palette['rm'.$i]; ?></p>
            </div>
            <?php endfor; ?>
        </div>
        <?php //print_r ($palette); ?>
    </div>

</div><!-- // .container-fluid -->
<script type="text/javascript">
    // pull img for ingredient
    $('.formula-view > div').each(function(){

        var slug = $(this).find('.formula-view-name').html(),
            img  = $(this).find('img');

        slug = slug.replace(/\s+/g, "-").replace(/\./g, '').toLowerCase();

        if ( slug.indexOf("no-") != -1 ) {
            img.attr('src','<?php echo base_url("assets/public/images/blends/labels")?>/'+slug+'.jpg');
        } else {
            img.attr('src','<?php echo base_url("assets/public/images/ingredients")?>/'+slug+'.jpg');
        }

    })
</script>