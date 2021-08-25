

<div data-biolink-block-id="<?= $data->link->biolink_block_id ?>" class="col-12 my-2">
    <?php if($data->link->location_url): ?>
    <a href="<?= $data->link->location_url . $data->link->utm_query ?>" data-biolink-block-id="<?= $data->link->biolink_block_id ?>" target="_blank">

    <img src="<?=  url('').'/uploads/block_images/'.$data->link->settings->image ?>" class="img-fluid rounded" />
    </a>
    <?php else: ?>
        
        <img src="<?=  url('').'/uploads/block_images/'.$data->link->settings->image ?>" class="img-fluid rounded" />
    <?php endif ?>
</div>

