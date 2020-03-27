<template>
    <div>
        <el-x
        <search></search>
        <recommend></recommend>
        <certificates-list></certificates-list>
        <pagination></pagination>
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

</style>
