import { Component, OnInit } from '@angular/core';
import { StudentService } from 'src/app/student.service';
import { Student } from 'src/app/_models/student';

@Component({
  selector: 'app-show-students',
  templateUrl: './show-students.component.html',
  styleUrls: ['./show-students.component.css']
})
export class ShowStudentsComponent implements OnInit {

  studentsList: Student[] = [];

  constructor(public studentService: StudentService) { }

  ngOnInit(): void {
    this.studentsList = this.studentService.getAllStudents();
  }

}
