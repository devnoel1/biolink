@extends('layouts.admin-layout')

@section('content')

@include('inc.dashboard')


<div class="table-responsive">
    <table id="example2" class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>Plan Name</th>
                <th>Price</th>
                <th>Duration</th>
                <th>Users</th>
                <th>Status</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($plans as $item)
            <tr>
                <th>{{ $item->plan_name }}</th>
                <td>{{ $item->price }}</td>
                <td>{{ $item->duration }} Days</td>
                <td>
                    <i class="bx bx-group"></i> 0
                </td>
                <td class="text-center" width="20">
                    {!! ($item->status == 1 )? '<span class="badge bg-success">Active</span>':'<span class="badge bg-secondary">Hidden</span>'  !!}
                </td>
                <td width="20">
                    <a href="{{ url('admin/plan', ['id'=>$item->id]) }}" class="btn btn-sm btn-primary"><i class="bx bx-pencil"></i> Edit</a>
                    <a href="{{ url('admin/plan-delete', ['id'=>$item->id]) }}" class="btn btn-sm btn-danger"><i class="bx bx-trash"></i> Delete</a>
                </td>
            </tr>
            @endforeach

        </tbody>
    </table>
</div>
@endsection
