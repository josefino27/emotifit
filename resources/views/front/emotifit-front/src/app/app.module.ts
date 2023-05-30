import { NgModule } from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';

import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app.component';
import { ClaseComponent } from './components/clases/clase/clase.component';
import { ClasesComponent } from './components/clases/clases.component';
import { ReservasComponent } from './components/reservas/reservas.component';

@NgModule({
  declarations: [
    AppComponent,
    ClaseComponent,
    ClasesComponent,
    ReservasComponent
  ],
  imports: [
    BrowserModule,
    AppRoutingModule
  ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }
