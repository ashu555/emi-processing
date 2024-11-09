@extends('layouts.app')

@section('content')
<div class="bg-white rounded-lg shadow-md p-8 max-w-4xl mx-auto mt-10">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-3xl font-bold text-gray-800">Loan Details</h2>
        <a href="{{ route('process') }}" class="px-4 py-2 bg-blue-600 text-white font-semibold rounded-lg shadow hover:bg-blue-700 transition duration-200">
            Process EMI
        </a>
    </div>

    <div class="overflow-x-auto rounded-lg shadow">
        <table class="min-w-full bg-white border border-gray-200 divide-y divide-gray-200">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-6 py-3 text-left text-sm font-semibold text-gray-600 uppercase tracking-wider border-b">Client ID</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold text-gray-600 uppercase tracking-wider border-b">Number of Payments</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold text-gray-600 uppercase tracking-wider border-b">First Payment Date</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold text-gray-600 uppercase tracking-wider border-b">Last Payment Date</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold text-gray-600 uppercase tracking-wider border-b">Loan Amount</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach($loans as $loan)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap text-gray-800 text-sm">{{ $loan->clientid }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-gray-800 text-sm">{{ $loan->num_of_payment }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-gray-800 text-sm">{{ $loan->first_payment_date->format('Y-m-d') }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-gray-800 text-sm">{{ $loan->last_payment_date->format('Y-m-d') }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-gray-800 text-sm font-medium">{{ number_format($loan->loan_amount, 2) }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
