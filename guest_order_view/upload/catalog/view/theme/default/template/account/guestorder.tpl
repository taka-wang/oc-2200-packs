<?php echo $header; ?>
<div class="container">
  <ul class="breadcrumb">
    <?php foreach ($breadcrumbs as $breadcrumb) { ?>
    <li><a href="<?php echo $breadcrumb['href']; ?>"><?php echo $breadcrumb['text']; ?></a></li>
    <?php } ?>
  </ul>
  <?php if ($success) { ?>
  <div class="alert alert-success"><i class="fa fa-check-circle"></i> <?php echo $success; ?>
    <button type="button" class="close" data-dismiss="alert">&times;</button>
  </div>
  <?php } ?>
  <?php if ($error) { ?>
  <div class="alert alert-danger"><i class="fa fa-close"></i> <?php echo $error; ?>
    <button type="button" class="close" data-dismiss="alert">&times;</button>
  </div>
  <?php } ?>  <div class="row"><?php echo $column_left; ?>
    <?php if ($column_left && $column_right) { ?>
    <?php $class = 'col-sm-6'; ?>
    <?php } elseif ($column_left || $column_right) { ?>
    <?php $class = 'col-sm-9'; ?>
    <?php } else { ?>
    <?php $class = 'col-sm-12'; ?>
    <?php } ?>
    <div id="content" class="<?php echo $class; ?>"><?php echo $content_top; ?>
      <h1><?php echo $heading_title; ?></h1>
      <div class="col-xs-12">
        <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
        	<div class="col-xs-8">
                <fieldset>
                     <div class="form-group required">
                        <label class="col-sm-3 control-label" for="emailField"><?php echo $email_field; ?></label>
                        <div class="col-sm-9">
                          <input type="text" name="email" value="" required="required" id="emailField" class="form-control" />
                        </div>
                      </div>
                      <div class="form-group required">
                        <label class="col-sm-3 control-label" for="orderIDField"><?php echo $order_field; ?></label>
                        <div class="col-sm-9">
                          <input type="text" name="order_id" required="required" id="orderIDField" value="" class="form-control"/>
                        </div>
                    </div>
                </fieldset>
            </div>
            <div class="clearfix"></div>
            <div class="buttons">
              <div class="pull-right">
                <input class="btn btn-primary" type="submit" value="<?php echo $view_order; ?>" />
              </div>
            </div>
      	</form>     
      </div>
      <?php echo $content_bottom; ?></div>
    <?php echo $column_right; ?></div>
</div>
<?php echo $footer; ?>