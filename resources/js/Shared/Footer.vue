<template>
    <div>
        <footer class="bg-light text-secondary text-center px-3 py-1">
            Copyleft <span class="copy-left">©</span>
            •
            <template v-if="$page.auth.user">
                <inertia-link :href="route('logout')" method="post" class="text-secondary">Wyloguj</inertia-link>
            </template>
            <template v-else>
                <inertia-link :href="route('login')" class="text-secondary">Logowanie</inertia-link>
            </template>
        </footer>
    </div>
</template>

<script>
export default {
}
</script>

<style lang="css" scoped>
.copy-left {
    display: inline-block;
    text-align: right;
    margin: 0px;
    -moz-transform: scaleX(-1);
    -o-transform: scaleX(-1);
    -webkit-transform: scaleX(-1);
    transform: scaleX(-1);
    filter: FlipH;
    -ms-filter: "FlipH";
}
</style>
