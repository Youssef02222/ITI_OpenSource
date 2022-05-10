export class Department {
    name:string;
    capacity:number;
    isEditing: boolean=false;

    constructor(public id:number,name:string,count:number){
        this.id=id;
        this.name=name;
        this.capacity=count;
    }


}

let d:Department=new Department(10,"os",40);


