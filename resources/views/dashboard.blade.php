@extends('layouts.master')

@section('content')
    @include('includes.message-block')
    <section class="row new-post">
        <div class="col-md-6 col-md-offset-3">
            <header><h3>What do you have to say?</h3></header>
            <form action="{{route('post.create')}}" method="post">
                <div class="form-group">
                    <textarea class="form-control" name="body" id="new-post" rows="5"
                              placeholder="New Post"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Create Post</button>
                <input type="hidden" value="{{Session::token()}}" name="_token">
            </form>
        </div>
    </section>
    <section class="row posts">
        <div class="col-md-6 col-md-offset-3">
            <header><h3>What other people say...</h3></header>
            @foreach($posts as $post)
                <article class="post" data-postid="{{$post->id}}">
                    <p>{{$post->body}}</p>
                    <div class="info">
                        Posted by {{$post->user->firstname}} on {{$post->created_at}}
                    </div>
                    <div class="interaction">
                        <a href="#"
                           class="like">{{\App\Http\Controllers\PostController::getText($post)}}</a>
                        |
                        <a href="#" class="like">{{Auth::user()->likes()->where('post_id',$post->id)->first()?Auth::user()->likes()->where('post_id',$post->id)->first()->like==0 ? 'You don\'t like this post':'Dislike':'Dislike'}}</a>
                        @if($post->user==Auth::user())
                            | <a class="edit" href="#" onclick="editPost('{{$post->body}}')">Edit</a>﻿ |

                            <a href="{{route('post.delete',['post_id'=>$post->id])}}">Delete</a>
                        @endif
                    </div>
                </article>
            @endforeach
        </div>
    </section>

    <div class="modal fade" id="edit-modal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Post</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="post-body">
                                Edit the Post
                            </label>
                            <textarea name="post-body" id="post-body" rows="5" class="form-control"></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" onclick="savePost('{{$post->id}}','{{$post->body}}')">
                        Save changes
                    </button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        var token = '{{Session::token()}}';
        var urlEdit = '{{route('edit')}}';
        var urlLike = '{{route('like')}}';
    </script>
@endsection