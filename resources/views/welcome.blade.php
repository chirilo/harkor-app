<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>HARKOR APP: Vuejs + Laravel | CRUD</title>

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }
            .full-height {
                height: 100vh;
            }
            .flex-center {
                align-items: center;
                
                justify-content: center;
                margin-left: 20%;
                margin-right: 20%;
            }
            .position-ref {
                position: relative;
            }
            .content {
                text-align: center;
            }
            .title {
                font-size: 84px;
            }
            .m-b-md {
                margin-bottom: 30px;
            }
            .hidden{
                display: none;
            }
        </style>
    </head>
    <body>
        
        <!-- app placeholder -->
        <div id="app">
            
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
        <!-- end of app placeholder-->
        

        <!-- include app.js here -->
        <script type="text/javascript" src="/js/app.js"></script>
    </body>

</html>
