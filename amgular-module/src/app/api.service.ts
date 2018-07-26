import { Injectable } from '@angular/core';
import { Http, Headers } from '@angular/http';
import { map } from 'rxjs/operators';

@Injectable({
  providedIn: 'root'
})
export class ApiService {

  constructor(
    private http : Http
  ) {}
  getUsers(){
    const headers = new Headers();
    headers.append('Content-type','application/json');
    return this.http.get("http://localhost/task/users", {headers: headers}).pipe(
      map(res => res.json())
    );
  }
}
