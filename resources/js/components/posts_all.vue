<template>
<div>
  <!-- Page Header -->
  <header class="masthead" style="background-image: url('img/home-bg.jpg')">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="site-heading">
            <h1>Clean Blog</h1>
            <span class="subheading">A Blog Theme by Start Bootstrap</span>
          </div>
        </div>
      </div>
    </div>
  </header>

  <!-- Main Content -->
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">

      <create_new_post></create_new_post>
      
        <template v-for="post in posts">
        <div class="post-preview">
          <a :href="post.slug|generate_uri">
            <h2 class="post-title">
              {{post.subject}}
            </h2>
          </a>
          <p class="post-meta">Posted by
            <a href="#">{{post.author}}</a>
            on {{post.posted_at}}</p>
        </div>
        <hr>
        </template>
        
        <!-- Pager -->
        <div class="clearfix">
          <a class="btn btn-primary float-right" href="#">Older Posts &rarr;</a>
        </div>
      </div>
    </div>
  </div>
</div>
</template>

<script>
import create_new_post from './posts_new';

    export default {
        data(){
            return {
                posts:[],
            }
        },
        components:{
          create_new_post
        },
         created(){
             this.fetchPosts();
        },
        methods:{
             fetchPosts(){
                axios.get("/api/posts").then(response=>{
                    this.posts = response.data.data
                });
            }
        },
        filters:{
            generate_uri($value){
                return "/post/"+$value;
            }
        }                
    }
</script>
