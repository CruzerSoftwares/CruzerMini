<?php 

$breadcrumbs = array( 'pages' => 'Pages', '' => 'Update');
$page_header_title = 'Page';
?>
      <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">Fields marked with <span class="text-red">*</span> are required fields</h3>
          <?php __flashSession();?>
          <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
              </button>
              <div class="btn-group">
                <button type="button" class="btn btn-box-tool dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-wrench"></i></button>
                <ul class="dropdown-menu" role="menu">
                  <li><?php __a('All Pages',ADMIN_URL.'pages')?></li>
                  <li><?php __a('Add Page',ADMIN_URL.'pages/add')?></li>
                  <li><?php __a('View Details',ADMIN_URL.'pages/view/'.$item['id'])?></li>
                  <li class="divider"></li>
                  <li><?php __a('Dashboard',ADMIN_URL)?></li>
                </ul>
              </div>
              <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
        </div>
        <!-- /.box-header -->
         <?php __form('',['upload'=>true,'class' => 'form-horizontal']);?>
        <input type="hidden" name="id" value="<?php __($item['id']);?>">
        <div class="box-body">

          <div class="form-group">
            <label for="title" class="col-sm-3 control-label">Title <span class="text-red">*</span></label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="title" placeholder="Title" name="title" required="required" value="<?php __($item['title']);?>">
            </div>
          </div>

          <div class="form-group">
            <label for="alias" class="col-sm-3 control-label">SEO Freindly URL</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="alias" placeholder="SEO Freindly URL" name="alias" value="<?php __($item['alias']);?>">
            </div>
          </div>
          
          <div class="form-group">
            <label for="image" class="col-sm-3 control-label">Image</label>
            <div class="col-sm-9">
              <input type="file" id="image" placeholder="Image" name="image[]" multiple="multiple" />
              <p class="help-block">You can select multiple Images</p>
              <?php if( isset($images) && count($images)) {
                  foreach ($images as $doc) {
                   __a($doc['title'],UPLOAD_URL.'pages/images/'.urlencode($doc['upload']),['target' => '_blank']); __a('&nbsp;&nbsp;&nbsp;<i class="fa fa-trash"></i>',ADMIN_URL.'uploads/remove',['class'=>'remove_attachment','data-id'=>$doc['id']]);__br();
                  }
                }?>
            </div>
          </div>

          <div class="form-group">
            <label for="banner" class="col-sm-3 control-label">Banner</label>
            <div class="col-sm-9">
              <input type="file" id="banner" placeholder="Banner" name="banner[]"  multiple="multiple" />
              <p class="help-block">You can select multiple Banners</p>
              <?php if( isset($banners) && count($banners)) {
                  foreach ($banners as $doc) {
                   __a($doc['title'],UPLOAD_URL.'pages/images/'.$doc['upload'],['target' => '_blank']); __a('&nbsp;&nbsp;&nbsp;<i class="fa fa-trash"></i>',ADMIN_URL.'uploads/remove',['class'=>'remove_attachment','data-id'=>$doc['id']]);__br();
                  }
                }?>
            </div>
          </div>

         <div class="form-group">
            <label for="description" class="col-sm-3 control-label">Page Content </label>
            <div class="col-sm-9">
              <textarea class="form-control html-editor" id="description" placeholder="Page Content" name="description"><?php echo $item['description'];?></textarea>
            </div>
          </div>

          
         <div class="form-group">
            <label for="meta_title" class="col-sm-3 control-label">Meta Title</label>
            <div class="col-sm-9">
              <textarea class="form-control" id="meta_title" placeholder="Meta Title" name="meta_title"><?php __($item['meta_title']);?></textarea>
            </div>
          </div>

          <div class="form-group">
            <label for="meta_description" class="col-sm-3 control-label">Meta Description</label>
            <div class="col-sm-9">
              <textarea class="form-control" id="meta_description" placeholder="Meta Description" name="meta_description"><?php __($item['meta_description']);?></textarea>
            </div>
          </div>

          <div class="form-group">
            <label for="meta_keywords" class="col-sm-3 control-label">Meta Keywords</label>
            <div class="col-sm-9">
              <textarea class="form-control" id="meta_keywords" placeholder="Meta Keywords" name="meta_keywords"><?php __($item['meta_keywords']);?></textarea>
            </div>
          </div>

          <div class="form-group">
            <label for="status" class="col-sm-3 control-label">Status <span class="text-red">*</span></label>
            <div class="col-sm-9">
              <select class="form-control select2" name="status" required="required">
                    <option value="">Select Status</option>
                    <option value="1" <?php if($item['status']==1) echo 'selected';?>>Active</option>
                    <option value="0" <?php if($item['status']==0) echo 'selected';?>>Inactive</option>
                </select>
            </div>
          </div>

        <div class="form-group">
            <label for="robots" class="col-sm-3 control-label">Robots <span class="text-red">*</span></label>
            <div class="col-sm-9">
              <select class="form-control select2" name="robots" required="required">
                    <option value="">Select Robots</option>
                    <option value="follow" <?php if($item['robots']=='follow') echo 'selected';?>>Follow</option>
                    <option value="nofollow" <?php if($item['robots']=='nofollow') echo 'selected';?>>No Follow</option>
                    <option value="index" <?php if($item['robots']=='index') echo 'selected';?>>Index</option>
                    <option value="noindex" <?php if($item['robots']=='noindex') echo 'selected';?>>No Index</option>
                    <option value="noindex, nofollow, noimageindex" <?php if($item['robots']=='noindex, nofollow, noimageindex') echo 'selected';?>>No Index, No Follow</option>
                    <option value="noindex, follow" <?php if($item['robots']=='noindex, follow') echo 'selected';?>>No Index, Follow</option>
                    <option value="index, nofollow" <?php if($item['robots']=='index, nofollow') echo 'selected';?>>Index, No Follow</option>
                    <option value="index, follow" <?php if($item['robots']=='index, follow') echo 'selected';?>>Index, Follow</option>
                </select>
            </div>
          </div>


        </div>
        <div class="box-footer">
          <button type="button" class="btn btn-default" onclick="javascript:history.back()">Cancel</button>
          <button type="submit" name="submit" value="add" class="btn btn-info pull-right">Submit</button>
        </div>
        </form>
      </div>
     