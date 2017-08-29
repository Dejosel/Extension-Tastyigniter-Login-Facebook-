<div class="row content">
	<div class="col-md-12">
		<div class="row wrap-vertical">
			<ul id="nav-tabs" class="nav nav-tabs">
				<li class="active"><a href="#general" data-toggle="tab"><?php echo lang('text_tab_general'); ?></a></li>
			</ul>
		</div>

		<form role="form" id="edit-form" class="form-horizontal" accept-charset="utf-8" method="POST" action="<?php echo current_url(); ?>">
			<div class="tab-content">
				<div id="general" class="tab-pane row wrap-all active">
					<div class="form-group">
						<label for="input-facebook_app_id" class="col-sm-3 control-label"><?php echo lang('label_facebook_app_id'); ?></label>
						<div class="col-sm-5">
							<input type="text" name="facebook_app_id" id="input-facebook_app_id" class="form-control" value="<?php echo set_value('facebook_app_id', $facebook_app_id); ?>" />
							<?php echo form_error('facebook_app_id', '<span class="text-danger">', '</span>'); ?>
						</div>
					</div>
					<div class="form-group">
						<label for="input-facebook_app_secret" class="col-sm-3 control-label"><?php echo lang('label_facebook_app_secret'); ?></label>
						<div class="col-sm-5">
							<input type="text" name="facebook_app_secret" id="input-facebook_app_secret" class="form-control" value="<?php echo set_value('facebook_app_secret', $facebook_app_secret); ?>" />
							<?php echo form_error('facebook_app_secret', '<span class="text-danger">', '</span>'); ?>
						</div>
					</div>
					<div class="form-group">
						<label for="input-facebook_login_type" class="col-sm-3 control-label"><?php echo lang('label_facebook_login_type'); ?></label>
						<div class="col-sm-5">
							<div class="btn-group btn-group-3 btn-group-toggle" data-toggle="buttons">
								<?php if ($facebook_login_type === 'js') { ?>
									<label class="btn btn-success active"><input type="radio" name="facebook_login_type" value="js" <?php echo set_radio('facebook_login_type', 'js', TRUE); ?>><?php echo lang('text_js'); ?></label>
									<label class="btn btn-success"><input type="radio" name="facebook_login_type" value="web" <?php echo set_radio('facebook_login_type', 'web'); ?>><?php echo lang('text_web'); ?></label>
									<label class="btn btn-success"><input type="radio" name="facebook_login_type" value="canvas" <?php echo set_radio('facebook_login_type', 'canvas'); ?>><?php echo lang('text_canvas'); ?></label>									
								<?php } else if ($facebook_login_type === 'canvas') { ?>
									<label class="btn btn-success"><input type="radio" name="facebook_login_type" value="js" <?php echo set_radio('facebook_login_type', 'js'); ?>><?php echo lang('text_js'); ?></label>
									<label class="btn btn-success"><input type="radio" name="facebook_login_type" value="web" <?php echo set_radio('facebook_login_type', 'web'); ?>><?php echo lang('text_web'); ?></label>
									<label class="btn btn-success active"><input type="radio" name="facebook_login_type" value="canvas" <?php echo set_radio('facebook_login_type', 'canvas', TRUE); ?>><?php echo lang('text_canvas'); ?></label>									
								<?php } else { ?>
									<label class="btn btn-success"><input type="radio" name="facebook_login_type" value="js" <?php echo set_radio('facebook_login_type', 'js'); ?>><?php echo lang('text_js'); ?></label>
									<label class="btn btn-success active"><input type="radio" name="facebook_login_type" value="web" <?php echo set_radio('facebook_login_type', 'web', TRUE); ?>><?php echo lang('text_web'); ?></label>
									<label class="btn btn-success"><input type="radio" name="facebook_login_type" value="canvas" <?php echo set_radio('facebook_login_type', 'canvas'); ?>><?php echo lang('text_canvas'); ?></label>									
								<?php } ?>
							</div>
							<?php echo form_error('facebook_login_type', '<span class="text-danger">', '</span>'); ?>
						</div>
					</div>					
					<div class="form-group">
						<label for="input-facebook_login_redirect_url" class="col-sm-3 control-label"><?php echo lang('label_facebook_login_redirect_url'); ?>
							<span class="help-block"><?php echo lang('help_no_base_url'); ?></span>
						</label>
						<div class="col-sm-5">
							<input type="text" name="facebook_login_redirect_url" id="input-facebook_login_redirect_url" class="form-control" value="<?php echo set_value('facebook_login_redirect_url', $facebook_login_redirect_url); ?>" />
							<?php echo form_error('facebook_login_redirect_url', '<span class="text-danger">', '</span>'); ?>
						</div>
					</div>
					<div class="form-group">
						<label for="input-facebook_logout_redirect_url" class="col-sm-3 control-label"><?php echo lang('label_facebook_logout_redirect_url'); ?>
							<span class="help-block"><?php echo lang('help_no_base_url'); ?></span>
						</label>
						<div class="col-sm-5">
							<input type="text" name="facebook_logout_redirect_url" id="input-facebook_logout_redirect_url" class="form-control" value="<?php echo set_value('facebook_logout_redirect_url', $facebook_logout_redirect_url); ?>" />
							<?php echo form_error('facebook_logout_redirect_url', '<span class="text-danger">', '</span>'); ?>
						</div>
					</div>
					<div class="form-group">
						<label for="input-facebook_auth_on_load" class="col-sm-3 control-label"><?php echo lang('label_facebook_auth_on_load'); ?>
							<span class="help-block"><?php echo lang('help_facebook_auth_on_load'); ?></span>
						</label>
						<div class="col-sm-5">
							<div class="btn-group btn-group-switch" data-toggle="buttons">
								<?php if ($facebook_auth_on_load == '1') { ?>
									<label class="btn btn-danger"><input type="radio" name="facebook_auth_on_load" value="0" <?php echo set_radio('facebook_auth_on_load', '0'); ?>><?php echo lang('text_no'); ?></label>
									<label class="btn btn-success active"><input type="radio" name="facebook_auth_on_load" value="1" <?php echo set_radio('facebook_auth_on_load', '1', TRUE); ?>><?php echo lang('text_yes'); ?></label>
								<?php } else { ?>
									<label class="btn btn-danger active"><input type="radio" name="facebook_auth_on_load" value="0" <?php echo set_radio('facebook_auth_on_load', '0', TRUE); ?>><?php echo lang('text_no'); ?></label>
									<label class="btn btn-success"><input type="radio" name="facebook_auth_on_load" value="1" <?php echo set_radio('facebook_auth_on_load', '1'); ?>><?php echo lang('text_yes'); ?></label>
								<?php } ?>
							</div>
							<?php echo form_error('facebook_auth_on_load', '<span class="text-danger">', '</span>'); ?>
						</div>
					</div>
					<div class="form-group">
						<label for="input-facebook_permissions" class="col-sm-3 control-label"><?php echo lang('label_facebook_permissions'); ?>
							<span class="help-block"><?php echo lang('help_facebook_permissions'); ?></span>
						</label>
						<div class="col-sm-5">
							<select name="facebook_permissions[]" id="input-facebook_permissions" class="form-control" multiple>
								<?php foreach ($list_facebook_permissions as $key => $value) { ?>
									<?php if (in_array($key, $facebook_permissions)) { ?>
										<option value="<?php echo $key; ?>" selected="selected"><?php echo $value; ?></option>
									<?php } else { ?>
										<option value="<?php echo $key; ?>"><?php echo $value; ?></option>
									<?php } ?>
								<?php } ?>
							</select>
							<?php echo form_error('facebook_permissions', '<span class="text-danger">', '</span>'); ?>
						</div>
					</div>
					<div class="form-group">
						<label for="input-facebook_graph_version" class="col-sm-3 control-label"><?php echo lang('label_facebook_graph_version'); ?></label>
						<div class="col-sm-5">
							<input type="text" name="facebook_graph_version" id="input-facebook_graph_version" class="form-control" value="<?php echo set_value('facebook_graph_version', $facebook_graph_version); ?>" />
							<?php echo form_error('facebook_graph_version', '<span class="text-danger">', '</span>'); ?>
						</div>
					</div>
					<div class="form-group">
						<label for="input-status" class="col-sm-3 control-label"><?php echo lang('label_status'); ?></label>
						<div class="col-sm-5">
							<div class="btn-group btn-group-switch" data-toggle="buttons">
								<?php if ($status == '1') { ?>
									<label class="btn btn-danger"><input type="radio" name="status" value="0" <?php echo set_radio('status', '0'); ?>><?php echo lang('text_disabled'); ?></label>
									<label class="btn btn-success active"><input type="radio" name="status" value="1" <?php echo set_radio('status', '1', TRUE); ?>><?php echo lang('text_enabled'); ?></label>
								<?php } else { ?>
									<label class="btn btn-danger active"><input type="radio" name="status" value="0" <?php echo set_radio('status', '0', TRUE); ?>><?php echo lang('text_disabled'); ?></label>
									<label class="btn btn-success"><input type="radio" name="status" value="1" <?php echo set_radio('status', '1'); ?>><?php echo lang('text_enabled'); ?></label>
								<?php } ?>
							</div>
							<?php echo form_error('status', '<span class="text-danger">', '</span>'); ?>
						</div>
					</div>
				</div>
			</div>
		</form>
	</div>
</div>