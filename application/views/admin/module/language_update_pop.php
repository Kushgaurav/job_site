<div class="modal-body">
	<div class="hs_input">
			<form id="language_up_form">
			<input type="hidden" name="id" value="<?= $id; ?>"/>
			<input type="hidden" name="field" value="<?= $field; ?>"/>
			<input type="text" id="data" name="<?= $field; ?>" id="" value="<?= $name ?>" class="form-control">
			</form>
     </div>
	 <input type="button" onclick="languageUpdate()" value="Update" class="btn">
</div>