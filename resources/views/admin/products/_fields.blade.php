<div class="{{$errors->has('name') ? 'is-invalid' : ''}} form-group ">
    {{Form::label('name', 'Product Name', ['class'=>'control-label'])}}
    {{Form::text('name',$product->name, ['class'=>'form-control border-input', 'placeholder'=>'MacBook Pro 13'])}}
    <span class="text-danger">{{$errors->has('name') ? $errors->first('name') : ''}}</span>
</div>

<div class="form-group {{$errors->has('price') ? 'has-error' :      ''}}">
    {{Form::label('price', 'Product Price', ['class'=>'control-label'])}}
    {{Form::text('price',$product->price, ['class'=>'form-control', 'placeholder'=>'$2,500'])}}
    <span class="text-danger">{{$errors->has('price') ? $errors->first('price') : ''}}</span>
</div>

<div class="form-group {{$errors->has('description') ? 'has-error' : ''}}">
    {{Form::label('desc', 'Product Description', ['class'=>'control-label'])}}
    {{Form::textarea('description', $product->description,  ['class'=>'form-control',
    'rows'=>'10',
   'cols'=>'30', 
    'placeholder'=>'Product Description'])}}
    <span class="text-danger">{{$errors->has('description') ? $errors->first('description') : ''}}</span>
</div>

<div class="form-group {{$errors->has('image') ? 'has-error' : ''}}">
    {{Form::label('image', 'Product Image', ['class'=>'control-label mb-1'])}}
    {{Form::file( 'image', ['class'=>'form-control', 'id'=>'image'])}}
    <div id="thumb-output"></div>
    <span class="text-danger">{{$errors->has('image') ? $errors->first('image') : ''}}</span>
</div>