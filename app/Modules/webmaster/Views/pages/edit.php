<div class="row">
    <div class="col s12">
        <nav>
            <div class="nav-wrapper red lighten-2">
                <div class="col s9">
                    <a href="<?php __url(MODULE_ALIAS);?>" class="breadcrumb" target="_self"><i class="material-icons">home</i> Dashboard</a>
                    <a href="<?php __url(MODULE_ALIAS.'/pages');?>" class="breadcrumb" target="_Self">Pages</a>
                    <a class="breadcrumb" target="_Self">Edit</a>
                </div>
                
                <div class="col s3 nobreadcrumbs ">
                    <div class="right">
                    <a href="<?php __url(MODULE_ALIAS.'/pages');?>" class="blue btn-floating pulse" target="_self"><i class="material-icons small-icons">list</i></a>
                    <a href="<?php __url(MODULE_ALIAS.'/pages/add');?>" class="blue btn-floating pulse" target="_self"><i class="material-icons small-icons">add</i></a>
                    <a href="<?php __url(MODULE_ALIAS.'/pages/view/'.$result->id);?>" class="blue btn-floating pulse" target="_self"><i class="material-icons small-icons">visibility</i></a>
                    <!-- <a href="<?php __url(MODULE_ALIAS.'/pages/delete/'.$result->id);?>" class="blue btn-floating pulse" target="_self"><i class="material-icons small-icons">delete</i></a> -->
                    <a href="<?php __url(MODULE_ALIAS.'/pages/edit/'.$result->id);?>" class="blue btn-floating pulse" target="_self"><i class="material-icons small-icons">refresh</i></a>
                    </div>
                </div>
            </div>
        </nav>

<?php __flashSession();?>

<div class="card-panel">
  <div class="row">
    <?php __form(MODULE_ALIAS.'/pages/edit/'.$result->id, ['class' => 'col s12', 'target' => '_self', 'upload' => true]);?>
    
        <input type="hidden" name="id" value="<?php __($result->id);?>">
        <div class="row">
            <div class="input-field col s12">
                <input id="title" type="text" name="title" class="validate" value="<?php __($result->title);?>">
                <label for="title">Title</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
                <input id="alias" type="text" name="alias" class="validate" value="<?php __($result->alias);?>">
                <label for="alias">Search Engine Friendly URL</label>
            </div>
        </div>

        <div class="row">
           <div class="file-field input-field col s9">
                <div class="waves-effect waves-light btn blue iframe-btn" href="filemanager/dialog.php?type=1&field_id=image1">
                    <span>SELECT IMAGE <i class="material-icons right">image</i></span>
                </div>
                <div class="file-path-wrapper">
                    <input id="image1" type="text" name="image" class="file-path validate" value="<?php __($result->image);?>">
                </div>
            </div>
            <div class="input-field col s3">
                <?php if(isset($result->image)){?>
                  <img class="materialboxed responsive-img" data-caption="A picture" alt="image" src="<?php __($result->image);?>">
              <?php }?>
            </div>
        </div>
      
        <div class="row">
            <div class="input-field col s12">
                <label for="description">Page Content</label>
                <br/>
               <textarea name="description" class="html-editor"><?php __($result->description,false);?></textarea>
            </div>
        </div>
      
        <div class="row">
            <div class="col s6">
                <label for="description">Status</label>
                <p>
                    <input class="with-gap blue-text" name="status" type="radio" id="test3" value="1" <?php if($result->status==1) __('checked');?> />
                    <label for="test3">Active</label>
                </p>
                <p>
                    <input class="with-gap" name="status" type="radio" id="test4" value="0" <?php if($result->status==0) __('checked');?> />
                    <label for="test4">Inactive</label>
                </p>
            </div>
            <div class="input-field col s6">
               <select name="layout">
                  <option value="" disabled selected>Choose your option</option>
                  <option value="1" <?php if($result->layout==1) __('selected');?>>HTML</option>
                  <option value="2" <?php if($result->layout==2) __('selected');?>>Left Sidebar</option>
                  <option value="3" <?php if($result->layout==3) __('selected');?>>Right Sidebar</option>
                  <option value="4" <?php if($result->layout==4) __('selected');?>>Full Page</option>
                </select>
                <label>Layout</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
               <textarea id="meta_description" name="meta_description" class="materialize-textarea"><?php __($result->meta_description);?></textarea>
                <label for="meta_description">Meta Description</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
               <textarea id="meta_keywords" name="meta_keywords" class="materialize-textarea"><?php __($result->meta_keywords);?></textarea>
                <label for="meta_keywords">Meta Keywords</label>
            </div>
        </div>
      <div class="row">
            <div class="input-field col s12">
               <button class="btn waves-effect waves-light blue" type="submit" name="submit" value="update">SAVE
                <i class="material-icons right">send</i>
              </button>
              <button class="btn waves-effect waves-light red" type="submit" name="submit" value="updateContinue">SAVE & CONTINUE
                <i class="material-icons right">send</i>
              </button>
            </div>
        </div>
      
    </form>
  </div>
        
        </div>
    </div>
</div>
