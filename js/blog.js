var app2 = new Vue({
  el: '#app-2',
  data: {
    posts: {},
    BusquedaPost: '',
    filterPosts: [],
  },

  mounted: function(){

    this.ConsultarPost();

  },

  computed:{

    buscadorPost: {
      get(){
        return this.BusquedaPost
      },
      set(value){
        value = value.toLowerCase();
        this.filterPosts = this.posts.filter(item => item.titulo.toLowerCase().indexOf(value) !== -1)
        this.BusquedaPost = value
      }
    },

  },

  methods: {
    
    ConsultarPost: function(){
      capturador = this;
      axios.get('/blog/php/consultar.php', {

      }).then(function (response) {
        console.log(response.data);
        capturador.posts = response.data;
        capturador.filterPosts = response.data;
      });
    },

  },

})
