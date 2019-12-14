export default class Gate{

    constructor(user){
        this.user = user;
    }

    isAdmin(){
        return this.user.role_id === 1;
    }

    isJustUser(){
        return this.user.role_id === 3;
    }
    isAdminOrGroup_admin(){
        if(this.user.role_id === 1 || this.user.role.id === 2){
            return true;
        }

    }
    isGroup_adminOrJustUser(){
        if(this.user.role_id === 2 || this.user.role.id === 3){
            return true;
        }

    }
    isOstan(){
        return this.user.region_point.region_center.county_id === 9;
    }


}
