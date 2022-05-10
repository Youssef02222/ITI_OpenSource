import { Component, OnInit } from '@angular/core';
import { Department } from '../_models/department';

@Component({
  selector: 'app-department',
  templateUrl: './department.component.html',
  styleUrls: ['./department.component.css']
})
export class DepartmentComponent implements OnInit {

  constructor() { }

  ngOnInit(): void {
  }

  ndept:Department=new Department(0,"",0);
  dept:Department=new Department(0,"",0);
  add(){
    this.depts.push(new Department(this.ndept.id,this.ndept.name,this.ndept.capacity))
    this.ndept.id=0;
    this.ndept.name="";
    this.ndept.capacity=0;
  }

  depts:Department[]=[
    new Department(100,"OS",40),
    new Department(200,"PD",30),
    new Department(300,"Mobile",70)
  ];
  d:Department=new Department(10,"os",40);
  show(deptid:number){
    for(let i=0;i<this.depts.length;i++){
      if(this.depts[i].id==deptid){
        this.dept=this.depts[i];
        break;
      }
    }

  }

  delete(index:number):void{
    this.depts.splice(index,1)
  }

  edit(id: string, name: string, count: string, index:number): void {
    console.log(index);
    this.depts[index].id=Number(id);
    this.depts[index].name=name;
    this.depts[index].capacity=Number(count);
  }

  public save(department: Department): void {
    department.isEditing = false;
  }

  public edit2(department: Department): void {
    department.isEditing = true;
  }

}
