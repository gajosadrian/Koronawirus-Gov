<template>
    <div>
        <MainMenu :url="url()" />
        <b-container :style="$page.agent.is_desktop ? 'margin-top: 65px' : 'margin-bottom: 65px'">
            <slot />
        </b-container>
        <Footer class="mt-5" />
    </div>
</template>

<script>
import MainMenu from '@/Shared/MainMenu'
import Footer from '@/Shared/Footer'

export default {
    components: {
        MainMenu,
        Footer,
    },
    methods: {
        url() {
            return location.pathname.substr(1)
        },
    },
}
</script>
