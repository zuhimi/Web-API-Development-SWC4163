import { Component, OnInit } from '@angular/core';
import { FormControl, FormGroup, Validators } from '@angular/forms';
import { ApiserviceService } from '../apiservice.service';
import { ActivatedRoute } from '@angular/router';

@Component({
  selector: 'app-register',
  templateUrl: './register.component.html',
  styleUrls: ['./register.component.css']
})
export class RegisterComponent implements OnInit {

  constructor(private service: ApiserviceService, private router: ActivatedRoute) { }

  errormsg: any;
  successmsg: any;
  getparamid: any;

  ngOnInit(): void {
    // id for update
    this.getparamid = this.router.snapshot.paramMap.get('id');
    if (this.getparamid) {
      this.service.getOneregister(this.getparamid).subscribe((res) => {

        console.log(res, 'res==>');
        this.registerForm.patchValue({
          shop_name: res.data[0].shop_name,
          shop_email: res.data[0].shop_email,
          shop_no: res.data[0].shop_no,

        });
      });
    }
  }

  registerForm = new FormGroup({
    'shop_name': new FormControl('', Validators.required),
    'shop_email': new FormControl('', Validators.required),
    'shop_no': new FormControl('', Validators.required)
  });

  // to create a new student
  studentsubmit() {
    if (this.registerForm.valid) {
      console.log(this.registerForm.value);
      this.service.createregister(this.registerForm.value).subscribe((res) => {
        console.log(res, 'res==>');
        this.registerForm.reset();
        this.successmsg = 'Add Shop Profile Successful';
      });

    }
    else {
      this.errormsg = 'Add Shop Profile Unsuccessful';
    }

  }
  // to update a student
  registerupdate() {
    console.log(this.registerForm.value, 'updatedform');

    if (this.registerForm.valid) {
      this.service.updateregister(this.registerForm.value, this.getparamid).subscribe((res) => {
        console.log(res, 'resupdated');
        this.successmsg = res.message;

      });
    }
    else {
      this.errormsg = 'invalid';
    }
  }
}