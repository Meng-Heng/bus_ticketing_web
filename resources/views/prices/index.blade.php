@extends('layout')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Prices</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class=" text-primary">
                                <th>ID</th>
                                <th>Price</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                                <th></th>
                            </thead>
                            <tbody>
                                @foreach ($prices as $price)
                                    <tr>
                                        <td>{{ $price->id }}</td>
                                        <td>{{ $price->price }}</td>
                                        <td>{{ $price->created_at }}</td>
                                        <td>{{ $price->updated_at }}</td>
                                        <td>
                                            <a href="{{ route('prices.edit', $price->id) }}" class="btn btn-primary">Edit</a>
                                            <form action="{{ route('prices.destroy', $price->id) }}" method="POST" style="display: inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection