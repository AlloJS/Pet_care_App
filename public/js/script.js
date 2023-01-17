const userMenu = document.getElementById('menu-user');
const userList = document.getElementById('user-list');
userMenu.addEventListener('click',()=>{
   
    if(!userList.classList.contains('user-list-block')){
        userList.classList.add('user-list-block');
    } else {
        userList.classList.remove('user-list-block');
    }
    
})

