@extends('whatsappnumcheck::layouts.master')

@section('content')
    <div class="container">
        <h1>WhatsApp Validation Results</h1>

        @if(isset($result['numbers']) && is_array($result['numbers']))
            <table class="table">
            <thead>
                <tr>
                    <th>Phone Number</th>
                    <th>Validation Result</th>
                </tr>
            </thead>
            <tbody>
                @foreach($result['numbers'] as $index => $validationResult)
                    <tr>
                        <td>{{ $phoneNumbers[$index] }}</td>
                        <td>{{ $validationResult['wa_id'] == 'valid' ? 'WhatsApp Valid' : 'WhatsApp Invalid' }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        @else
            <p>No validation results available.</p>
        @endif
    </div>
@endsection
