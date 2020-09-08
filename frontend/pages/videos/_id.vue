<template>
    <div>
      <iframe :src="'//fast.wistia.net/embed/iframe/'+video.video_id+'?videoFoam=true'" allowtransparency="true" frameborder="0" scrolling="no" class="wistia_embed" name="wistia_embed" allowfullscreen mozallowfullscreen webkitallowfullscreen oallowfullscreen msallowfullscreen width="640" height="360"></iframe>
  
    </div>
</template>

<script>
import axios from '~/plugins/axios'
export default {
  name: 'id',
  async asyncData ({ params, error }) {
    let { data } = await axios.get(`/videos/${params.id}`)
   //console.log(data.data.video_id)
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