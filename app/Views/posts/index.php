<h3 class="pb-3 mb-4 font-italic border-bottom"> Latest Posts </h3> 

<?php foreach($results->data as $post){?>
	<div class="blog-post">
	    <h2 class="blog-post-title"><?php __($post->title);?></h2>
	    <p class="blog-post-meta"><?php __($post->created);?> <a href="#">CruzerMini</a></p>

	    <img src="<?php __url('image/'.$post->image);?>" class="img-fluid img-thumbnail" alt="image"/>
	    <br/>
	    <br/>
	    <p><?php echo nl2br(substr(strip_tags($post->description),0,200));?></p>
	    <a class="btn btn-outline-primary" href="<?php __url('blog/'.$post->alias);?>" target="_self">Read More..</a>
	 </div>
<?php }?>