<div id="form_all">
 <form action=""  method="post" id="fa_depreciation_method"  name="fa_depreciation_method"><span class="heading">Price List</span>
  <div id ="form_header">
   <div id="tabsHeader">
    <ul class="tabMain">
     <li><a href="#tabsHeader-1">Basic Info</a></li>
     <li><a href="#tabsHeader-2">Other</a></li>
     <li><a href="#tabsHeader-3">Attachments</a></li>
     <li><a href="#tabsHeader-4">Notes</a></li>
    </ul>
    <div class="tabContainer">
     <div id="tabsHeader-1" class="tabContent">
      <div class="large_shadow_box"> 
       <ul class="column header_field">
        <li><label><img src="<?php echo HOME_URL; ?>themes/images/serach.png" class="fa_depreciation_method_id select_popup clickable">
          Price List Id</label><?php echo form::number_field_drs('fa_depreciation_method_id'); ?>
         <a name="show" href="form.php?class_name=fa_depreciation_method&<?php echo "mode=$mode"; ?>" class="show document_id fa_depreciation_method_id"><img src="<?php echo HOME_URL; ?>themes/images/refresh.png"/></a> 
        </li>
        <li><label>Prices List</label><?php echo form::text_field_dm('price_list'); ?> </li>
        <li><label>Module*</label><?php echo form::select_field_from_array('module_name', fa_depreciation_method::$module_a, $$class->module_name, 'module_name', $readonly); ?></li>
        <li><label>Description</label><?php echo form::text_field_dm('description'); ?></li>
        <li><label>Currency</label><?php echo form::select_field_from_object('currency_code', option_header::currencies(), 'option_line_code', 'option_line_value', $$class->currency_code, 'currency_code', $readonly, '', '', 1); ?> </li>
       </ul>
      </div>
     </div>
     <div id="tabsHeader-2" class="tabContent">
      <div> 
       <ul class="column header_field">
        <li><label>Status</label><?php echo form::status_field_d('status'); ?></li>
        <li><label>Multi Currency</label><?php echo $f->checkBox_field('allow_mutli_currency_cb', $$class->allow_mutli_currency_cb); ?></li>
        <li><label>Conversion Type</label><?php echo $f->select_field_from_object('currency_conversion_type', gl_currency_conversion::currency_conversion_type(), 'option_line_code', 'option_line_code', $$class->currency_conversion_type, 'currency_conversion_type', '', 1, $readonly); ?></li>
       </ul>
      </div>
     </div>
     <div id="tabsHeader-3" class="tabContent">
      <div> <?php echo ino_attachement($file) ?> </div>
     </div>
     <div id="tabsHeader-4" class="tabContent">
      <div> 
       <div id="comments">
        <div id="comment_list">
         <?php echo!(empty($comments)) ? $comments : ""; ?>
        </div>
        <div id ="display_comment_form">
         <?php
         $reference_table = 'fa_depreciation_method';
         $reference_id = $$class->fa_depreciation_method_id;
         ?>
        </div>
        <div id="new_comment">
        </div>
       </div>
      </div>
     </div>
    </div>
   </div>
  </div>
 </form>
 <div id ="form_line" class="form_line"><span class="heading">Price List Lines </span>
  <div id="tabsLine">
   <ul class="tabMain">
    <li><a href="#tabsLine-1">Values</a></li>
    <li><a href="#tabsLine-2">Prices</a></li>
    <li><a href="#tabsLine-3">Restrictions</a></li>
   </ul>
   <div class="tabContainer"> 
    <form action=""  method="post" id="fa_depreciation_method_rate_line"  name="fa_depreciation_method_rate_line">
     <div id="tabsLine-1" class="tabContent">
      <table class="form_table">
       <thead> 
        <tr>
         <th>Action</th>
         <th>Line Id</th>
         <th>Type</th>
         <th>Item</th>
         <th>Description</th>
         <th>UOM</th>
         <th>Start Date</th>
         <th>End Date</th>
        </tr>
       </thead>
       <tbody class="form_data_line_tbody fa_depreciation_method_rate_values" >
        <?php
        $count = 0;
        $fa_depreciation_method_rate_object_ai = new ArrayIterator($fa_depreciation_method_rate_object);
        $fa_depreciation_method_rate_object_ai->seek($position);
        while ($fa_depreciation_method_rate_object_ai->valid()) {
         $fa_depreciation_method_rate = $fa_depreciation_method_rate_object_ai->current();
         ?>         
         <tr class="fa_depreciation_method_rate<?php echo $count ?>">
          <td>    
           <ul class="inline_action">
            <li class="add_row_img"><img  src="<?php echo HOME_URL; ?>themes/images/add.png"  alt="add new line" /></li>
            <li class="remove_row_img"><img src="<?php echo HOME_URL; ?>themes/images/remove.png" alt="remove this line" /> </li>
            <li><input type="checkbox" name="line_id_cb" value="<?php echo htmlentities($fa_depreciation_method_rate->fa_depreciation_method_rate_id); ?>"></li>           
            <li><?php echo form::hidden_field('fa_depreciation_method_id', $$class->fa_depreciation_method_id); ?></li>
           </ul>
          </td>
          <td><?php form::number_field_wid2sr('fa_depreciation_method_rate_id'); ?></td>
          <td><?php echo $f->select_field_from_array('line_type', fa_depreciation_method_rate::$line_type_a, $$class_second->line_type); ?></td>
          <td><?php
           echo $f->hidden_field('item_id_m', $$class_second->item_id_m);
           form::text_field_wid2('item_number', 'select_item_number');
           ?>
           <img src="<?php echo HOME_URL; ?>themes/images/serach.png" class="select_item_number_only select_popup"></td>
          <td><?php form::text_field_wid2('item_description'); ?></td>
          <td><?php
           echo form::select_field_from_object('uom_id', uom::find_all(), 'uom_id', 'uom_name', $$class_second->uom_id, '', '', 'uom_id');
           ?></td>
          <td><?php echo $f->date_fieldAnyDay('effective_start_date', $$class_second->effective_start_date); ?></td>
          <td><?php echo $f->date_fieldAnyDay('effective_end_date', $$class_second->effective_end_date); ?></td>
         </tr>
         <?php
         $fa_depreciation_method_rate_object_ai->next();
         if ($fa_depreciation_method_rate_object_ai->key() == $position + $per_page) {
          break;
         }
         $count = $count + 1;
        }
        ?>
       </tbody>
      </table>
     </div>
     <div id="tabsLine-2" class="tabContent">
      <table class="form_table">
       <thead> 
        <tr>
         <th>Unit Price</th>
         <th>Formula</th>
        </tr>
       </thead>
       <tbody class="form_data_line_tbody fa_depreciation_method_rate_values" >
        <?php
        $count = 0;
        $fa_depreciation_method_rate_object_ai = new ArrayIterator($fa_depreciation_method_rate_object);
        $fa_depreciation_method_rate_object_ai->seek($position);
        while ($fa_depreciation_method_rate_object_ai->valid()) {
         $fa_depreciation_method_rate = $fa_depreciation_method_rate_object_ai->current();
         ?>         
         <tr class="fa_depreciation_method_rate<?php echo $count ?>">
          <td><?php $f->text_field_wid2('unit_price'); ?></td>
          <td><?php $f->text_field_wid2('formula'); ?></td>
         </tr>
         <?php
         $fa_depreciation_method_rate_object_ai->next();
         if ($fa_depreciation_method_rate_object_ai->key() == $position + $per_page) {
          break;
         }
         $count = $count + 1;
        }
        ?>
       </tbody>
      </table>
     </div>
     <div id="tabsLine-3" class="tabContent">
      <table class="form_table">
       <thead> 
        <tr>
         <th>Inventory Org</th>
        </tr>
       </thead>
       <tbody class="form_data_line_tbody fa_depreciation_method_rate_values" >
        <?php
        $count = 0;
        $fa_depreciation_method_rate_object_ai = new ArrayIterator($fa_depreciation_method_rate_object);
        $fa_depreciation_method_rate_object_ai->seek($position);
        while ($fa_depreciation_method_rate_object_ai->valid()) {
         $fa_depreciation_method_rate = $fa_depreciation_method_rate_object_ai->current();
         ?>         
         <tr class="fa_depreciation_method_rate<?php echo $count ?>">
          <td><?php echo $f->select_field_from_object('org_id', org::find_all_inventory(), 'org_id', 'org', $$class_second->org_id, '', '', '', $readonly); ?></td>
         </tr>
         <?php
         $fa_depreciation_method_rate_object_ai->next();
         if ($fa_depreciation_method_rate_object_ai->key() == $position + $per_page) {
          break;
         }
         $count = $count + 1;
        }
        ?>
       </tbody>
      </table>
     </div>
    </form>
   </div>

  </div>
 </div> 
