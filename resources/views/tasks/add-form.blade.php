@extends('layouts.app')

@section('title',  __('Add new task'))

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        {{ __('Add new task') }}
                        <a class="btn btn-primary" href="{{route('index')}}">Back to tasks list</a>
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form action="{{route('add')}}" method="POST">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name">{{__('User name')}}</label>
                                    <input type="text" class="form-control" id="name" name="name" placeholder="{{__('User name')}}" required>
                                </div>
                                <div class="form-group">
                                    <label for="email">{{__('User email')}}</label>
                                    <input type="email" class="form-control" id="email" name="email" placeholder="{{__('User email')}}" required>
                                </div>
                                <div class="input-group">
                                    <label for="text">Task text</label>
                                </div>
                                <div class="input-group">
                                    <textarea class="form-control" id="text" name="text" required placeholder="{{__('Task text')}}"></textarea>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


