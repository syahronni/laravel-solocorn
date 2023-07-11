@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Product') }}  </div>
                

                <div class="card-body">
                    <a href="{{ route('product.create') }}" class="btn btn-md btn-primary">Create Product</a>
                    @if (session('success'))
                        <div class="alert alert-success mt-3" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif
                    @isset($product)
                    <table class="table table-striped table-inverse table-responsive">
                        <thead class="thead-inverse">
                            <tr>
                                <th>No</th>
                                <th>Product</th>
                                <th>Category</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($product as $item)
                            <tr>
                                @php
                                $no = 1;
                                @endphp
                                <td scope="row">{{ $no++ }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->category->name }}</td>
                                <td>
                                    <div class="btn-group" role="group" aria-label="Button group">
                                        <a href="{{ url('product/edit/'.$item->id) }}" class="btn btn-md btn-success">Edit</a>
                                        <a href="{{ url('product/'.$item->id) }}" class="btn btn-md btn-info">Show</a>
                                        <a href="{{ url('product/delete/'.$item->id) }}" class="btn btn-md btn-danger">Delete</a>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @endisset
                </div>
            </div>
        </div>
    </div>
</div>
@endsection