import { TestBed } from '@angular/core/testing';

import { ServicesClasesService } from './services-clases.service';

describe('ServicesClasesService', () => {
  let service: ServicesClasesService;

  beforeEach(() => {
    TestBed.configureTestingModule({});
    service = TestBed.inject(ServicesClasesService);
  });

  it('should be created', () => {
    expect(service).toBeTruthy();
  });
});
