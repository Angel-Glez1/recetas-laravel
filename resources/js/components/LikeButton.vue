<template>
    <div>
        <span
        class="like-btn"
        @click="likeReceta"
        :class="{ 'like-active' : isActive  }"
        ></span>
        <p>
            {{ cantidadLikes }} Les gustó esta receta
        </p>
    </div>
</template>


<script>
export default {
    // Props
    props: ['recetaId', 'like', 'likes'],

    // data
    data : function() {
        return {
            isActive: this.like,
            totalLikes : this.likes
        }
    },

    // Cuando el componente esta cargado
    mounted(){

    },

    // Todas las funciones de mi componente
    methods: {
        likeReceta(e){
            e.target.classList.toggle('like-active');

            axios.post('/likes/'+ this.recetaId)
            .then((r) => {
                console.log(r);
                if(r.data.attached.length > 0) {
                    this.$data.totalLikes++;

                }else {
                    this.$data.totalLikes--;
                }

                this.isActive = !this.isActive;

            }).catch((err) => {
                if(err.response.status === 401){
                    window.location = '/register';
                }
            });

        }
    },

    computed: {
        cantidadLikes: function(){
            return this.totalLikes;
        }
    }
}
</script>
