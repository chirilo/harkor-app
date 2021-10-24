@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <!-- add post here -->
            <div class="title m-b-md">
                Post
            </div>
            <div class="alert alert-danger" role="alert" v-bind:class="{hidden: hasError}">
                All fields are required!
            </div>
            <div class="form-group">
                <label for="make">Title</label>
                <input type="text" class="form-control" id="title" required placeholder="Title" name="title" v-model="newPost.title">
            </div>
                                                    
            <div class="form-group">
                <label for="model">Description</label>
                <input type="text" class="form-control" id="description" required placeholder="Description" name="description" v-model="newPost.description">
            </div>

            <button class="btn btn-primary" @click.prevent="createPost()">
                Add Post
            </button>


            <!-- display posts -->
            <table class="table table-striped" id="table">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Description</th>
                    <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for ="post in posts">
                    <th scope="row">@{{post.id}}</th>
                    <td>@{{post.title}}</td>
                    <td>@{{post.description}}</td>

                    <td @click="setVal(post.id, post.title, post.description)"  class="btn btn-info" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal"><i class="fa fa-pencil"></i>
                    </td>
                    <td  @click.prevent="deletePost(post)" class="btn btn-danger"> 
                    <i class="fa fa-trash"></i>
                    </td>
                    </tr>
                </tbody>
            </table>

            <!-- Modal -->
            <div id="myModal" class="modal fade" role="dialog">
                <div class="modal-body">
                    <input type="hidden" disabled class="form-control" id="e_id" name="id" required :value="this.e_id">
                        Title: <input type="text" class="form-control" id="e_title" name="title" required :value="this.e_title">
                        Description: <input type="text" class="form-control" id="e_description" name="description" required  :value="this.e_description">
                </div>    
                                        
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" @click="editPost()">Save changes</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
