@extends('admin.layouts.master')

@section('content')

 <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">Edit Product</div>
                                    @include('admin.layouts.message')
                                    
                                    <div class="card-body">
                                        <div class="card-title">
                                            <h3 class="text-center title-2"> Edit Product</h3>
                                        </div>
                                        <hr>
                                        {!! Form::open(['url' => ['products', $product->id], 'files'=> 'true', 'method'=>'put']) !!}              
                                        @include('admin.products._fields')
                                        
                                            
                                        <div class="form-group">
                                            {{Form::submit('Update Product', ['class'=>'btn btn-lg btn-info btn-block'])}}
                                        </div>

                                            
                                        {!! Form::close() !!}
                                    </div>
                                </div>
                            </div>

@endsection

