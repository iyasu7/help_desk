import axiosClient from '../axios'
import { ref } from 'vue';
import router from '../router';


export default function useSLAs(){
    const slas = ref([]);
    const sla = ref({});

    const getSLAs = async () =>
    {
       let res = await axiosClient.get('sla') 
       slas.value = res;
       console.log(res); 
    // errors.value = ''
    // console.log('data');
    // console.log(data);
    // try {
        axiosClient.post("/serviceCategory/create", data)
        await router.push({name: 'ServiceCategoriesIndex'});
    }
    // const storeSLA = async (data) =>
    const storeSLA = async(data) =>
    {
        console.log('data from storeSla');
        console.log(data);
        
    }
    // {
    //     console.log('data from storeSla');
    //     console.log(data);
    //     let res = await axiosClient.post("sla/create", data);
    //     // let data = new FormData();
    //     //         data.append('file', this.file);
    //     //         axios.post('/upload', data, config)
    //     //             .then(function (res) {
    //     //                 existingObj.success = res.data.success;
    //     //             })
    //     //             .catch(function (err) {
    //     //                 existingObj.output = err;
    //     //             });
    //     console.log('res from storeSla');
    //     console.log(res);
    //     // await router.push({name:'SLAIndex'});
    // }
    const destroySLA = async (id)=>
    {
        await axiosClient.get('/sla/delete/'+id);

    }

    return [
        slas,
        getSLAs,
        storeSLA,
        destroySLA,
    ];
}