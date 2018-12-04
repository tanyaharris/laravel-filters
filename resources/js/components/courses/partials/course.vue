<template>
    <div class="media">
        <div class="media-left">
            <img src="http://via.placeholder.com/64x64&text=..." :alt="course.name">
        </div>
        <div class="media-body">
            <ul class="list-inline" v-if="course.subjects">
                <li v-for="subject in course.subjects">{{subject.name}}</li>
            </ul>
            <h4 class="media-heading">{{ course.name }}</h4>
            <ul class="list-inline">
                <li>{{ course.FormattedAccess }}</li>
                <li>{{ course.FormattedType }}</li>
                <li>{{ course.FormattedDifficulty }}</li>
                <li>{{ course.FormattedStarted }}</li>
            </ul>
        </div>
    </div>
</template>

<script>
    export default {
        props: [
            'course'
        ]
    }
</script>

<style scoped>

</style>