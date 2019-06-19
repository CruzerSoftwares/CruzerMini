<div class="page-header">
	<div class="container">
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="<?php __url('');?>" target="_self">Home</a></li>
			<li class="breadcrumb-item active"><?php __($data->title);?></li>
		</ol>
	</div>
</div>

<?php if($data->layout==1){//raw html
 		__($data->description,false);
 } elseif($data->layout==2){//left sidebar?>
<div class="page-content1 no-margin-bottom">
	<section>
		<div class="container">
			<div class="row">
				<div class="col-md-3"> 
					<h2 class="heading">Write to Us</h2>
					<?php __flashSession(false);?>
					<?php __form(APP_URL.'writetous', ['class' => 'form-horizontal form-minimal', 'target' => '_self']);?>
						<div class="row">
							<div class="col-sm-12">
								<div class="form-group">
									<label for="contact-name" class="control-label sr-only">Name</label>
									<input type="text" class="form-control" name="name" id="contact-name" placeholder="Name" required="required">
								</div>
							</div>
						</div>
						<div class="row">	
							<div class="col-sm-12">
								<div class="form-group">
									<label for="contact-email" class="control-label sr-only">Email</label>
									<input type="email" class="form-control" name="email" id="contact-email" placeholder="Email" required="required">
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="contact-subject" class="control-label sr-only">Subject</label>
							<div class="col-sm-12">
								<input type="text" class="form-control" name="subject" id="contact-subject" placeholder="Subject">
							</div>
						</div>
						<div class="form-group">
							<label for="contact-message" class="control-label sr-only">Message</label>
							<div class="col-sm-12">
								<textarea class="form-control" id="contact-message" name="message" rows="5" cols="30" placeholder="Message" required="required"></textarea>
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-12">
								<button type="submit" class="btn btn-primary">Submit Message</button>
							</div>
						</div>
					</form>
				</div>
				<div class="col-md-9">
					<?php echo $data->description;?>
				</div>
			</div>
		</div>
	</section>
</div>
	
<?php } elseif($data->layout==3){//right sidebar?>
<div class="page-content1 no-margin-bottom">
	<section>
		<div class="container">
			<div class="row">
				<div class="col-md-9">
					<?php echo $data->description;?>
				</div>
				<div class="col-md-3"> 
					<h2 class="heading">Write to Us</h2>
					<?php __flashSession(false);?>
					<?php __form(APP_URL.'writetous', ['class' => 'form-horizontal form-minimal', 'target' => '_self']);?>
						<div class="row">
							<div class="col-sm-12">
								<div class="form-group">
									<label for="contact-name" class="control-label sr-only">Name</label>
									<input type="text" class="form-control" name="name" id="contact-name" placeholder="Name" required="required">
								</div>
							</div>
						</div>
						<div class="row">	
							<div class="col-sm-12">
								<div class="form-group">
									<label for="contact-email" class="control-label sr-only">Email</label>
									<input type="email" class="form-control" name="email" id="contact-email" placeholder="Email" required="required">
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="contact-subject" class="control-label sr-only">Subject</label>
							<div class="col-sm-12">
								<input type="text" class="form-control" name="subject" id="contact-subject" placeholder="Subject">
							</div>
						</div>
						<div class="form-group">
							<label for="contact-message" class="control-label sr-only">Message</label>
							<div class="col-sm-12">
								<textarea class="form-control" id="contact-message" name="message" rows="5" cols="30" placeholder="Message" required="required"></textarea>
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-12">
								<button type="submit" class="btn btn-primary">Submit Message</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</section>
</div>	

<?php } else{//full page?>	
<div class="page-content1 no-margin-bottom">
	<section>
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<?php __($data->description,false);?>
				</div>
			</div>
		</div>
	</section>
</div>
<?php }?>
