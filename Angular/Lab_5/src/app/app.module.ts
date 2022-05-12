import { NgModule } from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';

import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app.component';
import { StudentComponent } from './student_compo/student.component';
import { HeaderComponent } from './header/header.component';
import { FooterComponent } from './footer/footer.component';
import { ContentComponent } from './content/content.component';
import { CoreModule } from './core/core.module';
import { FormsModule } from '@angular/forms';
import { DepartmentComponent } from './department/department.component';
import { Lab3Component } from './lab3/lab3.component';

import { ProductModule } from './product/product.module';
import { StudentModule } from './student/student.module';
import { NotfoundComponent } from './notfound/notfound.component';

@NgModule({
  declarations: [
    AppComponent,
    StudentComponent,
    HeaderComponent,
    FooterComponent,
    ContentComponent,
    DepartmentComponent,
    Lab3Component,
    NotfoundComponent
  ],
  imports: [
    BrowserModule,
    AppRoutingModule,
    CoreModule,
    FormsModule,
    ProductModule,
    StudentModule
    
  ],
  exports:[
    HeaderComponent,
    FooterComponent,
    ContentComponent
  ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }
