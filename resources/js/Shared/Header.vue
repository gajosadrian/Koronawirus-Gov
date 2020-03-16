<template>
    <div>
        <h2 class="mt-2">
            <slot />
        </h2>
        <data-source :source="data_source" />
        <hr />
    </div>
</template>

<script>
import DataSource from '@/Shared/DataSource'

export default {
    components: {
        DataSource,
    },
    props: {
        data_source: String,
    },
}
</script>
