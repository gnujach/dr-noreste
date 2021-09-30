<template>
    <Link :href="'/'">
        <img src="/assets/img/logoseg.png" alt="logo seg" class="w-24 h-14" />
    </Link>
</template>

<script>
import { defineComponent } from "vue";
import { Link } from "@inertiajs/inertia-vue3";

export default defineComponent({
    components: {
        Link,
    },
});
</script>
