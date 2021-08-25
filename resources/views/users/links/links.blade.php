@extends('layouts.user-layouts')

@section('content')
<div class="container w-75 mt-4">
    <div class="d-flex justify-content-between">
        <h5>Links</h5>
        <div class="dropdown">
            <a class="btn btn-primary rounded" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                Create Link
            </a>

            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
              <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="bx bx-dot"></i> Biolink Page</a></li>
              <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#shortentlinkModal">Shortend Url</a></li>
            </ul>
          </div>
    </div>
    <div class="mt-5">
       <div class="notification-container"></div>
        @if (count($links) > 0)
        @foreach ($links as $row)
        <div class="card my-4 <?= $row->is_enabled ? null : 'custom-row-inactive' ?>">
            <div class="card-body">
                <div class="row">
                    <div class="col-8 col-lg-5">
                        <div class="d-flex align-items-center">
                            <div class="mr-3 d-flex align-items-center">
                                <span class="fa-stack fa-1x" data-bs-toggle="tooltip" title="<?= language()->link->{$row->type}->name ?>">
                                    <i class="fa fa-circle fa-stack-2x" style="color: <?= language()->link->{$row->type}->color ?>"></i>
                                    <i class="fas <?= language()->link->{$row->type}->icon ?> fa-stack-1x fa-inverse"></i>
                                </span>
                            </div>
                
                            <div class="d-flex flex-column" style="min-width: 0;">
                                <div class="d-inline-block text-truncate">
                                    <a href="<?= url('link/' . $row->link_id) ?>" class="font-weight-bold"><?= $row->url ?></a>
                                </div>
                                <div class="d-flex align-items-center">
                                    <span class="d-inline-block text-truncate">
                                    <?php if(!empty($row->location_url)): ?>
                                        <img src="https://external-content.duckduckgo.com/ip3/" class="img-fluid icon-favicon mr-1" />
                                        <a href="<?= $row->location_url ?>" class="text-muted align-middle" target="_blank" rel="noreferrer"><?= $row->location_url ?></a>
                                    <?php else: ?>
                                        <img src="https://external-content.duckduckgo.com/ip3/" class="img-fluid icon-favicon mr-1" />
                                        <a href="<?= $row->full_url ?>" class="text-muted align-middle" target="_blank" rel="noreferrer"><?= $row->full_url ?></a>
                                    <?php endif ?>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                
                    <div class="col col-lg-3 d-none d-lg-flex flex-lg-row justify-content-lg-between align-items-center">
                        <div>
                            <?php if($row->project_id): ?>
                                <a href="<?= url('links?project_id=' . $row->project_id) ?>" class="text-decoration-none">
                                    <span class="py-1 px-2 border rounded text-muted small" style="border-color: <?= $data->projects[$row->project_id]->color ?> !important;">
                                        <?= $data->projects[$row->project_id]->name ?>
                                    </span>
                                </a>
                            <?php endif ?>
                        </div>
                
                        <div>
                            <a href="<?= url('link/' . $row->link_id . '/statistics') ?>">
                                <span data-toggle="tooltip" title="<?= language()->links->clicks ?>"><span class="badge badge-light"><i class="fa fa-fw fa-sm fa-chart-bar mr-1"></i> <?= nr($row->clicks) ?></span></span>
                            </a>
                        </div>
                    </div>
                
                    <div class="col col-lg-2 d-none d-lg-flex justify-content-lg-end align-items-center">
                        <small class="text-muted" data-bs-toggle="tooltip" title="<?= language()->links->datetime ?>"><i class="fa fa-fw fa-calendar-alt fa-sm mr-1"></i> <span class="align-middle"></span></small>
                    </div>
                
                    <div class="col-2 col-lg-1 d-flex justify-content-center justify-content-lg-end align-items-center">
                        <div class="form-check form-switch" data-bs-toggle="tooltip" title="<?= language()->links->is_enabled_tooltip ?>">
                            <input class="form-check-input" 
                            type="checkbox" 
                            data-row-id="<?= $row->id ?>"
                            onchange="ajax_call_helper(event, 'link-ajax', 'is_enabled_toggle',' {{ csrf_token() }}')"
                             {{ $row->is_enabled == 1 ? 'checked' : null }}>
                            <label class="form-check-label"></label>
                        </div>
                       
                    </div>
                
                    <div class="col-2 col-lg-1 d-flex justify-content-center justify-content-lg-end align-items-center">
                        <div class="dropdown">
                            <button type="button" class="btn btn-link text-secondary dropdown-toggle dropdown-toggle-simple" data-bs-toggle="dropdown">
                                <i class="fa fa-fw fa-ellipsis-v"></i>
                            </button>
                
                            <div class="dropdown-menu dropdown-menu-right">
                                <a href="{{ url('user/link', ['id'=>$row->id]) }}" class="dropdown-item"><i class="fa fa-fw fa-pencil-alt"></i> <?= language()->global->edit ?></a>
                                <a href="<?= url('link/' . $row->link_id . '/statistics') ?>" class="dropdown-item"><i class="fa fa-fw fa-chart-bar"></i> <?= language()->link->statistics->link ?></a>
                                {{-- <a href="{{ url('link/' . $row->link_id . '/qr') }}" class="dropdown-item"><i class="fa fa-fw fa-qrcode"></i> {{ language()->link->qr->link }} </a> --}}
                                <a href="#" data-bs-toggle="modal" data-bs-target="#link_delete" class="dropdown-item" data-link-id="<?= $row->id ?>"><i class="fa fa-fw fa-times"></i> <?= language()->global->delete ?></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        @else
        <div class="d-flex flex-column align-items-center justify-content-center mt-5">
            <img src="{{ asset('dashboard/images/no_rows.svg') }}" class="col-10 col-md-6 col-lg-4 mb-4" alt="<?= language()->links->no_data ?>" />
            <h2 class="h4 text-muted mb-4"><?= language()->links->no_data ?></h2>
        </div>
        @endif
    </div>
</div>

@include('inc.modals.biolinkModal')
@include('inc.modals.link_delete_modal')
@include('inc.modals.shortendUrlModal')

@endsection

@section('scripts')
<script>
    $('#create_biolink').click(function(e){
        e.preventDefault();

        var url = $('#url').val();
        var type = $('#type').val();

        $.post('/user/create-biolink',{'url':url,'type':type,'_token':"{{ csrf_token() }}"}).then(e=>{
            if(e.status == 'success')
            {
                fade_out_redirect({ url: e.url, full: true });
            }
        })
    })
</script>
@endsection
