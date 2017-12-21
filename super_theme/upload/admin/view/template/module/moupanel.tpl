<?php echo $header; ?><?php echo $column_left; ?>
<div id="content">
  <div class="page-header">
    <div class="container-fluid">
      <div class="pull-right">
      <a class="btn btn-success" onclick="$('#save').val('stay');$('#form-moucustomtheme').submit();"><i class="fa fa-check"></i> <?php echo $button_stay; ?></a>
	<button type="submit" form="form-moucustomtheme" data-toggle="tooltip" title="<?php echo $button_save; ?>" class="btn btn-primary"><i class="fa fa-save"></i></button>
	<a href="<?php echo $cancel; ?>" data-toggle="tooltip" title="<?php echo $button_cancel; ?>" class="btn btn-default"><i class="fa fa-reply"></i></a>
    </div>
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
    <div class="alert alert-success"><i class="fa fa-check"></i> <?php echo $success; ?>
        <button type="button" class="close" data-dismiss="alert">&times;</button>
    </div>
  <?php } ?>
  <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title"><i class="fa fa-pencil"></i><?php echo $edit_title;?></h3>
      </div>
      <div class="panel-body">
      <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data" id="form-moucustomtheme">
        <input type="hidden" name="save" id="save" value="0">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#tab-design" data-toggle="tab"><i class="fa fa-pencil-square-o "></i> <?php echo $tab_themepanel;?></a></li>
                <li><a href="#tab-custom-css" data-toggle="tab"><i class="fa fa-code"></i> <?php echo $tab_custom_css;?></a></li>
            </ul>
          <div class="tab-content">

            <div class="tab-pane active" id="tab-design">
              <div class="row">
                <div class="col-sm-2">
                    <ul class="nav nav-pills nav-stacked" id="tab-design">
                        <li class="active"><a href="#tab-general-design" data-toggle="tab"><?php echo $text_general; ?></a></li>
                        <li><a href="#tab-top_bar" data-toggle="tab"><?php echo $text_top_bar; ?></a></li>
                        <li><a href="#tab-top_search" data-toggle="tab"><?php echo $text_top_search; ?></a></li>
                        <li><a href="#tab-top_cart" data-toggle="tab"><?php echo $text_top_cart; ?></a></li>
                        <li><a href="#tab-top_menu" data-toggle="tab"><?php echo $text_top_menu; ?></a></li>
                        <li><a href="#tab-product_list" data-toggle="tab"><?php echo $text_product_list; ?></a></li>
                        <li><a href="#tab-footer" data-toggle="tab"><?php echo $text_footer; ?></a></li>
                    </ul>
                </div>
                <div class="col-sm-10">
                   <div class="tab-content">
                      <div class="tab-pane active" id="tab-general-design">
                         <div class="form-group">
                            <div class="row">
                                <label class="col-sm-2 control-label" for="input-repeatbackground"><?php echo $entry_backgroundimage; ?></label>
                                <div class="col-sm-2"><a href="" id="thumb-backgroundimage" data-toggle="image" class="img-thumbnail"><img src="<?php echo $backgroundimage; ?>" alt="" title="" data-placeholder="<?php echo $placeholder; ?>" /></a>
                                    <input type="hidden" name="moupanel_backgroundimage" value="<?php echo $moupanel_backgroundimage; ?>" id="input-backgroundimage" />
                                </div>
                                <label class="col-sm-2 control-label" for="input-repeatbackground"><?php echo $entry_repeatbackground; ?></label>
                                <div class="col-sm-2">
                                    <select name="moupanel_repeatbackground" id="input-repeatbackground" class="form-control">
                                        <?php foreach ($repeatbackgrounds as $repeatbackground) { ?>
                                        <?php if ($repeatbackground == $moupanel_repeatbackground) { ?>
                                            <option value="<?php echo $repeatbackground; ?>" selected="selected"><?php echo $repeatbackground; ?></option>
                                        <?php } else { ?>
                                            <option value="<?php echo $repeatbackground; ?>"><?php echo $repeatbackground; ?></option>
                                        <?php } ?>
                                        <?php } ?>
                                    </select>
                                </div>
                                <label class="col-sm-2 control-label" for="input-backgroundcolor"><?php echo $entry_backgroundcolor; ?></label>
                                <div class="col-sm-2">
                                    <input type="text" name="moupanel_backgroundcolor" value="<?php echo $moupanel_backgroundcolor; ?>"  id="input-backgroundcolor" size="6" class="color {required:false,hash:true} form-control"  />
                                </div>
                            </div>
                         </div>
                         <div class="form-group">
                            <div class="row">
                                <label class="col-sm-2 control-label" for="input-textcolor"><?php echo $text_color; ?></label>
                                <div class="col-sm-2">
                                    <input type="text" name="moupanel_textcolor" value="<?php echo $moupanel_textcolor; ?>"  id="input-backgroundcolor" size="6" class="color {required:false,hash:true} form-control"  />
                                </div>
                                <label class="col-sm-2 control-label" for="input-dropdownhover"><span data-toggle="tooltip" title="<?php echo $help_dropdownlihover; ?>"><?php echo $text_dropdownhover; ?></span></label>
                                <div class="col-sm-2">
                                    <input type="text" name="moupanel_dropdownhv" value="<?php echo $moupanel_dropdownhv; ?>"  id="input-dropdownhover" size="6" class="color {required:false,hash:true} form-control"  />
                                </div>
                                <label class="col-sm-2 control-label" for="input-dropdownbghover"><span data-toggle="tooltip" title="<?php echo $help_dropdownlihover; ?>"><?php echo $text_dropdownbg; ?></span></label>
                                <div class="col-sm-2">
                                    <input type="text" name="moupanel_dropdownbghover" value="<?php echo $moupanel_dropdownbghover; ?>"  id="input-dropdownbghover" size="6" class="color {required:false,hash:true} form-control"  />
                                </div>
                            </div>
                         </div>
                         <div class="form-group">
                            <div class="row">
                                <label class="col-sm-2 control-label" for="input-linkcolor"><?php echo $text_linkcolor; ?></label>
                                <div class="col-sm-2">
                                    <input type="text" name="moupanel_linkcolor" value="<?php echo $moupanel_linkcolor; ?>"  id="input-linkcolor" size="6" class="color {required:false,hash:true} form-control"  />
                                </div>
                                <label class="col-sm-2 control-label" for="input-linkhover"><?php echo $text_linkhover; ?></label>
                                <div class="col-sm-2">
                                    <input type="text" name="moupanel_linkhover" value="<?php echo $moupanel_linkhover; ?>"  id="input-linkhover" size="6" class="color {required:false,hash:true} form-control"  />
                                </div>
                                <label class="col-sm-2 control-label"><span data-toggle="tooltip" title="<?php echo $help_title; ?>"><?php echo $text_titlecolor; ?></span></label>
                                <div class="col-sm-2">
                                    <input type="text" name="moupanel_titlecolor" value="<?php echo $moupanel_titlecolor; ?>"  id="input-titlecolor" size="6" class="color {required:false,hash:true} form-control"  />
                                </div>
                            </div>
                         </div>
                      </div>

                      <div class="tab-pane" id="tab-top_bar">
                         <div class="form-group">
                            <div class="row">
                                <label class="col-sm-2 control-label" for="input-topnavbg"><?php echo $text_topnavbg; ?></label>
                                <div class="col-sm-2">
                                    <input type="text" name="moupanel_topnavbg" value="<?php echo $moupanel_topnavbg; ?>"  id="input-topnavbg" size="6" class="color {required:false,hash:true} form-control"  />
                                </div>
                                <label class="col-sm-2 control-label" for="input-topnavline"><span data-toggle="tooltip" title="<?php echo $help_topborderline; ?>"><?php echo $text_topborderline; ?></span></label>
                                <div class="col-sm-2">
                                    <input type="text" name="moupanel_topnavline" value="<?php echo $moupanel_topnavline; ?>" placeholder="<?php echo $text_topborderline; ?>"  id="input-topnavline" size="6" class="form-control"  />
                                </div>
                                <label class="col-sm-2 control-label"><?php echo $text_topcolorline; ?></label>
                                <div class="col-sm-2">
                                    <input type="text" name="moupanel_topnavlinecolor" value="<?php echo $moupanel_topnavlinecolor; ?>"  id="input-titlecolor" size="6" class="color {required:false,hash:true} form-control"  />
                                </div>
                            </div>
                            </div>
                            <div class="form-group">
                            <div class="row">
                                <label class="col-sm-2 control-label" for="input-languagehvbg"><span data-toggle="tooltip" title="<?php echo $help_languagebghv; ?>"><?php echo $text_toplanguagebghv; ?></span></label>
                                <div class="col-sm-2">
                                    <input type="text" name="moupanel_languagehvbg" value="<?php echo $moupanel_languagehvbg; ?>"  id="input-languagehvbg" size="6" class="color {required:false,hash:true} form-control"  />
                                </div>
                                <label class="col-sm-2 control-label" for="input-languagecolorhv"><span data-toggle="tooltip" title="<?php echo $help_languagebghv; ?>"><?php echo $text_toplanguagecolorhv; ?></span></label>
                                <div class="col-sm-2">
                                    <input type="text" name="moupanel_languagecolorhv" value="<?php echo $moupanel_languagecolorhv; ?>"  id="input-languagecolorhv" size="6" class="color {required:false,hash:true} form-control"  />
                                </div>
                                <label class="col-sm-2 control-label" for="input-topiconsize"><span data-toggle="tooltip" title="<?php echo $help_topborderline; ?>"><?php echo $text_topiconsize; ?></span></label>
                                <div class="col-sm-2">
                                    <input type="text" name="moupanel_topiconsize" value="<?php echo $moupanel_topiconsize; ?>" placeholder="<?php echo $text_topiconsize; ?>"  id="input-topiconsize" size="6" class="form-control"  />
                                </div>
                            </div>
                            </div>
                            <div class="form-group">
                            <div class="row">
                                <label class="col-sm-2 control-label" for="input-toplink"><?php echo $text_toplink; ?></label>
                                <div class="col-sm-2">
                                    <input type="text" name="moupanel_toplink" value="<?php echo $moupanel_toplink; ?>"  id="input-toplink" size="6" class="color {required:false,hash:true} form-control"  />
                                </div>
                                <label class="col-sm-2 control-label" for="input-toplinkhover"><?php echo $text_toplinkhover; ?></label>
                                <div class="col-sm-2">
                                    <input type="text" name="moupanel_toplinkhover" value="<?php echo $moupanel_toplinkhover; ?>"  id="input-toplinkhover" size="6" class="color {required:false,hash:true} form-control"  />
                                </div>
                                <label class="col-sm-2 control-label" for="input-topdropdownhv"><span data-toggle="tooltip" title="<?php echo $help_accounthv; ?>"><?php echo $text_topaccountcolorhv; ?></span></label>
                                <div class="col-sm-2">
                                    <input type="text" name="moupanel_topdropdownhv" value="<?php echo $moupanel_topdropdownhv; ?>"  id="input-topdropdownhv" size="6" class="color {required:false,hash:true} form-control"  />
                                </div>
                            </div>
                            </div>
                         </div>


                      <div class="tab-pane" id="tab-top_search">
                         <div class="form-group">
                            <div class="row">
                                <label class="col-sm-2 control-label" for="input-searchin"><?php echo $text_searchinput; ?></label>
                                <div class="col-sm-2">
                                    <input type="text" name="moupanel_searchinbg" value="<?php echo $moupanel_searchinbg; ?>"  id="input-searchin" size="6" class="color {required:false,hash:true} form-control"  />
                                </div>
                                <label class="col-sm-2 control-label" for="input-searchbutton"><?php echo $text_searchbutton; ?></label>
                                <div class="col-sm-2">
                                    <input type="text" name="moupanel_searchbutton" value="<?php echo $moupanel_searchbutton; ?>"  id="input-searchbutton" size="6" class="color {required:false,hash:true} form-control"  />
                                </div>
                                <label class="col-sm-2 control-label" for="input-searchiconsize"><span data-toggle="tooltip" title="<?php echo $help_topborderline; ?>"><?php echo $text_topiconsize; ?></span></label>
                                <div class="col-sm-2">
                                    <input type="text" name="moupanel_searchiconsize" value="<?php echo $moupanel_searchiconsize; ?>" placeholder="<?php echo $text_topiconsize; ?>"  id="input-searchiconsize" size="6" class="form-control"  />
                                </div>

                            </div>
                         </div>
                      </div>


                      <div class="tab-pane" id="tab-top_cart">
                         <div class="form-group">
                            <div class="row">
                                <label class="col-sm-2 control-label" for="input-cartcolor"><?php echo $text_color; ?></label>
                                <div class="col-sm-2">
                                    <input type="text" name="moupanel_topcartcolor" value="<?php echo $moupanel_topcartcolor; ?>"  id="input-cartcolor" size="6" class="color {required:false,hash:true} form-control"  />
                                </div>
                                <label class="col-sm-2 control-label" for="input-cartbg"><?php echo $text_background; ?></label>
                                <div class="col-sm-2">
                                    <input type="text" name="moupanel_topcartbg" value="<?php echo $moupanel_topcartbg; ?>"  id="input-cartbg" size="6" class="color {required:false,hash:true} form-control"  />
                                </div>
                                <label class="col-sm-2 control-label" for="input-cartopen"><?php echo $text_cartopen; ?></label>
                                <div class="col-sm-2">
                                    <input type="text" name="moupanel_topcartopen" value="<?php echo $moupanel_topcartopen; ?>"  id="input-cartopen" size="6" class="color {required:false,hash:true} form-control"  />
                                </div>
                            </div>
                         </div>


                         <div class="form-group">
                            <div class="row">
                                <label class="col-sm-2 control-label" for="input-cartopenbg"><?php echo $text_cartopenbg; ?></label>
                                <div class="col-sm-2">
                                    <input type="text" name="moupanel_topcartopenbg" value="<?php echo $moupanel_topcartopenbg; ?>"  id="input-cartopenbg" size="6" class="color {required:false,hash:true} form-control"  />
                                </div>
                                <label class="col-sm-2 control-label" for="input-cartopenborder"><?php echo $text_cartopenborder; ?></label>
                                <div class="col-sm-2">
                                    <input type="text" name="moupanel_topcartopenborder" value="<?php echo $moupanel_topcartopenborder; ?>"  id="input-cartopenborder" size="6" class="color {required:false,hash:true} form-control"  />
                                </div>
                                <label class="col-sm-2 control-label" for="input-cartopenbowith"><span data-toggle="tooltip" title="<?php echo $help_topborderline; ?>"><?php echo $text_cartopenborderwidth; ?></span></label>
                                <div class="col-sm-2">
                                    <input type="text" name="moupanel_topcartopenbosize" value="<?php echo $moupanel_topcartopenbosize; ?>"  id="input-cartopenbowith" placeholder="<?php echo $text_cartopenborderwidth; ?>"  size="6" class="form-control"   />
                                </div>
                            </div>
                         </div>

                      </div>

                      <div class="tab-pane" id="tab-top_menu">
                      <legend><span data-toggle="tooltip" data-html="true" title=""><?php echo $text_general; ?></span></legend>
                         <div class="form-group">
                            <div class="row">
                                <label class="col-sm-2 control-label" for="input-topmenubg"><?php echo $text_background; ?></label>
                                <div class="col-sm-2">
                                    <input type="text" name="moupanel_topmenbg" value="<?php echo $moupanel_topmenbg; ?>"  id="input-topmenubg" size="6" class="color {required:false,hash:true} form-control"  />
                                </div>
                                <label class="col-sm-2 control-label" for="input-topmenborder"><span data-toggle="tooltip" title="<?php echo $help_topborderline; ?>"><?php echo $text_border; ?></span></label>
                                <div class="col-sm-2">
                                    <input type="text" name="moupanel_topmenborder" value="<?php echo $moupanel_topmenborder; ?>"  id="input-topmenborder" size="6" placeholder="<?php echo $text_border; ?>"  size="6" class="form-control"   />
                                </div>
                                <label class="col-sm-2 control-label" for="input-topmenbordercolor"><?php echo $text_bordercolor; ?></label>
                                <div class="col-sm-2">
                                    <input type="text" name="moupanel_topmenbocolor" value="<?php echo $moupanel_topmenbocolor; ?>"  id="input-topmenbordercolor" size="6" class="color {required:false,hash:true} form-control"  />
                                </div>
                            </div>
                         </div>
                         <div class="form-group">
                            <div class="row">
                                <label class="col-sm-2 control-label" for="input-topmenuli"><?php echo $text_toplink; ?></label>
                                <div class="col-sm-2">
                                    <input type="text" name="moupanel_menulicolor" value="<?php echo $moupanel_menulicolor; ?>"  id="input-topmenuli" size="6" class="color {required:false,hash:true} form-control"  />
                                </div>
                                <label class="col-sm-2 control-label" for="input-topmenlihover"><?php echo $text_toplinkhover; ?></label>
                                <div class="col-sm-2">
                                    <input type="text" name="moupanel_menulihover" value="<?php echo $moupanel_menulihover; ?>"  id="input-topmenlihover" size="6" class="color {required:false,hash:true} form-control"  />
                                </div>
                                <label class="col-sm-2 control-label" for="input-topmenbghover"><?php echo $text_backgroundhover; ?></label>
                                <div class="col-sm-2">
                                    <input type="text" name="moupanel_menulibghover" value="<?php echo $moupanel_menulibghover; ?>"  id="input-topmenbghover" size="6" class="color {required:false,hash:true} form-control"   />
                                </div>
                            </div>
                         </div>
                         <legend><span data-toggle="tooltip" data-html="true" title=""><?php echo $text_dropdown; ?></span></legend>
                         <div class="form-group">
                            <div class="row">
                                <label class="col-sm-2 control-label" for="input-menuinnerbg"><?php echo $text_background; ?></label>
                               <div class="col-sm-2">
                                    <input type="text" name="moupanel_menuinnerbg" value="<?php echo $moupanel_menuinnerbg; ?>"  id="input-menuinnerbg" size="6" class="color {required:false,hash:true} form-control"  />
                                </div>
                                <label class="col-sm-2 control-label" for="input-menuinnerbghover"><?php echo $text_backgroundhover; ?></label>
                               <div class="col-sm-2">
                                    <input type="text" name="moupanel_menuinnerbghover" value="<?php echo $moupanel_menuinnerbghover; ?>"  id="input-menuinnerbghover" size="6" class="color {required:false,hash:true} form-control"  />
                                </div>
                            </div>
                         </div>
                          <div class="form-group">
                            <div class="row">
                                <label class="col-sm-2 control-label" for="input-menuinnerlink"><?php echo $text_toplink; ?></label>
                               <div class="col-sm-2">
                                    <input type="text" name="moupanel_menuinnerlink" value="<?php echo $moupanel_menuinnerlink; ?>"  id="input-menuinnerlink" size="6" class="color {required:false,hash:true} form-control"  />
                                </div>
                                <label class="col-sm-2 control-label" for="input-menuinnerlinkhover"><?php echo $text_toplinkhover; ?></label>
                               <div class="col-sm-2">
                                    <input type="text" name="moupanel_menuinnerlinkhover" value="<?php echo $moupanel_menuinnerlinkhover; ?>"  id="input-menuinnerlinkhover" size="6" class="color {required:false,hash:true} form-control"  />
                                </div>
                            </div>
                         </div>
                         <legend><span data-toggle="tooltip" data-html="true" title=""><?php echo $text_seeall; ?></span></legend>
                         <div class="form-group">
                            <div class="row">
                                <label class="col-sm-2 control-label" for="input-menushowallbg"><?php echo $text_background; ?></label>
                               <div class="col-sm-2">
                                    <input type="text" name="moupanel_menushowallbg" value="<?php echo $moupanel_menushowallbg; ?>"  id="input-menushowallbg" size="6" class="color {required:false,hash:true} form-control"  />
                                </div>
                                <label class="col-sm-2 control-label" for="input-menushowallbghover"><?php echo $text_backgroundhover; ?></label>
                               <div class="col-sm-2">
                                    <input type="text" name="moupanel_menushowallbghover" value="<?php echo $moupanel_menushowallbghover; ?>"  id="input-menushowallbghover" size="6" class="color {required:false,hash:true} form-control"  />
                                </div>
                            </div>
                         </div>
                         <div class="form-group">
                            <div class="row">
                                <label class="col-sm-2 control-label" for="input-menushowalllink"><?php echo $text_toplink; ?></label>
                               <div class="col-sm-2">
                                    <input type="text" name="moupanel_menushowalllink" value="<?php echo $moupanel_menushowalllink; ?>"  id="input-menushowalllink" size="6" class="color {required:false,hash:true} form-control"  />
                                </div>
                                <label class="col-sm-2 control-label" for="input-menushowalllinkhover"><?php echo $text_toplinkhover; ?></label>
                               <div class="col-sm-2">
                                    <input type="text" name="moupanel_menushowalllinkhover" value="<?php echo $moupanel_menushowalllinkhover; ?>"  id="input-menushowalllinkhover" size="6" class="color {required:false,hash:true} form-control"  />
                                </div>
                            </div>
                         </div>
                    </div>
                    <div class="tab-pane" id="tab-product_list">
                    <legend><span data-toggle="tooltip" data-html="true" title="<?php echo $help_product_list; ?>"><?php echo $text_product_list; ?></span></legend>
                    <div class="form-group">
                            <div class="row">
                                <label class="col-sm-2 control-label" for="input-productlistbg"><?php echo $text_background; ?></label>
                               <div class="col-sm-2">
                                    <input type="text" name="moupanel_product_list_bg" value="<?php echo $moupanel_product_list_bg; ?>"  id="input-productlistbg" size="6" class="color {required:false,hash:true} form-control"  />
                                </div>
                                <label class="col-sm-2 control-label" for="input-product_list_bordersize"><span data-toggle="tooltip" title="<?php echo $help_topborderline; ?>"><?php echo $text_border; ?></span></label>
                               <div class="col-sm-2">
                                    <input type="text" name="moupanel_product_list_bordersize" value="<?php echo $moupanel_product_list_bordersize; ?>" placeholder="<?php echo $text_topborderline; ?>"  id="input-product_list_bordersize" size="6" class="form-control"  />
                                </div>
                                <label class="col-sm-2 control-label" for="input-product_list_bordercolor"><?php echo $text_bordercolor; ?></label>
                               <div class="col-sm-2">
                                    <input type="text" name="moupanel_product_list_bordercolor" value="<?php echo $moupanel_product_list_bordercolor; ?>"  id="input-product_list_bordercolor" size="6" class="color {required:false,hash:true} form-control"  />
                                </div>
                            </div>
                    </div>
                    <div class="form-group">
                            <div class="row">
                                <label class="col-sm-2 control-label" for="input-productlistname"><?php echo $text_product_name; ?></label>
                               <div class="col-sm-2">
                                    <input type="text" name="moupanel_product_name" value="<?php echo $moupanel_product_name; ?>"  id="input-productlistname" size="6" class="color {required:false,hash:true} form-control"  />
                                </div>
                                <label class="col-sm-2 control-label" for="input-product_list_description"><?php echo $text_product_description; ?></label>
                               <div class="col-sm-2">
                                    <input type="text" name="moupanel_product_description" value="<?php echo $moupanel_product_description; ?>"  id="input-product_list_description" size="6" class="color {required:false,hash:true} form-control"  />
                                </div>
                                <label class="col-sm-2 control-label" for="input-product_list_price"><?php echo $text_product_price; ?></label>
                               <div class="col-sm-2">
                                    <input type="text" name="moupanel_product_price" value="<?php echo $moupanel_product_price; ?>"  id="input-product_list_price" size="6" class="color {required:false,hash:true} form-control"  />
                                </div>
                            </div>
                    </div>
                    <legend><span data-toggle="tooltip"  title="<?php echo $help_btgroup; ?>"><?php echo $text_btgroup; ?></span></legend>
                    <div class="form-group">
                            <div class="row">
                                <label class="col-sm-2 control-label" for="input-productlistbtgroup"><?php echo $text_background; ?></label>
                               <div class="col-sm-2">
                                    <input type="text" name="moupanel_product_btgroup" value="<?php echo $moupanel_product_btgroup; ?>"  id="input-productlistbtgroup" size="6" class="color {required:false,hash:true} form-control"  />
                                </div>
                                <label class="col-sm-2 control-label" for="input-product_btgroupborder"><span data-toggle="tooltip" title="<?php echo $help_topborderline; ?>"><?php echo $text_border; ?></span></label>
                               <div class="col-sm-2">
                                    <input type="text" name="moupanel_product_btgroupborder" value="<?php echo $moupanel_product_btgroupborder; ?>" placeholder="<?php echo $text_topborderline; ?>"  id="input-product_btgroupborder" size="6" class="form-control"  />
                                </div>
                                <label class="col-sm-2 control-label" for="input-product_btgroupcolor"><?php echo $text_bordercolor; ?></label>
                               <div class="col-sm-2">
                                    <input type="text" name="moupanel_product_btgroupcolor" value="<?php echo $moupanel_product_btgroupcolor; ?>"  id="input-product_btgroupcolor" size="6" class="color {required:false,hash:true} form-control"  />
                                </div>
                            </div>
                    </div>
                    <legend><span data-toggle="tooltip"  title=""><?php echo $text_add_to_cart; ?></span></legend>
                    <div class="form-group">
                            <div class="row">
                                <label class="col-sm-2 control-label" for="input-product_cartbg"><?php echo $text_background; ?></label>
                               <div class="col-sm-2">
                                    <input type="text" name="moupanel_product_cartbg" value="<?php echo $moupanel_product_cartbg; ?>"  id="input-product_cartbg" size="6" class="color {required:false,hash:true} form-control"  />
                                </div>
                                <label class="col-sm-2 control-label" for="input-product_cartbghover"><?php echo $text_backgroundhover; ?></label>
                               <div class="col-sm-2">
                                    <input type="text" name="moupanel_product_cartbghover" value="<?php echo $moupanel_product_cartbghover; ?>"  id="input-product_cartbghover" size="6" class="color {required:false,hash:true} form-control"  />
                                </div>
                            </div>
                    </div>
                    <div class="form-group">
                            <div class="row">
                                <label class="col-sm-2 control-label" for="input-product_cartcolor"><?php echo $text_color; ?></label>
                               <div class="col-sm-2">
                                    <input type="text" name="moupanel_product_cartcolor" value="<?php echo $moupanel_product_cartcolor; ?>"  id="input-product_cartcolor" size="6" class="color {required:false,hash:true} form-control"  />
                                </div>
                                <label class="col-sm-2 control-label" for="input-product_cartcolorhover"><?php echo $text_hover; ?></label>
                               <div class="col-sm-2">
                                    <input type="text" name="moupanel_product_cartcolorhover" value="<?php echo $moupanel_product_cartcolorhover; ?>"  id="input-product_cartcolorhover" size="6" class="color {required:false,hash:true} form-control"  />
                                </div>
                            </div>
                    </div>
                    <legend><span data-toggle="tooltip"  title=""><?php echo $text_wishlist; ?></span></legend>
                    <div class="form-group">
                            <div class="row">
                                <label class="col-sm-2 control-label" for="input-product_wishlistborder"><span data-toggle="tooltip" title="<?php echo $help_topborderline; ?>"><?php echo $text_border_left; ?></span></label>
                               <div class="col-sm-2">
                                    <input type="text" name="moupanel_product_wishlistborder" value="<?php echo $moupanel_product_wishlistborder; ?>" placeholder="<?php echo $text_topborderline; ?>"  id="input-product_wishlistborder" size="6" class="form-control"  />
                                </div>
                                <label class="col-sm-2 control-label" for="input-product_wishlistbordercolor"><?php echo $text_bordercolor; ?></label>
                               <div class="col-sm-2">
                                    <input type="text" name="moupanel_product_wishlistbordercolor" value="<?php echo $moupanel_product_wishlistbordercolor; ?>"  id="input-product_wishlistbordercolor" size="6" class="color {required:false,hash:true} form-control"  />
                                </div>
                            </div>
                    </div>
                    <div class="form-group">
                            <div class="row">
                                <label class="col-sm-2 control-label" for="input-product_wishlistbg"><?php echo $text_background; ?></label>
                               <div class="col-sm-2">
                                    <input type="text" name="moupanel_product_wishlistbg" value="<?php echo $moupanel_product_wishlistbg; ?>"  id="input-product_wishlistbg" size="6" class="color {required:false,hash:true} form-control"  />
                                </div>
                                <label class="col-sm-2 control-label" for="input-product_wishlistbghover"><?php echo $text_backgroundhover; ?></label>
                               <div class="col-sm-2">
                                    <input type="text" name="moupanel_product_wishlistbghover" value="<?php echo $moupanel_product_wishlistbghover; ?>"  id="input-product_wishlistbghover" size="6" class="color {required:false,hash:true} form-control"  />
                                </div>
                            </div>
                    </div>
                    <div class="form-group">
                            <div class="row">
                                <label class="col-sm-2 control-label" for="input-product_wishlistcolor"><?php echo $text_color; ?></label>
                               <div class="col-sm-2">
                                    <input type="text" name="moupanel_product_wishlistcolor" value="<?php echo $moupanel_product_wishlistcolor; ?>"  id="input-product_wishlistcolor" size="6" class="color {required:false,hash:true} form-control"  />
                                </div>
                                <label class="col-sm-2 control-label" for="input-product_cartcolorhover"><?php echo $text_hover; ?></label>
                               <div class="col-sm-2">
                                    <input type="text" name="moupanel_product_wishlistcolorhover" value="<?php echo $moupanel_product_wishlistcolorhover; ?>"  id="input-product_wishlistcolorhover" size="6" class="color {required:false,hash:true} form-control"  />
                                </div>
                            </div>
                    </div>
                    </div>
                <div class="tab-pane" id="tab-footer">
                         <div class="form-group">
                            <div class="row">
                                <label class="col-sm-2 control-label" for="input-footer_border"><span data-toggle="tooltip" title="<?php echo $help_topborderline; ?>"><?php echo $text_topborderline; ?></span></label>
                                <div class="col-sm-2">
                                    <input type="text" name="moupanel_footer_border" value="<?php echo $moupanel_footer_border; ?>" placeholder="<?php echo $text_topborderline; ?>"  id="input-footer_border" size="6" class="form-control"  />
                                </div>
                                <label class="col-sm-2 control-label"><?php echo $text_topcolorline; ?></label>
                                <div class="col-sm-2">
                                    <input type="text" name="moupanel_footer_bordercolor" value="<?php echo $moupanel_footer_bordercolor; ?>"  id="input-footer_bordercolor" size="6" class="color {required:false,hash:true} form-control"  />
                                </div>
                            </div>
                            </div>
                            <div class="form-group">
                            <div class="row">
                                <label class="col-sm-2 control-label" for="input-footer_bg"><?php echo $text_background; ?></label>
                                <div class="col-sm-2">
                                    <input type="text" name="moupanel_footer_bg" value="<?php echo $moupanel_footer_bg; ?>"  id="input-footer_bg" size="6" class="color {required:false,hash:true} form-control"  />
                                </div>
                                <label class="col-sm-2 control-label"><?php echo $text_color; ?></label>
                                <div class="col-sm-2">
                                    <input type="text" name="moupanel_footer_textcolor" value="<?php echo $moupanel_footer_textcolor; ?>"  id="input-footer_textcolor" size="6" class="color {required:false,hash:true} form-control"  />
                                </div>
                            </div>
                            </div>
                            <div class="form-group">
                            <div class="row">
                                <label class="col-sm-2 control-label"><?php echo $text_titlecolor; ?></label>
                                <div class="col-sm-2">
                                    <input type="text" name="moupanel_footer_titlecolor" value="<?php echo $moupanel_footer_titlecolor; ?>"  id="input-footer_titlecolor" size="6" class="color {required:false,hash:true} form-control"  />
                                </div>
                                <label class="col-sm-2 control-label" for="input-footer_linkcolor"><?php echo $text_linkcolor; ?></label>
                                <div class="col-sm-2">
                                    <input type="text" name="moupanel_footer_linkcolor" value="<?php echo $moupanel_footer_linkcolor; ?>"  id="input-footer_linkcolor" size="6" class="color {required:false,hash:true} form-control"  />
                                </div>
                                <label class="col-sm-2 control-label"><?php echo $text_linkhover; ?></label>
                                <div class="col-sm-2">
                                    <input type="text" name="moupanel_footer_linkhover" value="<?php echo $moupanel_footer_linkhover; ?>"  id="input-footer_linkhover" size="6" class="color {required:false,hash:true} form-control"  />
                                </div>
                            </div>
                            </div>
                           </div>









                   </div>
                </div>
              </div>
            </div>

            <div class="tab-pane" id="tab-custom-css">
              <div class="row">
                <div class="col-sm-2">
                    <ul class="nav nav-pills nav-stacked" id="tab-custom-css">
                        <li class="active"><a href="#tab-custom-css-final" data-toggle="tab"><?php echo $text_custom_css; ?></a></li>
                        <li><a href="#tab-custom-javascript" data-toggle="tab"><?php echo $text_custom_javascript; ?></a></li>
                        <li><a href="#tab-custom-code-final" data-toggle="tab"><?php echo $text_custom_code; ?></a></li>
                    </ul>
                </div>
                <div class="col-sm-10">
                    <div class="tab-content">
                      <div class="tab-pane active" id="tab-custom-css-final">
	                    <div class="form-group">
                            <div class="row">
                            <label class="col-sm-2 control-label"><?php echo $entry_status;?></label>
                                <div class="col-sm-10">
                                    <select name="moupanel_custom_css" id="input-moupanel_custom_css" class="form-control">
                                    <?php if ($moupanel_custom_css) { ?>
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
                      <div class="form-group">
                        <div class="row">
                            <label class="col-sm-2 control-label"><span data-toggle="tooltip" title="<?php echo $text_help_css; ?>"><?php echo $text_content_css;?></span></label>
                            <div class="col-sm-10">
                                <textarea class="form-control" style="height:250px" name="moupanel_custom_css_content"><?php echo $moupanel_custom_css_content?></textarea>
                            </div>
                        </div>
                      </div>
                    </div>
                    <div  class="tab-pane" id="tab-custom-javascript">
                        <div class="form-group">
                            <div class="row">
                            <label class="col-sm-2 control-label"><?php echo $entry_status;?></label>
                              <div class="col-sm-10">
                                <select name="moupanel_custom_javascript" id="input-moupanel_custom_javascript" class="form-control">
                                <?php if ($moupanel_custom_javascript) { ?>
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
                        <div class="form-group">
                            <div class="row">
                            <label class="col-sm-2 control-label"><span data-toggle="tooltip" title="<?php echo $text_help_javascript; ?>"><?php echo $text_content_javascript;?></span></label>
                                <div class="col-sm-10">
                                	 <textarea class="form-control" style="height:250px" name="moupanel_custom_javascript_content"><?php echo $moupanel_custom_javascript_content?></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                      <div class="tab-pane" id="tab-custom-code-final">
	                    <div class="form-group">
                            <div class="row">
                            <label class="col-sm-2 control-label"><?php echo $entry_status;?></label>
                                <div class="col-sm-10">
                                    <select name="moupanel_custom_code" id="input-moupanel_custom_code" class="form-control">
                                    <?php if ($moupanel_custom_code) { ?>
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
                      <div class="form-group">
                        <div class="row">
                            <label class="col-sm-2 control-label"><span data-toggle="tooltip" title="<?php echo $text_help_code; ?>"><?php echo $text_content_code;?></span></label>
                            <div class="col-sm-10">
                                <textarea class="form-control" style="height:250px" name="moupanel_custom_code_content"><?php echo $moupanel_custom_code_content?></textarea>
                            </div>
                        </div>
                      </div>
                    </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </form>
    </div>
   </div>
 </div>
 <script type="text/javascript" src="view/javascript/jscolor/jscolor.js"></script>
 </div>
<?php echo $footer; ?>


