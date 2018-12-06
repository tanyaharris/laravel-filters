<template>
    <div class="filters">
        {{selectedFilters}}
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
              selectedFilters: _.omit(this.$route.query,['page'])
          }
        },
        mounted(){
            axios.get(this.endpoint).then((response)=>{
                this.filters = response.data.data;
            })
        },
        methods:{
            activateFilter(key, value){
                this.selectedFilters = Object.assign({},this.selectedFilters,{ [key]: value});

                this.$router.replace({
                    query:{
                        ...this.selectedFilters,
                        page: 1
                    }
                });
            }
        }
    }
</script>

<style scoped>

</style>