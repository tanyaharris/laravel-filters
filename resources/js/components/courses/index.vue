<template>
    <div class="row">
        <div class="col-sm-3">
            <filters endpoint="/api/courses/filters"></filters>
        </div>
        <div class="col-sm-9">
            <div class="card">
                <div class="card-body">
                    <template v-if="courses.length">
                        <course v-for="course in courses" :course="course" :key="course.id"></course>
                        <pagination :meta="meta"></pagination>
                    </template>
                    <template v-else>
                        No resource found
                    </template>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import Course from './partials/course.vue';
    import Filters from './partials/filters.vue';
    import Pagination from '../pagination/pagination.vue';
    export default {
        components: {
            Course,
            Pagination,
            Filters
        },
        data(){
          return{
              courses: [],
              meta: {}
          }
        },
        watch: {
          '$route.query':{
              handler( query ){
                this.getCourses(1, query)
              },
              deep: true
          }
        },
        mounted(){
            this.getCourses()
        },
        methods:{
            getCourses( page = this.$route.query.page, query = this.$route.query ){
                axios.get('/api/courses',{
                    params: {
                        page,
                        ...query
                    }
                }).then((response)=>{
                    this.courses = response.data.data;
                    this.meta = response.data.meta;
                })
            }
        }
    }
</script>

<style scoped>

</style>