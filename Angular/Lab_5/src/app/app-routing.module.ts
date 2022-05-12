import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import { ShowStudentsComponent } from '../app/student/show-students/show-students.component';
import { DepartmentComponent } from './department/department.component';
import { NotfoundComponent } from './notfound/notfound.component';
import { AddStudentComponent } from './student/add-student/add-student.component';

const routes: Routes = [
  {path:"stu",component:ShowStudentsComponent},
  {path:"Dep",component:DepartmentComponent},
  {path:"stu/add",component:AddStudentComponent},
  {path:"**",component:NotfoundComponent},
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
