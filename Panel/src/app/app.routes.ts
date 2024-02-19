import { Routes } from '@angular/router';
import { PersonaComponent } from './persona/persona.component';
import { CitasComponent } from './citas/citas.component';

export const routes: Routes = [
    { path: 'persona', component:PersonaComponent},
    { path: 'citas', component:CitasComponent}
];
