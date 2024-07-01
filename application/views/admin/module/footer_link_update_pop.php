<div class="modal-body">
				<form id="update_footer_form">
				<input type="hidden" name="id" value="<?= $footer_info->id; ?>"> 
				<div class="hs_input">
                    <label>Name</label>
                    <input type="text" name="name" id="uf_name" placeholder="Enter Name" value="<?= $footer_info->name; ?>" class="form-control">
                </div>
				<div class="hs_input">
                    <label>Link</label>
                    <input type="text" name="link" id="uf_link" placeholder="Enter Link" value="<?= $footer_info->link; ?>" class="form-control">
                </div>
			  </form>
				<button class="btn"  onclick="update_footer_link1();">Update</button>
			</div>