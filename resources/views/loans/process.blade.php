@extends('layouts.app')

@section('content')
<div class="bg-white rounded-lg shadow-md p-6">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold">EMI Processing</h2>
        <form method="POST" action="{{ route('loans.process-emi') }}" class="inline">
            @csrf
            <button type="submit">
                Process Data
            </button>
        </form>
    </div>

    @if(isset($emiData) && count($emiData) > 0)
        <div class="overflow-x-auto">
            <table class="min-w-full table-auto">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Client ID</th>
                        @foreach($emiData[0] as $key => $value)
                            @if($key !== 'clientid')
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">{{ $key }}</th>
                            @endif
                        @endforeach
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($emiData as $row)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $row->clientid }}</td>
                            @foreach($row as $key => $value)
                                @if($key !== 'clientid')
                                    <td class="px-6 py-4 whitespace-nowrap">{{ number_format($value, 2) }}</td>
                                @endif
                            @endforeach
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <div class="text-center text-gray-500 py-8">
            Click the "Process Data" button to generate EMI details.
        </div>
    @endif
</div>
@endsection