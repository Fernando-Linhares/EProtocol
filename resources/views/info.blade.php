@extends('layouts.app')


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                     <a href="/home" class="btn btn-outline-danger">Retornar</a>
                </div>
                <div class="card-body">
                    <div class="row">
                        @for($i=0;$i<count($all);$i++)
                            @if ($i==count($all)-1)
                              <div class="col-3 alert alert-info">
                                    {{$all[$i]}}
                              </div>   
                            @else
                                <div class="col-3 alert alert-light">
                                   {{$all[$i]}}
                                </div>
                                <div class=" col-1 alert alert-light">
                                    <i class="bi bi-arrow-right"></i>
                                </div>
                            @endif
                        
                         @endfor
                    </div>
                  
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
