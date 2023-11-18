import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Observable } from 'rxjs';

const baseproductUrl = "http://localhost:8080/product";
const createproductUrl = "http://localhost:8080/product/add";
const deleteproductUrl = "http://localhost:8080/product/del";
const putproductUrl = "http://localhost:8080/product/put";
const baseregisterUrl = "http://localhost:8080/registert";
const createregisterUrl = "http://localhost:8080/register/add";
const deleteregisterUrl = "http://localhost:8080/register/del";
const putregisterUrl = "http://localhost:8080/register/put";

@Injectable({
  providedIn: 'root'
})
export class ApiserviceService {

  constructor(private _http: HttpClient) { }

  // Get all products
  getallproduct(): Observable<any> {
    const url = "http://localhost:8080/allproduct";
    return this._http.get<any>(url);
  }

  // Create product
  createproduct(product: any): Observable<any> {
    console.log(product, 'createapi=>');
    return this._http.post(createproductUrl, product);
  }

  // Delete product
  deleteproduct(id: any): Observable<any> {
    return this._http.delete(`${deleteproductUrl}/${id}`);
  }

  // Update product
  updateproduct(id: any, product: any): Observable<any> {
    return this._http.put(`${putproductUrl}/${id}`, product);
  }

  // Get one product
  getOneproduct(id: any): Observable<any> {
    return this._http.get(`${baseproductUrl}/${id}`);
  }

   // Get all products
   getallregister(): Observable<any> {
    const url = "http://localhost:8080/allregister";
    return this._http.get<any>(url);
  }

  // Create product
  createregister(register: any): Observable<any> {
    console.log(register, 'createapi=>');
    return this._http.post(createregisterUrl, register);
  }

  // Delete product
  deleteregister(id: any): Observable<any> {
    return this._http.delete(`${deleteregisterUrl}/${id}`);
  }

  // Update product
  updateregister(id: any, product: any): Observable<any> {
    return this._http.put(`${putregisterUrl}/${id}`, product);
  }

  // Get one product
  getOneregister(id: any): Observable<any> {
    return this._http.get(`${baseregisterUrl}/${id}`);
  }
}