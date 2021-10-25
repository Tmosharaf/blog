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
        <div class="breadcrumb-wrapper">
            <h1>Posts</h1>

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb p-0">
                    <li class="breadcrumb-item">
                        <a href="index.html">
                            <span class="mdi mdi-home"></span>
                        </a>
                    </li>
                    <li class="breadcrumb-item">Posts</li>
                    <li class="breadcrumb-item" aria-current="page">All</li>
                </ol>
            </nav>
        </div>

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

            <div class="col-12">
                <!-- Recent Order Table -->
                <div class="card card-table-border-none" id="recent-orders">
                    <div class="card-header justify-content-between">
                        <h2>Recent Posts</h2>
                        <div class="date-range-report">
                            <span>Sep 24, 2021 - Oct 23, 2021</span>
                        </div>
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
                                    <th>Title</th>
                                    <th class="">Description</th>
                                    <th>Created At</th>
                                    <th>Category</th>
                                    <th>Created By</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                             
                                @forelse ($posts as $post )
                                  
                                {{-- {{ dd($loop) }} --}}
                                <tr>
                                    <td>{{ $loop->index+1 }}</td>
                                    <td>
                                        <a class="text-dark" href="post/{{ $post->slug }}">
                                            {{ Str::limit($post->title, 30) }}</a
                                        >
                                    </td>
                                    <td>
                                        <p>{{ Str::limit($post->description, 70) }}</p>
                                    </td>
                                    <td>
                                        {{ $post->created_at->shortRelativeDiffForHumans() }}
                                    </td>
                                    <td>
                                        {{ $post->category->name }}
                                    </td>
                                    <td>
                                        {{ $post->user->name }}
                                    </td>
                                    <td class="text-center">
                                        <div
                                            class="
                                                dropdown
                                                show
                                                d-inline-block
                                                widget-dropdown
                                            "
                                        >
                                            <a
                                                class="
                                                    dropdown-toggle
                                                    icon-burger-mini
                                                "
                                                href=""
                                                role="button"
                                                id="dropdown-recent-order1"
                                                data-toggle="dropdown"
                                                aria-haspopup="true"
                                                aria-expanded="false"
                                                data-display="static"
                                            ></a>
                                            <ul
                                                class="
                                                    dropdown-menu
                                                    dropdown-menu-right
                                                "
                                                aria-labelledby="dropdown-recent-order1"
                                            >
                                                <li class="dropdown-item">
                                                    <a href="post/{{ $post->id }}/edit">Edit</a>
                                                </li>
                                                <li class="dropdown-item">
                                                    <form action="{{ route('post.destroy', $post) }}" method="POST">
                                                        @csrf
                                                        @method("DELETE")
                                                        <button type="submit">Remove</button>
                                                        
                                                    </form>
                                                </li>
                                            </ul>
                                        </div>
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