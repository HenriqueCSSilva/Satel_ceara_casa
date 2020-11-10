@extends('layouts.app')


@section('content_header')
    


    
   
    <meta name="csrf-token" content="{{ csrf_token() }}">
@stop

@section('content')




<script
  src="https://code.jquery.com/jquery-3.5.1.min.js"
  integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
  crossorigin="anonymous">
</script>

    <script src="{{ asset('modulos/DataTables/datatables.min.js') }}"></script>
    <link href="{{ asset('modulos/DataTables/datatables.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('modulos/DataTables/scroller.dataTables.min.css') }}" rel="stylesheet" type="text/css"> 
    <link href="{{ asset('css/cssTabelas/styleTables.css') }}" rel="stylesheet" type="text/css"> 
        <link href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css"> 



 
<div class='container div_central' >  
  <div class="div_central"> 
<table id='example' class="display compact" >
<thead> <th>Nº Carta</th> 
        <th>Protocolo</th> 
        <th>Nome Cliente</th> 
        <th>Projeto</th> 
        <th>Nome5</th> 
        <th>Nome6</th> 
        <th>Nome7</th>
    </thead>

</table>
</div>

<div>

<script>
    var data=[];

      @foreach($cartas as $c)
             data.push([
                
                '{{$c->n_carta}}',
                '{{$c->protocolo}}',
                '{{$c->nome_cliente}}',
                '{{$c->projeto}}',
                '{{$c->parecer}}',
                '{{$c->analise}}',
                '{{$c->ingress_por}}' ]
             );

@endforeach 
console.log(data);     

       
      

$('#example').DataTable( {   
     data: data,
       deferRender: true}
      );
    </script>



    
@stop



                        deferRender:    true,