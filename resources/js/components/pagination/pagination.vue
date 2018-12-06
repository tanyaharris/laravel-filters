<template>
    <nav>
        <ul class="pagination">
            <li :class="{ 'disabled': meta.current_page === 1 }" class="page-item">
                <a href="#" @click.prevent="switched(meta.current_page - 1)" class="page-link"><span>&laquo;</span></a>
            </li>
            <li :class="{ 'active':meta.curent_page === x }" v-for="x in meta.last_page" class="page-item">
                <a href="#" @click.prevent="switched(x)" class="page-link">{{ x }}</a>
            </li>
            <li  :class="{ 'disabled': meta.current_page === meta.last_page }" class="page-item">
                <a href="#" @click.prevent="switched(meta.current_page + 1)" class="page-link"><span>&raquo;</span></a>
            </li>
        </ul>
    </nav>
</template>

<script>
    export default {
        name: "pagination",
        props:[
            'meta'
        ],
        methods: {
            switched(page){
                if(this.pageIfOutOfBounds(page)){

                    return;
                }
                this.$emit('pagination:switched',page)

                this.$router.replace({
                    query: Object.assign({},this.$route.query, {page})
                })
            },
            pageIfOutOfBounds(page){
                return page <= 0 || page > this.meta.last_page;
            }
        }
    }
</script>

<style scoped>

</style>