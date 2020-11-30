export default class Gate{

    constructor(user){
        this.user = user;
    }

    isAdmin(){
        return this.user.role_id === 1;
    }
    isGroup_admin(){
        return this.user.role_id === 2;
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
    isAbhar(){
        return this.user.region_point.region_center.county_id === 2;
    }
    isBimaVagir(){
        return this.user.group.id === 4;
    }
    isRiasat(){
        return this.user.group.id === 2;
    }
    isGostaresh(){
        return this.user.group.id === 3;
    }
    isEnvironment(){
        return this.user.group.id === 5;
    }
    isBehvarz(){
        return this.user.group.id === 6;
    }
    isKarshenasNazer(){
        return this.user.group.id === 8;
    }
    isMarkaz(){
        return (this.user.region_point.type_id === 2 || this.user.region_point.type_id === 3 || this.user.region_point.type_id === 4)
    }

    isBimaGVagir(){
        return this.user.group.id === 7;
    }

}
