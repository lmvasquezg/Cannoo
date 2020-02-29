@extends('layouts.master')

@section('content')
<div class="container">
    <a class="btn btn-info" href="{{ route('client.create') }}">
        @lang('messages.newClient')
    </a>
</div>


<div class="container">
    <div class="row justify-content-center">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">@lang('messages.name')</th>
                </tr>
            </thead> 
            <tbody>
                @foreach($clients as $client)
                    <tr>
                        @if ($loop->index <= 1)
                            <td scope="row" style="font-weight:bold">{{ $client -> id }}</td>
                        @else
                            <td scope="row">{{ $client -> id }}</td>
                        @endif
                        <td>{{ $client -> name }}</td>
                        <td><a class="btn btn-info" href="{{ route('client.showClient', $client -> id) }}">@lang('messages.details')</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection