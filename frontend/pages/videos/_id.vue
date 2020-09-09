<template>
    <div class="container-fluid">
       <div class="row">
          <div class="col">
            <div class="heading">Video Player</div>
          </div>
        </div>
        <div>
          <iframe :src="'//fast.wistia.net/embed/iframe/'+video.video_id+'?videoFoam=true&playerColor=013b30&playButton=true'" allowtransparency="true" frameborder="0" scrolling="no" class="wistia_embed" name="wistia_embed" allowfullscreen mozallowfullscreen webkitallowfullscreen oallowfullscreen msallowfullscreen width="640" height="360"></iframe>
          <div>{{ video.title }}</div>
          <div>{{ video.description }}</div>
        </div>
    </div>
</template>

<script>
import axios from '~/plugins/axios'
export default {
  name: 'id',
  async asyncData ({ params, error }) {
    let { data } = await axios.get(`/videos/${params.id}`)
    console.log(params.id)
   console.log(data.data.video_id)
     var video = data.data
    return { video: video }
   
  },
  head () {
    return {
     // title: `User: ${this.user.name}`
    }
  }
}
</script>