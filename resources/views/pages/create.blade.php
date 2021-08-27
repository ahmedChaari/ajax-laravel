@extends('layouts.app')
@section('content')

{!! Form::open(['route'=>'store', 'class'=>'form-horizontal', 'name'=>'frm-create', 'id'=>'frm-create']) !!}

@include('pages.form')

{!! Form::close() !!}
@endsection


@section('script')
<script>
    $(document).on('click','#add', function(e){
        var data = $("#frm-create").serialize();

        $.ajax({
            data:data,
            method:"post",
            url:"{{ route('store') }}",
            success: function(data){
                jQuery('.alert-danger').hide();
                alert('successfully save');
                window.location.replace("{{ route('home') }}");
            },

            error:function(data)
            {
                jQuery.each(data.responseJSON.errors,function(key, value){
                    jQuery('.alert-danger').show();
                    jQuery('.alert-danger').append('<p>'+value+'</p>');
                });
            }
        });
    
    });
</script>
@endsection