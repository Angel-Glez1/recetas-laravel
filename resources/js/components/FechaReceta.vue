<template>
    <span v-text="formatiarFecha"></span>
</template>


<script>
export default {

    props: ['fecha'],

    computed :  {
        formatiarFecha(){
            return moment(this.fecha).locale('es').format('DD [de] MMMM [del] YYYY');
        }
    }
}
</script>
