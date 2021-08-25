
<form name="update_biolink_" method="post" role="form">
    <input type="hidden" name="_token" value="{{ csrf_token() }}" required="required" />
    <input type="hidden" name="request_type" value="update" />
    <input type="hidden" name="type" value="mail" />
    <input type="hidden" name="biolink_block_id" value="<?= $row->id ?>" />

    <div class="notification-container"></div>

    <div class="form-group">
        <label><i class="fa fa-fw fa-paragraph fa-sm mr-1"></i> <?= language()->create_biolink_link_modal->input->name ?></label>
        <input type="text" name="name" class="form-control" value="<?= $settings->name ?>" required="required" />
    </div>

    <div class="form-group">
        <label><i class="fa fa-fw fa-image fa-sm mr-1"></i> <?= language()->create_biolink_link_modal->input->image ?></label>
        <div data-image-container class="<?= !empty($settings->image) ? null : 'd-none' ?>">
            <div class="row">
                <div class="m-1 col-6 col-xl-3">
                    <img src="<?= $settings->image ? app_path() . '/public/uploads/block_thumbnail_images/' . $settings->image : null ?>" class="img-fluid rounded <?= !empty($settings->image) ? null : 'd-none' ?>" loading="lazy" />
                </div>
            </div>

            <div class="form-check form-switch my-2">
                <input id="<?= $row->biolink_block_id . '_image_remove' ?>" name="image_remove" type="checkbox" class="form-check-input" onchange="this.checked ? document.querySelector('#<?= 'image_' . $row->biolink_block_id ?>').classList.add('d-none') : document.querySelector('#<?= 'image_' . $row->biolink_block_id ?>').classList.remove('d-none')">
                <label class="custom-control-label" for="<?= $row->biolink_block_id . '_image_remove' ?>">
                    <span class="text-muted"><?= language()->global->delete_file ?></span>
                </label>
            </div>
        </div>
        <input id="<?= 'image_' . $row->biolink_block_id ?>" type="file" name="image" accept=".gif, .png, .jpg, .jpeg, .svg" class="form-control-file" />
    </div>

    <div class="form-group">
        <label><i class="fa fa-fw fa-globe fa-sm mr-1"></i> <?= language()->create_biolink_link_modal->input->icon ?></label>
        <input type="text" name="icon" class="form-control" value="<?= $settings->icon ?>" placeholder="<?= language()->create_biolink_link_modal->input->icon_placeholder ?>" />
        <small class="form-text text-muted"><?= language()->create_biolink_link_modal->input->icon_help ?></small>
    </div>
    @php
    $plan_setting = json_decode(Auth::user()->plan->plan->settings)
