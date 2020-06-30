var app = new Vue({
  el: '#app',

  data: {

    editar: false,
    errors: [],

    Id_post: '',
    titulo: '',
    descripcion: '',
    imagen: [],

    posts: {},
    BusquedaPost: '',
    filterPosts: [],

  },

  mounted: function(){

    this.ConsultarPost();

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

    Grabar: function(){

      axios({
        method: 'POST',
        url: '/blog/php/insertar.php',
        data: {
          titulo: this.titulo,
          imagen: this.imagen,
          description: this.descripcion,
        }

      }).then(function (response) {
        // handle success
        if(response.data == true){
          swal("Post publicado!","se ha creado un nuevo post", "success");
        }else{
          swal("Error al publicar post!","asdas", "warning");
        }

      }).catch(function (error) {
        console.log(error.data);
      });
    },

    EliminarPost: function(id){
      swal({
        title: "¿Estas seguro de Eliminar el registro?",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
          //ejecuta la funcion
          axios({
            method: 'POST',
            url: '/blog/php/Eliminar.php',
            data: {
              Id_post: id,
            }
          }).then(function (response) {
            console.log(response.data);
            if(response.data === true){
              swal("Poof! Tu registro fue eliminado !", {
                icon: "success",
              });
            }else {
              swal("Error al eliminar el registro", {
                icon: "warning",
              });
            }
          });
          this.ConsultarPost();
          //mensaje de elemento eleiminado
        }
      });
    },

    EditarPost: function(id) {

      this.Id_post = id;

    },

    ActivarEdicion: function(id){
      this.editar = true;
      this.EditarPost(id);
    },

    checkForm: function (e){

      this.errors = [];

      if (!this.titulo) {
        this.errors.push('El correo titulo es obligatorio.');
      } else if (!this.descripcion) {
        this.errors.push('La descripcion es obligatoria.');
      } else if (!this.imagen) {
        this.errors.push('Debe seleccionar una imagen.');
      }

      if (!this.errors.length) {
        this.Grabar();
      }

      e.preventDefault();

    },

  }//end methods

})
