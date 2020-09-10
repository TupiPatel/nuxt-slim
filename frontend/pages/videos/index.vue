<template>
  <div class="container-fluid">
    <div class="row">
      <div class="col">
        <div class="heading" style=" padding : 20px 20px 20px 50px;">Welcome to Our Video Library</div>
      </div>
    </div>
     
  <div class="category">
          <select v-model="category"  @change="addCategory(category)" class="dropdown">
            <option v-bind:value="all">All Videos</option>
            <option v-for="val in categoryArr" :key="val.id" v-bind:value="val.category" @>{{ val.category }}</option>
          </select>
    </div>
   <div v-for="val in data" :key="val.id" class="row-video"> 
      <div class="column-video">
          <nuxt-link :to="'videos/' + val.video_id" >
            <div >
            <img :src="'https://fast.wistia.com/embed/medias/'+ val.video_id+'/swatch'" style="height:100%;object-fit:contain;width:100%;" alt="" aria-hidden="true" onload="this.parentNode.style.opacity=1;" />
            
            </div>
      
            <div class="description">
              <div class="title">{{ val.title}}</div>
              <div class="subtitle">{{ val.description}}</div>
            </div>
          </nuxt-link>
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
    var categoryArr =[]
    var {data} = await axios.get('/videos')
    // console.log(data.data)
    data.data.forEach(element => {
    // console.log(element.category)
     var index = categoryArr.findIndex(x => x.category==element.category)
      if (index === -1){
         categoryArr.push({category : element.category})
      }
      //else console.log("object already exists")
          
      
   });
    return  {data:data.data,categoryArr:categoryArr}

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
        categoryArr:[] ,
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
                  var index = this.categoryArr.findIndex(x => x.category==element.category)
                    if (index === -1){
                      this.categoryArr.push({category : element.category})
                    }
                  // else console.log("object already exists")  
                });
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

