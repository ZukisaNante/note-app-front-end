import { Component, OnInit } from '@angular/core';
import { ApiService } from '../api.service';

@Component({
  selector: 'app-dashboard',
  templateUrl: './dashboard.component.html',
  styleUrls: ['./dashboard.component.css']
})
export class DashboardComponent implements OnInit {
   notes: Notes[];
   selectedNotes: Notes = {id : null, title:null, notes: null, author: null};
   constructor(private apiService: ApiService) { }
 
 ngOnInit() {
    this.apiService.readNotes().subscribe((notes: Notes[])=>{
      this.notes = notes;
      console.log(this.notes);
    })
  }

 createOrUpdateNotes(form){
    if(this.selectedNotes && this.selectedNotes.id){
      form.value.id = this.selectedNotes.id;
      this.apiService.updateNotes(form.value).subscribe((notes: Notes)=>{
        console.log("Notes updated" , notes);
      });
    }
    else{

      this.apiService.createNotes(form.value).subscribe((notes: Notes)=>{
        console.log("Notes created, ", notes);
      });
    }

  }

  selectNotes(notes: Notes){
    this.selectedNotes = notes;
  }

  deleteNotes(id){
    this.apiService.deleteNotes(id).subscribe((notes: Notes)=>{
      console.log("Notes deleted, ", notes);
    });
  }



  