@endphp
    <div <?= $plan_settings->custom_colored_links ? null : 'data-toggle="tooltip" title="' . language()->global->info_message->plan_feature_no_access . '"' ?>>
        <div class="<?= $plan_settings->custom_colored_links ? null : 'container-disabled' ?>">
            <div class="form-group">
                <label><i class="fa fa-fw fa-paint-brush fa-sm mr-1"></i> <?= language()->create_biolink_link_modal->input->text_color ?></label>
                <input type="hidden" name="text_color" class="form-control" value="<?= $settings->text_color ?>" required="required" />
                <div class="text_color_pickr"></div>
            </div>

            <div class="form-group">
                <label><i class="fa fa-fw fa-fill fa-sm mr-1"></i> <?= language()->create_biolink_link_modal->input->background_color ?></label>
                <input type="hidden" name="background_color" class="form-control" value="<?= $settings->background_color ?>" required="required" />
                <div class="background_color_pickr"></div>
            </div>

            <div class="form-check form-switch mr-3 mb-3">
                <input
                        type="checkbox"
                        class="form-check-input"
                        id="outline_<?= $row->biolink_block_id ?>"
                        name="outline"
                    <?= $settings->outline ? 'checked="checked"' : null ?>
                >
                <label class="custom-control-label clickable" for="outline_<?= $row->biolink_block_id ?>"><?= language()->create_biolink_link_modal->input->outline ?></label>
            </div>

            <div class="form-group">
                <label><?= language()->create_biolink_link_modal->input->border_radius ?></label>
                <select name="border_radius" class="form-control">
                    <option value="straight" <?= $settings->border_radius == 'straight' ? 'selected="selected"' : null ?>><?= language()->create_biolink_link_modal->input->border_radius_straight ?></option>
                    <option value="round" <?= $settings->border_radius == 'round' ? 'selected="selected"' : null ?>><?= language()->create_biolink_link_modal->input->border_radius_round ?></option>
                    <option value="rounded" <?= $settings->border_radius == 'rounded' ? 'selected="selected"' : null ?>><?= language()->create_biolink_link_modal->input->border_radius_rounded ?></option>
                </select>
            </div>

            <div class="form-group">
                <label><?= language()->create_biolink_link_modal->input->animation ?></label>
                <select name="animation" class="form-control">
                    <option value="false" <?= !$settings->animation ? 'selected="selected"' : null ?>>-</option>
                    <?php foreach(require app_path() . '/includes/biolink_animations.php' as $animation): ?>
                    <option value="<?= $animation ?>" <?= $settings->animation == $animation ? 'selected="selected"' : null ?>><?= $animation ?></option>
                    <?php endforeach ?>
                </select>
            </div>

            <div class="form-group">
                <label><?= language()->create_biolink_link_modal->input->animation_runs ?></label>
                <select name="animation_runs" class="form-control">
                    <option value="repeat-1" <?= $settings->animation_runs == 'repeat-1' ? 'selected="selected"' : null ?>>1</option>
                    <option value="repeat-2" <?= $settings->animation_runs == 'repeat-2' ? 'selected="selected"' : null ?>>2</option>
                    <option value="repeat-3" <?= $settings->animation_runs == 'repeat-3' ? 'selected="selected"' : null ?>>3</option>
                    <option value="infinite" <?= $settings->animation_runs == 'repeat-3' ? 'selected="selected"' : null ?>><?= language()->create_biolink_link_modal->input->animation_runs_infinite ?></option>
                </select>
            </div>
        </div>
    </div>

    <div class="form-group">
        <label><?= language()->create_biolink_mail_modal->input->email_placeholder ?></label>
        <input type="text" name="email_placeholder" class="form-control" value="<?= $settings->email_placeholder ?>" required="required" />
    </div>

    <div class="form-group">
        <label><?= language()->create_biolink_mail_modal->input->name_placeholder ?></label>
        <input type="text" name="name_placeholder" class="form-control" value="<?= $settings->name_placeholder ?>" required="required" />
    </div>

    <div class="form-group">
        <label><?= language()->create_biolink_mail_modal->input->button_text ?></label>
        <input type="text" name="button_text" class="form-control" value="<?= $settings->button_text ?>" required="required" />
    </div>

    <div class="form-group">
        <label><?= language()->create_biolink_mail_modal->input->success_text ?></label>
        <input type="text" name="success_text" class="form-control" value="<?= $settings->success_text ?>" required="required" />
    </div>

    <div class="form-group">
        <label><?= language()->create_biolink_mail_modal->input->thank_you_url ?></label>
        <input type="url" name="thank_you_url" class="form-control" value="<?= $settings->thank_you_url ?>" />
    </div>

    <div class="form-check form-switch">
        <input class="form-check-input" type="checkbox"
        id="show_agreement_<?= $row->biolink_block_id ?>"
        name="show_agreement"
    <?= $settings->show_agreement ? 'checked="checked"' : null ?>>
    <label class="custom-control-label clickable" for="show_agreement_<?= $row->biolink_block_id ?>"><?= language()->create_biolink_mail_modal->input->show_agreement ?></label>
    <div><small class="form-text text-muted"><?= language()->create_biolink_mail_modal->input->show_agreement_help ?></small></div>
    </div>

    <div class="form-group">
        <label><?= language()->create_biolink_mail_modal->input->agreement_text ?></label>
        <input type="text" name="agreement_text" class="form-control" value="<?= $settings->agreement_text ?>" />
    </div>

    <div class="form-group">
        <label><?= language()->create_biolink_mail_modal->input->agreement_url ?></label>
        <input type="text" name="agreement_url" class="form-control" value="<?= $settings->agreement_url ?>" />
    </div>

    <div class="form-group">
        <label><?= language()->create_biolink_mail_modal->input->mailchimp_api ?></label>
        <input type="text" name="mailchimp_api" class="form-control" value="<?= $settings->mailchimp_api ?>" />
        <small class="form-text text-muted"><?= language()->create_biolink_mail_modal->input->mailchimp_api_help ?></small>
    </div>

    <div class="form-group">
        <label><?= language()->create_biolink_mail_modal->input->mailchimp_api_list ?></label>
        <input type="text" name="mailchimp_api_list" class="form-control" value="<?= $settings->mailchimp_api_list ?>" />
        <small class="form-text text-muted"><?= language()->create_biolink_mail_modal->input->mailchimp_api_list_help ?></small>
    </div>

    <div class="form-group">
        <label><?= language()->create_biolink_mail_modal->input->webhook_url ?></label>
        <input type="text" name="webhook_url" class="form-control" value="<?= $settings->webhook_url ?>" />
        <small class="form-text text-muted"><?= language()->create_biolink_mail_modal->input->webhook_url_help ?></small>
    </div>

    <div class="mt-4">
        <button type="submit" name="submit" class="btn btn-block btn-primary"><?= language()->global->update ?></button>
    </div>
</form>
