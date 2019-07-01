<div class="row">
    <div class="col-md-12">
        <h3><?php __($result->title);?></h3>
        <img src="<?php __url('image/'.$result->image);?>" class="img-fluid img-thumbnail" alt="image"/>
	    <br/>
	    <br/>

        <?php echo $result->description;?>
    </div>
</div>
