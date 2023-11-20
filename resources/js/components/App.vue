<template>
<div v-if="this.article?.id" class="alert  alert-primary" role="alert">
Добавлен новый комментарий к статье <a :href="`/article/${this.article.id}`"><strong>{{this.article.name}}</strong></a> 
</div>
</template>

<script>
    export default {
    data() { return { article:null } },
        created() {
            window.Echo.channel('test').listen('EventNewComment', (article) => {
                console.log(article);
                this.article=article.article;
            })
        }
    }
</script>