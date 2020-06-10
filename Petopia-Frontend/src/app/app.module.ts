import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';

import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app.component';
import { HomeComponent } from './components/home/home.component';
import { SingleComponent } from './components/single/single.component';
import { CalendarModule, DateAdapter } from 'angular-calendar';
import { adapterFactory } from 'angular-calendar/date-adapters/date-fns';
import { CalendarComponent } from './calendar/calendar.component';
import { FormsModule } from '@angular/forms';
import { RegisterComponent } from './components/register/register.component';
import { LoginComponent } from './components/login/login.component';
import { NavbarComponent } from './components/navbar/navbar.component';
import { FooterComponent } from './components/footer/footer.component';
import { RouterModule ,Routes} from '@angular/router';
import { HttpClientModule } from '@angular/common/http';
import { UserService } from './shared/user.service';
import { RequestResetComponent } from './components/password/request-reset/request-reset.component';
import { ResponeResetComponent } from './components/password/respone-reset/respone-reset.component';
import { ReservationComponent } from './components/reservation/reservation.component';
import { AthenticationService } from './services/athentication.service';
import { TokenService } from './services/token.service';
import { PetComponent } from './components/pet/pet.component';
import { AuthService } from './services/auth.service';
import { AfterLoginService } from './services/after-login.service';
import { BeforeLoginService } from './services/before-login.service';
import { PetsService } from './services/pets.service';
import { SnotifyModule, SnotifyService, ToastDefaults } from 'ng-snotify';


@NgModule({
  declarations: [
    AppComponent,
    HomeComponent,
    
    SingleComponent,
    
    CalendarComponent,
    
    RegisterComponent,
    
    LoginComponent,
    
    NavbarComponent,
    
    FooterComponent,
    
    RequestResetComponent,
    
    ResponeResetComponent,
    ReservationComponent,
    PetComponent
    
  ],
  imports: [
    BrowserModule,
    AppRoutingModule,
    FormsModule,
    HttpClientModule,
    CalendarModule.forRoot({ provide: DateAdapter, useFactory: adapterFactory }),
    SnotifyModule
    
  ],
  providers: [AthenticationService,TokenService,AuthService,AfterLoginService,BeforeLoginService,PetsService ,{ provide: 'SnotifyToastConfig', useValue: ToastDefaults},
  SnotifyService],
  bootstrap: [AppComponent]
})
export class AppModule { }
