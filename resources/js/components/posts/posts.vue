<template>
    <div>
        <div v-for="post in articles_data" :key="post.id">
            <div class="card mb-4 box-shadow">
                <div class="card-header">
                    <h1 class="my-0 font-weight-normal">{{ post.title }}</h1>
                </div>
                <article class="card-body">
                    <p>{{ post.resume }}..</p>
                    <a :href="'/posts/' + post.slug"
                        type="button"
                        class="btn btn-lg btn-block btn-outline-primary"
                    >
                        Ver artigo
                    </a>
                </article>
            </div>
        </div>
        <div v-if="articles_data.length == 0">
        <p>Nenhum artigo para ser exibido</p>
        </div>
    </div>
</template>
<script>
import axios from 'axios';
export default {
    name: "posts",
    props:{
        category: String
    },      
    data() {
        return {
            articles_data: [],
            url:''
        };
    },
    methods: {
        async getPosts() {
            this.url = (this.category == 'null') ? '/api/v1/posts' : '/api/v1/posts?category='+this.category;
            const data = await axios.get(this.url);
            this.articles_data = data.data.data.data;
        },
    },
    created() {
        this.getPosts();
    },
};
</script>
<style></style>
