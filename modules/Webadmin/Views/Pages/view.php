<?php 

$breadcrumbs = array( 'pages' => 'Pages', '' => 'View Details');
$page_header_title = 'Page';
?>
      <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">View Details</h3>
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
                  <li><?php __a('Update Page',ADMIN_URL.'pages/update/'.$item['id'])?></li>
                  <li class="divider"></li>
                  <li><?php __a('Dashboard',ADMIN_URL)?></li>
                </ul>
              </div>
              <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <table class="table table-bordered">
              <tbody>
                <tr>
                  <th>PageID</th>
                  <td><?php __($item['id']);?></td>
                </tr>
                <tr>
                  <th>Title</th>
                  <td><?php __($item['title']);?></td>
                </tr>
                <tr>
                  <th>SEO URL</th>
                  <td><?php __($item['alias']);?></td>
                </tr>
                <tr>
                  <th>Image</th>
                  <td><?php if( isset($images) && count($images)) {
                        foreach ($images as $doc) {
                         __a($doc['title'],UPLOAD_URL.'pages/images/'.urlencode($doc['upload']),['target' => '_blank']);
                        __a('&nbsp;&nbsp;&nbsp;<i class="fa fa-trash"></i>',ADMIN_URL.'uploads/remove',['class'=>'remove_attachment','data-id'=>$doc['id']]);
                        __br();
                        }
                      }?></td>
                </tr>
                 <tr>
                  <th>Banner</th>
                  <td><?php if( isset($banners) && count($banners)) {
                        foreach ($banners as $doc) {
                         __a($doc['title'],UPLOAD_URL.'pages/banners/'.urlencode($doc['upload']),['target' => '_blank']);
                        __a('&nbsp;&nbsp;&nbsp;<i class="fa fa-trash"></i>',ADMIN_URL.'uploads/remove',['class'=>'remove_attachment','data-id'=>$doc['id']]);
                        __br();
                        }
                      }?></td>
                </tr>
                <tr>
                  <th>Page Content</th>
                  <td><?php echo $item['description'];?></td>
                </tr>
                <tr>
                  <th>Meta Title</th>
                  <td><?php __($item['meta_title']);?></td>
                </tr>
                <tr>
                  <th>Meta Description</th>
                  <td><?php __($item['meta_description']);?></td>
                </tr>
                <tr>
                  <th>Meta Keywords</th>
                  <td><?php __($item['meta_keywords']);?></td>
                </tr>
                
                <tr>
                  <th>Status</th>
                  <td><?php __status($item['status']);?></td>
                </tr>
                <tr>
                  <th>Robots</th>
                  <td><?php __($item['robots']);?></td>
                </tr>
                <tr>
                  <th>Created At</th>
                  <td><?php __date($item['created_at']);?></td>
                </tr>
                <tr>
                  <th>Updated At</th>
                  <td><?php __date($item['updated_at']);?></td>
                </tr>
                
              </tbody>
          </table>
          <!-- /.row -->
        </div>
        <div class="box-footer">
          <button type="button" class="btn btn-default" onclick="javascript:history.back()">Back</button>
        </div>
        <!-- /.box-body -->
        
      </div>
      <!-- /.box -->
      <!-- /.row -->

    