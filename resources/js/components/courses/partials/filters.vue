<template>
    <div class="filters">
        <div class="list-group" v-for="map, key in filters">
            <a
                    href="#"
                    class="list-group-item"
                    v-for="filter, value in map"
                    @click.prevent="activateFilter(key, value)"
            >
                {{filter}}
            </a>
        </div>
    </div>
</template>

<script>
    export default {
        name: "filters",
        props:[
            'endpoint'
        ],
        data(){
          return{
              filters: {},
              selectedFilters: {}
          }
        },
        mounted(){
            axios.get(this.endpoint).then((response)=>{
                this.filters = response.data.data;
            })
        },
        methods:{
            activateFilter(key, value){

            }
        }
    }
</script>

<style scoped>

</style>