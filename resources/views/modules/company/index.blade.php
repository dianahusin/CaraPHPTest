@extends('layouts.app')

@section('content')

@if(session()->has('success'))
<div class="alert alert-success ml-3 mr-3">
    {{ session()->get('success') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif
@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<div class="content p-3">
    <section class="card mb-2">
        <h5 class="card-header d-flex justify-content-between align-items-center">
            Companies
            <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#create"> Add New Company</button>
            @include('modules.company.modal.create')
          </h5>
        <form class="card-body">
            <table class="table" id="companytable">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Website</th>
                        <th scope="col">Email</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($companies as $company)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$company->name}}</td>
                        <td>{{$company->website}}</td>
                        <td>{{$company->email}}</td>
                        <td>
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#update-{{$company->id}}">Edit</button>
                            <a href="{{route('company.destroy', $company->id)}}" class="btn btn-delete btn-danger">Delete</a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6">
                            <div class="alert-warning text-center p-3">No Record</div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
            @include('modules.company.modal.update')
        </form>
        <div class="m-2">
            {{$companies->links()}}
        </div>
    </section>
</div>
@endsection
