<template>
        <input
            type="submit"
            class="btn btn-danger mt-1 d-block w-100"
            value="Eliminar x"
            @click="eliminarReceta"
        />
</template>

<script>
export default {
    props: ['recetaId'],
    mounted(){
        console.log(this.recetaId);
    },
    methods : {
        eliminarReceta(){

            this.$swal({
                title: '¿Estas Seguro?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    const params = {
                        id: this.recetaId
                    }

                    axios.post(`/recetas/${this.recetaId}`, { params, _method: 'delete' })
                    .then(resp => {


                        // Eliminar reseta del dom
                        this.$el.parentNode.parentNode.parentNode.removeChild(this.$el.parentNode.parentNode);
                        this.$swal({
                            title: 'Receta elimina',
                            text: 'Se elimo la receta'
                        })



                    })
                    .catch(erro => console.log(erro));


                }
            })

        }

    }

}

</script>
