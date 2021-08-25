

<form name="update_biolink_" method="post" role="form">
    <input type="hidden" name="_token" value="{{ csrf_token() }}" required="required" />
    <input type="hidden" name="request_type" value="update" />
    <input type="hidden" name="type" value="link" />
    <input type="hidden" name="biolink_block_id" value="<?= $row->id ?>" />

    <div class="notification-container"></div>

    <div class="form-group">
        <label><i class="fa fa-fw fa-signature fa-sm mr-1"></i> <?= language()->create_biolink_link_modal->input->location_url ?></label>
        <input type="text" class="form-control" name="location_url" value="<?= $row->location_url ?>" placeholder="<?= language()->create_biolink_link_modal->input->location_url_placeholder ?>" required="required" />
    </div>

    <div <?= $plan_settings->temporary_url_is_enabled ? null : 'data-toggle="tooltip" title="' . language()->global->info_message->plan_feature_no_access . '"' ?>>
        <div class="<?= $plan_settings->temporary_url_is_enabled ? null : 'container-disabled' ?>">
        <div class="form-check form-switch">
                        <input class="form-check-input"  id="schedule_<?= $row->id ?>"
                        name="schedule" type="checkbox"
                    <?= !empty($row->start_date) && !empty($row->end_date) ? 'checked="checked"' : null ?>
                    <?= $plan_settings->temporary_url_is_enabled ? null : 'disabled="disabled"' ?>>
                    <label class="custom-control-label" for="schedule_<?= $row->id ?>"><?= language()->link->settings->schedule ?></label>
                <small class="form-text text-muted"><?= language()->link->settings->schedule_help ?></small>
                    </div>

        </div>
    </div>

    <div class="mt-3 schedule_container" style="display: none;">
        <div <?= $plan_settings->temporary_url_is_enabled ? null : 'data-toggle="tooltip" title="' . language()->global->info_message->plan_feature_no_access . '"' ?>>
            <div class="<?= $plan_settings->temporary_url_is_enabled ? null : 'container-disabled' ?>">
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label><i class="fa fa-fw fa-clock fa-sm mr-1"></i> <?= language()->link->settings->start_date ?></label>
                            <input
                                    type="text"
                                    class="form-control"
                                    name="start_date"
                                    value=""
                                    placeholder="<?= language()->link->settings->start_date ?>"
                                    autocomplete="off"
                            >
                        </div>
                    </div>

                    <div class="col">
                        <div class="form-group">
                            <label><i class="fa fa-fw fa-clock fa-sm mr-1"></i> <?= language()->link->settings->end_date ?></label>
                            <input
                                    type="text"
                                    class="form-control"
                                    name="end_date"
                                    value=""
                                    placeholder="<?= language()->link->settings->end_date ?>"
                                    autocomplete="off"
                            >
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="form-group">
        <label><i class="fa fa-fw fa-paragraph fa-sm mr-1"></i> <?= language()->create_biolink_link_modal->input->name ?></label>
        <input type="text" name="name" class="form-control" value="<?= $settings->name ?>" required="required" />
    </div>

    <div class="form-group">
        <label><i class="fa fa-fw fa-image fa-sm mr-1"></i> <?= language()->create_biolink_link_modal->input->image ?></label>
        <div data-image-container class="<?= !empty($settings->image) ? null : 'd-none' ?>">
            <div class="row">
                <div class="m-1 col-6 col-xl-3">
                    <img src="<?= $settings->image ?  url('').'/uploads/block_thumbnail_images/' . $settings->image : null ?>" class="img-fluid rounded <?= !empty($settings->image) ? null : 'd-none' ?>" loading="lazy" />
                </div>
            </div>
            <div class="custom-control custom-checkbox my-2">
                <input id="<?= $row->id . '_image_remove' ?>" name="image_remove" type="checkbox" class="custom-control-input" onchange="this.checked ? document.querySelector('#<?= 'image_' . $row->id ?>').classList.add('d-none') : document.querySelector('#<?= 'image_' . $row->id ?>').classList.remove('d-none')">
                <label class="custom-control-label" for="<?= $row->id . '_image_remove' ?>">
                    <span class="text-muted"><?= language()->global->delete_file ?></span>
                </label>
            </div>
        </div>
        <input id="<?= 'image_' . $row->id ?>" type="file" name="image" accept=".gif, .png, .jpg, .jpeg, .svg" class="form-control-file" />
    </div>

    <div class="form-group">
        <label><i class="fa fa-fw fa-globe fa-sm mr-1"></i> <?= language()->create_biolink_link_modal->input->icon ?></label>
        <input type="text" name="icon" class="form-control" value="<?= $settings->icon ?>" placeholder="<?= language()->create_biolink_link_modal->input->icon_placeholder ?>" />
        <small class="form-text text-muted"><?= language()->create_biolink_link_modal->input->icon_help ?></small>
    </div>

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

            <div class="form-check form-switch">
                        <input class="form-check-input"  type="checkbox"
                        id="outline_<?= $row->id ?>"
                        name="outline"
                    <?= $settings->outline ? 'checked="checked"' : null ?>
                    >
                <label class="custom-control-label clickable" for="outline_<?= $row->id ?>"><?= language()->create_biolink_link_modal->input->outline ?></label>

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

    <div class="mt-4">
        <button type="submit" name="submit" class="btn btn-block btn-primary"><?= language()->global->update ?></button>
    </div>
</form>
