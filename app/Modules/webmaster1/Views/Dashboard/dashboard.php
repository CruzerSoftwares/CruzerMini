<?php $page_header_title = 'Dashboard';?>
      <div class="row">
        <div class="col-md-12">  
          <?php __flashSession();?>
        <?php if( isset( $enquiries) && count($enquiries) ){?>          
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Latest Enquiries</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">
              <div class="table-responsive">
                <table class="table no-margin">
                  <thead>
                  <tr>
                    <th>Service</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Message</th>
                    <th>Date</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php foreach($enquiries as $enquirie){?>
                  <tr>
                    <td><?php __($enquirie['title']);?></td>
                    <td><?php __($enquirie['name']);?></td>
                    <td><?php __($enquirie['email']);?></td>
                    <td><?php __(substr($enquirie['message'],0,200));?></td>
                    <td> <?php __date($enquirie['created_at']);?></td>
                  </tr>
                  <?php }?>
                  </tbody>
                </table>
              </div>
            </div>
            <div class="box-footer clearfix">
              <?php //__a('View All',ADMIN_URL.'shipments',[ 'class' => 'btn btn-sm btn-success btn-flat pull-right']);?>
            </div>
          </div>
          <?php }?>
        </div>

        
        <!-- /.col -->
      </div>
      <!-- /.row -->
    