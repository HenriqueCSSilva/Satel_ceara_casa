@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div style = "border: none;" class="card">
                <div style="background-color: #81BE01; color: #FFFFFF;" class="card-header">BemVindo</div>

                <div style="background-color: #554c44; color: #FFFFFF;"  class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    Logado com sucesso!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
