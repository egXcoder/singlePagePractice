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
      <div class="row"> 
      <div class="my-auto mr-4">
        <h1 class="my-auto mr-1">You are in Page Number {{current_page}}</h1>
        <hr>
      </div>
        <create_new_post></create_new_post>
      </div>
      
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
        
         <paginate 
          :pageCount="last_page"
          :containerClass="'pagination'"
          :page-class="'page-item'"
          :prev-class="'page-item'"
          :next-class="'page-item'"
          :page-link-class="'page-link'"
          :prev-link-class="'page-link'"
          :next-link-class="'page-link'"
          :clickHandler="fetch_posts">
         </paginate>

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
                last_page:'',
                current_page:'',
            }
        },
        components:{
          create_new_post
        },
         created(){
             this.fetch_posts(1);
        },
        methods:{
             fetch_posts($page_number){
                axios.get("/api/posts?page="+$page_number).then(response=>{
                    this.posts = response.data.data;
                    this.current_page = response.data.meta.current_page;
                    this.last_page = response.data.meta.last_page;
                });
            },
        },
        filters:{
            generate_uri($value){
                return "/post/"+$value;
            }
        }                
    }
</script>
