@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    {{ __('Enviar Documento / digite o nome do usuario que deve receber') }}

                </div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form action="/senddoc/touser" method="post">
                        @csrf
                       <div class="row">
                          <div class="col-4">
                            <input name="name" type="text" class="form-control sm">
                            <input type="hidden" name="id" value="{{$id}}">
                           </div>
                           <div class="col-2">
                             <input type="submit" value="confirm" class="btn btn-primary">
                           </div>
                           <div class="col-2">
                               <a href="/home" class="btn btn-danger">cancel</a>
                           </div>
                        </div>
                    </form>
                        
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
