import axiosClient from '../axios'


export default function useSLAs(){
    const slas = ref([]);
    const sla = ref({});

    const getSLAs = async () =>
    {
       let res = await axiosClient.get('sla') 
       slas.vlaue = res;
       console.log(res);
    }
}