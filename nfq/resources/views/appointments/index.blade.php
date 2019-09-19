@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h2>Appointments List</h2>
            </div>
        </div>
        @if(count($appointments) == null)
            <div class="row">
                <div class="col-md-8">
                    <h5>No active appointments</h5>
                </div>
            </div>
        @else
            <div class="row">
                <div class="col-md-8">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead class="thead-dark">
                            <tr class="text-center">
                                <th>Id</th>
                                <th>Customer name</th>
                                <th>Status</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($appointments as $appointment)
                                <tr class="text-center">
                                    <td>{{ $appointment->id }}</td>
                                    <td>{{ $appointment->customer_name }}</td>
                                    <td>
                                        <form action="{{ route('appointments.update', [$appointment->id]) }}"
                                              method="post">
                                            @csrf
                                            @method('PATCH')
                                            <input type="submit" value="Complete" class="btn btn-success">
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            @foreach($allCompleted as $completed)
                                <tr class="text-center">
                                    <td>{{ $completed->id }}</td>
                                    <td>{{ $completed->customer_name }}</td>
                                    <td>
                                        Appointment completed
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        @endif

    </div>

@endsection