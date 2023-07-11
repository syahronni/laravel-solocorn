@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Create Category') }}</div>

                <div class="card-body">
                    <form action="{{ route('category.store') }}" method="post">
                        @csrf
                        
                        <div class="form-group">
                            <label for="">Category Name:</label>
                            <input type="text" class="form-control" name="name" id="" aria-describedby="helpId" placeholder="">
                            @error('name')
                            <small id="helpId" class="form-text text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary mt-3">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
