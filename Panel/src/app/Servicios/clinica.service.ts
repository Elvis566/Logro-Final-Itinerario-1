import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';

@Injectable({
  providedIn: 'root'
})
export class ClinicaService {

  constructor( private http:HttpClient) { }

  createPersona(nombre:any,apellido:any,DNI: any, telefono: any, email: any,especialidad: any, tipos_personas: any){
    return this.http.post('http://127.0.0.1:8000/api/addCreate',
    {
      nombre:nombre,
      apellido:apellido,
      DNI: DNI, 
      telefono: telefono,
      email: email,
      especialidad: especialidad,
      tipos_personas: tipos_personas
    })

  }

  createConsulta(persona_id:any,medico:any,fechaHConsulta:any){
    return this.http.post('http://127.0.0.1:8000/api/addCitas',{
      persona_id:persona_id,
      medico:medico,
      fechaHConsulta:fechaHConsulta
    })
  }

  getDoctores(){
    return this.http.get('http://127.0.0.1:8000/api/cargarDoc')
  }

  getPacientes(){
    return this.http.get('http://127.0.0.1:8000/api/cargarPacientes')
  }

  getCitas(){
    return this.http.get('http://127.0.0.1:8000/api/cargarCitas')
  }

  getEspecialidad(){
    return this.http.get('http://127.0.0.1:8000/api/cargarEspecialidad')
  }
}
