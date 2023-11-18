import { Component, OnInit } from '@angular/core';
import { FormControl, FormGroup, Validators } from '@angular/forms';
import { ApiserviceService } from '../apiservice.service';
import { ActivatedRoute } from '@angular/router';

@Component({
  selector: 'app-updateregister',
  templateUrl: './updateregister.component.html',
  styleUrls: ['./updateregister.component.css']
})

export class UpdateregisterComponent implements OnInit {

  registerForm = new FormGroup({
    'shop_name': new FormControl('', Validators.required), // Updated attribute name
    'shop_email': new FormControl('', Validators.required), // Updated attribute name
    'shop_no': new FormControl('', Validators.required), // Updated attribute name
  });

  constructor(private service: ApiserviceService, private router: ActivatedRoute) { }

  errormsg: any;
  successmsg: any;
  getparamid: any;
  message: boolean = false;

  ngOnInit(): void {
    this.service.getOneregister(this.router.snapshot.params['id']).subscribe((res: any) => {
      console.log(res, 'res==>');
      this.registerForm.patchValue({
        shop_name: res.data[0].shop_name, // Updated attribute name
        shop_email: res.data[0].shop_email, // Updated attribute name
        shop_no: res.data[0].shop_no, // Updated attribute name
      });
    });
  }

  // to update a shop // Updated method name
  registerupdate() {
    console.log(this.registerForm.value);
    this.service.updateregister(this.router.snapshot.params['id'], this.registerForm.value).subscribe((result: any) => {
      this.registerForm.reset();
      this.successmsg = 'Profile successfully updated';
      this.message = true;
    });
  }

  removeMessage() {
    this.message = false;
  }
}