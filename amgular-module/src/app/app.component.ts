import { Component, OnInit } from '@angular/core';
import { ApiService } from './api.service';

@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.css']
})
export class AppComponent  implements OnInit {
  public show:boolean = false;
  public buttonName:any = 'Show';
  users : any;
  constructor(
    private api : ApiService
  ){}
  ngOnInit(){
    this.getAllUserApi();
  }
  getAllUserApi(){
    this.api.getUsers().subscribe(data => {
      this.users = data;
    });
  }
  toggle() {
    this.show = !this.show;

    // CHANGE THE NAME OF THE BUTTON.
    if(this.show)
      this.buttonName = "Hide";
    else
      this.buttonName = "Show";
  }
}
