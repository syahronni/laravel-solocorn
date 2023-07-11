@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Create Product') }}</div>

                <div class="card-body">
                    <form action="{{ route('product.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                          <label for="">Category</label>
                          <select class="form-control" name="category_id" id="">
                            <option value="">-</option>
                            @foreach ($category as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                          </select>
                        </div>
                        <div class="form-group">
                            <label for="">Product Name:</label>
                            <input type="text" class="form-control" name="name" id="" aria-describedby="helpId"
                                placeholder="">
                            @error('name')
                            <small id="helpId" class="form-text text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Description</label>
                            <textarea class="form-control" name="description" id="" rows="3"></textarea>
                            @error('description')
                            <small id="helpId" class="form-text text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Price</label>
                            <input type="number" class="form-control" name="price" id="" aria-describedby="helpId"
                                placeholder="">
                            @error('price')
                            <small id="helpId" class="form-text text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group mt-4">
                          <label for="">Image</label>
                          <input type="file" class="form-control" name="image" id="" placeholder="" aria-describedby="fileHelpId">
                          @error('image')
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