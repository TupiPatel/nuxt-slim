<template>
  <div class="container-fluid">
    
    <div class="row">
      <div class="col">
        <h1>Welcome to Our Video Library</h1>
      </div>
    </div>

   <div v-for="val in data" :key="val.id" class="main-div"> 
      <nuxt-link :to="'videos/' + val.video_id">click</nuxt-link>
        <div @click="onVideoPlayer(val.video_id)">
    
          <img :src="'https://fast.wistia.com/embed/medias/'+ val.video_id+'/swatch'" style="height:100%;object-fit:contain;width:100%;" alt="" aria-hidden="true" onload="this.parentNode.style.opacity=1;" />
        </div>
        <div class="title">{{ val.title}}</div>
        <div class="subtitle">{{ val.description}}</div>
    </div> 
    <div class="clear"></div>
    
  </div>
</template>


<script src="//fast.wistia.com/assets/external/E-v1.js" async></script>

<script>
import axios from '~/plugins/axios'
export default {
  async asyncData () {
   let {data} = await axios.get('/videos')
   
    return data
  },
  mounted(){
 
      if(localStorage.getItem('loggedIn') !== 'true' ){
          console.log ('login check');

          this.$router.push('/login')
      }
      
   },
  
  methods: {
    onVideoPlayer(video_id){
      console.log('A form was submitted' + video_id);
    },
   
  }
}
</script>

<style>
.container {
  margin: 0 auto;
  min-height: 100vh;
  display: flex;
  justify-content: center;
  align-items: center;
  text-align: center;
}

.title {
  font-family: 'Quicksand',
  'Source Sans Pro',
  -apple-system,
  BlinkMacSystemFont,
  'Segoe UI',
  Roboto,
  'Helvetica Neue',
  Arial,
  sans-serif;
  font-weight: 600;
  font-size: 20px;
  color: #35495e;
  letter-spacing: 1px;
  white-space: nowrap;
  overflow: hidden;
  text-overflow: ellipsis;
}

.subtitle {
  font-weight: 300;
  font-size: 15px;
  color: #526488;
  word-spacing: 5px;
  padding-bottom: 15px;
  white-space: nowrap;
  overflow: hidden;
  text-overflow: ellipsis;
}

.links {
  padding-top: 15px;
}

.main-div{
  width: 150px;
  float: left;
  padding: 20px;
}
.clear{
  clear: both;
}
</style>
