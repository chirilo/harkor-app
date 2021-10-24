/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue').default;

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    // initialize here the needed varaibles for adding a new post
    data: {
        newPost: {'title': '', 'description': ''},
        hasError: true,
        posts: [],
        e_id: '',
	    e_title: '',
	    e_description: '',
    },
    mounted: function mounted(){
        this.getPosts();
    },
    methods: {
    	createPost: function createPost() {
	        var input = this.newPost;
	        var _this = this;
	        if(input['title'] == '' || input['description'] == '') {
	            this.hasError = false;
	        }
	        else {
	            this.hasError= true;
	            axios.post('/storePost', input).then(function(response){
	                _this.newPost = {'title': '', 'description': ''}
	                _this.getPosts();
	            }).catch(error=>{
	                console.log("Insert: "+error);
	            });
	        }
	    },
	    getPosts: function getPosts(){
	        var _this = this;
	        axios.get('/getPosts').then(function(response){
	            _this.posts = response.data;
	        }).catch(error=>{
	            console.log("Get All: "+error);
	        });
	    },
	    
	    
	    setVal(val_id, val_title, val_description) {
			this.e_id = val_id;
			this.e_title = val_title;
			this.e_description = val_description;
		},
		editPost: function(){
	            var _this = this;
	            var id_val_1 = document.getElementById('e_id');
	            var title_val_1 = document.getElementById('e_title');
	            var description_val_1 = document.getElementById('e_description');
	            var description = document.getElementById('myModal').value;
	             axios.post('/editPosts/' + id_val_1.value, {val_1: title_val_1.value, val_2: description_val_1.value})
	               .then(response => {
	                 _this.getPosts();
	               });
	    },
	    deletePost: function deletePost(post) {
			var _this = this;
				axios.post('/deletePost/' + post.id).then(function(response){
				_this.getPosts();
			}).catch(error=>{
				console.log("Delete post: "+error);
			});
	     },
    }
});

