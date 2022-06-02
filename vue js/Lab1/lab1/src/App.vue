<template>
  <div :style="mystyle">
    <button class="btn  btn-success  m-1" @click="showFormMethod">Form</button>
    <button class="btn  btn-success  m-1" @click="showStudentsMethod">Students</button>
    <button class="btn  btn-success  m-1" @click="showAdminsMethod">Admins</button>
    <formApp v-if="showForm" @addingNewAdmin="addNewAdmin" @addingNewStudent="addNewStudent" />
    <!-- <adminApp :admins="users.filter((arr) => arr.role == 'admin')" v-if="showAdmins" @deletingUser="deleteUser" /> -->
    <!-- <studentApp :students="users.filter((arr) => arr.role == 'student')" v-if="showStudents" @deletingUser="deleteUser" /> -->
    <adminApp :admins="admins" v-if="showAdmins" @deletingAdmin="deleteAdmin" />
    <studentApp :students="students" v-if="showStudents" @deletingStudent="deleteStudent" />
  </div>
</template>

<script>
import formApp from './components/form.vue'
import adminApp from './components/admin.vue'
import studentApp from './components/student.vue'

export default {
  name: 'App',
  components: {
    formApp,
    adminApp,
    studentApp
  },
  data() {
    return {
      showForm: true,
      showAdmins: false,
      showStudents: false,
      admins: [
        {
          name: 'Mahmoud',
          age: 24,
          address: "Alexandria"
        }
      ],
      students: [
        {
          name: 'Nada',
          age: 23,
          address: "Alexandria"
        }
      ],
      mystyle:{
      
      }
    }
  },
  methods: {
    showFormMethod() {
      this.showForm = true
      this.showAdmins = false
      this.showStudents = false
    },
    showStudentsMethod() {
      this.showForm = false
      this.showAdmins = false
      this.showStudents = true
    },
    showAdminsMethod() {
      this.showForm = false
      this.showAdmins = true
      this.showStudents = false
    },
    addNewAdmin(newAdmin) {
      this.admins.push(newAdmin);
    },
    addNewStudent(newStudent) {
      this.students.push(newStudent);
    },
    deleteStudent(index) {
      this.students.splice(index, 1);
    },
    deleteAdmin(index) {
      this.admins.splice(index, 1);
    },
  }
}
</script>

<style>
* {
 
 
}

#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  /* margin-top: 60px; */
}

@import "~bootstrap/dist/css/bootstrap.css";
</style>
