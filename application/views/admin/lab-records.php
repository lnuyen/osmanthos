<div class="admin-wrapper">

    <div class="col-md-12 text-center account-nav">
        <a href="formulas">Formulas</a>
        <a href="orders">Orders</a>
        <a class="selected" href="#">Lab Records</a>
    </div>

    <div class="col-xs-12 title-hero invert">
        <h1 class="page-title">Admin Area : Lab Records</h1>
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
        <?php foreach ($records as $record): ?>
            
            <div class="col-xs-12 lab-record">
                <div class="row">
                    <div class="col-sm-4 record-details">
                        <h3>Lab Record No. <?php echo $record['id']; ?></h3>
                        <p> 
                            <strong>Date Created:</strong> <?php echo $record['date_created']; ?>, <?php echo $record['time_created']; ?>
                            <br /> 
                            <strong>Formula Name:</strong> <?php echo $record['formula_name']; ?>
                            <br />
                            <strong>Formula ID:</strong> <span class="formula_id"><?php echo $record['formula_id']; ?></span>
                            <br />
                            <strong>Mixologist ID:</strong> <?php echo $record['user_id']; ?>
                            <br />
                        </p>
                    </div>
                    <div class="col-sm-8">
                        <textarea class="form-control" name="lab-notes"><?php echo $record['admin_notes']; ?></textarea><br />
                        <button class="btn btn-default submit-lab-notes" data-id="<?php echo $record['id']; ?>">Save Comments</button>
                    </div>
                </div>
            </div>
            
        <?php endforeach; ?>
        </div>
    </div><!-- .account-wrapper -->

</div> <!-- .admin-wrapper -->

<script src="<?php echo base_url('assets/public/js/jquery.quicksearch.js');?>" type="text/javascript"></script>
<script>

    $('.wrapper').addClass('admin-bg');
    
    $('input#search').quicksearch('div.lab-record', {
        selector: '.formula_id'
    });

    $('.submit-lab-notes').click(function(){
        var notes = $(this).siblings('textarea').val();
        var id = $(this).attr('data-id')
        updateLabRecordNotes(notes, id);
    })
    
</script>
