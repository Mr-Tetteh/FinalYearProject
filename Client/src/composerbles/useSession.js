export default function useSession(){

    const isLoggedIn = !localStorage.getItem("AUTH_TOKEN")
    const username = localStorage.getItem('USER_NAME');
    const lastname = localStorage.getItem("LAST_NAME")
    const user_id =  localStorage.getItem('USER_ID');
    const hospital = localStorage.getItem("HOSPITAL");
    const userRole = localStorage.getItem("USER_TYPE")


    return{
        isLoggedIn,
        username,
        user_id,
        hospital,
        lastname,
        userRole
    }

}