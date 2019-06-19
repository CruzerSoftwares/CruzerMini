<div class="row">
    <div class="col-md-9">
        <h3><?php __($pageTitle);?></h3>
		<?php __flashSession(false);?>
		<?php __form(APP_URL.'contact-us', ['class' => 'form-horizontal', 'target' => '_self']);?>
			<div class="row">
				<div class="col-sm-6">
					<div class="form-group">
						<label for="contact-name" class="control-label sr-only">Name</label>
						<div class="col-sm-12">
						<input type="text" class="form-control" id="contact-name" name="name" placeholder="Name*" required>
					</div>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="form-group">
						<label for="contact-email" class="control-label sr-only">Email</label>
						<div class="col-sm-12">
						<input type="email" class="form-control" id="contact-email" name="email" placeholder="Email*" required>
					</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-12">
					<div class="form-group">
						<label for="contact-subject" class="control-label sr-only">Subject</label>
						<div class="col-sm-12">
							<input type="text" class="form-control" id="contact-subject" name="subject" placeholder="Subject">
						</div>
					</div>
				</div>
			</div>

			<div class="form-group">
				<label for="contact-message" class="control-label sr-only">Message</label>
				<div class="col-sm-12">
					<textarea class="form-control" id="contact-message" name="message" rows="5" cols="30" placeholder="Message*" required></textarea>
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-12">
					<button id="submit-button" type="submit" class="btn btn-primary"><i class="fa loading-icon"></i> <span>Submit Message</span></button>
				</div>
			</div>
			<input type="hidden" name="msg-submitted" id="msg-submitted" value="true">
		</form>
	</div>
	<div class="col-md-3">
		<div class="sidebar">
			<div class="widget">
				<?php __($data->description, false);?>
			</div>
		</div>
	</div>
</div>