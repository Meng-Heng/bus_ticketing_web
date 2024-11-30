@extends('web.backend.layout.admin')
@section('content')
<main>
    <div class="container-fluid">
        <h1 class="mt-4">Add Price</h1>
        <div class="card mb-4">
            <div class="card-body">
                @if(Session::has('price_created'))
                <div class="alert alert-primary alert-dismissible">
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    <strong>Primary!</strong> {!! session('price_created') !!}
                </div>
                @endif
                @if (count($errors) > 0)
                <!-- Form Error List -->
                <div class="alert alert-danger">
                    <strong>Something is Wrong</strong>
                    <br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{!! $error !!}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <!-- It Create the new Category -->

                {!! Form::open(array('route'=>'price.store')) !!}
                <br>
                {!! Form::label('price', 'Price:') !!}
                <input class="form-control" name="price" type="text" placeholder="Format: 12.99">

                {!! Form::label('currency', 'Currency:') !!}
                <input class="form-control" name="currency" type="text" value="USD" readonly>
                <br>
                {!! Form::submit('Create', array('class'=>'btn btn-primary')) !!}

                <a class="btn btn-primary" href="{!! route('price.view')!!}">Back</a>

                {!! Form::close() !!}
                
            </div>
        </div>
</main>
@endsection