<div class="row">
    <div class="col s12">
	    <nav>
	        <div class="nav-wrapper red lighten-2">
	            <div class="col s9">
	                <a href="<?php __url(MODULE_ALIAS);?>" class="breadcrumb" target="_self"><i class="material-icons">home</i> Dashboard</a>
	            </div>
	            
	            <div class="col s3 nobreadcrumbs">
	                <div class="right">
	                <a href="<?php __url(MODULE_ALIAS);?>" class="blue btn-floating pulse" target="_self"><i class="material-icons small-icons">refresh</i></a>
	                </div>
	            </div>

	        </div>
	    </nav>
    
    <div class="card-panel">
    	<p class="flow-text">Welcome <em><?php __getAuthSession('first_name');?></em> to the Dashboard.</p>
    </div>
</div>
</div>