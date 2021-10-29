@extends('layouts.dashboardApp') 


@section('collapseShow')
show
@endsection
@section('active_post')
active
@endsection



@section('content')



<div class="content-wrapper">
    <div class="content">
        <div class="row">
            @if (session()->has('msg'))
                
                <div class="col-lg-12">
                    <div class="alert alert-success" role="alert">
                        @if (session()->has('msg'))
                            {{ session('msg')}}
                         @endif
                    </div>
                   
                </div>

            @endif
            


            <div class="col-lg-12">
                <div class="card card-default">
                    <div class="card-header card-header-border-bottom">
                        <h2>Create your post</h2>
                        
                    </div>
                    <div class="card-body">
                        <form action="{{ route('post.store') }}"  method="POST"  enctype="multipart/form-data">
                            @csrf
                            @method("POST")
                            
                            <div class="form-group">
                                <label for="categories">select category</label>
                                <select
                                    class="form-control"
                                    id="categories"
                                    name="category_id">
                                    <option>--Please Select--</option>
                                    @forelse ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @empty
                                        <option value="">Nai</option>
                                    @endforelse
                                </select>
                                @if($errors->has('category'))
                                    <p style="color: red">
                                        {{$errors->first('category')}}
                                    </p>
                                 @endif
                            </div>

                            <div class="form-group">
                                <label for="title">Post Title</label>
                                <input
                                    type="text"
                                    name="title"
                                    class="form-control"
                                    id="title"
                                />
                                @if($errors->has('title'))
                                    <p style="color: red">
                                        {{$errors->first('title')}}
                                    </p>
                                 @endif
                            </div>

                            <div class="form-group">
                                <label for="description"
                                    >Description</label
                                >
                                <textarea name="description"
                                    class="form-control"
                                    id="description"
                                    rows="3"
                                ></textarea>
                                @if($errors->has('description'))
                                <p style="color: red">
                                    {{$errors->first('description')}}
                                </p>
                             @endif
                            </div>
                            <div class="form-group">
                                <label for="thumbnail"
                                    >Thumbnail</label
                                >
                                <input
                                    type="file"
                                    class="form-control-file"
                                    id="thumbnail"
                                    name="thumbnail"
                                />
                                @if($errors->has('thumbnail'))
                                <p style="color: red">
                                    {{$errors->first('thumbnail')}}
                                </p>
                                @endif
                            </div>
                            <div class="form-footer pt-4 pt-5 mt-4 border-top">
                                <button
                                    type="submit"
                                    class="btn btn-primary btn-default"
                                >
                                    Submit
                                </button>
                                <a href="#" class="btn btn-secondary btn-default"> Cancel</a>
                                
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
