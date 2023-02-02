import { Component, OnInit } from '@angular/core';
import { DashboardService } from './dashboard.service';
import { routes } from '../../../consts';

@Component({
  selector: 'app-dashboard',
  templateUrl: './dashboard.component.html',
  styleUrls: ['./dashboard.component.scss'],
})
export class DashboardComponent implements OnInit {
  public routes: typeof routes = routes;

  users: any;

  constructor(private service: DashboardService) {}

  ngOnInit(): void {
    this.service.getUsers().subscribe((response) => {
      this.users = response;
    });
  }
}
