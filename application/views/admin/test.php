    <input type="text" name="date1" value="" class="datepicker">
<script type="text/javascript" src="<?php echo base_url('assets/admin/js/lib/jquery-3.2.1.min.js'); ?>"></script>
<script type="text/javascript" src="<?= base_url('assets/js/bootstrap-datepicker.min.js'); ?>"></script>
<script type="text/javascript">
	$('document').ready(function(){
		 $('.datepicker').datepicker({
			    format: 'yyyy-mm-dd',
			    
	});
	});
</script>