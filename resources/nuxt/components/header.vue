<template>
    <div>
        <nav class="navbar navbar-expand-sm bg-dark ">
            <ul class="navbar-nav w-100 justify-content-between">
                <li class="nav-item nav-link" v-if="route.path === '/'">
                    SwiSys車隊管理平台
                </li>
                <li class="nav-item nav-link" v-else>
                    後台管理系統
                </li>
                <div class="d-flex">
                    <li class="nav-item nav-link">
                        歐隆祺您好
                    </li>
                    <li class="nav-item mx-2 nav-link">
                        <NuxtLink v-if="route.path === '/'" to="/admin">後台管理系統</NuxtLink>
                        <NuxtLink v-else to="/">SwiSys車隊管理平台</NuxtLink>
                    </li>
                    <li class="nav-item nav-link">
                        <NuxtLink to="/login">登出</NuxtLink>
                    </li>
                </div>

            </ul>
        </nav>
    </div>
</template>
<script>
import { useRoute, defineComponent } from '@nuxtjs/composition-api'

export default defineComponent({
    setup() {
        const route = useRoute()


        return {
            route

        }
    }

})


</script>
<style>
.nav-link {
    color: white !important;
}

a {
    text-decoration: none;
    color: white;
}
</style>