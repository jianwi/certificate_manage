<template>
    <div>
        <search></search>
        <certificates-list></certificates-list>
        <pagination></pagination>
    </div>
</template>

<script>

import CertificatesList from "../ component/CertificatesList";
import Pagination from "../ component/Pagination";
import Search from "../ component/Search";
    export default {
        name: "Home",
        components: {
            CertificatesList,
            Pagination,
            Search
        }
    }
</script>

<style scoped>

</style>
