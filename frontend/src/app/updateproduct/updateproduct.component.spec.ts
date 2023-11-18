import { ComponentFixture, TestBed } from '@angular/core/testing';

import { UpdateproductComponent } from './updateproduct.component'; // Change the component name

describe('UpdateproductComponent', () => { // Change the component name
  let component: UpdateproductComponent; // Change the component name
  let fixture: ComponentFixture<UpdateproductComponent>; // Change the component name

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [UpdateproductComponent], // Change the component name
    }).compileComponents();
  });

  beforeEach(() => {
    fixture = TestBed.createComponent(UpdateproductComponent); // Change the component name
    component = fixture.componentInstance; // Change the component name
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});