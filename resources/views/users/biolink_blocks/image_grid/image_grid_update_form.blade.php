

<form name="update_biolink_" method="post" role="form" enctype="multipart/form-data">
    <input type="hidden" name="_token" value="{{ csrf_token() }}" required="required" />
    <input type="hidden" name="request_type" value="update" />
    <input type="hidden" name="type" value="image_grid" />
    <input type="hidden" name="biolink_block_id" value="<?= $row->id ?>" />

    <div class="notification-container"></div>

    <div class="form-group">
        <label><i class="fa fa-fw fa-paragraph fa-sm mr-1"></i> <?= language()->create_biolink_link_modal->input->name ?></label>
        <input type="text" name="name" class="form-control" value="<?= $settings->name ?>" />
    </div>

    <div class="form-group">
        <label><i class="fa fa-fw fa-image fa-sm mr-1"></i> <?= language()->create_biolink_image_grid_modal->input->image ?></label>
        <div data-image-container class="<?= !empty($settings->image) ? null : 'd-none' ?>">
            <div class="row">
                <div class="m-1 col-6 col-xl-3">
                    <img src="<?= $settings->image ? app_path() . '/public/uploads/block_images/' . $settings->image : null ?>" class="img-fluid rounded <?= !empty($settings->image) ? null : 'd-none' ?>" loading="lazy" />
                </div>
            </div>
        </div>
        <input id="<?= 'image_' . $row->biolink_block_id ?>" type="file" name="image" accept=".gif, .png, .jpg, .jpeg, .svg" class="form-control-file" />
    </div>

    <div class="form-group">
        <label><i class="fa fa-fw fa-link fa-sm mr-1"></i> <?= language()->create_biolink_image_grid_modal->input->location_url ?></label>
        <input type="text" class="form-control" name="location_url" value="<?= $row->location_url ?>" />
    </div>

    <div class="mt-4">
        <button type="submit" name="submit" class="btn btn-block btn-primary"><?= language()->global->update ?></button>
    </div>
</form>
