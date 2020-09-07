<template>
  <div class="container-fluid">
    
    <div class="row">
      <div class="col">
        <h1>Welcome to Our Video Library</h1>
      </div>
    </div>

    <div v-for="val in data" :key="val.id" class="main-div"> 
        <div>{{ val.video_id}}</div>
        <div class="title">{{ val.title}}</div>
        <div class="subtitle">{{ val.description}}</div>
    </div>
    <div class="clear"></div>
   <div class="wistia_embed wistia_async_g5pnf59ala" style="height:360px;position:relative;width:640px">
  <div class="wistia_swatch" style="height:100%;left:0;opacity:0;overflow:hidden;position:absolute;top:0;transition:opacity 200ms;width:100%;">
    <img src="https://fast.wistia.com/embed/medias/g5pnf59ala/swatch" style="filter:blur(5px);height:100%;object-fit:contain;width:100%;" alt="" aria-hidden="true" onload="this.parentNode.style.opacity=1;" />
  </div>
</div>
    
  </div>
</template>
<script src="https://fast.wistia.com/embed/medias/g5pnf59ala.jsonp" async></script>
<script src="https://fast.wistia.com/assets/external/E-v1.js" async></script>

<script>
import axios from '~/plugins/axios'
export default {
  async asyncData () {
   let {data} = await axios.get('/videos')
   
    /*let key={
        "apiKey": "Eo0ae6ua6pyjrWod2YACWdfVOvrD7fzTbetHRrwkQfk"
      }
      var token;
        axios.post('https://sandbox.api.video/auth/api-key',key)
        .then((Response) => {
           console.log(data.data)
          console.log(Response.data.access_token);

          var header = {'Authorization': 'Bearer '+Response.data.access_token}
          var info ={
              "id": 2,
              "title": "what it's like to work at algaecal",
              "description": "Discover what it\u2019s like to work at AlgaeCal with this quick video!",
              "videoId": "M3ralniniq"
          }
          axios.defaults.headers.common = {
              'Authorization': 'Bearer ' + Response.data.access_token
          };
           axios.post('https://sandbox.api.video/videos',info)
            .then((Response2) => {
              console.log(Response2)
            })
        })
        .catch((err) => {
         //this.form.errors = "The user you requested does not exist"
        })

       let list = axios.get('https://ws.api.video/videos/')
       console.log(list)*/
    return data
  },
  mounted(){
 
      if(localStorage.getItem('loggedIn') !== 'true' ){
          console.log ('login check');

          //this.$router.push('/login')
      }
      
   },
  data() {
    return {
      form: {
        email: ''
      },
    };
  },
  methods: {
    onSubmit(){
      console.log('A form was submitted');
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
