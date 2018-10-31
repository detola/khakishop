@extends('admin.layouts.master')

@section('page')
    Product Details
@endsection

@section('content')
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            {{-- {{dd($product)}} --}}
            <div class="col-lg-12">
                    <!-- TOP CAMPAIGN-->
                    <div class="top-campaign">
                        <h3 class="title-3 m-b-30">product details</h3>
                        <div class="table-responsive">
                            <table class="table table-top-campaign">
                                <tbody>
                                    <tr>
                                        <td>ID</td>
                                        <td>{{$product->id}}</td>
                                    </tr>
                                    <tr>
                                        <td>Name</td>
                                        <td>{{$product->name}}</td>
                                    </tr>
                                    <tr>
                                        <td>Description</td>
                                        <td>{{$product->description}}</td>
                                    </tr>
                                    <tr>
                                        <td>Price</td>
                                        <td>{{$product->price}}</td>
                                    </tr>
                                    <tr>
                                        <td>Created At</td>
                                        <td>{{$product->created_at->diffForHumans()}}</td>
                                    </tr>
                                    <tr>
                                        <td>Updated At</td>
                                        <td>{{$product->updated_at->diffForHumans()}}</td>
                                    </tr>
                                    <tr>
                                        <td>Image</td>
                                        <td><img src="/uploads/{{$product->image}}" alt="" ></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!--  END TOP CAMPAIGN-->
                </div>
        </div>
    </div>
</div>
@endsection


        