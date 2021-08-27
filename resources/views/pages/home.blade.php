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
            <th>Action</th>
        </thead>
        <tbody with="100%"></tbody>
    </table>
</div>
@endsection

@section('script')

<script src="https://cdn.datatables.net/buttons/2.0.0/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.0.0/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.0.0/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.0.0/js/buttons.print.min.js"></script>




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
                {"data":"action",orderable:true,searchable:true},
            ],
            dom:'lBfrtip',
            buttons:[
                {
                    extend:'csv',
                    title:'csv_file'
                },
                {
                    extend:'copyHtml5',
                    title:'Copy'
                },
                {
                    extend:'excelHtml5',
                    title:'Excel_file'
                },
                {
                    extend:'pdfHtml5',
                    title:'pdf_file'
                },
                'print',
            ]
        });
        $('#refresh').click(function(){
            table.ajax.reload();
        });

        $(document).on('click','.delete', function(){
            var id = $(this).attr('id');

            if (confirm("Are you sure ?")) {
                $.ajax({
                    url: "{{ route('destroy') }}",
                    method: "get",
                    data :{id:id},

                    success: function(data){
                        alert(data);
                       $("#car_table").DataTable().ajax.reload();
                    }
                })
            }else{
                return false;
            }
        })
    });

</script>



@endsection