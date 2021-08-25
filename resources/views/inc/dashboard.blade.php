<!--breadcrumb-->
<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
    <div class="breadcrumb-title pe-3 text-capitalize">{!! $page_title !!}</div>
    <div class="ps-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 p-0">
                <li class="breadcrumb-item"><a href="{{ url('admin/dashboard', []) }}"><i class="bx bx-home-alt"></i></a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">{!! $page_title !!}</li>
            </ol>
        </nav>
    </div>
    <div class="ms-auto">
        @if (isset($button))
        <a href="{{ url($button['link'], []) }}" class="btn btn-primary">{{ $button['title']  }}</a>
        @endif

    </div>
</div>
<!--end breadcrumb-->
