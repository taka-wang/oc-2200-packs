<?php echo $header; ?><?php echo $column_left; ?>
<div id="content">
  <div class="page-header">
    <div class="container-fluid">
      <div class="pull-right">
        <button type="submit" form="form-tcat" data-toggle="tooltip" title="<?php echo $button_save; ?>" class="btn btn-primary"><i class="fa fa-save"></i></button>
        <a href="<?php echo $cancel; ?>" data-toggle="tooltip" title="<?php echo $button_cancel; ?>" class="btn btn-default"><i class="fa fa-reply"></i></a></div>
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
    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title"><i class="fa fa-pencil"></i> <?php echo $text_edit; ?></h3>
      </div>
      <div class="panel-body">
        <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data" id="form-tcat" class="form-horizontal">
          <div class="row">
            <div class="col-sm-2">
              <ul class="nav nav-pills nav-stacked">
                <li class="active"><a href="#tab-general" data-toggle="tab"><?php echo $tab_general; ?></a></li>
                <?php foreach ($geo_zones as $geo_zone) { ?>
                <li><a href="#tab-geo-zone<?php echo $geo_zone['geo_zone_id']; ?>" data-toggle="tab"><?php echo $geo_zone['name']; ?></a></li>
                <?php } ?>
              </ul>
            </div>
            <div class="col-sm-10">
              <div class="tab-content">
                <div class="tab-pane active" id="tab-general">

                  <div class="form-group required">
                      <label class="col-sm-2 control-label" for="input-merchant-id"><?php echo $entry_merchant_id; ?></label>
                      <div class="col-sm-10">
                          <input type="text" name="tcat_merchant_id" id="input-merchant-id" value="<?php echo isset($merchant_id) ? $merchant_id : $help_merchant_id; ?>" placeholder="<?php echo $help_merchant_id; ?>" class="form-control" />
                          <?php if ($error_warning2) { ?>
                          <div class="text-danger"><?php echo $error_warning2; ?></div>
                          <?php } ?>			  
                      </div>
                  </div>

                  <div class="form-group required">
                      <label class="col-sm-2 control-label" for="input-hash-key"><?php echo $entry_hash_key; ?></label>
                      <div class="col-sm-10">
                          <input type="text" name="tcat_hash_key" id="input-hash-key" value="<?php echo isset($hash_key) ? $hash_key : $help_hash_key; ?>" placeholder="<?php echo $help_hash_key; ?>" class="form-control" />
                          <?php if ($error_warning3) { ?>
                          <div class="text-danger"><?php echo $error_warning3; ?></div>
                          <?php } ?>				  
                      </div>
                  </div>		  

                  <div class="form-group required">
                      <label class="col-sm-2 control-label" for="input-hash-iv"><?php echo $entry_hash_iv; ?></label>
                      <div class="col-sm-10">
                          <input type="text" name="tcat_hash_iv" id="input-hash-iv" value="<?php echo isset($hash_iv) ? $hash_iv : $help_hash_iv; ?>" placeholder="<?php echo $help_hash_iv; ?>" class="form-control" />
                          <?php if ($error_warning4) { ?>
                          <div class="text-danger"><?php echo $error_warning4; ?></div>
                          <?php } ?>				  
                      </div>
                  </div>	

                  <div class="form-group required">
                      <label class="col-sm-2 control-label" for="input-item-desc"><span data-toggle="tooltip" title="<?php echo $entry_item_desc_content; ?>"><?php echo $entry_item_desc; ?></span></label>
                      <div class="col-sm-10">
                          <input type="text" name="tcat_item_desc" id="input-item-desc" value="<?php echo isset($item_desc) ? $item_desc : $help_item_desc; ?>" placeholder="<?php echo $help_item_desc; ?>" class="form-control" />
                          <?php if ($error_warning5) { ?>
                          <div class="text-danger"><?php echo $error_warning5; ?></div>
                          <?php } ?>				  
                      </div>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-2 control-label" for="input-order-status-id"><?php echo $entry_order_status; ?></label>
                    <div class="col-sm-10">
                        <select name="tcat_order_status_id" id="input-order-status-id" class="form-control">
                            <?php foreach ($order_statuses as $order_status) { ?>
                            <?php if ($order_status['order_status_id'] == $order_status_id) { ?>
                            <option value="<?php echo $order_status['order_status_id']; ?>" selected="selected"><?php echo $order_status['name']; ?></option>
                            <?php } else { ?>
                            <option value="<?php echo $order_status['order_status_id']; ?>"><?php echo $order_status['name']; ?></option>
                            <?php } ?>
                            <?php } ?>
                        </select>			  
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label" for="input-order-finish-status-id"><?php echo $entry_order_finish_status; ?></label>
                    <div class="col-sm-10">
                        <select name="tcat_order_finish_status_id" id="input-order-finish-status-id" class="form-control">
                            <?php foreach ($order_statuses as $order_status) { ?>
                            <?php if ($order_status['order_status_id'] == $order_finish_status_id) { ?>
                            <option value="<?php echo $order_status['order_status_id']; ?>" selected="selected"><?php echo $order_status['name']; ?></option>
                            <?php } else { ?>
                            <option value="<?php echo $order_status['order_status_id']; ?>"><?php echo $order_status['name']; ?></option>
                            <?php } ?>
                            <?php } ?>
                        </select>			  
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label" for="input-order-fail-status-id"><?php echo $entry_order_fail_status; ?></label>
                    <div class="col-sm-10">
                        <select name="tcat_order_fail_status_id" id="input-order-fail-status-id" class="form-control">
                            <?php foreach ($order_statuses as $order_status) { ?>
                            <?php if ($order_status['order_status_id'] == $order_fail_status_id) { ?>
                            <option value="<?php echo $order_status['order_status_id']; ?>" selected="selected"><?php echo $order_status['name']; ?></option>
                            <?php } else { ?>
                            <option value="<?php echo $order_status['order_status_id']; ?>"><?php echo $order_status['name']; ?></option>
                            <?php } ?>
                            <?php } ?>
                        </select>			  
                    </div>
                </div>


                  <div class="form-group required">
                      <label class="col-sm-2 control-label" for="input-sender-name"><?php echo $entry_sender_name; ?></label>
                      <div class="col-sm-10">
                          <input type="text" name="tcat_sender_name" id="input-sender-name" value="<?php echo isset($sender_name) ? $sender_name : $help_sender_name; ?>" placeholder="<?php echo $help_sender_name; ?>" class="form-control" />
                          <?php if ($error_warning6) { ?>
                          <div class="text-danger"><?php echo $error_warning6; ?></div>
                          <?php } ?>				  
                      </div>
                  </div>	

                  <div class="form-group required">
                      <label class="col-sm-2 control-label" for="input-sender-phone"><?php echo $entry_sender_phone; ?></label>
                      <div class="col-sm-10">
                          <input type="text" name="tcat_sender_phone" id="input-sender-phone" value="<?php echo isset($sender_phone) ? $sender_phone : $help_sender_phone; ?>" placeholder="<?php echo $help_sender_phone; ?>" class="form-control" />
                          <?php if ($error_warning7) { ?>
                          <div class="text-danger"><?php echo $error_warning7; ?></div>
                          <?php } ?>				  
                      </div>
                  </div>
                  <div class="form-group required">
                      <label class="col-sm-2 control-label" for="input-sender-zip"><?php echo $entry_sender_zip; ?></label>
                      <div class="col-sm-10">
                          <input type="text" name="tcat_sender_zip" id="input-sender-zip" value="<?php echo isset($sender_zip) ? $sender_zip : $help_sender_zip; ?>" placeholder="<?php echo $help_sender_zip; ?>" class="form-control" />
                          <?php if ($error_warning9) { ?>
                          <div class="text-danger"><?php echo $error_warning9; ?></div>
                          <?php } ?>				  
                      </div>
                  </div>	
                  <div class="form-group required">
                      <label class="col-sm-2 control-label" for="input-sender-address"><?php echo $entry_sender_address; ?></label>
                      <div class="col-sm-10">
                          <input type="text" name="tcat_sender_address" id="input-sender-address" value="<?php echo isset($sender_address) ? $sender_address : $help_sender_address; ?>" placeholder="<?php echo $help_sender_address; ?>" class="form-control" />
                          <?php if ($error_warning10) { ?>
                          <div class="text-danger"><?php echo $error_warning10; ?></div>
                          <?php } ?>				  
                      </div>
                  </div>	

                  <div class="form-group">
                    <label class="col-sm-2 control-label" for="input-status"><?php echo $entry_status; ?></label>
                    <div class="col-sm-10">
                      <select name="tcat_status" id="input-status" class="form-control">
                        <?php if ($tcat_status) { ?>
                        <option value="1" selected="selected"><?php echo $text_enabled; ?></option>
                        <option value="0"><?php echo $text_disabled; ?></option>
                        <?php } else { ?>
                        <option value="1"><?php echo $text_enabled; ?></option>
                        <option value="0" selected="selected"><?php echo $text_disabled; ?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-2 control-label" for="input-tax-class"><?php echo $entry_tax_class; ?></label>
                    <div class="col-sm-10">
                      <select name="tcat_tax_class_id" id="input-tax-class" class="form-control">
                        <option value="0"><?php echo $text_none; ?></option>
                        <?php foreach ($tax_classes as $tax_class) { ?>
                        <?php if ($tax_class['tax_class_id'] == $tcat_tax_class_id) { ?>
                        <option value="<?php echo $tax_class['tax_class_id']; ?>" selected="selected"><?php echo $tax_class['title']; ?></option>
                        <?php } else { ?>
                        <option value="<?php echo $tax_class['tax_class_id']; ?>"><?php echo $tax_class['title']; ?></option>
                        <?php } ?>
                        <?php } ?>
                      </select>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-2 control-label" for="input-sort-order"><?php echo $entry_sort_order; ?></label>
                    <div class="col-sm-10">
                      <input type="text" name="tcat_sort_order" value="<?php echo $tcat_sort_order; ?>" placeholder="<?php echo $entry_sort_order; ?>" id="input-sort-order" class="form-control" />
                    </div>
                  </div>

                </div>
                <?php foreach ($geo_zones as $geo_zone) { ?>
                <div class="tab-pane" id="tab-geo-zone<?php echo $geo_zone['geo_zone_id']; ?>">
                  <div class="well" style="font-family: monospace;">
                    <?php echo $help_rate; ?>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label" for="input-rate<?php echo $geo_zone['geo_zone_id']; ?>"><span data-toggle="tooltip" title="<?php echo $help_rate; ?>"><?php echo $entry_rate; ?></span></label>
                    <div class="col-sm-10">
                      <textarea name="tcat_<?php echo $geo_zone['geo_zone_id']; ?>_rate" rows="5" placeholder="<?php echo $entry_rate; ?>" id="input-rate<?php echo $geo_zone['geo_zone_id']; ?>" class="form-control"><?php echo ${'tcat_' . $geo_zone['geo_zone_id'] . '_rate'}; ?></textarea>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label" for="input-status<?php echo $geo_zone['geo_zone_id']; ?>"><?php echo $entry_status; ?></label>
                    <div class="col-sm-10">
                      <select name="tcat_<?php echo $geo_zone['geo_zone_id']; ?>_status" id="input-status<?php echo $geo_zone['geo_zone_id']; ?>" class="form-control">
                        <?php if (${'tcat_' . $geo_zone['geo_zone_id'] . '_status'}) { ?>
                        <option value="1" selected="selected"><?php echo $text_enabled; ?></option>
                        <option value="0"><?php echo $text_disabled; ?></option>
                        <?php } else { ?>
                        <option value="1"><?php echo $text_enabled; ?></option>
                        <option value="0" selected="selected"><?php echo $text_disabled; ?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>
                </div>
                <?php } ?>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<?php echo $footer; ?> 