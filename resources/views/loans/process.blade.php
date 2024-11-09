@extends('layouts.app')

@section('content')
<div class="container my-5">
    <!-- Card container with shadow and rounded borders -->
    <div class="bg-white rounded-lg shadow p-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <!-- Heading with improved typography -->
            <h2 class="font-weight-bold h4 mb-0">EMI Processing</h2>
            <!-- Process Data Button with Bootstrap styling -->
            <form method="POST" action="{{ route('loans.process-emi') }}" class="d-inline">
                @csrf
                <button type="submit" class="btn btn-primary btn-sm">
                    <i class="fas fa-sync-alt"></i> Process Data
                </button>
            </form>
        </div>

        <!-- Table section -->
        @if(isset($emiData) && count($emiData) > 0)
            <!-- Table wrapper for horizontal scrolling -->
            <div class="table-responsive" style="max-height: 500px; overflow-x: auto;">
                <table class="table table-bordered table-hover table-striped">
                    <thead class="bg-primary text-white">
                        <tr>
                            <th class="text-center font-weight-bold">Client ID</th>
                            <!-- Dynamic columns based on months -->
                            @foreach($emiData[0] as $key => $value)
                                @if($key !== 'clientid')
                                    <th class="text-center font-weight-bold">{{ $key }}</th>
                                @endif
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($emiData as $row)
                            <tr>
                                <td class="text-center align-middle font-weight-bold">{{ $row->clientid }}</td>
                                @foreach($row as $key => $value)
                                    @if($key !== 'clientid')
                                        <td class="text-center align-middle text-success">
                                            {{ number_format($value, 2) }}
                                        </td>
                                    @endif
                                @endforeach
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <!-- Message if no data is available -->
            <div class="text-center text-muted py-5">
                <p class="lead">Click the "Process Data" button to generate EMI details.</p>
            </div>
        @endif
    </div>
</div>
@endsection
