<template>
    <div class="card w-100">
        <div class="card-body">
            <router-link :to="{ name: 'bookable', params: { id } }">
                <h5 class="card-title">{{ title }}</h5>
            </router-link>
            <p class="card-text">{{ description }}</p>
        </div>
    </div>
</template>
<script>
export default {
    props: {
        "title": String, 
        "description": String,
        "id": Number 
    },
    // mounted() {
    //     console.log(this.itemTitle)
    //     // このように子コンポーネント内でプロパティを変更するのはNG（単方向のデータフロー）
    //     // this.itemTitle = "イカスミパスタ"
    //     // console.log(this.itemTitle)
    // }
}
</script>