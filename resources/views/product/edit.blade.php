@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Create Product') }}</div>

                <div class="card-body">
                    <form action="{{ route('product.update',$product->id) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="">Category</label>
                            <select class="form-control" name="category_id" id="">
                                <option value="">-</option>
                                @foreach ($category as $item)
                                <option value="{{ $item->id }}" {{ $item->id == $product->category_id ? 'selected' : '' }}>{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Product Name:</label>
                            <input type="text" class="form-control" name="name" id="" aria-describedby="helpId"
                                value="{{ $product->name }}" placeholder="">
                            @error('name')
                            <small id="helpId" class="form-text text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Description</label>
                            <textarea class="form-control" name="description" id=""
                                rows="3">{{ $product->description }}</textarea>
                            @error('description')
                            <small id="helpId" class="form-text text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Price</label>
                            <input type="number" class="form-control" name="price" value="{{ $product->price }}" id=""
                                aria-describedby="helpId" placeholder="">
                            @error('price')
                            <small id="helpId" class="form-text text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group mt-4">
                            <label for="">Image</label>
                            <input type="file" class="form-control" name="image" id="" placeholder=""
                                aria-describedby="fileHelpId">
                            @error('image')
                            <small id="helpId" class="form-text text-danger">{{$message}}</small>
                            @enderror
                            @if (!empty($product->image))
                                <img src="{{ asset('/images/'.$product->image) }}" width="10%" alt="" class="mt-3">
                            @endif

                        </div>
                        <button type="submit" class="btn btn-primary mt-3">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection