new Vue({
    el: '#task_top',
    data:{
        tasks:[],
        user_id:'',
        new_task: '',
        new_limit: '',
        isEditTask:false,
        isEditLimit:false
    },
    methods:{
        fetchTasks:function(){
            axios.get('/task').then((res)=>{
                this.tasks = res.data
            });
        },
        addTask:function(){
            axios.post('/task',{
                user_id:this.user_id,
                task:this.new_task,
                limit:this.new_limit
            }).then((res)=>{
                this.tasks = res.data;
                this.new_task = '';
            });
        },
        deleteTask: function(task_id){
            axios.post('/task/del',{
                id: task_id
            }).then((res)=>{
                this.tasks = res.data;
            });
        },
        updateTask : function(task_id){
            axios.post('/task/edi',{
                id: task_id
            }).then((response) => {
                this.isEditTask = false
                this.isEditLimit = false
                this.tasks = res.data;
            　});
        },
    },
    created() {
        this.fetchTasks();
    },
    computed: {
        reverseTasks:function(){
            return _.orderBy(this.tasks, ['id'], ['desc'])
        }
    }
});