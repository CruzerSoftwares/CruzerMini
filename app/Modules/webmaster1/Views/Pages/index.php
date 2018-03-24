<?php 
$breadcrumbs = array( 'pages' => 'Pages', '' => 'List');
$page_header_title = 'Pages';
?>
<div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Available Pages</h3>
              <?php __flashSession();?>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <div class="btn-group">
                  <button type="button" class="btn btn-box-tool dropdown-toggle" data-toggle="dropdown">
                    <i class="fa fa-wrench"></i></button>
                  <ul class="dropdown-menu" role="menu">
                    <li><?php __a('Add New Page',ADMIN_URL.'pages/add')?></li>
                    <li class="divider"></li>
                    <li><?php __a('Dashboard',ADMIN_URL)?></li>
                  </ul>
                </div>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="row">
                <div class="col-md-12">
                  
                  <table id="datatables2" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                      <th>PageID</th>
                      <th>Title</th>
                      <th>SEO URL</th>
                      <th>Status</th>
                      <th>Created At</th>
                      <th>Last Modified</th>
                      <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php if( isset( $pages ) && count($pages)){
                        foreach( $pages as $page ){ ?>
                        <tr>
                          <td><?php __( $page['id']);?></td>
                          <td><?php __( $page['title']);?></td>
                          <td><?php __( $page['alias']);?></td>
                          <td><?php __status( $page['status']);?></td>
                          <td><?php __date( $page['created_at'] );?></td>
                          <td><?php __date( $page['updated_at'] );?></td>
                          <td>
                            <?php __a('<i class="fa fa-edit"></i>',ADMIN_URL.'pages/update/'.$page['id'],['class'=>'btn btn-primary']);?>
                            <?php __a('<i class="fa fa-eye"></i>',ADMIN_URL.'pages/view/'.$page['id'],['class'=>'btn btn-success']);?>
                            <button type="button" data-id="<?php __($page['id'])?>" data-deletefor="pages" class="btn btn-danger del_item"><i class="fa fa-trash"></i></button>
                          </td>
                        </tr>
                    <?php }
                    } ?>
                    </tbody>
                    <tfoot>
                    <tr>
                      <th>PageID</th>
                      <th>Title</th>
                      <th>SEO URL</th>
                      <th>Status</th>
                      <th>Created At</th>
                      <th>Last Modified</th>
                      <th></th>
                    </tr>
                    </tfoot>
                  </table>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
            </div>
