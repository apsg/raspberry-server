@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Aktualne pomiary</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <p>Temperatura: {{ $current->temp ?? '?' }}°C</p>
                        <p>Wilgotność: {{ $current->humidity ?? '?' }}%</p>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
