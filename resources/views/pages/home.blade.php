@extends('layouts.app')
@section('content')

<a href="{{ route('create') }}" class="btn btn-success mb-2" >Create</a>
<button class="btn btn-info float-right" id="refresh">Refresh</button>
<hr>
<div class="table-responsive">
    <table class="table table-hover dataTables" with="100%" id="car_table">
        <thead with="100%">
            <th>Name</th>
            <th>Brand</th>
            <th>Color</th>
            <th>Qty</th>
        </thead>
        <tbody with="100%"></tbody>
    </table>
</div>
@endsection

@section('script')


<script>
    $(document).ready(function(){
        var table = $('#car_table').DataTable({
            
            "lengthMenu":[[10,25,50, -1],[10,25,50, "All"]],
            "proccesing":true,
            "serverSide":true,
            "ajax":"{{ route('getData') }}",
            "columns":[
                {"data":"name"},
                {"data":"brand"},
                {"data":"color"},
                {"data":"qty"},
            ]
        });
        $('#refresh').click(function(){
            table.ajax.reload();
        });
    });

</script>



@endsection