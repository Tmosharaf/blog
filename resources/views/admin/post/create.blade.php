@extends('layouts.dashboardApp') @section('content')

<div class="content-wrapper">
    <div class="content">
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-default">
                    <div class="card-header card-header-border-bottom">
                        <h2>Create your post</h2>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ url('admin/post/create') }}" enctype="multipart/form-data">
                            @csrf
                            
                            <div class="form-group">
                                <label for="categories">select category</label>
                                <select
                                    class="form-control"
                                    id="categories"
                                    name="category">
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="title">Post Title</label>
                                <input
                                    type="text"
                                    name="title"
                                    class="form-control"
                                    id="title"
                                />
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
                            </div>
                            <div class="form-group">
                                <label for="thumbnail"
                                    >Thumbnail</label
                                >
                                <input
                                    type="file"
                                    class="form-control-file"
                                    id="thumbnail"
                                    name="file"
                                />
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
