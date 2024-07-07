<template>
    <nav class="bd-links" id="bd-docs-nav">
                        <div class="bd-toc-item active">
                            <h3>Categorias</h3>

                            <ul class="nav bd-sidenav">
                                <li v-for="item in menu_data.data" :key="item.id">
                                    <a href="/docs/4.0/components/alerts/">
                                        {{ item.name }}
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </nav>
</template>
<script>
import axios from 'axios';
export default{
    name:"menu-categories",
    data() {
        return {
            menu_data:[],
        }
    },
    created() {
        this.getMenus();
    },
    methods: {
        async getMenus(){
            try {
                const response = await axios.get('/api/v1/categories');
                const data = response.data;
                this.menu_data = data.data;
            } catch (error) {
                
            }
        }
    },
}
</script>
<style></style>