<template>
    <div class="row">
        <div class="col-md-10 m-auto">
            <h1>{{ post.title }}</h1>

            <p>
                {{ post.resume }}
            </p>
            <hr />
            <article>
                <p>
                    {{ post.content }}
                </p>
            </article>
            <aside>
                <a
                    v-for="category in post.categories"
                    :key="category.id"
                    :href="'/categories/'+category.id"
                    class="btn btn-outline-primary mr-2"
                >
                    {{ category.name }}
                </a>
            </aside>
            <a href="/" class="link">Voltar</a>
        </div>
    </div>
</template>
<script>
import axios from "axios";
export default {
    name: "post",
    data() {
        return {
            post: {},
        };
    },
    props: {
        slug: String,
    },
    created() {
        this.getPost();
    },
    methods: {
        async getPost() {
            const data = await axios.get("/api/v1/posts/" + this.slug);
            this.post = data.data.data;
        },
    },
};
</script>
<style></style>
