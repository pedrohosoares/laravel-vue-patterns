<template>
    <div>
        <div
            class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center"
        >
            <h1 class="display-4">
                Veja os artigos<br />
                e categorias cadastrados no blog
            </h1>
            <p class="lead">
                Você irá ver uma lista de artigos com paginação, podendo acessar
                os artigos e alterá-los.
            </p>
        </div>
        <hr />
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <menu-categories :id="cat_id"></menu-categories>
                </div>
                <div class="col-md-9">
                    <posts :category="category"></posts>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    name: "content-page",
    props:{
        cat_id: String,
        category: String
    }
};
</script>
