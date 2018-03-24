<?php 
$breadcrumbs = array( 'pages' => 'Pages', '' => 'Add');
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
                  <li class="divider"></li>
                  <li><?php __a('Dashboard',ADMIN_URL)?></li>
                </ul>
              </div>
              <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
        </div>
        <!-- /.box-header -->
        <?php __form('',['upload'=>true,'class' => 'form-horizontal']);?>
        <div class="box-body">

          <div class="form-group">
            <label for="title" class="col-sm-3 control-label">Title <span class="text-red">*</span></label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="title" placeholder="Title" name="title" required="required">
            </div>
          </div>

          <div class="form-group">
            <label for="alias" class="col-sm-3 control-label">SEO Freindly URL</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="alias" placeholder="SEO Freindly URL" name="alias">
            </div>
          </div>
          
          <div class="form-group">
            <label for="image" class="col-sm-3 control-label">Image</label>
            <div class="col-sm-9">
              <input type="file" id="image" placeholder="Image" name="image[]"/>
            </div>
          </div>

          <div class="form-group">
            <label for="banner" class="col-sm-3 control-label">Banner</label>
            <div class="col-sm-9">
              <input type="file" id="banner" placeholder="Banner" name="banner[]"/>
            </div>
          </div>

         <div class="form-group">
            <label for="description" class="col-sm-3 control-label">Page Content </label>
            <div class="col-sm-9">
              <textarea class="form-control html-editor" id="description" placeholder="Page Content" name="description"></textarea>
            </div>
          </div>

          
         <div class="form-group">
            <label for="meta_title" class="col-sm-3 control-label">Meta Title</label>
            <div class="col-sm-9">
              <textarea class="form-control" id="meta_title" placeholder="Meta Title" name="meta_title"></textarea>
            </div>
          </div>

          <div class="form-group">
            <label for="meta_description" class="col-sm-3 control-label">Meta Description</label>
            <div class="col-sm-9">
              <textarea class="form-control" id="meta_description" placeholder="Meta Description" name="meta_description"></textarea>
            </div>
          </div>

          <div class="form-group">
            <label for="meta_keywords" class="col-sm-3 control-label">Meta Keywords</label>
            <div class="col-sm-9">
              <textarea class="form-control" id="meta_keywords" placeholder="Meta Keywords" name="meta_keywords"></textarea>
            </div>
          </div>

          <div class="form-group">
            <label for="status" class="col-sm-3 control-label">Status <span class="text-red">*</span></label>
            <div class="col-sm-9">
              <select class="form-control select2" name="status" required="required">
                    <option value="">Select Status</option>
                    <option value="1">Active</option>
                    <option value="0">Inactive</option>
                </select>
            </div>
          </div>

        <div class="form-group">
            <label for="robots" class="col-sm-3 control-label">Robots <span class="text-red">*</span></label>
            <div class="col-sm-9">
              <select class="form-control select2" name="robots" required="required">
                    <option value="">Select Robots</option>
                    <option value="follow">Follow</option>
                    <option value="nofollow">No Follow</option>
                    <option value="index">Index</option>
                    <option value="noindex">No Index</option>
                    <option value="noindex, nofollow, noimageindex">No Index, No Follow</option>
                    <option value="noindex, follow">No Index, Follow</option>
                    <option value="index, nofollow">Index, No Follow</option>
                    <option value="index, follow">Index, Follow</option>
                </select>
            </div>
          </div>


        </div>

        <div class="box-footer">
          <button type="button" class="btn btn-default" onclick="javascript:history.back()">Cancel</button>
          <button type="submit" name="submit" value="add" class="btn btn-info pull-right">Submit</button>
        </div>
        </form>
        <!-- /.box-body -->
        
      </div>
    