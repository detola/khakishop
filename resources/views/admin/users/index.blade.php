@extends('admin.layouts.master')

@section('page')
    Users
@endsection

@section('content')
<div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
    
                <div class="row">
                        <div class="col-md-12">
                            <!-- DATA TABLE -->
                            <h3 class="title-5 m-b-35">Users</h3>
                            @include('admin.layouts.message')
                            <div class="table-responsive table-responsive-data2">
                                <table class="table table-data2">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Registered At</th>
                                            <th>status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
    
                                    {{-- {{dd($users)}} --}}
    
                                    @foreach ($users as $user)
                                    <tbody>
                                            <tr class="tr-shadow">
                                                <td>{{$user->id}}</td>
                                                <td>{{$user->name}}</td>
                                                <td>{{$user->email}}</td>
                                                {{-- <td>{{$user->address}}</td> --}}
                                                <td>{{$user->created_at->diffForHumans()}}</td>
                                                <td>
                                                @if ($user->status)
                                                <span class="badge badge-success badge-sm">Active</span>
                                                @else
                                                <span class="badge badge-warning badge-sm">Blocked</span>
                                                @endif
                                                </td>
                                                    
                                                <td>
                                                    
    
                                                    @if ($user->status)
                                                    {{link_to_route('user.block','Block',$user->id, ['class'=>'btn btn-outline-warning btn-sm'])}}
                                                    @else
                                                    {{link_to_route('user.active','Active',$user->id, ['class'=>'btn btn-outline-success btn-sm'])}}
                                                    @endif
    
                                                    {{link_to_route('users.show','Details',$user->id, ['class'=>'btn btn-outline-primary btn-sm'])}}
                                        
                                                </td>
                                            </tr>
                                            <tr class="spacer"></tr>
                                            
                                        </tbody>
                                        @endforeach
                                    </table>
                            </div>
                        </div>
                    </div>
    
            </div>
        </div>
    </div>
@endsection