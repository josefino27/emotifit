import { NgModule } from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';

import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app.component';
import { ReservaComponent } from './reserva/reserva.component';
import { ClaseComponent } from './components/clases/clase/clase.component';
import { ClasesComponent } from './components/clases/clases.component';

@NgModule({
  declarations: [
    AppComponent,
    ReservaComponent,
    ClaseComponent,
    ClasesComponent
  ],
  imports: [
    BrowserModule,
    AppRoutingModule
  ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }
