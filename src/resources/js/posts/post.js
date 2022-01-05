new Vue({
    el: '#post_top',
    data:{
        posts:[],
        searchQuery: '',
        searchQueryIsDirty: false,
        isCalculating: false,
        prefs: [],
        stages:[],
        area_search:0,
        stage_search:0,
        current_page: 1,
        last_page: 1,
        total: 1,
        from: 0,
        to: 0,
        countOne:[],
        countTwo:[],
        countThree:[],
        countFour:[],
        countFive:[]
    },
    methods:{
        getPref:function(){
            axios.get('/getPref').then((res)=>{
                this.prefs = res.data
            });
        },
        getStage:function(){
            axios.get('/getStage').then((res)=>{
                this.stages = res.data
            });
        },
        getCountOne:function(){
            axios.get('/getCountOne').then((res) =>
                this.countOne = res.data
            )
        },
        getCountTwo:function(){
            axios.get('/getCountTwo').then((res) =>
                this.countTwo = res.data
            )
        },
        getCountThree:function(){
            axios.get('/getCountThree').then((res) =>
                this.countThree = res.data
            )
        },
        getCountFour:function(){
            axios.get('/getCountFour').then((res) =>
                this.countFour = res.data
            )
        },
        getCountFive:function(){
            axios.get('/getCountFive').then((res) =>
                this.countFive = res.data
            )
        },
        expensiveOperation: _.debounce(function (){
            this.isCalculating = true
            setTimeout(function (){
                this.isCalculating = false
                this.searchQueryIsDirty = false
            }.bind(this),1000)
        },500),
        load(page) {
            axios.get('/getData?page=' + page, {
                params: {
                    // ここにクエリパラメータを指定する
                    pref_id:this.area_search,
                    stage_id:this.stage_search,
                    keyword:this.searchQuery
                }
            }).then(({data}) => {
            this.posts = data.data
            this.current_page = data.current_page
            this.last_page = data.last_page
            this.total = data.total
            this.from = data.from
            this.to = data.to
            })
        },
        change(page) {
            if (page >= 1 && page <= this.last_page) this.load(page)
        },
        area_select(pref_id){
            this.area_search = pref_id
            this.load(1)
        },
        stage_select(stage_id){
            this.stage_search = stage_id
            this.load(1);
        },
        keyword_search(keyword){
            this.searchQuery = keyword
            this.load(1)
        }
    },
    created(){
        this.getPref();
        this.getStage();
        this.getCountOne();
        this.getCountTwo();
        this.getCountThree();
        this.getCountFour();
        this.getCountFive();
    },
    mounted() {
        this.load(1)
    },
    computed: {
        searchIndicator() {
            let self = this;
            return this.posts.filter(post => {
                if (self.area_search != 0){
                    if(self.area_search  != post.pref_id){
                        return false;
                    }
                    return true
                }
                if(self.stage_search != 0){
                    if(self.stage_search != post.stage_id){
                        return false;
                    }
                    return true
                }
                if (post.memo == null) {
                    return false;
                }
                return post.company.includes(this.searchQuery) ||
                    post.city.includes(this.searchQuery) ||
                    post.job.includes(this.searchQuery) ||
                    post.officer.includes(this.searchQuery) ||
                    post.memo.includes(this.searchQuery)
            })
        },
        pages() {
            let start = _.max([this.current_page - 2, 1])
            let end = _.min([start + 5, this.last_page + 1])
            start = _.max([end - 5, 1])
            return _.range(start, end)
        },
    },
    watch: {
        searchQuery: function () {
            this.searchQueryIsDirty = true
            this.expensiveOperation()
            this.current_page= 1;
        }
    },
});