<?php
defined('C5_EXECUTE') or die("Access Denied.");
$tp = new TaskPermission();
use \Concrete\Core\Permission\Access\Entity\Type as PermissionAccessEntityType;

$dt = Loader::helper('form/date_time');
if (!$tp->canAccessGroupSearch()) {
    die(t("You do not have group search permissions."));
}
?>
<?php
$type = PermissionAccessEntityType::getByHandle('group_combination');
$url = $type->getAccessEntityTypeToolsURL(); ?>

<div class="ccm-ui">

<form method="post" action="<?php echo $url?>" id="ccm-permission-access-entity-combination-groups-form">

<p><?php echo t('Only users who are members of ALL selected groups will be eligible for this permission.')?></p>

<table id="ccm-permissions-access-entity-combination-groups" class="table table-bordered">
<tr>
	<th><div style="width: 16px"></div></th>
	<th width="100%"><?php echo t("Name")?></th>
	<?php if (!is_object($pae)) {
    ?>
		<th><div style="width: 16px"></div></th>
	<?php
} ?>
</tr>
<tr>
	<td colspan="3" id="ccm-permissions-access-entity-combination-groups-none"><?php echo t("No users or groups added.")?></td>
</tr>
</table>

</form>

<input type="button" class="btn btn-default pull-right dialog-launch" dialog-width="640" dialog-height="480" id="ccm-permissions-access-entity-members-add-group" href="<?php echo URL::to('/ccm/system/dialogs/group/search')?>" dialog-modal="false" dialog-title="<?php echo t('Add Group')?>" value="<?php echo t('Add Group')?>" />

</div>

<script type="text/javascript">
ConcreteEvent.unsubscribe('SelectGroup');
ConcreteEvent.subscribe('SelectGroup', function(e, data) {
	var gID = data.gID, gName = data.gName;
	if ($("input[class=combogID][value=" + gID + "]").length == 0) {
        jQuery.fn.dialog.closeTop();
		$("#ccm-permissions-access-entity-combination-groups-none").hide();
		var tbl = $("#ccm-permissions-access-entity-combination-groups");
		html = '<tr><td><input type="hidden" class="combogID" name="gID[]" value="' + gID + '" /><img src="<?php echo ASSETS_URL_IMAGES?>/icons/group.png" /></td><td>' + gName + '</td><?php if (!is_object($pae)) {
    ?><td><a href="javascript:void(0)" onclick="ccm_removeCombinationGroup(this)"><img src="<?php echo ASSETS_URL_IMAGES?>/icons/remove.png" /></a></td><?php
} ?>';
		tbl.append(html);
	}
});

ccm_removeCombinationGroup = function(link) {
	$(link).parent().parent().remove();
	var tbl = $("#ccm-permissions-access-entity-combination-groups");
	if (tbl.find('tr').length == 2) {
		$("#ccm-permissions-access-entity-combination-groups-none").show();
	}
}

$(function() {
	$('#ccm-permission-access-entity-combination-groups-form').ajaxForm({
		dataType: 'json',
		beforeSubmit: function() {
			jQuery.fn.dialog.showLoader();
		},
		success: function(r) {
			jQuery.fn.dialog.hideLoader();
			jQuery.fn.dialog.closeTop();
			$('#ccm-permissions-access-entity-form .btn-group').removeClass('open');
			$('#ccm-permissions-access-entity-form input[name=peID]').val(r.peID);
			$('#ccm-permissions-access-entity-label').html('<div class="alert alert-info">' + r.label + '</div>');
		}
	});
});
</script>

<div class="dialog-buttons">
	<input type="button" onclick="jQuery.fn.dialog.closeTop()" value="<?php echo t('Cancel')?>" class="btn btn-default btn-hover-danger" />
	<input type="submit" onclick="$('#ccm-permission-access-entity-combination-groups-form').submit()" value="<?php echo t('Save')?>" class="btn pull-right btn-primary" />
</div>

