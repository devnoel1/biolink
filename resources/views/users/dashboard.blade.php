@extends('layouts.user-layouts')

@section('content')
<div class="row row-cols-1 row-cols-lg-3">
    <div class="col">
        <div class="card radius-10">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="flex-grow-1">
                        <p class="mb-0">Links</p>
                        <h4 class="font-weight-bold">0</h4>
                        {{-- <p class="text-success mb-0 font-13">Analytics for last week</p> --}}
                    </div>
                    <div class="widgets-icons bg-gradient-cosmic text-white"><i class='bx bx-link'></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card radius-10">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="flex-grow-1">
                        <p class="mb-0">Biolinks</p>
                        <h4 class="font-weight-bold">0</h4>
                        {{-- <p class="text-secondary mb-0 font-13">Analytics for last week</p> --}}
                    </div>
                    <div class="widgets-icons bg-gradient-burning text-white">#</i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card radius-10">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="flex-grow-1">
                        <p class="mb-0">Visited</p>
                        <h4 class="font-weight-bold">0</h4>
                        {{-- <p class="text-secondary mb-0 font-13">Analytics for last week</p> --}}
                    </div>
                    <div class="widgets-icons bg-gradient-lush text-white"><i class='bx bx-time'></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col">
		<div class="card">
			<div class="card-body">
				<div id="chart2"></div>
				</div>
			</div>
    </div>
</div>

@endsection
