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
    }
    const storeSLA = async (data)=>{
        let res = await axiosClient.post('sla/create', data);
        console.log(res);
        await router.push({name:'SLAIndex'});
    }
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