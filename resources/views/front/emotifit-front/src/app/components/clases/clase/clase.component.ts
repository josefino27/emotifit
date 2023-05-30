import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'clase',
  templateUrl: './clase.component.html',
  styleUrls: ['./clase.component.css']
})
export class ClaseComponent implements OnInit {

  nombre: string;
  cupo: number;

  constructor(){
    this.nombre = "Calistenisa";
    this.cupo = 0;
  }

  ngOnInit(): void{
    console.log("clases cargadas...");
  }

  aumentarCupo(){
    this.cupo++;
    this.hayclase();
  }
  disminuirCupo(){
    this.cupo--;
    this.hayclase();
  }

  hayclase(){
    if(this.cupo >= 5){
      this.nombre = "Calistenia";
    }else{
      this.nombre = "Pesas";
    }
  }

}
