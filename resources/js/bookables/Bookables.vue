<template>
    <div>
        Rows is : {{rows}}
        <div v-if="loading">
            Data is loading...
        </div>
        <div v-else>
            <div class="row mb-4" v-for="row in rows" :key="'row' + row">
                <div 
                    class="col d-flex align-item-stretch"
                    v-for="(bookable, index) in bookablesInRow(row)"
                    :key="index"
                >
                    <!-- <bookable-list-item   
                        :title="bookable.title" 
                        :description="bookable.description" 
                        :id="bookable.id"
                    ></bookable-list-item> -->
                    <!-- 上のtitle,description,idの代わりにv-bind="bookable"でOK -->
                    <bookable-list-item v-bind="bookable"></bookable-list-item>
                </div>
                <!-- colの数が1or2の時にストレッチしないように追加 -->
                <div
                    class="col" 
                    v-for="p in placeholdersInRow(row)"
                    :key="'placeholder' + row + p"
                >
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import BookableListItem from './BookableListItem';
export default {
    components: {
        BookableListItem
    },
    data() {
        return {
            bookables: null,
            loading: false,
            columns: 3
        }
    },
    computed: {
        rows() {
            return this.bookables == null 
            ? 0
            : Math.ceil(this.bookables.length / this.columns);
        }
    },
    methods: {
        bookablesInRow(row) {
            return this.bookables.slice((row - 1) * this.columns, row * this.columns);
        },
        placeholdersInRow(row) {
            return this.columns - this.bookablesInRow(row).length;
        }
    },
    created() {
        this.loading = true;

        // const p = new Promise((resolve, reject) => {
        //     console.log(resolve);
        //     console.log(reject);
        //     setTimeout(() => resolve('hello'), 3000);
        // }).then(result => console.log(`Success ${result}`))
        // .catch(result => console.log(`Erro ${result}`))
        // console.log(p);

        const request =  axios
        .get('api/bookables').then(response => {
            this.bookables = response.data.data
            this.bookables.push({ title: 'x', description: 'y' });
            this.loading = false;
        });
        
    },
    mounted() {
        console.log('mounted');
    },
};
</script>