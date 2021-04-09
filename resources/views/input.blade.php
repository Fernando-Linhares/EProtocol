@extends('layouts.app')

@section('content')
@php $input=true @endphp

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-4">
                            <a href="home" @if(isset($home)) class="text-primary" @else class="text-dark"  @endif>
                                Mesa de Trabalho
                            </a>
                        </div>
                        <div class="col-4">
                            <a href="input" @if(isset($input)) class="text-primary" @else class="text-dark"  @endif>
                                Caixa de entrada
                            </a>
                        </div>
                </div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                        @foreach ($documents as $document)
                        <div class="card-text row p-1">
                            <div class="col-8 d-flex justify-content-center">
                                {{$document->protocol}} .
                                {{$document->number}}/
                                {{str_replace("-","/",$document->date)}} -
                                @if($document->vol<10)
                                    0{{$document->vol}}
                                @else
                                    {{($document->vol)}}
                                @endif
                            </div>
                            <div class="col-4">
                                <a href="/historic/{{$document->id}}" class="btn btn-sm btn-info">info</a>
                                <a href="/input/acept/{{$document->id}}" class="btn btn-sm btn-success">acept</a>
                            </div>
                        </div>
                        @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
