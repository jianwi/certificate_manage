<template>
    <div>
        <certificates-list></certificates-list>
        <pagination></pagination>
    </div>
</template>

<script>

import CertificatesList from "../ component/CertificatesList";
import Pagination from "../ component/Pagination";
    export default {
        name: "Home",
        components: {CertificatesList,Pagination}
    }
</script>

<style scoped>

</style>
