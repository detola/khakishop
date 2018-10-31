@extends('admin.layouts.master')

@section('page')

Order Details
    
@endsection

@section('content')
<div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="row">
                        <div class="col-lg-12">
                            <h2 class="title-1 m-b-25">Order Details</h2>
                            <div class="table-responsive table--no-card m-b-40">
                                <table class="table table-borderless table-striped table-earning">
                                    {{-- {{dd($order)}} --}}
                                    <thead>
                                        <tr>
                                            <th>order ID</th>
                                            <th>date</th>
                                            <th>Address</th>
                                            <th>quantity</th>
                                            <th class="text-right">Price</th>
                                            <th class="text-right">status</th>
                                            <th class="text-right">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>{{$order->id}}</td>
                                            <td>{{$order->date}}</td>
                                            <td>{{$order->address}}</td>
                                            <td class="text-center">{{$order->orderItems[0]->quantity}}</td>
                                            <td class="text-right">${{$order->orderItems[0]->price}}</td>
                                            <td>
                                            @if ($order->status)
                                            <span class="badge badge-success">Processed</span>
                                            @else
                                            <span class="badge badge-warning badge-sm">Pending</span>
                                            @endif
                                            </td>
                                            
                                            <td>
                                                @if ($order->status)
                                                {{link_to_route('order.pending','Pending',$order->id, ['class'=>'btn btn-outline-warning btn-sm'])}}
                                                @else
                                                {{link_to_route('order.confirm','Confirm',$order->id, ['class'=>'btn btn-outline-success btn-sm'])}}
                                                @endif
                                            </td>
                                        </tr>
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                </div>

                <div class="row">
                    {{-- <div class="container-fluid"> --}}
                    <div class="col-lg-6">
                            <div class="top-campaign">
                                <h3 class="title-3 m-b-30">User details</h3>
                                <div class="table-responsive">
                                    <table class="table table-top-campaign">
                                        <tbody>
                                            <tr>
                                                <td>ID</td>
                                                <td>{{$order->user->id}}</td>
                                            </tr>
                                            <tr>
                                                <td>Name</td>
                                                <td>{{$order->user->name}} joe</td>
                                            </tr>
                                            <tr>
                                                <td>Email</td>
                                                <td>{{$order->user->email}}</td>
                                            </tr>
                                            <tr>
                                                <td>Registered At</td>
                                                <td>{{$order->user->created_at->diffForHumans()}}</td>
                                            </tr>
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6">
                                <div class="top-campaign">
                                    <h3 class="title-3 m-b-30">Product details</h3>
                                    <div class="table-responsive">
                                        <table class="table table-top-campaign">
                                            <tbody>
                                                <tr>
                                                    <td>ID</td>
                                                    <td>{{$order->orderItems[0]->product_id}}</td>
                                                </tr>
                                                <tr>
                                                    <td>Name</td>
                                                    <td>{{$order->products[0]->name}}</td>
                                                </tr>
                                                <tr>
                                                    <td>Price</td>
                                                    <td>${{$order->products[0]->price}}</td>
                                                </tr>
                                                <tr>
                                                    <td>Image</td>
                                                    <td>
                                                        <a href="{{url('uploads').'/'.$order->products[0]->image}}" target="_blank"><img src="{{url('uploads').'/'.$order->products[0]->image}}" class="img-thumbnail"></a>
                                                    </td>
                                                </tr>
                                                
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <a href="{{url('/orders')}}" class="btn btn-success">Back To Orders</a>
                    </div>
                </div>
            </div>
        </div>
</div>

    
@endsection