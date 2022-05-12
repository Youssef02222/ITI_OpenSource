import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { AddStudentComponent } from './add-student/add-student.component';
import { ShowStudentsComponent } from './show-students/show-students.component';
import { FormsModule } from '@angular/forms';



@NgModule({
  declarations: [
    AddStudentComponent,
    ShowStudentsComponent
  ],
  imports: [
    CommonModule,
    FormsModule
  ],
  exports:[
    AddStudentComponent,
    ShowStudentsComponent
  ],
})
export class StudentModule { }
