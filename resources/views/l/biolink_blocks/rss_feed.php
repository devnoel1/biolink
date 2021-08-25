

<div data-biolink-block-id="<?= $data->link->biolink_block_id ?>" class="col-12 my-2">
    <?php

    /* Get all the links inside of the biolink */


    /* Set cache if not existing */
    if(is_null($cache_instance->get())) {

        $rss = simplexml_load_file($data->link->location_url);
        $counter = 0;
        $rss_data = [];

        foreach($rss->channel->item as $item) {
            $rss_data[] = [
                'title' => (string) $item->title,
                'link' => (string) $item->link
            ];

            $counter++;
            if($counter >= $data->link->settings->amount) break;
        }



    } else {

        $rss_data = $cache_instance->get();

    }

    $counter = 0;
    ?>

    <?php foreach($rss_data as $item): ?>
    <a href="<?= $item['link'] ?>" class="btn btn-block btn-primary link-btn <?= $data->link->design->link_class ?>" style="<?= $data->link->design->link_style ?>">
        <?= $item['title'] ?>
    </a>

        <?php
        $counter++;
        if($counter >= $data->link->settings->amount) break;
        ?>
    <?php endforeach ?>
</div>

