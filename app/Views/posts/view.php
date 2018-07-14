<div class="row">
    <div class="col-md-12">
        <h3><?php __($data['title']);?></h3>
        <img src="<?php __url('image/'.$data['image']);?>" class="img-fluid img-thumbnail" alt="image"/>
	    <br/>
	    <br/>

        <?php echo $data['description'];?>
    </div>
</div>
