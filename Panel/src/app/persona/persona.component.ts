import { Component } from '@angular/core';
import { ClinicaService } from '../Servicios/clinica.service';

@Component({
  selector: 'app-persona',
  standalone: true,
  imports: [],
  templateUrl: './persona.component.html',
  styleUrl: './persona.component.css'
})
export class PersonaComponent {
  formulario : any
  constructor(private personas:ClinicaService){}

  createPersonas(nombre:any,apellido:any,DNI: any, telefono: any, email: any,especialidad: any, tipos_personas: any ){
    this.personas.createPersona(nombre.value,apellido.value,DNI.value, telefono.value, email.value,especialidad.value, tipos_personas.value).subscribe({
      next: (datos:any)=>{

      },
      error:(e)=>{
        console.log(e);
      }
    })
  }

  limpiarFormulario() {
    // Obtener el formulario por su ID
     this.formulario = document.getElementById("miFormulario");

    // Recorrer los elementos del formulario y establecer su valor a una cadena vacía
    for (var i = 0; i < this.formulario.elements.length; i++) {
      var elemento = this.formulario.elements[i];
      if (elemento.type !== "button") { // Excluir el botón del formulario
        elemento.value = "";
      }
    }
  }
}
