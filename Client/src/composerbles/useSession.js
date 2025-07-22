export default function useSession(){

    const isLoggedIn = !localStorage.getItem("AUTH_TOKEN")
    const username = localStorage.getItem('USER_NAME');
    const lastname = localStorage.getItem("LAST_NAME")
    const user_id =  localStorage.getItem('USER_ID');
    const hospital_id = localStorage.getItem("HOSPITAL_ID");
    const userRole = localStorage.getItem("USER_TYPE")


    return{
        isLoggedIn,
        username,
        user_id,
        hospital_id,
        lastname,
        userRole
    }

}