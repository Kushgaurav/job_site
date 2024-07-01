<?php
if(isset($seeker_info))
{
?>
<form method="POST" action="update_see_data">
    <input type="hidden" name='id' value="<?= $seeker_info->id; ?>">

    <div class="modal-body">
        <div class="row">

            <div class="col-md-6 form-group">
                <label>Name</label>
                <input type="text" value="<?= $seeker_info->name; ?>" name="name" id="name" placeholder="Enter Name"
                    class="form-control">
            </div>

            <div class="col-md-6 form-group">
                <label>Mobile No</label>
                <input type="text" value="<?= $seeker_info->mno; ?>" name="mno" id="mno" placeholder="Enter Mobile No "
                    class="form-control">
            </div>
            <div class="col-md-6 form-group">
                <label>Whatsapp No</label>
                <input type="text" value="<?= $seeker_info->whatsapp_no; ?>" name="whatsapp_no" id="whatsapp_no"
                    placeholder="Enter whatsapp no" class="form-control">
            </div>
            <div class="col-md-6 form-group">
                <label>Current Address</label>
                <input type="text" value="<?= $seeker_info->current_address; ?>" name="current_address"
                    id="current_address" placeholder="Enter Current Address" class="form-control">
            </div>
            <div class="col-md-6 form-group">
                <label>Permanent Address</label>
                <input type="text" value="<?= $seeker_info->permanent_address; ?>" name="permanent_address"
                    id="permanent_address" placeholder="Enter Permanent Address" class="form-control">
            </div>
            <div class="col-md-6 form-group">
                <label>Location</label>
                <input type="search" list="search keyword" id="p_locaion" name="p_locaion" class="form-control"
                    value="<?=$seeker_info->p_locaion?>">
                <datalist id="search keyword">
                    <?php
										foreach($location as $loc)
										{
										?>
                    <option value="<?= $loc->state.' ,'. $loc->name.' ,'.$loc->locality ?>">
                    </option>
                    <?php
										}
										?>
                </datalist>
            </div>


            <div class="col-md-6">
                <label>Industry</label>
                <select name="aofs" id="aofs" class="form-control">

                    <?php
										foreach($area_of_sectors1 as $area_sectors)
										{
											?>
                    <option <?php if($area_sectors->name==$seeker_info->aofs){ echo "selected"; } ?>>
                        <?= $area_sectors->name; ?></option>
                    <?php
										}
										?>
                </select>

            </div>



            <div class="col-md-6">

                <label>Function</label>
                <select name="function" id="function" class="form-control">

                    <?php  foreach($specialization as $sp){ ?>
                    <option <?php if($sp->name==$seeker_info->function){ echo "selected"; } ?>>
                        <?= $sp->name ?></option>
                    <?php } ?>

                </select>

            </div>

            <div class="col-md-6">

                <label>skills</label>

                <select name="skills" id="skills" class="form-control">
                    <?php foreach($skills as $SK){ ?>
                    <option value="<?= $SK->name;?>" <?php if($seeker_info->skills == $SK->name){ echo "selected";} ?>>
                        <?= $SK->name; ?></option>
                    <?php }?>
                </select>

            </div>


            <div class="col-md-6">
                <div class="jp_input_wrapper">
                    <label>QUALIFICATION TYPE</label>
                    <select name="qua_type" id="qualification_type1" class="form-control">
                        <option value=""> -- Select Qualification Type -- </option>
                        <option value="1" <?php if($seeker_info->qua_type==1)  { echo "selected"; } ?>>Graduate
                        </option>
                        <option value="2" <?php if($seeker_info->qua_type==2)  { echo "selected"; } ?>>Post
                            Graduate</option>
                        <option value="3" <?php if($seeker_info->qua_type==3)  { echo "selected"; } ?>>Diploma
                        </option>

                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="jp_input_wrapper">
                    <label>Qualification</label>
                    <select name="qua" id="qualificationid" class="form-control">
                        <option value=""> -- Select Qualification -- </option>
                    </select>
                </div>
            </div>


            <script>
            document.getElementById('qualification_type1').addEventListener('change',
                function handleChange(teama) {
                    var data = {
                        'type': teama.target.value
                    }

                    $.ajax({
                        type: "POST",
                        url: "/admin/qualifications",
                        data: data,
                        dataType: "json",

                        success: function(result) {

                            $('#qualificationid').html('');
                            var options = '';
                            options +=
                                '<option value=""> -- Select Qualification -- </option>';
                            for (var i = 0; i < result.data.length; i++) {
                                options += '<option value="' + result.data[i].name +
                                    '">' + result
                                    .data[i]
                                    .name +
                                    '</option>';
                            }
                            $('#qualificationid').append(options);
                        }
                    });

                });
            </script>




            <div class="col-md-6 form-group">
                <label>Cv Headline</label>
                <input type="text" value="<?= $seeker_info->cv_headline; ?>" name="cv_headline" id="cv_headline"
                    placeholder="Enter Cv Headline" class="form-control">
            </div>

            <input type="submit" class="btn" value="submit">
        </div>
</form>

<script>
$(".datepicker").click(function() {
    $(this).datepicker('show');
});
</script>
<?php
}
?>