<template>
    <nav class="bd-links" id="bd-docs-nav">
        <div class="bd-toc-item active">
            <h3>Categorias</h3>

            <ul class="nav bd-sidenav">
                <li v-for="item in menu_data.data" :key="item.id">
                    <a :href="'/categories/'+item.id">
                        {{ item.name }}
                    </a>
                </li>
            </ul>
        </div>
    </nav>
</template>
<script>
import axios from "axios";
export default {
    name: "menu-categories",
    props:{
        id: String
    },  
    data() {
        return {
            menu_data: [],
            url:''
        };
    },
    created() {
        this.getMenus();
    },
    methods: {
        async getMenus() {
            try {
                this.url = (this.id == 'null') ? '/api/v1/categories' : '/api/v1/categories/'+this.id;
                const response = await axios.get(this.url);
                const data = response.data;
                this.menu_data = data.data;
                if(this.menu_data.data == undefined){
                    const newData = [];
                    newData['data'] = [this.menu_data];
                    this.menu_data = newData;
                    console.log(this.menu_data);
                }else{
                    console.log(this.menu_data);
                }
            } catch (error) {}
        },
    },
};
</script>
<style></style>
