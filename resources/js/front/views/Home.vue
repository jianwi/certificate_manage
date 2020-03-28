<template>
    <div>
        <div class="container position-relative" id="content">
            <nav class="navbar fixed-top navbar-expand bg-light border border-bottom text-dark">
                <div class="container">
                    <div class="navbar-brand">证书管理系统</div>
                    <div class="align-self-end">
                        <search></search>
                    </div>
                </div>

            </nav>
            <div class="py-3 mb-0 pb-5">
                <br>
                <p class="mt-5"></p>
                <recommend></recommend>
                <hr>
                <certificates-list></certificates-list>
                <hr>
                <pagination></pagination>
            </div>
        </div>
    </div>
</template>

<script>

    import CertificatesList from "../ component/CertificatesList";
    import Pagination from "../ component/Pagination";
    import Search from "../ component/Search";
    import Recommend from "../ component/Recommend";

    export default {
        name: "Home",
        components: {
            Recommend,
            CertificatesList,
            Pagination,
            Search
        }
    }
</script>

<style scoped>
.footer{
    position: absolute;
    bottom: 0px;
}
</style>
