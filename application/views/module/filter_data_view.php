<?php
$l=1000;
foreach($res as $r1)
{
	$l++;
	?>
	<div class="jp_checkbox">
		<input type="checkbox" name="<?= $r1->name; ?><?= $r1->state; ?>" value="<?= $r1->name; ?>" id="<?= $l; ?>" />
	    <label for="<?= $l; ?>"> <?= $r1->name; ?></label>
	</div>
	<?php
}
?>