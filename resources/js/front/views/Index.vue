<template>
    <div id="main-page" class="hide d-md-block p-3">
        <div class="jumbotron mt-5 mx-auto">
            <h1 class="display-4">证书查询</h1>
            <p class="lead">你付出的一切终究不是枉然.</p>
            <hr class="my-4">
            <p>记录专属于你的荣耀.</p>
            <router-link class="btn btn-primary btn-lg" to="home" role="button">Let's Go</router-link>
        </div>
    </div>
</template>

<script>
    export default {
        name: "Index"
    }
</script>

<style scoped>
    #main-page{
        width: 100%;
        height: 100vh;
        background:url('/images/sun.jpg');
        background-size:cover;
    }
    .jumbotron{
        max-width: 600px;
        height: 70%;
        margin: auto;
        background: rgba(255, 255, 255, 0.6);
        box-shadow: inset 1px 1px 20px 0px #fff7ea;
        padding: 50px 20px 10% 35px;
    }
</style>
