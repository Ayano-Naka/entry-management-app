new Vue({
    el: '#post_top',
        data:{
            posts:[],
            searchQuery: '',
            searchQueryIsDirty: false,
            isCalculating: false,
            prefs: [],
            stages:[],
            area_search:0
            },
            methods:{
                fetchPosts:function(){
                    axios.get('/getData').then((res)=>{
                        this.posts = res.data
                    });
                },
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
                expensiveOperation: _.debounce(function (){
                    this.isCalculating = true
                    setTimeout(function (){
                        this.isCalculating = false
                        this.searchQueryIsDirty = false
                    }.bind(this),1000)
                },500)
            },
            created(){
                this.fetchPosts();
                this.getPref();
                this.getStage();
            },
            computed: {
                searchIndicator: function () {
                        let self = this;
                    return this.posts.filter(post => {
                        if (self.area_search != 0){
                            if(self.area_search  != post.pref_id){
                                return false;
                            }
                            return true
                        }
                        return post.company.includes(this.searchQuery)||
                                post.city.includes(this.searchQuery) ||
                                post.job.includes(this.searchQuery) ||
                                post.officer.includes(this.searchQuery)
                    })
                }
                },
                watch: {
                    searchQuery: function () {
                    this.searchQueryIsDirty = true
                    this.expensiveOperation()
                }
                },
    });