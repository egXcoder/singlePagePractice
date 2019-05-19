<template>
<div>
        <button class="btn btn-primary my-5" data-toggle="collapse" data-target="#Content">Create New Post</button>
        <div class="collapse" id="Content">
            <div class="card card-body">
                <form action="/api/posts" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <input name="subject" type="text" class="form-control" placeholder="Enter your new subject">
                    </div>
                    <div class="form-group">
                        <textarea name="content" id="content" rows="10" class="form-control" placeholder="Enter your content"></textarea>
                    </div>

                    <div class="form-group">
                        <input name="image" type="file" class="form-control-file col-sm-10" id="image">
                    </div>
                    <button class="btn btn-success btn-xs mt-2">Submit</button>
            </form>
            </div>
        </div>
        
</div>
</template>
<script>
export default {
    
}
</script>