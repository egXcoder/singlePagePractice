<template>
<div>
  <header class="masthead" :style="background_style">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="post-heading">
            <h1>{{post.subject}}</h1>
            <span class="meta">Posted by
              <a href="#">{{post.author}}</a>
              {{post.posted_at}}</span>
          </div>
        </div>
      </div>
    </div>
  </header>

  <!-- Post Content -->
  <article>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
        {{post.content}}
        </div>
      </div>
    </div>
  </article>
</div>
</template>

<script>
    export default {
        data(){
            return{
                post:{},
                background_style:{}
            }
        },
        async created(){
            await this.fetchPost();
            this.background_style = {'background-image':'url('+ this.post.image_url +')'}
        },
        methods:{
            async fetchPost(){
                await axios.get('/api/posts/'+this.$route.params.slug).then(response => {
                    this.post = response.data.data;
                });
            }
        },                
    }
</script>
