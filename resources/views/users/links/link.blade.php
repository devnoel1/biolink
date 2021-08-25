@extends('layouts.user-layouts')

@section('styles')
<!-- Bootstrap CSS -->
<link rel="stylesheet" href="{{ asset('dashboard/custom.css') }}">
<link rel="stylesheet" href="{{ asset('dashboard/pickr.min.css') }}">
<link rel="stylesheet" href="{{ asset('dashboard/link-custom.css') }}">
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
@endsection

@section('content')
<div class="container">
    <div class="row mb-5">
        <div class="d-flex justify-content-between">
            <div class="d-flex align-items-center">
                <h3 class="">
                    <b>{{ $link->url }}</b>
                </h3>
               <span>
                {{-- <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" name="verified" {{ $link->is_enabled == '1' ? 'checked':'' }}>
                </div> --}}
               </span>
            </div>
        <a href="" class="btn btn-light rounded-pill"><i class="fa fa-chart-line"></i> Statistics</a>
        </div>
        <div>
            <b><i class="fa fa-dot-circle"></i> Your link is <a href="{{ url($link->url, []) }}" target="_blank">{{ url('') }}/{{ $link->url }}</a></b>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12 col-lg-6">
        <div class="d-flex justify-content-between">
            <ul class="nav nav-pills" id="myTab">
                <li class="nav-item">
                  <a class="nav-link active rounded-pill" data-bs-toggle="tab" id="settings-tab" data-bs-target="#settings" href="#">Settings</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link rounded-pill" data-bs-toggle="tab" id="links-tab" data-bs-target="#biolink_blocks" href="#">Links</a>
                </li>
              </ul>
              <div>
                <button type="button" data-bs-toggle="modal" data-bs-target="#biolink_link_create_modal" class="btn btn-primary rounded-pill"><i class="fa fa-fw fa-plus-circle"></i> Add block</button>
            </div>
        </div>
        <div class="tab-content pt-3" id="myTabContent">
            <div class="tab-pane fade show active" id="settings" role="tabpanel" aria-labelledby="settings-tab">
                <div class="card">
                    <div class="card-body">
                        <form name="update_biolink" action="" method="post" role="form" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="request_type" value="update" />
                            <input type="hidden" name="type" value="biolink" />
                            <input type="hidden" name="link_id" value="<?= $link->id ?>" />
                            <div class="form-group">
                                <label><i class="fa fa-fw fa-link fa-sm mr-1"></i> <?= language()->link->settings->url ?></label>
                                <div class="input-group">
                                    <span class="input-group-text" id="basic-addon3">{{ url('') }}/</span>
                                    <input type="text"
                                     class="form-control"
                                     id="url" name="url"
                                      aria-describedby="basic-addon3"
                                      value="{{ $link->url }}"
                                      placeholder="<?= language()->link->settings->url_placeholder ?>"
                                      <?= !$plan_settings->custom_url ? 'readonly="readonly"' : null ?>
                                      <?= $plan_settings->custom_url ? null : 'data-toggle="tooltip" title="' . language()->global->info_message->plan_feature_no_access . '"' ?>
                                      >
                                </div>
                                <small class="form-text text-muted"><?= language()->link->settings->url_help ?></small>
                            </div>

                            @php
                                if(empty($link_settings->image))
                                {
                                    $link_settings->image_url = "dashboard/images/avatar_default.png" ;
                                }
                                else {
                                    $link_settings->image_url = "uploads/avatars/".$link_settings->image ;
                                }

                            @endphp


                            <div class="form-group">
                                <div class="m-1 d-flex flex-column align-items-center justify-content-center">
                                    <label aria-label="<?= language()->link->settings->image ?>" class="clickable">
                                        <img id="image_file_preview" src="{{ asset($link_settings->image_url)}}" data-default-src="{{ asset($link_settings->image_url) }}" data-empty-src="{{ asset('dashboard/images/avatar_default.png') }}" class="img-fluid link-image-preview" />
                                        <input id="image_file_input" type="file" name="image" accept=".gif, .ico, .png, .jpg, .jpeg, .svg" class="form-control-file" style="display:none;" />
                                        <input type="hidden" name="image_delete" value="0" class="form-control" />
                                    </label>

                                    <div id="image_file_status" <?= empty($link_settings->image) ? 'style="display: none;"' : null ?>>
                                        <button type="button" id="image_file_remove" class="btn btn-sm btn-outline-secondary" data-toggle="tooltip" title="<?= language()->link->settings->image_remove ?>"><i class="fa fa-fw fa-trash-alt"></i></button>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="settings_title"><i class="fa fa-fw fa-heading fa-sm mr-1"></i> Title</label>
                                <input type="text" id="settings_title" name="title" class="form-control" value="{{ $link_settings->title }}" />
                            </div>
                            <div class="form-group">
                                <label for="settings_description"><i class="fa fa-fw fa-pen-fancy fa-sm mr-1"></i> Description</label>
                                <input type="text" id="settings_description" name="description" class="form-control" value="{{ $link_settings->description }}" />
                            </div>
                            <div class="form-group">
                                <label for="settings_text_color"><i class="fa fa-fw fa-paint-brush fa-sm mr-1"></i> Text Color</label>
                                <input type="hidden" id="settings_text_color" name="text_color" class="form-control" value="{{ $link_settings->text_color }}" required="required" />
                                <div id="settings_text_color_pickr"></div>
                            </div>
                            <div class="form-group">
                                <label for="settings_background_type"><i class="fa fa-fw fa-fill fa-sm mr-1"></i> Background</label>
                                <select id="settings_background_type" name="background_type" class="form-control">
                                    <?php foreach($biolink_backgrounds as $key => $value): ?>
                                        <option value="{{ $key }}" {{ $link_settings->background_type == $key ? 'selected':null }} >{{ $key }}</option>
                                    <?php endforeach ?>
                                </select>
                            </div>

                            <div id="background_type_preset" class="row mt-4">
                                @foreach ($biolink_backgrounds['preset'] as $key)
                                <label for="settings_background_type_preset_{{ $key }}" class="m-0 col-4 mb-4">
                                    <input type="radio" name="background" value="{{ $key }}" id="settings_background_type_preset_{{ $key }}" class="d-none" {{ $link_settings->background == $key ? 'checked':null }} />
                                    <div class="link-background-type-preset link-body-background-{{ $key }}"></div>
                                </label>
                                @endforeach

                            </div>
                            <div {{ $plan_settings->custom_backgrounds ? null:'data-toggle="tooltip" title="subscriped plan has no such access"' }} class="mt-4">
                                <div class="">
                                    <div id="background_type_gradient">
                                        <div class="form-group">
                                            <label for="settings_background_type_gradient_color_one">Color One</label>
                                            <input type="hidden" id="settings_background_type_gradient_color_one" name="background[]" class="form-control" value="{{ $link_settings->background->color_one ?? '#000'  }}" />
                                            <div id="settings_background_type_gradient_color_one_pickr"></div>
                                        </div>

                                        <div class="form-group">
                                            <label for="settings_background_type_gradient_color_two">Color Two</label>
                                            <input type="hidden" id="settings_background_type_gradient_color_two" name="background[]" class="form-control" value="{{ $link_settings->background->color_two ?? '#000'  }}" />
                                            <div id="settings_background_type_gradient_color_two_pickr"></div>
                                        </div>
                                    </div>

                                    <div id="background_type_color">
                                        <div class="form-group">
                                            <label for="settings_background_type_color">Custom Color</label>
                                            <input type="hidden" id="settings_background_type_color" name="background" class="form-control" value="{{ $link_settings->background ? $link_settings->background: '#000'  }}" />
                                            <div id="settings_background_type_color_pickr"></div>
                                        </div>
                                    </div>

                                    <div id="background_type_image">
                                        <div class="form-group">
                                            <?php if(is_string($link_settings->background) && file_exists('backgrounds/' . $link_settings->background)): ?>
                                                <img id="background_type_image_preview" src="{{ asset('uploads/backgrounds/'.$link_settings->background) }}" data-default-src="{{ asset('uploads/backgrounds/'.$link_settings->background) }}" class="link-background-type-image img-fluid" />
                                            <?php endif ?>
                                            <input id="background_type_image_input" type="file" name="background" accept=".gif, .ico, .png, .jpg, .jpeg, .svg" class="form-control-file" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="d-grid gap-2">
                                <button class="btn btn-block btn-light my-2" type="button" data-bs-toggle="collapse" data-bs-target="#branding_container" aria-expanded="false" aria-controls="branding_container">
                                    Branding
                                 </button>
                            </div>
                            <div class="collapse" id="branding_container">
                                <div  {{ $plan_settings->removable_branding ? null : 'data-toggle="tooltip" title="'. language()->global->info_message->plan_feature_no_access .'"' }} >
                                    <div class="{{ $plan_settings->removable_branding ? null : 'container-disabled' }}">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox"
                                            id="display_branding"
                                                    name="display_branding"
                                            {{ !$plan_settings->removable_branding ? 'disabled="disabled"': null }}
                                            {{ $link_settings->display_branding ? 'checked="checked"' : null }}>
                                            <label class="custom-control-label clickable" for="display_branding">Display Branding</label>
                                        </div>
                                    </div>
                                </div>

                                <div  {{ $plan_settings->custom_branding ? null : 'data-toggle="tooltip" title="'.language()->global->info_message->plan_feature_no_access.'"'  }}>
                                    <div class="{{ $plan_settings->custom_branding ? null : 'container-disabled' }}">
                                        <div class="form-group">
                                            <label><i class="fa fa-fw fa-random fa-sm mr-1"></i> Branding Name</label>
                                            <input id="branding_name" type="text" class="form-control" name="branding_name" value="{{ $link_settings->branding->name ?? ''  }}" />
                                            <small class="form-text text-muted">Leave empty to have the default site branding.</small>
                                        </div>

                                        <div class="form-group">
                                            <label><i class="fa fa-fw fa-link fa-sm mr-1"></i> Branding URL</label>
                                            <input id="branding_url" type="text" class="form-control" name="branding_url" value="{{ $link_settings->branding->url ?? ''  }}" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="d-grid gap-2">
                                <button class="btn btn-block btn-light my-2" type="button" data-bs-toggle="collapse" data-bs-target="#socials_container" aria-expanded="false" aria-controls="socials_container">
                                    {{ language()->link->settings->socials_header }}
                                </button>
                            </div>

                            <div class="collapse" id="socials_container">
                                <div {{ $plan_settings->socials ? null : 'data-toggle="tooltip" title="'.language()->global->info_message->plan_feature_no_access.'"' }} >
                                    <div class="{{ $plan_settings->socials ? null : 'container-disabled'  }}">
                                        <div class="form-group">
                                            <label for="settings_socials_color"><i class="fa fa-fw fa-paint-brush fa-sm mr-1"></i> {{ language()->link->settings->socials_color}}</label>
                                            <input type="hidden" id="settings_socials_color" name="socials_color" class="form-control" value="{{ $link_settings->socials_color }} " required="required" />
                                            <div id="settings_socials_color_pickr"></div>
                                        </div>

                                        @foreach ($biolink_socials as $key => $value)
                                        @if ($value['input_group'])
                                        <div class="form-group my-2">
                                            <label><i class="{{ language()->link->settings->socials->$key->icon }}  fa-fw fa-sm mr-1"></i>  {{ language()->link->settings->socials->$key->name }} </label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><?= str_replace('%s', '', $value['format']) ?></span>
                                                </div>
                                                <input type="text" class="form-control" name="socials[{{ $key  }}]"  value="{{ $link_settings->socials->$key ?? ''  }}" placeholder="{{ language()->link->settings->socials->{$key}->placeholder }}"/>
                                            </div>
                                        </div>
                                        @else
                                        <div class="form-group">
                                            <label><i class="{{ language()->link->settings->socials->$key->icon }}  fa-fw fa-sm mr-1"></i>  {{ language()->link->settings->socials->$key->name }} </label>
                                            <input type="text" class="form-control" name="socials[{{ $key }}]" value=" {{ $link_settings->socials->$key ?? '' }} " placeholder="{{ language()->link->settings->socials->{$key}->placeholder }}"/>
                                        </div>
                                        @endif
                                        @endforeach

                                    </div>
                                </div>
                            </div>
                            <div class="d-grid gap-2">
                                <button class="btn btn-block btn-light my-2" type="button" data-bs-toggle="collapse" data-bs-target="#fonts_container" aria-expanded="false" aria-controls="fonts_container">
                                    Fonts
                                </button>
                            </div>
                            <div class="collapse" id="fonts_container">
                                <div  {{ $plan_settings->fonts ? null : 'data-toggle="tooltip" title="'. language()->global->info_message->plan_feature_no_access .'"'  }}>
                                    <div class=" {{ $plan_settings->fonts ? null : 'container-disabled' }} ">

                                        <div class="form-group">
                                            <label for="settings_font"><i class="fa fa-fw fa-pen-nib fa-sm mr-1"></i> Font </label>
                                            <select id="settings_font" name="font" class="form-control">
                                                @foreach ($biolink_fonts as $key => $value)
                                                <option value="{{ $key }}"  {{ $link_settings->font == $key ? 'selected="selected"' : null }}> {{ $value['name'] }} </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="d-grid gap-2">
                                <button class="btn btn-block btn-light my-2" type="button" data-bs-toggle="collapse" data-bs-target="#protection_container" aria-expanded="false" aria-controls="protection_container">
                                    Protection
                                </button>
                            </div>
                            <div class="collapse" id="protection_container">

                                <div  {{ $plan_settings->password ? null : 'data-toggle="tooltip" title="'.language()->global->info_message->plan_feature_no_access.'"' }} >
                                    <div class="{{ $plan_settings->password ? null : 'container-disabled' }} ">
                                        <div class="form-group">
                                            <label for="qweasdzxc"><i class="fa fa-fw fa-key fa-sm mr-1"></i> Password</label>
                                            <input id="qweasdzxc" type="password" class="form-control" name="qweasdzxc" value="{{ $link_settings->password }}" autocomplete="new-password" {{ !$plan_settings->password ? 'disabled="disabled"': null }} />
                                            <small class="form-text text-muted">Require users to enter a password before accessing the link.</small>
                                        </div>
                                    </div>
                                </div>

                                {{-- <div {{ $plan_settings->sensitive_content ? null : 'data-toggle="tooltip" title="'.language()->global->info_message->plan_feature_no_access.'"' }} >
                                    <div class="{{ $plan_settings->sensitive_content ? null : 'container-disabled' }} ">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input"
                                            type="checkbox"
                                                class="custom-control-input"
                                                id="sensitive_content"
                                                name="sensitive_content"
                                             {{ !$plan_settings->sensitive_content ? 'disabled="disabled"': null }}
                                             {{ $link_settings->sensitive_content ? 'checked="checked"' : null }}
                                            >
                                            <label class="custom-control-label clickable" for="sensitive_content">Sensitive Content</label>
                                            <small class="form-text text-muted">Require users to confirm that they want to access your link and letting them know that the link might be sensitive.</small>
                                        </div>
                                    </div>
                                </div> --}}
                            </div>
                            <div class="d-grid gap-2 mt-4">
                                <button type="submit" class="btn btn-block btn-primary"><?= language()->global->update ?></button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="biolink_blocks" role="tabpanel" aria-labelledby="links-tab">
                @if ($biolinks_blocks->count() > 0)
                @foreach ($biolinks_blocks as $row)
                @php
                    $settings = json_decode($row->settings)
                @endphp
                <div class="biolink_block card  {{ $row->is_enebled ? null : 'custom-row-inactive' }}  my-4" data-biolink-block-id="{{ $row->id }}">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="custom-row-side-controller">
                                <span data-toggle="tooltip" title="{{ language()->link->biolink_blocks->link_sort }} ">
                                    <i class="fa fa-fw fa-bars text-muted custom-row-side-controller-grab drag"></i>
                                </span>
                            </div>
                            <div class="col-1 mr-2 p-0 d-none d-lg-block">
                                <span class="fa-stack fa-1x" data-toggle="tooltip" title=" {{ language()->link->biolink->{$row->type}->name }} ">
                                    <i class="fa fa-circle fa-stack-2x" style="color: {{ language()->link->biolink->{$row->type}->color }} "></i>
                                    <i class="fas {{ language()->link->biolink->{$row->type}->icon }}  fa-stack-1x fa-inverse"></i>
                                </span>
                            </div>

                            <div class="col-6 col-md-6">
                                <div class="d-flex flex-column">
                                    <a
                                    data-bs-toggle="collapse"
                                    data-bs-target="#biolink_block_expanded_content<?= $row->id ?>"
                                    href="#"
                                    aria-expanded="false"
                                    aria-controls="biolink_block_expanded_content<?= $row->id ?>"
                                    >
                                        <strong><?= in_array($row->type, ['image', 'image_grid', 'spotify', 'youtube', 'vimeo', 'tiktok', 'twitch', 'applemusic', 'soundcloud', 'text', 'mail', 'tidal', 'anchor', 'twitter_tweet', 'instagram_media', 'rss_feed', 'custom_html', 'vcard', 'divider']) ? language()->link->biolink->{$row->type}->name : $settings->name?></strong>
                                    </a>

                                    <span class="d-flex align-items-center">
                                    <?php if(!empty($row->location_url)): ?>
                                        <img src="https://external-content.duckduckgo.com/ip3/<?= parse_url($row->location_url)['host'] ?>.ico" class="img-fluid icon-favicon mr-1" />
                                        <span class="d-inline-block text-truncate">
                                        <a href="<?= $row->location_url ?>" class="text-muted" title="<?= $row->location_url ?>" target="_blank" rel="noreferrer"><?= $row->location_url ?></a>
                                    </span>
                                    <?php elseif(!empty($row->url)): ?>
                                        <img src="https://external-content.duckduckgo.com/ip3/<?= parse_url(url($row->url))['host'] ?>.ico" class="img-fluid icon-favicon mr-1" />
                                        <span class="d-inline-block text-truncate">
                                        <a href="<?= url($row->url) ?>" class="text-muted" title="<?= url($row->url) ?>" target="_blank" rel="noreferrer"><?= url($row->url) ?></a>
                                    </span>
                                    <?php endif ?>
                                </span>

                                </div>
                            </div>
                            <div class="col-2">
                                <?php if(!in_array($row->type, ['mail', 'text', 'youtube', 'vimeo', 'tiktok', 'twitch', 'spotify', 'soundcloud', 'applemusic', 'tidal', 'anchor', 'twitter_tweet', 'instagram_media', 'rss_feed', 'custom_html', 'vcard', 'divider'])): ?>
                                    <a href="<?= url('biolink-block/' . $row->id . '/statistics') ?>">
                                        <span data-toggle="tooltip" title="<?= language()->links->clicks ?>" class="badge badge-light"><i class="fa fa-fw fa-sm fa-chart-bar mr-1"></i> <?= nr($row->clicks) ?></span>
                                    </a>
                                <?php endif ?>
                            </div>
                            <div class="col-2 col-md-auto">
                                <div class="form-check form-switch">
                                    <input
                                    class="form-check-input"
                                    type="checkbox"
                                    id="biolink_block_is_enabled_<?= $row->id ?>"
                                    data-row-id="<?= $row->id ?>"
                                    {{ $row->is_enebled? 'checked':'' }}>
                                    <label class="custom-control-label clickable" for="biolink_block_is_enabled_<?= $row->id ?>"></label>
                                </div>
                            </div>
                            <div class="col-1 d-flex justify-content-end">
                                <div class="dropdown">
                                    <button type="button" class="btn btn-link text-secondary dropdown-toggle dropdown-toggle-simple" data-bs-toggle="dropdown">
                                        <i class="fa fa-fw fa-ellipsis-v"></i>
                                    </button>

                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a
                                           class="dropdown-item"
                                           data-bs-toggle="collapse"
                                           data-bs-target="#biolink_block_expanded_content<?= $row->id ?>"
                                           href="#biolink_block_expanded_content<?= $row->id ?>"
                                           aria-expanded="false"
                                           aria-controls="biolink_block_expanded_content<?= $row->id ?>"
                                        >
                                            <i class="fa fa-fw fa-pencil-alt"></i> <?= language()->global->edit ?>
                                        </a>

                                        <?php if(!in_array($row->type, ['mail', 'text', 'youtube', 'vimeo', 'tiktok', 'twitch', 'spotify', 'soundcloud', 'applemusic', 'tidal', 'anchor', 'twitter_tweet', 'instagram_media', 'rss_feed', 'custom_html', 'vcard', 'divider'])): ?>
                                            <a href="<?= url('link/' . $row->id . '/statistics') ?>" class="dropdown-item"><i class="fa fa-fw fa-chart-bar"></i> <?= language()->link->statistics->link ?></a>
                                        <?php endif ?>

                                        <?php if($row->type == 'link'): ?>
                                        <a href="#" class="dropdown-item" data-duplicate="true" data-row-id="<?= $row->id ?>"><i class="fa fa-fw fa-copy"></i> <?= language()->link->biolink_blocks->duplicate ?></a>
                                        <?php endif ?>

                                        <a href="#" data-bs-toggle="modal" data-bs-target="#biolink_block_delete" class="dropdown-item" data-biolink-block-id="<?= $row->id ?>"><i class="fa fa-fw fa-times"></i> <?= language()->global->delete ?></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="collapse mt-3" id="biolink_block_expanded_content<?= $row->id ?>" data-link-type="<?= $row->type ?>">
                            @php
                                $ss = "users.biolink_blocks.".$row->type.'.'. $row->type."_update_form";
                            @endphp
                            @include($ss)
                        </div>
                    </div>
                </div>
                @endforeach
                @else
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex flex-column align-items-center justify-content-center mt-5">
                            <img src="{{ asset('dashboard/images/no_rows.svg') }}" class="col-10 col-md-8 col-lg-6 mb-4" alt="<?= language()->link->biolink_blocks->no_data ?>" />
                            <h2 class="h4 text-muted"><?= language()->link->biolink_blocks->no_data ?></h2>
                        </div>
                    </div>
                </div>
                @endif
            </div>
          </div>
    </div>
    <div class="col-12 col-lg-6 mt-5 mt-lg-0 d-flex justify-content-center">
        <div class="biolink-preview-container">
            <div class="biolink-preview">
                <div class="biolink-preview-iframe-container container-disabled-simple">
                    <iframe id="biolink_preview_iframe" class="biolink-preview-iframe" src="{{ url($link->url) }}"></iframe>
                </div>
            </div>
        </div>
    </div>
