<template>
    <div>
        <main-menu :url="url()" />
        <b-container :style="$page.agent.is_desktop ? 'margin-top: 65px' : ''">
            <slot />
        </b-container>
    </div>
</template>

<script>
import MainMenu from '@/Shared/MainMenu'

export default {
    components: {
        MainMenu,
    },
    methods: {
        url() {
            return location.pathname.substr(1)
        },
    },
}
</script>
