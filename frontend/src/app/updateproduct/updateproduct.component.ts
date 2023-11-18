import { Component, OnInit} from '@angular/core';
import {FormControl, FormGroup, Validators} from '@angular/forms';
import {ApiserviceService} from '../apiservice.service';
import { ActivatedRoute} from '@angular/router';

@Component({
  selector: 'app-updateproduct', // Change the component name
  templateUrl: './updateproduct.component.html', // Change the component name
  styleUrls: ['./updateproduct.component.css'], // Change the component name
})

export class UpdateproductComponent implements OnInit { // Change the component name

  productForm = new FormGroup({ // Change the form name
    'product_id': new FormControl('', Validators.required), // Change the attribute
    'product_name': new FormControl('', Validators.required), // Change the attribute
    'product_brand': new FormControl('', Validators.required), // Change the attribute
    'price': new FormControl('', Validators.required), // Change the attribute
  });

  constructor(private service: ApiserviceService, private router: ActivatedRoute) { }

  errormsg: any;
  successmsg: any;
  getparamid: any;
  message: boolean = false;

  ngOnInit(): void {
    this.service.getOneproduct(this.router.snapshot.params['id']).subscribe((res: any) => {
      console.log(res, 'res==>');
      this.productForm.patchValue({
        product_id: res.data[0].product_id, // Change the attribute
        product_name: res.data[0].product_name, // Change the attribute
        product_brand: res.data[0].product_brand, // Change the attribute
        price: res.data[0].price, // Change the attribute
      });
    });
  }

  // to update a product
  productupdate() {
    console.log(this.productForm.value);
    this.service.updateproduct(this.router.snapshot.params['id'], this.productForm.value).subscribe((result: any) => {
      this.productForm.reset();
      this.successmsg = 'Profile successfully updated';
      this.message = true;
    });
  }

  removeMessage() {
    this.message = false;
  }
}