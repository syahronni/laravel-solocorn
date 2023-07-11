@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Show Category') }}</div>

                <div class="card-body">
                    <table class="table table-striped table-inverse table-responsive table-bordered">
                        <thead class="thead-inverse">
                            <tr>
                                <th>Detail:</th>
                                <td>{{ $category->name }}</td>
                            </tr>
                        </thead>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection