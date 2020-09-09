<template>
  <div class="container-fluid">
    <div class="row">
      <div class="col">
        <div class="heading">Welcome to Our Video Library</div>
      </div>
    </div>
     <div class="category">
          <select v-model="category"  @change="addCategory(category)" class="dropdown">
            <option v-bind:value="all">All Videos</option>
            <option v-for="val in cat" :key="val.id" v-bind:value="val.category" @>{{ val.category }}</option>
          </select>
    </div>
  
   <div v-for="val in data" :key="val.id" class="row-video"> 
      <div class="column-video">
        <nuxt-link :to="'videos/' + val.video_id" >
          <div >
           <img :src="'https://fast.wistia.com/embed/medias/'+ val.video_id+'/swatch'" style="height:100%;object-fit:contain;width:100%;" alt="" aria-hidden="true" onload="this.parentNode.style.opacity=1;" />
           
          </div>
        </nuxt-link>
        <div class="title">{{ val.title}}</div>
        <div class="subtitle">{{ val.description}}</div>
      </div>
    </div> 
    <div class="clear"></div>
    
  </div>
</template>


<script src="//fast.wistia.com/assets/external/E-v1.js" async></script>

<script>
import axios from '~/plugins/axios'
export default {
  async asyncData () {
    var cat =[]
    var {data} = await axios.get('/videos')
  // console.log(data.data)
   data.data.forEach(element => {
    // console.log(element.category)
     var index = cat.findIndex(x => x.category==element.category)
      if (index === -1){
         cat.push({category : element.category})
      }
      //else console.log("object already exists")
          
      
   });
    return  {data:data.data,cat:cat}

  },
  mounted(){
 
      if(localStorage.getItem('loggedIn') !== 'true' ){
          console.log ('login check');

          this.$router.push('/login')
      }
      
   },
  data(){
      return {
        category: '',
        cat:[] ,
        all:'all' 
      }
  },
  methods: {
    
    addCategory(category){
      
        console.log(category)
        axios.get('/videos')
          .then((res) => {
            if(category == "all")
            {
              console.log(res.data.data)
              this.data = res.data.data
            }
            // console.log(res.data)
              res.data.data.forEach(element => {
                  //console.log(element.category)
                  var index = this.cat.findIndex(x => x.category==element.category)
                    if (index === -1){
                      this.cat.push({category : element.category})
                    }
                  // else console.log("object already exists")  
                });
              //this.cat = res.data.data
        })
        if(category != "all")
        {
          axios.get('/videos/category/'+category)
            .then((Response) => {
              console.log(Response.data);

              this.data = Response.data.data
            
            })
        }
    } ,

  
  },
  

}
</script>

