var app = new Vue({
  el: '#app',

  data: {

    errors: [],

    Id_post: '',
    titulo: '',
    descripcion: '',
    imagen: [],

    posts: [],

  },

  mounted: function(){



  },

  methods: {


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

          location.reload(true);
          //mensaje de elemento eleiminado
        }
      });
    },


  }//end methods

})
