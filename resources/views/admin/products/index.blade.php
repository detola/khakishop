@extends('admin.layouts.master')

@section('page')
    View Products
@endsection

@section('content')

<div class="main-content">
<div class="section__content section__content--p30">
<div class="container-fluid">
<div class="row">
        <div class="col-lg-12">
            <!-- DATA TABLE -->
            <h3 class="title-5 m-b-35">data table</h3>

            @include('admin/layouts/message')

            
            <div class="table-responsive table-responsive-data2">
                    <table class="table table-data2">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Price</th>
                                <th>description</th>
                                <th>Image</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)

                            <tr class="tr-shadow">
                                <td>{{$product->id}}</td>
                                <td style="width:100px;">{{$product->name}}</td>
                                <td style="width:100px;">{{$product->price}}</td>
                                <td class="desc" style="width:200px;">{{$product->description}}</td>
                                <td>
                                <img src="{{url('uploads').'/'. $product->image}}" alt="{{$product->name}}" style="width:50px;" class="img-thuambnail">
                                </td>
                                
                                <td>
                                        {{ Form::open(['route'=>['products.destroy', $product->id], 'method'=>'DELETE'])}}
                                        {{Form::button('<span class="zmdi zmdi-delete"></span>', ['type'=>'submit', 'class'=>"btn btn-danger btn-sm ",  'data-toggle'=>"tooltip", 'data-placement'=>"top", 'title'=>"Delete",
                                        'onclick'=>'return confirm("Are you sure you want to delete this item?")'
                                        ])}}
                                        {{link_to_route('products.edit','',$product->id, ['class'=>'btn btn-info btn-sm zmdi zmdi-edit', 'data-toggle'=>"tooltip", 'data-placement'=>'top', 'title'=>'Edit'])}}
    
                                        {{link_to_route('products.show','',$product->id, ['class'=>'btn btn-primary btn-sm zmdi zmdi-more', 'data-toggle'=>"tooltip", 'data-placement'=>'top', 'title'=>'Details'])}}
                                    </div>
                                </td>
                            </tr>
                            <tr class="spacer"></tr>

                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- END DATA TABLE -->
            </div>
        </div>
        </div>
</div>
</div>
    
@endsection