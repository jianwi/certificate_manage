<template>
    <div>
        <el-container class="bg-light">
            <el-header class="bg-light fixed-top border border-bottom-0 py-3 pb-4">
                <el-row>
                    <el-col
                        style="font-family: webfont"
                        :xs="24"
                        :md='10'
                        :offset="1"
                        class="h3">
                        <span class="mx-2 pb-1">
                                                    <svg t="1585482518150" class="icon" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg" p-id="4075" width="32" height="32"><path d="M857.28 344.992h-264.832c12.576-44.256 18.944-83.584 18.944-118.208 0-78.56-71.808-153.792-140.544-143.808-60.608 8.8-89.536 59.904-89.536 125.536v59.296c0 76.064-58.208 140.928-132.224 148.064l-117.728-0.192A67.36 67.36 0 0 0 64 483.04V872c0 37.216 30.144 67.36 67.36 67.36h652.192a102.72 102.72 0 0 0 100.928-83.584l73.728-388.96a102.72 102.72 0 0 0-100.928-121.824zM128 872V483.04c0-1.856 1.504-3.36 3.36-3.36H208v395.68H131.36A3.36 3.36 0 0 1 128 872z m767.328-417.088l-73.728 388.96a38.72 38.72 0 0 1-38.048 31.488H272V476.864a213.312 213.312 0 0 0 173.312-209.088V208.512c0-37.568 12.064-58.912 34.72-62.176 27.04-3.936 67.36 38.336 67.36 80.48 0 37.312-9.504 84-28.864 139.712a32 32 0 0 0 30.24 42.496h308.512a38.72 38.72 0 0 1 38.048 45.888z" p-id="4076" fill="#1296db"></path></svg>                    <el-col

                        </span>
                        证书查询
                    </el-col>
                    <el-col
                    :md="10"
                    >
                        <search></search>
                    </el-col>
                </el-row>

            </el-header>
            <el-main class="mt-5">
                <br>
                <recommend></recommend>
                <hr>
                <certificates-list></certificates-list>
                <br>
                <pagination class="text-center mt-2"></pagination>
            </el-main>
        </el-container>
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
@font-face {
    font-family: 'webfont';
    font-display: swap;
    src: url('//at.alicdn.com/t/webfont_66365dj903c.eot'); /* IE9*/
    src: url('//at.alicdn.com/t/webfont_66365dj903c.eot?#iefix') format('embedded-opentype'), /* IE6-IE8 */
    url('//at.alicdn.com/t/webfont_66365dj903c.woff2') format('woff2'),
    url('//at.alicdn.com/t/webfont_66365dj903c.woff') format('woff'), /* chrome、firefox */
    url('//at.alicdn.com/t/webfont_66365dj903c.ttf') format('truetype'), /* chrome、firefox、opera、Safari, Android, iOS 4.2+*/
    url('//at.alicdn.com/t/webfont_66365dj903c.svg#NotoSansHans-Black') format('svg'); /* iOS 4.1- */
}
</style>
