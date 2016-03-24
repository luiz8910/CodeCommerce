@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Editing Categories: {{ $categories->name }}</h1>


        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {!! Form::open(["route" => ["categories.update", $categories->id], "method" => "put"]) !!}

            <div class="form-group">
                {!! Form::label("name", "Name:") !!}
                {!! Form::text("name", $categories->name, ["class"=>"form-control"]) !!}
            </div>

            <div class="form-group">
                {!! Form::label("description", "Description:") !!}
                {!! Form::textarea("description", $categories->description, ["class"=>"form-control"]) !!}
            </div>

            <div class="form-group">
                {!! Form::submit("Save Category", ["class"=>"btn btn-primary"]) !!}
            </div>

        {!! Form::close() !!}
    </div>
@endsection
