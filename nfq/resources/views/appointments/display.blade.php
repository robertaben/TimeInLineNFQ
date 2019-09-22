@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 text-center pb-3">
                <h1>Display</h1>
            </div>
        </div>
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead class="thead-dark">
                            <tr class="text-center">
                                <th>Id</th>
                                <th>Customer name</th>
                                <th>Waiting time</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(count($appointments) == null)
                                <tr class="text-center">
                                    <td>-----</td>
                                    <td>-----</td>
                                    <td>-----</td>
                                </tr>
                            @else
                            @foreach($appointments as $appointment)
                                <tr class="text-center">
                                    <td>{{ $appointment->id }}</td>
                                    <td>{{ $appointment->customer_name }}</td>
                                    <td>
                                        {{ $appointment->waitingTime($appointment->id, $appointment->user_id) }}
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