<template>
    <div class="filters">
        <p v-if="filtersInUse">
            <a href="#" @click.prevent="clearFilters">Clear filters</a>
        </p>

        <div class="list-group" v-for="map, key in filters">
            <a
                    href="#"
                    class="list-group-item"
                    :class="{'active':selectedFilters[key] === value}"
                    v-for="filter, value in map"
                    @click.prevent="activateFilter(key, value)"
            >
                {{filter}}
            </a>
            <a
                    href="#"
                    class="list-group-item list-group-item-info"
                    v-if="selectedFilters[key]"
                    @click.prevent="clearFilter(key)"
            >
                &times; CLear this filter
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
        computed:{
            filtersInUse(){
                return _.isEmpty(this.selectedFilters);
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

                this.updateQueryString();
            },

            clearFilter(key){
                this.selectedFilters = _.omit(this.selectedFilters,key);
                this.updateQueryString();
            },

            clearFilters(){
                this.selectedFilters = {}
                this.$router.replace({})
            },

            updateQueryString(){
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