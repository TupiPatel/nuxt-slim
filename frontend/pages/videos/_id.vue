<template>
    <div class="container-fluid">
      <div><nuxt-link nuxt-link-go-back :to="'../'">Back</nuxt-link></div>
      <div class="inner-container">
       <div class="row">
          <div class="col">
            <div class="heading" style="padding: 20px 20px 20px 0px;">Video Player</div>
          </div>
        </div>
        <div>
          <iframe :src="'//fast.wistia.net/embed/iframe/'+video.video_id+'?videoFoam=true&playerColor=013b30&playButton=true'" allowtransparency="true" frameborder="0" scrolling="no" class="wistia_embed" name="wistia_embed" allowfullscreen mozallowfullscreen webkitallowfullscreen oallowfullscreen msallowfullscreen width="640" height="360"></iframe>
        <div class="description">
          <div class="title">{{ video.title }}</div>
          <div class="subtitle">{{ video.description }}</div>
        </div>
        </div>
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