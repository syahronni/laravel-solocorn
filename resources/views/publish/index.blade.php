@extends('layouts.app')
@section('content')
<main role="main">
     <div class="album py-5 bg-light">
          <div class="container">
               <div class="row">
                    @foreach ($product as $item)
                         <div class="col-md-3">
                              <div class="card mb-3 box-shadow">
                                   <img class="card-img-top" src="{{ asset('/images/'.$item->image) }}" alt="Card image cap" width="300px" height="200px">
                                   <div class="card-body">
                                        <p class="card-text">
                                             {{ $item->description }}
                                        </p>
                                        <div class="d-flex justify-content-between align-items-center">
                                             <div class="btn-group">
                                                  Rp {{ number_format($item->price) }}
                                             </div>
                                             <small class="text-muted">{{ $item->created_at }}</small>
                                        </div>
                                   </div>
                              </div>
                         </div>
                    @endforeach
               </div>
          </div>
     </div>

</main>

<footer class="text-muted">
     <div class="container">
          <p class="float-right">
               <a href="#">Back to top</a>
          </p>
          <p>Product example is &copy; For My Startup!</p>
     </div>
</footer>
@endsection
