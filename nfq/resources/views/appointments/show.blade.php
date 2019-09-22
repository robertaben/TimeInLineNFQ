@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 text-center">
                @if ($appointment->status == 1)
                    <h4>{{$appointment->customer_name}}, your appointment is finished</h4>
                @else
                    <h3 class="pb-3">Welcome {{$appointment->customer_name}}, your appointment details:</h3>
                    <div class="table-responsive">
                        <table id="customerTable" class="table table-hover">
                            <thead class="thead-dark">
                            <tr class="text-center">
                                <th>Id</th>
                                <th>Customer name</th>
                                <th>Waiting time</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr class="text-center">
                                <td>{{ $appointment->id }}</td>
                                <td>{{ $appointment->customer_name }}</td>
                                <td>
                                    {{ $appointment->waitingTime($appointment->id, $appointment->user_id) }}
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection

@section('scripts')
        <script>
        function refreshTable(){
            $('#customerTable').load(' #customerTable');
        }
        setInterval(function(){
            refreshTable()
        }, 5000);
    </script>
@stop