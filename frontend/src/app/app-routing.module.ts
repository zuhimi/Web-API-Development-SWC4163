import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import { HomeComponent } from './home/home.component';
import { AboutComponent } from './about/about.component';
import { NavbarComponent } from './navbar/navbar.component';
import { ViewproductComponent } from './viewproduct/viewproduct.component';
import { UpdateproductComponent } from './updateproduct/updateproduct.component';
import { RegisterComponent } from './register/register.component';
import { ProductComponent } from './product/product.component';
import { FaqComponent } from './faq/faq.component';
import { UpdateregisterComponent } from './updateregister/updateregister.component';
import { ViewregisterComponent } from './viewregister/viewregister.component';


const routes: Routes = [
  { path: "navbar", component: NavbarComponent }, 
  { path: "home", component: HomeComponent },
  { path: "about", component: AboutComponent },
  { path: "viewproduct", component: ViewproductComponent }, 
  { path: "register", component: RegisterComponent },
  { path: "faq", component: FaqComponent },
  { path: "product", component: ProductComponent },
  { path: "updateregister", component: UpdateregisterComponent },
  { path: "viewregister", component: ViewregisterComponent },
  { path: "updateproduct", component: UpdateproductComponent },
  { path: 'updateproduct/:id', component: UpdateproductComponent },
  { path: 'updateregister/:id', component: UpdateregisterComponent },
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }