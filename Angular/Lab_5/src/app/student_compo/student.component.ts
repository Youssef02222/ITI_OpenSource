import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-student',
  templateUrl: './student.component.html',
  styleUrls: ['./student.component.css']
})
export class StudentComponent implements OnInit {

  constructor() { }

  ngOnInit(): void {
  }

  FirstName:string="";
  LastName:string='Youssef';
  id:number=0;

  setFirstName(newFirstName:string):void{
    this.FirstName=newFirstName;
  }

  getFullName():string{
    return this.FirstName+' '+this.LastName;
  }

}