</div>
@include('inc.modals.biolink_link_create_modal')
@include('inc.biolink_Block.tiktok')
@include('inc.biolink_Block.link')
@include('inc.biolink_Block.image')
@include('inc.biolink_Block.youtube.youtube_create_modal')
@include('inc.biolink_Block.spotify.spotify_create_modal')
@include('inc.biolink_Block.soundcloud.soundcloud_create_modal')
@include('inc.biolink_Block.twitch.twitch_create_modal')
@include('inc.biolink_Block.text.text_create_modal')
@include('inc.biolink_Block.mail.mail_create_modal')
@include('inc.biolink_Block.vimeo.vimeo_create_modal')
@include('inc.modals.biolink_block_delete_modal')
@endsection

@section('scripts')
<script src="{{ asset('dashboard/libraries/sortable.js') }}"></script>
<script src="{{ asset('dashboard/libraries/pickr.min.js') }}"></script>

<script>
    /* Settings Tab */
    /* Initiate the color picker */
    let pickr_options = {
        comparison: false,

        components: {
            preview: true,
            opacity: true,
            hue: true,
            comparison: false,
            interaction: {
                hex: true,
                rgba: false,
                hsla: false,
                hsva: false,
                cmyk: false,
                input: true,
                clear: false,
                save: true
            }
        }
    };

    /* Helper to generate avatar preview */
    function generate_image_preview(input) {

        if(input.files && input.files[0]) {
            let reader = new FileReader();

            reader.onload = event => {
                $('#image_file_preview').attr('src', event.target.result);
                $('#biolink_preview_iframe').contents().find('#image').attr('src', event.target.result).show();
            };

            reader.readAsDataURL(input.files[0]);
        }
    }

    $('#image_file_input').on('change', event => {
        $('#image_file_status').show();

        $('[data-toggle="tooltip"]').tooltip();

        $('input[name="image_delete"]').val(false);

        generate_image_preview(event.currentTarget);
    });

    $('#image_file_remove').on('click', () => {
        let default_src = $('#image_file_preview').attr('data-default-src');
        let empty_src = $('#image_file_preview').attr('data-empty-src');

        /* Check if new avatar is selected and act accordingly */
        if($('#image_file_input').get(0).files.length > 0) {

            /* Check if we had a non default image previously */
            if(default_src == empty_src) {
                $('#image_file_preview').attr('src', empty_src);
                $('#biolink_preview_iframe').contents().find('#image').hide();
                $('#image_file_status').hide();
            } else {
                $('#image_file_preview').attr('src', default_src);
                $('#image_file_input').replaceWith($('#image_file_input').val('').clone(true));
            }

        } else {
            $('#image_file_preview').attr('src', empty_src);
            $('#biolink_preview_iframe').contents().find('#image').hide();
            $('input[name="image_delete"]').val(true);
            $('#image_file_status').hide();
        }

    });

    /* Preview handlers */
    $('#settings_title').on('change paste keyup', event => {
        $('#biolink_preview_iframe').contents().find('#title').text($(event.currentTarget).val());
    });

    $('#settings_description').on('change paste keyup', event => {
        $('#biolink_preview_iframe').contents().find('#description').text($(event.currentTarget).val());
    });

    /* Text Color Handler */
    let settings_text_color_pickr = Pickr.create({
        el: '#settings_text_color_pickr',
        default: $('#settings_text_color').val(),
        ...{
            comparison: false,

            components: {
                preview: true,
                opacity: false,
                hue: true,
                comparison: false,
                interaction: {
                    hex: true,
                    rgba: false,
                    hsla: false,
                    hsva: false,
                    cmyk: false,
                    input: true,
                    clear: false,
                    save: true
                }
            }
        }
    });

    settings_text_color_pickr.on('change', hsva => {
        $('#settings_text_color').val(hsva.toHEXA().toString());


        $('#biolink_preview_iframe').contents().find('header').css('color', hsva.toHEXA().toString());
        $('#biolink_preview_iframe').contents().find('#branding').css('color', hsva.toHEXA().toString());
    });

    /* Socials Color Handler */
    let settings_socials_color_pickr = Pickr.create({
        el: '#settings_socials_color_pickr',
        default: $('#settings_socials_color').val(),
        ...pickr_options
    });

    settings_socials_color_pickr.on('change', hsva => {
        $('#settings_socials_color').val(hsva.toHEXA().toString());


        $('#biolink_preview_iframe').contents().find('#socials a svg').css('color', hsva.toHEXA().toString());
    });

    /* Background Type Handler */
    let background_type_handler = () => {
        let type = $('#settings_background_type').find(':selected').val();

        /* Show only the active background type */
        $(`div[id="background_type_${type}"]`).show();
        $(`div[id="background_type_${type}"]`).find('[name^="background"]').removeAttr('disabled');

        /* Disable the other possible types so they dont get submitted */
        let background_type_containers = $(`div[id^="background_type_"]:not(div[id$="_${type}"])`);

        background_type_containers.hide();
        background_type_containers.find('[name^="background"]').attr('disabled', 'disabled');
    };

    background_type_handler();

    $('#settings_background_type').on('change', background_type_handler);

    /* Preset Baclground Preview */
    $('#background_type_preset input[name="background"]').on('change', event => {
        let value = $(event.currentTarget).val();

        $('#biolink_preview_iframe').contents().find('body').attr('class', `link-body link-body-background-${value}`).attr('style', '');
    });

    /* Gradient Background */
    let settings_background_type_gradient_color_one_pickr = Pickr.create({
        el: '#settings_background_type_gradient_color_one_pickr',
        default: $('#settings_background_type_gradient_color_one').val(),
        ...pickr_options
    });

    settings_background_type_gradient_color_one_pickr.on('change', hsva => {
        $('#settings_background_type_gradient_color_one').val(hsva.toHEXA().toString());

        let color_one = $('#settings_background_type_gradient_color_one').val();
        let color_two = $('#settings_background_type_gradient_color_two').val();

        $('#biolink_preview_iframe').contents().find('body').attr('class', 'link-body').attr('style', `background-image: linear-gradient(135deg, ${color_one} 10%, ${color_two} 100%);`);
    });

    let settings_background_type_gradient_color_two_pickr = Pickr.create({
        el: '#settings_background_type_gradient_color_two_pickr',
        default: $('#settings_background_type_gradient_color_two').val(),
        ...pickr_options
    });

    settings_background_type_gradient_color_two_pickr.on('change', hsva => {
        $('#settings_background_type_gradient_color_two').val(hsva.toHEXA().toString());

        let color_one = $('#settings_background_type_gradient_color_one').val();
        let color_two = $('#settings_background_type_gradient_color_two').val();

        $('#biolink_preview_iframe').contents().find('body').attr('class', 'link-body').attr('style', `background-image: linear-gradient(135deg, ${color_one} 10%, ${color_two} 100%);`);
    });

    /* Color Background */
    let settings_background_type_color_pickr = Pickr.create({
        el: '#settings_background_type_color_pickr',
        default: $('#settings_background_type_color').val(),
        ...pickr_options
    });

    settings_background_type_color_pickr.on('change', hsva => {
        $('#settings_background_type_color').val(hsva.toHEXA().toString());

        $('#biolink_preview_iframe').contents().find('body').attr('class', 'link-body').attr('style', `background: ${hsva.toHEXA().toString()};`);
    });

    /* Image Background */
    function generate_background_preview(input) {
        if(input.files && input.files[0]) {
            let reader = new FileReader();

            reader.onload = event => {
                $('#background_type_image_preview').attr('src', event.target.result);
                $('#biolink_preview_iframe').contents().find('body').attr('class', 'link-body').attr('style', `background: url(${event.target.result});`);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }

    $('#background_type_image_input').on('change', event => {
        generate_background_preview(event.currentTarget);
    });

    /* Display branding switcher */
    $('#display_branding').on('change', event => {
        if($(event.currentTarget).is(':checked')) {
            $('#biolink_preview_iframe').contents().find('#branding').show();
        } else {
            $('#biolink_preview_iframe').contents().find('#branding').hide();
        }
    });

    /* Branding change */
    $('#branding_name').on('change paste keyup', event => {
        $('#biolink_preview_iframe').contents().find('#branding').text($(event.currentTarget).val());
    });

    $('#branding_url').on('change paste keyup', event => {
        $('#biolink_preview_iframe').contents().find('#branding').attr('src', ($(event.currentTarget).val()));
    });

    /* Form handling */
    $('form[name="update_biolink"],form[name="update_biolink_"]').on('submit', event => {
        // event.preventDefault();
        let form = $(event.currentTarget)[0];
        let data = new FormData(form);
        let notification_container = $(event.currentTarget).find('.notification-container');

        $.ajax({
            type: 'POST',
            enctype: 'multipart/form-data',
            processData: false,
            contentType: false,
            cache: false,
            url: event.currentTarget.getAttribute('name') == 'update_biolink_' ? '/biolink-block-ajax' : '/link-ajax',
            data: data,
            success: (data) => {

                // console.log(data)
                display_notifications(data.message, data.status, notification_container);

                // notification_container[0].scrollIntoView();

                /* Update image previews for some link types */
                if(event.currentTarget.getAttribute('name') == 'update_biolink_' && data?.image_prop) {

                    if(data.details.image_url) {
                        event.currentTarget.querySelector('img').setAttribute('src', data.details.image_url);
                        event.currentTarget.querySelector('img').classList.remove('d-none');
                        event.currentTarget.querySelector('[data-image-container]').classList.remove('d-none');
                    } else {
                        event.currentTarget.querySelector('img').setAttribute('src', '');
                        event.currentTarget.querySelector('img').classList.add('d-none');
                        event.currentTarget.querySelector('[data-image-container]').classList.add('d-none');
                    }

                    if(event.currentTarget.querySelector('[name="image_remove"]') && event.currentTarget.querySelector('[name="image_remove"]').checked) {
                        event.currentTarget.querySelector('[name="image_remove"]').click();
                    }

                    event.currentTarget.querySelector('input[type="file"]').value = '';
                }

                 /* Refresh iframe */
            $('#biolink_preview_iframe').attr('src', $('#biolink_preview_iframe').attr('src'));


                // update_main_url();

                window.location.reload();

            },
            dataType: 'json'
        });

        event.preventDefault();
    })
</script>


<script>
    /* Links tab */
    let sortable = Sortable.create(document.getElementById('biolink_blocks'), {
        animation: 150,
        handle: '.drag',
        onUpdate: (event) => {

            let biolink_blocks = [];
            $('#biolink_blocks > .biolink_block').each((i, elm) => {
                biolink_blocks.push({
                    biolink_block_id: $(elm).data('biolink-block-id'),
                    order: i
                });
            });

            $.ajax({
                type: 'POST',
                url: '/biolink-block-ajax',
                data: {
                    request_type: 'order',
                    biolink_blocks,
                    '_token':"{{ csrf_token() }}"
                },
                dataType: 'json'
            });

            /* Refresh iframe */
            $('#biolink_preview_iframe').attr('src', $('#biolink_preview_iframe').attr('src'));
        }
    });

    /* Status change handler for the links */
    $('[id^="biolink_block_is_enabled_"]').on('change', event => {
        ajax_call_helper(event, 'biolink-block-ajax', 'is_enabled_toggle','{{ csrf_token() }}', () => {

            $(event.currentTarget).closest('.biolink_block').toggleClass('custom-row-inactive');

            /* Refresh iframe */
            $('#biolink_preview_iframe').attr('src', $('#biolink_preview_iframe').attr('src'));

        });
    });

    /* Duplicate link handler for the links */
    $('[data-duplicate="true"]').on('click', event => {
        ajax_call_helper(event, 'biolink-block-ajax', 'duplicate', '{{ csrf_token() }}',(event,data) => {

            fade_out_redirect({ url: data.url, full: true });

        });
    });

    /* When an expanding happens for a link settings */
    $('[id^="biolink_block_expanded_content"]').on('show.bs.collapse', event => {
        let link_type = $(event.currentTarget).data('link-type');
        let biolink_block_id = $(event.currentTarget.querySelector('input[name="biolink_block_id"]')).val();
        let biolink_link = $('#biolink_preview_iframe').contents().find(`[data-biolink-block-id="${biolink_block_id}"]`);

        switch (link_type) {

            case 'text':
                let title_text_color_pickr_element = event.currentTarget.querySelector('.title_text_color_pickr');
                let description_text_color_pickr_element = event.currentTarget.querySelector('.description_text_color_pickr');

                if(title_text_color_pickr_element) {
                    let color_input = event.currentTarget.querySelector('input[name="title_text_color"]');

                    /* Color Handler */
                    let color_pickr = Pickr.create({
                        el: title_text_color_pickr_element,
                        default: $(color_input).val(),
                        ...pickr_options
                    });

                    color_pickr.off().on('change', hsva => {
                        $(color_input).val(hsva.toHEXA().toString());

                        biolink_link.find('h2').css('color', hsva.toHEXA().toString());
                    });
                }

                if(description_text_color_pickr_element) {
                    let color_input = event.currentTarget.querySelector('input[name="description_text_color"]');

                    /* Color Handler */
                    let color_pickr = Pickr.create({
                        el: description_text_color_pickr_element,
                        default: $(color_input).val(),
                        ...pickr_options
                    });

                    color_pickr.off().on('change', hsva => {
                        $(color_input).val(hsva.toHEXA().toString());

                        biolink_link.find('p').css('color', hsva.toHEXA().toString());
                    });
                }

                break;

            default:

                biolink_link = biolink_link.find('a');
                let text_color_pickr_element = event.currentTarget.querySelector('.text_color_pickr');
                let background_color_pickr_element = event.currentTarget.querySelector('.background_color_pickr');

                /* Schedule Handler */
                // let schedule_handler = () => {
                //     if($(event.currentTarget.querySelector('input[name="schedule"]')).is(':checked')) {
                //         $(event.currentTarget.querySelector('.schedule_container')).show();
                //     } else {
                //         $(event.currentTarget.querySelector('.schedule_container')).hide();
                //     }
                // };

                // $(event.currentTarget.querySelector('input[name="schedule"]')).off().on('change', schedule_handler);

                // schedule_handler();

                /* Daterangepicker */
                // let locale = <?= json_encode(require app_path() . '/includes/daterangepicker_translations.php') ?>;
                // $('[name="start_date"],[name="end_date"]').daterangepicker({
                //     minDate: new Date(),
                //     alwaysShowCalendars: true,
                //     singleCalendar: true,
                //     singleDatePicker: true,
                //     locale: {...locale, format: 'YYYY-MM-DD HH:mm:ss'},
                //     timePicker: true,
                //     timePicker24Hour: true,
                //     timePickerSeconds: true,
                // }, (start, end, label) => {
                // });


                /* Name, icon and image thumbnail */
                let outside_event = event;
                $(event.currentTarget.querySelector('input[name="name"]')).off().on('change paste keyup', event => {

                    let name = $(event.currentTarget).val();

                    /* Set the name in the preview */
                    biolink_link.text(name);
                    $(outside_event.currentTarget.querySelector('input[name="icon"]')).trigger('change');

                    /* Set the name in the form title */
                    $(`[data-target="#biolink_block_expanded_content${biolink_block_id}"] > strong`).text(name);

                });

                $(event.currentTarget.querySelector('input[name="icon"]')).off().on('change paste keyup', event => {
                    let icon = $(event.currentTarget).val();

                    if(!icon) {
                        biolink_link.find('svg').remove();
                    } else {

                        biolink_link.find('svg,i').remove();
                        biolink_link.prepend(`<i class="${icon} mr-1"></i>`);

                    }

                });

                // $(event.currentTarget.querySelector('input[name="image"]')).off().on('change paste keyup', event => {
                //     biolink_link.find('div').show();
                //     biolink_link.find('img').attr('src', $(event.currentTarget).val());
                // });

                if(text_color_pickr_element) {
                    let color_input = event.currentTarget.querySelector('input[name="text_color"]');

                    /* Background Color Handler */
                    let color_pickr = Pickr.create({
                        el: text_color_pickr_element,
                        default: $(color_input).val(),
                        ...pickr_options
                    });

                    color_pickr.off().on('change', hsva => {
                        $(color_input).val(hsva.toHEXA().toString());

                        biolink_link.css('color', hsva.toHEXA().toString());
                    });
                }

                if(background_color_pickr_element) {
                    let color_input = event.currentTarget.querySelector('input[name="background_color"]');

                    /* Background Color Handler */
                    let color_pickr = Pickr.create({
                        el: background_color_pickr_element,
                        default: $(color_input).val(),
                        ...pickr_options
                    });

                    color_pickr.off().on('change', hsva => {
                        $(color_input).val(hsva.toHEXA().toString());

                        /* Change the background or the border color */
                        if(biolink_link.css('background-color') != 'rgba(0, 0, 0, 0)') {
                            biolink_link.css('background-color', hsva.toHEXA().toString());
                        } else {
                            biolink_link.css('border-color', hsva.toHEXA().toString());
                        }
                    });
                }

                $(event.currentTarget.querySelector('input[name="outline"]')).off().on('change', event => {

                    let outline = $(event.currentTarget).is(':checked');

                    if(outline) {
                        /* From background color to border */
                        let background_color = biolink_link.css('background-color');

                        biolink_link.css('background-color', 'transparent');
                        biolink_link.css('border', `.1rem solid ${background_color}`);
                    } else {
                        /* From border to background color */
                        let border_color = biolink_link.css('border-color');

                        biolink_link.css('background-color', border_color);
                        biolink_link.css('border', 'none');
                    }

                });

                $(event.currentTarget.querySelector('select[name="border_radius"]')).off().on('change', event => {

                    let border_radius = $(event.currentTarget).find(':selected').val();

                    switch(border_radius) {
                        case 'straight':

                            biolink_link.removeClass('link-btn-round link-btn-rounded');

                            break;

                        case 'round':

                            biolink_link.removeClass('link-btn-rounded').addClass('link-btn-round');

                            break;

                        case 'rounded':

                            biolink_link.removeClass('link-btn-round').addClass('link-btn-rounded');

                            break;
                    }

                });

                let current_animation = $(event.currentTarget.querySelector('select[name="animation"]')).val();

                $(event.currentTarget.querySelector('select[name="animation"]')).off().on('change', event => {

                    let animation = $(event.currentTarget).find(':selected').val();

                    switch(animation) {
                        case 'false':

                            biolink_link.removeClass(`animated ${current_animation}`);
                            current_animation = false;

                            break;

                        default:

                            biolink_link.removeClass(`animated ${current_animation}`).addClass(`animated ${animation}`);
                            current_animation = animation;

                            break;
                    }

                });
        }
    })



</script>


@endsection
