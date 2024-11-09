@extends('layouts.app')

@section('content')
<div class="bg-white rounded-lg shadow-md p-6">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold">Loan Details</h2>
        <a href="{{ route('process') }}" >
            Process EMI
        </a>
    </div>

    <div class="overflow-x-auto">
        <table class="min-w-full table-auto">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Client ID</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Number of Payments</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">First Payment Date</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Last Payment Date</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Loan Amount</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach($loans as $loan)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $loan->clientid }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $loan->num_of_payment }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $loan->first_payment_date->format('Y-m-d') }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $loan->last_payment_date->format('Y-m-d') }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ number_format($loan->loan_amount, 2) }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection