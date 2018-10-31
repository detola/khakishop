@extends('admin.layouts.master')

@section('page')
    Order Page
@endsection

@section('content')
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">

            <div class="row">
                    <div class="col-md-12">
                        <!-- DATA TABLE -->
                        <h3 class="title-5 m-b-35">orders</h3>
                        @include('admin.layouts.message')
                        <div class="table-responsive table-responsive-data2">
                            <table class="table table-data2">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>User</th>
                                        <th>Product</th>
                                        <th>Quantity</th>
                                        <th>Address</th>
                                        <th>status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>

                                {{-- {{dd($orders)}} --}}

                                @foreach ($orders as $order)
                                <tbody>
                                        <tr class="tr-shadow">
                                            <td>{{$order->id}}</td>
                                            <td>{{$order->user->name}}</td>
                                            <td class="desc">
                                                @foreach ($order->products as $item)
                                                    {{$item->name}}
                                                @endforeach</span>
                                            </td>
                                            <td>
                                                @foreach ($order->orderItems as $item)

                                                {{$item->quantity}}
                                                    
                                                @endforeach
                                            </td>
                                            <td>{{$order->address}}</td>
                                            <td>
                                            @if ($order->status)
                                            <span class="badge badge-success badge-sm">Processed</span>
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

                                                {{link_to_route('orders.show','Details',$order->id, ['class'=>'btn btn-outline-primary btn-sm'])}}
                                    
                                            </td>
                                        </tr>
                                        <tr class="spacer"></tr>
                                        @endforeach
                                    </tbody>
                                </table>
                        </div>
                    </div>
                </div>

        </div>
    </div>
</div>
    
@endsection