<?php echo $header; ?><?php echo $column_left; ?>
<div id="content">
  <div class="page-header">
    <div class="container-fluid">
      <div class="pull-right">
        <button type="submit" form="form-account" data-toggle="tooltip" title="<?php echo $lng['button_save']; ?>" class="btn btn-primary"><i class="fa fa-save"></i></button>
        <a href="<?php echo $cancel; ?>" data-toggle="tooltip" title="<?php echo $lng['button_cancel']; ?>" class="btn btn-default"><i class="fa fa-reply"></i></a></div>
      <h1><?php echo $heading_title; ?></h1>
      <ul class="breadcrumb">
        <?php foreach ($breadcrumbs as $breadcrumb) { ?>
        <li><a href="<?php echo $breadcrumb['href']; ?>"><?php echo $breadcrumb['text']; ?></a></li>
        <?php } ?>
      </ul>
    </div>
  </div>
  <div class="container-fluid">
    <?php if ($error_warning) { ?>
    <div class="alert alert-danger"><i class="fa fa-exclamation-circle"></i> <?php echo $error_warning; ?>
      <button type="button" class="close" data-dismiss="alert">&times;</button>
    </div>
    <?php } ?>
    <?php if ($success) { ?>
    <div class="alert alert-success"><i class="fa fa-check-circle"></i> <?php echo $success; ?>
      <button type="button" class="close" data-dismiss="alert">&times;</button>
    </div>
    <?php } ?>
    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title"><i class="fa fa-pencil"></i> <?php echo $lng['text_edit']; ?></h3>
      </div>
      <div class="panel-body">
        <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data" id="form-account" class="form-horizontal">
          <input type="hidden" name="timezone_version" value="<?php echo $version; ?>" />
          <div class="form-group">
            <label class="col-sm-2 control-label"><?php echo $lng['entry_status']; ?></label>
            <div class="col-sm-2">
              <select name="timezone_status" class="form-control">
                <option value="1"><?php echo $lng['text_enabled']; ?></option>
                <option <?php if (!$status) echo 'selected'; ?> value="0"><?php echo $lng['text_disabled']; ?></option>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label"><?php echo $lng['entry_timezone']; ?></label>
            <div class="col-sm-4">
              <div><?php echo $lng['entry_php_time']; ?> <?php echo $php_time; ?></div>
              <div><?php echo $lng['entry_db_time']; ?> <?php echo $db_time; ?></div>
              <select name="timezone_timezone" class="form-control">
                <option value=''></option>
                <?php foreach ($timezones as $r) { ?>
                <option <?php if ($r == $timezone) echo 'selected'; ?> value="<?php echo $r; ?>"><?php echo $r; ?></option>
                <?php } ?>
              </select>
            </div>
          </div>
        </form>
      </div>
    </div>

  </div>
</div>
<script type="text/javascript">
if (getURLVar('refreshModCache')) {
  $.get('index.php?route=extension/modification/refresh&token=<?php echo $token; ?>');
}
</script>
<?php echo $footer; ?>