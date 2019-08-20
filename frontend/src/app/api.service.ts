import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { notes } from  './notes.ts';
import { Observable } from  'rxjs';

@Injectable({
  providedIn: 'root'
})
export class ApiService {

  constructor(private httpClient: HttpClient) {}
}

export class ApiService {
  PHP_API_SERVER = "http://127.0.0.1:8080";
  }
  readNotes(): Observable<Notes[]>{
    return this.httpClient.get<Notes[]>(`${this.PHP_API_SERVER}/api/read.php`);
  }

   createNotes(my_notes: Notes): Observable<Notes>{
    return this.httpClient.post<Notes>(`${this.PHP_API_SERVER}/api/create.php`, my_notes);
  }
   updateNotes(my_notes: Notes){
    return this.httpClient.put<Notes>(`${this.PHP_API_SERVER}/api/update.php`, my_notes);   
  }
  deletePolicy(id: number){
    return this.httpClient.delete<Notes>(`${this.PHP_API_SERVER}/api/delete.php/?id=${id}`);
  }
  
  