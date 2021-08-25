

<form name="update_biolink_" method="post" role="form">
    <input type="hidden" name="_token" value="{{ csrf_token() }}" required="required" />
    <input type="hidden" name="request_type" value="update" />
    <input type="hidden" name="type" value="text" />
    <input type="hidden" name="biolink_block_id" value="<?= $row->id ?>" />

    <div class="notification-container"></div>

    <div class="form-group">
        <label><i class="fa fa-fw fa-heading fa-sm mr-1"></i> <?= language()->create_biolink_text_modal->input->title ?></label>
        <input type="text" class="form-control" name="title" value="<?= $settings->title ?>" />
    </div>

    <div class="form-group">
        <label><i class="fa fa-fw fa-paragraph fa-sm mr-1"></i> <?= language()->create_biolink_text_modal->input->description ?></label>
        <textarea name="description" class="form-control"><?= $settings->description ?></textarea>
    </div>
@php
    $plan_setting = json_decode(Auth::user()->plan->plan->settings)
@endphp
    <div <?= $plan_setting->custom_colored_links ? null : 'data-toggle="tooltip" title="' . language()->global->info_message->plan_feature_no_access . '"' ?>>
        <div class="<?= $plan_setting->custom_colored_links ? null : 'container-disabled' ?>">
            <div class="form-group">
                <label><i class="fa fa-fw fa-paint-brush fa-sm mr-1"></i> <?= language()->create_biolink_text_modal->input->title_text_color ?></label>
                <input type="hidden" name="title_text_color" class="form-control" value="<?= $settings->title_text_color ?>" required="required" />
                <div class="title_text_color_pickr"></div>
            </div>

            <div class="form-group">
                <label><i class="fa fa-fw fa-paint-brush fa-sm mr-1"></i> <?= language()->create_biolink_text_modal->input->description_text_color ?></label>
                <input type="hidden" name="description_text_color" class="form-control" value="<?= $settings->description_text_color ?>" required="required" />
                <div class="description_text_color_pickr"></div>
            </div>
        </div>
    </div>

    <div class="mt-4">
        <button type="submit" name="submit" class="btn btn-block btn-primary"><?= language()->global->update ?></button>
    </div>
</form>
