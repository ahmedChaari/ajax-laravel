@extends('layouts.app')
@section('content')

{!! Form::model($car,['route'=>['editData',$car->id],
'class'=>'form-horizontal','name'=>'frm-update','id'=>'frm-update']) !!}

@include('pages.form')

{!! Form::close() !!}

@endsection

@section('script')
<script>
    $(document).on('click','#add' , function(e){
        var data = $('#frm-update').serialize();

        $.ajax({
            data :data,
            method: "post",
            url: "{{ route('updateData',['id' => "$car->id"]) }}",

            success: function(data){
                jQuery('.alert-danger').hide();
                alert('successfuly update');
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