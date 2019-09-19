@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="{{ route('appointments.store') }}" method="post">
            <div class="row">
                <div class="col-md-6">
                    <h2 class="mb-4">Create New Appointment</h2>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @csrf
                    @method('post')
                    <div class="form-group">
                        <input type="text" name="customer_name" placeholder="Please enter Your name" required
                               class="form-control"
                               value="{{ old('customer_name') }}">
                    </div>
                    <input type="submit" value="Save" class="btn btn-success">
                </div>
            </div>
        </form>
    </div>
@endsection