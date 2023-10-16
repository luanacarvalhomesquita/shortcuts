<template>
    <div>
        <img :src="imagePath" :alt="altName" :class="className"/>
    </div>
</template>


<script>
export default {
    props: {
        imagePath: {
            type: String,
            required: true,
        },
        altName: {
            type: String,
            required: true,
        },
        className: {
            type: String,
            required: true,
        },
    },
};
</script>


<style scoped>
.icon-presentation {
    width: 80vh;
    height: 50vh;
    margin: 1rem;
}
.icon-sm {
    width: 1.3rem;
}

.icon-button {
    width: 20px;
}
</style>
