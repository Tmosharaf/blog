

@extends('layouts.dashboardApp') 



@section('active_category')
active
@endsection

@section('content')




<div class="content-wrapper">
    <div class="content">
        <div class="breadcrumb-wrapper">
            <h1>Categories</h1>

            {{-- <nav aria-label="breadcrumb">
                <ol class="breadcrumb p-0">
                    <li class="breadcrumb-item">
                        <a href="index.html">
                            <span class="mdi mdi-home"></span>
                        </a>
                    </li>
                    <li class="breadcrumb-item">Posts</li>
                    <li class="breadcrumb-item" aria-current="page">All</li>
                </ol>
            </nav> --}}
        </div>


        <div class="row">
            <div class="col-lg-4">
                
                @if (session()->has('msg'))
                    
                    <div class="alert alert-success" role="alert">
                        @if (session()->has('msg'))
                            {{ session('msg')}}
                         @endif
                    </div>
                @endif
    
                    <div class="card card-default">
                        <div class="card-header card-header-border-bottom">
                            <h2>Create your post</h2>
                            
                        </div>
                        <div class="card-body">
                            <form action="{{ route('category.store') }}"  method="POST"  >
                                @csrf
                                @method("POST")
                                
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input
                                        type="text"
                                        name="name"
                                        class="form-control"
                                        id="name"
                                    />
                                    @if($errors->has('name'))
                                        <p style="color: red">
                                            {{$errors->first('name')}}
                                        </p>
                                     @endif
                                </div>
                                <div class="form-footer ">
                                    <button
                                        type="submit"
                                        class="btn btn-primary btn-default"
                                    >
                                        Submit
                                    </button>                               
                                </div>
                            </form>
                        </div>
                    </div>
                </div>



















                <div class="col-lg-8">
                
                    @if (session()->has('updated_msg'))
                        
                        <div class="alert alert-info" role="alert">
                            @if (session()->has('updated_msg'))
                                {{ session('updated_msg')}}
                             @endif
                        </div>
                    @endif
                    @if (session()->has('delete_msg'))
                        
                        <div class="alert alert-danger" role="alert">
                            @if (session()->has('delete_msg'))
                                {{ session('delete_msg')}}
                             @endif
                        </div>
                    @endif
        
                    <div class="card card-table-border-none" id="recent-orders">
                        <div class="card-header justify-content-between">
                            <h2>Recent Categories</h2>
                            {{-- <div class="date-range-report">
                                <span>Sep 24, 2021 - Oct 23, 2021</span>
                            </div> --}}
                        </div>
                        <div class="card-body pt-0 pb-5">
                            <table
                                class="
                                    table
                                    card-table
                                    table-responsive table-responsive-large
                                "
                                style="width: 100%"
                            >
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>name</th>
                                        {{-- <th class="">Description</th> --}}
                                        <th>User</th>
                                        <th>Posts</th>
                                        <th>Created At</th>
                                        {{-- <th>Category</th> --}}
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                 
                                    @forelse ($categories as $category )
                                      
                                    {{-- {{ dd($loop) }} --}}
                                    <tr>
                                        <td>{{ $category->id }}</td>
                                        <td>
                                            {{ $category->name }}
                                        </td>
                                        <td>
                                            {{ $category->user->name }}
                                        </td>
                                        <td>
                                            
                                            @if(isset(  $category->post->category_id ))
                                                {{ $category->post->count() }}
                                            @endif
                                        </td>
                                        <td>
                                            {{ $category->created_at->shortRelativeDiffForHumans() }}
                                        </td>
                                        <td>
                                        </td>
                                        <td class="text-center">
                                            <a href="{{ route('category.edit', $category) }}">Edit</a>
                                            
                                            <form action="{{ route('category.destroy', $category) }}" method="POST">
                                                @csrf
                                                @method("DELETE")
                                                <button type="submit">Delete</button>
                                                
                                            </form>

                                        </td>
                                    </tr>  
                                    @empty
                                    <tr class="text-center">
                                      <td><p>no data</p></td>
                                    </tr>    
                                    @endforelse
                                 
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                    
                    </div>
            
        </div>




    </div>
</div>

@endsection