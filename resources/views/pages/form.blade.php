<div class="alert alert-danger" style="display:none"></div>
<div class="row">
    <div class="col-md-12"><h1>Car Form</h1></div>
        <div class="col-sm-4">
            {!! Form::label('name','Name') !!}
            {!! Form::text('name',null,['class'=>'form-control']) !!}
            {!! Form::label('brand','Brand') !!}
            {!! Form::text('brand',null,['class'=>'form-control']) !!} 
                {!! Form::label('color','Color') !!}
                {!! Form::select('color',(['white'=>'white',
                                            'red'=>'red',
                                            'bleu'=>'bleu',
                                            'black'=>'black']),null,['class'=>'form-control','required'=>'']) !!} 
            {!! Form::label('qty','Qty') !!}
            {!! Form::text('qty',null,['class'=>'form-control']) !!}
                <br>
                <input type="button" id="add" value="add" class="btn btn-info">
            
        </div>
</div>