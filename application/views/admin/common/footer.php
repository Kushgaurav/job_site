    </div>
    <!-- page body end -->
    <div class="hs_footer">
	<?php
	$head_section=$this->Common_model->select('jp_setting','2','id');
	?>
        <p class='hs_copyright'><?= $head_section->copyright; ?></p>
    </div>
</div>
<!-- page end -->

<!-- library javascript start -->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/admin/js/lib/jquery-3.2.1.min.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/js/jquery-ui.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/admin/js/lib/bootstrap.min.js"></script>
<!-- library javascript end -->
<!-- plugin javascript start -->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/admin/js/plugins/scrollbar.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/admin/js/plugins/datatables.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/admin/js/plugins/select2.min.js"></script>
<!-- plugin javascript end -->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/admin/js/main.js"></script>
<script type="text/javascript" src="<?php echo base_url('assets/admin/js/plugins/Chart.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/admin/js/jquery.dataTables.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/admin/js/jquery.dataTables.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/admin/js/dataTables.bootstrap.min.js'); ?>"></script>
<!-- <script type="text/javascript" src="<?php echo base_url('assets/admin/js/ckeditor/ckeditor.js'); ?>"></script>	 -->
<script src="https://cdn.ckeditor.com/ckeditor5/40.2.0/classic/ckeditor.js"></script>

<script type="text/javascript">
	$(document).ready(function() {	
		setInterval(function(){ $('.msg').removeClass('open_alert'); }, 6000);
		setInterval(function(){ $('#example').DataTable();}, 500);
	} );
</script>
<script type="text/javascript" src="<?= base_url('assets/js/bootstrap-datepicker.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/admin/js/custom.min.js"></script>
</body>
</html>