

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
            <div class="col-lg-12">
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
                            <form action="{{ route('category.update', $category) }}"  method="POST"  >
                                @csrf
                                @method("PUT")
                                
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input
                                        type="text"
                                        name="name"
                                        class="form-control"
                                        id="name"
                                        value="{{ $category->name }}"
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
        </div>






    </div>
</div>

@endsection