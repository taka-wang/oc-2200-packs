<style>
.preloader { width: 100%; height: 100%; position: absolute; background: rgba(0, 0, 0, 0.1); z-index: 1000; top: 0; box-sizing: border-box; display: none;}
.preloader .icon { top: 50%; left: 50%; position: absolute; margin-top: -50px; margin-left: -50px; width: 100px; height: 100px; color: #333333;}
</style>

<?php echo $header; ?><?php echo $column_left; ?>
<div id="content">

    <div class="page-header">
    <div class="container-fluid">
        <div class="pull-right">
        <a href="<?php echo $cancel; ?>" data-toggle="tooltip" title="<?php echo $button_cancel; ?>" class="btn btn-default"><i class="fa fa-reply"></i></a></div>
        <h1><?php echo $heading_title; ?></h1>
        <ul class="breadcrumb">
        <?php foreach ($breadcrumbs as $breadcrumb) { ?>
        <li><a href="<?php echo $breadcrumb['href']; ?>"><?php echo $breadcrumb['text']; ?></a></li>
        <?php } ?>
        </ul>
    </div>
    </div>

    <div id="main-container" class="container-fluid">
    <div class="panel panel-default row">

        <div class="panel-heading">
            <h3 class="panel-title"><i class="fa fa-pencil"></i> <?php echo $text_edit; ?></h3>
        </div>

        <div class="panel-body ">

            <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data" id="form-tcat-shipment" class="form-horizontal">

                <!-- field01 -->
                <div class="form-group col-sm-6 row required">
                    <label class="col-sm-4 control-label" for="SenderName"><?php echo $entry_sender_name; ?></label>
                    <div class="col-sm-8">
                        <input readonly type="text" name="SenderName" id="SenderName" value="<?php echo $sender_name; ?>" class="form-control" />
                    </div>
                </div>
                <!-- field02 -->
                <div class="form-group col-sm-6 required">
                    <label class="col-sm-4 control-label" for="SenderCellPhone"><?php echo $entry_sender_phone; ?></label>
                    <div class="col-sm-8">
                        <input readonly type="text" name="SenderCellPhone" id="SenderCellPhone" value="<?php echo $sender_phone; ?>" class="form-control" />
                    </div>
                </div>
                <!-- field03 -->
                <div class="form-group col-sm-6 row required">
                    <label class="col-sm-4 control-label" for="SenderZipCode"><?php echo $entry_sender_zip; ?></label>
                    <div class="col-sm-8">
                        <input readonly type="text" name="SenderZipCode" id="SenderZipCode" value="<?php echo $sender_zip; ?>" class="form-control" />
                    </div>
                </div>
                <!-- field04 -->
                <div class="form-group col-sm-6 required">
                    <label class="col-sm-4 control-label" for="SenderAddress"><?php echo $entry_sender_address; ?></label>
                    <div class="col-sm-8">
                        <input readonly type="text" name="SenderAddress" id="SenderAddress" value="<?php echo $sender_address; ?>" class="form-control" />
                    </div>
                </div>
                <!-- field05 -->
                <div class="form-group col-sm-6 row required">
                    <label class="col-sm-4 control-label" for="GoodsName"><?php echo $entry_item_desc; ?></label>
                    <div class="col-sm-8">
                        <input readonly type="text" name="GoodsName" id="GoodsName" value="<?php echo $item_desc; ?>" class="form-control" />
                    </div>
                </div>
                <!-- field06 -->
                <div class="form-group col-sm-6 required">
                    <label class="col-sm-4 control-label" for="GoodsAmount"><?php echo $entry_total; ?></label>
                    <div class="col-sm-8">
                        <input readonly type="text" name="GoodsAmount" id="GoodsAmount" value="<?php echo $total; ?>" class="form-control" />
                    </div>
                </div>

                <!-- field07 -->
                <div class="form-group col-sm-6 row required hidden">
                    <label class="col-sm-4 control-label" for="MerchantID"><?php echo $entry_merchant_id; ?></label>
                    <div class="col-sm-8">
                        <input readonly type="text" name="MerchantID" id="MerchantID" value="<?php echo $merchant_id; ?>" class="form-control" />
                    </div>
                </div>

                <!-- field09 -->
                <div class="form-group col-sm-6 row required hidden">
                    <label class="col-sm-4 control-label" for="hash_key"><?php echo $entry_hash_key; ?></label>
                    <div class="col-sm-8">
                        <input readonly type="text" name="hash_key" disabled="disabled" id="hash_key" value="<?php echo $hash_key; ?>" class="form-control" />
                    </div>
                </div>
                <!-- field10 -->
                <div class="form-group col-sm-6 required hidden">
                    <label class="col-sm-4 control-label" for="hash_iv"><?php echo $entry_hash_iv; ?></label>
                    <div class="col-sm-8">
                        <input readonly type="text" name="hash_iv" disabled="disabled" id="hash_iv" value="<?php echo $hash_iv; ?>" class="form-control" />
                    </div>
                </div>

<div class="form-group clearfix"></div>
                <!-- field01 -->
                <div class="form-group col-sm-6 row required">
                    <label class="col-sm-4 control-label" for="ReceiverName"><?php echo $entry_receiver_name; ?></label>
                    <div class="col-sm-8">
                        <input type="text" name="ReceiverName" id="ReceiverName" value="<?php echo $receiver_name; ?>" class="form-control" required/>
                    </div>
                </div>
                <!-- field02 -->
                <div class="form-group col-sm-6 required">
                    <label class="col-sm-4 control-label" for="ReceiverPhone"><?php echo $entry_receiver_phone; ?></label>
                    <div class="col-sm-8">
                        <input type="text" name="ReceiverPhone" id="ReceiverPhone" value="<?php echo $receiver_phone; ?>" class="form-control" required/>
                    </div>
                </div>

                <!-- field03 -->
                <div class="form-group col-sm-6 row required">
                    <label class="col-sm-4 control-label" for="ReceiverZipCode"><?php echo $entry_receiver_zip; ?></label>
                    <div class="col-sm-8">
                        <input type="text" name="ReceiverZipCode" id="ReceiverZipCode" value="<?php echo $receiver_zip; ?>" class="form-control" required/>
                    </div>
                </div>
                <!-- field04 -->
                <div class="form-group col-sm-6 required">
                    <label class="col-sm-4 control-label" for="ReceiverAddress"><?php echo $entry_receiver_address; ?></label>
                    <div class="col-sm-8">
                        <input type="text" name="ReceiverAddress" id="ReceiverAddress" value="<?php echo $receiver_address; ?>" class="form-control" required/>
                    </div>
                </div>

                <!-- field05 -->
                <div class="form-group col-sm-6 row required">
                    <label class="control-label col-sm-4" for="Temperature"><?php echo $entry_temperature; ?></label>
                    <div class="col-sm-8">
                        <select name="Temperature" class="form-control" id="Temperature">
                            <?php if ($temperature == '0001') { ?>
                            <option value="0001" selected="selected"><?php echo $entry_temperature_room; ?></option>
                            <?php } else { ?>
                            <option value="0001"><?php echo $entry_temperature_room; ?></option>
                            <?php } ?>
                            <?php if ($temperature == '0002') { ?>
                            <option value="0002" selected="selected"><?php echo $entry_temperature_refrigeration; ?></option>
                            <?php } else { ?>
                            <option value="0002"><?php echo $entry_temperature_refrigeration; ?></option>
                            <?php } ?>
                            <?php if ($temperature == '0003') { ?>
                            <option value="0003" selected="selected"><?php echo $entry_temperature_freeze; ?></option>
                            <?php } else { ?>
                            <option value="0003"><?php echo $entry_temperature_freeze; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <!-- field06 -->
                <div class="form-group col-sm-6 required">
                    <label class="control-label col-sm-4"  for="Distance"><?php echo $entry_distance; ?></label>
                    <div class="col-sm-8">
                        <select name="Distance" class="form-control" id="Distance">
                            <?php if ($distance == '00') { ?>
                            <option value="00" selected="selected"><?php echo $entry_distance_same; ?></option>
                            <?php } else { ?>
                            <option value="00"><?php echo $entry_distance_same; ?></option>
                            <?php } ?>
                            <?php if ($distance == '01') { ?>
                            <option value="01" selected="selected"><?php echo $entry_distance_other; ?></option>
                            <?php } else { ?>
                            <option value="01"><?php echo $entry_distance_other; ?></option>
                            <?php } ?>
                            <?php if ($distance == '02') { ?>
                            <option value="02" selected="selected"><?php echo $entry_distance_island; ?></option>
                            <?php } else { ?>
                            <option value="02"><?php echo $entry_distance_island; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>

                <!-- field07 -->
                <div class="form-group col-sm-6 row required">
                    <label class="control-label col-sm-4"  for="Specification"><?php echo $entry_specification; ?></label>
                    <div class="col-sm-8">
                        <select name="Specification" class="form-control" id="Specification">
                            <?php if ($specification == '0001') { ?>
                            <option value="0001" selected="selected"><?php echo $entry_specification_cm_60; ?></option>
                            <?php } else { ?>
                            <option value="0001"><?php echo $entry_specification_cm_60; ?></option>
                            <?php } ?>
                            <?php if ($specification == '0002') { ?>
                            <option value="0002" selected="selected"><?php echo $entry_specification_cm_90; ?></option>
                            <?php } else { ?>
                            <option value="0002"><?php echo $entry_specification_cm_90; ?></option>
                            <?php } ?>
                            <?php if ($specification == '0003') { ?>
                            <option value="0003" selected="selected"><?php echo $entry_specification_cm_120; ?></option>
                            <?php } else { ?>
                            <option value="0003"><?php echo $entry_specification_cm_120; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>

                <!-- field08 -->
                <div class="form-group col-sm-6 required">
                    <label class="control-label col-sm-4"  for="ScheduledDeliveryTime"><?php echo $entry_delivery_time; ?></label>
                    <div class="col-sm-8">
                        <select name="ScheduledDeliveryTime" class="form-control" id="ScheduledDeliveryTime">
                            <?php if ($delivery_time == 1) { ?>
                            <option value="1" selected="selected"><?php echo $entry_delivery_time_9_12; ?></option>
                            <?php } else { ?>
                            <option value="1"><?php echo $entry_delivery_time_9_12; ?></option>
                            <?php } ?>
                            <?php if ($delivery_time == 2) { ?>
                            <option value="2" selected="selected"><?php echo $entry_delivery_time_12_17; ?></option>
                            <?php } else { ?>
                            <option value="2"><?php echo $entry_delivery_time_12_17; ?></option>
                            <?php } ?>
                            <?php if ($delivery_time == 4) { ?>
                            <option value="4" selected="selected"><?php echo $entry_delivery_time_unlimited; ?></option>
                            <?php } else { ?>
                            <option value="4"><?php echo $entry_delivery_time_unlimited; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>

            </form>
            <div class="preloader row"><img class="icon" src="../image/tcat/puff.svg"></div>
            <div class="text-right">
                <button type="submit" id="button-create" class="btn btn-primary"><i class="fa fa-save"></i> <?php echo $text_create; ?></button>
            </div>
        </div>
    </div><!-- end of panel -->
    </div>

</div>
<?php echo $footer; ?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation-bootstrap-tooltip@0.9.0/jquery-validate.bootstrap-tooltip.js"></script>

<script type="text/javascript">

$(function() {
    $('#form-tcat-shipment').on('submit', function(e){
        e.preventDefault();
        if (!$("#form-tcat-shipment").valid()) return;
        $('.preloader').delay(500).fadeIn(300);
        var datastring = $("#form-tcat-shipment").serialize();
        $.ajax({
            type: "POST",
            url: "<?php echo $create_order_url; ?>",
            data: datastring,
            dataType: "json",
            success: function(data) {
                if (data["ResCode"] == 1) {
                $("#main-container").prepend('<div class="alert alert-info"><i class="fa fa-info-circle"></i> <?php echo $text_booking_note; ?>' + data["BookingNote"] + '&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $text_rtn_msg; ?>' + data["RtnMsg"] + '<button type="button" class="close" data-dismiss="alert">&times;</button></div>');
                } else {
                $("#main-container").prepend('<div class="alert alert-danger"><i class="fa fa-exclamation-circle"></i> <?php echo $text_fail; ?> <button type="button" class="close" data-dismiss="alert">&times;</button></div>');
                }
            },
            error: function() {
                $("#main-container").prepend('<div class="alert alert-danger"><i class="fa fa-exclamation-circle"></i> <?php echo $text_fail; ?> <button type="button" class="close" data-dismiss="alert">&times;</button></div>');
            },
            complete:function(jqXHR,status) {
                $('.preloader').stop(true,true).fadeOut(300);
                var res = jQuery.parseJSON(jqXHR.responseText);
                if (res["ResCode"] == 1) {
                    $("#button-create").attr('disabled', true);
                } else {
                    $("#button-create").attr('disabled', false);
                }
            }
        });
    });
});
</script>
