export default function useSession(){

    const isLoggedIn = !localStorage.getItem("AUTH_TOKEN")
    const userType = localStorage.getItem("USER_TYPE")
    const username = localStorage.getItem('USER_NAME');
    const user_id =  localStorage.getItem('USER_ID');
    const hospital = localStorage.getItem("HOSPITAL");


    return{
        isLoggedIn,
        username,
        user_id,
        userType,
        hospital,
    }

}