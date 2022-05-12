import { Component, OnInit } from '@angular/core';
import { Router } from '@angular/router';
import { StudentService } from 'src/app/student.service';
import { Student } from 'src/app/_models/student';

@Component({
  selector: 'app-show-students',
  templateUrl: './show-students.component.html',
  styleUrls: ['./show-students.component.css']
})
export class ShowStudentsComponent implements OnInit {

  studentsList: Student[] = [];
showAdd(){
  //navigate by code
 // this.router.navigateByUrl("/stu/add");
  this.router.navigate(["/stu","add"])
}
  constructor(public studentService: StudentService,public router:Router) { }

  ngOnInit(): void {
    this.studentsList = this.studentService.getAllStudents();
  }

}
