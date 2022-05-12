import { Component, OnInit } from '@angular/core';
import { StudentService } from 'src/app/student.service';
import { Student } from 'src/app/_models/student';

@Component({
  selector: 'app-add-student',
  templateUrl: './add-student.component.html',
  styleUrls: ['./add-student.component.css']
})
export class AddStudentComponent implements OnInit {

  newStudent = new Student(0, "", 0, 0);

  saveStudent() {
    this.studentService.addStudent(this.newStudent);
  }

  constructor(public studentService: StudentService) { }

  ngOnInit(): void {
  }


}
