@extends('layouts.admin-layout')

@section('content')

@include('inc.dashboard')


<div class="table-responsive">
    <table id="example2" class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>User</th>
                <th>Status</th>
                <th>Plan</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $item)
            <tr>
                <th>
                    <div class="d-flex">
                        <div>img</div>
                        <div>
                            <h6>{{ $item->name }}</h6>
                            <p>{{ $item->email }}</p>
                        </div>
                    </div>
                </th>
                <td></td>
                <td></td>
                <td width="20">
                    <a href="{{ url('admin/user', ['id'=>$item->id]) }}" class="btn btn-sm btn-primary"><i class="bx bx-pencil"></i> Edit</a>
                    <a href="{{ url('admin/delete/user', ['id'=>$item->id]) }}" class="btn btn-sm btn-danger"><i class="bx bx-trash"></i> Delete</a>
                </td>
            </tr>
            @endforeach

        </tbody>
    </table>
</div>
@endsection
