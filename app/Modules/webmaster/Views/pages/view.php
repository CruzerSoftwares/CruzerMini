<div class="row">
    <div class="col s12">
        <nav>
            <div class="nav-wrapper red lighten-2">
                <div class="col s9">
                    <a href="<?php __url(MODULE_ALIAS);?>" class="breadcrumb" target="_self"><i class="material-icons">home</i> Dashboard</a>
                    <a href="<?php __url(MODULE_ALIAS.'/pages');?>" class="breadcrumb" target="_Self">Pages</a>
                    <a class="breadcrumb" target="_Self">View</a>
                </div>
                
                <div class="col s3 nobreadcrumbs ">
                    <div class="right">
                        <a href="<?php __url(MODULE_ALIAS.'/pages');?>" class="blue btn-floating pulse" target="_self"><i class="material-icons small-icons">list</i></a>
                        <a href="<?php __url(MODULE_ALIAS.'/pages/add');?>" class="blue btn-floating pulse" target="_self"><i class="material-icons small-icons">add</i></a>
                        <a href="<?php __url(MODULE_ALIAS.'/pages/edit/'.$data['id']);?>" class="blue btn-floating pulse" target="_self"><i class="material-icons small-icons">edit</i></a>
                        <!-- <a href="<?php __url(MODULE_ALIAS.'/pages/delete/'.$data['id']);?>" class="blue btn-floating pulse" target="_self"><i class="material-icons small-icons">delete</i></a> -->
                        <a href="<?php __url(MODULE_ALIAS.'/pages/view/'.$data['id']);?>" class="blue btn-floating pulse" target="_self"><i class="material-icons small-icons">refresh</i></a>
                    </div>
                </div>
            </div>
        </nav>

<?php __flashSession();?>
        <div class="card-panel">
            <table class="bordered responsive-table ">
                <tbody>
                      <tr>
                          <th>Title</th>
                          <td><?php __($data['title']);?></td>
                      </tr>
                     <tr>
                          <th>Alias</th>
                          <td><?php __($data['alias']);?></td>
                      </tr>
                     <tr>
                          <th style="vertical-align: top">Description</th>
                          <td><?php __($data['description'],false);?></td>
                      </tr>
                     <tr>
                          <th>Status</th>
                          <td><?php __($data['status']==1 ? 'Active' : 'Inactive');?></td>
                      </tr>
                     <tr>
                          <th>Layout</th>
                          <td><?php if($data['layout']==1) echo 'HTML';
                                    elseif($data['layout']==2) echo 'Left Sidebar';
                                    elseif($data['layout']==3) echo 'Right Sidebar';
                                    elseif($data['layout']==4) echo 'Full Page';
                                    ?></td>
                      </tr>
                     <tr>
                          <th>Meta Description</th>
                          <td><?php __($data['meta_description']);?></td>
                      </tr>
                     <tr>
                          <th>Meta Keywords</th>
                          <td><?php __($data['meta_keywords']);?></td>
                      </tr>
                     <tr>
                          <th>Image</th>
                          <td><?php __($data['image']);?></td>
                      </tr>
                     <tr>
                          <th>Created On</th>
                          <td><?php __date($data['created']);?></td>
                      </tr>
                     
                  </tbody>
            </table>
        </div>
    </div>
</div>
