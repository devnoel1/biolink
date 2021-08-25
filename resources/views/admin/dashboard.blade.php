@extends('layouts.admin-layout')

@section('content')
    <div class="row row-cols-1 row-cols-lg-3">
        <div class="col">
            <div class="card radius-10">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-grow-1">
                            <p class="mb-0">Users</p>
                            <h4 class="font-weight-bold">0</h4>

                        </div>
                        <div class="widgets-icons bg-gradient-burning text-white"><i class='bx bx-group'></i>
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
                            <p class="mb-0">BioLink Pages</p>
                            <h4 class="font-weight-bold">0</h4>

                        </div>
                        <div class="widgets-icons bg-gradient-cosmic text-white">#
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
                            <p class="mb-0">Plans</p>
                            <h4 class="font-weight-bold">0</h4>
                        </div>
                        <div class="widgets-icons bg-gradient-kyoto text-white"><i class='bx bxs-cube'></i>
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
                            <p class="mb-0">Shortend Links</p>
                            <h4 class="font-weight-bold">0</h4>
                        </div>
                        <div class="widgets-icons bg-gradient-blues text-white"><i class='bx bx-link'></i>
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
                            <p class="mb-0">Payments</p>
                            <h4 class="font-weight-bold">0</h4>
                        </div>
                        <div class="widgets-icons bg-gradient-moonlit text-white"><i class='lni lni-dollar'></i>
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
                            <p class="mb-0">Pageviews Tracked</p>
                            <h4 class="font-weight-bold">0</h4>
                        </div>
                        <div class="widgets-icons bg-gradient-burning  text-white"><i class='bx bx-bar-chart'></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--end row-->
    <div class="row mt-4">
        <div class="col">
            <h6 class="mb-0 text-uppercase">Latest Users</h6>
			<hr/>
            <div class="card">
                <div class="card-body">
                    <table class="table table-borderless mb-0">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">User</th>
                                <th scope="col">Status</th>
                                <th scope="col">Plan</th>
                                <th scope="col">Details</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th></th>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
