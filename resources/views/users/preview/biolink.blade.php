<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $link->url }}</title>
<link href="{{ asset('dashboard/bootstrap.min.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('dashboard/custom.css') }}">
    <link rel="stylesheet" href="{{ asset('dashboard/pickr.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dashboard/link-custom.css') }}">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />

</head>
<body class="<?= language()->direction == 'rtl' ? 'rtl' : null ?> link-body <?= $data['link']->design->background_class ?>" style="<?= $data['link']->design->background_style ?>">
    <div>
        <div class="container animate__animated animate__fadeIn">
            <div class="row d-flex justify-content-center text-center">
                <div class="col-md-8 link-content  <?= isset($_GET['preview']) ? 'container-disabled-simple' : null ?>">
                    <header class="d-flex flex-column align-items-center" style="<?= $data['link']->design->text_style ?>">
                        <img id="image" src="<?= $data['link']->settings->image ? url('') . '/uploads/avatars/' . $data['link']->settings->image : null ?>" alt="<?= language()->link->biolink->image_alt ?>" class="link-image" <?= !empty($data['link']->settings->image) ? null : 'style="display: none;"' ?> />

                        <div class="d-flex flex-row align-items-center mt-4">
                            <h1 id="title"><?= $data['link']->settings->title ?></h1>

                            <?php if($plan_settings->verified && $data['link']->settings->display_verified): ?>
                            <span data-toggle="tooltip" title="<?= language()->global->verified ?>" class="link-verified ml-1"><i class="fa fa-fw fa-check-circle fa-1x"></i></span>
                            <?php endif ?>
                        </div>

                        <p id="description"><?= $data['link']->settings->description ?></p>
                    </header>
                    <main id="links" class="mt-4">
                        <div class="row">

                            <?php if($data['biolink_blocks']): ?>
                                <?php foreach($data['biolink_blocks'] as $row): ?>

                                    <?php

                                    /* Check if its a scheduled link and we should show it or not */


                                    /* Check if the user has permissions to use the link */
                                    if(!$plan_settings->enabled_biolink_blocks->{$row->type}) {
                                        continue;
                                    }

                                    $row->utm = $data['link']->settings->utm;

                                    ?>

                                @php
                                    \App\Core\Link::get_biolink_link($row, $data['user']) ?? null
                                @endphp

                                <?php endforeach ?>
                            <?php endif ?>

                        </div>

                        <?php if($plan_settings->socials): ?>
                        <div id="socials" class="d-flex flex-wrap justify-content-center mt-5">

                        <?php foreach($data['link']->settings->socials as $key => $value): ?>
                            <?php if($value): ?>

                            <div class="mx-3 mb-3">
                                <span >
                                    <a href="<?= sprintf($biolink_socials[$key]['format'], $value) ?>" target="_blank">
                                        <i
                                            data-toggle="tooltip"
                                            title="<?= language()->link->settings->socials->{$key}->name ?>"
                                            class="<?= language()->link->settings->socials->{$key}->icon ?> fa-fw fa-2x"
                                            style="<?= $data['link']->design->socials_style ?>">
                                        </i>
                                    </a>
                                </span>
                            </div>

                            <?php endif ?>
                        <?php endforeach ?>

                        </div>
                        <?php endif ?>
                    </main>
                    <footer class="link-footer">
                        <?php if($data['link']->settings->display_branding): ?>
                            <?php if(isset($data['link']->settings->branding, $data['link']->settings->branding->name, $data['link']->settings->branding->url) && !empty($data['link']->settings->branding->name)): ?>
                                <a id="branding" href="<?= !empty($data['link']->settings->branding->url) ? $data['link']->settings->branding->url : '#' ?>" style="<?= $data['link']->design->text_style ?>"><?= $data['link']->settings->branding->name ?></a>
                            <?php else: ?>
                                <a id="branding" href="<?= url('') ?>" style="<?= $data['link']->design->text_style ?>">{{ settings()->links->branding }}</a>
                            <?php endif ?>
                        <?php endif ?>
                    </footer>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
