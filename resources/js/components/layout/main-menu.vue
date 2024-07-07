<template>
    <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom box-shadow">
      <h5 class="my-0 mr-md-auto font-weight-normal">
        <a :href="home">
          Laravel
        </a>
      </h5>
      <nav class="my-2 my-md-0 mr-md-3">
        <a class="p-2 text-dark" href="mailto:pedrohosoares@gmail.com">Feito por pedrohosoares@gmail.com</a>
      </nav>
    </div>
  </template>
  
  <script>
  export default {
    name: 'main-menu',
    props:{
      home: String
    }
  };
  </script>
  
  <style scoped>
  h1 {
    color: #42b983;
  }
  </style>