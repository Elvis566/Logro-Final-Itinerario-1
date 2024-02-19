import { Component } from '@angular/core';
import { ClinicaService } from '../Servicios/clinica.service';

@Component({
  selector: 'app-citas',
  standalone: true,
  imports: [],
  templateUrl: './citas.component.html',
  styleUrl: './citas.component.css'
})
export class CitasComponent {
  elejido:any
  listaDoc:any
  listaCitas: any
  listaPacientes: any
  listaEspecialidad:any
constructor(private cita:ClinicaService){}

ngOnInit(){
  this.traerCitas();
  this.traerDoc();
  this.traerPacientes();
  this.traerEspecialidad();
}


traerDoc(){
  this.cita.getDoctores().subscribe({
    next : (datos:any)=>{

      this.listaDoc = datos.doctores;

    },
    error:(e)=>{
      console.log('Error al obtener datos');
    }
  })
}

traerPacientes(){
  this.cita.getPacientes().subscribe({
    next : (datos:any)=>{

      this.listaPacientes = datos.pacientes;

    },
    error:(e)=>{
      console.log('Error al obtener datos');
    }
  })
}

traerCitas(){
  this.cita.getCitas().subscribe({
    next : (datos:any)=>{

      this.listaCitas = datos.registro;

    },
    error:(e)=>{
      console.log('Error al obtener datos');
    }
  })
}

traerEspecialidad(){
  this.cita.getEspecialidad().subscribe({
    next : (datos:any)=>{

      this.listaEspecialidad = datos.datos;

    },
    error:(e)=>{
      console.log('Error al obtener datos');
    }
  })
}

createCitas( persona_id:any,medico:any,fechaHConsulta:any){
  this.cita.createConsulta(persona_id.value, medico.value, fechaHConsulta.value).subscribe({
    next: (datos:any)=>{

    },
    error:(e)=>{
      console.log(e);
    }
  })
}

verificar(op:any){
  this.elejido = op.value;
}

}