</div>


<div id="pagination" style="clear: both;">
 <?php echo $pagination->show_pagination(); ?>
</div>

<div id="js_data">
 <ul id="js_saving_data">
  <li class="headerClassName" data-headerClassName="fa_depreciation_method" ></li>
  <li class="lineClassName" data-lineClassName="fa_depreciation_method_rate" ></li>
  <li class="savingOnlyHeader" data-savingOnlyHeader="false" ></li>
  <li class="primary_column_id" data-primary_column_id="fa_depreciation_method_id" ></li>
  <li class="form_header_id" data-form_header_id="fa_depreciation_method" ></li>
  <li class="line_key_field" data-line_key_field="line_type" ></li>
  <li class="single_line" data-single_line="false" ></li>
  <li class="form_line_id" data-form_line_id="fa_depreciation_method_rate" ></li>
 </ul>
 <ul id="js_contextMenu_data">
  <li class="docHedaderId" data-docHedaderId="fa_depreciation_method_id" ></li>
  <li class="docLineId" data-docLineId="fa_depreciation_method_rate_id" ></li>
  <li class="btn1DivId" data-btn1DivId="fa_depreciation_method" ></li>
  <li class="btn2DivId" data-btn2DivId="form_line" ></li>
  <li class="trClass" data-docHedaderId="fa_depreciation_method_rate" ></li>
  <li class="tbodyClass" data-tbodyClass="form_data_line_tbody" ></li>
  <li class="noOfTabbs" data-noOfTabbs="3" ></li>
 </ul>
</div>